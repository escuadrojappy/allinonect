<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE OR REPLACE VIEW view_contact_tracings AS
            select
                scanned_visitors.id,
                visitors.*, 
                establishments.*,
                scanned_visitors.entrance_timestamp,
                scanned_visitors.created_at,
                scanned_visitors.updated_at,
                scanned_visitors.deleted_at
            from 
                scanned_visitors 
                left join (
                    select 
                        visitors.id as visitor_id, 
                        visitors.first_name as visitor_first_name, 
                        visitors.middle_name as visitor_middle_name, 
                        visitors.last_name as visitor_last_name,
                        concat(visitors.first_name, " ", visitors.middle_name, " ", visitors.last_name) as visitor_fullname,
                        visitors.birthdate as visitor_birthdate, 
                        visitors.place_of_birth as visitor_place_of_birth, 
                        visitors.contact_number as visitor_contact_number, 
                        visitors.philsys_card_number as visitor_philsys_card_number, 
                        -- visitor_health_statuses.id as visitor_health_statuses_id,
                        case 
                            when visitor_health_statuses.covid_result is null or visitor_health_statuses.covid_result = 0 then 0 
                            else 1
                        end AS covid_result,
                        visitor_health_statuses.date_result, 
                        visitor_health_statuses.remarks,
                        users.id as visitor_user_id, 
                        users.email as visitor_email, 
                        users.role_id as visitor_role_id 
                    from 
                        visitors 
                        left join users on users.id = visitors.user_id 
                        left join (
                            select 
                                vhs2.* 
                            from 
                                (
                                    select
                                        vhs.visitor_id,
                                        max(vhs.date_result) as date_result 
                                    from 
                                        visitor_health_statuses vhs 
                                    group by 
                                        vhs.visitor_id
                                ) vhs 
                                inner join visitor_health_statuses vhs2 on vhs.visitor_id = vhs2.visitor_id and vhs.date_result = vhs2.date_result
                                group by vhs2.visitor_id
                        ) as visitor_health_statuses on visitors.id = visitor_health_statuses.visitor_id
                ) as visitors on visitors.visitor_id = scanned_visitors.visitor_id 
                left join (
                    select 
                        establishments.id as establishment_id, 
                        establishments.name as establishment_name, 
                        establishments.address as establishment_address, 
                        establishments.contact_number as establishment_contact_number, 
                        users.id as establishment_user_id, 
                        users.email as establishment_email, 
                        users.role_id as establishment_role_id 
                    from 
                        establishments 
                        left join users on users.id = establishments.user_id
                ) as establishments on establishments.establishment_id = scanned_visitors.establishment_id
            union all 
            select 
                null as id, 
                visitors.visitor_id, 
                visitors.visitor_first_name, 
                visitors.visitor_middle_name, 
                visitors.visitor_last_name,
                visitors.visitor_fullname,
                visitors.visitor_birthdate, 
                visitors.visitor_place_of_birth, 
                visitors.visitor_contact_number, 
                visitors.visitor_philsys_card_number, 
                -- vhs2.id as visitor_health_statuses_id, 
                vhs2.covid_result, 
                vhs2.date_result, 
                vhs2.remarks, 
                visitors.visitor_user_id, 
                visitors.visitor_email, 
                visitors.visitor_role_id, 
                null as establishment_id, 
                null as establishment_name, 
                null as establishment_address, 
                null as establishment_contact_number, 
                null as establishment_user_id, 
                null as establishment_email, 
                null as establishment_role_id, 
                null as entrance_timestamp, 
                null as created_at, 
                null as updated_at, 
                null as deleted_at 
            from 
                (
                    select 
                        vhs.visitor_id, 
                        max(vhs.date_result) as date_result 
                    from 
                        visitor_health_statuses vhs 
                    group by 
                        vhs.visitor_id
                ) vhs 
                inner join visitor_health_statuses vhs2 on vhs.visitor_id = vhs2.visitor_id and vhs.date_result = vhs2.date_result
                left join (
                    select 
                        visitors.id as visitor_id, 
                        visitors.first_name as visitor_first_name, 
                        visitors.middle_name as visitor_middle_name, 
                        visitors.last_name as visitor_last_name, 
                        concat(visitors.first_name, " ", visitors.middle_name, " ", visitors.last_name) as visitor_fullname,
                        visitors.birthdate as visitor_birthdate, 
                        visitors.place_of_birth as visitor_place_of_birth, 
                        visitors.contact_number as visitor_contact_number, 
                        visitors.philsys_card_number as visitor_philsys_card_number, 
                        users.id as visitor_user_id, 
                        users.email as visitor_email, 
                        users.role_id as visitor_role_id 
                    from 
                        visitors 
                        left join users on users.id = visitors.user_id
                ) as visitors on visitors.visitor_id = vhs2.visitor_id 
                where 
                    not exists (
                        select 
                            visitor_id 
                        from 
                            scanned_visitors 
                        where 
                            scanned_visitors.visitor_id = vhs2.visitor_id
                    )
                group by vhs2.visitor_id
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('view_contact_tracings');
    }
};

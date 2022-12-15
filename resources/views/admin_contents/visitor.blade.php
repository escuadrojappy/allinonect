@extends('admin_master_template.master')
@section('content')
<div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0);">User Accounts</a></li>
                    <li class="active">Visitors</li>
                </ol>
                <div class="card">
                    <div class="header bg-green">
                        <h2>
                        Visitors <small>List of all Visitors</small>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            @include('admin_contents.establishment_registration_modal')
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th>VID</th>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>PCN</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
        var create = true
        var editId = null
        var orderBy = [[0, 'asc']]
        var columns = [
            { data: 'id', name: 'visitors.id' },
            { data: 'last_name', name: 'last_name' },
            { data: 'first_name', name: 'first_name' },
            { data: 'middle_name', name: 'middle_name' },
            { data: 'philsys_card_number', name: 'philsys_card_number' },
        ]

        initDataTable('.dataTable', columns, 'admin/visitor', orderBy, false,)
</script>

@endsection
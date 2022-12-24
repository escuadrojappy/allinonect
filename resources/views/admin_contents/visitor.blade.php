@extends('admin_master_template.master')
@section('content')
<style>
    ::-webkit-datetime-edit-year-field:not([aria-valuenow]),
    ::-webkit-datetime-edit-month-field:not([aria-valuenow]),
    ::-webkit-datetime-edit-day-field:not([aria-valuenow]) {
        color: transparent;
    }
</style>
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
                            <button type="button" class="btn bg-teal btn-circle-lg waves-effect waves-circle waves-float btn-modal-add" data-toggle="modal" data-target="#visitor-registration-modal">
                                <i class="material-icons">add</i>
                            </button>
                            @include('admin_contents.visitor_registration_modal')
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
                                        <th>Covid Result</th>
                                        <th>Date Result</th>
                                        <th style="width: 10%">Actions</th>
                                    </tr>
                                </thead>
                                {{-- @include('admin_contents.visitor_registration_and_result_modal') --}}
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
            { data: 'covid_result', name: 'covid_result' },
            { data: 'date_result', name: 'date_result' },
        ]

        $(document).on('click', '.btn-modal-add', function (e) {
            e.preventDefault()
            clearFormFields('#establishment-registration-form')
            $('#visitor-registration-modal .modal-title').text('Establishment Registration Form')
            $('#visitor-registration-modal button[type="submit"]').text('Register')
            create = true
        })

        $(document).on('click', '.edit', function (e) {
            e.preventDefault()
            var id = $(this).attr('visitors.id')
            var name = $(this).attr('name')
            var email = $(this).attr('email')
            var address = $(this).attr('address')
            var contact_number = $(this).attr('contact_number')
            create = false
            editId = id
            $('#visitor-registration-modal').modal('toggle')
            $('#visitor-registration-modal .modal-title').text('Visitor Form')
            $('#visitor-registration-modal button[type="submit"]').text('Update')
            $('#visitor-registration-form').validate()

            $('#name').val(name).parent().addClass('focused')
            $('#email').val(email).prop('readonly', true).parent().addClass('focused')
            $('#address').val(address).parent().addClass('focused')
            $('#contact_number').val(contact_number).parent().addClass('focused')
        })

        initDataTable('.dataTable', columns, 'admin/visitor/search', orderBy, true)
</script>

@endsection
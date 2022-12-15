@extends('admin_master_template.master')
@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0);">User Accounts</a></li>
                    <li class="active">Establishment</li>
                </ol>
                <div class="card">
                    <div class="header bg-green">
                        <h2>
                        Establishments <small>List of all establishements.</small>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <button type="button" class="btn bg-teal btn-circle-lg waves-effect waves-circle waves-float btn-modal-add" data-toggle="modal" data-target="#establishment-registration-modal">
                                <i class="material-icons">add</i>
                            </button>
                            @include('admin_contents.establishment_registration_modal')
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th>Business Name</th>
                                        <th>Business Address</th>
                                        <th>Email Address</th>
                                        <th>Contact Number</th>
                                        <th style="width: 10%">Actions</th>
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
        var orderBy = [[0, 'desc']]
        var columns = [
            { data: 'name', name: 'name' },
            { data: 'address', name: 'address' },
            { data: 'email', name: 'users.email' },
            { data: 'contact_number', name: 'contact_number' }
        ]

        $(document).on('click', '.btn-modal-add', function (e) {
            e.preventDefault()
            clearFormFields('#establishment-registration-form')
            $('#establishment-registration-modal .modal-title').text('Establishment Registration Form')
            $('#establishment-registration-modal button[type="submit"]').text('Register')
            create = true
        })

        $(document).on('click', '.edit', function (e) {
            e.preventDefault()
            var id = $(this).attr('id')
            var name = $(this).attr('name')
            var email = $(this).attr('email')
            var address = $(this).attr('address')
            var contact_number = $(this).attr('contact_number')
            create = false
            editId = id
            $('#establishment-registration-modal').modal('toggle')
            $('#establishment-registration-modal .modal-title').text('Establishment Form')
            $('#establishment-registration-modal button[type="submit"]').text('Update')
            $('#establishment-registration-form').validate()

            $('#name').val(name).parent().addClass('focused')
            $('#email').val(email).prop('readonly', true).parent().addClass('focused')
            $('#address').val(address).parent().addClass('focused')
            $('#contact_number').val(contact_number).parent().addClass('focused')
        })

        $(document).on('click', '.delete', function (e) {
            e.preventDefault()
            var id = $(this).attr('id')
            confirmAlert(
                'Confirm!',
                'Are you sure you want to delete?',
                () => {
                    destroy(`${apiUrl}establishments/${id}`).done((result) => {
                        successAlert(
                            'Success!',
                            'Successfully Deleted Establishment.',
                            () => { 
                                clearFormFields('#establishment-registration-form')
                                initDataTable('.dataTable', columns, 'establishments/search', orderBy)
                            }
                        )
                    }).fail((error) => {
                        errorAlert('Error!', error.responseJSON.message)
                    }).always(() => {
                        rollBackButtons('#establishment-registration-form')
                    })
                }
            )
        })

        initDataTable('.dataTable', columns, 'establishments/search', orderBy)
    </script>
@endsection
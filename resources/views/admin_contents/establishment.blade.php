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
                        List of all establishemnts.
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
        var columns = [
            { data: 'name', name: 'name' },
            { data: 'address', name: 'address' },
            { data: 'email', name: 'users.email' },
            { data: 'contact_number', name: 'contact_number' }
        ]

        initDataTable('.dataTable', columns, 'establishments/search')
    </script>
@endsection
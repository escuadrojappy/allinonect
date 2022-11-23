@extends('admin_master_template.master')
@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header bg-green">
                        <h2>
                            Establishments <small>List of all establishemnts.</small>
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
                                        <th>Actions</th>
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
        $(function () {
            $('.dataTable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                search: {
                    return: true,
                },
                columns: [
                    { data: 'name' },
                    { data: 'address' },
                    { data: 'email' },
                    { data: 'contact_number' },
                ],
                ajax: {
                    url: `${apiUrl}establishments/search`,
                    type: 'POST',
                    data: function (params) {
                        var columnIndex = params.order[0].column
                        params.order[0].column = params.columns[columnIndex].data
                        params.per_page = params.length
                        params.page = (params.start / params.length) + 1
                        params.order = params.order[0]
                        params.search = params.search.value
                        console.log(params)
                        // d.myKey = 'myValue';
                        // d.custom = $('#myInput').val();
                        // etc
                    },
                    initComplete: function () {
                        console.log('asdasd')
                    }
                },
                // "lengthChange": false
            });

            //Exportable table
            // $('.js-exportable').DataTable({
            //     dom: 'Bfrtip',
            //     responsive: true,
            //     buttons: [
            //         'copy', 'csv', 'excel', 'pdf', 'print'
            //     ]
            // });
        });
    </script>
@endsection
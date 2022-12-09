@extends('admin_master_template.master')
@section('content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0);">User Accounts</a></li>
                    <li class="active">Contact Report</li>
                </ol>
                <div class="card">
                    <div class="header bg-green">
                        <h2>
                        Contact Report <small>List of all Reports on Visitors.</small>
                        </h2>
                    </div>
                    <br>
                    <div class="container">
                        <div class="row">
                          <div class="col-sm-4">
                            <b>Entrance Timestamps:</b><br>
                            <input type="text" name="datetimes" class="form-control" readonly/>
                          </div>
                          <div class="col-sm-4">
                            <b>Establishments:</b><br>
                            <select class="form-select form-control" aria-label="Default select example">
                                <option value="1">Select here...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                          </div>
                          <div class="col-sm-4">
                            <b>COVID-19 Results:</b><br>
                            <select class="form-select form-control" aria-label="Default select example">
                                <option value="1">Select here...</option>
                                <option value="1">Negative</option>
                                <option value="2">Positive</option>
                              </select>
                          </div>
                        </div>
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
                                        <th>Establishment Visited</th>
                                        <th>Date</th>
                                        <th>Time In</th>
                                        <th>COVID-19 Status</th>
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
        $(function() {
        $('input[name="datetimes"]').daterangepicker({
            timePicker: true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
            format: 'M/DD hh:mm A'
            }
        });
        });
        





        // var create = true
        // var editId = null
        // var columns = [
        //     { data: 'name', name: 'name' },
        //     { data: 'address', name: 'address' },
        //     { data: 'email', name: 'users.email' },
        //     { data: 'contact_number', name: 'contact_number' }
        // ]

        // $(document).on('click', '.btn-modal-add', function (e) {
        //     e.preventDefault()
        //     clearFormFields('#establishment-registration-form')
        //     $('#establishment-registration-modal .modal-title').text('Establishment Registration Form')
        //     $('#establishment-registration-modal button[type="submit"]').text('Register')
        //     create = true
        // })

        // $(document).on('click', '.edit', function (e) {
        //     e.preventDefault()
        //     var id = $(this).attr('id')
        //     var name = $(this).attr('name')
        //     var email = $(this).attr('email')
        //     var address = $(this).attr('address')
        //     var contact_number = $(this).attr('contact_number')
        //     create = false
        //     editId = id
        //     $('#establishment-registration-modal').modal('toggle')
        //     $('#establishment-registration-modal .modal-title').text('Establishment Form')
        //     $('#establishment-registration-modal button[type="submit"]').text('Update')
        //     $('#establishment-registration-form').validate()

        //     $('#name').val(name).parent().addClass('focused')
        //     $('#email').val(email).prop('readonly', true).parent().addClass('focused')
        //     $('#address').val(address).parent().addClass('focused')
        //     $('#contact_number').val(contact_number).parent().addClass('focused')
        // })

        // $(document).on('click', '.delete', function (e) {
        //     e.preventDefault()
        //     var id = $(this).attr('id')
        //     confirmAlert(
        //         'Confirm!',
        //         'Are you sure you want to delete?',
        //         () => {
        //             destroy(`${apiUrl}establishments/${id}`).done((result) => {
        //                 successAlert(
        //                     'Success!',
        //                     'Successfully Deleted Establishment.',
        //                     () => { 
        //                         clearFormFields('#establishment-registration-form')
        //                         initDataTable('.dataTable', columns, 'establishments/search')
        //                     }
        //                 )
        //             }).fail((error) => {
        //                 errorAlert('Error!', error.responseJSON.message)
        //             }).always(() => {
        //                 rollBackButtons('#establishment-registration-form')
        //             })
        //         }
        //     )
        // })

        // initDataTable('.dataTable', columns, 'establishments/search')
    </script>
@endsection

@extends('establishment_master_template.master')
@section('content')
<div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0);">Contacts</a></li>
                    <li class="active">Contact Report</li>
                </ol>
                <div class="card">
                    <div class="header bg-green">
                        <h2>
                        Contact Report <small>List of all Reports on Visitors</small>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            @include('admin_contents.establishment_registration_modal')
                        </ul>
                    </div>
                    <div class="container">
                        <div class="row">
                          <div class="col-sm-6">
                            <b>Entrance Timestamps:</b><br>
                            <input type="text" name="datetimes" class="form-control" />
                          </div>
                          <div class="col-sm-6">
                            <b>COVID-19 Results:</b><br>
                            <select class="form-select form-control" aria-label="Default select example">
                                <option value="1">Select Here</option>
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
</script>
@endsection
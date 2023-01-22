@extends('admin_master_template.master')
@section('content')

<div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header bg-green">
                        <h2>
                        Recently Deleted <small>List of all Recently Deleted Establishments and Citizens.</small>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Business Name</th>
                                        <th>Business Address</th>
                                        <th>Email Address</th>
                                        <th>Contact Number</th>
                                        <th style="width: 10%">Remarks</th>
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

@endsection
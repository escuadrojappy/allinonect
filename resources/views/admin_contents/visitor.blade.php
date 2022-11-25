@extends('admin_master_template.master')
@section('content')
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ol class="breadcrumb">
                                <li><a href="javascript:void(0);">User Accounts</a></li>
                                <li class="active">Visitors</li>
                            </ol>
                    <div class="card">
                    <div class="header bg-green">
                        <h2>
                        Visitors
                        </h2>
                    </div>
                        <div class="body">
                            <div class="table-responsive">
                                <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                    
                                    <div id="DataTables_Table_1_filter" class="dataTables_filter">
                                        <label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="DataTables_Table_1"></label>
                                    </div>
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">

                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 98px;">VID</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 250px;">Last Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 250px;">First Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 250px;">Middle Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 176px;">PCN</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 146px;">Date</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 146px;">Email</th>

                                        </tr>
                                    </thead>
                                    <tr role="row" class="odd">
                                            <td class="sorting_1">1</td>
                                            <td>Dela Cruz</td>
                                            <td>Pedro</td>
                                            <td>Santiago</td>
                                            <td>1234-6567-6532-7886</td>
                                            <td>August 2, 2022</td>
                                            <td>pedro@gmail.com</td>
                                        </tr>
                                    <tbody>

                                        </tr>
                                    </tbody>
                                </table>
                                <div class="dataTables_info" id="DataTables_Table_1_info" role="status" aria-live="polite"></div>
                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button previous disabled" id="DataTables_Table_1_previous">
                                            <a href="#" aria-controls="DataTables_Table_1" data-dt-idx="0" tabindex="0">Previous</a>
                                        </li>
                                        <li class="paginate_button active">
                                            <a href="#" aria-controls="DataTables_Table_1" data-dt-idx="1" tabindex="0">1</a>
                                        </li>
                                        <li class="paginate_button ">
                                            <a href="#" aria-controls="DataTables_Table_1" data-dt-idx="2" tabindex="0">2</a>
                                        </li>
                                        <li class="paginate_button ">
                                            <a href="#" aria-controls="DataTables_Table_1" data-dt-idx="3" tabindex="0">3</a>
                                        </li>
                                        <li class="paginate_button ">
                                            <a href="#" aria-controls="DataTables_Table_1" data-dt-idx="4" tabindex="0">4</a>
                                        </li>
                                        <li class="paginate_button ">
                                            <a href="#" aria-controls="DataTables_Table_1" data-dt-idx="5" tabindex="0">5</a>   
                                            
                                        </li>
                                        <li class="paginate_button ">
                                            <a href="#" aria-controls="DataTables_Table_1" data-dt-idx="6" tabindex="0">6</a>
                                        </li>
                                        <li class="paginate_button next" id="DataTables_Table_1_next">
                                            <a href="#" aria-controls="DataTables_Table_1" data-dt-idx="7" tabindex="0">Next</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
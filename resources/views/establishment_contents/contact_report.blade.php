@extends('establishment_master_template.master')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-indigo">
                <h2>
                    Contact Report
                    <small>Contact Reports of visitors in your establishment.</small>
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                            <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>VID</th>
                            <th>FIRST NAME</th>
                            <th>LAST NAME</th>
                            <th>EMAIL ADDRESS</th>
                            <th>PCN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>amdo@gmail.com</td>
                            <td>1234-5678-9102</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>faty@gmail.com</td>
                            <td>1234-5678-9102</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>larry@yahoo.com</td>
                            <td>1234-5678-9102</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Larry</td>
                            <td>Jellybean</td>
                            <td>lajelly@gmail.com</td>
                            <td>1234-5678-9102</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Larry</td>
                            <td>Kikat</td>
                            <td>akitkat@gmail.com</td>
                            <td>1234-5678-9102</td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>amdo@gmail.com</td>
                            <td>1234-5678-9102</td>
                        </tr>
                        <tr>
                            <th scope="row">7</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>faty@gmail.com</td>
                            <td>1234-5678-9102</td>
                        </tr>
                        <tr>
                            <th scope="row">8</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>larry@yahoo.com</td>
                            <td>1234-5678-9102</td>
                        </tr>
                        <tr>
                            <th scope="row">9</th>
                            <td>Larry</td>
                            <td>Jellybean</td>
                            <td>lajelly@gmail.com</td>
                            <td>1234-5678-9102</td>
                        </tr>
                        <tr>
                            <th scope="row">10</th>
                            <td>Larry</td>
                            <td>Kikat</td>
                            <td>akitkat@gmail.com</td>
                            <td>1234-5678-9102</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
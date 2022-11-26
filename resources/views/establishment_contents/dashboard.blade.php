@extends('establishment_master_template.master')
@section('content')
    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-6 col-md-6 col-sm-3 col-xs-6">
            <div class="info-box bg-teal hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">person</i>
                </div>
                <div class="content">
                    <div class="text">VISITORS EVERY HOUR</div>
                    <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-3 col-xs-6">
            <div class="info-box bg-amber hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">people</i>
                </div>
                <div class="content">
                    <div class="text">VISITORS IN A DAY</div>
                    <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Widgets -->
    

@endsection
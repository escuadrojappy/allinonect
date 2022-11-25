@extends('establishment_master_template.master')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-indigo">
                <h2>
                    Profile <small>View your profile.</small>
                </h2>
            </div>
            <div class="body">
                <form>
                    <label for="email_address">Business Name</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" readonly id="email_address" class="form-control" placeholder="Enter your email address" value="SM Cabanatuan City">
                        </div>
                    </div>
                    <label for="text">Business Address</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" readonly id="password" class="form-control" placeholder="Enter your password" value="Cabanatuan City">
                        </div>
                    </div>
                    <label for="email_address">Email Address</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" readonly id="email_address" class="form-control" placeholder="Enter your email address" value="smcab@gmail.com">
                        </div>
                    </div>
                    <label for="number">Contact Number</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" readonly id="number" class="form-control" placeholder="Contact" value="09653269782">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
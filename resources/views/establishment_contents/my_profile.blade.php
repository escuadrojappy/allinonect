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
                        <div class="form-line name-establishment">
                            <input type="text" readonly id="email_address" class="form-control" placeholder="Enter your email address">
                        </div>
                    </div>
                    <label for="text">Business Address</label>
                    <div class="form-group">
                        <div class="form-line address-establishment">
                            <input type="text" readonly id="password" class="form-control" placeholder="Enter your password">
                        </div>
                    </div>
                    <label for="email_address">Email Address</label>
                    <div class="form-group">
                        <div class="form-line email-establishment">
                            <input type="text" readonly id="email_address" class="form-control" placeholder="Enter your email address">
                        </div>
                    </div>
                    <label for="number">Contact Number</label>
                    <div class="form-group">
                        <div class="form-line contact-number-establishment">
                            <input type="number" readonly id="number" class="form-control" placeholder="Contact">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-indigo">
                <h2>
                    Password <small>Change your password.</small>
                </h2>
            </div>
            <div class="body">
                <form>
                    <label for="email_address">Current Password</label>
                    <div class="form-group">
                        <div class="form-line ">
                            <input type="password" id="current_password" class="form-control" placeholder="Enter your current password">
                        </div>
                    </div>
                    <label for="text">New Password</label>
                    <div class="form-group">
                        <div class="form-line ">
                            <input type="password" id="new_password" class="form-control" placeholder="Enter your new password">
                        </div>
                    </div>
                    <label for="email_address">Confirm New Password</label>
                    <div class="form-group">
                        <div class="form-line ">
                            <input type="password" id="confirm_password" class="form-control" placeholder="Confirm new password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Change Password
                    </button>
                </form>
            </div>
        </div>
    </div> 





@endsection
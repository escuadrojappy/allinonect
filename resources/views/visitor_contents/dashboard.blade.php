@extends('visitor_master_template.master')
@section('content')
<div class="col-xs-12 col-m-3">
    <div class="card profile-card">
        <div class="profile-header bg-indigo">&nbsp;</div>
        <div class="profile-body">
            <div class="content-area">
                <h3 class="name-visitor"></h3>
                <p>Health Status: </p>
                <p class="covid-result-visitor"></p>
            </div>
        </div>
        <div class="profile-footer">
            <ul>
                <li>
                    <span>Address</span>
                    <span class="address-visitor"></span>
                </li>
                <li>
                    <span>Birthdate</span>
                    <span class="birthdate-visitor"></span>
                </li>
                <li>
                    <span>Contact Number</span>
                    <span id="contact_number" class="contact-number-visitor"></span>
                </li>
            </ul>
            {{-- <button class="btn btn-primary btn-sm waves-effect float-end" onclick="openContactForm()" aria-label="Close">Edit Contact Number</button> --}}
            
            <div class="form-popup" id="contactNumberForm">
                <form action="" class="form-container form-floating mb-3">
                    <label for="number"><h3>Contact Number</h3></label>
                    <input type="number" class="form-control" placeholder="Enter Contact Number" id="number">
                    <br><br>
                    <button type="button" class="btn" onclick="closeForm()">Apply Changes</button>
                    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                </form>
                </div>
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
                <label for="email_address">Old Password</label>
                <div class="form-group">
                    <div class="form-line ">
                        <input type="password" id="email_address" class="form-control" placeholder="Enter your old password">
                    </div>
                </div>
                <label for="text">New Password</label>
                <div class="form-group">
                    <div class="form-line ">
                        <input type="password" id="password" class="form-control" placeholder="Enter your new password">
                    </div>
                </div>
                <label for="email_address">Re-type Password</label>
                <div class="form-group">
                    <div class="form-line ">
                        <input type="password" id="email_address" class="form-control" placeholder="Re-type password">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    Change Password
                </button>
            </form>
        </div>
    </div>
</div>


<script>
function openContactForm() {
  document.getElementById("contactNumberForm").style.display = "block";
}

function closeForm() {
  document.getElementById("contactNumberForm").style.display = "none";
}

$('#number').keyup(function(closeForm){
    $('#contact_number').text(this.value);
});
</script>
    
@endsection
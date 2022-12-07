@extends('visitor_master_template.master')
@section('content')

<script src="{{ asset('/js/common.js') }}"></script>

<div class="col-xs-12 col-m-3">
    <div class="card profile-card">
        <div class="profile-header" style="background: #1C177A">&nbsp;</div>
        <div class="profile-body">
            <div class="content-area">
                <h3>Juan Dela Cruz</h3>
                <p>Health Status: Negative</p>
            </div>
        </div>
        <div class="profile-footer">
            <ul>
                <li>
                    <span>Address</span>
                    <span>110 Brgy. Bantug Norte, Cabanatuan City</span>
                </li>
                <li>
                    <span>Birthdate</span>
                    <span>12/10/2022</span>
                </li>
                <li>
                    <span>Contact Number</span>
                    <span id="contact_number">09610333636</span>
                </li>
            </ul>
            <button class="btn btn-primary btn-sm waves-effect float-end" onclick="openContactForm()" aria-label="Close">Edit Contact Number</button>
            
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
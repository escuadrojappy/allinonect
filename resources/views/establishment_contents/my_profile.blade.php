@extends('establishment_master_template.master')
@section('content')
<script src="{{ asset('/js/common.js') }}"></script>
<div class="card profile-card border">
    <div class="profile-header headercolor">&nbsp;</div>
    <div class="profile-body bordercolor">
        <div class="image-area">
            <img src="http://localhost/allinonect/public/dashboard/images/pacific.png" alt="AdminBSB - Profile Image" class="establishmentpicture">
        </div>
        <div class="content-area">
            <h3 id="NAME">N.E Pacific</h3> 
            <h4 id="location">Cabanatuan City, Nueva Ecija</h4> 

            <button class="open-button" onclick="openForm()" aria-label="Close">Edit </button>

            <div class="form-popup" id="myForm">
            <form action="" class="form-container">
                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="Enter Name" id="name1" name="name1"   >

                <label for="address"><b>Address</b></label>
                <input type="text" placeholder="Enter Address" id="address" >


                <button type="button" class="btn" onclick="closeForm()">Apply Changes</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
            </div>
                
        </div>
    </div>
   
</div>  



<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

$('#name1').keyup(function(closeForm){
    $('#NAME').text(this.value);
});

$('#address').keyup(function(){
    $('#location').text(this.value);
});

$('#email').keyup(function(){
    $('#emaildoh').text(this.value);
});

</script>





@endsection
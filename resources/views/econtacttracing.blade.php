@extends('master.mastertemplateestablishment')
@section('content')
<link rel="stylesheet" href="{{ asset('css/econtactracing.css') }}">
   
   
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bx-shield-quarter'></i>
      <span class="logo_name">All in One </span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="edashboard">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="establishmentprofile">
            <i class='bx bx-user' ></i>
            <span class="links_name">Profile</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Settings</span>
          </a>
        </li>
        <li>
          <a href="econtacttracing" class="active">
            <i class='bx bxs-user-account' ></i>
            <span class="links_name">Contact Tracing</span>
          </a>
        </li>
        <li>
          <a href="econtactreport">
            <i class='bx bxs-report' ></i>
            <span class="links_name">Contact Report</span>
          </a>
        </li>
        
        <li>

        <li class="log_out">
          <a href="#">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Sign Out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <img src="images/Establishment.png" alt="">
        <span class="admin_name">SM City Cabanatuan</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    
    <div class="home-content">
        

      <div class="boxes">
        <div class=" box1">
          <div class="title"><b>SM CITY CABANATUAN</b></div>
          <div class="sales-details">

          <ul class="details">
              <li class="topic">VID</li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
            </ul>
            


            <ul class="details">
              <li class="topic">Last Name</li>
              <li><a href="#">Forger</a></li>
              <li><a href="#">Forger</a></li>
              <li><a href="#">Forger</a></li>
              <li><a href="#">Kamado</a></li>
              <li><a href="#">Gwapo</a></li>
            </ul>

            <ul class="details">
              <li class="topic">First Name</li>
              <li><a href="#">Anya</a></li>
              <li><a href="#">Loid</a></li>
              <li><a href="#">Yor</a></li>
              <li><a href="#">Tanjiro</a></li>
              <li><a href="#">Pedro</a></li>
            </ul>

            <ul class="details">
            <li class="topic">PCN</li>
            <li><a href="#">1234-5678-9123</a></li>
            <li><a href="#">9873-4561-2320</a></li>
            <li><a href="#">8765-4321-0123</a></li>
            <li><a href="#">6123-0234-5678</a></li>
            <li><a href="#">2345-6789-1023</a></li>
          </ul>

          <ul class="details">
            <li class="topic">Date</li>
            <li><a href="#">November 3, 2022</a></li>
            <li><a href="#">November 3, 2022</a></li>
            <li><a href="#">November 3, 2022</a></li>
            <li><a href="#">November 3, 2022</a></li>
            <li><a href="#">November 3, 2022</a></li>
            </ul>

          <ul class="details">
            <li class="topic">Time</li>
            <li><a href="#">12:34 pm</a></li>
            <li><a href="#">12:40 pm</a></li>
            <li><a href="#">12:41 pm</a></li>
            <li><a href="#">12:48 pm</a></li>
            <li><a href="#">01:22 pm</a></li>
            </ul>

          </ul>

            


          </div>
          <!-- <div class="button">
            <a href="#">See All</a>
          </div> -->
        </div>

        
      
      </div>
    </div>


    <!-- CONTACT TRACING DATA div-->
    <div class="home-content">

      <div class="boxes">
        <div class=" box1">
          <div class="title"><b>CONTRACT TRACING DATA</b></div><br>
          <div class="sales-details">

          <div class="container text-left">
          <div class="row">
      <div class="col">
        <p>Date</p><br>
        <p>Time of Visit</p><br>
        <p>Last Name</p><br>
        <p>First Name</p><br>
        <p>PhilSys Card Number</p>
      </div>
    
    <div class="col">
      <form>
        
        <div class="form-group">
    <input type="date" class="form-control-sm" id="date" placeholder="">
        </div>
        <br>
        
        <div class="form-group">
    <input type="time" class="form-control-sm" id="date" placeholder="">
        </div>
        <br>
        
        <div class="form-group">
    <input type="name" class="form-control-sm" id="lastname" placeholder="">
        </div>
        <br>
        
        <div class="form-group">
    <input type="name" class="form-control-sm" id="firstname" placeholder="">
        </div>
        <br>
        
        <div class="form-group">
    <input type="name" class="form-control-sm" id="pcn" placeholder="">
        </div>
        
      </form>
    </div>
    
    <div class="col">
      <p>Date</p><br>
      <p>Time of Visit</p><br>
      <p>Last Name</p><br>
      <p>First Name</p><br>
      <p>PhilSys Card Number</p>
    </div>
    
    <div class="col">
      <form>
        
        <div class="form-group">
    <input type="date" class="form-control-sm" id="date" placeholder="">
        </div>
        <br>
        
        <div class="form-group">
    <input type="time" class="form-control-sm" id="date" placeholder="">
        </div>
        <br>
        
        <div class="form-group">
    <input type="name" class="form-control-sm" id="lastname" placeholder="">
        </div>
        <br>
        
        <div class="form-group">
    <input type="name" class="form-control-sm" id="firstname" placeholder="">
        </div>
        <br>
        
        <div class="form-group">
    <input type="name" class="form-control-sm" id="pcn" placeholder="">
        </div>
        
      </form>
    </div>
    
    
     <div class="mt-3 container text-center">
    <button type="button" class="col-3 btn btn-success" id="btnSave">Save</button>
    <button type="button" class="col-3 btn btn-danger" data-bs-target="#registerModal" data-bs-toggle="modal" id="btnClear">Clear</button>
  </div>
    
  </div>
</div>



          
          

        
      
      </div>
    </div>



     <!-- <div class="home-content">

      <div class="boxes">
        <div class=" box1">
          <div class="title"><b>CONTRACT TRACING DATA</b></div>
          <div class="sales-details">



          
          <ul class="details">
              <li>Date</li>
              <li>Time of Visit</li>
              <li>Last Name</li>
              <li>First Name</li>
              <li>PhilSys Card Number</li>
            </ul>
            

            <form action="" class = "form-box">
            <ul class="details details-box">
              <li>Forger</li>
              <li>Forger</li>
              <li>Forger</li>
              <li>Kamado</li>
              <li>Gwapo</li>
            </ul>

            </form>

            <ul class="details">
            <li>Date</li>
              <li>Time of Visit</li>
              <li>Last Name</li>
              <li>First Name</li>
              <li>PhilSys Card Number</li>
            </ul>

            <form class = "form-box">
            <ul class="details details-box">
            <li>1234-5678-9123</li>
            <li>9873-4561-2320</li>
            <li>8765-4321-0123</li>
            <li>6123-0234-5678</li>
            <li>2345-6789-1023</li>
            </ul>
            </form>
          </ul>
         
        </div>

        <div class = "details">
          <button type="button" class="btn btn-danger btn-sm float-end">Clear</button>
        </div>
        <div class = "details">  
          <button type="button" class="btn btn-success btn-sm float-end">Save</button>
        </div>

        
      
      </div>
    </div> -->


    
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>
@endsection

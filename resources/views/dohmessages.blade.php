<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/econtactracing.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>DOH</title>
   </head>
<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bx-shield-quarter'></i>
      <span class="logo_name">All in One </span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="dohdashboard">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="dohprofile">
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
          <a href="dohaccountrequest">
            <i class='bx bxs-user-account' ></i>
            <span class="links_name">Account Request</span>
          </a>
        </li>
        <li>
          <a href="dohcontactreport">
            <i class='bx bxs-report' ></i>
            <span class="links_name">Contact Report</span>
          </a>
        </li>
        <li>
            <a href="dohmessages" class="active">
              <i class='bx bxs-report' ></i>
              <span class="links_name">Messages</span>
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
        <span class="admin_name">Department of Health</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    
    <div class="home-content">
        

      <div class="boxes">
        <div class=" box1">
          <div class="title"><b>Department of Health</b></div>
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
    <p type="date" class="form-control-sm" id="date" placeholder="">November 3, 2022</p>
        </div>
        <br>
        
        <div class="form-group">
    <p type="time" class="form-control-sm" id="date" placeholder="">12:34 pm </p>
        </div>
        <br>
        
        <div class="form-group">
    <p type="name" class="form-control-sm" id="lastname" placeholder="">Forger </p>
        </div>
        <br>
        
        <div class="form-group">
    <p type="name" class="form-control-sm" id="firstname" placeholder="">Anya </p>
        </div>
        <br>
        
        <div class="form-group">
    <p type="name" class="form-control-sm" id="pcn" placeholder="">1234-5678-9123</p>
        </div>
        
      </form>
    </div>

     <div class="mt-3 container text-center">
    <button type="button" class="col-3 btn btn-success" id="btnSave">Delete</button>
    <button type="button"  class="col-3 btn btn-danger" data-bs-toggle="modal" data-bs-target="#messageModal" id="btnMessage">Message</button>
  </div>
</div>
    
  </div>
</div>



          
          

        
      
      </div>
    </div>

    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Message</label>
                    <div class="col-sm-10">
                      <textarea class="form-control"></textarea>
                    </div>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Send</button>
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

$(`#btnMessage`).click(() => {
    
  });

 </script>

</body>
</html>

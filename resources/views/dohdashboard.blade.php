<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/dohdashboard.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>DOH-DASHBOARD</title>
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bx-shield-quarter'></i>
      <span class="logo_name">All in One </span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="#" class="active">
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
          <a href="dohmessages">
            <i class='bx bx-message' ></i>
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
        <img src="{{ asset('images/doh.png') }}" alt="">
        <span class="admin_name">Department of Health</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Account Requests</div>
            <div class="number">876</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up 20 mins ago</span>
            </div>
          </div>
          <i class='bx bxs-face alt cart'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Messages</div>
            <div class="number">343</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up 1hr ago</span>
            </div>
          </div>
          <i class='bx bxs-chat cart two' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Reports</div>
            <div class="number">25</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up 1hr ago</span>
            </div>
          </div>
          <i class='bx bxs-report cart three' ></i>
        </div>

      </div>

      <div class="boxes">
        <div class=" box1">
          <div class="title">Individual/Users</div>
          <div class="sales-details">
            <ul class="details">
              <li class="topic">Name</li>
              <li><a href="#">Anya Forger</a></li>
              <li><a href="#">Loid Forger</a></li>
              <li><a href="#">Yor Forger</a></li>
              <li><a href="#">Tanjiro Kamado</a></li>
              <li><a href="#">Pedro Gwapo</a></li>
              <li><a href="#">Juan Dela Cruz</a></li>
              <li><a href="#">Hikigaya Hachiman</a></li>
              <li><a href="#">Killua Zoldyck</a></li>
            </ul>

            <ul class="details">
              <li class="topic">Email</li>
              <li><a href="#">Anya@gmail.com</a></li>
              <li><a href="#">Loid@gmail.com</a></li>
              <li><a href="#">Yor@yahoo.com</a></li>
              <li><a href="#">Tanjiro12@gmail.com</a></li>
              <li><a href="#">Pedro4@yahoo.com</a></li>
              <li><a href="#">Juan14@yahoo.com</a></li>
              <li><a href="#">Hachiman@gmail.com</a></li>
              <li><a href="#">Killuazoldyck@gmail.com</a></li>

            </ul>

            <ul class="details">
            <li class="topic">User ID</li>
            <li><a href="#">1234</a></li>
            <li><a href="#">6251</a></li>
            <li><a href="#">1241</a></li>
            <li><a href="#">6791</a></li>
            <li><a href="#">4512</a></li>
            <li><a href="#">1236</a></li>
            <li><a href="#">7865</a></li>
            <li><a href="#">2145</a></li>

          </ul>


          </div>
          <div class="button">
            <a href="#">See All</a>
          </div>
        </div>
        <div class="box2">
          <div class="title">ESTABLISHMENTS</div>
          <ul class="establishment">
            <li>
            <a href="#">
              <span class="Mall">Robinson's Mall</span>
            </a>
            <span class="status">Active</span>
          </li>
          <li>
            <a href="#">
              <span class="Mall">N.E Pacific Mall </span>
            </a>
            <span class="Mall">Pending</span>
          </li>
          <li>
            <a href="#">
              <span class="Mall">SM< Cabanatuan</span>
            </a>
            <span class="status">Active</span>
          </li>
          <li>
            <a href="#">
              <span class="Mall">SM Mega Cabanatuan</span>
            </a>
            <span class="status">Active</span>
          </li>
          <li>
            <a href="#">
              <span class="Mall">Walter Mart</span>
            </a>
            <span class="status">Pending</span>
          </li>
          <li>
            <a href="#">
              <span class="Mall">AllHome Cabanatuan</span>
            </a>
            <span class="status">Active</span>


          </ul>
        </div>
      </div>
    </div>
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

</body>
</html>
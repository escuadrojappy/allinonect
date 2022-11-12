<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/econtactreport.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Contact Report</title>
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bx-shield-quarter'></i>
      <span class="logo_name">All in One </span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="edashboard" class="">
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
          <a href="econtacttracing">
            <i class='bx bxs-user-account' ></i>
            <span class="links_name">Contact Tracing</span>
          </a>
        </li>
        <li>
          <a href="econtactreport" class="active">
            <i class='bx bxs-report' ></i>
            <span class="links_name">Contact Report</span>
          </a>
        </li>
        {{-- <li>
          <a href="#">
            <i class='bx bx-message' ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li> --}}

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
        <span class="dashboard" style="font-size: 20px">Contact Report</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <i class='bx bx-search' ></i>
      </div>
      <div class="profile-details">
        <img src="{{ asset('images/Establishment.png') }}" alt="">
        <span class="admin_name">SM Cabanatuan</span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="home-content">
      {{-- <div class="overview-boxes">
        <div class="box">
          {{-- <div class="right-side">
            <div class="box-topic">Account Requests</div>
            <div class="number">876</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up 20 mins ago</span> --}}
            {{-- </div>
          </div>
          <i class='bx bxs-face alt cart'></i>
        </div>
        <div class="box"> --}} 
          {{-- <div class="right-side">
            <div class="box-topic">Messages</div>
            <div class="number">343</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up 1hr ago</span>
            </div> --}}
          {{-- </div>
          <i class='bx bxs-chat cart two' ></i>
        </div>
        <div class="box"> --}}
          {{-- <div class="right-side">
            <div class="box-topic">Reports</div>
            <div class="number">25</div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up 1hr ago</span> --}}
            {{-- </div>
          </div>
          <i class='bx bxs-report cart three' ></i>
        </div> --}}

      {{-- </div> --}}

      <div class="boxes">
        <div class=" box1">
          <div class="title">SM Cabanatuan Contact Report</div>
          <div class="sales-details">
            <ul class="details">
                <li class="topic">VID</li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">6</a></li>
                <li><a href="#">7</a></li>
                <li><a href="#">8</a></li>
                <li><a href="#">9</a></li>
                <li><a href="#">10</a></li>
                <li><a href="#">11</a></li>
              </ul>
            <ul class="details">
              <li class="topic">Last Name</li>
              <li><a href="#">Forger</a></li>
              <li><a href="#">Forger</a></li>
              <li><a href="#">Forger</a></li>
              <li><a href="#">Kamado</a></li>
              <li><a href="#">Gwapo</a></li>
              <li><a href="#">Dela Cruz</a></li>
              <li><a href="#">Hachiman</a></li>
              <li><a href="#">Zoldyck</a></li>
              <li><a href="#">Forger</a></li>
              <li><a href="#">Forger</a></li>
              <li><a href="#">Forger</a></li>
            </ul>

            <ul class="details">
                <li class="topic">First Name</li>
                <li><a href="#">Anya</a></li>
                <li><a href="#">Loid</a></li>
                <li><a href="#">Yor</a></li>
                <li><a href="#">Tanjiro</a></li>
                <li><a href="#">Pedro</a></li>
                <li><a href="#">Juan</a></li>
                <li><a href="#">Hikigaya</a></li>
                <li><a href="#">Killua</a></li>
                <li><a href="#">Anya</a></li>
                <li><a href="#">Loid</a></li>
                <li><a href="#">Yor</a></li>
              </ul>
            
              <ul class="details">
                <li class="topic">Middle Name</li>
                <li><a href="#">Flores</a></li>
                <li><a href="#">Vicente</a></li>
                <li><a href="#">Flores</a></li>
                <li><a href="#">Quirino</a></li>
                <li><a href="#">Dantes</a></li>
                <li><a href="#">Santiago</a></li>
                <li><a href="#">Lopez</a></li>
                <li><a href="#">Delos Santos</a></li>
                <li><a href="#">Flores</a></li>
                <li><a href="#">Vicente</a></li>
                <li><a href="#">Flores</a></li>
              </ul>

            <ul class="details">
              <li class="topic">PCN</li>
              <li><a href="#">1234-6567-6532-7886</a></li>
              <li><a href="#">7853-6542-6532-9879</a></li>
              <li><a href="#">6432-8653-8742-5568</a></li>
              <li><a href="#">8854-8632=5789-8533</a></li>
              <li><a href="#">1155-6428-7790-5427</a></li>
              <li><a href="#">5536-7543-8542-8843</a></li>
              <li><a href="#">6679-9642-8531-6432</a></li>
              <li><a href="#">7789-9642-9653-8842</a></li>
              <li><a href="#">1234-6567-6532-7886</a></li>
              <li><a href="#">7853-6542-6532-9879</a></li>
              <li><a href="#">6432-8653-8742-5568</a></li>

            </ul>

            <ul class="details">
                <li class="topic">Date</li>
                <li><a href="#">August 2, 2022</a></li>
                <li><a href="#">August 2, 2022</a></li>
                <li><a href="#">August 2, 2022</a></li>
                <li><a href="#">August 2, 2022</a></li>
                <li><a href="#">August 2, 2022</a></li>
                <li><a href="#">August 2, 2022</a></li>
                <li><a href="#">August 2, 2022</a></li>
                <li><a href="#">August 2, 2022</a></li>
                <li><a href="#">August 2, 2022</a></li>
                <li><a href="#">August 2, 2022</a></li>
                <li><a href="#">August 2, 2022</a></li>
              </ul>

            <ul class="details">
            <li class="topic">Time</li>
            <li><a href="#">12:34 PM</a></li>
            <li><a href="#">2:51 PM</a></li>
            <li><a href="#">2:41 PM</a></li>
            <li><a href="#">7:11 PM</a></li>
            <li><a href="#">4:12 PM</a></li>
            <li><a href="#">12:36 PM</a></li>
            <li><a href="#">7:56 AM</a></li>
            <li><a href="#">1:45 PM</a></li>
            <li><a href="#">12:34 PM</a></li>
            <li><a href="#">2:51 PM</a></li>
            <li><a href="#">2:41 PM</a></li>
          </ul>


          </div>
          <a href="#"><button class="btn">Print</a></button>
        </div>
        {{-- <div class="box2">
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
        </div> --}}
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
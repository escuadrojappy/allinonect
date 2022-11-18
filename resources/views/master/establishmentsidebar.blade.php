 <div class="sidebar">
    <div class="logo-details">
      <i class='bx bx-shield-quarter'></i>
      <span class="logo_name">All in One </span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="edashboard" class="{{ Request::is('edashboard') ? 'active' : '' }}">
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
          <a href="econtacttracing" class="{{ Request::is('econtacttracing') ? 'active' : '' }}">
            <i class='bx bxs-user-account' ></i>
            <span class="links_name">Contact Tracing</span>
          </a>
        </li>
        <li>
          <a href="econtactreport" class="{{ Request::is('econtactreport') ? 'active' : '' }}">
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
<section>
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{ asset('/dashboard/images/doh-logo.png') }}" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Name of Establishment</div>
                <div class="email">email@gmail.com</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="/allinonect/public/establishment/setting">
                                <i class="material-icons">
                                    settings
                                </i>
                                Setting
                            </a>
                        </li>
                        <li>
                            <a href="/allinonect/public/login/establishment">
                                <i class="material-icons">
                                    input
                                </i>
                                Sign Out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MENU</li>
                <li class="{{ Request::is('establishment/dashboard') ? 'active' : '' }}">
                    <a href="/allinonect/public/establishment/dashboard">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">people</i>
                        <span>Contacts</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="/allinonect/public/establishment/contacts/contactreport">Contact Report</a>
                        </li>
                        <li>
                            <a href="/allinonect/public/establishment/contacts/contacttracing">Contact Tracing</a>
                        </li>
                    </ul>
                </li>
                
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2022 <a href="javascript:void(0);">All-in-One Contact Tracing</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.0
            </div>
        </div>
        <!-- #Footer -->
    </aside>
</section>
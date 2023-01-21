<section>
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info leftcolor">
            <div class="image">
                <img src="{{ asset('images/citizen.png') }}" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name name-visitor" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>
                <div class="email email-visitor"></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a class="logout">
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
                <li class="{{ Request::is('citizen/dashboard') ? 'active' : '' }}">
                    <a href="{{config('app.url')}}citizen/dashboard">
                        <i class="material-icons">dashboard</i>
                        <span>Profile</span>
                    </a>
                </li>

                <li class="{{ Request::is('citizen/dashboard') ? 'active' : '' }}">
                    <a href="{{config('app.url')}}citizen/dashboard">
                        <i class="material-icons">local_hospital</i>
                        <span>Health Status Logs</span>
                    </a>
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

<script>
    $(document).on('click', '.logout', function (e) {
        e.preventDefault()
        get(`${apiUrl}auth/logout`).done(() => {
            location.href = webUrl + 'login/citizen'
        }).fail((error) => {
            console.log(error)
        })
    })
</script>
<section>
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{ asset('/dashboard/images/doh-logo.png') }}" width="48" height="48" alt="User" class="establishment-logo" />
            </div>
            <div class="info-container">
                <div class="name name-establishment" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>
                <div class="email email-establishment"></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="{{config('app.url')}}establishment/my_profile">
                                <i class="material-icons">
                                    person
                                </i>
                                My Profile
                            </a>
                        </li>

                        <li>
                            <a href="{{config('app.url')}}establishment/change_password">
                                <i class="material-icons">
                                    https
                                </i>
                                Change Password
                            </a>
                        </li>

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
                <li class="{{ Request::is('establishment/dashboard') ? 'active' : '' }}">
                    <a href="{{config('app.url')}}establishment/dashboard">
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
                            <a href="{{config('app.url')}}establishment/contacts/contactreport">Contact Report</a>
                        </li>
                        <li>
                            <a href="{{config('app.url')}}establishment/contacts/contacttracing">Contact Tracing</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ Request::is('establishment/qrscanner') ? 'active' : '' }}">
                    <a href="{{config('app.url')}}establishment/qrscanner">
                        <i class="material-icons">qr_code_scanner</i>
                        <span>QR Code Scanner</span>
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
            location.href = webUrl + 'login/establishment'
        }).fail((error) => {
            console.log(error)
        })
    })
</script>
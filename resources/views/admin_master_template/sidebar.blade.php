<section>
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info leftcolor">
            <div class="image">
                <img src="{{ asset('/dashboard/images/doh-logo.png') }}" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Department of Health</div>
                <div class="email">admin@gmail.com</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="{{config('app.url')}}admin/my_profile">
                                <i class="material-icons">
                                    person
                                </i>
                                My Profile
                            </a>
                        </li>

                        <li>
                            <a href="{{config('app.url')}}admin/recently-deleted">
                                <i class="material-icons">
                                delete
                                </i>
                                Recently Deleted
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
                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{config('app.url')}}admin/dashboard">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="">
                        <i class="material-icons">text_fields</i>
                        <span></span>
                    </a>
                </li>
                <li>
                    <a href="pages/helper-classes.html">
                        <i class="material-icons">layers</i>
                        <span>Helper Classes</span>
                    </a>
                </li> --}}
                {{-- <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">widgets</i>
                        <span>Widgets</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Cards</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="pages/widgets/cards/basic.html">Basic</a>
                                </li>
                                <li>
                                    <a href="pages/widgets/cards/colored.html">Colored</a>
                                </li>
                                <li>
                                    <a href="pages/widgets/cards/no-header.html">No Header</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Infobox</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="pages/widgets/infobox/infobox-1.html">Infobox-1</a>
                                </li>
                                <li>
                                    <a href="pages/widgets/infobox/infobox-2.html">Infobox-2</a>
                                </li>
                                <li>
                                    <a href="pages/widgets/infobox/infobox-3.html">Infobox-3</a>
                                </li>
                                <li>
                                    <a href="pages/widgets/infobox/infobox-4.html">Infobox-4</a>
                                </li>
                                <li>
                                    <a href="pages/widgets/infobox/infobox-5.html">Infobox-5</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li > --}}
                <li class="{{ Request::is('admin/useraccounts/establishment') ? 'active' : '' }} {{ Request::is('admin/useraccounts/visitor') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">people</i>
                        <span>User Accounts</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{{ Request::is('admin/useraccounts/establishment') ? 'active' : '' }}">
                            <a href="{{config('app.url')}}admin/useraccounts/establishment">Establishments</a>
                        </li>
                        <li class="{{ Request::is('admin/useraccounts/visitor') ? 'active' : '' }}">
                            <a href="{{config('app.url')}}admin/useraccounts/visitor">Citizens</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ Request::is('admin/contactreport') ? 'active' : '' }}">
                    <a href="{{config('app.url')}}admin/contactreport">
                        <i class="material-icons">import_contacts</i>
                        <span>Contact Report</span>
                    </a>
                </li>


                <li class="{{ Request::is('admin/covid-result-logs') ? 'active' : '' }}">
                    <a href="{{config('app.url')}}admin/covid-result-logs">
                        <i class="material-icons">list</i>
                        <span>Covid Result Logs</span>
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
            location.href = webUrl + 'login/admin'
        }).fail((error) => {
            console.log(error)
        })
    })
</script>
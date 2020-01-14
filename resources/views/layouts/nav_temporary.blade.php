



<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->
<aside class="page-sidebar">
    <div class="page-logo">
        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
            <img src="NewSmartAdmin/img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
            <span class="page-logo-text mr-1">SmartAdmin WebApp</span>
            <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
        </a>
    </div>
    <!-- end user info -->

    <!-- NAVIGATION : This navigation is also responsive-->
    <nav id="js-primary-nav" class="primary-nav" role="navigation">
        <div class="nav-filter">
            <div class="position-relative">
                <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
                <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                    <i class="fal fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="info-card">
            <img src="NewSmartAdmin/img/demo/avatars/avatar-admin.png" class="profile-image rounded-circle" alt="Dr. Codex Lantern">
            <div class="info-card-text">
                <a href="#" class="d-flex align-items-center text-white">
                                    <span class="text-truncate text-truncate-sm d-inline-block">
                                        Dr. Codex Lantern
                                    </span>
                </a>
                <span class="d-inline-block text-truncate text-truncate-sm">Toronto, Canada</span>
            </div>
            <img src="NewSmartAdmin/img/card-backgrounds/cover-2-lg.png" class="cover" alt="cover">
            <a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
                <i class="fal fa-angle-down"></i>
            </a>
        </div>
        <ul id="js-nav-menu" class="nav-menu">

            <li class="{{ $controller_name=='start'?'active':'inactive' }}">
                <a href="/admin"><i class="fa fa-lg fa-fw fa-home"></i> <span
                            class="nav-link-text">Home</span></a>
            </li>
            <li class="nav-title">Tools & Components</li>
            <li class="{{ $controller_name=='estates'?'active':'inactive' }}">
                <a href="#"><i class="fa fa-lg fa-fw fa-group"></i>
                    <span class="nav-link-text">Real Estate</span>
                </a>
                <ul>
                    <li class="{{ $controller_name=='estates'?'active':'inactive' }}">
                        <a href="/admin/estates/"><i class="fa fa-lg fa-fw fa-map"></i>
                            <span class="nav-link-text">Active</span>
                        </a>
                    </li>

                    <li class="{{ $controller_name=='premoderation'?'active':'inactive' }}">
                        <a href="/admin/estates/moderation-create"><i class="fa fa-lg fa-fw fa-map"></i>
                            <span class="nav-link-text">Unmoderated</span>
                        </a>
                    </li>
                    <!--<li class="{{ $controller_name=='moderation'?'active':'inactive' }}">
                        <a href="/admin/estate/moderation-change"><i class="fa fa-lg fa-fw fa-map"></i>
                            <span class="nav-link-text">Moderation change</span>
                        </a>
                    </li>-->

                    <li class="{{ $controller_name=='paused'?'active':'inactive' }}">
                        <a href="/admin/estates/paused"><i class="fa fa-lg fa-fw fa-map"></i>
                            <span class="nav-link-text">Paused</span>
                        </a>
                    </li>

                    <!--<li class="{{ $controller_name=='deleted'?'active':'inactive' }}">
                        <a href="/admin/estates/deleted"><i class="fa fa-lg fa-fw fa-map"></i>
                            <span class="nav-link-text">Deleted</span>
                        </a>
                    </li>-->
                </ul>
            </li>

            <li class="{{ $controller_name=='categories'?'active':'inactive' }}">
                <a href="/admin/categories"><i class="fa fa-lg fa-fw fa-language "></i>
                    <span class="nav-link-text">Property Types</span>
                </a>
            </li>

            <li class="{{ $controller_name=='messages'?'active':'inactive' }}">
                <a href="#"><i class="fa fa-lg fa-fw fa-group"></i>
                    <span class="nav-link-text">Notification</span>
                </a>
                <ul>
                    <li class="{{ $controller_name=='estate_message'?'active':'inactive' }}">
                        <a href="/admin/messages/estate"><i class="fa fa-lg fa-fw fa-map"></i>
                            <span class="nav-link-text">Request form</span>
                        </a>
                    </li>

                    <li class="{{ $controller_name=='contact_message'?'active':'inactive' }}">
                        <a href="/admin/messages/contact"><i class="fa fa-lg fa-fw fa-map"></i>
                            <span class="nav-link-text">Contact form</span>
                        </a>
                    </li>

                    <li class="{{ $controller_name=='create_update'?'active':'inactive' }}">
                        <a href="/admin/messages/create-update"><i class="fa fa-lg fa-fw fa-map"></i>
                            <span class="nav-link-text">Create/Update</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="{{ $controller_name=='tag'?'active':'inactive' }}">
                <a href="/admin/tags"><i class="fa fa-lg fa-fw fa-bookmark-o"></i>
                    <span class="nav-link-text">Tags</span>
                </a>
            </li>

            <li class="{{ $controller_name=='city'?'active':'inactive' }}">
                <a href="/admin/city"><i class="fa fa-lg fa-fw fa-bookmark-o"></i>
                    <span class="nav-link-text">Areas</span>
                </a>
            </li>

            <li class="{{ $controller_name=='pages'?'active':'inactive' }}">
                <a href="/admin/pages"><i class="fa fa-lg fa-fw fa-bookmark-o"></i>
                    <span class="nav-link-text">Site Pages</span>
                </a>
            </li>

            <li class="{{ $controller_name=='articles'?'active':'inactive' }}">
                <a href="/admin/articles"><i class="fa fa-lg fa-fw fa-building"></i>
                    <span class="nav-link-text">Articles</span>
                </a>
            </li>
            <li class="{{ $controller_name=='owners'?'active':'inactive' }}">
                <a href="/admin/owners"><i class="fa fa-lg fa-fw fa-building"></i>
                    <span class="nav-link-text">Owners</span>
                </a>
            </li>

            <li>
                <a href="#" title="Dashboard"><i class="fa fa-lg fa-fw fa-cubes"></i> <span
                            class="nav-link-text">Admins</span></a>
                <ul>

                    <li class="{{ $controller_name=='permissions'?'active':'inactive' }}">
                        <a href="/admin/permissions"><i class="fa fa-lg fa-fw fa-map"></i> <span
                                    class="nav-link-text">Permissions</span>
                        </a>
                    </li>
                    <li class="{{ $controller_name=='admins'?'active':'inactive' }}">
                        <a href="/admin/users"><i class="fa fa-lg fa-fw fa-check-circle"></i>
                            <span class="nav-link-text">Users</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="{{ $controller_name=='socials'?'active':'inactive' }}">
                <a href="/admin/socials"><i class="fa fa-lg fa-fw fa-bookmark-o"></i>
                    <span class="nav-link-text">Socials</span>
                </a>
            </li>
            <li class="{{ $controller_name=='articles'?'active':'inactive' }}">
                <a href="/admin/contacts_info"><i class="fa fa-lg fa-fw fa-pencil-square-o"></i>
                    <span class="nav-link-text">Contact Info</span>
                </a>
            </li>
        </ul>
        <div class="filter-message js-filter-message bg-success-600"></div>
    </nav>

    <!-- NAV FOOTER -->
    <div class="nav-footer shadow-top">
        <a href="#" onclick="return false;" data-action="toggle" data-class="nav-function-minify" class="hidden-md-down">
            <i class="ni ni-chevron-right"></i>
            <i class="ni ni-chevron-right"></i>
        </a>
        <ul class="list-table m-auto nav-footer-buttons">
            <li>
                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Chat logs">
                    <i class="fal fa-comments"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Support Chat">
                    <i class="fal fa-life-ring"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Make a call">
                    <i class="fal fa-phone"></i>
                </a>
            </li>
        </ul>
    </div> <!-- END NAV FOOTER -->
</aside>
<!-- END NAVIGATION -->
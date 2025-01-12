<?php


function get_url($page = ''){
    $url = 'http://localhost/online-clearance/' . $page;
    return $url;
}


// =====================================================
// Header
// =====================================================
function get_header($pageTitle = null, $CSSFiles = [], $bodyClass = ''){
	if( $pageTitle != '' || !empty($pageTitle) ){
		$the_title = $pageTitle;
	}else{
		$the_title = 'ITE Online Clearance'; // Default title
	}

	// CSS Files
	$item = '';

	if( is_array($CSSFiles) && !empty($CSSFiles) && $CSSFiles != null ){

		for ($i = 0; $i < count($CSSFiles); $i++) {
    		
			$item = $item.'<link href="'.$CSSFiles[$i].'" rel="stylesheet">';

		}

	}else{

		$item = '';

	}

    echo '<!DOCTYPE html>
    <html lang="en">
        
    <head>
            <meta charset="utf-8" />
            <title>' . $pageTitle . '</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- App favicon -->
            <link rel="shortcut icon" href="'. get_url() .'assets/images/favicon.ico">
            <link href="'. get_url() .'assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
            <link href="'. get_url() .'assets/css/icons.min.css" rel="stylesheet" type="text/css" />
            <link href="'. get_url() .'assets/css/style.css" rel="stylesheet" type="text/css" />
            ' . $item . '
    
        </head>
    
        <body class="' . $bodyClass . '" data-base-url="' . get_url() . '" data-sidebar-user="true">
    ';
}

// =====================================================
// Header
// =====================================================
function get_footer( $JavaScriptFiles = null ){

	$item = '';

	if( is_array($JavaScriptFiles) && !empty($JavaScriptFiles) && $JavaScriptFiles != null ){

		for ($i = 0; $i < count($JavaScriptFiles); $i++) {
    		
			$item = $item.'<script src="'.$JavaScriptFiles[$i].'"></script>';

		}

	}else{

		$item = '';

	}

	echo '
	
        <script src="'. get_url() .'assets/libs/jquery/jquery.min.js"></script>
        <script src="'. get_url() .'assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="'. get_url() .'assets/libs/simplebar/simplebar.min.js"></script>
        <script src="'. get_url() .'assets/libs/node-waves/waves.min.js"></script>
        <script src="'. get_url() .'assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="'. get_url() .'assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
        <script src="'. get_url() .'assets/libs/feather-icons/feather.min.js"></script>

        <!-- knob plugin -->
        <script src="'. get_url() .'assets/libs/jquery-knob/jquery.knob.min.js"></script>

        <script src="'. get_url() .'assets/js/app.min.js"></script>
        <script src="'. get_url() .'assets/js/custom-script.js"></script>
        ' . $item . '
        
    </body>

    </html>
	';

}

// =====================================================
// Customer Authentication
// =====================================================
function userAuth(){

	// Start session if there is no existing
	if (session_status() == PHP_SESSION_NONE) {
    	session_start();
	}

	$user = json_decode($_SESSION['user']);

	if( !isset($_SESSION['user']) || $user->acc_type != 'customer' ){

		// Redirect
		header("Location: " . base_url() . "login");

		// remove all session variables
		session_unset();

		// destroy the session
		session_destroy();
	}

}


// =====================================================
// Admin Authentication
// =====================================================
function adminAuth(){

	// Start session if there is no existing
	if (session_status() == PHP_SESSION_NONE) {
    	session_start();
	}

	$user = json_decode($_SESSION['user']);

	if( !isset($_SESSION['user']) || $user->acc_type != 'admin'){

		// Redirect
		header("Location: " . base_url() . "login");

		// remove all session variables
		session_unset();

		// destroy the session
		session_destroy();
	}

}


// =====================================================
// User Info
// =====================================================
function userInfo(){
	// Start session if there is no existing
	if (session_status() == PHP_SESSION_NONE) {
    	session_start();
	}

	$user = json_decode($_SESSION['user']);

	return $user;
}

function get_topbar(){
    echo '
    
    <!-- Topbar Start -->
    <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-end mb-0">

                <li class="dropdown notification-list topbar-dropdown">
                    
                    <div class="dropdown-menu dropdown-menu-end dropdown-lg">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0">
                                <span class="float-end">
                                    <a href="#" class="text-dark">
                                        <small>Clear All</small>
                                    </a>
                                </span>Notification
                            </h5>
                        </div>

                        <div class="noti-scroll" data-simplebar>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                <div class="notify-icon">
                                    <img src="' . get_url() . 'assets/images/users/user-1.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                <p class="notify-details">Cristina Pride</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Hi, How are you? What about our next meeting</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-primary">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admin
                                    <small class="text-muted">1 min ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon">
                                    <img src="' . get_url() . 'assets/images/users/user-4.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                <p class="notify-details">Karen Robinson</p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>Wow ! this admin looks good and awesome design</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-warning">
                                    <i class="mdi mdi-account-plus"></i>
                                </div>
                                <p class="notify-details">New user registered.
                                    <small class="text-muted">5 hours ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                                <p class="notify-details">Caleb Flakelar commented on Admin
                                    <small class="text-muted">4 days ago</small>
                                </p>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-secondary">
                                    <i class="mdi mdi-heart"></i>
                                </div>
                                <p class="notify-details">Carlos Crouch liked
                                    <b>Admin</b>
                                    <small class="text-muted">13 days ago</small>
                                </p>
                            </a>
                        </div>

                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                            View all
                            <i class="fe-arrow-right"></i>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="' . get_url() . 'assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ms-1">
                            Admin <i class="mdi mdi-chevron-down"></i> 
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="contacts-profile.html" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>My Account</span>
                        </a>

                        <!-- item-->
                        <a href="auth-lock-screen.html" class="dropdown-item notify-item">
                            <i class="fe-lock"></i>
                            <span>Lock Screen</span>
                        </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a href="auth-logout.html" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                        <i class="fe-settings noti-icon"></i>
                    </a>
                </li>

            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="index.html" class="logo logo-light text-center">
                    <span class="logo-sm">
                        <img src="' . get_url() . 'assets/images/ITE.png" alt="" height="50">
                    </span>
                    <span class="logo-lg">
                        <img src="' . get_url() . 'assets/images/ITE.png" alt="" height="90">
                    </span>
                </a>
                <a href="index.html" class="logo logo-dark text-center">
                    <span class="logo-sm">
                        <img src="' . get_url() . 'assets/images/ITE.png" alt="" height="50">
                    </span>
                    <span class="logo-lg">
                        <img src="' . get_url() . 'assets/images/ITE.png" alt="" height="90">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
                <li>
                    <button class="button-menu-mobile disable-btn waves-effect">
                        <i class="fe-menu"></i>
                    </button>
                </li>

                <li>
                    <h4 class="page-title-main">Dashboard</h4>
                </li>

            </ul>

            <div class="clearfix"></div> 
    
    </div>
    <!-- end Topbar -->';
}
function get_sidebar(){
    echo '
    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

        <div class="h-100" data-simplebar>

            <!-- User box -->
            <div class="user-box text-center invisible d-none d-lg-block">

                <p class="text-muted left-user-info">Admin Head</p>

                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="#" class="text-muted left-user-info">
                            <i class="mdi mdi-cog"></i>
                        </a>
                    </li>

                    <li class="list-inline-item">
                        <a href="#">
                            <i class="mdi mdi-power"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul id="side-menu">

                    <li class="menu-title">Navigation</li>
        
                    <li>
                        <a href="' . get_url()  . 'admin">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span class="badge bg-success rounded-pill float-end">9+</span>
                            <span> Dashboard </span>
                        </a>
                    </li>

                    <li class="menu-title mt-2">Categories</li>

                    <li>
                        <a href="' . get_url() . 'admin/students">
                            <i class="mdi mdi-account-outline"></i>
                            <span> Students </span>
                        </a>
                    </li>

                    <li>
                        <a href="' . get_url() . 'admin/teachers">
                            <i class="mdi mdi-account-multiple"></i>
                            <span> Teachers </span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="#email" data-bs-toggle="collapse" class="" aria-expanded="true">
                            <i class="mdi mdi-email-outline"></i>
                            <span> Teachers </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse show" id="email" style="">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="email-inbox.html">Add Teacher</a>
                                </li>
                            </ul>
                        </div>
                    </li> -->
                    <li>
                        <a href="' . get_url() . 'admin/courses">
                            <i class="mdi mdi-chart-timeline"></i>
                            <span> Course </span>
                        </a>
                    </li>

                    <li>
                        <a href="' . get_url() . 'admin/subjects">
                            <i class="mdi mdi-altimeter"></i>
                            <span> Subjects </span>
                        </a>
                    </li>

                    <li>
                        <a href="' . get_url() . 'admin/curriculums">
                            <i class="mdi mdi-chart-timeline"></i>
                            <span> Curriculum </span>
                        </a>
                    </li>

                    <hr style="width: 80%; margin: 32px auto;">

                    <div class="user-box text-center">

                        <img src="' . get_url() . 'assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
                        <div class="dropdown">
                            <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"  aria-expanded="false">Nowak Helme</a>
                            <div class="dropdown-menu user-pro-dropdown">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-user me-1"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings me-1"></i>
                                    <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-lock me-1"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-log-out me-1"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </div>
                        <p class="text-muted left-user-info">Admin Head</p>

                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#" class="text-muted left-user-info">
                                    <i class="mdi mdi-cog"></i>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="mdi mdi-power"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->';
}
function get_rightbar(){
    echo '
    
    <!-- Right Sidebar -->
    <div class="right-bar">

        <div data-simplebar class="h-100">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-end">
                    <i class="mdi mdi-close"></i>
                </a>
                <h4 class="font-16 m-0 text-white">Theme Customizer</h4>
            </div>
    
            <!-- Tab panes -->
            <div class="tab-content pt-0">  

                <div class="tab-pane active" id="settings-tab" role="tabpanel">

                    <div class="p-3">

                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Color Scheme</h6>
                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="layout-color" value="light"
                                id="light-mode-check" checked />
                            <label class="form-check-label" for="light-mode-check">Light Mode</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="layout-color" value="dark"
                                id="dark-mode-check" />
                            <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                        </div>

                       
                        <!-- Left Sidebar-->
                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Color</h6>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftbar-color" value="light" id="light" />
                            <label class="form-check-label" for="light-check">Light</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftbar-color" value="dark" id="dark" checked/>
                            <label class="form-check-label" for="dark-check">Dark</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftbar-color" value="brand" id="brand" />
                            <label class="form-check-label" for="brand-check">Brand</label>
                        </div>

                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="leftbar-color" value="gradient" id="gradient" />
                            <label class="form-check-label" for="gradient-check">Gradient</label>
                        </div>


                        <!-- Topbar -->
                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Topbar</h6>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="topbar-color" value="dark" id="darktopbar-check"
                                checked />
                            <label class="form-check-label" for="darktopbar-check">Dark</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="topbar-color" value="light" id="lighttopbar-check" />
                            <label class="form-check-label" for="lighttopbar-check">Light</label>
                        </div>

                        <div class="d-grid mt-4">
                            <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
                            <a href="https://1.envato.market/admintoadmin" class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase Now</a>
                        </div>

                    </div>

                </div>
            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->';
}
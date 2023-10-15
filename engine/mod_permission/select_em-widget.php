<?php
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/config.php';
require_once '../lib/functions.php';

checkAdminUser();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/logo.png">
    <title><?php echo TITLE; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="../../plugins_b/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../plugins_b/dropify/dist/css/dropify.min.css">
    <!-- chartist CSS -->
    <link href="../../plugins_b/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../../plugins_b/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="../../plugins_b/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="../../plugins_b/c3-master/c3.min.css" rel="stylesheet">
    <!--alerts CSS -->
    <link href="../../plugins_b/sweetalert2/sweetalert2.css" rel="stylesheet" type="text/css">
    <!-- Pace style -->
    <link rel="stylesheet" href="../../plugins_b/pace/pace.min.css">
     <!-- daterange picker -->
    <link rel="stylesheet" href="../../plugins_b/daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../../plugins_b/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- Custom CSS -->
    <link href="../css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="../css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="https://www.tpse.co.th/" target="_blank">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../images/logo.png" alt="homepage" class="dark-logo" /><?php //echo HEAD_LOGO;
                                                                                                ?>
                            <!-- Light Logo icon -->
                            <img src="../images/logo.png" alt="homepage" class="light-logo" /><?php //echo HEAD_LOGO;
                                                                                                ?>
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->

                        <!-- dark Logo text -->

                        <!-- dark Logo text -->
                        <span style="color: #ffffff !important">
                            <?php echo HEAD_LOGO_MINI; ?> </span>
                        <!-- Light Logo text -->
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a
                                class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark"
                                href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item"> <a
                                class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                    class="mdi mdi-bell"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">แจ้งเตือนต่าง ๆ</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="user-img"> <img src="../images/users/1.jpg" alt="user"
                                                        class="img-circle"> <span
                                                        class="profile-status online pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my
                                                        admin!</span> <span class="time">9:30 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <!--<a href="#">
                                                <div class="user-img"> <img src="../images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                            </a>-->
                                            <!-- Message -->
                                            <!--<a href="#">
                                                <div class="user-img"> <img src="../images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                            </a>-->
                                            <!-- Message -->
                                            <!--<a href="#">
                                                <div class="user-img"> <img src="../images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                            </a>-->
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all
                                                e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <?php
                            $position = isset($_SESSION['position'])?$_SESSION['position']:'';
                            $email = isset($_SESSION['email'])?$_SESSION['email']:'';
                            $image = isset($_SESSION['avatar'])?$_SESSION['avatar']:LOGO;
                            $text_header = isset($_SESSION['name'])?$_SESSION['name']: 'Super Admin';
                            $adminFlg = isset($_SESSION['admin'])?$_SESSION['admin']:0;
                            
                            /*$result_member = getCurrentUser();
                            $position = '';
                            $email = '';
                            $image = LOGO;

                            $query_tbl = checkTable('mod_employee');
                            if ($num = mysqli_num_rows($query_tbl) == 1) {
                                $result_em = getEmployeeInfo($result_member['id_data_role']);

                                if (isset($result_em)) {
                                    $link_id = $result_em['id_employee'];
                                    $position = $result_em['position'];
                                    $email = $result_em['email'];

                                    $query_image = getEmployeeImage($result_member['id_data_role']);
                                    $num_image = mysqli_num_rows($query_image);
                                    if ($num_image > 0) {
                                        $result_image = mysqli_fetch_array($query_image);
                                        $dir_image = $result_image['name_image'];
                                        $directory  = $result_image['directory'];
                                        $date_img  = $result_image['date_image'];
                                        $date_img = explode("-", $date_img);
                                        $image = '../../' . $directory . $dir_image;
                                    } else {
                                        $image = LOGO;
                                    }
                                }
                            } else {
                                $position = '';
                                $link_id = '';
                                $image = LOGO;
                            }

                            if ($result_member['admin'] == '1') {
                                $text_header = 'Super Admin';
                            } else {
                                $text_header = $result_em['username'];
                            }*/

                            ?>
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="<?php echo $image; ?>" alt="user" class="profile-pic" />
                                <?php echo $text_header; ?></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="<?php echo $image; ?>" alt="user"></div>
                                            <div class="u-text">
                                                <h4>
                                                    <?php echo $text_header; ?>
                                                </h4>
                                                <p class="text-muted"><?php echo $position; ?><br><?php echo $email; ?>
                                                </p>
                                                <?php

                                                /*if ($cut_url[$num_fo] == 'mod_employee') {
                                $link = 'front-edit.php?id=' . $link_id . '';
                            } else {
                                $link = '../mod_employee/front-edit.php?id=' . $link_id . '';
                            }*/

                                                if ($adminFlg != '1') /* != แบบเดิม */ {
                                                        ?>
                                                <a href="../mod_employee/profile.php"
                                                    class="btn btn-rounded btn-danger btn-sm">ดูประวัติ</a>
                                                <?php
                                                    
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <?php

                                        /*if ($cut_url[$num_fo] == 'mod_employee') {
                                $link = 'front-edit.php?id=' . $link_id . '';
                            } else {
                                $link = '../mod_employee/front-edit.php?id=' . $link_id . '';
                            }*/

                                        if ($adminFlg != '1') /* != แบบเดิม */ {
                                                ?>
                                        <a href="../mod_employee/profile.php"><i class="ti-user"></i> ประวัติของฉัน</a>
                                        <?php
                                        }
                                        ?>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-settings"></i> การตั้งค่าบัญชี</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="../lib/logout.php"><i class="fa fa-power-off"></i> ออกจากระบบ</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Language -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
                                    class="flag-icon flag-icon-th"></i></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-us"></i> English</a>
                                <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> China</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
<?php
require_once 'lib/connect.php';
require_once 'lib/config.php';
require_once 'lib/service.php';
$db = new DB();

$str_tbl = "SHOW TABLES LIKE 'users'";
$query_tbl = $db->Query($str_tbl);
if ($num = mysqli_num_rows($query_tbl) == 1) {
    if (isset($_SESSION["user_id"])) {
        $user_id = $db->clear($_SESSION["user_id"]);
        $str = "SELECT * FROM users WHERE id_member= '" . $user_id . "'";
        $query = $db->Query($str);
        $result = !empty($query) ? mysqli_fetch_array($query) : null;
        if (isset($result) && $_SESSION["user_id"] == $result['member_session_update']) {
            $_SESSION['id_data_role'] = $result['id_data_role'];
            header('Location: page_home/');
            exit;
        }
    }
} else {
    header('Location: formAdminlocal.php');
}

$title = getSetting('head_title');
$title = $title == ""?TITLE:$title;

$title_mini = getSetting('head_title_mini');
$title_mini = $title_mini == ""?HEAD_LOGO_MINI:$title_mini;

$logo = getSetting('logo_img');
$logo = $logo == ""?HEAD_LOGO_MINI:$logo;

?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $logo; ?>">
    <title><?php echo $title; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="../plugins_b/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">

    <!--alerts CSS -->
    <!-- <link href="../plugins_b/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"> -->
    <link rel="stylesheet" href="../plugins_b/sweetalert/dist/sweetalert2.css">	
    <script src="../plugins_b/sweetalert/dist/sweetalert2.min.js"></script>	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<style type="text/css">
body {
    overflow: hidden;
}

.overlay {
    overflow: hidden;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(255, 255, 255, 0.8);
    z-index: 99999;
}

.overlay i {
    margin-left: 47%;
    margin-top: 20%;
    color: #09C;
    font-size: 100px;
}

.body-prevent {
    overflow: hidden;
}

.loader {
    margin-left: 48%;
    margin-top: 20%;
    border: 5px solid #f3f3f3;
    border-radius: 50%;
    border-top: 5px solid #3498db;
    width: 50px;
    height: 50px;
    -webkit-animation: spin 2s linear infinite;
    /* Safari */
    animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
    0% {
        -webkit-transform: rotate(0deg);
    }

    100% {
        -webkit-transform: rotate(360deg);
    }
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}
</style>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div id="overlay" class="overlay" style="display: none;">
        <div class="loader"></div>
    </div>
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(../images/background/login-register.jpg);">
            <div class="login-box card" style="opacity: .8">
                <div class="card-body">
                    <form class="form-horizontal form-material" method="post" name="frmLogin" id="frmLogin">
                        <h3 class="box-title m-b-20" style="text-align: center;"><i class="fas fa-lock"></i>
                            <span>ระบบจัดการหลังบ้าน</span></h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" id="txtUserName" name="txtUserName" type="text" required
                                    placeholder="ผู้ใช้งาน">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" id="txtPassword" name="txtPassword" type="password" required placeholder="รหัสผ่าน">
								<small>
									<a href="#"><span id="a_pass" onclick="showPass()"><i class="fas fa-eye-slash"></i></span>
									<span onclick="showPass()"><?= lang('แสดงรหัสผ่าน','Show password');?></span></a>
								</small>
							</div>
                        </div>

                        <div class="alert alert-danger alert-massage" style="display: none;">
                            <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>-->
                            <h3 class="text-danger"><i class="icon fa fa-ban"></i> ผิดพลาด</h3>
							<label id="div_taxt_error"></label> 
                        </div>
                        <!--<div class="form-group">
                            <div cl                                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup"> Remember me </label>
                                </div> <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
                        </div>-->

                        <!--<div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                                <div class="social">
                                    <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fab fa-facebook"></i> </a>
                                    <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fab fa-google-plus"></i> </a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                <p>Don't have an account? <a href="register.html" class="text-info m-l-5"><b>Sign Up</b></a></p>
                            </div>
                        </div>-->

                    </form>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                type="submit" id="login">เข้าสู่ระบบ</button>
                        </div>
                    </div>
                    <!--<form class="form-horizontal" id="recoverform" action="index.html">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>Recover Password</h3>
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Email"> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                            </div>
                        </div>
                    </form>-->
                </div>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../plugins_b/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../plugins_b/popper/popper.min.js"></script>
    <script src="../plugins_b/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../plugins_b/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../plugins_b/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../plugins_b/styleswitcher/jQuery.style.switcher.js"></script>
    <!-- Sweet-Alert  -->
    <!-- <script src="../plugins_b/sweetalert/sweetalert.min.js"></script>
    <script src="../plugins_b/sweetalert/jquery.sweet-alert.custom.js"></script> -->
    <!-- ============================================================== -->
</body>

</html>


<script>
/*$(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
/*});
});*/
$(document).on('click', '#login', function() {

    var username = $('#txtUserName').val();
    var password = $('#txtPassword').val();
    $.ajax({
        beforeSend: function() {
            $('#overlay').show();

        },
        complete: function() {
            $('#overlay').fadeOut();
        },
        url: "lib/service.php",
        method: "POST",
        data: {
            username: username,
            password: password
        },
        success: function(data) {
            //alert(data.message, 'Infomation:');
            if (data.status == 1) {
                //swal('เข้าสู่ระบบสำเร็จ')	
                location.href = "page_home/";
            } else if (data.status == 0) {
                swal('คำเตือน',data.message,"warning")
				$('#div_taxt_error').html(data.message);
                $('.alert-massage').fadeIn();
            } else {
                $('.alert-massage-exist').fadeIn();
            }
        }
    });
});

$('#txtPassword').keypress(function(event) {
    if (event.keyCode === 13) {
        $('#login').trigger('click');
    }
});
</script>

<script>
//show pass	
function showPass() {
  var x = document.getElementById("txtPassword");
  if (x.type === "password") {
    x.type = "text";
	document.getElementById("a_pass").innerHTML = "<i class='fas fa-eye'></i>";  
  } else {
    x.type = "password";
	document.getElementById("a_pass").innerHTML = "<i class='fas fa-eye-slash'></i>";  
  }
}
</script>
		
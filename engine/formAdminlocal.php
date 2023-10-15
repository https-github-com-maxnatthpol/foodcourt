<?php 
  // require_once 'lib/connect.php';
  // require_once 'lib/service.php';
  // $str_tbl = "SHOW TABLES LIKE 'tbl_member'";
  // $query_tbl = mysqli_query($objConnect,$str_tbl);

  // if($num = mysqli_num_rows($query_tbl) >= 1){
  //   if (isset($_SESSION["user_id"])) {
  //         $str = "SELECT * FROM tbl_member WHERE id_member= '".$_SESSION['user_id']."'";
  //         $query = mysqli_query($objConnect, $str);
  //         $result = mysqli_fetch_array($query);
  //         if($_SESSION["user_id"]==$result['member_session_update']){
  //           header('Location: page_home/');
  //           exit;
  //         }
  //     }
  //     header('Location: '.base_url(true).'../engine/login.php');
  // }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo TITLE; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<style type="text/css">
body{
  overflow: hidden;
}
   .overlay {
    overflow: hidden;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(255,255,255,0.8);
    z-index: 99999;
  }
  .overlay i{
    margin-left: 47%;
    margin-top: 20%;
    color: #09C;
    font-size: 100px;
  }
  .body-prevent{
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
      -webkit-animation: spin 2s linear infinite; /* Safari */
      animation: spin 2s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
</style>
<body class="hold-transition login-page" id="loadpage">
   <div id="overlay" class="overlay" style="display: none;">
      <div class="loader"></div>
    </div>



<div class="login-box">
  <div class="login-logo">
    <a href="./index.php"><b>Super admin</b></a>
  </div>

  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">กรุณาสร้างรหัสสำหรับจัดการข้อมูล</p>


    <form method="post" name="frmLogin" id="frmLogin">
      <div class="form-group has-feedback">
        <input type="email" id="txtUserName" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="txtPassword" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row alert-massage" style="display: none;">
        <div class="col-xs-12">
          <div class="callout callout-danger" style="opacity: 0.8">
            <p><i class="icon fa fa-ban"></i> Username or password is wrong!</p>
          </div>
        </div>
      </div>
      <div class="row alert-massage-exist" style="display: none;">
        <div class="col-xs-12">
          <div class="callout callout-warning" style="opacity: 0.8">
            <p><i class="icon fa fa-ban"></i> Username or password is exist!</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
          </div>
        </div>
        <!-- /.col -->
    </form>
    <!-- !form -->
         <div class="col-xs-4">
          <button type="button" id="login" class="btn btn-primary btn-block btn-flat">Generate</button>
        </div>
        <!-- /.col -->
      </div>

    

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->



<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
  $(document).on('click', '#login', function(){

    var username = $('#txtUserName').val();
    var password = $('#txtPassword').val();
    $.ajax({
      beforeSend:function(){
        $('#overlay').show();

      },
      complete:function(){
        $('#overlay').fadeOut();
      },
        url:"lib/functions_m.php",
        method:"POST",
        data: {username_admin:username,
              password:password},
      success:function(data){
        // alert(data.message);
        if(data.status == 1){
          location.href="page_home/";
        }else if(data.status == 0){
         $('.alert-massage').fadeIn();
        }else{
         $('.alert-massage-exist').fadeIn();
        }
      } 
    });
  });
</script> -->
</body>
</html>

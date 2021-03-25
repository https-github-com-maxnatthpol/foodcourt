<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once '../engine/lib/connect.php';
require_once '../engine/lib/config.php';
require_once '../engine/lib/service.php';
$db = new DB();

$str_tbl = "SHOW TABLES LIKE 'users'";
$query_tbl = $db->Query($str_tbl);
if ($num = mysqli_num_rows($query_tbl) == 1) {
    if (isset($_SESSION["user_id"])) {
        $user_id = $db->clear($_SESSION["user_id"]);
        $str = "SELECT * FROM users WHERE id_user= '" . $user_id . "'";
        $query = $db->Query($str);
        $result = !empty($query) ? mysqli_fetch_array($query) : null;
        if (isset($result) && $_SESSION["user_id"] == $result['member_session_update']) {
            $_SESSION['id_data_role'] = $result['id_data_role'];
            header('Location: page_home/');
            exit;
        }
		else{
			header('Location: ../engine/page_home/');
		}
    }
	
} else {
    header('Location: formAdminlocal.php');
}

$title = getSetting('head_title');
$title = $title == ""?TITLE:$title;

?>
<!DOCTYPE html>
<html lang="th">
<head>
	<title><?php echo $title; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	
	<link rel="stylesheet" href="../plugins_b/sweetalert/dist/sweetalert2.css">	
    <script src="../plugins_b/sweetalert/dist/sweetalert2.min.js"></script>	
<!--===============================================================================================-->
</head>
<body>
	
<style>
.login100-form {
    width: 560px;
    min-height: 100vh;
    display: block;
    background-color: #f7f7f7;
    padding: 20px 55px 55px 55px;
}    
#shopmenu {
    width: 100%;
    margin: 20px auto;
    background: #fff;
    padding: 10px 20px;
    text-align: center;
    -webkit-box-shadow: 3px 3px 3px 4px #7460ee33;
    box-shadow: 3px 3px 3px 4px #7460ee33;
    border-radius: 5px;
    }    
#pinpad {
  padding: 0px 5px 0px 5px;
  margin-top: 30px;    
}
    
#shopmenu form {
  width: 100%;
  margin: 20px auto;
  background: #fff;
  padding: 20px 20px;
  text-align: center;
  -webkit-box-shadow: 3px 3px 3px 4px #7460ee33;    
  box-shadow: 3px 3px 3px 4px #7460ee33;
  border-radius: 5px;
}

#shopmenu input[type="text"],input[type="password"] {
  padding: 0 40px;
  border-radius: 5px;
  width: 100%;
  margin: auto;
  border: 1px solid rgb(228, 220, 220);
  outline: none;
  font-size: 60px;
  color: #ff0707;
  text-shadow: 0 0 0 rgb(71, 71, 71);
  text-align: center;
}

#shopmenu input:focus {
  outline: none;
}    
    
#shopmenu .pinButton {
  border: none;
  background: none;
  font-size: 1.4em;
  border-radius: 50%;
  height: 60px;
  font-weight: 550;
  width: 60px;
  color: transparent;
  text-shadow: 0 0 0 rgb(102, 101, 101);
  margin: 7px 20px;
}

#shopmenu .clear,
#shopmenu .enter {
  font-size: 0.9em !important;
}

#shopmenu .pinButton:hover {
  box-shadow: #506ce8 0 0 1px 1px;
}
#shopmenu .pinButton:active {
  background: #506ce8;
  color: #fff;
}
#shopmenu .clear:hover {
  box-shadow: #ff3c41 0 0 1px 1px;
}
#shopmenu .clear:active {
  background: #ff3c41;
  color: #fff;
}
#shopmenu .enter:hover {
  box-shadow: #47cf73 0 0 1px 1px;
}
#shopmenu .enter:active {
  background: #47cf73;
  color: #fff;

</style>    
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="javascript:void(0);">
                    <input type="hidden" id="txtUserName" name="txtUserName" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
					<span class="login100-form-title p-b-43">
						<?php echo lang('เข้าสู่ระบบเพื่อดำเนินการต่อ','Login to continue'); ?>
                        <div id="shopmenu">
                            <div id="pinpad">
                              <form>
                                <input type="password" id="txtPassword" name="txtPassword" /></br>  
                                <input type="button" value="1" id="1" class="pinButton calc"/>
                                <input type="button" value="2" id="2" class="pinButton calc"/>
                                <input type="button" value="3" id="3" class="pinButton calc"/><br>
                                <input type="button" value="4" id="4" class="pinButton calc"/>
                                <input type="button" value="5" id="5" class="pinButton calc"/>
                                <input type="button" value="6" id="6" class="pinButton calc"/><br>
                                <input type="button" value="7" id="7" class="pinButton calc"/>
                                <input type="button" value="8" id="8" class="pinButton calc"/>
                                <input type="button" value="9" id="9" class="pinButton calc"/><br>
                                <input type="button" value="รีเซต" id="clear" class="pinButton clear"/>
                                <input type="button" value="0" id="0 " class="pinButton calc"/>
                                <input type="button" value="ตกลง" id="login" name="login" class="pinButton enter"/>
                              </form>
                            </div>
                        </div>
					</span>
					   
				</form>

				<div class="login100-more" style="background-image: url('../images/bg-02.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script type="text/javascript">
$(document).ready(function () {
  const input_value = $("#txtPassword");

  //disable input from typing

  $("#txtPassword").keypress(function () {
    return false;
  });

  //add password
  $(".calc").click(function () {
    let value = $(this).val();
    field(value);
  });
  function field(value) {
    input_value.val(input_value.val() + value);
  }
  $("#clear").click(function () {
    input_value.val("");
  });
    
//  $("#enter").click(function () {
//    alert("Your text " + input_value.val() + " added");
//  });
    
  $(document).on('click', '#login', function(event) {
    var username = $('#txtUserName').val();
    var password = $('#txtPassword').val();
    $.ajax({
        beforeSend: function() {
            $('#overlay').show();

        },
        complete: function() {
            $('#overlay').fadeOut();
        },
        url: "../engine/lib/service.php",
        method: "POST",
        data: {
            username: username,
            password: password
        },
        success: function(data) {
            //alert(data.message, 'Infomation:');
            if (data.role_tag == 'mod_customer') {
                //swal('เข้าสู่ระบบสำเร็จ')	
                location.href = "../engine/mod_shopmenu/front_manage.php";
            } else if (data.role_tag == 'mod_cashier') {
                //swal('เข้าสู่ระบบสำเร็จ')	
                location.href = "../engine/mod_cashier/buy_card.php";
            } else if (data.role_tag == 'mod_employee') {
                //swal('เข้าสู่ระบบสำเร็จ')	
                location.href = "../engine/page_home/";
            } else if (data.status == 0) {
                swal.fire('คำเตือน', data.message, "warning")
                $('#div_taxt_error').html(data.message);
                $('.alert-massage').fadeIn();
            } else {
                $('.alert-massage-exist').fadeIn();
            }
        }
    });
});    
    
});
    </script>

</body>
</html>
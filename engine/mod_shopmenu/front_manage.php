<?php include('../template/header.php');?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
<?php require_once('../template/menu.php');?>
        <!-- ============================================================== -->


<?php
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';
$db = new DB();
?>

<style>
    
#pinpad {
  padding: 0px 40px 0px 40px;
}
    
#shopmenu form {
  width: 100%;
  margin: 50px auto;
  background: #fff;
  padding: 35px 25px;
  text-align: center;
  box-shadow: 0px 5px 5px -0px rgba(0, 0, 0, 0.3);
  border-radius: 5px;
}

#shopmenu input[type="text"] {
  padding: 0 40px;
  border-radius: 5px;
  width: 100%;
  margin: auto;
  border: 1px solid rgb(228, 220, 220);
  outline: none;
  font-size: 60px;
  color: transparent;
  text-shadow: 0 0 0 rgb(71, 71, 71);
  text-align: center;
}

#shopmenu input:focus {
  outline: none;
}    
    
#shopmenu .pinButton {
  border: none;
  background: none;
  font-size: 1.5em;
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
  font-size: 1em !important;
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
}

</style>
<!--alerts CSS -->

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">รายการชำระค่าอาหาร</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:location.href='../index.php'">Home</a></li>
                            <li class="breadcrumb-item active">รายการชำระค่าอาหาร</li>
                        </ol>
                    </div>
                </div>
							<div class="">
                                <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                            </div>
                
			<div class="row"> 
    			<div class="col-md-6 col-lg-7 col-sm-12">   
         			<div class="card card-body">
						<div class="row">
							<div class="col-md-4 col-sm-6">
							<div class="card" style="width: 100%">
								<img class="card-img-top" src="../images/user.png" alt="Card image cap">
									<div class="card-body">
										<h4 class="card-title">Card title</h4>
										<a href="#" class="btn btn-primary">Go somewhere</a>
									</div>
							</div>
							</div>
							<div class="col-md-4 col-sm-6">
							<div class="card" style="width: 100%">
								<img class="card-img-top" src="../images/user.png" alt="Card image cap">
									<div class="card-body">
										<h4 class="card-title">Card title</h4>
										<a href="#" class="btn btn-primary">Go somewhere</a>
									</div>
							</div>
							</div>
							<div class="col-md-4 col-sm-6">
							<div class="card" style="width: 100%">
								<img class="card-img-top" src="../images/user.png" alt="Card image cap">
									<div class="card-body">
										<h4 class="card-title">Card title</h4>
										<a href="#" class="btn btn-primary">Go somewhere</a>
									</div>
							</div>
							</div>
						</div>	
					</div>
				</div>
				<div class="col-md-6 col-lg-5 col-sm-12">   
				    <div class="ribbon-wrapper card">
                        <div class="ribbon ribbon-bookmark ribbon-info"><i class="mdi mdi-calculator"></i> คำนวณราคา</div>
                        <div id="shopmenu">
                            <div id="pinpad">
                              <form >
                                <input type="text" id="text" /></br>
                                <input type="button" value="1" id="1" class="pinButton calc"/>
                                <input type="button" value="2" id="2" class="pinButton calc"/>
                                <input type="button" value="3" id="3" class="pinButton calc"/><br>
                                <input type="button" value="4" id="4" class="pinButton calc"/>
                                <input type="button" value="5" id="5" class="pinButton calc"/>
                                <input type="button" value="6" id="6" class="pinButton calc"/><br>
                                <input type="button" value="7" id="7" class="pinButton calc"/>
                                <input type="button" value="8" id="8" class="pinButton calc"/>
                                <input type="button" value="9" id="9" class="pinButton calc"/><br>
                                <input type="button" value="clear" id="clear" class="pinButton clear"/>
                                <input type="button" value="0" id="0 " class="pinButton calc"/>
                                <input type="button" value="enter" id="enter" class="pinButton enter"/>
                              </form>
                            </div>
                        </div>
                    </div>
				</div>
                <!-- Row -->
                <!-- ============================================================== -->
			</div>
</div>
                <!-- End PAge Content -->
                
<input type="hidden" name="per_button_edit" id="per_button_edit" value="<?php echo $button_update ?>">
<input type="hidden" name="per_button_del" id="per_button_del" value="<?php echo $button_delete ?>">
<input type="hidden" name="per_button_open" id="per_button_open" value="<?php echo $button_create ?>">
<input type="hidden" name="per_input_read" id="per_input_read" value="<?php echo $button_view ?>">
<input type="hidden" name="per_input_approval" id="per_input_approval" value="<?php echo $button_approval ?>">
<?php include('../template/footer.php');?>
<script type="text/javascript">
$(document).ready(function () {
  const input_value = $("#text");

  //disable input from typing

  $("#text").keypress(function () {
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
  $("#enter").click(function () {
    alert("Your text " + input_value.val() + " added");
  });
});

</script>

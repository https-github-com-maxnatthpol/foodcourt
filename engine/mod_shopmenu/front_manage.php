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
    
.page-titles {
    background: #ffffff;
    margin: 0 -30px 15px;
    padding: 5px 15px 5px 15px;
    -webkit-box-shadow: 1px 0 5px rgb(0 0 0 / 10%);
    box-shadow: 1px 0 5px rgb(0 0 0 / 10%);
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
    			<div class="col-md-6 col-lg-6 col-sm-12">   
         			<div class="ribbon-wrapper card">
                        <div class="ribbon ribbon-bookmark ribbon-info"><i class="mdi mdi-credit-card-scan"></i> สแกนชำระสินค้า</div>
                        <form name="form_card" id="form_card">
                        <input type="hidden" name="total_card_s" id="total_card_s">
                        <input type="hidden" name="card_code" id="card_code">    
                        <input type="hidden" name="name_shop" id="name_shop" value="<?php echo $_SESSION["name"]; ?>">    
                        <input type="hidden" name="form" value="form_card">
                                <!--ตั้งค่าการพิมพ์ -->
                                <input type="hidden" name="print" value="printslip_return_customer_his">
                                <input type="hidden" name="SESSION_name" value="<?= $_SESSION['name'] ?>">
                                <?php
                                $sql = "SELECT `ip_customer`,`print_customer` FROM `mod_customer` WHERE `id_customer` =  '" . $_SESSION["id_data"] . "'";
                                $query = $db->Query($sql);
                                $result = mysqli_fetch_array($query);
                                $result[0];
                                ?>
                                <input type="hidden" id="PRINT_HOST" name="PRINT_HOST" value="<?= constant("PRINT_HOST"); ?>">
                                <input type="hidden" name="ip" value="<?= $result[0] ?>">
                                <input type="hidden" name="printname" value="<?= $result[1] ?>">
                                <!--ตั้งค่าการพิมพ์ -->    
                        <div class="form-group">
                          <label for="example" class="text-themecolor"><i class="mdi mdi-credit-card"></i> เลขบัตรชำระสินค้า </label>

                          <input type="text" class="form-control" name="idcard" id="idcard" placeholder="กรุณากรอกเลขบัตรชำระสินค้า" maxlength="18" OnKeyPress="return chkNumber(this)" autocomplete="off" autofocus>

                          <div class="col-md-12" id="idcard_alert" >
                            <small id="a_idcard"  style="color: #FFFFFF;"></small>
                          </div>    
                        </div>
                            
                        <div class="row"> 
                            <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="example" class="text-themecolor" style="font-size: 23px;"> หมายเลขบัตร</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="example" style="font-size: 23px;" id="number_card">: -</label>
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="example" class="text-themecolor" style="font-size: 23px;"> ยอดเงินคงเหลือ</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="example" style="font-size: 23px;" id="total_card">: -</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="example" class="text-themecolor"><i class="fas fa-calculator"></i> จำนวนเงินที่ต้องชำระ</label>
                        </div>
                        <div id="shopmenu">
                            <input type="text" id="balance" name="balance" /></br>
                        </div>
                       </form> 
                    </div>
				</div>
				<div class="col-md-6 col-lg-6 col-sm-12">   
				    <div class="ribbon-wrapper card">
                        <div class="ribbon ribbon-bookmark ribbon-info"><i class="mdi mdi-calculator"></i> คำนวณราคา</div>
                        <div id="shopmenu">
                            <div id="pinpad">
                              <form >
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
                                <input type="button" value="ตกลง" id="enter" name="enter" class="pinButton enter"/>
                              </form>
                            </div>
                        </div>
                    </div>
				</div>
                <!-- Row -->
                  <div class="col-md-12 col-lg-12">   
                     <div class="ribbon-wrapper card" >
                      <div class="ribbon ribbon-bookmark ribbon-info"><i class="fas fa-history"></i> ประวัติการชำระเงิน <?php echo DateThai($date);?></div>
                      <div class="box-body" style="padding: 0;">
                        <form action="" name="frmMain" id="frmMain" method="post">
                          <div id="div_table_list"></div>  
                        </form>
                      </div>
                    </div>
                  </div>
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
<script type="text/javascript" src="js/javascript.js"></script>

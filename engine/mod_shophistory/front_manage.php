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
                        <h3 class="text-themecolor m-b-0 m-t-0">รายงานยอดขาย</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:location.href='../index.php'">Home</a></li>
                            <li class="breadcrumb-item active">รายงานยอดขาย</li>
                        </ol>
                    </div>
                </div>
							<div class="">
                                <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                            </div>
                
			<div class="row"> 
    			<div class="col-md-12 col-lg-12 col-sm-12">   
         			<div class="ribbon-wrapper card">
                        <div class="ribbon ribbon-bookmark ribbon-info"><i class="mdi mdi-credit-card-scan"></i> ค้นหา</div>
                        <form name="form_card" id="form_card">
                        <input type="hidden" name="total_card_s" id="total_card_s">
                        <input type="hidden" name="card_code" id="card_code">    
                        <input type="hidden" name="name_shop" id="name_shop" value="<?php echo $_SESSION["name"]; ?>">    
                        <input type="hidden" name="form" value="form_card">   
                        <div class="form-group">
                          <label for="example" class="text-themecolor"><i class="mdi mdi-credit-card"></i> เลขบัตรชำระสินค้า </label>
                          <input type="text" class="form-control" name="idcard" id="idcard" placeholder="กรุณากรอกเลขบัตรชำระสินค้า" maxlength="18" OnKeyPress="return chkNumber(this)" autofocus>
                          <div class="col-md-12" id="idcard_alert" >
                            <small id="a_idcard"  style="color: #FFFFFF;"></small>
                          </div>    
                        </div>
                       </form> 
                    </div>
				</div>
                <!-- Row -->
                  <div class="col-md-12 col-lg-12">   
                     <div class="ribbon-wrapper card" >
                      <div class="ribbon ribbon-bookmark ribbon-info"><i class="fas fa-history"></i> รายงานยอดขาย </div>
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

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
                        <h3 class="text-themecolor m-b-0 m-t-0">รายการอาหารสินค้า</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:location.href='../index.php'">Home</a></li>
                            <li class="breadcrumb-item active">รายการอาหารสินค้า</li>
                        </ol>
                    </div>
                </div>
							<div class="">
                                <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                            </div>
                
			<div class="row"> 
    			<div class="col-md-8 col-sm-12">   
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
				<div class="col-md-4 col-sm-12">   
         			<div class="card  card-outline-info">
						<div class="card-header">
                        	<h4 class="m-b-0 text-white">รายการอาหารที่สั้งซื้อ</h4>
                       	</div>
						<div class="card-body">
							
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

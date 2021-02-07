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
  

<style>
	.oncard-header{
	border-top: solid #ffb22b ;
	}	
</style>

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
                        <h3 class="text-themecolor m-b-0 m-t-0">หมวดหมู่สินค้า</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:location.href='../index.php'">Home</a></li>
                            <li class="breadcrumb-item active">หมวดหมู่สินค้า</li>
                        </ol>
                    </div>
                    
                </div>
								<div class="">
                                <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                            </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
<div class="row"> 
<?php
  if ($button_create=='') {
    $col = "col-md-6";
  }else{
    $col = "col-md-12";
  }
?>
  <div class="<?php echo $col ?>">   
         <div class="card card-body" >
          <div class="box-header with-border">
            <h3 class="box-title">จัดการหมวดหมู่สินค้า</h3>
          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="frmMain" id="frmMain" method="post">
              <input type="hidden" name="form" value="Multi_del">
              <input type="hidden" name="change" id="changeMulti">
              <div id="div_table_list"></div> 
              <div class="boxsave" id="box-del-list">

<?php
      if ($button_delete=='') {
          ?>
                <button type="button" class="delmulti-menu btn btn-danger" style="transition: 0.4s; <?php echo $button_del; ?>" id="MultiDelete" disabled data-id="Delete"><i class="fa fa-remove"></i> ลบรายการที่เลือก <span class="num_"></span></button>
<?php
      }
     
?>
              </div>  
            </form>
          </div>
        </div>
      </div>
<div id="div_add" class="col-md-6" style="<?php echo $button_create ?>">
        <div class="card card-body" >
          <div class="box-header with-border">
            <h3 class="box-title">เพิ่มหมวดหมู่ใหม่</h3>
            
      

          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="form_add" id="form_add" method="post">
              <input type="hidden" name="form" value="form_add">
              <div id="div_form_add">
                  <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
									<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#thai" role="tab"><span class="hidden-sm-up"><i class="flag-icon flag-icon-th"></i></span> <span class="hidden-xs-down"><i class="flag-icon flag-icon-th"></i> ภาษาไทย</span></a> 
									</li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#english" role="tab"><span class="hidden-sm-up"><i class="flag-icon flag-icon-us"></i></span> <span class="hidden-xs-down"><i class="flag-icon flag-icon-us"></i> ภาษาอังกฤษ</span></a> 
									</li>  
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                               
                                <div class="tab-pane active" id="thai" role="tabpanel">
                                    <div class="card-body">

                                      <div class="form-group">
                                        <label for="example-email">ชื่อหมวดหมู่ </label>
                                        <input onkeyup ="disabled_btn_add()" type="text" class="form-control" id="name_th" name="name_th" placeholder="ภาษาไทย">
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email">คำอธิบาย </label>
                                        <textarea rows="5" class="form-control" id="explanation_th" name="explanation_th"></textarea>
                                      </div>

                                    </div>
                                </div>
                                <div class="tab-pane" id="english" role="tabpanel">
                                    <div class="card-body">
                                        
                                      <div class="form-group">
                                        <label for="example-email">ชื่อหมวดหมู่ </label>
                                        <input type="text" class="form-control" id="name_en" name="name_en" placeholder="ภาษาอังกฤษ">
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email">คำอธิบาย </label>
                                        <textarea rows="5" class="form-control" id="explanation_en" name="explanation_en"></textarea>
                                      </div>

                                    </div>
                                </div>
								
                                    <div class="card-body" style="padding: 0rem 1.25rem 1.25rem 1.25rem;">
                                      <div class="form-group">
                                        <label for="example-catagory">หมวดหมู่สินค้า </label>
			  					
										  	<select class="form-control select2" name="name_catagory" id="name_catagory">
                                          		<option value="0" selected="selected">-- หมวดหมู่หลัก --</option>
												
												<?php 
												 $strSQL = "SELECT `id_catagory`,`name_catagory_th`,`name_catagory_en`,`order`,`group_sub`,`level` FROM `product_catagory` WHERE `level` = '1' AND `delete_datetime` IS null";
    											 $objQuery = $db->Query($strSQL);
	 
	 											 while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
												?>
												<option value="1-<?php echo $objResult['id_catagory'] ?>">&nbsp; <?php echo $objResult['name_catagory_th'] ?></option>
												
													<?php 
													 $strSQL2 = "SELECT `id_catagory`,`name_catagory_th`,`name_catagory_en`,`order`,`group_sub`,`level` FROM `product_catagory` WHERE `level` = '2' AND `group_sub` = '".$objResult['id_catagory']."' AND `delete_datetime` IS null";
													 $objQuery2 = $db->Query($strSQL2);

													 while ($objResult2 = mysqli_fetch_array($objQuery2, MYSQLI_ASSOC)) {
													?>
														<option value="2-<?php echo $objResult2['id_catagory'] ?>">&nbsp;&nbsp;- <?php echo $objResult2['name_catagory_th'] ?></option>

													<?php } ?>
												
												<?php } ?>
												
										  	</select>
										  
                                      </div>

                                    </div>
                               
                            </div>
                        </div>
                    </div>

              </div> 
              <div class="boxsave" id="box-del-list" align="center">

                <button type="button" class="btn btn-warning  btnSendClear" style="border:1px  margin-left: 5px;" onclick="javascript:location.reload(); "><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp;รีเซ็ท</button>
				  
				<button disabled  type="button" class="btn btn-success  btnSendAdd" id="btnSendAdd" style="transition: 0.4s; margin-left: 5px;" ><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;บันทึก</button>  

              </div>  
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
                


<div class="modal fade" id="modal_edit" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div id="div_edit" ></div> 

    </div>
  </div>
</div>




<input type="hidden" name="per_button_edit" id="per_button_edit" value="<?php echo $button_update ?>">
<input type="hidden" name="per_button_del" id="per_button_del" value="<?php echo $button_delete ?>">
<input type="hidden" name="per_button_open" id="per_button_open" value="<?php echo $button_create ?>">
<input type="hidden" name="per_input_read" id="per_input_read" value="<?php echo $button_view ?>">

<?php include('../template/footer.php');?>

<script type="text/javascript" src="js/javascript.js"></script>



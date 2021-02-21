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
	
	@media (max-width: 575px) {
	.css-search-product{
		margin-top: 10px;
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
                        <h3 class="text-themecolor m-b-0 m-t-0">จัดการสินค้าของเรา</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:location.href='../index.php'">Home</a></li>
                            <li class="breadcrumb-item active">จัดการสินค้าของเรา</li>
                        </ol>
                    </div>
                    
                </div>
								<div class="">
                                <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                            </div>
                
<div class="row"> 

    <div class="col-md-12">   
         <div class="card card-body" >
          <div class="box-header with-border">
            <div class="row"> 
            <div class="col-md-6" align="left">
              <h3 class="box-title">ค้นหา สินค้าของเรา</h3>
            </div>
            
            </div>
          </div>
<div class="row">
          <div class="col-md-4" >
                                      <div class="form-group">
                                        <label for="example-email"> หมวดหมู่สินค้า </label>
                                        <select class="form-control select2" name="id_category" id="id_category">
                                          <option value="0">-- เลือกหมวดหมู่ --</option>
<?php
  $strSQL = "SELECT `id_catagory`,`name_catagory_th`,`level`  FROM `product_catagory` WHERE `delete_datetime` IS null";
  $objQuery = $db->Query($strSQL);
  while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
      ?>
                                          <option value="<?php echo $objResult["id_catagory"] ?>"> <?php
						if($objResult["level"] == '1'){
							echo '&nbsp;'.$objResult["name_catagory_th"];
						}
						else if ($objResult["level"] == '2'){
							echo '&nbsp;&nbsp;- '.$objResult["name_catagory_th"];
						}
						else if ($objResult["level"] == '3'){
							echo '&nbsp;&nbsp;&nbsp;--  '.$objResult["name_catagory_th"];
						}
					?></option>
<?php
  } ?>
                                        </select>
                                      </div>
          </div>
          <div class="col-md-8" >
                                    <div class="form-group">
                                      <label for="example-email"> คำค้นหา </label>
                                      <div class="row">
                                        <div class="col-md-8 col-sm-8" >
                                          <input type="text" class="form-control" name="search_key" id="search_key" placeholder="ค้นหาสินค้าที่ต้องการ">
                                        </div>
                                        <div class="col-md-4 col-sm-4" align=""  >
                                         <button class="btn btn-success css-search-product" id="btn_search">ค้นหา <i class="fa fa-search" aria-hidden="true"></i></button>
                                        </div>
                                      </div>
                                    </div>
          </div>
         
</div>
        </div>
    </div>


  <div class="col-md-12">   
         <div class="card card-body" >
          <div class="box-header with-border">
            <div class="row"> 
            	<div class="col-md-6" align="left">
              		<h3 class="box-title">จัดการ สินค้าของเรา</h3>
            	</div>
            		<div class="col-md-6" align="right">

					<?php
						if ($button_create=='') {
					?>
                		<a href="front_product_manage.php"  style="transition: 0.4s;<?php echo $button_create ?>"  class="btn btn-success pull-right"    ><i class="mdi mdi-plus"></i> เพิ่มสินค้าใหม่</a> 
					<?php
						  }
					?>
					</div>
			</div>
          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="frmMain" id="frmMain" method="post">
              <input type="hidden" name="form" value="Multi_del_product">
              <input type="hidden" name="change" id="changeMulti">
              <div id="div_table_list_course"></div> 
              <div class="boxsave" id="box-del-list">

<?php
      if ($button_delete=='') {
          ?>
                <button type="button" class="delmulti-menu btn btn-danger" style="transition: 0.4s; <?php echo $button_del; ?>" id="MultiDelete_course" disabled data-id="Delete"><i class="fa fa-remove"></i> ลบรายการที่เลือก <span class="num_course_"></span></button>
<?php
      }
     
?>
              </div>  
            </form>
          </div>
        </div>
      </div>





                <!-- Row -->
                <!-- ============================================================== -->
			</div>
</div>
                <!-- End PAge Content -->
                


<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div id="div_edit" ></div> 

    </div>
  </div>
</div>

<div class="modal fade" id="modal_address" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div id="div_address" ></div> 

    </div>
  </div>
</div>

<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div id="div_add" class="col-md-12" style="<?php echo $button_create ?>">
        <div class="card card-body" >
          <div class="box-header with-border">
            <h3 class="box-title">เพิ่ม Partner ใหม่</h3>
            
      

          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="form_add" id="form_add" method="post">
              <input type="hidden" name="form" value="form_add">
              
              <div id="div_form_add" >
                  
                    <div class="form-group col-md-12">
                      <div class="card">
                        <div class="card-body ">
                          <label for="input-file-now">รูปภาพ</label>
                          <input accept="image/*" type="file" id="name_img" class="dropify" name="name_img" />
                        </div>
                      </div>
                    </div>
                <div class="row">

                  <div class="col-md-12" >

                    <div class="form-group">
                      <label for="example-email">ชื่อ </label>
                      <input  type="text" class="form-control" id="name" name="name"  >
                    </div>

                  </div>
                  <div class="col-md-6" >

                    

                    <div class="form-group">
                      <label for="example-email">เลขที่บัตรประชาชน / เลขประจำตัวผูเสียภาษี </label>
                      <input maxlength="18" OnKeyPress="check_format('id_cade')"  type="text" class="form-control" id="id_cade" name="id_cade"  pattern="[0-9]{1}-[0-9]{4}-[0-9]{3}-[0-9]{1}-[0-9]{1}-[0-9]{3}"    placeholder="9-9999-999-9-9-999" required>
                    </div>

                    <div class="form-group">
                      <label for="example-email">E-mail </label>
                      <input onchange="check_email('add')"  type="email" class="form-control" id="e_mail" name="e_mail" placeholder="example@example.com"  required>
                      <label for="example-email" id="warning_email" style="color: red; display: none;">คำเตือน : E-mail นี้มีผู้ใช้งานแล้ว</label>
                    </div>

                  </div>

                  <div class="col-md-6" >

                   

                    <div class="form-group">
                      <label for="example-email">อัตราผลตอบแทน (%) </label>
                      <input maxlength="3" type="text" class="form-control" id="rate" name="rate"  OnKeyPress="return check_num(this)" >
                    </div>

                    <div class="form-group">
                      <label for="example-email">เบอร์โทร </label>
                      <input maxlength="12" OnKeyPress="check_format('telaphone')" type="tel" class="form-control" id="telaphone" name="telaphone" pattern="[0-9]{3}-[0-9]{4}-[0-9]{3}"   placeholder="999-9999-999"  required>
                    </div>

                  </div>
                  <div class="col-md-12" >

                    <div class="form-group" id="editor" style="margin-top: 10px;">
                      <label for="example-email">รายละเอียด</label>
                      <textarea class='edit' name="detail" style="margin-top: 20px;"></textarea>
                    </div>

                  </div>

                </div>

                    

              </div> 
              <div class="boxsave" id="box-del-list" align="center">

                <button   type="button" class="btn btn-success  btnSendAdd" id="btnSendAdd" style="transition: 0.4s; margin-left: 5px;" ><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;บันทึก</button>

                <button type = "button" class = "btn btn-default" data-dismiss = "modal">ปิด</button>


              </div>  
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<input type="hidden" name="per_button_edit" id="per_button_edit" value="<?php echo $button_update ?>">
<input type="hidden" name="per_button_del" id="per_button_del" value="<?php echo $button_delete ?>">
<input type="hidden" name="per_button_open" id="per_button_open" value="<?php echo $button_create ?>">
<input type="hidden" name="per_input_read" id="per_input_read" value="<?php echo $button_view ?>">
<input type="hidden" name="per_input_approval" id="per_input_approval" value="<?php echo $button_approval ?>">
<?php include('../template/footer.php');?>

    

<script type="text/javascript" src="js/javascript.js"></script>

<script type="text/javascript">
  $(".select2").select2({
      width : '100%'
    });
  $(function() {
          $('.edit').froalaEditor({
            language: 'th',
            heightMin: 300,
            heightMax: 400,
            imageUploadURL:"froala_upload_image.php",
            imageUploadParam:"fileName",
            imageManagerLoadMethod:"GET",
            imageManagerLoadURL:"../../plugins_b/page_froala/select.php",
            imageManagerDeleteURL:"page_froala/froala_delete_image.php",
            imageManagerDeleteMethod:"POST",
            // video
            videoUploadURL: 'froala_upload_video.php',
            videoUploadParam: 'fileName',
            videoUploadMethod: 'POST',
            videoMaxSize: 50 * 1024 * 1024,
            videoAllowedTypes: ['mp4', 'webm', 'jpg', 'ogg'],

            fileUploadURL: 'froala_upload_file.php',
            fileUploadParam: 'fileName',
            fileUploadMethod: 'POST',
            fileMaxSize: 20 * 1024 * 1024,
            fileAllowedTypes: ['*'],
          });

      });

  $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>



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
                        <h3 class="text-themecolor m-b-0 m-t-0">จัดการร้านค้าของเรา</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:location.href='../index.php'">Home</a></li>
                            <li class="breadcrumb-item active">จัดการร้านค้าของเรา</li>
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
              <h3 class="box-title">ค้นหา ร้านค้าของเรา</h3>
            </div>
            
            </div>
          </div>
<div class="row">
          <div class="col-md-4" >
                                      <div class="form-group">
                                        <label for="example-email"> หมวดหมู่ร้านค้า </label>
                                        <select class="form-control select2" name="id_category" id="id_category">
                                          <option value="0">-- เลือกหมวดหมู่ร้านค้า --</option>
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
              		<h3 class="box-title">จัดการ ร้านค้าของเรา</h3>
            	</div>
            		<div class="col-md-6" align="right">

					<?php
						if ($button_create=='') {
					?>
                		<a href="../mod_customer/front_manage.php"  style="transition: 0.4s;<?php echo $button_create ?>"  class="btn btn-success pull-right"    ><i class="mdi mdi-plus"></i> เพิ่มร้านค้าใหม่</a> 
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



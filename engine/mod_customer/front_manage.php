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
                        <h3 class="text-themecolor m-b-0 m-t-0">ร้านค้า</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:location.href='../index.php'">Home</a></li>
                            <li class="breadcrumb-item active">ร้านค้า</li>
                        </ol>
                    </div>
                    
                </div>
								<div class="">
                                <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                            </div>
<?php if ($button_view=='') { ?>                
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
                                        <select class="form-control select2" name="id_category_s" id="id_category_s">
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
              <h3 class="box-title"><i class="far fa-user-circle"></i> จัดการร้านค้า</h3>
            </div>
            <div class="col-md-6" align="right">

<?php
      if ($button_create=='') {
          ?>
                <button data-toggle="modal" data-target="#modal_add" type="button" class="btn btn-success pull-right" style="transition: 0.4s; <?php echo $button_create; ?>" id="add_btn"> <i class="fas fa-plus"></i> เพิ่มร้านค้าใหม่ </button>
<?php
      }
     
?>
</div>
</div>
          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="frmMain" id="frmMain" method="post">
              <!-- <input type="hidden" name="form" value="Multi_del">
              <input type="hidden" name="change" id="changeMulti"> -->
              <div id="div_table_list">
              </div>
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





                <!-- Row -->
                <!-- ============================================================== -->
			</div>
                <?php } ?>
</div>
                <!-- End PAge Content -->
                


<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div id="div_edit"></div> 

    </div>
  </div>
</div>

<div class="modal fade" id="modal_address" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <div id="div_address"></div> 

    </div>
  </div>
</div>
            
<div class="modal fade" id="modal_print" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <div id="div_print"></div> 

    </div>
  </div>
</div>
            
<div class="modal fade" id="modal_percent" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <div id="div_percent"></div> 

    </div>
  </div>
</div>            

<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div id="div_add" class="col-md-12" style="<?php echo $button_create ?>">
        <div class="card card-body" >
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fas fa-plus-circle"></i> เพิ่มร้านค้าใหม่</h3>
            
      

          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="form_add" id="form_add" method="post">
              <input type="hidden" name="form" value="form_add">
              
              <div id="div_form_add" >
                  
                    <div class="form-group col-md-12">
                      <div class="card">
                        <div class="card-body ">
                          <label for="input-file-now" class="text-themecolor"><i class="mdi mdi-file-image"></i> รูปภาพ</label>
                          <input accept="image/png,image/jpeg,image/pjpeg,image/x-png,image/png" type="file" id="name_img" class="dropify" name="name_img"  onchange="chk_pic()" />
                        </div>
                      </div>
                    </div>
                <div class="row"> 

                  <div class="col-md-12" >

                    <div class="form-group">
                      <label for="example-name" class="text-themecolor"><i class="mdi mdi-rename-box"></i> ชื่อร้านค้า </label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="กรุณากรอกชื่อร้านของคุณ">
                    </div>

                  </div>
                    
                  <div class="col-md-12" >

                    <div class="form-group">
                      <label for="example-idcard" class="text-themecolor"><i class="mdi mdi-account-card-details"></i> เลขที่บัตรประชาชน </label>
                      <input   type="text" class="form-control" id="id_cade" name="id_cade"  pattern="[0-9]{1}-[0-9]{4}-[0-9]{3}-[0-9]{1}-[0-9]{1}-[0-9]{3}"  data-mask="9-9999-999-9-9-999" placeholder="9-9999-999-9-9-999" required>
                    </div>

                    <div class="form-group">
                      <label for="example-email" class="text-themecolor"><i class="mdi mdi-contact-mail"></i> E-mail </label>
                      <input onchange="check_email('add')" type="email" class="form-control" id="e_mail" name="e_mail" placeholder="example@example.com" required>
                      <label for="example-email" id="warning_email"  style="color: red; display: none;">คำเตือน : E-mail นี้มีผู้ใช้งานแล้ว</label>
                    </div>

                    <div class="form-group">
                      <label for="example-phone" class="text-themecolor"><i class="fas fa-phone-square"></i> เบอร์โทรศัพท์ </label>
                      <input  type="tel" class="form-control" id="telaphone" name="telaphone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" data-mask="999-999-9999" placeholder="999-999-9999"  required>
                    </div>
                      
                    				<div class="form-group">
                                        <label for="example-email" class="text-themecolor"><i class="fas fa-list-alt"></i> หมวดหมู่ </label>
                                        <select class="form-control select2" name="id_category" id="id_category">
                                          <option value="0">-- เลือกหมวดหมู่ --</option>
<?php
  $strSQL = "SELECT `id_catagory`,`name_catagory_th`,`name_catagory_en`,`order`,`group_sub`,`level` FROM `product_catagory` WHERE `delete_datetime` IS null ORDER BY 'group_sub','order' ASC";
  $objQuery = $db->Query($strSQL);
  while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
      ?>
                                          <option value="<?php echo $objResult["id_catagory"] ?>" >
											 <?php
												if($objResult["level"] == '1'){
													echo $objResult["name_catagory_th"];
												}
												else if ($objResult["level"] == '2'){
													echo '&nbsp;- '.$objResult["name_catagory_th"];
												}
												else if ($objResult["level"] == '3'){
													echo '&nbsp;&nbsp;--> '.$objResult["name_catagory_th"];
												}
											?>
										  </option>
											<?php
											  } 
											?>
                                        </select>
                                      </div>  

                  </div>

                </div>

              </div> 
              <div class="boxsave" id="box-del-list" align="center">
                  
                <button type = "button" class = "btn btn-danger" data-dismiss = "modal"><i class="fas fa-window-close"></i> ปิด</button>  

                <button   type="button" class="btn btn-success  btnSendAdd" id="btnSendAdd" style="transition: 0.4s; margin-left: 5px;" ><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;บันทึก</button>

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
<input type="hidden" name="per_input_read" id="per_input_approval" value="<?php echo $button_approval ?>">
<?php include('../template/footer.php');?>

    

<script type="text/javascript" src="js/javascript.js"></script>
<script src="js/mask.js"></script>
<script type="text/javascript">
    
    $(".select2").select2({
      width : '100%'
    });
    
			 $('.dropify').dropify({
					  messages: {
					'default': '<span style="font-size: 16px; font-family: Sarabun, sans-serif;">ลากและวางไฟล์ที่นี่หรือคลิก</span>',
					'replace': '<span style="font-size: 14px; font-family: Sarabun, sans-serif;">ลากและวางหรือคลิกเพื่อแทนที่</span>',
					'remove':  '<span style="font-size: 13px; font-family: Sarabun, sans-serif;">ลบออก</span>',
					'error':   'อ๊ะมีบางอย่างผิดปกติเกิดขึ้น'
				},
				tpl: {
				message:     '<div class="dropify-message" ><span class="file-icon" /> <p style="text-align: center;">{{ default }}</p></div>',
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


function chk_pic(){
  var file=document.form_add.name_img.value;
  var patt=/(.jpg|.png|.jpeg)/;
  var result=patt.test(file);
        if(!result){
          swal.fire("คำเตือน", 'ประเภทไฟล์ไม่ถูกต้อง ("jpeg", "jpg", "png" only)', "error");
          var tagButton = document.getElementsByClassName("dropify-clear")[0];
          tagButton.click();
        }
  return result;
}

function chk_pic_edit(){
  var file=document.form_edit.name_img.value;
  var patt=/(.jpg|.png|.jpeg)/;
  var result=patt.test(file);
        if(!result){
          swal.fire("คำเตือน", 'ประเภทไฟล์ไม่ถูกต้อง ("jpeg", "jpg", "png" only)', "error");
          var tagButton = document.getElementsByClassName("dropify-clear")[0];
          tagButton.click();
        }
  return result;
}
    
    <?php
		if($button_view != ''){
			$btn_view = explode(":", $button_view);
			$btn_view_show = $btn_view[0].$btn_view[1];
	?>
		var btn_view = 'displaynone'
		var btn_view_show = '<?php echo $btn_view_show; ?>'
		if(btn_view == btn_view_show ){

							swal.fire({
							title: 'คุณไม่มีสิทธิเข้าใช้งาน หน้านี้',
							icon: 'warning',
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							allowEscapeKey : false,
							allowOutsideClick: false,
							confirmButtonText: 'ตกลง',
							onClose: () => {
									   window.location.href = "../";
								 }
						  })
	}
	<?php } ?>
    
  function chkNumber(ele)
  {
  var vchar = String.fromCharCode(event.keyCode);
  if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
  ele.onKeyPress=vchar;
  }    
    
</script>



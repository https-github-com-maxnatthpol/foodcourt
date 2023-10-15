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
  
<!-- <link rel="stylesheet" href="../../plugins_b/dropify/dist/css/dropify.min.css">
<link href="../../plugins_b/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

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
                        <h3 class="text-themecolor m-b-0 m-t-0">ข้อมูลส่วนกลาง</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:location.href='../index.php'">Home</a></li>
                            <li class="breadcrumb-item active">ข้อมูลส่วนกลาง</li>
                        </ol>
                    </div>
                    
                </div>
								<div class="">
                                <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                            </div>
<?php if($button_view != 'display:none' ) { ?>

<div class="row" style="<?php echo $button_view ?>" > 

 
<div id="div_add" class="col-md-12" style="">
        <div class="card card-body" >
          <div class="box-header with-border">
           
          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="form_add" id="form_add" method="post">
              <input type="hidden" name="form" value="form_add">
              <div class="row"> 
              <div id="div_form_add" class="col-md-6">
                  <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#thai" role="tab"><span class="hidden-sm-up"><i class="flag-icon flag-icon-th"></i></span> <span class="hidden-xs-down"><i class="flag-icon flag-icon-th"></i> ภาษาไทย</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#english" role="tab"><span class="hidden-sm-up"><i class="flag-icon flag-icon-us"></i></span> <span class="hidden-xs-down"><i class="flag-icon flag-icon-us"></i> ภาษาอังกฤษ</span></a> </li>
                                </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="thai" role="tabpanel">
									
                                    <div class="card-body">
                                      <div class="form-group">
                                        <label for="example-email">ชื่อบริษัท </label>
                                        <input onkeyup ="disabled_btn_add()" type="text" class="form-control" id="name_th" name="name_th" placeholder="ภาษาไทย">
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email">ที่อยู่ </label>
                                        <input  type="text" class="form-control" id="address_th" name="address_th" placeholder="ภาษาไทย">
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email">Title </label>
                                        <input  type="text" class="form-control" id="title_th" name="title_th" placeholder="ภาษาไทย">
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email">Description </label>
                                        <input  type="text" class="form-control" id="description_th" name="description_th" placeholder="ภาษาไทย">
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email">Keyword </label>
                                        <input  type="text" class="form-control" id="keyworde_th" name="keyworde_th" placeholder="ภาษาไทย">
                                      </div>
									<?php 
										$detail_th = getSetting('detail_th');
										$detail_th = $detail_th == " "?detail_th:$detail_th; ?>	
									  <div class="form-group">
                                        <label for="example-email">รายละเอียดเกี่ยวกับเรา</label>
										<textarea class="form-control detail" id="detail" name="detail_th" placeholder="ภาษาไทย"><?php echo $detail_th; ?></textarea>
                                      </div>	

                                    </div>
                                    
                                </div>
                                <div class="tab-pane" id="english" role="tabpanel">
                                    <div class="card-body">
                                        
                                      <div class="form-group">
                                        <label for="example-email">ชื่อบริษัท </label>
                                        <input  type="text" class="form-control" id="name_en" name="name_en" placeholder="ภาษาอังกฤษ">
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email">ที่อยู่ </label>
                                        <input  type="text" class="form-control" id="address_en" name="address_en" placeholder="ภาษาอังกฤษ">
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email">Title </label>
                                        <input  type="text" class="form-control" id="title_en" name="title_en" placeholder="ภาษาอังกฤษ">
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email">Description </label>
                                        <input  type="text" class="form-control" id="description_en" name="description_en" placeholder="ภาษาอังกฤษ">
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email">Keyword </label>
                                        <input  type="text" class="form-control" id="keyworde_en" name="keyworde_en" placeholder="ภาษาอังกฤษ">
                                      </div>
										
									  <?php 
										$detail_en = getSetting('detail_en');
										$detail_en = $detail_en == " "?detail_en:$detail_en; ?>		
									  <div class="form-group">
                                        <label for="example-email">รายละเอียดเกี่ยวกับเรา</label>
                                        <textarea rows="5" class="form-control detail" id="detail" name="detail_en" ><?php echo $detail_en; ?></textarea>
                                      </div>	

                                        </div>
                                      </div>

                                    </div>
                                </div>
				  			</div>

                                <!-- *Start 1** ---->
                                <div class="card col-md-6">
                                   <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group row ">
                                            <label for="" class="col-sm-12 col-form-label">Email สำหรับติดต่อเรา</label>
                                            <div class="col-sm-12">
                                                <input type="email" class="form-control email " id="email" name="email" placeholder="name@example.com">
                                                <div class="form-control-feedback" id="text_success_emill" style="color: #4bbd03; display: none;">รูปแบบอีเมลถูกต้อง!</div>
                                                <div class="form-control-feedback" id="text_warning_emill" style="color: #fb3a3a; display: none;">รูปแบบอีเมลไม่ถูกต้อง!</div>
                                            </div>
                                           </div>
										</div>
									   
<!--
									    <div class="col-md-6">
                                          <div class="form-group row ">
                                            <label for="" class="col-sm-12 col-form-label">Email สำหรับติดต่อเรา (สำรอง)</label>
                                            <div class="col-sm-12">
                                                <input type="email" class="form-control email2 " id="email2" name="email2" placeholder="name@example.com">
                                                <div class="form-control-feedback" id="text_success_emill2" style="color: #4bbd03; display: none;">รูปแบบอีเมลถูกต้อง!</div>
                                                <div class="form-control-feedback" id="text_warning_emill2" style="color: #fb3a3a; display: none;">รูปแบบอีเมลไม่ถูกต้อง!</div>
                                            </div>
                                           </div>
										</div>
-->
									   
                                        <div class="col-md-6">
                                          <div class="form-group row">
                                            <label class="col-sm-12 col-form-label">เบอร์โทรศัพท์</label>
												<div class="col-sm-12">  
                                            		<input type="text" maxlength="10" class="form-control" id="telephone" name="telephone" OnKeyPress="return check_num(this)">
											  	</div>	
                                          </div>
										</div>
										  
										<div class="col-md-6">
                                          <div class="form-group row">
                                            <label class="col-sm-12 col-form-label">เบอร์โทรศัพท์ (สำรอง)</label>
												<div class="col-sm-12">
                                            		<input type="text" maxlength="10" class="form-control" id="telephone2" name="telephone2" OnKeyPress="return check_num(this)">
											  	</div>	
                                          </div>
										</div>

                                          <div class="form-group col-md-6">
                                            <div class="card" >
                                              <div class="card-body " >
                                                <label for="input-file-now">โลโก้ (Icon)</label>
                                                <!-- <input accept="image/*" type="file" id="logo_img" class="dropify" name="logo_img" /> -->
                                                <?php 
                                                $str_image = "SELECT * FROM settings WHERE 'name' = 'logo_img' ";
                                                $query_image = $db->Query($str_image);
                                                $result_image = mysqli_fetch_array($query_image);
                                               
                                                $date_img  = $result_image['value'];
                                                ?>
                                                <input type="hidden" name="name_img_ed" id="" value="<?php echo $date_img ?>" >
                                                <div id="div_logo"></div>
                                              </div>
                                            </div>
                                          </div>
									   	  <div class="form-group col-md-6">
                                            <div class="card" >
                                              <div class="card-body " >
                                                <label for="input-file-now">โลโก้ (หน้าเว็บ)</label>
                                                <!-- <input accept="image/*" type="file" id="logo_img" class="dropify" name="logo_img" /> -->
                                                <?php 
                                                $str_image2 = "SELECT * FROM settings WHERE 'name' = 'logo_img2' ";
                                                $query_image2 = $db->Query($str_image2);
                                                $result_image2 = mysqli_fetch_array($query_image2);
                                               
                                                $date_img2  = $result_image2['value'];
                                                ?>
                                                <input type="hidden" name="name_img_ed2" id="" value="<?php echo $date_img2 ?>">
                                                <div id="div_logo2"></div>
                                              </div>
                                            </div>
                                          </div>
									   <div class="col-md-12">
									   		<hr style="border: 1px double #1154a0 !important; width: 100%;">
									   </div>	   
									   <label class="col-md-12">Backend Config </label>
<!--
									     	<div class="col-md-12">
											  <div class="form-group">
												<label for="example-email">การแสดงแบนเนอร์ </label><br>
												<input  type="checkbox" class="filled-in chk-col-cyan" id="random_banner" name="random_banner" value="1">
												<label for="random_banner">แบบสุ่ม </label>
											  </div>		
									   		</div>
-->
									   		<div class="col-md-6">
											  <div class="form-group">
												<label for="example-email">Title </label>
												<input  type="text" class="form-control" id="head_title" name="head_title" >
											  </div>
                        					</div>
									   		<div class="col-md-6">
											  <div class="form-group">
												<label for="example-email">Title mini </label>
												<input  type="text" class="form-control" id="head_title_mini" name="head_title_mini" >
											  </div>
                        					</div>
									   		<div class="col-md-12">
											  <div class="form-group">
												<label for="example-email">Google map key (link)</label>
												<input type="text" class="form-control" id="google_map_key" name="google_map_key" >
											  </div>
                        					</div>
										</div>
                                       </div>
                                   <!-- *End 1** ----> 
                  </div>

              </div> 
              <div class="boxsave" id="box-del-list" align="center">

                <button type="button" class="btn btn-warning btnSendClear" style="border:1px  margin-left: 5px;" onclick="javascript:location.reload(); "><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp;รีเซ็ท</button>
				  
				<button disabled type="button" class="btn btn-success  btnSendAdd" id="btnSendAdd" style="transition: 0.4s; margin-left: 5px; <?php echo $button_update ?>" ><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;บันทึก</button>

              </div>  
            </form>
          </div>
        </div>
      </div>
				<?php } ?>
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
<input type="hidden" name="per_button_edit" id="per_button_edit" value="<?php echo $button_update ?>">
<input type="hidden" name="per_button_del" id="per_button_del" value="<?php echo $button_delete ?>">
<input type="hidden" name="per_button_open" id="per_button_open" value="<?php echo $button_create ?>">
<input type="hidden" name="per_input_read" id="per_input_read" value="<?php echo $button_view ?>">
<?php include('../template/footer.php');?>

<script type="text/javascript" src="js/javascript.js"></script>
<!-- <script src="../../plugins_b/dropify/dist/js/dropify.min.js"></script> -->

<!-- Include the fonts. -->
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,700,700italic&subset=latin,vietnamese,latin-ext,cyrillic,cyrillic-ext,greek-ext,greek' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700&subset=latin,greek,greek-ext,vietnamese,cyrillic-ext,cyrillic,latin-ext' rel='stylesheet' type='text/css'>

<script type="text/javascript">
$('.dropify').dropify({
	
        messages: {

        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
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
  var file=document.form_add.logo_img.value;
  var patt=/(.jpg|.png|.jpeg)/;
  var result=patt.test(file);
        if(!result){
          swal.fire("คำเตือน", 'ประเภทไฟล์ไม่ถูกต้อง ("jpeg", "jpg", "png" only)', "error");
          var tagButton = document.getElementsByClassName("dropify-clear")[0];
          tagButton.click();
        }
  return result;
}
	
  function chk_pic2(){
  var file=document.form_add.logo_img2.value;
  var patt=/(.jpg|.png|.jpeg)/;
  var result=patt.test(file);
        if(!result){
          swal.fire("คำเตือน", 'ประเภทไฟล์ไม่ถูกต้อง ("jpeg", "jpg", "png" only)', "error");
          var tagButton = document.getElementsByClassName("dropify-clear")[1];
          tagButton.click();
        }
  return result;
}
</script>



<script>
	
  $(function() {
		  $('.detail').froalaEditor({	  
            language: 'th',
            heightMin: 100,
            heightMax: 200,
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
</script>


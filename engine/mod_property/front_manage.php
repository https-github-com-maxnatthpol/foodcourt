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
                        <h3 class="text-themecolor m-b-0 m-t-0">คุณสมบัติของเรา</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:location.href='../index.php'">Home</a></li>
                            <li class="breadcrumb-item active">คุณสมบัติของเรา</li>
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

<div id="div_add" class="col-md-6" style="<?php echo $button_view ?>">
        <div class="card card-body" >
          <div class="box-header with-border">
            <h3 class="box-title">รายการ คุณสมบัติของเรา</h3>
          </div>
          <form action="" name="frmMain" id="frmMain" method="post">
              <input type="hidden" name="form" value="Multi_del">
          <div class="box-body" style="padding: 0;" id="div_table_front_manage">
            

          </div> 
        </form>
              <div class="boxsave" id="box-del-list" >

               <?php
      if ($button_delete=='') {
          ?>
                <button type="button" class="delmulti-menu btn btn-danger" style="transition: 0.4s; <?php echo $button_del; ?>" id="MultiDelete" disabled data-id="Delete"><i class="fa fa-remove"></i> ลบรายการที่เลือก <span class="num_"></span></button>
<?php
      }
     
?>


              </div>  
            
          </div>
</div>
     

<div id="div_add" class="col-md-6" style="<?php echo $button_create ?>">
        <div class="card card-body" >
          <div class="box-header with-border">
            <h3 class="box-title">เพิ่ม คุณสมบัติของเรา</h3>
            
      

          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="form_add" id="form_add" method="post">
              <input type="hidden" name="form" value="form_add">
              
              <div id="div_form_add" >
                  <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> 
                                  <a class="nav-link active" data-toggle="tab" href="#thai" role="tab">
                                    <img class="flag-lang" src="img/th-fl.png" width="22" height="15" > ภาษาไทย
                                  </a> 
                                </li>
                                <li class="nav-item"> 
                                  <a class="nav-link" data-toggle="tab" href="#english" role="tab">
                                    <img class="flag-lang" src="img/en-fl.jpg" width="22" height="15" > ภาษาอังกฤษ
                                  </a> 
                                </li>
                                
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                               
                                <div class="tab-pane active" id="thai" role="tabpanel">
                                    <div class="card-body">

                                      <div class="form-group">
                                        <label for="example-email">ชื่อหัวข้อ </label>
                                        <input onkeyup ="disabled_btn_add_property()" type="text" class="form-control" id="name_th" name="name_th" placeholder="ภาษาไทย">
                                      </div>

                                      <div class="form-group" id="editor" style="margin-top: 10px;">
                                        <label for="example-email">รายละเอียด</label>
                                        <textarea id='edit' class='edit' name="detail_th" style="margin-top: 20px;"></textarea>
                                      </div>

                                      


                                    </div>
                                </div>
                                <div class="tab-pane" id="english" role="tabpanel">
                                    <div class="card-body">
                                        
                                      <div class="form-group">
                                        <label for="example-email">ชื่อหัวข้อ </label>
                                        <input  type="text" class="form-control" id="name_en" name="name_en" placeholder="ภาษาอังกฤษ">
                                      </div>

                                      <div class="form-group" id="editor" style="margin-top: 10px;">
                                        <label for="example-email">รายละเอียด</label>
                                        <textarea id='edit' class='edit' name="detail_en" style="margin-top: 20px;"></textarea>
                                      </div>

                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    
                    <div class="form-group">
                      <label for="example-email">ลำดับ </label>
                      <input  type="text" class="form-control" id="order" name="order" OnKeyPress="return check_num(this)" >
                    </div>

                    <div class="">
                      <div class="card">
                        <div class="card-body ">
                          <label for="input-file-now">รูปภาพ</label>
                          <input accept="image/*" type="file" id="property_img" class="dropify" name="property_img" onchange="chk_pic()"/>
                        </div>
                      </div>
                    </div>

              </div> 
              <div class="boxsave" id="box-del-list" align="center">

                <button type="button" class="btn btn-default  btnSendClear" style="border:1px  margin-left: 5px;" onclick="javascript:location.reload(); "><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp;รีเซ็ท</button>
				  
				<button disabled  type="button" class="btn btn-success  btnSendAdd" id="btnSendAdd" style="transition: 0.4s; margin-left: 5px;" ><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;เพิ่ม คุณสมบัติของเรา ใหม่</button> 

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




<input type="hidden" name="per_button_edit" id="per_button_edit" value="<?php echo $button_update ?>">
<input type="hidden" name="per_button_del" id="per_button_del" value="<?php echo $button_delete ?>">
<input type="hidden" name="per_button_open" id="per_button_open" value="<?php echo $button_create ?>">
<input type="hidden" name="per_input_read" id="per_input_read" value="<?php echo $button_view ?>">

<?php include('../template/footer.php');?>

<script type="text/javascript" src="js/javascript.js"></script>

<script type="text/javascript">

  $(function() {
          $('.edit').froalaEditor({
            language: 'th',
            heightMin: 100,
            heightMax: 200,
            imageUploadURL:"froala_upload_image.php",
            imageUploadParam:"fileName",
            imageManagerLoadMethod:"GET",
            imageManagerLoadURL:"../../plugins_b/page_froala/select.php",
            imageManagerDeleteURL:"froala_delete_image.php",
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
  var file=document.form_add.property_img.value;
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
  var file=document.form_edit.property_img.value;
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

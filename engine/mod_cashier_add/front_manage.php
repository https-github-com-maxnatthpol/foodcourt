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
                        <h3 class="text-themecolor m-b-0 m-t-0">แคสเชียร์</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:location.href='../index.php'">Home</a></li>
                            <li class="breadcrumb-item active">แคสเชียร์</li>
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
              <h3 class="box-title">จัดการแคสเชียร์</h3>
            </div>
            <div class="col-md-6" align="right">

<?php
      if ($button_create=='') {
          ?>
                <button data-toggle="modal" data-target="#modal_add" type="button" class="btn btn-success pull-right" style="transition: 0.4s; <?php echo $button_create; ?>" id="add_btn"  > เพิ่มแคสเชียร์ใหม่ </button>
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
            <h3 class="box-title">เพิ่มแคสเชียร์</h3>
            
      

          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="form_add" id="form_add" method="post">
              <input type="hidden" name="form" value="form_add">
              
              <div id="div_form_add" >
                  
                    <div class="form-group col-md-12">
                      <div class="card">
                        <div class="card-body ">
                          <label for="input-file-now">รูปภาพ</label>
                          <input accept="image/png,image/jpeg,image/pjpeg,image/x-png,image/png" type="file" id="name_img" class="dropify" name="name_img"  onchange="chk_pic()" />
                        </div>
                      </div>
                    </div>
                <div class="row"> 

                  <div class="col-md-6" >

                    <div class="form-group">
                      <label for="example-email">ชื่อ </label>
                      <input  type="text" class="form-control" id="name" name="name" placeholder="กรอกชื่อของคุณ" >
                    </div>

                  </div>

                  <div class="col-md-6" >

                    <div class="form-group">
                      <label for="example-email">นามสกุล </label>
                      <input  type="text" class="form-control" id="surname" name="surname" placeholder="กรอกนามสกุลของคุณ" >
                    </div>

                  </div>
                  <div class="col-md-12" >

                    <div class="form-group">
                      <label for="example-email">เลขที่บัตรประชาชน </label>
                      <input   type="text" class="form-control" id="id_cade" name="id_cade"  pattern="[0-9]{1}-[0-9]{4}-[0-9]{3}-[0-9]{1}-[0-9]{1}-[0-9]{3}"  data-mask="9-9999-999-9-9-999"    placeholder="9-9999-999-9-9-999" required>
                    </div>

                    <div class="form-group">
                      <label for="example-email">E-mail </label>
                      <input onchange="check_email('add')"  type="email" class="form-control" id="e_mail" name="e_mail" placeholder="example@example.com"   required>
                      <label for="example-email" id="warning_email"  style="color: red; display: none;">คำเตือน : E-mail นี้มีผู้ใช้งานแล้ว</label>
                    </div>

                    <div class="form-group">
                      <label for="example-email">เบอร์โทร </label>
                      <input  type="tel" class="form-control" id="telaphone" name="telaphone" pattern="[0-9]{3}-[0-9]{4}-[0-9]{3}" data-mask="999-9999-999"   placeholder="999-9999-999"  required>
                    </div>

                  </div>

                </div>

                    

              </div> 
              <div class="boxsave" id="box-del-list" align="center">
				  
				<button type = "button" class = "btn btn-danger" data-dismiss = "modal">ปิด</button>  

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

            $(".dropify").dropify({
                messages: {
                    //          default: "Drag and drop a file here or click",
                    default: "<span style='font-size: 16px; font-family: Sarabun, sans-serif;'>ลากและวางไฟล์ที่นี่หรือคลิก</span>",
                    //          replace: "Drag and drop or click to replace",
                    replace: "<span style='font-size: 14px; font-family: Sarabun, sans-serif;'>ลากและวางหรือคลิกเพื่อแทนที่</span>",
                    //          remove: "Remove",
                    remove: "<span style='font-size: 13px; font-family: Sarabun, sans-serif;'>ลบออก</span>",
                    error: "อ๊ะมีบางอย่างผิดปกติเกิดขึ้น"
                        //		  error: "Ooops, something wrong happended."	
                },
                tpl: {
                    message: '<div class="dropify-message" ><span class="file-icon" /> <p style="text-align: center;">{{ default }}</p></div>'
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
          swal.fire("คำเตือน", 'file type is wrong ("jpeg", "jpg", "png" only)', "error");
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
          swal.fire("คำเตือน", 'file type is wrong ("jpeg", "jpg", "png" only)', "error");
          var tagButton = document.getElementsByClassName("dropify-clear")[0];
          tagButton.click();
        }
  return result;
}
</script>



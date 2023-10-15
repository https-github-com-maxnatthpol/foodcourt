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
                        <h3 class="text-themecolor m-b-0 m-t-0">สินค้า</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:location.href='../index.php'">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript:location.href='front_manage.php'">รายการสินค้า</a></li>
                            <li class="breadcrumb-item active">สินค้า</li>
                        </ol>
                    </div>
                    
                </div>
							<div class="">
                                <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                            </div>
                
          <div class="box-body" style="padding: 0;">
            <?php
              if (isset($_GET["id_product"])) {
                  $id_product = $_GET["id_product"];
                  $form = 'form_edit_detail';
              } else {
                  $id_product = '';
                  $form = 'form_add_detail';
              }
            ?>
            <form action="" name="form_add_detail" id="form_add_detail" method="post">
            <input type="hidden" name="form" value="<?php echo $form ?>">
            <input type="hidden" name="id_product" id="id_product" value="<?php echo $id_product ?>" >
             

             <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body p-b-0"> 
                                
                            </div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs customtab" role="tablist" id="ui_head">
                                <li class="nav-item"> <a class="nav-link active" id="btn_detail" data-toggle="tab" href="#detail" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">รายละเอียด</span></a> </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="detail" role="tabpanel">
                                    <div class="p-20">
                                      <div class="row">
                                       <div class="col-md-6">
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
                                        <label for="example-email">ชื่อสินค้า </label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="fas fa-text-width"></i>
												</span>
											</div>  
                                        <input onkeyup ="disabled_btn_add_detail()" type="text" class="form-control" id="name_th" name="name_th" placeholder="กรุณากรอกชื่อสินค้า">
										</div>	
                                      </div>
										
									  <div class="form-group">
                                        <label for="example-text" id="product_code_text">รหัสสินค้า </label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="mdi mdi-barcode-scan"></i>
												</span>
											</div>  
                                        <input type="text" class="form-control" id="product_code" name="product_code" pattern="[0-9A-Za-z]{2}-[0-9A-Za-z]{4}" data-mask="UF-****"   placeholder="UF-xxxx">
										</div>	
										<div class="col-md-12" id="idcode_alert" >
											<small id="a_idcode"  style="color: #fafafa;"></small>
										</div>  
                                      </div>
										
									  <div class="form-group">
                                        <label for="example-email">วัสดุ</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="ti-settings"></i>
												</span>
											</div>  
                                        <input type="text" class="form-control" id="material_th" name="material_th" placeholder="กรุณากรอกวัสดุ">
										  </div>	
                                      </div>
										
									  <div class="form-group">
                                        <label for="example-email">พื้นผิว</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="ti-spray"></i>
												</span>
											</div>  
                                        <input type="text" class="form-control" id="surface_th" name="surface_th" placeholder="กรุณากรอกพื้นผิว">
										  </div>	
                                      </div>	

                                      <div class="form-group" id="editor" style="margin-top: 10px;">
                                        <label for="example-email">รายละเอียดสินค้า </label>
                                        <textarea class='edit' style="margin-top: 20px;" id="description_th" name="description_th"></textarea>
                                      </div>

                                    </div>

                                </div>
                          
                                <div class="tab-pane" id="english" role="tabpanel">
                                    <div class="card-body">

                                      <div class="form-group">
                                        <label for="example-email">ชื่อสินค้า </label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="fas fa-text-width"></i>
												</span>
											</div>
                                  		<input type="text" class="form-control" id="name_en" name="name_en" placeholder="กรุณากรอกชื่อสินค้า">
                         				</div>  
                                      </div>
										
									  <div class="form-group">
                                        <label for="example-email">วัสดุ</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="ti-settings"></i>
												</span>
											</div>  
                                        <input type="text" class="form-control" id="material_en" name="material_en" placeholder="กรุณากรอกวัสดุ">
										  </div>	
                                      </div>
										
									  <div class="form-group">
                                        <label for="example-email">พื้นผิว</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="ti-spray"></i>
												</span>
											</div>  
                                        <input type="text" class="form-control" id="surface_en" name="surface_en" placeholder="กรุณากรอกพื้นผิว">
										  </div>	
                                      </div>	

                                      <div class="form-group" id="editor_en" style="margin-top: 10px;">
                                        <label for="example-email">รายละเอียดสินค้า </label>
                                        <textarea class='edit' style="margin-top: 20px;" id="description_en" name="description_en"></textarea>
                                      </div>

                                    </div>
                                </div>
                               
                            </div>
                          </div>
                          </div>
  									<div class="col-md-6">
										
									  <div class="form-group">
                                        <label for="example-email"> หมวดหมู่ </label>
                                        <select class="form-control select2" name="id_category" id="id_category">
                                          <option value="0">-เลือกหมวดหมู่-</option>
<?php
  $strSQL = "SELECT `id_catagory`,`name_catagory_th`,`name_catagory_en`,`order`,`group_sub`,`level` FROM `product_catagory` WHERE `delete_datetime` IS null ORDER BY 'group_sub','order' ASC";
  $objQuery = $db->Query($strSQL);
  while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
      ?>
                                          <option value="<?php echo $objResult["id_catagory"] ?>">
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
										
                                      <div class="form-group  bt-switch row" >
                                        <div class="col-md-6 col-sm-6" align="center">
                                          <label class="col-md-12">แสดงผล</label>
                                          <div id="div_view_show">
                                            <input name="view_show" id="view_show" value="1" type="checkbox"  data-off-color="danger" data-on-color="success" data-off-text="<i class='mdi mdi-eye-off'></i>" data-on-text="<i class='mdi mdi-eye'></i>"> 
                                          </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6" align="center">
                                          <label class="col-md-12">ผลงานของเรา</label>
                                          <div id="div_view_portfolio">
                                            <input name="view_portfolio" id="view_portfolio" value="1" type="checkbox"  data-off-color="danger" data-on-color="success" data-off-text="<i class='mdi mdi-eye-off'></i>" data-on-text="<i class='mdi mdi-eye'></i>"> 
                                          </div>

                                        </div>
                                      </div>

                                      

                                      <div class="form-group col-md-12">
                                        <div class="card">
                                          <div class="card-body">
                                            <label for="input-file-now">รูปภาพ</label>
                                            <div id="div_img">
                                            <input onchange="chk_pic()" accept="image/*" type="file" id="name_img" class="dropify" name="name_img"  />
                                              
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div id="div_img_ed"></div>                               

  </div>
</div>

  <div class="col-md-12">
    <div class="boxsave" id="" align="center">
		
				<button type="button" class="btn btn-warning btnSendClear" style="border:1px  margin-left: 5px;" onclick="javascript:location.reload(); "><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp;รีเซ็ท</button>

                <button disabled  type="button" class="btn btn-success  btnSendAdd_detail" id="btnSendAdd_detail" style="transition: 0.4s; margin-left: 5px;" ><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;บันทึก</button>

                <button disabled  type="button" class="btn btn-info btnSendedit_detail" id="btnSendedit_detail" style="transition: 0.4s; margin-left: 5px; display: none;" ><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;บันทึกการแก้ไข</button>


    </div>

  </div>                                       
</form>
</div>
</div>
                
                            </div>
                        </div>
                    </div>
                </div>


                  
                    

              </div>
</div>
                <!-- End PAge Content -->


<input type="hidden" name="per_button_edit" id="per_button_edit" value="<?php echo $button_update ?>">
<input type="hidden" name="per_button_del" id="per_button_del" value="<?php echo $button_delete ?>">
<input type="hidden" name="per_button_open" id="per_button_open" value="<?php echo $button_create ?>">
<input type="hidden" name="per_input_read" id="per_input_read" value="<?php echo $button_view ?>">
<?php include('../template/footer.php');?>

<script type="text/javascript" src="js/javascript.js"></script>
<script src="js/ion.rangeSlider-init.js"></script>
<script type="text/javascript" src="js/mask.js"></script>
<script src="https://f.vimeocdn.com/js/froogaloop2.min.js"></script>
<script src="https://player.vimeo.com/api/player.js"></script>



<!--  <script src="youtube/jquery.min.js"></script> -->
<script src="youtube/highlight.min.js"></script>
<script src="youtube/iframe_api.js"></script>
<script src="script_time_youtube.js"></script>




<script type="text/javascript">

  $(function() {
          $('.edit').froalaEditor({
            language: 'th',
            heightMin: 150,
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


  $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
    var radioswitch = function() {
        var bt = function() {
            $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioState")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
            })
        };
        return {
            init: function() {
                bt()
            }
        }
    }();
    $(document).ready(function() {
        radioswitch.init()
    });


</script>





<script>
  function if_iframe(){

 i=0;
   var link_video = $('#content_link_video').val();
   if (link_video != '') {

sea_work = link_video.search("https://player.vimeo.com/video/");
console.log('sea_work'+link_video.search("https://player.vimeo.com/video/"));
if (sea_work>=0) {
   if (sea_work=='0') {
   $('#div_iframe').html('<iframe id="player1" src="'+link_video+'?autoplay=1&muted=1&api=1&player_id=player1" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>');


    var iframe = $('#player1')[i];
    var player = $f(iframe);
    var status = $('.status');
    console.log(status)


    // When the player is ready, add listeners for pause, finish, and playProgress

    player.addEvent('ready', function() {
    player.addEvent('playProgress', onPlayProgress);

      
    });


    var id_subject = $("#id_subject").val();
console.log('กรุณารอสักครู่')
//รอ2วิ//

Swal.fire({
  title: 'loading...',
  text: 'กรุณารอสักครู่.',
  imageUrl: 'img/giphy.gif',
  imageWidth: 400,
  imageHeight: 200,
  imageAlt: 'Custom image',
  showCancelButton: false,
  showConfirmButton: false,
  timer: 2000,
}).then(result => {

  //รอ2วิ//
  if (id_subject == "") {
    Sendadd_content_func('1');
  } else {
    Sendedit_content_func('1');
  }

})

}else{
  swal.fire("คำเตือน", "รูปแบบ link video ไม่ถูกต้อง", "warning");
  return false
}
    
}else{
  sea_work_youtube = link_video.search("https://www.youtube.com/watch");
  if (sea_work_youtube=='0') {
     $('#div_iframe').html('');
     var id_subject = $("#id_subject").val();

    // if (id_subject == "") {
    //   Sendadd_content_func('2');
    // } else {
    //   Sendedit_content_func('2');
    // }


   //รอ2วิ//

Swal.fire({
  title: 'loading...',
  text: 'กรุณารอสักครู่.',
  imageUrl: 'img/giphy.gif',
  imageWidth: 400,
  imageHeight: 200,
  imageAlt: 'Custom image',
  showCancelButton: false,
  showConfirmButton: false,
  timer: 2000,
}).then(result => {

  //รอ2วิ//
    if (id_subject == "") {
      // delayID = setTimeout("Sendadd_content_func('2')",2000);
      Sendadd_content_func('2')
    } else {
      // delayID = setTimeout("Sendedit_content_func('2')",2000);
      Sendedit_content_func('2')
    }

  })
  }else{
    swal.fire("คำเตือน", "รูปแบบ link video ไม่ถูกต้อง", "warning");
  return false
  }





 

}
  }else{
    $('#div_iframe').html('');
     var id_subject = $("#id_subject").val();

    if (id_subject == "") {
      Sendadd_content_func('0');
    } else {
      Sendedit_content_func('0');
    }
  }
}


function Sendadd_content_func(type_link) {

 

if (type_link=='2') {
  //clearTimeout(delayID);
}


   var link_video = $("#content_link_video").val();


  var link_document = $("#content_link_document").val();
  if (link_video != "" || link_document != "") {
    const isValidcontent_link_video = content_link_video.checkValidity();
    const isValidtelacontent_link_document = content_link_document.checkValidity();

    if (
      (!isValidcontent_link_video && link_video != "") ||
      (!isValidtelacontent_link_document && link_document != "")
    ) {
      if (isValidcontent_link_video && link_video != "") {
        $("#content_link_video").attr("style", "");
      } else {
        $("#content_link_video").attr(
          "style",
          "border-color: red; border-width: 1px;"
        );
        return false;
      }
      if (isValidtelacontent_link_document && link_document != "") {
        $("#content_link_document").attr("style", "");
      } else {
        $("#content_link_document").attr(
          "style",
          "border-color: red; border-width: 1px;"
        );
        return false;
      }
    } else {
      $("#content_link_document").attr("style", "");
      $("#content_link_video").attr("style", "");
    }
  } else {
    $("#content_link_document").attr("style", "");
    $("#content_link_video").attr("style", "");
  }

  var formData = new FormData($("#form_add_content")[0]);
  var id_lesson = $("#id_lesson_content").val();

  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการบันทึกหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน"
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          method: "POST",
          url: "functions.php?id_lesson=" + id_lesson+'&type_link='+type_link,
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data.status == "0") {
              swal
                .fire({
                  title: "สำเร็จ",
                  text: "บันทึกเรียบร้อยแล้ว",
                  icon: "success"
                })
                .then(result => {
                  fetch_data_table_countent(id_lesson);
                  var tagButton = document.getElementsByClassName(
                    "dropify-clear"
                  )[1];
                  tagButton.click();
                  $("#head_english_content").removeClass("active");
                  $("#english_content").addClass("active");
                  $("#english_content").removeClass("active");
                  $("#thai_content").addClass("active");
                  $("#modal_add_content").modal("toggle");
                });
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }else{
       
        $('#div_iframe').html('');
        fetch_data_table_countent(id_lesson);
document.getElementById("form_add_content").reset();
                  var tagButton = document.getElementsByClassName(
                    "dropify-clear"
                  )[1];
                  tagButton.click();
                  $("#head_english_content").removeClass("active");
                  $("#english_content").addClass("active");
                  $("#english_content").removeClass("active");
                  $("#thai_content").addClass("active");
                  $("#modal_add_content").modal("toggle");
      }
    });
    
}
function Sendedit_content_func(type_link) {



  if (type_link=='2') {
  //clearTimeout(delayID);
}
  var link_video = $("#content_link_video").val();
  var link_document = $("#content_link_document").val();
  if (link_video != "" || link_document != "") {
    const isValidcontent_link_video = content_link_video.checkValidity();
    const isValidtelacontent_link_document = content_link_document.checkValidity();

    if (
      (!isValidcontent_link_video && link_video != "") ||
      (!isValidtelacontent_link_document && link_document != "")
    ) {
      if (isValidcontent_link_video && link_video != "") {
        $("#content_link_video").attr("style", "");
      } else {
        $("#content_link_video").attr(
          "style",
          "border-color: red; border-width: 1px;"
        );
        return false;
      }
      if (isValidtelacontent_link_document && link_document != "") {
        $("#content_link_document").attr("style", "");
      } else {
        $("#content_link_document").attr(
          "style",
          "border-color: red; border-width: 1px;"
        );
        return false;
      }
    } else {
      $("#content_link_document").attr("style", "");
      $("#content_link_video").attr("style", "");
    }
  } else {
    $("#content_link_document").attr("style", "");
    $("#content_link_video").attr("style", "");
  }

  var formData = new FormData($("#form_add_content")[0]);
  var id_lesson = $("#id_lesson_content").val();

  swal
    .fire({
      title: "ยืนยัน?",
      text: "ยืนยันการบันทึกหรือไม่?",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "ยกเลิก!",
      confirmButtonText: "ยืนยัน",
    })
    .then(result => {
      if (result.value) {
        $.ajax({
          method: "POST",
          url: "functions.php?id_lesson=" + id_lesson+'&type_link='+type_link,
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
            if (data.status == "0") {
              swal
                .fire({
                  title: "สำเร็จ",
                  text: "บันทึกเรียบร้อยแล้ว",
                  icon: "success"
                })
                .then(result => {
                  fetch_data_table_countent(id_lesson);
                  var tagButton = document.getElementsByClassName(
                    "dropify-clear"
                  )[1];
                  tagButton.click();
                  $("#head_english_content").removeClass("active");
                  $("#english_content").addClass("active");
                  $("#english_content").removeClass("active");
                  $("#thai_content").addClass("active");
                  $("#modal_add_content").modal("toggle");
                });
            } else {
              swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "warning");
            }
          }
        }).fail(function(data) {
          // คือไม่สำรเ็จ
          swal.fire("ไม่สำเร็จ", "เกิดปัญหากับระบบ", "error");
        });
      }
    });

}

</script>

<script type="text/javascript">
 //youtube  
  

//     var player,
//     time_update_interval = 0;

// function onYouTubeIframeAPIReady1(res) {

//     player = new YT.Player('div_iframe', {
//         width: 600,
//         height: 400,
//         videoId: res,
//         playerVars: {
//             color: 'white',
//             playlist: 'taJ60kskkns,FG0fTKAqZ5g'
//         },
//         events: {
//             onReady: initialize
//         }
//     });
   
// }


// function initialize(){

//     // Update the controls on load
//     updateTimerDisplay();
//     // updateProgressBar();

//     // Clear any old interval.
//     clearInterval(time_update_interval);

  

//     updateTimerDisplay();


//     $('#volume-input').val(Math.round(player.getVolume()));
// }

// function updateTimerDisplay(){
//     // Update current time text display.
//     $('#current-time').text(formatTime( player.getCurrentTime() ));
//     $('#duration').text(formatTime( player.getDuration() ));

//  duration_input = $('#duration_input').val();
//   if (duration_input == '') {
//     $('#duration_input').val(formatTime( player.getDuration() ));
//   }else{

//     var id_subject = $("#id_subject").val();

//   if (id_subject == "") {
//     Sendadd_content_func();
//   } else {
//     Sendedit_content_func();
//   }

//   }

    
// }

// function formatTime(time){
//     time = Math.round(time);
// curhr = Math.floor(time/3600);
// curmin=Math.floor(time/60)%60;
// cursec=time%60

//       if(curhr < 10){
//                 curhr = "0"+curhr;
//             }
//             if(curmin < 10 ){
//                 curmin = "0"+curmin;
//             }
//             if(cursec < 10 ){
//                 cursec = "0"+cursec;
//             }
           
//       return          curtime=+curhr+":"+curmin+":"+cursec;
// }   

// function change_link(){
//      var link_video = $('#content_link_video').val();
// var url = link_video.split("watch?v=");
//     player.cueVideoById(url[1]);
//     updateTimerDisplay();


// }   

</script>

<script type="text/javascript">
	
// CHECK_IDCARD
$( '#product_code' ).keyup(function() {
  var product_code = $('#product_code').val();
	
  var strCount = product_code;
  var numStr = strCount.length;

                        $.ajax({
                        type: "POST",
                        url: "functions.php",
                        data:{form:'CHECK_ID',
                              product_code:product_code
                              },
        
                        success: function(response) {
							//var content = response.message;
                           	//console.log(response.status);
                           	//console.log('numStr : ',numStr);
							//console.log(response.message);
							if(numStr < 5){
                            $("#product_code").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; border-color: #ffc107; border-width: 2px; background-color: #ffc10745;");
                            $("#idcode_alert").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; background-color: #ffc107; transition: 0.5s; display:inline-block;");
                            document.getElementById("a_idcode").innerHTML = "<i style='color:#333;' class='fa fa-exclamation-triangle'></i>  กำหนดไม่ต่ำกว่า 5 ตัวอักษร ";
                            $("#a_idcode").attr("style" , "color: #333;");
                            document.getElementById('btnSendAdd_detail').disabled = true;
							document.getElementById('btnSendedit_detail').disabled = true;	
                          }
                          	else if(response.status == 0 && product_code != ''){
                            $("#product_code").attr("style" , "border-color: #28a745; border-width: 2px; background-color: #28a74585;");
                            $("#idcode_alert").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 5px; background-color: #1c8c36; transition: 0.5s; display:inline-block;");
                            document.getElementById("a_idcode").innerHTML = "<i style='color:#fafafa;' class='fa fa-check-circle'></i> สามารถใช้รหัสสินค้านี้ได้";
                            document.getElementById('btnSendAdd_detail').disabled = false;
							document.getElementById('btnSendedit_detail').disabled = false; 	
                            $("#a_idcode").attr("style" , "color: #fafafa;"); 
							  
							setTimeout(function() {
                              $("#product_code").attr("style" ,"");
                              $("#idcode_alert").attr("style" , "transition: 0.5s; display:none;");
                              }, 10000);  

                          }
							else if(response.status == 1 && product_code != '' ){
                            $("#product_code").attr("style" , "border-color: #dd4b39; border-width: 2px; background-color: #ff000038;");
                            $("#idcode_alert").attr("style" , "height: 35px !important; font-size: 14px; border-radius: 10px; background-color: #dd4b39; transition: 0.5s; display:inline-block;");
                            document.getElementById("a_idcode").innerHTML = "<i style='color:#fafafa;' class='fa fa-times-circle'></i>  รหัสสินค้านี้ถูกใช้งานไปแล้ว";
							document.getElementById('btnSendAdd_detail').disabled = true;
							document.getElementById('btnSendedit_detail').disabled = true;	

							setTimeout(function() {
                              $("#idcard").attr("style" ,"height: 35px !important; font-size: 14px; border-radius: 10px;");
                              $("#idcode_alert").attr("style" , "transition: 0.5s; display:none;");
                              }, 10000);  

                          }else{
                         
                        }
                  }

         });

});
	
function chk_pic(){
  var file=document.form_add_detail.name_img.value;
  var patt=/(.jpg|.png|.jpeg)/;
  var result=patt.test(file);
        if(!result){
          swal.fire("คำเตือน", 'ประเภทไฟล์ไม่ถูกต้อง ("jpeg", "jpg", "png" only)', "error");
          var tagButton = document.getElementsByClassName("dropify-clear")[0];
          tagButton.click();
        }
  return result;
}	
	
	 $(".select2").select2({
      width : '100%'
    });
	
</script>


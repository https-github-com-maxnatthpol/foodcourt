<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';


if (isset($_POST['form'])) {
	if ($_POST['form']=="select_table_front_manage") {
		select_table_front_manage();
	}else if ($_POST['form']=="select_div_edit_front_manage") {
		select_div_edit_front_manage();
	}
}else{
	
}

function select_div_edit_front_manage(){
	$db = new DB();



	$strSQL = "SELECT  slide.name_slide,slide.name_slide_en,slide.text,slide.text_en, slide_image.name_image,slide_image.id_image
FROM `slide` 
LEFT JOIN slide_image ON slide_image.id_slide=slide.id_slide
WHERE slide.id_slide = '".$_POST["id"]."' ";
	$objQuery = $db->Query($strSQL);
	$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

if ($objResult["name_image"] == '') {
    $image = "";
	$image_ed = "";
  }else{
    $image = "data-default-file='".$objResult["name_image"]."'";
	$image_ed = '1';
  }
	
?>

<div class="card card-body" >
          <div class="box-header with-border">
            <h3 class="box-title">แก้ไขหมวดบทความ</h3>

          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="form_edit" id="form_edit" method="post">
              <input type="hidden" name="form" value="form_edit">
              <input type="hidden" name="id_edit" value="<?php echo $_POST["id"] ?>">
              <div id="div_form_edit">
                  <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> 
                                  <a class="nav-link active" data-toggle="tab" href="#thai_edit" role="tab">
                                    <img class="flag-lang" src="img/th-fl.png" width="22" height="15" > ภาษาไทย
                                  </a> 
                                </li>
                                <li class="nav-item"> 
                                  <a class="nav-link" data-toggle="tab" href="#english_edit" role="tab">
                                    <img class="flag-lang" src="img/en-fl.jpg" width="22" height="15" > ภาษาอังกฤษ
                                  </a> 
                                </li>
                                
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                               
                                <div class="tab-pane active" id="thai_edit" role="tabpanel">
                                    <div class="card-body">

                                      <div class="form-group">
                                        <label for="example-email">ชื่อหัวข้อ </label>
                                        <input onkeyup ="disabled_btn_edit()" type="text" class="form-control" id="name_th_edit" name="name_th_edit" placeholder="ภาษาไทย" value="<?php echo $objResult['name_slide'] ?>" >
                                      </div>
                                      <div class="form-group" id="editor" style="margin-top: 10px;">
                                        <label for="example-email">รายละเอียด (ภาษาไทย)</label>
                                        <textarea id='edit' class='edit' name="text" style="margin-top: 20px;"><?php echo $objResult['text'] ?></textarea>
                                      </div>

                                    </div>
                                </div>
                                <div class="tab-pane" id="english_edit" role="tabpanel">
                                    <div class="card-body">
                                        
                                      <div class="form-group">
                                        <label for="example-email">ชื่อหัวข้อ </label>
                                        <input type="text" class="form-control" id="name_en_edit" name="name_en_edit" placeholder="ภาษาอังกฤษ" value="<?php echo $objResult['name_slide_en'] ?>">
                                      </div>

                                      <div class="form-group" id="editor" style="margin-top: 10px;">
                                        <label for="example-email">รายละเอียด (ภาษาอังกฤษ)</label>
                                        <textarea id='edit' class='edit' name="text_en" style="margin-top: 20px;"><?php echo $objResult['text_en'] ?></textarea>
                                      </div>

                                      

                                    </div>
                                </div>
                               
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                          <div class="card">
                            <div class="card-body ">
                              <label for="input-file-now">รูปภาพ</label>
                              <input onchange="chk_pic_edit()" accept="image/*" type="file" id="name_img_edit" class="dropify" name="name_img" <?php echo $image ?> />
                              <input type="hidden" name="name_img_ed" value="<?php echo $image_ed ?>">
                              <input type="hidden" name="id_image" value="<?php echo $objResult["id_image"] ?>">
                            </div>
                          </div>
                        </div>

                    </div>

              </div> 
              <div class="boxsave" id="box-del-list" align="center">
				  
				<button type= "button" class = "btn btn-danger" data-dismiss = "modal">ปิด</button>  

                <button type="button" class="btn btn-success  btnSendAdd" id="btnSendEdit" style="transition: 0.4s; margin-left: 5px;" ><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;บันทึก</button>

              </div>  
            </form>
          </div>
        </div>
      </div>
<script type="text/javascript">
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
</script>
<?php
}

function select_table_front_manage(){
$db = new DB();
$button_update  = $_POST["button_update"];
$button_delete  = $_POST["button_delete"];
$button_create  = $_POST["button_create"];
$button_view    = $_POST["button_view"];

//	$strSQL = "SELECT  `id_slide`,`name_slide`,`level`,DATE_FORMAT(`date`, '%d/%m/%Y') AS update_datetime FROM `slide` ";
	$strSQL = "SELECT slide.id_slide,slide.name_slide,slide.name_slide_en, slide_image.name_image,slide_image.id_image ,`level` ,DATE_FORMAT(slide.date, '%d/%m/%Y') AS update_datetime
	FROM `slide` 
	LEFT JOIN slide_image ON slide_image.id_slide=slide.id_slide";
	$objQuery = $db->Query($strSQL);
	
?>
	<table class="table" id="table_front_manage" width="100%">
		<thead>
			<th >
				<input class="ClickCheckAll filled-in chk-col-light-blue" type="checkbox" name="CheckAll" id="CheckAll" value="Y" onClick="ClickCheckAll(this);"><label for="CheckAll"></label>
			</th>
			<th >รูปภาพ</th>
			<th >ลำดับ</th>
			<th >หัวข้อ</th>
      		<th >วันที่แก้ไขล่าสุด</th>
			<th >จัดการ</th>
		</thead>
		<tbody>
<?php
	$num=0;
	while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
	$num++;	
?>
			<tr class="show-tr">
				<td>
					<input type="checkbox" name="Chk[]" id="Chk<?php echo $num ?>" value="<?php echo $objResult['id_slide'] ?>" class="checkbox_remove filled-in chk-col-light-blue" /><label for="Chk<?php echo $num ?>"></label>
				</td>
				<td>
					<img src="<?php echo $objResult['name_image'] ?>" width="80">
				</td>
				<td>
					<input onchange="order_chanhe(<?php echo $num ?>)" class="form-control" type="number" name="order" id="order<?php echo $num ?>" value="<?php echo  $objResult['level'] ?>">
					<input  class="form-control" type="hidden" name="id" id="id<?php echo $num ?>" value="<?php echo  $objResult['id_slide'] ?>">
					<font style="display: none;"><?php echo  $objResult['level'] ?></font>
				</td>
				<td>
					<?php echo $objResult["name_slide"] ?>
				</td>
        <td>
          <?php echo $objResult["update_datetime"] ?>
        </td>
				<td>
					<a data-toggle="modal" data-target="#modal_edit" style="<?php echo $button_update ?>"  class="btn btn-warning  btn-sm edit_btn" data-id="<?php echo $objResult['id_slide'] ?>" ><i class="fa fa-edit" style="color: white;"></i></a>

					
          <button type="button" class="btn btn-danger  btn-sm delete_btn" style="<?php echo $button_delete ?>" data-id="<?php echo $objResult['id_slide'] ?>"><i class="mdi mdi-delete-empty" style="color: white;"></i></button>
				</td>
			</tr>
<?php

}
?>			
		</tbody>
	</table>
	<input type="hidden" name="hdnCount" value="<?php echo $num ?>">
<?php		
	}

?>
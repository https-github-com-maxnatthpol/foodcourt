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

	$strSQL = "SELECT freedom_page.`name_th`,freedom_page.`name_en`,freedom_page.`text_th`,freedom_page.`text_en`,freedom_page.`id_link`, link_page.link   
  FROM `freedom_page` 
  LEFT JOIN link_page ON link_page.id_link=freedom_page.id_link
  WHERE freedom_page.`id_page` = '".$_POST["id"]."' ";
	$objQuery = $db->Query($strSQL);
	$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

	
?>

<div class="card card-body" >
          <div class="box-header with-border">
            <h3 class="box-title">แก้ไขหน้าเสริม</h3>
            


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
                                        <label for="example-email">ชื่อหน้าเสริม </label>
                                        <input onkeyup ="disabled_btn_edit()" type="text" class="form-control" id="name_th_edit" name="name_th_edit" placeholder="ภาษาไทย" value="<?php echo $objResult['name_th'] ?>" >
                                      </div>

                                      <div class="form-group" id="editor_edit" style="margin-top: 10px;">
                                        <label for="example-email">เนื้อหา (ภาษาไทย)</label>
                                        <textarea id='edit' class='edit' name="detail_th" style="margin-top: 20px;"><?php echo $objResult['text_th'] ?></textarea>
                                      </div>


                                    </div>
                                </div>
                                <div class="tab-pane" id="english_edit" role="tabpanel">
                                    <div class="card-body">
                                        
                                      <div class="form-group">
                                        <label for="example-email">ชื่อหน้าเสริม </label>
                                        <input type="text" class="form-control" id="name_en_edit" name="name_en_edit" placeholder="ภาษาอังกฤษ" value="<?php echo $objResult['name_en'] ?>">
                                      </div>

                                      <div class="form-group" id="editor_edit" style="margin-top: 10px;">
                                        <label for="example-email">เนื้อหา (ภาษาอังกฤษ)</label>
                                        <textarea id='edit' class='edit' name="detail_en" style="margin-top: 20px;"><?php echo $objResult['text_en'] ?></textarea>
                                      </div>

                                    </div>
                                </div>
                               
                            </div>
                        </div>
				  		<?php 
	 						$adminFlg = isset($_SESSION['admin'])?$_SESSION['admin']:0;
							if ($adminFlg == '1') /* != แบบเดิม */ {
                        ?>
                        <div class="form-group">
                            <label for="example-email">Link </label>
                            <input type="text" class="form-control" id="link_edit" name="link_edit" value="<?php echo $objResult['link'] ?>">
                            <input type="hidden" class="form-control" id="id_link_edit" name="id_link_edit" value="<?php echo $objResult['id_link'] ?>">
                        </div>
				  		<?php  
                             }
								else if($adminFlg == '0')
							 {
					  	?>
				  		<div class="form-group">
                            <input type="hidden" class="form-control" id="link_edit" name="link_edit" value="<?php echo $objResult['link'] ?>">
                            <input type="hidden" class="form-control" id="id_link_edit" name="id_link_edit" value="<?php echo $objResult['id_link'] ?>">
                        </div>
				  		<?php
							}
                        ?>
                    </div>

              </div> 
              <div class="boxsave" id="box-del-list" align="center">
				
				<button type = "button" class = "btn btn-danger" data-dismiss = "modal">ปิด</button>
				  
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
</script>
<?php
}


function select_table_front_manage(){
	
$db = new DB();
$button_update  = $_POST["button_update"];
$button_delete  = $_POST["button_delete"];
$button_create  = $_POST["button_create"];
$button_view    = $_POST["button_view"];

	$strSQL = "SELECT `id_page`,`name_th`,DATE_FORMAT(`update_datetime`,'%d/%m/%Y') AS update_datetime FROM `freedom_page` WHERE `delete_datetime` IS null";
	$objQuery = $db->Query($strSQL);
	
?>
	<table class="table" id="table_front_manage" width="100%">
		<thead>
			<th >
				<input class="ClickCheckAll filled-in chk-col-light-blue" type="checkbox" name="CheckAll" id="CheckAll" value="Y" onClick="ClickCheckAll(this);"><label for="CheckAll"></label>
			</th>
			<th >ลำดับ</th>
			<th >ชื่อหน้าเสริม</th>
      		<th>วันที่แก้ไขล่าสุด</th>
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
					<input type="checkbox" name="Chk[]" id="Chk<?php echo $num ?>" value="<?php echo $objResult['id_page'] ?>" class="checkbox_remove filled-in chk-col-light-blue" /><label for="Chk<?php echo $num ?>"></label>


				</td>
				<td>
					<?php echo $num ?>
				</td>
				<td>
					<?php echo $objResult["name_th"] ?>
				</td>
        <td>
          <?php echo $objResult["update_datetime"] ?>
        </td>
				<td>
					<a data-toggle="modal" data-target="#modal_edit" style="<?php echo $button_update ?>"  class="btn btn-warning  btn-sm edit_btn" data-id="<?php echo $objResult['id_page'] ?>" ><i class="fa fa-edit" style="color: white;"></i></a>

					
		<?php 
		$adminFlg = isset($_SESSION['admin'])?$_SESSION['admin']:0; 
		if ($adminFlg == '1')  {  ?>
          <button type="button" class="btn btn-danger  btn-sm delete_btn" style="<?php echo $button_delete ?>" data-id="<?php echo $objResult['id_page'] ?>"><i class="mdi mdi-delete-empty" style="color: white;"></i></button>
		<?php } ?>			
					
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
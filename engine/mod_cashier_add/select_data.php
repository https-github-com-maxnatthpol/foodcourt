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
	}else if ($_POST['form']=="select_div_address") {
    select_div_address();
  }
}else{
	
}


function select_div_address(){
  $db = new DB();

  $strSQL = "SELECT `id_address`,`address`,`district`,`amphur`,`province`,`postcode` FROM `user_address` WHERE `id_user`= '".$_POST["id"]."' AND `status` = '2'  ";
  $objQuery = $db->Query($strSQL);
  $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

?>

<div class="card card-body" >
          <div class="box-header with-border">
            <h3 class="box-title">ที่อยู่สำหรับออกใบเสร็จ ( <?php echo $_POST["name"] ?> )</h3>

          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="form_address" id="form_address" method="post">
              <input type="hidden" name="form" value="form_address">
              <input type="hidden" name="id_edit" value="<?php echo $_POST["id"] ?>">
              <input type="hidden" name="id_address" value="<?php echo $objResult["id_address"] ?>">
              <div id="div_form_edit">
                  
                <div class="row"> 
                  <div class="col-md-12" >

                    <div class="form-group">
                      <label for="example-email">ที่อยู่ </label>
                      <input type="text" class="form-control  iconified" name="address" id="address" placeholder="ที่อยู่" value="<?php echo $objResult["address"] ?>">
                    </div>

                  </div>

                  <div class="col-md-6" >

                    <div class="form-group">
                      <label for="example-email">ตำบล </label>
                      <input type="text" class="form-control  iconified" name="district" id="district" placeholder="ตำบล" value="<?php echo $objResult["district"] ?>">
                    </div>

                    <div class="form-group">
                      <label for="example-email">จังหวัด </label>
                      <input type="text" class="form-control  iconified" name="province" id="province" placeholder="จังหวัด" value="<?php echo $objResult["province"] ?>">
                    </div>

                  </div>

                  <div class="col-md-6" >

                    <div class="form-group">
                      <label for="example-email">อำเภอ </label>
                      <input type="text" class="form-control  iconified" name="amphures" id="amphures" placeholder="อำเภอ" value="<?php echo $objResult["amphur"] ?>">
                    </div>

                    <div class="form-group">
                      <label for="example-email">รหัสไปรษณีย์ </label>
                      <input type="text" class="form-control  iconified" name="zip_code" id="zip_code" placeholder="รหัสไปรษณีย์" value="<?php echo $objResult["postcode"] ?>">
                    </div>

                  </div>
                 

                  </div>

                </div>
                  

              </div> 
              <div class="boxsave" id="box-del-list" align="center">
				  
				<button type = "button" class = "btn btn-danger" data-dismiss = "modal">ปิด</button>  

                <button   type="button" class="btn btn-success  btnSendaddress" id="btnSendaddress" style="transition: 0.4s; margin-left: 5px;" ><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;บันทึก</button>

              </div>  
            </form>
          </div>
        </div>
      </div>
<script type="text/javascript">
  $(function () {
        $.Thailand({
            $district: $('#district'), // input ของตำบล
            $amphoe: $('#amphures'), // input ของอำเภอ
            $province: $('#province'), // input ของจังหวัด
            $zipcode: $('#zip_code'), // input ของรหัสไปรษณีย์
        });
    });
</script>
 <?php
    }


function select_div_edit_front_manage(){
	$db = new DB();

	$strSQL = "SELECT user_images.name AS name_img, user_images.directory, mod_cashier.forename, mod_cashier.surename, mod_cashier.id_card, mod_cashier.email,mod_cashier.telephone
	FROM `mod_cashier` 
	LEFT JOIN user_images ON user_images.id_user=mod_cashier.id_cashier AND user_images.type = '2'
	WHERE `id_cashier` = '".$_POST["id"]."' ";
	$objQuery = $db->Query($strSQL);
	$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

	

  if ($objResult["name_img"] == '') {
    $image = "";
  }else{
    $image = "data-default-file='".$objResult["directory"].$objResult["name_img"]."'";
  }
  
?>

<div class="card card-body" >
          <div class="box-header with-border">
            <h3 class="box-title">แก้ไขข้อมูลแคสเชียร์</h3>

          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="form_edit" id="form_edit" method="post">
              <input type="hidden" name="form" value="form_edit">
              <input type="hidden" name="id_edit" value="<?php echo $_POST["id"] ?>">
              <div id="div_form_edit">
                  <div class="form-group col-md-12">
                      <div class="card">
                        <div class="card-body ">
                          <label for="input-file-now">รูปภาพ </label>
                          <input accept="image/png,image/jpeg,image/pjpeg,image/x-png,image/png" onchange="chk_pic_edit()"  type="file" id="name_img_edit" class="dropify" name="name_img" <?php echo $image ?> />
                          <input type="hidden" name="directory_ed" value="<?php echo $objResult["directory"].$objResult["name_img"] ?>">
                          <input type="hidden" name="name_img_ed" value="<?php echo $objResult["name_img"] ?>">
                        </div>
                      </div>
                    </div>
                <div class="row"> 

                  <div class="col-md-6" >

                    <div class="form-group">
                      <label for="example-email">ชื่อ </label>
                      <input  type="text" class="form-control" id="name_edit" name="name"  value="<?php echo $objResult["forename"] ?>">
                    </div>

                  </div>

                  <div class="col-md-6" >

                    <div class="form-group">
                      <label for="example-email">นามสกุล </label>
                      <input  type="text" class="form-control" id="surname_edit" name="surname" value="<?php echo $objResult["surename"] ?>" >
                    </div>

                  </div>
                  <div class="col-md-12" >
<?php 
function txtFormat($text, $pattern, $ex) {
    $cid = $text  ;
    $pattern = $pattern;
    $p = explode('-',$pattern);
    $ex = $ex ;
    $first = 0;
    $rest = '';
    for($i=0;$i<count($p);$i++) {

        $rest .= substr($cid,0, strlen($p[$i])).$ex;
          
    }
    return $rest1 = substr($rest, 0, -1);
}

?>

                    <div class="form-group">
                      <label for="example-email">เลขที่บัตรประชาชน / เลขประจำตัวผู้เสียภาษี </label>
                      <input   type="text" class="form-control" id="id_cade_edit" name="id_cade"  pattern="[0-9]{1}-[0-9]{4}-[0-9]{3}-[0-9]{1}-[0-9]{1}-[0-9]{3}"    placeholder="9-9999-999-9-9-999" value="<?php echo txtFormat($objResult["id_card"],'_-____-___-_-_-___','-'); ?>" data-mask="9-9999-999-9-9-999" required>
                    </div>

                    <div class="form-group">
                      <label for="example-email">E-mail </label>
                      <input onchange="check_email('<?php echo $_POST["id"] ?>')"  type="email" class="form-control" id="e_mail_edit" name="e_mail" placeholder="example@example.com" value="<?php echo $objResult["email"] ?>"  required>
                      <label for="example-email" id="warning_email_edit" style="color: red; display: none;">คำเตือน : E-mail นี้มีผู้ใช้งานแล้ว</label>
                    </div>

                    <div class="form-group">
                      <label for="example-email">เบอร์โทร </label>
                      <input  type="tel" class="form-control" id="telaphone_edit" name="telaphone" pattern="[0-9]{3}-[0-9]{4}-[0-9]{3}" data-mask="999-9999-999"   placeholder="999-9999-999" value="<?php echo $objResult["telephone"] ?>"  required>
                    </div>

                  </div>

                </div>
                    </div>

              </div> 
              <div class="boxsave" id="box-del-list" align="center">
				  
				<button type = "button" class = "btn btn-danger" data-dismiss = "modal">ปิด</button>  

                <button   type="button" class="btn btn-success  btnSendAdd" id="btnSendEdit" style="transition: 0.4s; margin-left: 5px;" ><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;บันทึก</button>

              </div>  
            </form>
          </div>
        </div>
      </div>
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
</script>
<?php
}


function select_table_front_manage(){

$db = new DB();

$button_update  = $_POST["button_update"];
$button_delete  = $_POST["button_delete"];
$button_create  = $_POST["button_create"];
$button_view    = $_POST["button_view"];

	$strSQL = "SELECT `id_cashier`,`forename`,`surename`,`email`,`status` FROM `mod_cashier` WHERE `delete_datetime` IS null ORDER BY `create_datetime` DESC ";
	$objQuery = $db->Query($strSQL);
	
?>
	<table class="table" id="table_front_manage" width="100%">
		<thead>
			<th >
				<!-- <input class="ClickCheckAll filled-in chk-col-light-blue" type="checkbox" name="CheckAll" id="CheckAll" value="Y" onClick="ClickCheckAll(this);"><label for="CheckAll"></label> -->#
			</th>
			<th>ลำดับ</th>
			<th>ชื่อ - นามสกุล</th>
      		<th>E-mail</th>
			<th>จัดการ</th>
		</thead>
		<tbody>
<?php
	$num=0;
	while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
	$num++;	
?>
			<tr class="show-tr">
				<td>
					<input type="checkbox" name="Chk[]" id="Chk<?php echo $num ?>" value="<?php echo $objResult['id_cashier'] ?>" class="checkbox_remove filled-in chk-col-light-blue" />
					<label for="Chk<?php echo $num ?>"></label>
				</td>
				<td>
					<?php echo $num ?>
				</td>
				<td>
					<?php echo $objResult["forename"].' '.$objResult["surename"] ?>
				</td>
				<td>
				  	<?php echo $objResult["email"] ?>
				</td>
				<td>
					<a data-toggle="modal" data-target="#modal_edit" style="<?php echo $button_update ?>"  class="btn btn-warning  btn-sm edit_btn" data-id="<?php echo $objResult['id_cashier'] ?>" ><i class="fa fa-edit" style="color: white;"></i></a>

					<button type="button" class="btn btn-danger  btn-sm delete_btn" style="<?php echo $button_delete ?>" data-id="<?php echo $objResult['id_cashier'] ?>"><i class="mdi mdi-delete-empty" style="color: white;"></i></button>

          <a data-toggle="modal" data-target="#modal_address" style="<?php echo $button_update ?>"  class="btn btn-outline-secondary  btn-sm address_btn" data-id="<?php echo $objResult['id_cashier'] ?>"  data1-id="<?php echo $objResult["forename"].' '.$objResult["surename"] ?>" >ที่อยู่</a>

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
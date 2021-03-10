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
    }else if ($_POST['form']=="select_div_print") {
    select_div_print();
    }
}else{
	
}


function select_div_address(){
  $db = new DB();

  $strSQL = "SELECT `id_address`,`address`,`district`,`amphur`,`province`,`postcode` FROM `user_address` WHERE `id_user`= '".$_POST["id"]."' AND `status` = '1'  ";
  $objQuery = $db->Query($strSQL);
  $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
  
?>

<div class="card card-body" >
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fas fa-address-card"></i> ที่อยู่สำหรับออกใบเสร็จ ( <?php echo $_POST["name"] ?> )</h3>
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
                      <label for="example-email" class="text-themecolor">ที่อยู่ </label>
                      <input type="text" class="form-control  iconified" name="address" id="address" placeholder="ที่อยู่ของคุณ" value="<?php echo $objResult["address"] ?>">
                    </div>

                  </div>

                  <div class="col-md-6" >

                    <div class="form-group">
                      <label for="example-email" class="text-themecolor">ตำบล </label>
                      <input type="text" class="form-control  iconified" name="district" id="district" placeholder="ตำบลของคุณ" value="<?php echo $objResult["district"] ?>">
                    </div>

                    <div class="form-group">
                      <label for="example-email" class="text-themecolor">จังหวัด </label>
                      <input type="text" class="form-control  iconified" name="province" id="province" placeholder="จังหวัดของคุณ" value="<?php echo $objResult["province"] ?>">
                    </div>

                  </div>

                  <div class="col-md-6" >

                    <div class="form-group">
                      <label for="example-email" class="text-themecolor">อำเภอ </label>
                      <input type="text" class="form-control  iconified" name="amphures" id="amphures" placeholder="อำเภอของคุณ" value="<?php echo $objResult["amphur"] ?>">
                    </div>

                    <div class="form-group">
                      <label for="example-email" class="text-themecolor">รหัสไปรษณีย์ </label>
                      <input type="text" class="form-control  iconified" name="zip_code" id="zip_code" placeholder="รหัสไปรษณีย์ของคุณ" value="<?php echo $objResult["postcode"] ?>">
                    </div>

                  </div>
                 

                  </div>

                </div>
                  

              </div> 
              <div class="boxsave" id="box-del-list" align="center">
                  
                <button type = "button" class = "btn btn-danger" data-dismiss = "modal"><i class="fas fa-window-close"></i> ปิด</button>   

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

function select_div_print(){
    
  $db = new DB();

  $strSQL = "SELECT `id_customer`,`ip_customer`,`print_customer` FROM `mod_customer` WHERE `id_customer`= '".$_POST["id"]."' ";
  $objQuery = $db->Query($strSQL);
  $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
  
?>

<div class="card card-body" >
          <div class="box-header with-border">
            <h3 class="box-title"><i class="mdi mdi-printer-settings"></i> ตั้งค่าการปริ้น ( <?php echo $_POST["name"] ?> )</h3>
          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="form_print" id="form_print" method="post">
              <input type="hidden" name="form" value="form_print">
              <input type="hidden" name="id_edit" value="<?php echo $_POST["id"] ?>">
              <input type="hidden" name="id_print" value="<?php echo $objResult["id_customer"] ?>">
              <div id="div_form_edit">
                  
                <div class="row"> 
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-ip" class="text-themecolor"><i class="mdi mdi-server"></i> เลข IP เครื่องของร้านค้า </label>
                          <input type="text" class="form-control iconified" name="ip_customer" id="ip_customer" placeholder="192.168.xx.xxx" value="<?php echo $objResult["ip_customer"] ?>">
                        </div>
                      </div>
                    
                      <div class="col-md-6" >    
                        <div class="form-group">
                          <label for="example-name-print" class="text-themecolor"><i class="mdi mdi-server-network"></i> ชื่อเครื่องปริ้นของร้านค้า </label>
                          <input type="text" class="form-control iconified" name="print_customer" id="print_customer" placeholder="ชื่อเครื่องปริ้นของคุณ" value="<?php echo $objResult["print_customer"] ?>">
                        </div>
                      </div>
                </div>

              </div>
                  

              </div> 
              <div class="boxsave" id="box-del-list" align="center">
                  
                <button type = "button" class = "btn btn-danger" data-dismiss = "modal"><i class="fas fa-window-close"></i> ปิด</button>   

                <button   type="button" class="btn btn-success  btnSendprint" id="btnSendprint" style="transition: 0.4s; margin-left: 5px;" ><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;บันทึก</button>

              </div>  
            </form>
          </div>
        </div>
      </div>
 <?php
    }


function select_div_edit_front_manage(){
	$db = new DB();

	$strSQL = "SELECT  user_images.name AS name_img, user_images.directory, mod_customer.forename, mod_customer.id_card, mod_customer.id_catagory, mod_customer.email,mod_customer.telephone
    FROM `mod_customer` 
    LEFT JOIN user_images ON user_images.id_user=mod_customer.id_customer AND user_images.type = '1'
    WHERE `id_customer` = '".$_POST["id"]."' ";
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
            <h3 class="box-title"><i class="fas fa-edit"></i> แก้ไขร้านค้า</h3>
          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="form_edit" id="form_edit" method="post">
              <input type="hidden" name="form" value="form_edit">
              <input type="hidden" name="id_edit" value="<?php echo $_POST["id"] ?>">
              <div id="div_form_edit">
                  <div class="form-group col-md-12">
                      <div class="card">
                        <div class="card-body ">
                          <label for="input-file-now" class="text-themecolor"><i class="mdi mdi-file-image"></i> รูปภาพ</label>
                          <input accept="image/png,image/jpeg,image/pjpeg,image/x-png,image/png" onchange="chk_pic_edit()"  type="file" id="name_img_edit" class="dropify" name="name_img" <?php echo $image ?> />
                          <input type="hidden" name="directory_ed" value="<?php echo $objResult["directory"].$objResult["name_img"] ?>">
                          <input type="hidden" name="name_img_ed" value="<?php echo $objResult["name_img"] ?>">
                        </div>
                      </div>
                    </div>
                <div class="row"> 

                  <div class="col-md-12">

                    <div class="form-group">
                      <label for="example-name" class="text-themecolor"><i class="mdi mdi-rename-box"></i> ชื่อร้านค้า </label>
                      <input  type="text" class="form-control" id="name_edit" name="name"  value="<?php echo $objResult["forename"] ?>">
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
                      <label for="example-idcard" class="text-themecolor"><i class="mdi mdi-account-card-details"></i> เลขที่บัตรประชาชน</label>
                      <input   type="text" class="form-control" id="id_cade_edit" name="id_cade"  pattern="[0-9]{1}-[0-9]{4}-[0-9]{3}-[0-9]{1}-[0-9]{1}-[0-9]{3}"  placeholder="9-9999-999-9-9-999" value="<?php echo txtFormat($objResult["id_card"],'_-____-___-_-_-___','-'); ?>" data-mask="9-9999-999-9-9-999" required>
                    </div>

                    <div class="form-group">
                      <label for="example-email" class="text-themecolor"><i class="mdi mdi-contact-mail"></i> E-mail </label>
                      <input onchange="check_email('<?php echo $_POST["id"] ?>')"  type="email" class="form-control" id="e_mail_edit" name="e_mail" placeholder="example@example.com" value="<?php echo $objResult["email"] ?>"  required>
                      <label for="example-email" id="warning_email_edit" style="color: red; display: none;">คำเตือน : E-mail นี้มีผู้ใช้งานแล้ว</label>
                    </div>

                    <div class="form-group">
                      <label for="example-phone" class="text-themecolor"><i class="fas fa-phone-square"></i> เบอร์โทรศัพท์ </label>
                      <input  type="tel" class="form-control" id="telaphone_edit" name="telaphone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" data-mask="999-999-9999"   placeholder="999-999-9999" value="<?php echo $objResult["telephone"] ?>"  required>
                    </div>
                      
                    <div class="form-group">
                                        <label for="example-email" class="text-themecolor"><i class="fas fa-list-alt"></i> หมวดหมู่ </label>
                                        <select class="form-control select2" name="id_category_edit" id="id_category_edit">
                                          <option value="0">-- เลือกหมวดหมู่ --</option>
<?php
  $strSQL_cate = "SELECT `id_catagory`,`name_catagory_th`,`name_catagory_en`,`order`,`group_sub`,`level` FROM `product_catagory` WHERE `delete_datetime` IS null ORDER BY 'group_sub','order' ASC";
  $objQuery_cate = $db->Query($strSQL_cate);
  while ($objResult_cate = mysqli_fetch_array($objQuery_cate, MYSQLI_ASSOC)) { 

      ?>                                    
                                          <option value="<?php echo $objResult_cate["id_catagory"] ?>" <?php if($objResult["id_catagory"] == $objResult_cate["id_catagory"]){ echo "selected"; } ?> >
											 <?php
												if($objResult_cate["level"] == '1'){
													echo $objResult_cate["name_catagory_th"];
												}
												else if ($objResult_cate["level"] == '2'){
													echo '&nbsp;- '.$objResult_cate["name_catagory_th"];
												}
												else if ($objResult_cate["level"] == '3'){
													echo '&nbsp;&nbsp;--> '.$objResult_cate["name_catagory_th"];
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

              </div> 
              <div class="boxsave" id="box-del-list" align="center">
                  
                <button type = "button" class = "btn btn-danger" data-dismiss = "modal"><i class="fas fa-window-close"></i> ปิด</button>  

                <button   type="button" class="btn btn-success  btnSendAdd" id="btnSendEdit" style="transition: 0.4s; margin-left: 5px;" ><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;บันทึก</button>


              </div>  
            </form>
          </div>
        </div>
      </div>
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
</script>
<?php
}

function select_table_front_manage(){
	$db = new DB();

$button_update  = $_POST["button_update"];
$button_delete  = $_POST["button_delete"];
$button_create  = $_POST["button_create"];
$button_view    = $_POST["button_view"];

	$strSQL = "SELECT `id_customer`,`forename`,`email`,`telephone`,`id_catagory`,`create_datetime`,`status` FROM `mod_customer` WHERE `delete_datetime` IS null ";
    
          if (isset($_POST["id_category_s"]) && $_POST["id_category_s"] != '0') {
          $id_category = $db->clear($_POST["id_category_s"]);
          $strSQL .= " AND id_catagory='".$id_category."' ";
      }
      if (isset($_POST["search_key"]) && $_POST["search_key"] != '') {
          $search_key = $db->clear($_POST["search_key"]);
          $strSQL .= " AND forename LIKE '%".$search_key."%' ";
      }
    $strSQL .=" ORDER BY `create_datetime` DESC";
    
	$objQuery = $db->Query($strSQL);
	
?>
	<table class="table" id="table_front_manage" style="width: 100%;">
		<thead>
			<th>
				<!-- <input class="ClickCheckAll filled-in chk-col-light-blue" type="checkbox" name="CheckAll" id="CheckAll" value="Y" onClick="ClickCheckAll(this);"><label for="CheckAll"></label> -->#
			</th>
			<th>ลำดับ</th>
            <th>รูปร้านค้า</th>
			<th>ชื่อร้านค้า</th>
            <th>E - Mail</th>
            <th>เบอร์โทรศัพท์</th>
            <th>วันที่สร้าง</th>
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
					<input type="checkbox" name="Chk[]" id="Chk<?php echo $num ?>" value="<?php echo $objResult['id_customer'] ?>" class="checkbox_remove filled-in chk-col-light-blue" /><label for="Chk<?php echo $num ?>"></label>

				</td>
				<td>
					<?php echo $num ?>
				</td>
				<td>
				    <?php 	  
                          $strSQL_img = "SELECT 
                          name,
                          type,
                          directory,
                          id_user

                          FROM user_images

                          WHERE id_user = '".$objResult['id_customer']."' AND type = '1'
                          LIMIT 1
                          ";

                          $objQuery_img = $db->Query($strSQL_img);
                          $objResult_img = mysqli_fetch_array($objQuery_img, MYSQLI_ASSOC);	

                          if($objResult_img["name"] == ''){
                              $show_img = 'img/no_image.png';
                              $style_img = 'style="width: 70px;"';
                          }
                          else
                          {
                              $show_img = $objResult_img["directory"].$objResult_img["name"];
                              $style_img = 'style="width: 80px; border-radius: 10px;"';
                          }
			         ?>
                    <img src="<?php echo $show_img; ?>" alt="<?php echo $objResult_img["name"]; ?>" <?php echo $style_img;?> >
				</td>
        <td>
          <?php echo $objResult["forename"]; ?>
        </td>
        <td>
          <?php echo $objResult["email"];?>
        </td>
        <td>
            <?php 
                if($objResult["telephone"] == ''){
                    echo 'ไม่ได้ระบุ';
                }
                else {
                    echo $objResult["telephone"];
                }
            ?>
        </td> 
        <td>
          <?php echo DateThai($objResult["create_datetime"]); ?>
        </td>        
				<td>
                    
					<a data-toggle="modal" data-target="#modal_edit" style="<?php echo $button_update ?>"  class="btn btn-warning  btn-sm edit_btn" data-id="<?php echo $objResult['id_customer'] ?>"  ><i class="fa fa-edit" style="color: white;"></i></a>

					<button type="button" class="btn btn-danger  btn-sm delete_btn" style="<?php echo $button_delete ?>" data-id="<?php echo $objResult['id_customer'] ?>"><i class="mdi mdi-delete-empty" style="color: white;"></i></button>

                    <button type="button" data-toggle="modal" data-target="#modal_address" style="<?php echo $button_update ?>"  class="btn btn-success btn-sm address_btn" data-id="<?php echo $objResult['id_customer'] ?>"  data1-id="<?php echo $objResult["forename"]; ?>" ><i class="far fa-address-card"></i> ที่อยู่</button>
                    
                    <button type="button" data-toggle="modal" data-target="#modal_print" style="<?php echo $button_update ?>"  class="btn btn-info btn-sm print_btn" data-id="<?php echo $objResult['id_customer'] ?>"  data1-id="<?php echo $objResult["forename"]; ?>" ><i class="fas fa-print"></i> การปริ้น</button>
                    
            <?php
            if ($objResult["status"] == '1') { ?>
			
			          <button type="button" class="btn btn-success btn-sm approval_btn_product" style="<?php echo $button_approval ?>" data-id="<?php echo $objResult['id_customer'] ?>" data-val="3"><i class="mdi mdi-check-circle" style="color: #b3fdac;"></i>&nbsp;อนุมัติการใช้งาน</button>
                
            <?php } elseif ($objResult["status"] == '3') { ?>
			
                      <button type="button" class="btn btn-danger btn-sm approval_btn_product" style="<?php echo $button_approval ?>" data-id="<?php echo $objResult['id_customer'] ?>" data-val="1"><i class="mdi mdi-close-circle-outline" style="color: #FFFFFF;"></i>&nbsp;ถูกระงับการใช้งาน</button>
			
			<?php } elseif ($objResult["status"] == '2') { ?>
			
                      <a href="../mod_permission/front-manage.php"><button type="button" class="btn btn-warning btn-sm"><i class="fas fa-registered" style="color: #FFFFFF;"></i>&nbsp;สมัครเข้าใช้งาน</button></a>
			
			<?php }
		  
			?>
                    

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


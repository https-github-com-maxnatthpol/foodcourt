<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';


if (isset($_POST['form'])) {
//    if ($_POST['form']=="select_table_class_schedule") {
//        select_table_class_schedule();
//    } 
	if ($_POST['form']=="select_div_edit_front_manage") {
        select_div_edit_front_manage();
    } elseif ($_POST['form']=="select_div_address") {
        select_div_address();
    } elseif ($_POST['form']=="fetch_pang_front_product_manage") {
        fetch_pang_front_product_manage();
    } elseif ($_POST['form']=="div_table_list_content") {
        div_table_list_content();
    } elseif ($_POST['form']=="select_table_course_quiz") {
        select_table_course_quiz();
    } elseif ($_POST['form']=="div_table_list_course_question") {
        div_table_list_course_question();
    } elseif ($_POST['form']=="select_div_edit_question") {
        select_div_edit_question();
    } elseif ($_POST['form']=="div_table_list_course") {
        div_table_list_course();
    } elseif ($_POST['form']=="div_table_list_course_shop") {
        div_table_list_course_shop();
    }
//	elseif ($_POST['form']=="div_reviwe") {
//        div_reviwe();
//    } 
	elseif ($_POST['form']=="AVG_score") {
        AVG_score();
    } elseif ($_POST['form']=="div_reviwe_group") {
        div_reviwe_group();
    }
} else {
}

?>

<?php


  function div_table_list_course()
  {
      $db = new DB();

      $button_update  	= $_POST["button_update"];
      $button_delete  	= $_POST["button_delete"];
      $button_create  	= $_POST["button_create"];
      $button_view    	= $_POST["button_view"];
//      $button_approval 	= $_POST["button_approval"];


      $strSQL = "";
      $strSQL .= "SELECT 
      mod_customer.id_customer,
      CONCAT(mod_customer.forename,' ',mod_customer.surename) As fullname,
      mod_customer.email,
      mod_customer.telephone,
      mod_customer.id_catagory,
      users.status,
      mod_customer.create_datetime
      
	  FROM mod_customer
      INNER JOIN users ON mod_customer.id_customer = users.id_data_role
      
      WHERE mod_customer.delete_datetime IS null AND (users.status = '1' OR users.status = '3')
      ";

      if (isset($_POST["id_category"]) && $_POST["id_category"] != '0') {
          $id_category = $db->clear($_POST["id_category"]);
          $strSQL .= " AND mod_customer.id_catagory='".$id_category."' ";
      }
      if (isset($_POST["search_key"]) && $_POST["search_key"] != '') {
          $search_key = $db->clear($_POST["search_key"]);
          $strSQL .= " AND mod_customer.forename LIKE '%".$search_key."%' ";
      }

      //echo $strSQL;
      $objQuery = $db->Query($strSQL); 
	  
?>
<H3></H3>
  <table class="table" id="table_list_course" style="width: 100%">
    <thead >
      <th>
        <input class="ClickCheckAll filled-in chk-col-light-blue" type="checkbox" name="CheckAll_course" id="CheckAll_course" value="Y" onClick="ClickCheckAll_product_list(this);"><label for="CheckAll_course"></label>
      </th>
      <th>รูปสินค้า</th>
      <th>ชื่อสินค้า</th>
      <th>อีเมล</th>
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
      <tr class="show-tr_course">
        <td>
          <input type="checkbox" name="Chk_course[]" id="Chk_course<?php echo $num ?>" value="<?php echo $objResult['id_customer'] ?>" class="checkbox_remove_product filled-in chk-col-light-blue" /><label for="Chk_course<?php echo $num ?>"></label>
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
		  $style_img = 'style="width: 80px;"';
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
          <?php echo $objResult["fullname"] ?>
        </td>
		<td>
          <?php echo $objResult["email"] ?> 			
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
            
            <?php
            if ($objResult["status"] == '1') { ?>
			
			          <button type="button" class="btn btn-success btn-sm approval_btn_product" style="<?php echo $button_approval ?>" data-id="<?php echo $objResult['id_customer'] ?>" data-val="3"><i class="mdi mdi-check-circle" style="color: #b3fdac;"></i>&nbsp;อนุมัติการใช้งาน</button>
                
            <?php } elseif ($objResult["status"] == '3') { ?>
			
                      <button type="button" class="btn btn-danger btn-sm approval_btn_product" style="<?php echo $button_approval ?>" data-id="<?php echo $objResult['id_customer'] ?>" data-val="1"><i class="mdi mdi-close-circle-outline" style="color: #FFFFFF;"></i>&nbsp;ถูกระงับการใช้งาน</button>
			
			<?php }
		  
			?>
            
          <a href="front_manage_shop.php?id_customer=<?php echo $objResult['id_customer'] ?>"  style="<?php echo $button_update ?>"  class="btn btn-warning  btn-sm edit_btn_course" data-id="<?php echo $objResult['id_customer'] ?>"><i class="fa fa-edit"></i> แก้ไขสินค้า</a>

<!--          <a href="show_data.php?id_course=<?php echo $objResult['id_customer'] ?>" style="color : #ffffff ;<?php echo $button_view ?>"  class="btn btn-info  btn-sm show_btn_course" data-id="<?php echo $objResult['id_customer'] ?>"   ><i class="mdi mdi-eye-outline"></i> รายละเอียด</a>-->   

          <button type="button" class="btn btn-danger  btn-sm delete_btn_product" style="<?php echo $button_delete ?>" data-id="<?php echo $objResult['id_customer'] ?>"><i class="mdi mdi-delete-empty" style="color: white;"></i>ลบ</button>

        </td>
      </tr>
<?php
      } ?>      
    </tbody>
  </table>
  <input type="hidden" name="hdnCount_course" value="<?php echo $num ?>">
<?php
  }
  ?>

<?php

  function div_table_list_course_shop()
  {
      $db = new DB();

      $button_update  	= $_POST["button_update"];
      $button_delete  	= $_POST["button_delete"];
      $button_create  	= $_POST["button_create"];
      $button_view    	= $_POST["button_view"];
//      $button_approval 	= $_POST["button_approval"];
      $id_customer      = $_POST["id_customer"];
      
      $strSQL = "";
      $strSQL .= "SELECT 
      name_product,
      date_add,
      view,
      id_customer
	  FROM product
      WHERE id_customer = '".$id_customer."'
      ";

      //echo $strSQL;
      $objQuery = $db->Query($strSQL);
	  
?>
<H3></H3>
  <table class="table" id="table_list_course_shop" style="width: 100%">
    <thead >
      <th>
        <input class="ClickCheckAll filled-in chk-col-light-blue" type="checkbox" name="CheckAll_course" id="CheckAll_course" value="Y" onClick="ClickCheckAll_product_list(this);"><label for="CheckAll_course"></label>
      </th>
      <th>รูปสินค้า</th>
      <th>ชื่อสินค้า</th>
      <th>สถานะ</th>  
      <th>วันที่สร้าง</th>
      <th>จัดการ</th>
    </thead>
    <tbody>
<?php
      $num=0;
      while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
      $num++;  
		  
		?>
      <tr class="show-tr_course">
        <td>
          <input type="checkbox" name="Chk_course[]" id="Chk_course<?php echo $num ?>" value="<?php echo $objResult['id_customer'] ?>" class="checkbox_remove_product filled-in chk-col-light-blue" /><label for="Chk_course<?php echo $num ?>"></label>
        </td>
        <td>
			<?php 	  
	  $strSQL_img = "SELECT 
      name_image,
      date_image,
      id_product
      
	  FROM product_image
      
      WHERE id_product = '".$objResult['id_customer']."'
	  LIMIT 1
      ";
		  
	  $objQuery_img = $db->Query($strSQL_img);
	  $objResult_img = mysqli_fetch_array($objQuery_img, MYSQLI_ASSOC);	
		  
	  if($objResult_img["name_image"] == ''){
		  $show_img = 'img/no_image.png';
		  $style_img = 'style="width: 80px;"';
	  }
	  else
	  {
		  $show_img = $objResult_img["date_image"].$objResult_img["name_image"];
		  $style_img = 'style="width: 80px; border-radius: 10px;"';
	  }
			?>
          <img src="<?php echo $show_img; ?>" alt="<?php echo $objResult_img["name"]; ?>" <?php echo $style_img;?> >
			
        </td>
		<td>
          <?php echo $objResult["name_product"] ?>
        </td>
		<td>
            <?php
            if ($objResult["view"] == '1') { ?>
			
			          <button type="button" class="btn btn-success btn-sm approval_btn_product" style="<?php echo $button_approval ?>" data-id="<?php echo $objResult['id_customer'] ?>" data-val="0"><i class="mdi mdi-check-circle" style="color: #b3fdac;"></i>&nbsp;แสดงสินค้า</button>
                
            <?php } elseif ($objResult["view"] == '0') { ?>
			
                      <button type="button" class="btn btn-danger btn-sm approval_btn_product" style="<?php echo $button_approval ?>" data-id="<?php echo $objResult['id_customer'] ?>" data-val="1"><i class="mdi mdi-close-circle-outline" style="color: #FFFFFF;"></i>&nbsp;ไม่แสดงสินค้า</button>
			
			<?php }
		  
			?> 			
        </td>
        <td>
          <?php echo DateThai($objResult["date_add"]); ?>
        </td>
        <td>
 
          <a href="front_manage_shop.php?id_customer=<?php echo $objResult['id_customer'] ?>"  style="<?php echo $button_update ?>"  class="btn btn-warning  btn-sm edit_btn_course" data-id="<?php echo $objResult['id_customer'] ?>"><i class="fa fa-edit"></i> แก้ไขสินค้า</a>

<!--          <a href="show_data.php?id_course=<?php echo $objResult['id_customer'] ?>" style="color : #ffffff ;<?php echo $button_view ?>"  class="btn btn-info  btn-sm show_btn_course" data-id="<?php echo $objResult['id_customer'] ?>"   ><i class="mdi mdi-eye-outline"></i> รายละเอียด</a>-->   

          <button type="button" class="btn btn-danger  btn-sm delete_btn_product" style="<?php echo $button_delete ?>" data-id="<?php echo $objResult['id_customer'] ?>"><i class="mdi mdi-delete-empty" style="color: white;"></i>ลบ</button>

        </td>
      </tr>
<?php
      } ?>      
    </tbody>
  </table>
  <input type="hidden" name="hdnCount_course" value="<?php echo $num ?>">
<?php
  }
  ?>

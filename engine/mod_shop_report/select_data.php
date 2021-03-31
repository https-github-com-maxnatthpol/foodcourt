<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';


if (isset($_POST['form'])) {
	if ($_POST['form']=="select_table") {
		select_table();
	}
}else{
	
}

function select_table(){
$db = new DB();

$button_update  = $_POST["button_update"];
$button_delete  = $_POST["button_delete"];
$button_create  = $_POST["button_create"];
$button_view    = $_POST["button_view"]; 
    
$strSQL  = "";
$strSQL .= "SELECT `id_customer`,`forename`,`email`,`telephone`,`id_catagory`,`create_datetime`,`status` FROM `mod_customer` WHERE `delete_datetime` IS null";
    
      if (isset($_POST["id_category_s"]) && $_POST["id_category_s"] != '0') {
          $id_category = $db->clear($_POST["id_category_s"]);
          $strSQL .= " AND id_catagory='".$id_category."' ";
      }
      if (isset($_POST["search_key"]) && $_POST["search_key"] != '') {
          $search_key = $db->clear($_POST["search_key"]);
          $strSQL .= " AND forename LIKE '%".$search_key."%' ";
      }
    $strSQL .=" ORDER BY `create_datetime` DESC";    

$strSQL;
$objQuery = $db->Query($strSQL); 
  
?>
  <table class="table" id="table_front_manage" width="100%">
    <thead>
      <th>รูปร้านค้า</th>    
      <th>ชื่อร้านค้า</th>
      <th>ยอมรวมร้านค้า</th>
      <th>ยอดหักเปอร์เซ็นต์</th>
      <th>ยอดสุทธิ</th>
      <th>จัดการ</th>    
    </thead>
    <tbody>
<?php

  while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
      
        $strSQL_amount = "SELECT SUM(amount) AS amount_customer FROM `history_payment_shop` WHERE `id_customer` = '".$objResult['id_customer']."' ";
        
        if (isset($_POST["customer_date"]) && $_POST["customer_date"] != '' ) {
          $customer_date = $_POST["customer_date"];            
          $strSQL_amount .= " AND date_action = '".$customer_date."' ";
        }
      
        $objQuery_amount = $db->Query($strSQL_amount);
        $objResult_amount = mysqli_fetch_array($objQuery_amount);
      
        $strSQL_amount_percent = "SELECT SUM(amount*(percent_customer/100)) AS amount_percent FROM `history_payment_shop` WHERE `id_customer` = '".$objResult['id_customer']."' ";
        
        if (isset($_POST["customer_date"]) && $_POST["customer_date"] != '' ) {
          $customer_date = $_POST["customer_date"];            
          $strSQL_amount_percent .= " AND date_action = '".$customer_date."' ";
        }
      
        $objQuery_amount_percent = $db->Query($strSQL_amount_percent);
        $objResult_amount_percent = mysqli_fetch_array($objQuery_amount_percent);
      
        $total_cus_per = $objResult_amount['amount_customer'] - $objResult_amount_percent['amount_percent'];
      
        $strSQL_sales_store = "SELECT * FROM `mod_sales_store` WHERE `id_customer` = '".$objResult['id_customer']."' ";
      
        if (isset($_POST["customer_date"]) && $_POST["customer_date"] != '' ) {
          $customer_date = $_POST["customer_date"];            
          $strSQL_sales_store .= " AND date_action = '".$customer_date."' ";
        }
      
        $objQuery_sales_store = $db->Query($strSQL_sales_store);
        $objResult_sales_store = mysqli_fetch_array($objQuery_sales_store);
        $row_sales_store = mysqli_num_rows($objQuery_sales_store);
      
?>
      <tr class="show-tr">
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
          <?php echo $objResult['forename']; ?>
        </td> 
        <td>
          <span style="color: #04b104;"><?php echo '+ ฿ '.number_format($objResult_amount['amount_customer'],2); ?></span>    
        </td>
        <td>
          <span style="color: #FF3336;"><?php echo '- ฿ '.number_format($objResult_amount_percent['amount_percent'],2); ?></span>  
        </td>
        <td>
          <span style="color: #007bff;"><?php echo '฿ '.number_format($total_cus_per,2); ?></span>
        </td>
        <td>
          <?php if ($row_sales_store == 0) { ?>    
              <button type="button" class="btn btn-warning btn-sm approval_btn_product" style="<?php echo $button_approval ?>" data-id="<?php echo $objResult['id_customer'] ?>" data-amount-customer="<?php echo number_format($objResult_amount['amount_customer']) ?>" data-amount-percent="<?php echo number_format($objResult_amount_percent['amount_percent']) ?>" data-total_cus_per="<?php echo $total_cus_per; ?>" data-date_action="<?php echo $customer_date; ?>" ><i class="fas fa-question-circle"></i>&nbsp;อนุมัติการจ่ายเงิน</button>
          <?php } else { ?>
              <button type="button" class="btn btn-success btn-sm" style="<?php echo $button_approval ?>"><i class="mdi mdi-check-circle" style="color: #b3fdac;"></i>&nbsp;อนุมัติการจ่ายเงินแล้ว</button>
                
              <button type="button" style="<?php echo $button_update ?> margin-top: 5px;" class="btn btn-info btn-sm print_btn" data-id="<?php echo $objResult['id_customer'] ?>" data-date_action="<?php echo $customer_date; ?>" ><i class="fas fa-print"></i> ปริ้นเอกสาร</button>
            
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


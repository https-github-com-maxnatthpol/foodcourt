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
    
$strSQL = "";
$strSQL .= "SELECT * FROM `mod_customer` ";

//$strSQL .= " ORDER BY date_action DESC ";
//echo $strSQL;
$objQuery = $db->Query($strSQL);
    
//    $str_num = "SELECT amount
//    FROM `history_payment_shop`
//    WHERE `id_customer` = '".$id_customer."' AND (date_action BETWEEN '".$date_start_clear."' AND '".$date_end_clear."' )";
//    $objQuery_num = $db->Query($str_num); 
//    $objResult_num = mysqli_fetch_array($objQuery_num);
//    $num_sum =  mysqli_num_rows($objQuery_num);
//    
//    $strSQL_sum = "SELECT SUM(`amount`) as amount_sum
//    FROM `history_payment_shop`
//    WHERE `id_customer` = '".$id_customer."' AND (date_action BETWEEN '".$date_start_clear."' AND '".$date_end_clear."' )";
//    $objQuery_sum = $db->Query($strSQL_sum); 
//    $objResult_sum = mysqli_fetch_array($objQuery_sum);    
  
?>

<!--
                              <div class="row">
                                <div class="col-lg-6 col-md-6 b-r align-self-center">
                                    <div class="card-body">
                                        <div class="d-flex flex-row">
                                            <div class="col-8 p-0 align-self-center">
                                                <h3 class="m-b-0 text-info"><?php echo $num_sum; ?></h3>
                                                <h5 class="text-muted m-b-0">จำนวนรายการ</h5> </div>
                                            <div class="col-4 text-right">
                                                <div class="round align-self-center round-success"><i class="mdi mdi-format-list-numbers"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 align-self-center">
                                    <div class="card-body">
                                        <div class="d-flex flex-row">
                                            <div class="col-8 p-0 align-self-center">
                                                <h3 class="m-b-0 text-info">฿ <?php echo number_format($objResult_sum['amount_sum'],2); ?></h3>
                                                <h5 class="text-muted m-b-0">ยอดเงินรวม</h5> </div>
                                            <div class="col-4 text-right">
                                                <div class="round align-self-center round"><i class="mdi mdi-numeric"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    
-->

  <table class="table" id="table_front_manage" width="100%">
    <thead>
      <th>รูปร้านค้า</th>    
      <th>ชื่อร้านค้า</th>
      <th>ยอมรวมร้านค้า</th>
      <th>ยอดหักเปอร์เซ็นต์</th>
      <th>ยอดสุทธิ</th>
    </thead>
    <tbody>
<?php

  while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
      
        $strSQL_amount = "SELECT SUM(amount) AS amount_customer FROM `history_payment_shop` WHERE `id_customer` = '".$objResult['id_customer']."' ";
        
        if (isset($_POST["start_to_end_date"]) && $_POST["start_to_end_date"] != '' ) {
          $date_start_end = explode("-", $_POST["start_to_end_date"]);

          $date_start_arr = explode("/", $date_start_end[0]);
          $date_start = $date_start_arr[2].'/'.$date_start_arr[1].'/'.$date_start_arr[0];

          $date_end_arr = explode("/", $date_start_end[1]);
          $date_end = $date_end_arr[2].'/'.$date_end_arr[1].'/'.$date_end_arr[0];

          $date_start1  = $db->clear($date_start);
          $date_end1  = $db->clear($date_end);
          $date_start_clear = preg_replace('/[[:space:]]+/','', trim($date_start1));
          $date_end_clear = preg_replace('/[[:space:]]+/','', trim($date_end1));

          $strSQL_amount .= " AND (date_action BETWEEN '".$date_start_clear."' AND '".$date_end_clear."' )";
        }
      
        $objQuery_amount = $db->Query($strSQL_amount);
        $objResult_amount = mysqli_fetch_array($objQuery_amount);
      
        $strSQL_amount_percent = "SELECT SUM(amount*(percent_customer/100)) AS amount_percent FROM `history_payment_shop` WHERE `id_customer` = '".$objResult['id_customer']."' ";
        
        if (isset($_POST["start_to_end_date"]) && $_POST["start_to_end_date"] != '' ) {
          $date_start_end = explode("-", $_POST["start_to_end_date"]);

          $date_start_arr = explode("/", $date_start_end[0]);
          $date_start = $date_start_arr[2].'/'.$date_start_arr[1].'/'.$date_start_arr[0];

          $date_end_arr = explode("/", $date_start_end[1]);
          $date_end = $date_end_arr[2].'/'.$date_end_arr[1].'/'.$date_end_arr[0];

          $date_start1  = $db->clear($date_start);
          $date_end1  = $db->clear($date_end);
          $date_start_clear = preg_replace('/[[:space:]]+/','', trim($date_start1));
          $date_end_clear = preg_replace('/[[:space:]]+/','', trim($date_end1));

          $strSQL_amount_percent .= " AND (date_action BETWEEN '".$date_start_clear."' AND '".$date_end_clear."' )";
        }
      
        $objQuery_amount_percent = $db->Query($strSQL_amount_percent);
        $objResult_amount_percent = mysqli_fetch_array($objQuery_amount_percent);
      
        $total_cus_per = $objResult_amount['amount_customer'] - $objResult_amount_percent['amount_percent'];
      
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
          <?php echo '฿ '.number_format($total_cus_per,2); ?>
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

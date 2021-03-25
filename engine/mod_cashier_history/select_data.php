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
$id_customer    = $_POST["id_customer"];
    
$strSQL = "";
$strSQL .= "SELECT id_history_pay,id_customer,amount,card_number,create_datetime,date_action FROM `history_payment_shop` WHERE id_customer = '$id_customer'";

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
  
  $strSQL .= " AND (date_action BETWEEN '".$date_start_clear."' AND '".$date_end_clear."' )";
}

$strSQL .= " ORDER BY date_action DESC ";
//echo $strSQL;
$objQuery = $db->Query($strSQL);
  
?>
  <table class="table" id="table_front_manage" width="100%">
    <thead >
      <th>ลำดับ</th>
      <th>วันที่เวลา</th>
      <th>รหัสอ้างอิง</th>
      <th>หมายเลขบัตร</th>
      <th>ยอดเงินรวม</th>
    </thead>
    <tbody>
<?php
  $num=0;
  while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
      
        $strSQL_card = "SELECT number,card_number FROM `card` WHERE `card_number` = '".$objResult['card_number']."' ";
        $objQuery_card = $db->Query($strSQL_card);
        $objResult_card = mysqli_fetch_array($objQuery_card); 
      
        $num++; 
?>
      <tr class="show-tr">
        <td>
          <?php echo $num; ?>
        </td>
        <td>
          <?php echo DateThai_time($objResult['create_datetime']);?>
        </td>
        <td>
          <?php echo substr($objResult['id_history_pay'], 0 ,4); ?>
        </td>
        <td>
          <?php echo str_pad($objResult_card['number'],4,"0",STR_PAD_LEFT); ?>
        </td>
        <td>
          <span style="color: #04b104;"><?php echo '+ ฿ '.number_format($objResult['amount'],2); ?></span>
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

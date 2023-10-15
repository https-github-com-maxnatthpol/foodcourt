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

$strSQL .= " ORDER BY create_datetime DESC ";
//echo $strSQL;
$objQuery = $db->Query($strSQL);
    
    $str_num = "SELECT amount
    FROM `history_payment_shop`
    WHERE `id_customer` = '".$id_customer."' AND (date_action BETWEEN '".$date_start_clear."' AND '".$date_end_clear."' )";
    $objQuery_num = $db->Query($str_num); 
    $objResult_num = mysqli_fetch_array($objQuery_num);
    $num_sum =  mysqli_num_rows($objQuery_num);
    
    $strSQL_sum = "SELECT SUM(`amount`) as amount_sum
    FROM `history_payment_shop`
    WHERE `id_customer` = '".$id_customer."' AND (date_action BETWEEN '".$date_start_clear."' AND '".$date_end_clear."' )";
    $objQuery_sum = $db->Query($strSQL_sum); 
    $objResult_sum = mysqli_fetch_array($objQuery_sum);    
  
?>

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

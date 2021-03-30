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
$id_cashier    = $_POST["id_cashier"];
    
$strSQL = "";
$strSQL .= "SELECT * FROM `data_working_card` WHERE id_cashier = '$id_cashier'";
$strSQL .= " AND (data_date BETWEEN '".$date_start_clear." 00:00:00' AND '".$date_end_clear." 23:59:59' )";
$strSQL .= " ORDER BY data_date DESC ";
echo $strSQL;
$objQuery = $db->Query($strSQL);
  
?>
  <table class="table" id="table_front_manage" width="100%">
    <thead >
      <th>ลำดับ</th>
      <th>วันที่เวลา</th>
      <th>รหัสอ้างอิง</th>
      <th>หมายเลขบัตร</th>
      <th>จำนวนเงิน</th>
    </thead>
    <tbody>
<?php
  $num=0;
  while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
?>
      <tr class="show-tr">
        <td>
          <?php echo $num; ?>
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

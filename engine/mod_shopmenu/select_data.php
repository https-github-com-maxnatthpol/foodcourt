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
    } 
} else {
    
}

function select_table_front_manage()
{
    $db = new DB();
    $button_update  = $_POST["button_update"];
    $button_delete  = $_POST["button_delete"];
    $button_create  = $_POST["button_create"];
    $button_view    = $_POST["button_view"];
    
    $date_select = date("Y-m-d");
    
    if (isset($_SESSION["id_data"])) {
	   $id_data = $_SESSION["id_data"];
    }else{
       $id_data = '';
    }

    $strSQL = "SELECT id_customer,amount,card_number,create_datetime FROM `history_payment_shop` WHERE `id_customer` = '".$id_data."' and `date_action` = '".$date_select."' ORDER BY create_datetime ASC";
    $objQuery = $db->Query($strSQL); ?>
	<table class="table" id="table_front_manage" width="100%">
		<thead>
			<th>หมายเลขบัตร</th>
            <th>จำนวนเงิน
            <th>วันที่เวลา</th>
		</thead>
		<tbody>
<?php
    $num=0;
    while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
        
        $strSQL_card = "SELECT number,card_number FROM `card` WHERE `card_number` = '".$objResult['card_number']."' ";
        $objQuery_card = $db->Query($strSQL_card);
        $objResult_card = mysqli_fetch_array($objQuery_card);
        $num++; ?>
			<tr class="show-tr">
				<td>
                    <?php echo str_pad($objResult_card['number'],4,"0",STR_PAD_LEFT); ?>
				</td>
				<td>
                    <span style="color: #04b104;"><?php echo '+ ฿ '.number_format($objResult['amount'],2); ?></span>
				</td>
                <td>
                    <?php echo DateThai_time($objResult['create_datetime']); ?>
				</td>
			</tr>
<?php
    } ?>			
		</tbody>
	</table>
	<input type="hidden" name="hdnCount" value="<?php echo $num ?>">


<?php
}

?>
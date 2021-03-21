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
    $objQuery = $db->Query($strSQL);
    
    $str_num = "SELECT amount
    FROM `history_payment_shop`
    WHERE `id_customer` = '".$id_data."' and `date_action` = '".$date_select."' ";
    $objQuery_num = $db->Query($str_num); 
    $objResult_num = mysqli_fetch_array($objQuery_num);
    $num_sum =  mysqli_num_rows($objQuery_num);
    
    $strSQL_sum = "SELECT SUM(`amount`) as amount_sum
    FROM `history_payment_shop`
    WHERE `id_customer` = '".$id_data."' and `date_action` = '".$date_select."' ";
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
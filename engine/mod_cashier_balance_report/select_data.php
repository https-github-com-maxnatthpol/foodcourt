<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';


if (isset($_POST['form'])) {
  if ($_POST['form'] == "select_table") {
    select_table();
  }
} else {
}

function select_table()
{
  $db = new DB();

  if (isset($_POST["employee_date"])) {
    $date_now = $db->clear($_POST["employee_date"]);
  } else {
    $date_now = $db->clear(date("Y-m-d"));
  }

  $strSQL = "";
  $strSQL .= "SELECT * FROM `mod_cashier`";
  //$strSQL .= " AND (data_date BETWEEN '".$employee_date." 00:00:00' AND '".$employee_date." 23:59:59' )";
  //$strSQL .= " ORDER BY data_date DESC ";
  //echo $strSQL;
  $objQuery = $db->Query($strSQL);

?>
  <table class="table" id="table_front_manage" width="100%">
    <thead>
      <th>ลำดับ</th>
      <th>ชื่อ-สกุล</th>
      <th>ยอดเงินซื้อบัตร/เติมเงิน</th>
      <th>ยอดเงินคืนบัตร</th>
      <th>ยอดเงินสุทธิ</th>
      <th>ยืนยัน</th>
    </thead>
    <tbody>
      <?php
      $num = 1;
      while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {

        $sql = "";
        $sql .= "SELECT sum(amount) as sum_amount FROM `data_working_card`";
        $sql .= " WHERE Identity = 0";
        $sql .= " AND id_cashier = '".$objResult["id_cashier"]."'";
        $sql .= " AND (data_date BETWEEN '".$date_now." 00:00:00' AND '".$date_now." 23:59:59' )";
        $query = $db->Query($sql);
        $result_sum_0 = mysqli_fetch_array($query);

        $sql = "";
        $sql .= "SELECT sum(amount) as sum_amount FROM `data_working_card`";
        $sql .= " WHERE Identity = 1";
        $sql .= " AND id_cashier = '".$objResult["id_cashier"]."'";
        $sql .= " AND (data_date BETWEEN '".$date_now." 00:00:00' AND '".$date_now." 23:59:59' )";
        $query = $db->Query($sql);
        $result_sum_1 = mysqli_fetch_array($query);

        $sql = "";
        $sql .= "SELECT sum(amount) as sum_amount FROM `data_working_card`";
        $sql .= " WHERE Identity = 2";
        $sql .= " AND id_cashier = '".$objResult["id_cashier"]."'";
        $sql .= " AND (data_date BETWEEN '".$date_now." 00:00:00' AND '".$date_now." 23:59:59' )";
        $query = $db->Query($sql);
        $result_sum_2 = mysqli_fetch_array($query);

        $strSQL_sales_store = "SELECT date_action FROM `mod_cashier_sales_store` WHERE `id_cashier` = '".$objResult["id_cashier"]."' ";
        $strSQL_sales_store .= " AND date_action = '".$date_now."' ";

        $objQuery_sales_store = $db->Query($strSQL_sales_store);
        $objResult_sales_store = mysqli_fetch_array($objQuery_sales_store);
        $row_sales_store = mysqli_num_rows($objQuery_sales_store);

        //echo $sql;
      ?>
        <tr class="show-tr">
          <td>
            <?php echo $num; ?>
          </td>
          <td>
            <?php echo $objResult["forename"] . " " . $objResult["surename"]; ?>
          </td>
          <td>
          <?php echo number_format(($result_sum_0["sum_amount"] + $result_sum_2["sum_amount"]),2); ?>
          </td>
          <td>
          <?php echo number_format($result_sum_1["sum_amount"],2); ?>
          </td>
          <td>
          <?php echo number_format(($result_sum_0["sum_amount"] + $result_sum_2["sum_amount"]) -$result_sum_1["sum_amount"],2); ?>
          </td>
          <td>
          <?php if ($row_sales_store == 0) { ?>
              <button type="button" class="btn btn-warning btn-sm approval_btn_product" style="<?php //echo $button_approval ?>"
              data-id="<?php echo $objResult["id_cashier"] ?>"
              data-sales_store="<?php echo ($result_sum_0["sum_amount"]); ?>"
              data-sales_store_transfer="<?php ($result_sum_2["sum_amount"]); ?>"
              data-sales_store_paid="<?php echo ($result_sum_1["sum_amount"]); ?>"
              data-sales_store_total="<?php echo (($result_sum_0["sum_amount"] + $result_sum_2["sum_amount"]) -$result_sum_1["sum_amount"]); ?>"
              data-date_action="<?php echo $date_now; ?>" >
              <i class="fas fa-question-circle"></i>&nbsp;อนุมัติการรับเงิน</button>
          <?php } else { ?>
              <button type="button" class="btn btn-success btn-sm" style="<?php echo $button_approval ?>"><i class="mdi mdi-check-circle" style="color: #b3fdac;"></i>&nbsp;อนุมัติการรับเงินแล้ว</button>

              <button type="button" style="<?php echo $button_update ?>" class="btn btn-info btn-sm print_btn" data-id="<?php echo $objResult["id_cashier"] ?>" data-date_action="<?php echo $objResult_sales_store["date_action"]; ?>"><i class="fas fa-print"></i> ปริ้นเอกสาร</button>

          <?php } ?>
          </td>
        </tr>
      <?php
        $num++;
      }
      ?>
    </tbody>
  </table>
  <input type="hidden" name="hdnCount" value="<?php echo $num ?>">
<?php
}
?>

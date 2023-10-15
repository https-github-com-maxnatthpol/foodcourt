<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';


if (isset($_POST['form'])) {
  if ($_POST['form'] == "select_table_front_manage") {
    select_table_front_manage();
  }
}

if (isset($_POST['form'])) {
  if ($_POST['form'] == "select_table_front_manage_bill") {
    select_table_front_manage_bill();
  }
}

function select_table_front_manage()
{

  $db = new DB();
  date_default_timezone_set("Asia/Bangkok");
  $date_now = date("Y-m-d");

  if (isset($_SESSION["id_data"])) {
    $id_data = $_SESSION["id_data"];
  } else {
    $id_data = '';
  }

  $id_cashier = $db->clear($id_data);

  $strSQL = "SELECT data_working_card.id,data_working_card.id_cashier,data_working_card.data_date,data_working_card.Identity,
  IF(data_working_card.Identity = 0, 'เติมเงิน GiftCard', 'การทำธุรกรรมไม่ถูกต้อง') AS text_Identity,data_working_card.amount,
  card.number
  FROM `data_working_card` 
  INNER JOIN `card`
  WHERE data_working_card.data_date >= '$date_now 00:00:00' 
  AND data_working_card.id_card = card.id
  AND card.status = '2'
  AND data_working_card.id_cashier = '" . $id_cashier . "';";
  $objQuery = $db->Query($strSQL);

?>
  <style>
    .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
      color: #ffffff !important;
      border: 1px solid #a2a9ad;
      background-color: #a2a9ad;
    }
  </style>
  <table class="table" id="table_front_manage" width="100%">
    <thead>
      <th>รายการอาหาร</th>
      <th>จำนวน</th>
      <th>ราคา</th>
      <th>#</th>
    </thead>
    <tbody>
      <?php
      while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
      ?>
        <tr class="show-tr">
          <td>
            <?php
            $pizza  = $objResult["data_date"];
            $pieces = explode(" ", $pizza);
            echo $pieces[1];
            ?>
          </td>
          <td>
            <?php echo substr($objResult["id"], 0, 4); ?>
          </td>
          <td>
            <?php echo str_pad($objResult["number"], 4, "0", STR_PAD_LEFT); ?>
          </td>
          <td>
            <?php echo $objResult["text_Identity"]; ?>
          </td>
          <?php
          if ($objResult["Identity"] == 0) {
            echo '<td style="color:green;">+ ฿' . number_format($objResult['amount'], 2) . '</td>';
          } elseif ($objResult["Identity"] == 1) {
            echo '<td style="color:red;">- ฿' . number_format($objResult['amount'], 2) . '</td>';
          } elseif ($objResult["Identity"] == 2) {
            echo '<td style="color:#1e88e5;">+ ฿' . number_format($objResult['amount'], 2) . '</td>';
          }
          ?>
        </tr>
      <?php

      }
      ?>
    </tbody>
  </table>
<?php
}

function select_table_front_manage_bill()
{

  $db = new DB();
  date_default_timezone_set("Asia/Bangkok");
  $date_now = date("Y-m-d");

  if (isset($_SESSION["id_data"])) {
    $id_data = $_SESSION["id_data"];
  } else {
    $id_data = '';
  }

  $id_cashier = $db->clear($id_data);

  $strSQL = "SELECT data_working_card.id,data_working_card.id_cashier,data_working_card.data_date,data_working_card.Identity,
  IF(data_working_card.Identity = 0, 'เติมเงิน GiftCard', 'การทำธุรกรรมไม่ถูกต้อง') AS text_Identity,data_working_card.amount,
  card.number
  FROM `data_working_card` 
  INNER JOIN `card`
  WHERE data_working_card.data_date >= '$date_now 00:00:00' 
  AND data_working_card.id_card = card.id
  AND card.status = '2'
  AND data_working_card.id_cashier = '" . $id_cashier . "';";
  $objQuery = $db->Query($strSQL);

?>
  <style>
    .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
      color: #ffffff !important;
      border: 1px solid #a2a9ad;
      background-color: #a2a9ad;
    }
  </style>
  <table class="table" id="table_front_manage_bill" width="100%">
    <thead>
      <th>เมนูอาหาร</th>
      <th>ราคา</th>
      <th>#</th>
    </thead>
    <tbody>
        <tr class="show-tr">
          <td>
            <?php echo "ไข่"; ?>
          </td>
          <td>
            <?php echo "10"; ?>
          </td>
          <td>
            <?php echo ""; ?>
          </td>
        </tr>
    </tbody>
  </table>
<?php
}

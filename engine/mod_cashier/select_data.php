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

function select_table_front_manage()
{

  $db = new DB();
  date_default_timezone_set("Asia/Bangkok");
  $date_now = date("Y-m-d");
  $strSQL = "SELECT data_date,Identity,IF(Identity = 0, 'ซื้อบัตร / เติมเงิน', 'คืนบัตร') AS text_Identity,amount FROM `data_working_card` WHERE data_date >= '$date_now 00:00:00';";
  $objQuery = $db->Query($strSQL);

?>
  <style>
    .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    color: #ffffff !important;
    border: 1px solid #a2a9ad;
    background-color: #a2a9ad;
}
  </style>
  <table class="table" id="table_front_manage" width="100%">
    <thead>
      <th>เวลา</th>
      <th>ธุรกรรม</th>
      <th>จำนวนเงิน</th>
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
            <?php echo $objResult["text_Identity"]; ?>
          </td>
          <?php
          if ($objResult["Identity"] == 0) {
            echo '<td style="color:green;">+ ฿' . $objResult["amount"] . '</td>';
          } elseif ($objResult["Identity"] == 1) {
            echo '<td style="color:red;">- ฿' . $objResult["amount"] . '</td>';
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

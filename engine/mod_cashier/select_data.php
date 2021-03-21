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
  } elseif ($_POST['form'] == "fetch_data_summary_total") {
    fetch_data_summary_total();
  } elseif ($_POST['form'] == "chart_summary") {
    chart_summary();
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
  IF(data_working_card.Identity = 0, 'ซื้อบัตร / เติมเงิน', 'คืนบัตร') AS text_Identity,data_working_card.amount,
  card.number
  FROM `data_working_card` 
  INNER JOIN `card`
  WHERE data_working_card.data_date >= '$date_now 00:00:00' 
  AND data_working_card.id_card = card.id
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
      <th>เวลา</th>
      <th>รหัสอ้างอิง</th>
      <th>เลขบัตร</th>
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
            <?php echo substr($objResult["id"], 0 ,4); ?>
          </td>
          <td>
            <?php echo str_pad($objResult["number"], 4, "0", STR_PAD_LEFT); ?>
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

function fetch_data_summary_total()
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


  $strSQL = "SELECT sum(amount) FROM `data_working_card` WHERE Identity = 0 AND data_date >= '$date_now 00:00:00' AND id_cashier = '" . $id_cashier . "';";
  $objQuery = $db->Query($strSQL);
  $total_buy_result = mysqli_fetch_array($objQuery);

  $strSQL = "SELECT sum(amount) FROM `data_working_card` WHERE Identity = 1 AND data_date >= '$date_now 00:00:00' AND id_cashier = '" . $id_cashier . "';";
  $objQuery = $db->Query($strSQL);
  $total_return_result = mysqli_fetch_array($objQuery);
?>
  <div class="left-aside ">
    <ul class="list-style-none">
      <li class="box-label"><a href="javascript:void(0)">วันที่ <span><?= date("Y-m-d") ?></span></a></li>
      <li class="divider"></li>
    </ul>
    <div class="card card-inverse card-success">
      <div class="card-body">
        <div class="d-flex flex-row">
          <div class="m-l-10 align-self-center">
            <h3 class="card-title">+ ฿ <?= $total_buy_result[0] ?></h3>
            <h5 class="card-title">ยอดเงินซื้อบัตร/เติมเงิน</h5>
          </div>
        </div>
      </div>
    </div>
    <div class="card card-inverse card-danger">
      <div class="card-body">
        <div class="d-flex flex-row">
          <div class="m-l-10 align-self-center">
            <h3 class="card-title">- ฿ <?= $total_return_result[0] ?></h3>
            <h5 class="card-title">ยอดเงินคืนบัตร</h5>
          </div>
        </div>
      </div>
    </div>
    <div class="card card-inverse card-info">
      <div class="card-body">
        <div class="d-flex flex-row">
          <div class="m-l-10 align-self-center">
            <h3 class="card-title">= ฿ <?= $total_buy_result[0] - $total_return_result[0] ?></h3>
            <h5 class="card-title">ยอดเงินสุทธิ</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
}

function chart_summary()
{
  $db = new DB();
  date_default_timezone_set("Asia/Bangkok");

  if (isset($_SESSION["id_data"])) {
    $id_data = $_SESSION["id_data"];
  } else {
    $id_data = '';
  }

  $id_cashier = $db->clear($id_data);

  $sql = "SELECT DATE_FORMAT(data_date, '%Y-%m-%d') as summary_date,SUM(amount) AS amount 
  FROM data_working_card 
  WHERE date(data_date)>=date_add(NOW(),interval -1 week) AND id_cashier = '" . $id_cashier . "'
  GROUP BY DATE_FORMAT(data_date, '%Y-%m-%d') 
  ORDER BY data_date ASC";

  $query = $db->Query($sql);
  $summary_date = "";
  $amount = "";
  while ($objResult = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    $summary_date .= '"'.$objResult["summary_date"] . '",';
    $amount .= $objResult["amount"] . ",";
  }
?>
  <canvas id="chart_summary" width="800" height="450"></canvas>
  <script src="../../plugins_b/Chart.js/Chart.min.js"></script>

  <script>
    $.ajax({
      url: "select_data.php",
      method: "POST",
      data: {
        form: "chart_summary",
      },
      success: function(data) {
        new Chart(document.getElementById("chart_summary"), {
          type: 'line',
          data: {
            labels: [<?= $summary_date ?>],
            datasets: [{
              data: [<?= $amount ?>],
              label: "ยอดเงินสุทธิ",
              borderColor: "#6610f2",
              fill: false
            }]
          },
          options: {
            title: {
              display: true,
              text: 'กราฟสรุปยอดเงินสุทธิ (ย้อนหลัง 10 วัน)'
            }
          }
        });
      }
    });
  </script>
<?php
}

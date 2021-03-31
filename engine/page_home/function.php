<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';
require_once '../lib/functions.php';


if (isset($_POST['action'])) {
    switch ($_POST['action']) {

        case "sales":
            sales();

            break;
    }
}

if (isset($_POST['form'])) {
    if ($_POST['form'] == "chart_summary") {
        chart_summary();
    }
}

function chart_summary()
{
    $db = new DB();
    date_default_timezone_set("Asia/Bangkok");


    $sql = "SELECT DATE_FORMAT(date_action, '%Y-%m-%d') as summary_date,SUM(amount) AS amount 
  FROM history_payment_shop 
  WHERE date(date_action)>=date_add(NOW(),interval -1 week)
  GROUP BY DATE_FORMAT(date_action, '%Y-%m-%d') 
  ORDER BY date_action ASC";

    $query = $db->Query($sql);
    $summary_date = "";
    $amount = "";
    while ($objResult = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        $summary_date .= '"' . DateThai($objResult["summary_date"]) . '",';
        $amount .= $objResult["amount"] . ",";
    }
?>
    <canvas id="chart_summary" width="800" height="450"></canvas>
    <script src="../../plugins_b/Chart.js/Chart.min.js"></script>

    <script>
        $.ajax({
            url: "function.php",
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
                            label: "ยอดขาย",
                            borderColor: "#6610f2",
                            fill: false
                        }, {
                            data: [40, 20, 10, 16, 24, 38, 74, 167, 508, 784],
                            label: "ยอดกำไร",
                            borderColor: "#e8c3b9",
                            fill: false
                        }, ]
                    },
                    options: {
                        title: {
                            display: true,
                            text: 'กราฟสรุปยอดขายโดยรวมของร้านค้า (ย้อนหลัง 7 วัน)'
                        }
                    }
                });
            }
        });
    </script>
<?php
}


function sales()
{
    $db = new DB();

    //==========Course
    $sql = "SELECT SUM(`amount`) as total FROM `card` WHERE `status` = 1 ";
    $objResult = $db->QueryFetchArray($sql);

    $course = $objResult["total"];

    //==========Webinar
    //==========Course
    $sql = "SELECT SUM(`amount`) as total FROM `card` WHERE `status` = 1 ";
    $objResult = $db->QueryFetchArray($sql);
    $webinar = $objResult["total"];


    echo json_encode(array('course' => $course, 'webinar' => $webinar));
}

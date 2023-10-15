<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';

$db = new DB();

$strSQL_mod_bill = "SELECT mod_bill.id,mod_bill.mod_employee,mod_employee.username,mod_bill.name,mod_bill.date_come,mod_bill.total
,mod_bill.status,mod_bill.date_end,mod_bill.type_of_money,mod_bill.money
  FROM mod_bill
  INNER JOIN mod_employee
  WHERE mod_employee.id_employee = mod_bill.check_bill
  AND mod_bill.id = '" . $_GET["bill_id"] . "' ";
$objQuery_mod_bill = $db->Query($strSQL_mod_bill);
$objResult_mod_bill = mysqli_fetch_array($objQuery_mod_bill, MYSQLI_ASSOC);
$name = $objResult_mod_bill["name"];
$date_end = $objResult_mod_bill["date_end"];
$username = $objResult_mod_bill["username"];
$total = $objResult_mod_bill["total"];
$money = $objResult_mod_bill["money"];
$type_of_money = "";
if ($objResult_mod_bill["type_of_money"] == 1) {
    $type_of_money = "เงินโอน";
} else {
    $type_of_money = "เงินสด";
}

$strSQL = "SELECT mod_bill_detail.id,mod_bill_detail.mod_menu,mod_menu.name,mod_menu.price,mod_bill_detail.mod_bill,
  COUNT(mod_bill_detail.mod_menu) AS count_mod_menu,
  SUM(mod_menu.price) AS sum_price
  FROM `mod_bill_detail` 
  INNER JOIN `mod_menu` 
  WHERE mod_bill_detail.mod_menu = mod_menu.id
  AND mod_bill_detail.mod_bill = '" . $_GET['bill_id'] . "'
  GROUP BY mod_bill_detail.mod_menu
  ORDER BY mod_bill_detail.date_action ASC
  ;";

$objQuery = $db->Query($strSQL);

?>

<!DOCTYPE html>
<html lang="TH">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/print.css">
    <title>พิมพ์ใบแจ้งหนี้</title>
</head>

<body>
    <div class="ticket">
        <img src="./img/logo.png" alt="Logo" class="logo_2">
        <p class="centered_h1">Chill @ ฟาร์มฮัก
            <br>......
            <br>ใบเสร็จรับเงิน
        </p>
        <p class="centered">เปิด - ปิด 17.00 - 22.00 น.
            <br>โทร 065-887-3935
        </p>
        <p class="left_t border_top">บิล :<?php echo $name; ?>
            <br>วันที่ :<?php echo $date_end; ?>
        </p>
        <table>
            <thead>
                <tr>
                    <th class="quantity">Q.</th>
                    <th class="description">รายละเอียด</th>
                    <th class="price">ราคา</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
                ?>
                    <tr>
                        <td class="quantity">x<?php echo $objResult["count_mod_menu"]; ?></td>
                        <td class="description"><?php echo $objResult["name"]; ?></td>
                        <td class="price"><?php echo $objResult["sum_price"]; ?> บ.</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <p class="right_t">ราคารวม : <?php echo $total; ?> บ.
            <br>เงินที่ได้รับ :<?php echo $money; ?> บ.
            <br><?php echo $type_of_money; ?>
        </p>
        <p class="right_h2 border_top border_bottom">เงินทอน : <?php echo ($money-$total); ?> บ.</p>
        <p class="right_t">ออกโดย : <?php echo $username; ?></p>
        <p class="centered">ขอบคุณลูกค้าทุกท่าน!
        </p>
    </div>
    <button class="hidden-print" id="btnPrint">พิมพ์ใบแจ้งหนี้</button>
    <script src="./js/print.js"></script>
</body>

</html>
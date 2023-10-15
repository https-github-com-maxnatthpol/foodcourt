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
  } else if ($_POST['form'] == "bill_check") {
    bill_check();
  } else if ($_POST['form'] == "select_table_list_history") {
    select_table_list_history();
  }
}


function bill_check()
{
  $db = new DB();

  $strSQL = "SELECT mod_bill.id,mod_bill.mod_employee,mod_employee.username,mod_bill.name,mod_bill.date_come,mod_bill.total,mod_bill.status
  FROM mod_bill
  INNER JOIN mod_employee
  WHERE mod_employee.id_employee = mod_bill.mod_employee
  AND mod_bill.id  = '" . $_POST["id"] . "' ";

  $objQuery = $db->Query($strSQL);
  $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

  $strSQL_sum = "SELECT SUM(mod_menu.price) AS sum_price
        FROM `mod_bill_detail` 
        INNER JOIN `mod_menu` 
        WHERE mod_bill_detail.mod_menu = mod_menu.id
        AND mod_bill_detail.mod_bill = '" . $objResult["id"] . "'
        ;";
  $objQuery_sum = $db->Query($strSQL_sum);
  $objResult_sum = mysqli_fetch_array($objQuery_sum, MYSQLI_ASSOC);

?>

  <div class="card card-body">
    <div class="box-header with-border">
      <h3 class="box-title">เช็คบิล</h3>
    </div>
    <div class="box-body" style="padding: 0;">
      <form action="" name="form_bill_check" id="form_bill_check" method="post">
        <input type="hidden" name="form" value="form_bill_check">
        <input type="hidden" name="id_bill" value="<?php echo $_POST["id"] ?>">
        <input type="hidden" id="total" name="total" value="<?php echo $objResult_sum["sum_price"] ?>">
        <div class="row">

          <div class="col-md-6">

            <div class="form-group">
              <label for="example-email">บิล / โต๊ะ </label>
              <input type="text" class="form-control" value="<?php echo $objResult["name"] ?>" disabled>
            </div>
          </div>

          <div class="col-md-6">

            <div class="form-group">
              <label for="example-email">วันเวลาที่เช็คบิล</label>
              <?php date_default_timezone_set("Asia/Bangkok"); ?>
              <input type="text" class="form-control" value="<?php echo date("d/m/Y เวลา H:i"); ?>" placeholder="กรอกเวลา" disabled>
            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group">
              <label for="example-email">ผู้เช็คบิล </label>
              <input type="text" class="form-control" value="<?php echo $_SESSION["name"]; ?>" disabled>
            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group">
              <label for="example-email">ยอดเงินสุทธิ </label>
              <input type="text" class="form-control" id="total2" name="total2" value="<?php echo $objResult_sum["sum_price"] ?>" disabled>
            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group">
              <label for="example-email">รับเงินมา </label>
              <input type="text" class="form-control" value="" id="money" name="money" placeholder="กรอกจำนวนเงินที่ได้รับ">
            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group">
              <label>รับเงินเป็น </label>
              <div class="col-md-9">
                <div class="m-b-10">
                  <label class="custom-control custom-radio">
                    <input id="type_of_money" name="type_of_money" type="radio" class="custom-control-input" value="0" checked="">
                    <span class="custom-control-label">เงินสด</span>
                  </label>
                  <label class="custom-control custom-radio">
                    <input id="type_of_money" name="type_of_money" type="radio" class="custom-control-input" value="1">
                    <span class="custom-control-label">เงินโอน</span>
                  </label>
                </div>
              </div>
            </div>

          </div>

        </div>
        <div class="boxsave" id="box-del-list" align="center">

          <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>

          <button type="button" class="btn btn-success  btnbill_check" id="btnbill_check" style="transition: 0.4s; margin-left: 5px;"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;ตกลง</button>

        </div>
    </div>
  </div>

  </form>
  </div>

<?php
}


function select_table_front_manage()
{

  $db = new DB();

  $button_update  = $_POST["button_update"];
  $button_delete  = $_POST["button_delete"];
  $button_create  = $_POST["button_create"];
  $button_view    = $_POST["button_view"];

  $strSQL = "SELECT mod_bill.id,mod_bill.mod_employee,mod_employee.username,mod_bill.name,mod_bill.date_come,mod_bill.total,mod_bill.status
  FROM mod_bill
  INNER JOIN mod_employee
  WHERE mod_employee.id_employee = mod_bill.mod_employee
  AND mod_bill.status = '1' ";
  $objQuery = $db->Query($strSQL);

?>
  <table class="table" id="table_front_manage" width="100%">
    <thead>
      <th>ลำดับ</th>
      <th>บิล / โต๊ะ</th>
      <th>วันที่</th>
      <th>เวลา</th>
      <th>ราคารวม</th>
      <th>เปิดโดย</th>
      <th>จัดการ</th>
    </thead>
    <tbody>
      <?php
      $num = 0;
      while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
        $num++;

        $strSQL_sum = "SELECT SUM(mod_menu.price) AS sum_price
        FROM `mod_bill_detail` 
        INNER JOIN `mod_menu` 
        WHERE mod_bill_detail.mod_menu = mod_menu.id
        AND mod_bill_detail.mod_bill = '" . $objResult["id"] . "'
        ;";
        $objQuery_sum = $db->Query($strSQL_sum);
        $objResult_sum = mysqli_fetch_array($objQuery_sum, MYSQLI_ASSOC);

      ?>
        <tr class="show-tr">
          <td>
            <?php echo $num ?>
          </td>
          <td>
            <?php echo $objResult["name"]; ?>
          </td>
          <td>
            <?php $date = date_create($objResult["date_come"]);
            echo date_format($date, "d/m/Y");
            ?>
          </td>
          <td>
            <?php $date = date_create($objResult["date_come"]);
            echo date_format($date, "H:i");
            ?>
          </td>
          <td>
            <?php echo $objResult_sum["sum_price"]; ?>
          </td>
          <td>
            <?php echo $objResult["username"]; ?>
          </td>
          <td>
            <a onclick="window.open('<?php echo link_url_to_folder(); ?>print_invoice.php?bill_id=<?php echo $objResult['id'] ?>', '_blank', 'location=yes,height=450,width=400,scrollbars=yes,status=yes');" class="btn btn-warning btn-sm" style="color: white;"><i class="fas fa-balance-scale" style="color: white;"></i> ใบแจ้งหนี้</a>
            <a data-toggle="modal" data-target="#modal_bill_check" style="<?php echo $button_update ?> color: white;" class="btn btn-success  btn-sm bill_check" data-id="<?php echo $objResult['id'] ?>"><i class="fas fa-check" style="color: white;"></i> เช็คบิล</a>
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

function select_table_list_history()
{

  $db = new DB();
  date_default_timezone_set("Asia/Bangkok");
  $date_now = date("Y-m-d");

  $button_update  = $_POST["button_update"];
  $button_delete  = $_POST["button_delete"];
  $button_create  = $_POST["button_create"];
  $button_view    = $_POST["button_view"];

  $strSQL = "SELECT mod_bill.id,mod_bill.mod_employee,mod_employee.username,mod_bill.name,mod_bill.date_come,mod_bill.total,mod_bill.status
  ,mod_bill.date_end,mod_bill.type_of_money,mod_bill.money
  FROM mod_bill
  INNER JOIN mod_employee
  WHERE mod_employee.id_employee = mod_bill.check_bill
  AND mod_bill.status = '2' 
  AND mod_bill.date_end >= '$date_now 00:00:00'
  ORDER BY mod_bill.date_end DESC;
  ";
  $objQuery = $db->Query($strSQL);

?>
  <table class="table" id="table_front_manage_history" width="100%">
    <thead>
      <th>ลำดับ</th>
      <th>บิล</th>
      <th>วันที่</th>
      <th>เวลา</th>
      <th>ยอดสุทธิ</th>
      <th>เงินที่ได้รับ</th>
      <th>เช็คบิลโดย</th>
      <th>จัดการ</th>
    </thead>
    <tbody>
      <?php
      $num = 0;
      while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
        $num++;

      ?>
        <tr class="show-tr">
          <td>
            <?php echo $num ?>
          </td>
          <td>
            <?php echo $objResult["name"]; ?>
          </td>
          <td>
            <?php $date = date_create($objResult["date_end"]);
            echo date_format($date, "d/m/Y");
            ?>
          </td>
          <td>
            <?php $date = date_create($objResult["date_end"]);
            echo date_format($date, "H:i");
            ?>
          </td>
          <td>
            <?php echo $objResult["total"]; ?>
          </td>
          <td>
            <?php
            if ($objResult["type_of_money"] == 1) {
              $type_of_money = "เงินโอน";
            } else {
              $type_of_money = "เงินสด";
            }
            ?>
            <?php echo $type_of_money; ?>
          </td>
          <td>
            <?php echo $objResult["username"]; ?>
          </td>
          <td>
            <a onclick="window.open('<?php echo link_url_to_folder(); ?>print_bill_check.php?bill_id=<?php echo $objResult['id'] ?>', '_blank', 'location=yes,height=450,width=400,scrollbars=yes,status=yes');" class="btn btn-info btn-sm" style="color: white;"><i class="fas fa-check" style="color: white;"></i> พิมพ์ใบเสร็จ</a>
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

function link_url_to_folder()
{
  $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $pizza  = $actual_link;
  $pieces = explode("/", $pizza);
  $link_url = $pieces[0] . "/" . $pieces[1] . "/" . $pieces[2] . "/" . $pieces[3] . "/" . $pieces[4] . "/" . $pieces[5] . "/";
  return $link_url;
}

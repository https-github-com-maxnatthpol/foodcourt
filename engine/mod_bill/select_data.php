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
  } else if ($_POST['form'] == "select_div_edit_front_manage") {
    select_div_edit_front_manage();
  }
}


function select_div_edit_front_manage()
{
  $db = new DB();

  $strSQL = "SELECT mod_bill.id,mod_bill.mod_employee,mod_employee.username,mod_bill.name,mod_bill.date_come,mod_bill.total,mod_bill.status
  FROM mod_bill
  INNER JOIN mod_employee
  WHERE mod_employee.id_employee = mod_bill.mod_employee
  AND mod_bill.id  = '" . $_POST["id"] . "' ";
  $objQuery = $db->Query($strSQL);
  $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

?>

  <div class="card card-body">
    <div class="box-header with-border">
      <h3 class="box-title">แก้ไขข้อมูลบิล</h3>
    </div>
    <div class="box-body" style="padding: 0;">
      <form action="" name="form_edit" id="form_edit" method="post">
        <input type="hidden" name="form" value="form_edit">
        <input type="hidden" name="id_edit" value="<?php echo $_POST["id"] ?>">
        <div id="div_form_edit">
        </div>
        <div class="row">

          <div class="col-md-6">

            <div class="form-group">
              <label for="example-email">บิล</label>
              <input type="text" class="form-control" id="name_edit" name="name_edit" value="<?php echo $objResult["name"] ?>">
            </div>
          </div>

          <div class="col-md-6">

            <div class="form-group">
              <label for="example-email">วันเวลาที่เปิด </label>
              <?php $date = date_create($objResult["date_come"]);
              ?>
              <input type="text" class="form-control" value="<?php echo date_format($date, "d/m/Y เวลา H:i"); ?>" disabled>
            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group">
              <label for="example-email">ผู้เปิดบิล </label>
              <input type="text" class="form-control" value="<?php echo $objResult["username"] ?>" disabled>
            </div>

          </div>

        </div>
        <div class="boxsave" id="box-del-list" align="center">

          <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>

          <button type="button" class="btn btn-success  btnSendEdit" id="btnSendEdit" style="transition: 0.4s; margin-left: 5px;"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;บันทึก</button>

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
      <th>
        <!-- <input class="ClickCheckAll filled-in chk-col-light-blue" type="checkbox" name="CheckAll" id="CheckAll" value="Y" onClick="ClickCheckAll(this);"><label for="CheckAll"></label> -->#
      </th>
      <th>บิล</th>
      <th>รวม</th>
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
            <input type="checkbox" name="Chk[]" id="Chk<?php echo $num ?>" value="<?php echo $objResult['id'] ?>" class="checkbox_remove filled-in chk-col-light-blue" />
            <label for="Chk<?php echo $num ?>"></label>
          </td>
          <td>
            <?php echo $objResult["name"]; ?>
          </td>
          </td>
          <td>
            <?php echo $objResult_sum["sum_price"]; ?>
          </td>
          <td>
            <a data-toggle="modal" data-target="#modal_edit" style="<?php echo $button_update ?>" class="btn btn-warning  btn-sm edit_btn" data-id="<?php echo $objResult['id'] ?>"><i class="fa fa-edit" style="color: white;"></i></a>
            <a href="./bill_detail.php?mod_bill=<?php echo $objResult["id"]; ?>" class="btn btn-info  btn-sm"><i class="fas fa-arrow-right" style="color: white;"></i></a>
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

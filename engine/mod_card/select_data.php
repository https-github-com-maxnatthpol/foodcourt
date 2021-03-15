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
  } elseif ($_POST['form'] == "frm_select_num") {
    frm_select_num();
  }
}

function select_table_front_manage()
{

  $db = new DB();

  $button_update  = $_POST["button_update"];
  $button_delete  = $_POST["button_delete"];

  $strSQL = "SELECT * ,IF(status = 0, 'ระงับการใช้งาน', 'ใช้งานได้') AS text_status FROM `card` ORDER BY `number` ASC ";
  $objQuery = $db->Query($strSQL);

?>
  <table class="table" id="table_front_manage" width="100%">
    <thead>
      <th>หมายเลขบัตร</th>
      <th>รหัสบัตร</th>
      <th>สถานะบัตร</th>
      <th>จำนวนเงิน</th>
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
            <?php echo  $objResult["number"]; ?>
          </td>
          <td>
            <?php echo $objResult["card_number"]; ?>
          </td>
          <td>
            <?php echo $objResult["text_status"]; ?>
          </td>
          <td>
            <?php echo  $objResult["amount"]; ?>
          </td>
          <td>
            <a data-toggle="modal" data-target="#modal_edit" style="<?php echo $button_update ?>" class="btn btn-warning  btn-sm edit_btn" data-id="<?php echo $objResult['id_cashier'] ?>"><i class="fa fa-edit" style="color: white;"></i></a>

            <button type="button" class="btn btn-danger  btn-sm delete_btn" style="<?php echo $button_delete ?>" data-id="<?php echo $objResult['id_cashier'] ?>"><i class="mdi mdi-delete-empty" style="color: white;"></i></button>
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
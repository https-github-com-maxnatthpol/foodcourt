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
  $button_update  = $_POST["button_update"];
  $button_delete  = $_POST["button_delete"];
  $button_create  = $_POST["button_create"];
  $button_view    = $_POST["button_view"];
  $date = date("Y-m-d");

  $strSQL = "SELECT * FROM `mod_expenses` ORDER BY `mod_expenses`.`date_action` DESC";
  $objQuery = $db->Query($strSQL);

?>
  <table class="table" id="table_front_manage" width="100%">
    <thead>
    <th>
        #
      </th>
      <th>
        รายการ
      </th>
      <th>จ่าย</th>
      <th>เป็น</th>
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
        <?php echo $num; ?>
        </td>
        <td>
        <?php echo $objResult["name"]; ?>
        </td>
        <td>
          <?php echo $objResult["price"]; ?>
        </td>
        </td>
        <td>
          <?php 
          if($objResult["type_of_money"] == "0"){
            echo "เงินสด"; 
          } else {
            echo "เงินโอน"; 
          }         
          ?>
        </td>
        <td>
        <a data-toggle="modal" data-target="#modal_bill_check" style="<?php echo $button_update ?> color: white;" class="btn btn-success  btn-sm bill_check" data-id="<?php echo $objResult['id'] ?>"><i class="fas fa-check" style="color: white;"></i></a>
          <a href="./bill_detail.php?mod_bill=<?php echo $objResult["id"]; ?>" class="btn btn-info  btn-sm"><i class="fas fa-arrow-right" style="color: white;"></i></a>
        </td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
<?php
}

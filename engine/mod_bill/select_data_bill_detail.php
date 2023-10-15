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
  } else if ($_POST['form'] == "div_select_bill_detail") {
    div_select_bill_detail();
  } else if ($_POST['form'] == "fetch_data_table_mamu_1") {
    fetch_data_table_mamu_1();
  } else if ($_POST['form'] == "fetch_data_table_mamu_2") {
    fetch_data_table_mamu_2();
  } else if ($_POST['form'] == "fetch_data_table_mamu_5") {
    fetch_data_table_mamu_5();
  }
}


function div_select_bill_detail()
{
  $db = new DB();

  $strSQL = "SELECT mod_bill.id,mod_bill.mod_employee,mod_employee.username,mod_bill.name,mod_bill.date_come,mod_bill.total,mod_bill.status
  FROM mod_bill
  INNER JOIN mod_employee
  WHERE mod_employee.id_employee = mod_bill.mod_employee
  AND mod_bill.id = '" . $_POST["id"] . "' ";
  $objQuery = $db->Query($strSQL);
  $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

  $strSQL_sum = "SELECT mod_bill_detail.id,mod_bill_detail.mod_menu,mod_menu.name,mod_menu.price,mod_bill_detail.mod_bill,
  SUM(mod_menu.price) AS sum_price
  FROM `mod_bill_detail` 
  INNER JOIN `mod_menu` 
  WHERE mod_bill_detail.mod_menu = mod_menu.id
  AND mod_bill_detail.mod_bill = '" . $_POST['id'] . "'";
  $objQuery_sum = $db->Query($strSQL_sum);
  $objResult_sum = mysqli_fetch_array($objQuery_sum, MYSQLI_ASSOC);

?>

  <div class="ribbon-wrapper card">
    <div class="ribbon ribbon-bookmark ribbon-info"><i class="mdi mdi-calculator"></i> รายระเอียด</div>
    <div class="table-responsive">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td width="10%">บิล</td>
            <td width="40%">
              <div id='text_right'>
                <?php echo $objResult["name"] ?>
              </div>
            </td>
            <td width="10%">รวม</td>
            <td width="40%">
              <div id='text_right'>
                <?php echo $objResult_sum["sum_price"] ?>
              </div>
            </td>
          </tr>
          <tr>
            <td width="10%">วันเวลา</td>
            <td width="40%">
              <div id='text_right'>
                <?php $date = date_create($objResult["date_come"]);
                echo date_format($date, "d/m/Y เวลา H:i"); ?>
              </div>
            </td>
            <td width="10%">เปิดโดย</td>
            <td width="40%">
              <div id='text_right'>
                <?php echo $objResult["username"] ?>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

<?php
}


function select_table_front_manage()
{

  $db = new DB();

  $strSQL = "SELECT mod_bill_detail.id,mod_bill_detail.mod_menu,mod_menu.name,mod_menu.price,mod_bill_detail.mod_bill,
  COUNT(mod_bill_detail.mod_menu) AS count_mod_menu,
  SUM(mod_menu.price) AS sum_price
  FROM `mod_bill_detail` 
  INNER JOIN `mod_menu` 
  WHERE mod_bill_detail.mod_menu = mod_menu.id
  AND mod_bill_detail.mod_bill = '" . $_POST['id_mod_bill'] . "'
  GROUP BY mod_bill_detail.mod_menu
  ORDER BY mod_bill_detail.date_action ASC
  ;";

  $objQuery = $db->Query($strSQL);

?>
  <table class="table" id="table_front_manage" width="100%">
    <thead>
      <th>รายการ</th>
      <th>จำนวน</th>
      <th>ราคา</th>
      <th>ลบ</th>
    </thead>
    <tbody>
      <?php
      while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
      ?>
        <tr>
          <td>
            <?php echo $objResult["name"]; ?>
          </td>
          <td>
            <?php echo $objResult["count_mod_menu"]; ?>
          </td>
          <td>
            <?php echo $objResult["sum_price"]; ?>
          </td>
          <td>
            <?php $id_mod_bill_detail = $objResult["id"]; ?>
            <button type="button" class="btn btn-danger  btn-sm" name="btndelbilldetail" onclick="delbilldetail('<?php echo $id_mod_bill_detail; ?>')"><i class="fas fas fa-ban" style="color: white;"></i></button>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
<?php
}

function fetch_data_table_mamu_1()
{

  $db = new DB();

  $strSQL = "SELECT `id`,`name`, `price`,`status`, `mod_stock_type` , `mod_employee` 
  FROM `mod_menu` 
  WHERE `status`='1'
  AND `mod_stock_type`='1'
  ORDER BY `date_action` ASC;
  ";
  $objQuery = $db->Query($strSQL);

?>
  <table class="table" id="table_fetch_data_table_mamu_1" width="100%">
    <tbody>
    <tr>
        <td>
          รายการ
        </td>
        <td>
          ราคา
        </td>
        <td>
          จัดการ
        </td>
      </tr>
      <?php
      $id_menu = 0;
      while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
      ?>
        <tr>
          <td>
            <?php echo $objResult["name"]; ?>
          </td>
          <td>
            <?php echo $objResult["price"]; ?>
          </td>
          <td>
            <?php $id_menu = $objResult["id"]; ?>
            <button type="button" class="btn btn-info  btn-sm" name="btnSendManu" onclick="SendManu('<?php echo $id_menu; ?>')"><i class="fas fa-arrow-right" style="color: white;"></i></button>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
<?php
}

function fetch_data_table_mamu_2()
{

  $db = new DB();

  $strSQL = "SELECT `id`,`name`, `price`,`status`, `mod_stock_type` , `mod_employee` 
  FROM `mod_menu` 
  WHERE `status`='1'
  AND `mod_stock_type`='2'
  ORDER BY `date_action` ASC;
  ";
  $objQuery = $db->Query($strSQL);

?>
  <table class="table" id="table_fetch_data_table_mamu_2" width="100%">
    <tbody>
      <tr>
        <td>
          รายการ
        </td>
        <td>
          ราคา
        </td>
        <td>
          จัดการ
        </td>
      </tr>
      <?php
      $id_menu = 0;
      while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
      ?>
        <tr>
          <td>
            <?php echo $objResult["name"]; ?>
          </td>
          <td>
            <?php echo $objResult["price"]; ?>
          </td>
          <td>
            <?php $id_menu = $objResult["id"]; ?>
            <button type="button" class="btn btn-info  btn-sm" name="btnSendManu" onclick="SendManu('<?php echo $id_menu; ?>')"><i class="fas fa-arrow-right" style="color: white;"></i></button>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
<?php
}

function fetch_data_table_mamu_5()
{

  $db = new DB();

  $strSQL = "SELECT `id`,`name`, `price`,`status`, `mod_stock_type` , `mod_employee` 
  FROM `mod_menu` 
  WHERE `status`='1'
  AND `mod_stock_type`='5'
  ORDER BY `date_action` ASC;
  ";
  $objQuery = $db->Query($strSQL);

?>
  <table class="table" id="table_fetch_data_table_mamu_5" width="100%">
    <tbody>
    <tr>
        <td>
          รายการ
        </td>
        <td>
          ราคา
        </td>
        <td>
          จัดการ
        </td>
      </tr>
      <?php
      $id_menu = 0;
      while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
      ?>
        <tr class="show-tr">
          <td>
            <?php echo $objResult["name"]; ?>
          </td>
          <td>
            <?php echo $objResult["price"]; ?>
          </td>
          <td>
            <?php $id_menu = $objResult["id"]; ?>
            <button type="button" class="btn btn-info  btn-sm" name="btnSendManu" onclick="SendManu('<?php echo $id_menu; ?>')"><i class="fas fa-arrow-right" style="color: white;"></i></button>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
<?php
}

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
  } else if ($_POST['form'] == "select_div_edit_front_manage") {
    select_div_edit_front_manage();
  } else if ($_POST['form'] == "select_div_transfer_front_manage") {
    select_div_transfer_front_manage();
  } else if ($_POST['form'] == "select_div_transfer_number_from") {
    select_div_transfer_number_from();
  } else if ($_POST['form'] == "select_div_transfer_number_to") {
    select_div_transfer_number_to();
  }
}

function select_div_transfer_number_from()
{
  $db = new DB();
  header('Content-Type: application/json');

  $card_number = $db->clear($_POST["card_number"]);

  $sql = "SELECT `amount` FROM card WHERE card_number = '$card_number'  limit 1 ";
  $query = $db->Query($sql);
  $result = mysqli_fetch_array($query);

  if ($result > 0) {
    echo json_encode(array('status' => '1', 'message' => $result[0]));
  } else {
    echo json_encode(array('status' => '0', 'message' => 'ผิดพลาด'));
  }
}

function select_div_transfer_number_to()
{
  $db = new DB();
  header('Content-Type: application/json');

  $card_number = $db->clear($_POST["card_number"]);

  $sql = "SELECT `amount` FROM card WHERE card_number = '$card_number'  limit 1 ";
  $query = $db->Query($sql);
  $result = mysqli_fetch_array($query);

  if ($result > 0) {
    echo json_encode(array('status' => '1', 'message' => $result[0]));
  } else {
    echo json_encode(array('status' => '0', 'message' => 'ผิดพลาด'));
  }
}

function select_table_front_manage()
{

  $db = new DB();

  $button_update  = $_POST["button_update"];
  $button_delete  = $_POST["button_delete"];

  $strSQL = "SELECT * ,IF(status = 0, 'ระงับการใช้งาน', 'ใช้งานได้') AS text_status FROM `card` ORDER BY `number` DESC ";
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
            <?php echo  str_pad($objResult["number"], 4, "0", STR_PAD_LEFT); ?>
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
            <a data-toggle="modal" data-target="#modal_edit" style="<?php echo $button_update ?>" class="btn btn-warning  btn-sm edit_btn" data-id="<?php echo $objResult['id'] ?>"><i class="fa fa-edit" style="color: white;"></i></a>
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

function select_div_transfer_front_manage()
{
  $db = new DB();
?>

  <div class="card card-body">
    <div class="box-header with-border">
      <h3 class="box-title">โอนเงินในบัตร</h3>

    </div>
    <div class="box-body" style="padding: 0;">
      <form action="" name="form_transfer" id="form_transfer" method="post">
        <input type="hidden" name="form" value="form_transfer">
        <div id="div_form_transfer">
          <div class="row">

            <div class="col-md-6">
              <div class="card card-body">
                <h3 class="box-title m-b-0">จากบัตร</h3>
                <p class="text-muted m-b-30 font-13">จากบัตรที่ต้องการโอน</p>
                <div class="row">
                  <div class="col-sm-12 col-xs-12">

                    <div class="form-group">
                      <label for="example-email">หมายเลขบัตร </label>
                      <select class="select2" id="number_from" name="number_from">
                      <option value="" selected>---กรุณาเลือกบัตร---</option>
                        <?php
                        $strSQL_from = "SELECT `card_number`,`number` FROM `card` ORDER BY `number` ASC";
                        $objQuery_from = $db->Query($strSQL_from);
                        while ($objResult_from = mysqli_fetch_array($objQuery_from, MYSQLI_ASSOC)) {
                          echo "<option value='" . $objResult_from["card_number"] . "'>" . str_pad($objResult_from["number"], 4, "0", STR_PAD_LEFT) . "</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="example-email">จำนวนเงิน</label>
                      <input type="number" class="form-control" id="amount_from" name="amount_from" placeholder="กรอกจำนวนเงิน" value="">
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="card card-body">
                <h3 class="box-title m-b-0">ไปที่บัตร</h3>
                <p class="text-muted m-b-30 font-13">ไปที่บัตรที่ต้องการโอน</p>
                <div class="row">
                  <div class="col-sm-12 col-xs-12">

                    <div class="form-group">
                      <label for="example-email">หมายเลขบัตร </label>
                      <select class="form-control select2" id="number_to" name="number_to">
                      <option value="" selected>---กรุณาเลือกบัตร---</option>
                        <?php
                        $strSQL_to = "SELECT `card_number`,`number` FROM `card` ORDER BY `number` ASC";
                        $objQuery_to = $db->Query($strSQL_to);
                        while ($objResult_to = mysqli_fetch_array($objQuery_to, MYSQLI_ASSOC)) {
                          echo "<option value='" . $objResult_to["card_number"] . "'>" . str_pad($objResult_to["number"], 4, "0", STR_PAD_LEFT) . "</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="example-email">จำนวนเงิน</label>
                      <input type="number" class="form-control" id="amount_to" name="amount_to" value="0" disabled>
                    </div>

                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
    </div>

    <div class="boxsave" id="box-del-list" align="center">

      <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>

      <button type="button" class="btn btn-success  btnSendtransfer" id="btnSendtransfer" style="transition: 0.4s; margin-left: 5px;"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;บันทึก</button>

    </div>

  </div>

  </form>
  <script type="text/javascript">
    $(".select2").select2({
      width: '100%'
    });
  </script>

<?php
}

function select_div_edit_front_manage()
{
  $db = new DB();

  $strSQL = "SELECT * ,IF(status = 0, 'ระงับการใช้งาน', 'ใช้งานได้') AS text_status FROM `card`
             WHERE id = '" . $_POST["id"] . "';
             ";
  $objQuery = $db->Query($strSQL);
  $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

?>

  <div class="card card-body">
    <div class="box-header with-border">
      <h3 class="box-title">แก้ไขข้อมูลบัตร</h3>

    </div>
    <div class="box-body" style="padding: 0;">
      <form action="" name="form_edit" id="form_edit" method="post">
        <input type="hidden" name="form" value="form_edit">
        <input type="hidden" name="id" value="<?php echo $_POST["id"] ?>">
        <div id="div_form_edit">
          <div class="row">

            <div class="col-md-3">

              <div class="form-group">
                <label for="example-email">หมายเลขบัตร </label>
                <input type="text" class="form-control" id="number" name="number" placeholder="กรอกหมายเลขบัตร" value="<?= $objResult['number']; ?>">
              </div>

            </div>

            <div class="col-md-9">

              <div class="form-group">
                <label for="example-email">รหัสบัตร </label>
                <input type="text" class="form-control" id="card_number" name="card_number" placeholder="กรอกรหัสบัตร" value="<?= $objResult['card_number']; ?>">
              </div>

            </div>

            <div class="col-md-3">

              <div class="form-group">
                <label for="example-email">สถานะบัตร </label>
                <select class="form-control" id="status" name="status">
                  <?php
                  if ($objResult['status'] == 1) {
                    echo "<option value='1' selected>ใช้งานได้</option>";
                    echo "<option value='1'>ระงับการใช้งาน</option>";
                  } elseif ($objResult['status'] == 0) {
                    echo "<option value='1'>ใช้งานได้</option>";
                    echo "<option value='1' selected>ระงับการใช้งาน</option>";
                  }
                  ?>
                </select>
              </div>

            </div>

            <div class="col-md-3">

              <div class="form-group">
                <label for="example-email">จำนวนเงินในบัตร </label>
                <input type="text" class="form-control" id="amount" name="amount" value="<?= $objResult['amount']; ?>" disabled>
              </div>

            </div>

          </div>

        </div>
    </div>

    <div class="boxsave" id="box-del-list" align="center">

      <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>

      <button type="button" class="btn btn-success  btnSendAdd" id="btnSendEdit" style="transition: 0.4s; margin-left: 5px;"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;บันทึก</button>

    </div>

  </div>

  </form>
  </div>
  </div>
  </div>
  <script type="text/javascript">
    $(".dropify").dropify({
      messages: {
        //          default: "Drag and drop a file here or click",
        default: "<span style='font-size: 16px; font-family: Sarabun, sans-serif;'>ลากและวางไฟล์ที่นี่หรือคลิก</span>",
        //          replace: "Drag and drop or click to replace",
        replace: "<span style='font-size: 14px; font-family: Sarabun, sans-serif;'>ลากและวางหรือคลิกเพื่อแทนที่</span>",
        //          remove: "Remove",
        remove: "<span style='font-size: 13px; font-family: Sarabun, sans-serif;'>ลบออก</span>",
        error: "อ๊ะมีบางอย่างผิดปกติเกิดขึ้น"
        //		  error: "Ooops, something wrong happended."	
      },
      tpl: {
        message: '<div class="dropify-message" ><span class="file-icon" /> <p style="text-align: center;">{{ default }}</p></div>'
      }
    });

    // Used events
    var drEvent = $('#input-file-events').dropify();

    drEvent.on('dropify.beforeClear', function(event, element) {
      return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });

    drEvent.on('dropify.afterClear', function(event, element) {
      alert('File deleted');
    });

    drEvent.on('dropify.errors', function(event, element) {
      console.log('Has Errors');
    });

    var drDestroy = $('#input-file-to-destroy').dropify();
    drDestroy = drDestroy.data('dropify')
    $('#toggleDropify').on('click', function(e) {
      e.preventDefault();
      if (drDestroy.isDropified()) {
        drDestroy.destroy();
      } else {
        drDestroy.init();
      }
    })
  </script>
<?php
}

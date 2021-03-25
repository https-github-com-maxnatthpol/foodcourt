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
        <input type="hidden" name="id_edit" value="<?php echo $_POST["id"] ?>">
        <div id="div_form_edit">
          <div class="row">

            <div class="col-md-3">

              <div class="form-group">
                <label for="example-email">หมายเลขบัตร </label>
                <input type="text" class="form-control" id="number" name="number" placeholder="กรอกหมายเลขบัตร" value="<?=$objResult['number'];?>">
              </div>

            </div>

            <div class="col-md-9">

              <div class="form-group">
                <label for="example-email">รหัสบัตร </label>
                <input type="text" class="form-control" id="card_number_1" name="card_number" placeholder="กรอกรหัสบัตร" value="<?=$objResult['card_number'];?>">
              </div>

            </div>

            <div class="col-md-3">

              <div class="form-group">
                <label for="example-email">สถานะบัตร </label>
                <select class="form-control">
                <option>1</option>
                <option>2</option>
                </select>
              </div>

            </div>

            <div class="col-md-3">

              <div class="form-group">
                <label for="example-email">จำนวนเงินในบัตร </label>
                <input type="text" class="form-control" id="card_number_1" name="card_number"  value="<?=$objResult['amount'];?>" disabled>
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

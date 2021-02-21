<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';


if (isset($_POST['form'])) {
//    if ($_POST['form']=="select_table_class_schedule") {
//        select_table_class_schedule();
//    } 
	if ($_POST['form']=="select_div_edit_front_manage") {
        select_div_edit_front_manage();
    } elseif ($_POST['form']=="select_div_address") {
        select_div_address();
    } elseif ($_POST['form']=="fetch_pang_front_product_manage") {
        fetch_pang_front_product_manage();
    } elseif ($_POST['form']=="div_table_list_content") {
        div_table_list_content();
    } elseif ($_POST['form']=="select_table_course_quiz") {
        select_table_course_quiz();
    } elseif ($_POST['form']=="div_table_list_course_question") {
        div_table_list_course_question();
    } elseif ($_POST['form']=="select_div_edit_question") {
        select_div_edit_question();
    } elseif ($_POST['form']=="div_table_list_course") {
        div_table_list_course();
    } 
//	elseif ($_POST['form']=="div_reviwe") {
//        div_reviwe();
//    } 
	elseif ($_POST['form']=="AVG_score") {
        AVG_score();
    } elseif ($_POST['form']=="div_reviwe_group") {
        div_reviwe_group();
    }
} else {
}

function div_reviwe_group()
{

}

function AVG_score()
{

}

function fetch_pang_front_product_manage()
{
    $db = new DB();
    header('Content-Type: application/json');

    $strSQL = "SELECT product.id_product,product.name_product,product.name_product_en,product.product_code,product.material,product.material_en,product.surface,product.surface_en,product.detail_product,product.detail_product_en,product.id_catagory,product.date_add,product.date_edit,product.view,product.view_portfolio
	FROM product
    WHERE delete_datetime IS null AND id_product = '".$_POST["id_product"]."'";
    $objQuery = $db->Query($strSQL);
    $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

    $sql = "SELECT id_image,`name_image`,`date_image` FROM `product_image` WHERE `id_product` = '".$_POST["id_product"]."' ";
    $query = $db->Query($sql);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if ($objResult) {
        echo json_encode(array('name_th' => $objResult["name_product"],'name_en' => $objResult["name_product_en"],'product_code' => $objResult["product_code"],'material' => $objResult["material"],'material_en' => $objResult["material_en"],'surface' => $objResult["surface"],'surface_en' => $objResult["surface_en"],'detail_product' => $objResult["detail_product"],'detail_product_en' => $objResult["detail_product_en"],'id_catagory' => $objResult["id_catagory"],'view_show' => $objResult["view"],'view_portfolio' => $objResult["view_portfolio"],'name_image' => $result["name_image"],'date_image' => $result["date_image"],'id_image' => $result["id_image"]));
    } else {
        echo json_encode(array('status' => '1','message'=> 'ไม่สำเร็จ'));
    }
}


function select_div_address()
{
    $db = new DB();

    $strSQL = "SELECT `id_address`,`address`,`district`,`amphur`,`province`,`postcode` FROM `user_address` WHERE `id_user`= '".$_POST["id"]."' AND `status` = '4'  ";
    $objQuery = $db->Query($strSQL);
    $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC); ?>

<div class="card card-body" >
          <div class="box-header with-border">
            <h3 class="box-title">ที่อยู่สำหรับออกใบเสร็จ ( <?php echo $_POST["name"] ?> )</h3>
            


          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="form_address" id="form_address" method="post">
              <input type="hidden" name="form" value="form_address">
              <input type="hidden" name="id_edit" value="<?php echo $_POST["id"] ?>">
              <input type="hidden" name="id_address" value="<?php echo $objResult["id_address"] ?>">
              <div id="div_form_edit">
                  
                <div class="row"> 
                  <div class="col-md-12" >

                    <div class="form-group">
                      <label for="example-email">ที่อยู่ </label>
                      <input type="text" class="form-control  iconified" name="address" id="address" placeholder="ที่อยู่" value="<?php echo $objResult["address"] ?>">
                    </div>

                  </div>

                  <div class="col-md-6" >

                    <div class="form-group">
                      <label for="example-email">ตำบล </label>
                      <input type="text" class="form-control  iconified" name="district" id="district" placeholder="ตำบล" value="<?php echo $objResult["district"] ?>">
                    </div>

                    <div class="form-group">
                      <label for="example-email">จังหวัด </label>
                      <input type="text" class="form-control  iconified" name="province" id="province" placeholder="จังหวัด" value="<?php echo $objResult["province"] ?>">
                    </div>

                  </div>

                  <div class="col-md-6" >

                    <div class="form-group">
                      <label for="example-email">อำเภอ </label>
                      <input type="text" class="form-control  iconified" name="amphures" id="amphures" placeholder="อำเภอ" value="<?php echo $objResult["amphur"] ?>">
                    </div>

                    <div class="form-group">
                      <label for="example-email">รหัสไปรษณีย์ </label>
                      <input type="text" class="form-control  iconified" name="zip_code" id="zip_code" placeholder="รหัสไปรษณีย์" value="<?php echo $objResult["postcode"] ?>">
                    </div>

                  </div>
                 

                  </div>

                </div>
                  

              </div> 
              <div class="boxsave" id="box-del-list" align="center">

                <button   type="button" class="btn btn-success  btnSendaddress" id="btnSendaddress" style="transition: 0.4s; margin-left: 5px;" ><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;บันทึก</button>

                <button type = "button" class = "btn btn-default" data-dismiss = "modal">ปิด</button>


              </div>  
            </form>
          </div>
        </div>
      </div>
<script type="text/javascript">
  $(function () {
        $.Thailand({
            $district: $('#district'), // input ของตำบล
            $amphoe: $('#amphures'), // input ของอำเภอ
            $province: $('#province'), // input ของจังหวัด
            $zipcode: $('#zip_code'), // input ของรหัสไปรษณีย์
        });
    });
</script>
 <?php
}


function select_div_edit_front_manage()
{
    $db = new DB();

    $strSQL = "SELECT user_images.directory,user_images.name AS name_img,partner.`name_th`,partner.`tax_id`,partner.`email`,partner.`telephone`,partner.`detail_th`,partner.`reward_rate`  FROM `partner` 
LEFT JOIN user_images ON user_images.id_user=partner.id_partner AND user_images.type = '4'
WHERE partner.`id_partner` = '".$_POST["id"]."' ";
    $objQuery = $db->Query($strSQL);
    $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

    

    if ($objResult["name_img"] == '') {
        $image = "";
    } else {
        $image = "data-default-file='".$objResult["directory"].$objResult["name_img"]."'";
    }
  

    function txtFormat($text, $pattern, $ex)
    {
        $cid = $text  ;
        $pattern = $pattern;
        $p = explode('-', $pattern);
        $ex = $ex ;
        $first = 0;
        $rest = '';
        for ($i=0;$i<count($p);$i++) {
            $rest .= substr($cid, 0, strlen($p[$i])).$ex;
        }
        return $rest1 = substr($rest, 0, -1);
    } ?>
<link rel="stylesheet" href="../../plugins_b/dropify/dist/css/dropify.min.css">
<link href="../../plugins_b/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<div class="card card-body" >
          <div class="box-header with-border">
            <h3 class="box-title">แก้ไขลูกค้า</h3>
            


          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="form_edit" id="form_edit" method="post">
              <input type="hidden" name="form" value="form_edit">
              <input type="hidden" name="id_edit" value="<?php echo $_POST["id"] ?>">
              <div id="div_form_edit">
                  <div class="form-group col-md-12">
                      <div class="card">
                        <div class="card-body ">
                          <label for="input-file-now">รูปภาพ</label>
                          <input accept="image/*" type="file" id="name_img_edit" class="dropify" name="name_img" <?php echo $image ?> />
                          <input type="hidden" name="directory_ed" value="<?php echo $objResult["directory"].$objResult["name_img"] ?>">
                          <input type="hidden" name="name_img_ed" value="<?php echo $objResult["name_img"] ?>">
                        </div>
                      </div>
                    </div>
                <div class="row"> 
                  <div class="col-md-12" >

                    <div class="form-group">
                      <label for="example-email">ชื่อ </label>
                      <input  type="text" class="form-control" id="name_edit" name="name"  value="<?php echo $objResult["name_th"] ?>">
                    </div>

                  </div>
                  <div class="col-md-6" >

                    <div class="form-group">
                      <label for="example-email">เลขที่บัตรประชาชน / เลขประจำตัวผูเสียภาษี </label>
                      <input maxlength="18" OnKeyPress="check_format('id_cade_edit')"  type="text" class="form-control" id="id_cade_edit" name="id_cade"  pattern="[0-9]{1}-[0-9]{4}-[0-9]{3}-[0-9]{1}-[0-9]{1}-[0-9]{3}"    placeholder="9-9999-999-9-9-999" value="<?php echo txtFormat($objResult["tax_id"], '_-____-___-_-_-___', '-'); ?>" required>
                    </div>

                    <div class="form-group">
                      <label for="example-email">E-mail </label>
                      <input onchange="check_email('<?php echo $_POST["id"] ?>')"  type="email" class="form-control" id="e_mail_edit" name="e_mail" placeholder="example@example.com" value="<?php echo $objResult["email"] ?>"  required>
                      <label for="example-email" id="warning_email_edit" style="color: red; display: none;">คำเตือน : E-mail นี้มีผู้ใช้งานแล้ว</label>
                    </div>

                  </div>

                  <div class="col-md-6" >

                   

                    <div class="form-group">
                      <label for="example-email">อัตราผลตอบแทน (%) </label>
                      <input maxlength="3" type="text" class="form-control" id="rate_edit" name="rate"  OnKeyPress="return check_num(this)" value="<?php echo $objResult["reward_rate"] ?>">
                    </div>

                    <div class="form-group">
                      <label for="example-email">เบอร์โทร </label>
                      <input maxlength="12" OnKeyPress="check_format('telaphone_edit')" type="tel" class="form-control" id="telaphone_edit" name="telaphone" pattern="[0-9]{3}-[0-9]{4}-[0-9]{3}"   placeholder="999-9999-999" value="<?php echo $objResult["telephone"] ?>"  required>
                    </div>

                  </div>
                  <div class="col-md-12" >

                    <div class="form-group" id="editor" style="margin-top: 10px;">
                      <label for="example-email">รายละเอียด</label>
                      <textarea class='edit' name="detail" style="margin-top: 20px;"><?php echo $objResult["detail_th"] ?></textarea>
                    </div>

                  </div>

                </div>
                    </div>

              </div> 
              <div class="boxsave" id="box-del-list" align="center">

                <button   type="button" class="btn btn-success  btnSendAdd" id="btnSendEdit" style="transition: 0.4s; margin-left: 5px;" ><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;บันทึก</button>

                <button type = "button" class = "btn btn-default" data-dismiss = "modal">ปิด</button>


              </div>  
            </form>
          </div>
        </div>
      </div>
<script type="text/javascript">
  $(function() {
          $('.edit').froalaEditor({
            language: 'ar',
            heightMin: 300,
            heightMax: 400,
            imageUploadURL:"froala_upload_image.php",
            imageUploadParam:"fileName",
            imageManagerLoadMethod:"GET",
            imageManagerLoadURL:"../../plugins_b/page_froala/select.php",
            imageManagerDeleteURL:"page_froala/froala_delete_image.php",
            imageManagerDeleteMethod:"POST",
            // video
            videoUploadURL: 'froala_upload_video.php',
            videoUploadParam: 'fileName',
            videoUploadMethod: 'POST',
            videoMaxSize: 50 * 1024 * 1024,
            videoAllowedTypes: ['mp4', 'webm', 'jpg', 'ogg'],

            fileUploadURL: 'froala_upload_file.php',
            fileUploadParam: 'fileName',
            fileUploadMethod: 'POST',
            fileMaxSize: 20 * 1024 * 1024,
            fileAllowedTypes: ['*'],
          }).on('froalaEditor.image.uploaded', function (e, editor, response) {
            console.log(response);
          }).on('froalaEditor.imageManager.beforeDeleteImage', function (e, editor, $img) {
            console.log($img);
          }).on('froalaEditor.imageManager.imageDeleted', function (e, editor, res) {
            console.log(res);
          }).on('froalaEditor.video.beforeUpload', function (e, editor, videos) {
            console.log("beforeUpload");
          }).on('froalaEditor.video.uploaded', function (e, editor, response) {
            console.log("uploaded");
          }).on('froalaEditor.video.inserted', function (e, editor, $img, response) {
            console.log(response);
          }).on('froalaEditor.video.replaced', function (e, editor, $img, response) {
            console.log("replaced");
          }).on('froalaEditor.video.error', function (e, editor, error, response) {
            console.log("error");
          }).on('froalaEditor.file.beforeUpload', function (e, editor, files) {
            console.log("beforeUpload");
          }).on('froalaEditor.file.uploaded', function (e, editor, response) {
            console.log("uploaded");
          }).on('froalaEditor.file.inserted', function (e, editor, $file, response) {
            console.log("inserted");
          }).on('froalaEditor.file.error', function (e, editor, error, response) {
            console.log("error");
          }).on('froalaEditor.video.beforeRemove', function (e, editor, $video) {
             // Catch video remove innerHTML
            src=$($('.edit').froalaEditor('selection.element')).find('video').attr('src');
            console.log(src);
            $.ajax({
                // Request method.
                method: "POST",
                // Request URL.
                url: "froala_delete_image.php",
                // Request params.
                data: {
                    src: src
                }
            })
            .done(function (data) {
                console.log('video was deleted')
            })
            .fail(function () {
                console.log('video delete problem')
            })
          }).on('froalaEditor.video.removed', function (e, editor, $video) {
              console.log("video remove");
          }).on('froalaEditor.image.removed', function (e, editor, $img) {
             
            // Catch image remove
            $.ajax({
                // Request method.
                method: "POST",
                // Request URL.
                url: "froala_delete_image.php",
                // Request params.
                data: {
                    src: $img.attr('src')
                }
            })
            .done(function (data) {
                console.log('image was deleted')
            })
            .fail(function () {
                console.log('image delete problem')
            })
          }).on('froalaEditor.file.unlink', function (e, editor, $file) {
            src=$file.getAttribute('href');
            // Catch image remove
            $.ajax({
                // Request method.
                method: "POST",
                // Request URL.
                url: "froala_delete_image.php",
                // Request params.
                data: {
                    src: src
                }
            })
            .done(function (data) {
                console.log('file was deleted')
            })
            .fail(function () {
                console.log('file delete problem')
            })
          });

      });

  $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
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
    });
</script>
<?php
}


function div_table_list_content()
{
    $db = new DB();

    $button_update  = $_POST["button_update"];
    $button_delete  = $_POST["button_delete"];
    $button_create   = $_POST["button_create"];
    $button_view   = $_POST["button_view"];
    $id_lesson = $db->clear($_POST["id_lesson"]);



    $strSQL = "SELECT  course_subject.total_time, course_subject.`id_subject`,course_subject.`name_th`,course_subject.`name_en`,course_subject.`order` ,course_images.file_type,course_subject.link_video,course_subject.link_reference,course_images.name,course_images.directory,course_images.id_image
  FROM `course_subject` 
  LEFT JOIN course_images ON  course_subject.id_subject=course_images.id_course
  WHERE  course_subject.`delete_datetime` IS null AND course_subject.`id_lesson` = '".$id_lesson."' ";
    $objQuery = $db->Query($strSQL); ?>
<H3></H3>
  <table class="table" id="table_list_content" width="100%" >
    <thead >
      <th >
        <input class="ClickCheckAll filled-in chk-col-light-blue" type="checkbox" name="CheckAll_content" id="CheckAll_content" value="Y" onClick="ClickCheckAll_content(this);"><label for="CheckAll_content"></label>
      </th>
      <th width="20%">ลำดับ</th>
      <th >รายการเนื้อหา</th>
      <th>รูปแบบข้อมูล</th>
      <th >จัดการ</th>
    </thead>
    <tbody>
<?php
  $num=0;
    while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
        $num++; ?>
      <tr class="show-tr_content">
        <td>
          <input type="checkbox" name="Chk_content[]" id="Chk_content<?php echo $num ?>" value="<?php echo $objResult['id_subject'] ?>" class="checkbox_remove_content filled-in chk-col-light-blue" /><label for="Chk_content<?php echo $num ?>"></label>
        </td>
        <td>
          <input onchange="order_chanhe_content(<?php echo $num ?>)" class="form-control" type="number" name="order" id="order_content<?php echo $num ?>" value="<?php echo  $objResult['order'] ?>">
          <input  class="form-control" type="hidden" name="id" id="id_content<?php echo $num ?>" value="<?php echo  $objResult['id_subject'] ?>"><font style="display: none;"><?php echo  $objResult['order'] ?></font>
          
        </td>
        <td>
          <?php echo $objResult["name_th"] ?>
        </td>
        <td>
          <?php echo $objResult["file_type"] ?>
        </td>
        <td>
          <a  style="<?php echo $button_update ?>"  class="btn btn-warning  btn-sm edit_btn_content" data-id="<?php echo $objResult['id_subject'] ?>" data1-id="<?php echo $objResult['name_th'] ?>" data2-id="<?php echo $objResult['name_en'] ?>" data3-id="<?php echo $objResult['link_video'] ?>" data4-id="<?php echo $objResult['link_reference'] ?>" data5-id="<?php echo $objResult['name'] ?>" data6-id="<?php echo $objResult['directory'] ?>" data7-id="<?php echo $objResult['id_image'] ?>" data8-id="<?php echo $objResult['total_time'] ?>"   ><i class="fa fa-edit"></i></a>

          <button type="button" class="btn btn-danger  btn-sm delete_btn_content" style="<?php echo $button_delete ?>" data-id="<?php echo $objResult['id_subject'] ?>"><i class="mdi mdi-delete-empty" style="color: white;"></i></button>



        </td>
      </tr>
<?php
    } ?>      
    </tbody>
  </table>
  <input type="hidden" name="hdnCount_content" value="<?php echo $num ?>">
<?php
}


function select_table_course_quiz()
{
    $db = new DB();

    $button_update  = $_POST["button_update"];
    $button_delete  = $_POST["button_delete"];
    $button_create   = $_POST["button_create"];
    $button_view   = $_POST["button_view"];
    $id_course   = $_POST["id_course"];



    $strSQL = "SELECT `id_quiz`,`name_th`, `name_en`, `pass_new_flg`, `pass_new_number`, `fail_new_flg`, `fail_new_number`, `random_flg`, `exam_number` FROM `course_quiz` WHERE  `delete_datetime` IS null AND `id_course`  = '".$id_course."' ";
    $objQuery = $db->Query($strSQL); ?>
<H3></H3>
  <table class="table" id="table_course_quiz" width="100%" >
    <thead >
      <th >
        <input class="ClickCheckAll filled-in chk-col-light-blue" type="checkbox" name="CheckAll_quiz" id="CheckAll_quiz" value="Y" onClick="ClickCheckAll_quiz(this);"><label for="CheckAll_quiz"></label>
      </th>
      <th width="20%">ลำดับ</th>
      <th >ชื่อข้อสอบ</th>
      <th>รูปแบบคำถาม</th>
      <th >จัดการ</th>
    </thead>
    <tbody>
<?php
  $num=0;
    while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
        $num++; ?>
      <tr class="show-tr_quiz">
        <td>
          <input type="checkbox" name="Chk_quiz[]" id="Chk_quiz<?php echo $num ?>" value="<?php echo $objResult['id_quiz'] ?>" class="checkbox_remove_quiz filled-in chk-col-light-blue" /><label for="Chk_quiz<?php echo $num ?>"></label>
        </td>
        <td>
          <?php echo $num ?>
        </td>
        <td>
          <?php echo htmlspecialchars_decode($objResult["name_th"]) ?>
        </td>
        <td>
          <?php if ($objResult["random_flg"]=='1') {
            echo "สุ่มคำถาม";
        } else {
            echo "เรียงตามลำดับ";
        } ?>
        </td>
        <td>
          <a  style="<?php echo $button_update ?>"  class="btn btn-warning  btn-sm edit_btn_quiz" data-id="<?php echo $objResult['id_quiz'] ?>" data1-id="<?php echo $objResult['name_th'] ?>" data2-id="<?php echo $objResult['name_en'] ?>" data3-id="<?php echo $objResult['pass_new_flg'] ?>" data4-id="<?php echo $objResult['pass_new_number'] ?>" data5-id="<?php echo $objResult['fail_new_flg'] ?>"  data6-id="<?php echo $objResult['fail_new_number'] ?>" data7-id="<?php echo $objResult['random_flg'] ?>" data8-id="<?php echo $objResult['exam_number'] ?>"   ><i class="fa fa-edit"></i></a>

          <a  style="color: #FFFCFC;  <?php echo $button_create ?>"  class="btn btn-info  btn-sm course_question_btn" data-id="<?php echo $objResult['id_quiz'] ?>"  data1-id="<?php echo $objResult["name_th"] ?>" >คำถาม</a>

          <button type="button" class="btn btn-danger  btn-sm delete_btn_quiz" style="<?php echo $button_delete ?>" data-id="<?php echo $objResult['id_quiz'] ?>"><i class="mdi mdi-delete-empty" style="color: white;"></i></button>



        </td>
      </tr>
<?php
    } ?>      
    </tbody>
  </table>
  <input type="hidden" name="hdnCount_quiz"  value="<?php echo $num ?>">
<?php
}


function div_table_list_course_question()
{
    $db = new DB();

    $button_update  = $_POST["button_update"];
    $button_delete  = $_POST["button_delete"];
    $button_create   = $_POST["button_create"];
    $button_view   = $_POST["button_view"];
    $id_quiz = $db->clear($_POST["id_quiz"]);



    $strSQL = "SELECT `id_question`,`messages_th`,`type_answer`,`order` FROM `course_question` WHERE `id_quiz`='".$id_quiz."' AND `delete_datetime` IS null ";
    $objQuery = $db->Query($strSQL); ?>
<H3></H3>
  <table class="table" id="table_list_question" width="100%" >
    <thead >
      <th >
        <input class="ClickCheckAll filled-in chk-col-light-blue" type="checkbox" name="CheckAll_question" id="CheckAll_question" value="Y" onClick="ClickCheckAll_question(this);"><label for="CheckAll_question"></label>
      </th>
      <th width="20%">ลำดับ</th>
      <th >รายการคำถาม</th>
      <th>รูปแบบคำตอบ</th>
      <th >จัดการ</th>
    </thead>
    <tbody>
<?php
  $num=0;
    while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
        $num++; ?>
      <tr class="show-tr_question">
        <td>
          <input type="checkbox" name="Chk_question[]" id="Chk_question<?php echo $num ?>" value="<?php echo $objResult['id_question'] ?>" class="checkbox_remove_question filled-in chk-col-light-blue" /><label for="Chk_question<?php echo $num ?>"></label>
        </td>
        <td>
          <input onchange="order_chanhe_question(<?php echo $num ?>)" class="form-control" type="number" name="order" id="order_content<?php echo $num ?>" value="<?php echo  $objResult['order'] ?>">
          <input  class="form-control" type="hidden" name="id" id="id_content<?php echo $num ?>" value="<?php echo  $objResult['id_question'] ?>"><font style="display: none;"><?php echo  $objResult['order'] ?></font>
          
        </td>
        <td>
          <?php echo htmlspecialchars_decode($objResult["messages_th"]) ?>
        </td>
        <td>
          <?php
            if ($objResult["type_answer"]=='1') {
                echo "choice";
            } elseif ($objResult["type_answer"]=='2') {
                echo "checkbox";
            } elseif ($objResult["type_answer"]=='3') {
                echo "Text (Single line)";
            } elseif ($objResult["type_answer"]=='4') {
                echo "Text (multi line)";
            } ?>
        </td>
        <td>
          <a  style="<?php echo $button_update ?>"  class="btn btn-warning  btn-sm edit_btn_content_question" data-id="<?php echo $objResult['id_question'] ?>"   ><i class="fa fa-edit"></i></a>

          <button type="button" class="btn btn-danger  btn-sm delete_btn_question" style="<?php echo $button_delete ?>" data-id="<?php echo $objResult['id_question'] ?>"><i class="mdi mdi-delete-empty" style="color: white;"></i></button>
			
        </td>
      </tr>
<?php
    } ?>      
    </tbody>
  </table>
  <input type="hidden" name="hdnCount_question" value="<?php echo $num ?>">
<?php
}

  function div_table_list_course()
  {
      $db = new DB();

      $button_update  	= $_POST["button_update"];
      $button_delete  	= $_POST["button_delete"];
      $button_create  	= $_POST["button_create"];
      $button_view    	= $_POST["button_view"];
//      $button_approval 	= $_POST["button_approval"];


      $strSQL = "";
      $strSQL .= "SELECT product.id_product,product.name_product,product.name_product_en,product.product_code,product.material,product.surface,product.detail_product,product.detail_product_en,product.id_catagory,product.date_add,product.date_edit,product.view
	  FROM product
      WHERE delete_datetime IS null
      ";

      if (isset($_POST["id_category"]) && $_POST["id_category"] != '0') {
          $id_category = $db->clear($_POST["id_category"]);
          $strSQL .= " AND product.id_catagory='".$id_category."' ";
      }
      if (isset($_POST["search_key"]) && $_POST["search_key"] != '') {
          $search_key = $db->clear($_POST["search_key"]);
          $strSQL .= " AND product.name_product LIKE '%".$search_key."%' ";
      }

      //echo $strSQL;
      $objQuery = $db->Query($strSQL); 
	  
?>
<H3></H3>
  <table class="table" id="table_list_course" style="width: 100%">
    <thead >
      <th>
        <input class="ClickCheckAll filled-in chk-col-light-blue" type="checkbox" name="CheckAll_course" id="CheckAll_course" value="Y" onClick="ClickCheckAll_product_list(this);"><label for="CheckAll_course"></label>
      </th>
      <th>รูปสินค้า</th>
      <th>ชื่อสินค้า</th>
      <th>สถานะ</th>
      <th>วันที่สร้าง</th>
      <th>วันที่แก้ไข</th>
      <th>จัดการ</th>
    </thead>
    <tbody>
<?php
  $num=0;
      while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
          $num++;  
		  
		?>
      <tr class="show-tr_course">
        <td>
          <input type="checkbox" name="Chk_course[]" id="Chk_course<?php echo $num ?>" value="<?php echo $objResult['id_product'] ?>" class="checkbox_remove_product filled-in chk-col-light-blue" /><label for="Chk_course<?php echo $num ?>"></label>
        </td>
        <td>
			<?php 	  
	  $strSQL_img = "SELECT name_image,date_image,id_product
	  FROM product_image
      WHERE id_product = '".$objResult['id_product']."'
	  LIMIT 1
      ";
		  
	  $objQuery_img = $db->Query($strSQL_img);
	  $objResult_img = mysqli_fetch_array($objQuery_img, MYSQLI_ASSOC);	
		  
	  if($objResult_img["name_image"] == ''){
		  $show_img = 'img/no_image.png';
		  $style_img = 'style="width: 80px;"';
	  }
	  else
	  {
		  $show_img = $objResult_img["date_image"].$objResult_img["name_image"];
		  $style_img = 'style="width: 80px; border-radius: 10px;"';
	  }
			?>
          <img src="<?php echo $show_img; ?>" alt="<?php echo $objResult_img["name_image"]; ?>" <?php echo $style_img;?> >
			
        </td>
		<td>
          <?php echo $objResult["name_product"] ?>
        </td>
		<td>
          <?php
            if ($objResult["view"] == '1') { ?>
			
			          <button type="button" class="btn btn-success btn-sm approval_btn_product" style="<?php echo $button_approval ?>" data-id="<?php echo $objResult['id_product'] ?>" data-val="0"><i class="mdi mdi-check-circle" style="color: #b3fdac;"></i>&nbsp;แสดงผล</button>
                
            <?php } elseif ($objResult["view"] == '0') { ?>
			
                      <button type="button" class="btn btn-danger btn-sm approval_btn_product" style="<?php echo $button_approval ?>" data-id="<?php echo $objResult['id_product'] ?>" data-val="1"><i class="mdi mdi-close-circle-outline" style="color: #FFFFFF;"></i>&nbsp;ยังไม่แสดง</button>
			
			<?php }
		  
			?>
			
        </td>
        <td>
           <?php echo DateThai($objResult["date_add"]); ?>
        </td>
        <td>
			<?php if($objResult["date_edit"] == '' ){
					echo '-';
			}
		  		  else{
					echo DateThai($objResult["date_edit"]);
				  }
			?> 
        </td>
        <td>
          <a href="front_product_manage.php?id_product=<?php echo $objResult['id_product'] ?>"  style="<?php echo $button_update ?>"  class="btn btn-warning  btn-sm edit_btn_course" data-id="<?php echo $objResult['id_product'] ?>"><i class="fa fa-edit"></i> แก้ไข</a>

<!--          <a href="show_data.php?id_course=<?php echo $objResult['id_product'] ?>" style="color : #ffffff ;<?php echo $button_view ?>"  class="btn btn-info  btn-sm show_btn_course" data-id="<?php echo $objResult['id_product'] ?>"   ><i class="mdi mdi-eye-outline"></i> รายละเอียด</a>-->

          <button type="button" class="btn btn-danger  btn-sm delete_btn_product" style="<?php echo $button_delete ?>" data-id="<?php echo $objResult['id_product'] ?>"><i class="mdi mdi-delete-empty" style="color: white;"></i>ลบ</button>

        </td>
      </tr>
<?php
      } ?>      
    </tbody>
  </table>
  <input type="hidden" name="hdnCount_course" value="<?php echo $num ?>">
<?php
  }
  ?>

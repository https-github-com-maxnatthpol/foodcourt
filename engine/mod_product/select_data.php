<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';


if (isset($_POST['form'])) {
    if ($_POST['form']=="select_table_class_schedule") {
        select_table_class_schedule();
    } elseif ($_POST['form']=="select_div_edit_front_manage") {
        select_div_edit_front_manage();
    } elseif ($_POST['form']=="select_div_address") {
        select_div_address();
    } elseif ($_POST['form']=="fetch_pang_front_courese_manage") {
        fetch_pang_front_courese_manage();
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
    } elseif ($_POST['form']=="div_reviwe") {
        div_reviwe();
    } elseif ($_POST['form']=="AVG_score") {
        AVG_score();
    } elseif ($_POST['form']=="div_reviwe_group") {
        div_reviwe_group();
    }
} else {
}

function div_reviwe_group()
{
    $db = new DB();
    $id_course = $db->clear($_POST["id_course"]);

    $str_all = "SELECT 
COUNT(course_review.score) count_score_all
FROM `course_review` 
WHERE course_review.delete_datetime IS null  AND  course_review.id_course = '".$id_course."' ";
    $objQuery_all = $db->Query($str_all);
    $objResult_all = mysqli_fetch_array($objQuery_all, MYSQLI_ASSOC);
    $count_score_all = $objResult_all['count_score_all'];

    for ($x=5; $x > 0 ; $x--) {
        $str = "SELECT 
COUNT(course_review.score) count_score,course_review.`score`
FROM `course_review` 
WHERE course_review.delete_datetime IS null  AND course_review.score = '".$x."' AND  course_review.id_course = '".$id_course."' ";
        $objQuery = $db->Query($str);
        $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
        $count_score = $objResult['count_score'];

        if ($count_score_all <= '0') {
            $score_per = 0;
        } else {
            $score_per = ($count_score / $count_score_all) * 100;
        } ?>

                                        <h5 class="m-t-30">
                                          <label for="example-email">
                                          <?php
                                            for ($i=0; $i < $x ; $i++) {
                                                echo '<i class="mdi mdi-star" style="color:  #1E90FF"></i>';
                                            } ?>
                                          </label>
                                          <span class="pull-right"><?php echo $score_per ?>%</span>
                                        </h5>
                                        <div class="progress ">
                                            <div class="progress-bar bg-info wow animated progress-animated" style="width: <?php echo $score_per ?>%; height:6px;" role="progressbar"> <span class="sr-only"><?php echo $score_per ?>% Complete</span> </div>
                                        </div>
<?php
    }
}


function AVG_score()
{
    $db = new DB();
    $id_course = $db->clear($_POST["id_course"]);

    $str = "SELECT AVG(course_review.score) AS AVG_score  FROM `course_review` WHERE course_review.delete_datetime IS null AND  course_review.id_course = '".$id_course."' ";
    $objQuery = $db->Query($str);
    $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
    $AVG_score = number_format($objResult['AVG_score'], 1, '.', ''); ?>
<!-- <h1 style="text-align: center;"><?php echo number_format($AVG_score, 1, '.', '') ?></h1> -->
<H3><?php echo $AVG_score ?></H3>
                            <label for="example-email">คะแนนหลักสูตร</label><br>
                            <label for="example-email">
<?php
  if ($AVG_score >= 5) {
      for ($i=0; $i < 5; $i++) {
          echo ' <i class="mdi mdi-star" style="color:  #1E90FF"></i>';
      }
  } elseif ($AVG_score >= 4) {
      for ($i=0; $i < 4; $i++) {
          echo ' <i class="mdi mdi-star" style="color:  #1E90FF"></i>';
      }
      if ($AVG_score > 4) {
          echo ' <i class="mdi mdi-star-half" style="color:  #1E90FF"></i>';
      } else {
          echo ' <i class="mdi mdi-star-outline" style="color:  #1E90FF"></i>';
      }
  } elseif ($AVG_score >= 3) {
      for ($i=0; $i < 3; $i++) {
          echo ' <i class="mdi mdi-star" style="color:  #1E90FF"></i>';
      }
      if ($AVG_score > 3) {
          echo ' <i class="mdi mdi-star-half" style="color:  #1E90FF"></i>';
      } else {
          echo ' <i class="mdi mdi-star-outline" style="color:  #1E90FF"></i>';
      }
      echo ' <i class="mdi mdi-star-outline" style="color:  #1E90FF"></i>';
  } elseif ($AVG_score >= 2) {
      for ($i=0; $i < 2; $i++) {
          echo ' <i class="mdi mdi-star" style="color:  #1E90FF"></i>';
      }
      if ($AVG_score > 2) {
          echo ' <i class="mdi mdi-star-half" style="color:  #1E90FF"></i>';
      } else {
          echo ' <i class="mdi mdi-star-outline" style="color:  #1E90FF"></i>';
      }
      echo ' <i class="mdi mdi-star-outline" style="color:  #1E90FF"></i>';
      echo ' <i class="mdi mdi-star-outline" style="color:  #1E90FF"></i>';
  } elseif ($AVG_score >= 1) {
      for ($i=0; $i < 1; $i++) {
          echo ' <i class="mdi mdi-star" style="color:  #1E90FF"></i>';
      }
      if ($AVG_score > 1) {
          echo ' <i class="mdi mdi-star-half" style="color:  #1E90FF"></i>';
      } else {
          echo ' <i class="mdi mdi-star-outline" style="color:  #1E90FF"></i>';
      }
      echo ' <i class="mdi mdi-star-outline" style="color:  #1E90FF"></i>';
      echo ' <i class="mdi mdi-star-outline" style="color:  #1E90FF"></i>';
      echo ' <i class="mdi mdi-star-outline" style="color:  #1E90FF"></i>';
  } elseif ($AVG_score > 0) {
      echo ' <i class="mdi mdi-star-half" style="color:  #1E90FF"></i>';
      echo ' <i class="mdi mdi-star-outline" style="color:  #1E90FF"></i>';
      echo ' <i class="mdi mdi-star-outline" style="color:  #1E90FF"></i>';
      echo ' <i class="mdi mdi-star-outline" style="color:  #1E90FF"></i>';
      echo ' <i class="mdi mdi-star-outline" style="color:  #1E90FF"></i>';
  } else {
      echo ' <i class="mdi mdi-star-outline" style="color:  #1E90FF"></i>';
      echo ' <i class="mdi mdi-star-outline" style="color:  #1E90FF"></i>';
      echo ' <i class="mdi mdi-star-outline" style="color:  #1E90FF"></i>';
      echo ' <i class="mdi mdi-star-outline" style="color:  #1E90FF"></i>';
      echo ' <i class="mdi mdi-star-outline" style="color:  #1E90FF"></i>';
  } ?>
                             <!--  <i class="mdi mdi-star" style="color:  #1E90FF"></i>
                              <i class="mdi mdi-star" style="color:  #1E90FF"></i>
                              <i class="mdi mdi-star" style="color:  #1E90FF"></i>
                              <i class="mdi mdi-star-half" style="color:  #1E90FF"></i>
                              <i class="mdi mdi-star-outline" style="color:  #1E90FF"></i> -->
                            </label>
<?php
}
function div_reviwe()
{
    $db = new DB();
    $id_course = $db->clear($_POST["id_course"]); ?>


 <?php

ini_set('display_errors', 1);
    error_reporting(~0);
    //send fast
    $strKeyword_name_fast = null;
    //send detail
    $strKeyword_name = null;
    $strKeyword_code = null;
    $strKeyword_sur  = null;
    $strKeyword_code_id = null;
    $strKeyword_birthday = null;
    $strKeyword_posi = null;
    $strKeyword_authen = null;
    //sort
    $strKeyword_sort = null;

    $sql_review = "";
    $sql_review .= "SELECT 
mod_customer.forename,
mod_customer.surename,
user_images.name,
user_images.directory,
course_review.score,
course_review.messages,
course_review.id_review,
DATE_FORMAT(course_review.create_datetime, '%d/%m/%Y') AS create_datetime
FROM `course_review` 
LEFT JOIN mod_customer ON mod_customer.id_customer=course_review.create_id
LEFT JOIN user_images ON user_images.id_user=mod_customer.id_customer AND user_images.type = '1'
WHERE course_review.delete_datetime IS null AND  course_review.id_course = '".$id_course."' ";


    $objQuery = $db->Query($sql_review);
    $num_rows = mysqli_num_rows($objQuery);

    $per_page = 10;
    $page     = 1;

    if (isset($_POST["page"])) {
        $page = $_POST["page"];
    }

    $prev_page = $page - 1;
    $next_page = $page + 1;

    $row_start = (($per_page * $page) - $per_page);
    if ($num_rows <= $per_page) {
        $num_pages = 1;
    } elseif (($num_rows % $per_page) == 0) {
        $num_pages = ($num_rows / $per_page);
    } else {
        $num_pages = ($num_rows / $per_page) + 1;
        $num_pages = (int) $num_pages;
    }
    $row_end = $per_page * $page;
    if ($row_end > $num_rows) {
        $row_end = $num_rows;
    }
    $sql_review .= "LIMIT $row_start, $per_page";
    $objQuery_review = $db->Query($sql_review);
    $row_objresult = mysqli_num_rows($objQuery);

    $i   = $row_start;
    $num = 0;
       
    while ($objResult_review = mysqli_fetch_array($objQuery_review, MYSQLI_ASSOC)) {
        $num++;
        $i++;
        if ($objResult_review["name"] != '') {
            $name_img = $objResult_review["directory"].$objResult_review["name"];
        } else {
            $name_img = "img_no_image.png";
        }

        if ($objResult_review["score"] <= '1') {
            $score = '<i class="mdi mdi-star" style="color:  #1E90FF">';
        } elseif ($objResult_review["score"] <= '2') {
            $score = '<i class="mdi mdi-star" style="color:  #1E90FF"><i class="mdi mdi-star" style="color:  #1E90FF">';
        } elseif ($objResult_review["score"] <= '3') {
            $score = '<i class="mdi mdi-star" style="color:  #1E90FF"><i class="mdi mdi-star" style="color:  #1E90FF"><i class="mdi mdi-star" style="color:  #1E90FF">';
        } elseif ($objResult_review["score"] <= '4') {
            $score = '<i class="mdi mdi-star" style="color:  #1E90FF"><i class="mdi mdi-star" style="color:  #1E90FF"><i class="mdi mdi-star" style="color:  #1E90FF"><i class="mdi mdi-star" style="color:  #1E90FF">';
        } elseif ($objResult_review["score"] <= '5') {
            $score = '<i class="mdi mdi-star" style="color:  #1E90FF"><i class="mdi mdi-star" style="color:  #1E90FF"><i class="mdi mdi-star" style="color:  #1E90FF"><i class="mdi mdi-star" style="color:  #1E90FF"><i class="mdi mdi-star" style="color:  #1E90FF">';
        } ?>
<?php
echo $score;
        echo "<br>"; ?>

                    <div class="card" style="background: #dcdcdc;" >

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-1 col-md-3">
                                      <img src="<?php echo $name_img ?>" alt="user" class="img-circle d-flex mr-3" width="60">
                                    </div>
                                    <div class="col-lg-11 col-md-9">
                                        <div id="slimtest1" class="slimtest1">
                                            <button type="button" class="close pull-right btn_del_reviwe" data-dismiss="alert" aria-label="Close" data-id="<?php echo $objResult_review["id_review"] ?>"> 
                                              <span aria-hidden="true">&times;</span> 
                                            </button>
                                            <h5><?php echo $objResult_review["forename"].' '.$objResult_review["surename"] ?></h5>
                                            <p style="color: #828282;"><?php echo $objResult_review["create_datetime"] ?></p>
                                            <?php echo $objResult_review["messages"] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      </div>
<?php
    }
    if ($num <= 0) {
        echo '<div class="card" style="background: #dcdcdc;" align="center"><H5>ไม่มีรีวิว</H5></div>';
    } ?>
<div class="col-md-12" align="center">

  <?php


$start = $row_start + 1;

    if (@$prev_page == 0) {
        $active_prev = "Disabled";
    } else {
        $active_prev = '';
    }
    if (@$row_end == $num_rows) {
        $active_next = "Disabled";
    } else {
        $active_next = '';
    }
        


    $output = '';
    if ($num_rows > 0) {
        $output .= '
          <div class="row">
            <div class="col-sm-5">
              <font size="3">ความคิดเห็นที่ ' . $start . ' ถึง ' . $row_end . ' จากทั้งหมด ' . $num_rows . '</font>
            </div>
            <div class="col-sm-7">
              <div class="btn-group" style="float:right; background-color:white;">
                <button type="button" class="btn btn-paginate previous btn-button pagination_link" id=' . $prev_page . ' ' . $active_prev . '
                  data-n-fast="' . $strKeyword_name_fast . '"
                  data-n="' . $strKeyword_name . '"
                  data-c="' . $strKeyword_code . '"
                  data-surname="'.$strKeyword_sur.'"
                  data-posi = "'.$strKeyword_posi.'"
                  data-s="' . $strKeyword_code_id . '"
                  data-d="' . $strKeyword_birthday . '"
                  data-sort="' . $strKeyword_sort . '">ก่อนหน้า</button>';

        for ($a=1; $a<=$num_pages;$a++) {
            if ($a == $page) {
                $class = "page-active";
            } else {
                $class = "";
            }
            $output .= '<button type="button" class="btn btn-paginate btn-button pagination_link ' . $class . '" id=' . $a . '
                              data-n-fast="' . $strKeyword_name_fast . '"
                              data-n="' . $strKeyword_name . '"
                              data-c="' . $strKeyword_code . '"
                              data-surname="'.$strKeyword_sur.'"
                              data-posi = "'.$strKeyword_posi.'"
                              data-s="' . $strKeyword_code_id . '"
                              data-d="' . $strKeyword_birthday . '"
                              data-sort="' . $strKeyword_sort . '">' . $a . '</button>';
        }
        $output .= '<button type="button" class="btn btn-paginate next btn-button pagination_link" id=' . $next_page . ' ' . @$active_next . '
                  data-n-fast="' . $strKeyword_name_fast . '"
                  data-n="' . $strKeyword_name . '"
                  data-c="' . $strKeyword_code . '"
                  data-surname="'.$strKeyword_sur.'"
                  data-posi = "'.$strKeyword_posi.'"
                  data-codeid="' . $strKeyword_code_id . '"
                  data-d="' . $strKeyword_birthday . '"
                  data-authen="' . $strKeyword_authen . '"
                  data-sort="' . $strKeyword_sort . '">ถัดไป</button>
              </div>
            </div>
          </div>
        </div>';
    } else {
        $output .= 'ไม่มีข้อมูล';
    }
    echo $output
?>

</div>
<?php
}
function select_div_edit_question()
{
    $db = new DB();
    $strSQL = "SELECT course_question.messages_th,course_question.messages_en,course_question.random_flg,course_question.random_number,course_question.skip_test_flg,course_question.type_answer,course_question.time_limit,course_images.id_image,course_images.name,course_images.directory
FROM `course_question` 
LEFT JOIN   course_images ON course_question.id_question=course_images.id_course AND course_images.type='3'
WHERE course_question.id_question='".$_POST["id_question"]."' ";
    $objQuery = $db->Query($strSQL);
    $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
    if ($objResult["random_flg"]=='1') {
        $random_flg = "checked";
    } else {
        $random_flg = "";
    }
    if ($objResult["skip_test_flg"]=='1') {
        $skip_test_flg = "checked";
    } else {
        $skip_test_flg = "";
    }

    $messages_th_head = htmlspecialchars_decode($objResult["messages_th"]);
    $messages_en_head = htmlspecialchars_decode($objResult["messages_en"]); ?>
                    <div class="row">
                      <div class="form-group col-md-9 ">
                        <label for="example-email">ตั้งค่าคำถาม </label>
                        <div class="row"> 
                          <div class="form-group col-md-7">
                            <input type="checkbox" name="question_random_flg" id="question_random_flg_edit" value="1" class=" filled-in chk-col-light-blue" <?php echo $random_flg ?> /><label for="question_random_flg_edit">สุ่มคำตอบ</label>
                            <input class="form-control col-md-4" type="number" name="random_number" id="random_number_edit" min="0" OnKeyPress="return check_num(this)" value="<?php echo $objResult["random_number"] ?>"> <label for="random_number_edit"> ตัวเลือก </label>
                          </div>

                          <div class="form-group col-md-5">
                            <input type="checkbox" <?php echo $skip_test_flg ?> name="skip_test_flg" id="skip_test_flg_edit" value="1" class=" filled-in chk-col-light-blue" /><label for="skip_test_flg_edit">อนุญาตให้ข้ามคำถาม</label>
                          </div>
                        </div>

                      </div>
                      <div class="form-group col-md-3">
                        <label for="example-email">จำกัดเวลา (วินาที.) </label>
                        <input class="form-control" type="number" name="time_limit" id="time_limit_edit" min="0" OnKeyPress="return check_num(this)" value="<?php echo $objResult["time_limit"] ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="example-email">รูปแบบคำตอบ</label>
                      <div class="row"> 
                        <div class="form-group col-md-8">
                          <select class="form-control " name="type_answer" id="type_answer_edit">
                            <option <?php if ($objResult["type_answer"]=='1') {
        echo "selected";
    } ?> value="1">Choice</option>
                            <option <?php if ($objResult["type_answer"]=='2') {
        echo "selected";
    } ?> value="2">checkbox</option>
                            <option <?php if ($objResult["type_answer"]=='3') {
        echo "selected";
    } ?> value="3">Text (Single line)</option>
                            <option <?php if ($objResult["type_answer"]=='4') {
        echo "selected";
    } ?> value="4">Text (multi line) </option>
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                          <a onclick="education_fields_edit();" id="add_div_answer_edit" style="color: #ffffff" class="btn btn-success pull-right"><i class="mdi mdi-plus"></i> เพิ่มคำตอบ</a>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-3 col-md-12 m-b-20" id="div_img_quiz_question_edit" >
<?php
  if ($objResult["name"] !='') {
      $directory = $result_answer["directory"].$result_answer["name"];
      echo "<a onclick='edit_pic(" .'"div_img_quiz_question_edit"'."," .'"'.$directory.'"'.")'><img class='img-responsive radius num_img' src='".$directory."' width='150px'></a> <input type='hidden' name='directory_question' value='".$result_answer["directory"]."'><input type='hidden' name='newname_img_question' value='".$result_answer["name"]."'><input type='hidden' name='tmp_size_question' value='".$result_answer["tmp_size"]."'>";
  } ?>
                      </div>
                                      <label for="example-email">คำถาม </label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                            <button class="btn btn-default pull-righ " style="transition: 0.4s; ">
                                              <img class="flag-lang" src="img/th-fl.png" width="22" height="15" > 
                                            </button>
                                          </div>
                                          <input  onkeyup ="disabled_btn_add_question()" type="text" class="form-control quiz_question_name_edit" id="quiz_name_th_question" name="quiz_name_th_question" placeholder="ภาษาไทย" value="<?php echo  strip_tags($messages_th_head)  ?>">
                                          <input  type="hidden" class="form-control" id="question_name_th_editor_edit" name="quiz_question_name_th_taxteditor" placeholder="quiz_name_th_taxteditor" value="<?php echo $objResult["messages_th"] ?>">
                                          <div class="input-group-prepend">
                                              <button data-toggle="modal" data-target="#modal_add_quiz_question_editor" type="button" class="btn btn-default pull-righ open_editor_question" style="transition: 0.4s; " id=""  ><i class="mdi mdi-border-color"> </i> </button>
                                               
                                          </div>
                                          
                                          
                                      </div>
                                      <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-default pull-righ " style="transition: 0.4s; ">
                                              <img class="flag-lang" src="img/en-fl.jpg" width="22" height="15" > 
                                            </button>
                                        </div>
                                        <input  type="text" class="form-control quiz_question_name_edit" id="quiz_question_name_en" name="quiz_question_name_en" placeholder="ภาษาอังกฤษ" value="<?php echo strip_tags($messages_en_head) ?>">
                                        <input  type="hidden" class="form-control" id="question_name_en_editor_edit" name="quiz_question_name_en_taxteditor" placeholder="ภาษาอังกฤษ" value="<?php echo $objResult["messages_en"] ?>">
                                        <div class="input-group-prepend">
                                               <button onclick="open_modal_pic('div_img_quiz_question_edit')" data-toggle="modal" data-target="#modal_add_quiz_question_pic" type="button" class="btn btn-default pull-righ open_pic_question" style="transition: 0.4s; " id=""  ><i class="mdi mdi-image"> </i> </button>
                                          </div>
                                      </div>
                                      </div>

<div id="education_fields_edit" class="div_answer_all_edit" style="max-height: 350px;overflow-x: hidden ;overflow-y: auto">
<?php
  $sql_answer = "SELECT course_answer.id_answer,course_answer.messages_th,course_answer.messages_en,course_answer.correct_flg,course_images.id_image,course_images.name,course_images.directory,course_images.size AS tmp_size
FROM `course_answer`
LEFT JOIN course_images ON course_answer.id_answer  = course_images.id_course AND course_images.type ='4'
WHERE course_answer.id_question = '".$_POST['id_question']."'  AND course_answer.`delete_datetime` IS null ORDER BY course_answer.order ASC";
    $query_answer = $db->Query($sql_answer);
    $i=0;
    while ($result_answer = mysqli_fetch_array($query_answer, MYSQLI_ASSOC)) {
        $messages_th = htmlspecialchars_decode($result_answer["messages_th"]);
        $messages_en = htmlspecialchars_decode($result_answer["messages_en"]);
        if ($result_answer["correct_flg"] == '1') {
            $correct_flg = "checked";
        } else {
            $correct_flg = "";
        } ?>
   <div class="form-group removeclass_<?php echo $i ?>" id="div_answer_<?php echo $i ?>">
                      <label for="example-email">คำตอบ<?php //echo $result_answer["correct_flg"]?></label>
                       <input type="hidden" name="id_answer[]"  value="<?php echo $result_answer["id_answer"] ?>">
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <button class="btn btn-default pull-righ " style="transition: 0.4s; ">
                              <img class="flag-lang" src="img/th-fl.png" width="22" height="15" > 
                            </button>
                        </div>
                        <input onfocus="open_editor_answer('<?php echo $i ?>')" class="form-control" type="text" name="answer[]" id="answer_<?php echo $i ?>" value="<?php echo strip_tags($messages_th) ?>">
                        <input type="hidden" name="editor_answer[]" id="editor_answer_<?php echo $i ?>" value="<?php echo $result_answer["messages_th"] ?>">
                        <div class="input-group-prepend">
                          <button onclick="remove_education_fields('_<?php echo $i ?>');"  type="button" class="btn btn-default pull-right " style="transition: 0.4s; " id=""  > <i class="mdi mdi-delete"> </i> </button>
                          <div class="btn btn-default pull-right " style="background: #dcdcdc"><i class="mdi mdi-cursor-move"></i></div>
                          
                        </div>

                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <button class="btn btn-default pull-righ " style="transition: 0.4s; ">
                              <img class="flag-lang" src="img/en-fl.jpg" width="22" height="15" > 
                            </button>
                        </div>
                        <input onfocus="open_editor_answer('<?php echo $i ?>')" class="form-control" type="text" name="answer_en[]" id="answer_en_<?php echo $i ?>" value="<?php echo strip_tags($messages_en) ?>">
                        <input type="hidden" name="editor_answer_en[]" id="editor_answer_en_<?php echo $i ?>" value="<?php echo $result_answer["messages_en"] ?>">
                        <div class="input-group-prepend">
                          <button data-toggle="modal" data-target="#modal_add_quiz_question_editor" type="button" class="btn btn-default pull-right " onclick="open_editor_answer('<?php echo $i ?>');" style="transition: 0.4s; " id=""  > <i class="mdi mdi-border-color"> </i> </button>

                          <button onclick="open_modal_pic('div_img_quiz_question_<?php echo $i ?>')" data-toggle="modal" data-target="#modal_add_quiz_question_pic" type="button" class="btn btn-default pull-righ open_pic_question" style="transition: 0.4s; " id=""  ><i class="mdi mdi-image"> </i> </button>
                        </div>

                      </div>


                      <div class="col-lg-3 col-md-12 m-b-20 div_img_answer" id="div_img_quiz_question_<?php echo $i ?>">
<?php
  if ($result_answer["name"] !='') {
      $directory = $result_answer["directory"].$result_answer["name"];
      echo "<a onclick='edit_pic(" .'"div_img_quiz_question_'.$i.'"'."," .'"'.$directory.'"'.")'><img class='img-responsive radius num_img' src='".$directory."' width='150px'></a> <input type='hidden' name='directory[]' value='".$result_answer["directory"]."'><input type='hidden' name='newname_img[]' value='".$result_answer["name"]."'><input type='hidden' name='tmp_size[]' value='".$result_answer["tmp_size"]."'><input type='hidden' name='id_image[]'  value='".$result_answer["id_image"]."'>";
  } ?>

                      </div>
                      <input <?php echo $correct_flg ?> type="checkbox" onchange="checkbox_val(<?php echo $i ?>)"  name="correct_flg[<?php echo $i ?>]" id="correct_flg_edit_<?php echo $i ?>" value="" class=" filled-in chk-col-light-blue " /><label for="correct_flg_edit_<?php echo $i ?>">คำตอบที่ถูกต้อง</label>
                      <input type="hidden" name="correct_flg_val[]" id="correct_flg_val_<?php echo $i ?>" value="<?php echo $result_answer["correct_flg"] ?>">
                    </div>
<?php $i++;
    } ?>
<input type="hidden" name="num_i" id="num_i"  value="<?php echo $i ?>">
</div>



 <script type="text/javascript">
   $('.div_answer_all_edit').sortable();
   $('.div_answer_all_edit').on('dragstop', function (event, ui) {
    var element = $(event.target);
    var node = element.data('_gridstack_node');
    console.log(node);
});
   function checkbox_val(target){
     
    correct_flg = $("#correct_flg_val_"+target).val();
    if (correct_flg=='0') {
      val_flg = "1";
    }else{
      val_flg = "0";
    }
    $("#correct_flg_val_"+target).val(val_flg);

  //alert(target);
};
 </script>                  
<?php
}
function fetch_pang_front_courese_manage()
{
    $db = new DB();
    header('Content-Type: application/json');

    $strSQL = "SELECT `name_th`, `name_en`, `describe_th`, `describe_en`, `description_th`, `description_en`, `tag_title_th`, `tag_title_en`, `tag_description_th`, `tag_description_en`, `id_category`, `id_tutor`, `id_partner`, `age`, `age_unit`, `price`, `pay_rate`, `assess_flg`, `assess_rate`, `suggest_flg`, `popular_flg`, DATE_FORMAT(`start_date`,'%d/%m/%Y') AS start_date, DATE_FORMAT(`end_date`,'%d/%m/%Y') AS end_date, `study_time`, `study_rate`, `quiz_min`, `quiz_rate`, `order_lesson_flg`, `id_certificate` FROM `course` WHERE  `id_course` = '".$_POST["id_course"]."' ";
    $objQuery = $db->Query($strSQL);
    $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

    $sql = "SELECT id_image,`name`,`directory` FROM `course_images` WHERE `id_course` = '".$_POST["id_course"]."' AND `type` = '1' ";
    $query = $db->Query($sql);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    if ($objResult) {
        echo json_encode(array('name_th' => $objResult["name_th"], 'name_en' => $objResult["name_en"], 'describe_th' => $objResult["describe_th"], 'describe_en' => $objResult["describe_en"], 'description_th' => $objResult["description_th"], 'description_en' => $objResult["description_en"], 'tag_title_th' => $objResult["tag_title_th"], 'tag_title_en' => $objResult["tag_title_en"], 'tag_description_th' => $objResult["tag_description_th"], 'tag_description_en' => $objResult["tag_description_en"], 'id_category' => $objResult["id_category"], 'id_tutor' => $objResult["id_tutor"], 'id_partner' => $objResult["id_partner"], 'age' => $objResult["age"], 'age_unit' => $objResult["age_unit"], 'price' => $objResult["price"], 'pay_rate' => $objResult["pay_rate"], 'assess_flg' => $objResult["assess_flg"], 'assess_rate' => $objResult["assess_rate"], 'suggest_flg' => $objResult["suggest_flg"], 'popular_flg' => $objResult["popular_flg"], 'start_date' => $objResult["start_date"], 'end_date' => $objResult["end_date"], 'study_time' => $objResult["study_time"], 'study_rate' => $objResult["study_rate"], 'quiz_min' => $objResult["quiz_min"], 'quiz_rate' => $objResult["quiz_rate"], 'order_lesson_flg' => $objResult["order_lesson_flg"], 'id_certificate' => $objResult["id_certificate"], 'name_img'=>$result["name"], 'directory'=>$result["directory"],'id_image'=>$result["id_image"]));
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


function select_table_class_schedule()
{
    $db = new DB();

    $button_update  = $_POST["button_update"];
    $button_delete  = $_POST["button_delete"];
    $button_create   = $_POST["button_create"];
    $button_view   = $_POST["button_view"];
    $id_course = $db->clear($_POST["id_course"]);

    $strSQL = "SELECT `id_lesson`,`order`,`name_th`,name_en FROM `course_lesson` WHERE `delete_datetime` IS null AND `id_course` = '".$id_course."' ";
    $objQuery = $db->Query($strSQL); ?>
	<table class="table" id="table_front_manage" width="100%" >
		<thead >
			<th >
				<input class="ClickCheckAll filled-in chk-col-light-blue" type="checkbox" name="CheckAll" id="CheckAll" value="Y" onClick="ClickCheckAll(this);"><label for="CheckAll"></label>
			</th>
			<th width="20%">ลำดับ</th>
			<th >ชื่อบทเรียน</th>
			<th >จัดการ</th>
		</thead>
		<tbody>
<?php
    $num=0;
    while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
        $num++; ?>
			<tr class="show-tr">
				<td>
					<input type="checkbox" name="Chk[]" id="Chk<?php echo $num ?>" value="<?php echo $objResult['id_lesson'] ?>" class="checkbox_remove filled-in chk-col-light-blue" /><label for="Chk<?php echo $num ?>"></label>
				</td>
				<td>
          <input onchange="order_chanhe(<?php echo $num ?>)" class="form-control" type="number" name="order" id="order<?php echo $num ?>" value="<?php echo  $objResult['order'] ?>">
          <input  class="form-control" type="hidden" name="id" id="id<?php echo $num ?>" value="<?php echo  $objResult['id_lesson'] ?>"><font style="display: none;"><?php echo  $objResult['order'] ?></font>
          
        </td>
				<td>
					<?php echo $objResult["name_th"] ?>
        </td>
				<td>
					<a  style="<?php echo $button_update ?>"  class="btn btn-warning  btn-sm edit_btn_class_schedule" data-id="<?php echo $objResult['id_lesson'] ?>" data1-id="<?php echo $objResult['name_th'] ?>" data2-id="<?php echo $objResult['name_en'] ?>"  ><i class="fa fa-edit"></i></a>

          <a  style="color: #FFFCFC;  <?php echo $button_create ?>"  class="btn btn-info  btn-sm lesson_content_btn" data-id="<?php echo $objResult['id_lesson'] ?>"  data1-id="<?php echo $objResult["name_th"] ?>" >เนื้อหา</a>

					<button type="button" class="btn btn-danger  btn-sm delete_btn" style="<?php echo $button_delete ?>" data-id="<?php echo $objResult['id_lesson'] ?>"><i class="mdi mdi-delete-empty" style="color: white;"></i></button>

          

				</td>
			</tr>
<?php
    } ?>			
		</tbody>
	</table>
	<input type="hidden" name="hdnCount" value="<?php echo $num ?>">
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
      $button_approval 	= $_POST["button_approval"];


      $strSQL = "";
      $strSQL .= "SELECT name_product,name_product_en,product_code,material,surface,detail_product,detail_product_en,date_add,date_edit,view
	  FROM product
      WHERE delete_datetime IS null";

      if (isset($_POST["id_category"]) && $_POST["id_category"] != '0') {
          $id_category = $db->clear($_POST["id_category"]);
          $strSQL .= " AND course.id_category='".$id_category."' ";
      }
      if (isset($_POST["search_key"]) && $_POST["search_key"] != '') {
          $search_key = $db->clear($_POST["search_key"]);
          $strSQL .= " AND course.name_th  LIKE '%".$search_key."%' ";
      }

      //echo $strSQL;
      $objQuery = $db->Query($strSQL); ?>
<H3></H3>
  <table class="table" id="table_list_course" style="width: 100%">
    <thead >
      <th>
        <input class="ClickCheckAll filled-in chk-col-light-blue" type="checkbox" name="CheckAll_course" id="CheckAll_course" value="Y" onClick="ClickCheckAll_course_list(this);"><label for="CheckAll_course"></label>
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
          $num++; ?>
      <tr class="show-tr_course">
        <td>
          <input type="checkbox" name="Chk_course[]" id="Chk_course<?php echo $num ?>" value="<?php echo $objResult['id_product'] ?>" class="checkbox_remove_course filled-in chk-col-light-blue" /><label for="Chk_course<?php echo $num ?>"></label>
        </td>
        <td>
          <?php echo $objResult["name_product"] ?>
        </td>
		<td>
          <?php echo $objResult["name_product"] ?>
        </td>
		<td>
          <?php
            if ($objResult["view"] == '1') {
                echo 'แสดงผล' ;
            } elseif ($objResult["view"] == '0') {
                echo 'ไม่แสดงผล' ;
			}
			?>
        </td>
        <td>
           <?php echo $objResult["date_add"] ?>
        </td>
        <td>
        	<?php echo $objResult["date_edit"] ?>
        </td>
        <td>
          <a href="front_courese_manage.php?id_course=<?php echo $objResult['id_course'] ?>"  style="<?php echo $button_update ?>"  class="btn btn-warning  btn-sm edit_btn_course" data-id="<?php echo $objResult['id_course'] ?>"   ><i class="fa fa-edit"></i></a>

          <a href="show_data.php?id_course=<?php echo $objResult['id_course'] ?>" style="color : #ffffff ;<?php echo $button_view ?>"  class="btn btn-info  btn-sm show_btn_course" data-id="<?php echo $objResult['id_course'] ?>"   ><i class="mdi mdi-eye-outline"></i> รายละเอียด</a>

          <button type="button" class="btn btn-danger  btn-sm delete_btn_course" style="<?php echo $button_delete ?>" data-id="<?php echo $objResult['id_course'] ?>"><i class="mdi mdi-delete-empty" style="color: white;"></i></button>
<?php
if ($button_approval == '') {
 
  if ($objResult['status_approval'] == '0') {
?>
          <button type="button" class="btn btn-success  btn-sm approval_btn_course" style="<?php echo $button_approval ?>" data-id="<?php echo $objResult['id_course'] ?>" data-val="1"><i class="mdi mdi-close-circle-outline" style="color: #FF5722;"></i>&nbsp;ยังไม่อนุมัติ</button>
<?php
  }else{
?>
          <button type="button" class="btn btn-default  btn-sm approval_btn_course" style="<?php echo $button_approval ?>" data-id="<?php echo $objResult['id_course'] ?>" data-val="0"><i class="mdi mdi-check-circle" style="color: #FF5722;"></i>&nbsp;อนุมัติแล้ว</button>
<?php
  }
}
?>

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

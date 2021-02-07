<?php include('../template/header.php');?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
<?php require_once('../template/menu.php');?>
        <!-- ============================================================== -->


<?php
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';
$db = new DB();
?>

<!--alerts CSS -->
  


<style>
	.oncard-header{
	border-top: solid #ffb22b ;
	}	
  
</style>
<style type="text/css">
p  { font-family: 'Prompt', sans-serif; }


</style>

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">หลักสูตร</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:location.href='../index.php'">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript:location.href='front_manage.php'">รายการหลักสูตร</a></li>
                            <li class="breadcrumb-item active">หลักสูตร</li>
                        </ol>
                    </div>
                    
                </div>
								<div class="">
                                <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                            </div>
                
          <div class="box-body" style="padding: 0;">
            <?php
              if (isset($_GET["id_course"])) {
                  $id_course = $_GET["id_course"];
                  $form = 'form_edit_detail';
              } else {
                  $id_course = '';
                  $form = 'form_add_detail';
              }
            ?>
            <form action="" name="form_add_detail" id="form_add_detail" method="post">
            <input type="hidden" name="form" value="<?php echo $form ?>">
            <input type="hidden" name="id_courese" id="id_courese" value="<?php echo $id_course ?>" >
             

             <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body p-b-0"> 
                                
                            </div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs customtab" role="tablist" id="ui_head">
                                <li class="nav-item"> <a class="nav-link active" id="btn_detail" data-toggle="tab" href="#detail" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">รายละเอียด</span></a> </li>

                                <li class="nav-item "> <a  class="nav-link   tab_2_3" data-toggle="tab" href="#content" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">เนื้อหา</span></a> </li>

                                <li class="nav-item" id="btn_examination"> <a  class="nav-link tab_2_3" data-toggle="tab" href="#examination" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">ข้อสอบ</span></a> </li>

                                <li class="nav-item"> <a  class="nav-link tab_2_3" data-toggle="tab" href="#opinion" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">ความคิดเห็น</span></a> </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="detail" role="tabpanel">
                                    <div class="p-20">
                                      <div class="row">
                                       <div class="col-md-4">
                                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> 
                                  <a class="nav-link active" data-toggle="tab" href="#thai" role="tab">
                                    <img class="flag-lang" src="img/th-fl.png" width="22" height="15" > ภาษาไทย
                                  </a> 
                                </li>
                                <li class="nav-item"> 
                                  <a class="nav-link" data-toggle="tab" href="#english" role="tab">
                                    <img class="flag-lang" src="img/en-fl.jpg" width="22" height="15" > ภาษาอังกฤษ
                                  </a> 
                                </li>
                                
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                               
                                <div class="tab-pane active" id="thai" role="tabpanel">
                                    <div class="card-body">


                                      <div class="form-group">
                                        <label for="example-email">ชื่อหลักสูตร </label>
                                        <input disabled onkeyup ="disabled_btn_add_detail()" type="text" class="form-control" id="name_th" name="name_th" >
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email">คำอธิบายอย่างย่อ </label>
                                        <textarea disabled rows="5" class="form-control" style="overflow-y: auto;" id="describe_th" name="describe_th"></textarea>
                                      </div>

                                      <div class="form-group" id="editor" >
                                        
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email">Title Tag </label>
                                        <input disabled  type="text" class="form-control" id="tag_title_th" name="tag_title_th" >
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email">Description Tag </label>
                                        <input disabled  type="text" class="form-control" id="tag_description_th" name="tag_description_th" >
                                      </div>




                                    </div>


                                </div>
                          
                                <div class="tab-pane" id="english" role="tabpanel">
                                    <div class="card-body">

                                      <div class="form-group">
                                        <label for="example-email">ชื่อหลักสูตร </label>
                                        <input disabled  type="text" class="form-control" id="name_en" name="name_en" >
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email">คำอธิบายอย่างย่อ </label>
                                        <textarea disabled rows="5" class="form-control" id="describe_en" name="describe_en"></textarea>
                                      </div>

                                      <div class="form-group" id="editor_en" style="margin-top: 10px;">
                                        <label for="example-email">คำอธิบายราายวิชา </label>
                                        <textarea class="edit"   style="margin-top: 20px;max-height: 250px; overflow-y: auto;"  id="description_en" name="description_en"></textarea>
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email">Title Tag </label>
                                        <input disabled  type="text" class="form-control" id="tag_title_en" name="tag_title_en" >
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email">Description Tag </label>
                                        <input disabled  type="text" class="form-control" id="tag_description_en" name="tag_description_en" >
                                      </div>

                                    </div>
                                </div>
                               
                            </div>
                          </div>
                          </div>


                            <div class="col-md-4">
                                      <div class="form-group">
                                        <label for="example-email"> หมวดหมู่ </label>
                                        <select disabled class="form-control select2" name="id_category" id="id_category">
                                          <option value="0">-เลือกหมวดหมู่-</option>
<?php
  $strSQL = "SELECT `id_category`,`name_th`  FROM `category` WHERE `delete_datetime` IS null";
  $objQuery = $db->Query($strSQL);
  while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
      ?>
                                          <option value="<?php echo $objResult["id_category"] ?>"><?php echo $objResult["name_th"] ?></option>
<?php
  } ?>
                                        </select>
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email"> Partner </label>
                                        <select disabled class="form-control select2" name="id_partner" id="id_partner">
                                          <option>-เลือก Partner-</option>
<?php
  $strSQL = "SELECT `id_partner`,`name_th`  FROM `partner` WHERE `delete_datetime` IS null";
  $objQuery = $db->Query($strSQL);
  while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
      ?>
                                          <option value="<?php echo $objResult["id_partner"] ?>"><?php echo $objResult["name_th"] ?></option>
<?php
  } ?>
                                        </select>
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email">ราคา (บาท)</label>
                                        <input disabled  type="text" class="form-control" id="price" name="price" OnKeyPress="return isNumber(this)" >
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email">วันที่เริ่มต้น - วันที่สิ้นสุด</label>
                                        <div class='input-group mb-3'>
                                          <input type='text' disabled class="form-control daterange" name="start_to_end__date" />
                                           <?php
                                          if (isset($_GET["id_course"])) {
                                              ?>
                                          <input type="hidden" name="start_date" id="start_date" value="">
                                          <input type="hidden" name="end_date" id="end_date" value="">
                                        <?php
                                          } ?>
                                          <div class="input-group-append">
                                              <span class="input-group-text">
                                                      <span class="ti-calendar"></span>
                                              </span>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email">อายุคอร์ส</label>
                                        <div class="row">
                                        <div class="col-md-6">
                                          <input  type="text" disabled class="form-control" id="age" name="age" OnKeyPress="return check_num(this)" >
                                        </div>
                                        <div class="col-md-6">
                                          <select disabled class="form-control select2" name="age_unit" id="age_unit">
                                            <option value="1">ชั่วโมง</option>
                                            <option value="2">วัน</option>
                                            <option value="3">สัปดาห์</option>
                                            <option value="4">เดือน</option>
                                          </select>
                                        </div>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email">เกณฑ์การให้คะแนน</label>
                                      </div>
                                      <div class="row">

                                      <div class="col-md-6">

                                      <div class="form-group">
                                        <label for="example-email">ใช้เวลาเรียนไม่ต่ำกว่า (%)</label>
                                        <input  type="text" class="form-control" id="study_time" name="study_time" OnKeyPress="return isNumber(this)" disabled onchange="ckeck_munbermax('study_time')">
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email">ทำข้อสอบได้คะแนนไม่ต่ำกว่า (%)</label>
                                        <input  type="text" class="form-control" id="quiz_min" name="quiz_min" OnKeyPress="return isNumber(this)" disabled onchange="ckeck_munbermax('quiz_min')">
                                      </div>

                                      </div>

                                      <div class="col-md-6">
                                        
                                      <div class="form-group">
                                        <label for="example-email">อัตราส่วนคะแนน (%)</label>
                                        <input  type="text" class="form-control" id="study_rate" name="study_rate" OnKeyPress="return isNumber(this)" disabled onchange="ckeck_munbermax('study_rate')">
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email">อัตราส่วนคะแนน (%)</label>
                                        <input  type="text" class="form-control" id="quiz_rate" name="quiz_rate" OnKeyPress="return isNumber(this)" disabled onchange="ckeck_munbermax('quiz_rate')">
                                      </div>

                                      </div>

                                      </div>

                                      <div class="form-group">
                                        <input disabled type="checkbox" name="order_lesson_flg" id="order_lesson_flg" value="1" class="filled-in chk-col-light-blue" /><label for="order_lesson_flg">ดูเทปเรียงตามลำดับบทเรียน</label>
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email"> รูปแบบใบรับรอง </label>
                                        <select disabled class="form-control select2" name="id_certificate" id="id_certificate">
                                          <option value="0">-เลือก รูปแบบใบรับรอง-</option>
<?php
  $strSQL = "SELECT `id_certificate`,`name` FROM `certificate` WHERE `delete_datetime` IS null";
  $objQuery = $db->Query($strSQL);
  while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
      ?>
                                          <option value="<?php echo $objResult["id_certificate"] ?>"><?php echo $objResult["name"] ?></option>
<?php
  } ?>
                                        </select>
                                      </div>

  </div>

  <div class="col-md-4">

                                      <div class="form-group">
                                        <label for="example-email"> วิทยากร </label>
                                        <select disabled class="form-control select2" name="id_tutor" id="id_tutor">
                                          <option value="0">-เลือก วิทยากร-</option>
<?php
  $strSQL = "SELECT `id_tutor`,CONCAT(`forename_th`,' ',`surename_th`) AS name_tutor FROM `tutor` WHERE  `delete_datetime` IS null";
  $objQuery = $db->Query($strSQL);
  while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
      ?>
                                          <option value="<?php echo $objResult["id_tutor"] ?>"><?php echo $objResult["name_tutor"] ?></option>
<?php
  } ?>
                                        </select>
                                      </div>

                                      <div class="form-group">
                                        <input disabled type="checkbox" name="assess_flg" id="assess_flg" value="1" class="filled-in chk-col-light-blue" /><label for="assess_flg">การประเมินผล</label>
                                        <div id="div_assess_rate">
                                          <input disabled type="range" name="assess_rate" id="assess_rate" value="" >
                                        </div>
                                        
                                      </div>

                                      <div class="form-group">
                                        <label for="example-email">ค่าตอบแทน (%)</label>
                                        <input disabled  type="text" class="form-control" id="pay_rate" name="pay_rate" OnKeyPress ="return isNumber(this)" onchange="ckeck_munbermax('pay_rate')">
                                      </div>

                                      
                                      <div class="form-group  bt-switch row" >
                                        <div class="col-md-6" align="center">
                                          <label class="col-md-12">แนะนำ</label>
                                          <div id="div_suggest_flg">
                                            <input disabled name="suggest_flg" id="suggest_flg" value="1" type="checkbox"  data-off-color="danger" data-on-color="success" data-off-text="<i class='mdi mdi-close'></i>" data-on-text="<i class='mdi mdi-check'></i>"> 
                                          </div>
                                        </div>

                                        <div class="col-md-6" align="center">
                                          <label class="col-md-12">ยอดนิยม</label>
                                          <div id="div_popular_flg">
                                            <input disabled name="popular_flg" id="popular_flg" value="1" type="checkbox"  data-off-color="danger" data-on-color="success" data-off-text="<i class='mdi mdi-close'></i>" data-on-text="<i class='mdi mdi-check'></i>"> 
                                          </div>
                                          

                                        </div>

                                      </div>

                                      

                                      <div class="form-group col-md-12">
                                        <div class="card">
                                          <div class="card-body ">
                                            <label for="input-file-now">รูปภาพ</label>
                                            <div id="div_img">
                                           <!--  <input disabled accept="image/*" type="file" id="name_img" class="dropify" name="name_img"  />
                                             -->
                                            
                                              
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div id="div_img_ed"></div>

                                      

                                      

  </div>
</div>

                                      
</form>
</div>
</div>
                

                                <div class="tab-pane  p-20 " id="content" role="tabpanel">
<div class="row">                            
  <div class="col-md-6">   
         <div class="card card-body" >
          <div class="box-header with-border">
            <div class="row"> 
            <div class="col-md-6" align="left">
              <h3 class="box-title">รายการบทเรียน</h3>
            </div>
            <div class="col-md-6" align="right">


</div>
</div>
          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="frmMain_class_schedule" id="frmMain_class_schedule" method="post">
              <input type="hidden" name="form" value="Multi_del">
              <input type="hidden" name="change" id="changeMulti">
              <div id="div_table_list"></div> 
              <div class="boxsave" id="box-del-list">


              </div>  
            </form>
          </div>
        </div>
      </div>

  <div class="col-md-6">   
         <div class="card card-body" >
          <div class="box-header with-border">
            <div class="row"> 
            <div class="col-md-6" align="left">
              <h3 class="box-title"  >รายการเนื้อหา</h3>
              <h3 class="box-title"  id="head_list_content"></h3>
            </div>
            <div class="col-md-6" align="right">


</div>
</div>
          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="frmMain_content" id="frmMain_content" method="post">
              <input type="hidden" name="form" value="Multi_del_content">
              <input type="hidden" name="id_lesson_content" id="id_lesson_content" value="">
              <input type="hidden" name="change" id="changeMulti">
              <div id="div_table_list_content"></div> 
              <div class="boxsave" id="box-del-list">

              </div>  
            </form>
          </div>
        </div>
      </div>
</div>      



<div class="modal fade" id="modal_add_content" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div id="div_add" class="col-md-12" style="<?php echo $button_create ?>">
        <div class="card card-body" >
          <div class="box-header with-border">
            <h3 class="box-title" id="h3_add_content">รายละเอียดเนื้อหา</h3>
          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="form_add_content" id="form_add_content" method="post">
              <input type="hidden" name="form" value="form_add_content">
              <input type="hidden" name="id_subject" id="id_subject" value="">
              
              
                  <div class="col-md-12">
                        <div class="card">
                            <div class="card-body p-b-0">
                               
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs customtab" role="tablist">
                                <li class="nav-item"> 
                                  <a class="nav-link active" id="head_thai_content" data-toggle="tab" href="#thai_content" role="tab">
                                    <img class="flag-lang" src="img/th-fl.png" width="22" height="15" > ภาษาไทย
                                  </a> 
                                </li>
                                <li class="nav-item"> 
                                  <a class="nav-link" id="head_english_content" data-toggle="tab" href="#english_content" role="tab">
                                    <img class="flag-lang" src="img/en-fl.jpg" width="22" height="15" > ภาษาอังกฤษ
                                  </a> 
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="thai_content" role="tabpanel">
                                    <div class="p-20">

                                      <div class="form-group">
                                        <label for="example-email">ชื่อบทเรียน </label>
                                        <input disabled onkeyup ="disabled_btn_add_content()" type="text" class="form-control" id="content_name_th" name="content_name_th" placeholder="ภาษาไทย">
                                      </div>

                                     
                                    </div>
                                </div>
                                <div class="tab-pane  p-20" id="english_content" role="tabpanel">

                                    <div class="form-group">
                                        <label for="example-email">ชื่อบทเรียน </label>
                                        <input disabled  type="text" class="form-control" id="content_name_en" name="content_name_en" placeholder="ภาษาอังกฤษ">
                                      </div>

                                      
                                </div>

                              
                                     

                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                      <div class="card" >
                        <div class="card-body " >
                          <label for="input-file-now">อัพโหลดข้อมูล</label>
                          <div id="div_img_content">
                          <input disabled accept="image/*,application/pdf,application/x-pdf,application/msword,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation,application/pdf,video/*" type="file" id="file_content" class="dropify" name="file_content" />
                          </div>
                          <div id="div_img_ed_content"></div>
                        </div>
                        <font color="red">*คำแนะนำ : ไฟล์ที่สามารถอัพได้คือ image, video, PDF, Microsoft ( word, powerpoint, excel )</font>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="example-email">link วีดีโอ </label>  <span class="text-muted">https://player.vimeo.com/video/{video_id}</span>
                      <input disabled type="url" class="form-control" id="content_link_video" name="content_link_video" required >
                    </div>

                    <div class="form-group">
                      <label for="example-email">link เอกสาร </label>
                      <input disabled type="url" class="form-control" id="content_link_document" name="content_link_document" required >
                    </div>
                    
             

                    

              </div> 
              <div class="boxsave" id="" align="center">

                <button type = "button" class = "btn btn-default" data-dismiss = "modal">ปิด</button>


              </div>  
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>


<div class="modal fade" id="modal_add_class_schedule" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div id="div_add" class="col-md-12" style="">
        <div class="card card-body" >
          <div class="box-header with-border">
            <h3 class="box-title" id="h3_add_class_schedule">รายละเอียดบทเรียน</h3>
          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="form_add_class_schedule" id="form_add_class_schedule" method="post">
              <input type="hidden" name="form" value="form_add_class_schedule">
              <input type="hidden" name="id_lesson" id="id_lesson" value="">
              
              
                  <div class="col-md-12">
                        <div class="card">
                            <div class="card-body p-b-0">
                               
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs customtab" role="tablist">
                                <li class="nav-item"> 
                                  <a class="nav-link active" id="head_thai_class_schedule" data-toggle="tab" href="#thai_class_schedule" role="tab">
                                    <img class="flag-lang" src="img/th-fl.png" width="22" height="15" > ภาษาไทย
                                  </a> 
                                </li>
                                <li class="nav-item"> 
                                  <a class="nav-link" id="head_english_class_schedule" data-toggle="tab" href="#english_class_schedule" role="tab">
                                    <img class="flag-lang" src="img/en-fl.jpg" width="22" height="15" > ภาษาอังกฤษ
                                  </a> 
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="thai_class_schedule" role="tabpanel">
                                    <div class="p-20">

                                      <div class="form-group">
                                        <label for="example-email">ชื่อบทเรียน </label>
                                        <input disabled onkeyup ="disabled_btn_add_class_schedule()" type="text" class="form-control" id="lesson_name_th" name="lesson_name_th" placeholder="ภาษาไทย">
                                      </div>

                                     
                                    </div>
                                </div>
                                <div class="tab-pane  p-20" id="english_class_schedule" role="tabpanel">

                                    <div class="form-group">
                                        <label for="example-email">ชื่อบทเรียน </label>
                                        <input disabled  type="text" class="form-control" id="lesson_name_en" name="lesson_name_en" placeholder="ภาษาอังกฤษ">
                                      </div>

                                      
                                </div>

                              
                                     

                            </div>
                        </div>
                    </div>
                    
             

                    

              </div> 
              <div class="boxsave" id="" align="center">

                

                <button type = "button" class = "btn btn-default" data-dismiss = "modal">ปิด</button>


              </div>  
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

                                </div>
                                <div class="tab-pane p-20" id="examination" role="tabpanel">
                                  

                                  <div class="row">                            
  <div class="col-md-6">   
         <div class="card card-body" >
          <div class="box-header with-border">
            <div class="row"> 
            <div class="col-md-6" align="left">
              <h3 class="box-title">รายการข้อสอบ</h3>
            </div>
            <div class="col-md-6" align="right">


</div>
</div>
          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="frmMain_course_quiz" id="frmMain_course_quiz" method="post">
              <input type="hidden" name="form" value="Multi_del_course_quiz">
              <div id="div_table_list_course_quiz"></div> 
         
            </form>
          </div>
        </div>
      </div>

<div class="modal fade" id="modal_add_quiz" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div id="div_add" class="col-md-12" style="">
        <div class="card card-body" >
          <div class="box-header with-border">
            <h3 class="box-title" id="h3_add_quiz">รายละเอียดข้อสอบ</h3>
          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="form_add_quiz" id="form_add_quiz" method="post">
              <input type="hidden" name="form" value="form_add_quiz">
              <input type="hidden" name="id_quiz" id="id_quiz" value="">
              
              
                  <div class="col-md-12">
                        <div class="card">
                            <div class="card-body p-b-0">
                               
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs customtab" role="tablist">
                                <li class="nav-item"> 
                                  <a class="nav-link active" id="head_thai_quiz" data-toggle="tab" href="#thai_quiz" role="tab">
                                    <img class="flag-lang" src="img/th-fl.png" width="22" height="15" > ภาษาไทย
                                  </a> 
                                </li>
                                <li class="nav-item"> 
                                  <a class="nav-link" id="head_english_quiz" data-toggle="tab" href="#english_quiz" role="tab">
                                    <img class="flag-lang" src="img/en-fl.jpg" width="22" height="15" > ภาษาอังกฤษ
                                  </a> 
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="thai_quiz" role="tabpanel">
                                    <div class="p-20">

                                    <div class="form-group">
                                      <label for="example-email">ชื่อแบบทดสอบ </label>
                                      <div class="input-group">
                                          <input disabled onkeyup ="disabled_btn_add_quiz()" type="text" class="form-control quiz_name" id="quiz_name_th" name="quiz_name_th" placeholder="ภาษาไทย">
                                          <input disabled type="hidden" class="form-control" id="quiz_name_th_taxteditor" name="quiz_name_th_taxteditor" placeholder="quiz_name_th_taxteditor">
                                          <div class="input-group-prepend">
                                              <button data-toggle="modal" data-target="#modal_add_quiz_editor" type="button" class="btn btn-success pull-righ open_editor" style="transition: 0.4s; " id=""  ><i class="mdi mdi-border-color"> </i> </button>
                                          </div>
                                      </div>
                                    </div>

                                     
                                    </div>
                                </div>
                                <div class="tab-pane  p-20" id="english_quiz" role="tabpanel">

                                  <div class="form-group">
                                    <label for="example-email">ชื่อแบบทดสอบ </label>  
                                    <div class="input-group">
                                          <input  disabled type="text" class="form-control quiz_name" id="quiz_name_en" name="quiz_name_en" placeholder="ภาษาอังกฤษ">
                                          <input disabled  type="hidden" class="form-control" id="quiz_name_en_taxteditor" name="quiz_name_en_taxteditor" placeholder="ภาษาอังกฤษ">
                                          <div class="input-group-prepend">
                                              <button data-toggle="modal" data-target="#modal_add_quiz_editor" type="button" class="btn btn-success pull-right open_editor" style="transition: 0.4s; " id=""  > <i class="mdi mdi-border-color"> </i> </button>
                                          </div>
                                      </div>
                                    </div>

                                      
                                </div>

                              
                                     

                            </div>
                        </div>
                    </div>

                  

                    <div class="form-group">
                      <label for="example-email">ตั้งค่าการสอบ </label>
                    </div>
                    <div class="row">
                    <div class="form-group col-md-6">
                      <input disabled type="checkbox" name="pass_new_flg" id="pass_new_flg" value="1" class=" filled-in chk-col-light-blue" /><label for="pass_new_flg">สอบผ่าน สอบใหม่ได้</label>
                      <input disabled class="form-control col-md-4" type="number" name="pass_new_number" id="pass_new_number" min="0" OnKeyPress="return check_num(this)"> <label for="pass_new_number"> ครั้ง </label>
                    </div>

                    <div class="form-group col-md-6">
                      <input disabled type="checkbox" name="fail_new_flg" id="fail_new_flg" value="1" class=" filled-in chk-col-light-blue" /><label for="fail_new_flg">สอบซ่อมได้</label>
                      <input disabled class="form-control col-md-4" type="number" name="fail_new_number" id="fail_new_number" min="0" OnKeyPress="return check_num(this)"> <label for="pass_new_number"> ครั้ง </label>
                    </div>
                    </div>

                    <div class="form-group">
                      <label for="example-email">ตั้งค่าข้อสอบ </label>
                    </div>
                    <div class="row">
                    <div class="form-group col-md-12">
                      <input disabled type="checkbox" name="random_flg" id="random_flg" value="1" class=" filled-in chk-col-light-blue" /><label for="random_flg">สุ่มคำถาม   จำนวนคำถาม</label>
                      <input disabled class="form-control col-md-4" type="number" name="exam_number" id="exam_number" min="0" OnKeyPress="return check_num(this)"> <label for="exam_number"> ข้อ </label>
                    </div>
                    </div>
                    
             
<div class="boxsave" id="" align="center">

               
                <button type = "button" class = "btn btn-default" data-dismiss = "modal">ปิด</button>


              </div>  
                    

              </div> 
              
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="modal_add_quiz_editor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div id="div_add" class="col-md-12" style="">
        <div class="card card-body" >
          <div class="box-header with-border">
            <h3 class="box-title" id="">Advanced Editor</h3>
          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="form_add_quiz_editor" id="form_add_quiz_editor" method="post">
              <input type="hidden" name="form" value="form_add_quiz_editor">
              
              
                  <div class="col-md-12">
                        <div class="card">
                            <div class="card-body p-b-0">
                               
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs customtab" role="tablist">
                                <li class="nav-item"> 
                                  <a class="nav-link active" id="head_thai_quiz" data-toggle="tab" href="#thai_quiz_editor" role="tab">
                                    <img class="flag-lang" src="img/th-fl.png" width="22" height="15" > ภาษาไทย
                                  </a> 
                                </li>
                                <li class="nav-item"> 
                                  <a class="nav-link" id="head_english_quiz" data-toggle="tab" href="#english_quiz_editor" role="tab">
                                    <img class="flag-lang" src="img/en-fl.jpg" width="22" height="15" > ภาษาอังกฤษ
                                  </a> 
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="thai_quiz_editor" role="tabpanel">
                                    <div class="p-20">

                                      <div class="form-group">
                                        <textarea class="form-control edit" id="quiz_editor_th" name="quiz_editor_th"></textarea>
                                      </div>

                                     
                                    </div>
                                </div>
                                <div class="tab-pane  p-20" id="english_quiz_editor" role="tabpanel">

                                    <div class="form-group">
                                        <textarea class="form-control edit" id="quiz_editor_en" name="quiz_editor_en"></textarea>
                                      </div>

                                      
                                </div>

                              
                                     

                            </div>
                        </div>
                    </div>

                    

                   
              </div> 
              <div class="boxsave" id="" align="center">


                <button type = "button" class = "btn btn-default" data-dismiss = "modal">ปิด</button>


              </div>  
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

  <div class="col-md-6">   
         <div class="card card-body" >
          <div class="box-header with-border">
            <div class="row"> 
            <div class="col-md-8" align="left">
              <h3 class="box-title"  >รายการคำถาม</h3>
              <h3 class="box-title"  id="head_list_course_question"></h3>
            </div>
            <div class="col-md-4" align="right">

</div>
</div>
          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="frmMain_course_question" id="frmMain_course_question" method="post">
              <input type="hidden" name="form" value="Multi_del_course_question">
              <input type="hidden" name="id_question" id="id_question" value="">
              <input type="hidden" name="change" id="changeMulti">
              <div id="div_table_list_course_question"></div> 
              <div class="boxsave" id="box-del-list">


              </div>  
            </form>
          </div>
        </div>
      </div>


      <div  class="modal fade" id="modal_add_quiz_question" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div id="div_add" class="col-md-12" style="<?php echo $button_create ?>">
        <div class="card card-body" >
          <div class="box-header with-border">
            <h3 class="box-title" id="h3_add_quiz_question">รายละเอียดคำถาม</h3>
          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="form_add_quiz_question" id="form_add_quiz_question" method="post">
              <input type="hidden" name="form" value="form_add_quiz_question">
              <input type="hidden" name="id_quiz_question" id="id_quiz_question" value="">
              
              
                  <div class="col-md-12">
                    <div class="row">
                      <div class="form-group col-md-9 ">
                        <label for="example-email">ตั้งค่าคำถาม </label>
                        <div class="row"> 
                          <div class="form-group col-md-7">
                            <input disabled type="checkbox" name="question_random_flg" id="question_random_flg" value="1" class=" filled-in chk-col-light-blue" /><label for="question_random_flg">สุ่มคำตอบ</label>
                            <input disabled class="form-control col-md-4" type="number" name="random_number" id="random_number" min="0" OnKeyPress="return check_num(this)"> <label for="random_number"> ตัวเลือก </label>
                          </div>

                          <div class="form-group col-md-5">
                            <input disabled type="checkbox" name="skip_test_flg" id="skip_test_flg" value="1" class=" filled-in chk-col-light-blue" /><label for="skip_test_flg">อนุญาตให้ข้ามคำถาม</label>
                          </div>
                        </div>

                      </div>
                      <div class="form-group col-md-3">
                        <label for="example-email">จำกัดเวลา (วินาที.) </label>
                        <input disabled class="form-control" type="number" name="time_limit" id="time_limit" min="0" OnKeyPress="return check_num(this)">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="example-email">รูปแบบคำตอบ</label>
                      <div class="row"> 
                        <div class="form-group col-md-8">
                          <select disabled class="form-control " name="type_answer" id="type_answer">
                            <option value="1">Choice</option>
                            <option value="2">checkbox</option>
                            <option value="3">Text (Single line)</option>
                            <option value="4">Text (multi line) </option>
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                          
                        </div>
                      </div>
                    </div>

                                                        <div class="p-20">

                                    <div class="form-group"><div class="col-lg-3 col-md-12 m-b-20" id="div_img_quiz_question"></div>
                                      <label for="example-email">คำถาม </label>
                                      <div class="input-group">
                                          <div class="input-group-prepend">
                                            <button class="btn btn-default pull-righ " style="transition: 0.4s; ">
                                              <img class="flag-lang" src="img/th-fl.png" width="22" height="15" > 
                                            </button>
                                          </div>
                                          <input disabled onkeyup ="disabled_btn_add_question()" type="text" class="form-control quiz_question_name" id="quiz_name_th_question" name="quiz_name_th_question" placeholder="ภาษาไทย">
                                          <input disabled  type="hidden" class="form-control" id="quiz_question_name_th_taxteditor" name="quiz_question_name_th_taxteditor" placeholder="quiz_name_th_taxteditor">
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
                                        <input disabled  type="text" class="form-control quiz_question_name" id="quiz_question_name_en" name="quiz_question_name_en" placeholder="ภาษาอังกฤษ">
                                        <input disabled  type="hidden" class="form-control" id="quiz_question_name_en_taxteditor" name="quiz_question_name_en_taxteditor" placeholder="ภาษาอังกฤษ">
                                        <div class="input-group-prepend">
                                               <button disabled onclick="open_modal_pic('div_img_quiz_question')" data-toggle="modal" data-target="#modal_add_quiz_question_pic" type="button" class="btn btn-default pull-righ open_pic_question" style="transition: 0.4s; " id=""  ><i class="mdi mdi-image"> </i> </button>
                                          </div>
                                      </div>
                                      </div>

                                    

<div id="education_fields" class="div_answer_all" style="max-height: 350px;overflow-x: hidden ;overflow-y: auto">
                    <div class="form-group removeclass_1 " id="div_answer_1">
                      <label for="example-email">คำตอบ</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <button class="btn btn-default pull-righ " style="transition: 0.4s; ">
                              <img class="flag-lang" src="img/th-fl.png" width="22" height="15" > 
                            </button>
                        </div>
                        <input disabled onfocus="open_editor_answer('1')" class="form-control" type="text" name="answer[]" id="answer_1">
                        <input disabled type="hidden" name="editor_answer[]" id="editor_answer_1">
                        <div class="input-group-prepend">
                          <button onclick="remove_education_fields('_1');"  type="button" class="btn btn-default pull-right " style="transition: 0.4s; " id=""  > <i class="mdi mdi-delete"> </i> </button>
                          <div class="btn btn-default pull-right " style="background: #dcdcdc"><i class="mdi mdi-cursor-move"></i></div>
                          
                        </div>

                      </div>
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <button class="btn btn-default pull-righ " style="transition: 0.4s; ">
                              <img class="flag-lang" src="img/en-fl.jpg" width="22" height="15" > 
                            </button>
                        </div>
                        <input disabled onfocus="open_editor_answer('1')" class="form-control" type="text" name="answer_en[]" id="answer_en_1">
                        <input disabled type="hidden" name="editor_answer_en[]" id="editor_answer_en_1">
                        <div class="input-group-prepend">
                          <button data-toggle="modal" data-target="#modal_add_quiz_question_editor" type="button" class="btn btn-default pull-right " onclick="open_editor_answer('1');" style="transition: 0.4s; " id=""  > <i class="mdi mdi-border-color"> </i> </button>

                          <button disabled onclick="open_modal_pic('div_img_quiz_question_1')" data-toggle="modal" data-target="#modal_add_quiz_question_pic" type="button" class="btn btn-default pull-righ open_pic_question" style="transition: 0.4s; " id=""  ><i class="mdi mdi-image"> </i> </button>
                        </div>

                      </div>


                      <div class="col-lg-3 col-md-12 m-b-20 div_img_answer" id="div_img_quiz_question_1"></div>
                      <input type="checkbox" disabled name="correct_flg[]" onchange="checkbox_val_add(1)" id="correct_flg_1"  class=" filled-in chk-col-light-blue" /><label for="correct_flg_1">คำตอบที่ถูกต้อง</label>
                      <input disabled type="hidden" name="correct_flg_val[]" id="correct_flg_val_add_<?php echo $i ?>" value="0">
                    </div>

     
                   
</div>

                                     
                                    </div>


                     

                  
              </div> 
              <div class="boxsave" id="" align="center">


                <button type = "button" class = "btn btn-default" data-dismiss = "modal">ปิด</button>


              </div>  
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<div class="modal fade" id="modal_edit_content_question" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div id="div_add" class="col-md-12" style="<?php echo $button_create ?>">
        <div class="card card-body" >
          <div class="box-header with-border">
            <h3 class="box-title" id="">แก้ไขคำถาม</h3>
          </div>
          <div class="box-body" style="padding: 0;">
            
              <form id="question_edit">
                <input type="hidden" name="form" value="question_edit">
                <input type="hidden" name="id_question_edit" id="id_question_edit">
                  <div class="col-md-12" id="div_edit_question" >
                      
                  </div> 
                </form>
              <div class="boxsave" id="" align="center">


                <button type = "button" class = "btn btn-default" data-dismiss = "modal">ปิด</button>


              </div>  
        
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="modal_add_quiz_question_editor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div id="div_add" class="col-md-12" style="">
        <div class="card card-body" >
          <div class="box-header with-border">
            <h3 class="box-title" id="">Advanced Editor</h3>
          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="form_add_quiz_editor" id="form_add_quiz_question_editor" method="post">
              <input type="hidden" name="form" value="form_add_quiz_question_editor">
              
              
                  <div class="col-md-12">
                        <div class="card">
                            <div class="card-body p-b-0">
                               
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs customtab" role="tablist">
                                <li class="nav-item"> 
                                  <a class="nav-link active" id="head_thai_quiz_question" data-toggle="tab" href="#thai_quiz_question_editor" role="tab">
                                    <img class="flag-lang" src="img/th-fl.png" width="22" height="15" > ภาษาไทย
                                  </a> 
                                </li>
                                <li class="nav-item"> 
                                  <a class="nav-link" id="head_english_quiz_question" data-toggle="tab" href="#english_quiz_question_editor" role="tab">
                                    <img class="flag-lang" src="img/en-fl.jpg" width="22" height="15" > ภาษาอังกฤษ
                                  </a> 
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="thai_quiz_question_editor" role="tabpanel">
                                    <div class="p-20">

                                      <div class="form-group">
                                        <textarea class="form-control edit" id="quiz_question_editor_th" name="quiz_question_editor_th"></textarea>
                                      </div>

                                     
                                    </div>
                                </div>
                                <div class="tab-pane  p-20" id="english_quiz_question_editor" role="tabpanel">

                                    <div class="form-group">
                                        <textarea class="form-control edit" id="quiz_question_editor_en" name="quiz_question_editor_en"></textarea>
                                      </div>

                                      
                                </div>

                              
                                     

                            </div>
                        </div>
                    </div>

                    

                   
              </div> 
              <div class="boxsave" id="" align="center">
<input type="hidden" name="name_div_editor" id="name_div_editor">
                
                <button type = "button" class = "btn btn-default" data-dismiss = "modal">ปิด</button>


              </div>  
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="modal_add_quiz_question_pic" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div id="div_add" class="col-md-12" style="">
        <div class="card card-body" >
          <div class="box-header with-border">
            <h3 class="box-title" id="">Add Picture</h3>
          </div>
          <div class="box-body" style="padding: 0;">
            
              <form id="quiz_question_pic">
                <input type="hidden" name="form" value="quiz_question_pic">
                <input type="hidden" name="name_div" id="name_div">
                <input type="hidden" name="name_directory" id="name_directory">
                  <div class="col-md-12">
                      <div class="form-group col-md-12">
                          <div class="card">
                            <div class="card-body ">
                              <label for="input-file-now">อัพโหลดรูปภาพ</label>
                              <div id="div_input_file_img">
                                <input disabled="" accept="image/*" type="file" id="name_img_quiz_question" class="dropify" name="name_img_quiz_question"  />
                              </div>
                            </div>
                          </div>
                        </div>
                  </div> 
                </form>
              <div class="boxsave" id="" align="center">


                <button type = "button" class = "btn btn-default" data-dismiss = "modal">ปิด</button>


              </div>  
        
          </div>
        </div>
      </div>

    </div>
  </div>
</div>



</div> 





                                </div>
                                <div class="tab-pane p-20" id="opinion" role="tabpanel">
                                
      <div id="div_add" class="col-md-12" >
        <div class="card card-body" >
          <div class="box-header with-border">
            <h3 class="box-title" id="">ความคิดเห็นผู้เรียน</h3>
          </div>
          <div class="box-body" style="padding: 0;">
            
              <form id="quiz_question_pic">
                <input type="hidden" name="form" value="quiz_question_pic">
                <input type="hidden" name="name_div" id="name_div">
                <input type="hidden" name="name_directory" id="name_directory">
                  <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-4 " >

                          <div class="form-group " align="center" style="padding-top: 50%;padding-bottom : 50%;" id="AVG_score_div">
                            
                            
                          </div>

                        </div>

                        <div class="col-md-8">
                          <div class="col-md-12 p-r-40 m-t-30 m-b-30" id="div_reviwe_group">
                                        
                                        
                          </div>
                        </div>
                        
                  </div> 
                </div>
                <div class="col-md-12">
                  <div class="col-md-12 p-20" id="reviwe_div">
                       
                      
                </div>

                
                </form>
             
        
          </div>
        </div>
      </div>
                              </div>

                            </div>
                        </div>
                    </div>
                </div>


                  
                    

              </div>
</div>
                <!-- End PAge Content -->
                






<input type="hidden" name="per_button_edit" id="per_button_edit" value="<?php echo $button_update ?>">
<input type="hidden" name="per_button_del" id="per_button_del" value="<?php echo $button_delete ?>">
<input type="hidden" name="per_button_open" id="per_button_open" value="<?php echo $button_create ?>">
<input type="hidden" name="per_input_read" id="per_input_read" value="<?php echo $button_view ?>">
<?php include('../template/footer.php');?>

<script type="text/javascript" src="js/javascript_show.js"></script>
<script src="js/ion.rangeSlider-init.js"></script>
<script type="text/javascript" src="js/mask.js"></script>




<script type="text/javascript">


  div_reviwe();
  AVG_score();
  div_reviwe_group();


  $('.slimtest1').slimScroll({
        height: '150px'
    });
   $('.div_answer_all').sortable();
  $(".select2").select2();
  $(function() {
        $('.grid-stack').gridstack({
            width: 12,
            alwaysShowResizeHandle: /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
            resizable: {
                handles: 'e, se, s, sw, w'
            }
        });
    });

  $('.daterange').daterangepicker({
    showDropdowns: true,
    locale: {
          format: 'DD/MM/YYYY'
        },
  });

  $('.singledate').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
              format: 'DD/MM/YYYY'
            }
  });



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

$('.dropify').dropify({
          messages: {

        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    },
    tpl: {
    
    message:     '<div class="dropify-message" ><span class="file-icon" /> <p style="text-align: center;">{{ default }}</p></div>',
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


  $(".bt-switch input[type='checkbox'], .bt-switch input[type='radio']").bootstrapSwitch();
    var radioswitch = function() {
        var bt = function() {
            $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioState")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck")
            }), $(".radio-switch").on("switch-change", function() {
                $(".radio-switch").bootstrapSwitch("toggleRadioStateAllowUncheck", !1)
            })
        };
        return {
            init: function() {
                bt()
            }
        }
    }();
    $(document).ready(function() {
        radioswitch.init()
    });


</script>



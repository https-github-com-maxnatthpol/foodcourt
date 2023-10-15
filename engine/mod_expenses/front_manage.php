<?php include('../template/header.php'); ?>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<?php require_once('../template/menu.php'); ?>
<!-- ============================================================== -->


<?php
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';
$db = new DB();
?>

<!--alerts CSS -->

<style>
  .oncard-header {
    border-top: solid #ffb22b;
  }
</style>
<style type="text/css">
  #text_center {
    text-align: center;
  }

  #text_right {
    text-align: right;
  }

  #text_left {
    text-align: left;
  }
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
        <h3 class="text-themecolor m-b-0 m-t-0">จัดการรายจ่าย</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void(0)" onclick="history.back()">Home</a></li>
          <li class="breadcrumb-item active">จัดการรายจ่าย</li>
        </ol>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
      <div class="col-md-6">
        <div class="card card-body">
          <div class="box-header with-border">
            <div class="row">
              <div class="col-md-6" align="left">
                <h3 class="box-title">รายการ</h3>
              </div>
              <div class="col-md-6" align="right">

                <?php
                if ($button_create == '') {
                ?>
                  <button data-toggle="modal" data-target="#modal_add" type="button" class="btn btn-success pull-right" style="transition: 0.4s; <?php echo $button_create; ?>" id="add_btn"> <i class="fa fa-plus"></i> เพิ่มเมนู / โปร </button>
                <?php
                }

                ?>
              </div>
            </div>
          </div>
          <div class="box-body" style="padding: 0;">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs profile-tab" role="tablist">
              <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">เครื่องดื่ม</a> </li>
              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false">อาหาร</a> </li>
              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-selected="false">แรงงาน</a> </li>
              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings4" role="tab" aria-selected="false">อื่นๆ</a> </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active show" id="home" role="tabpanel">
                <div class="card-body">
                  <form action="" name="form_add_type1" id="form_add_type1" method="post">
                    <input type="hidden" name="form" value="form_add_type1">

                    <div id="div_form_add_type1">

                      <div class="row">

                        <div class="col-md-6">

                          <div class="form-group">
                            <label>ชื่อเครื่องดื่ม</label>
                            <select class="form-control" name="mod_menu" id="mod_menu">
                              <option value="0">-- กรุณาเลือก--</option>
                              <?php
                              $strSQL = "SELECT `id`,`name`, `price`,`status`, `mod_stock_type` , `mod_employee` 
                              FROM `mod_menu` 
                              WHERE `status`='1'
                              AND `mod_stock_type`='1'
                              AND `id`!='nbdc2b9f67fb94814ef04c420c3a995b00j'
                              ORDER BY `date_action` ASC;
                              ";
                              $objQuery = $db->Query($strSQL);
                              while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
                                if ($objResult["id"] != 3 && $objResult["id"] != 4) {
                                  echo '<option value="' . $objResult["id"] . "/" . $objResult["name"] . '">' . $objResult["name"] . '</option>';
                                }
                              }
                              ?>

                            </select>
                          </div>

                        </div>

                        <div class="col-md-6">

                          <div class="form-group">
                            <label for="example-email">จำนวน </label>
                            <div class="input-group">
                              <input type="number" class="form-control" name="quantity" id="quantity">
                              <div class="input-group-append">
                                <span class="input-group-text">ขวด</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-email"> ราคารวม </label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                              </div>
                              <input type="number" class="form-control" name="price" id="price">
                              <div class="input-group-append">
                                <span class="input-group-text">บาท</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-email"><i class="fas fa-calendar"></i> วันที่</label>
                            <div class="input-group mb-3">

                              <input type="text" class="form-control pull-right" id="date_action" data-provide="datepicker" data-date-language="th-th" name="date_action" value="<?php echo date("Y-m-d"); ?>" placeholder="วัน/เดือน/ปี">
                              <div class="input-group-append">
                                <span class="input-group-text">
                                  <span class="ti-calendar"></span>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>จ่ายเงินเป็น </label>
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
                      <div align="right">
                        <button type="button" class="btn btn-info  btnSendadd_type1" id="btnSendadd_type1" style="transition: 0.4s; margin-left: 5px;"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;บันทึก</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!--second tab-->
              <div class="tab-pane" id="profile" role="tabpanel">
                <div class="card-body">
                  <div id="fetch_data_table_mamu_2"></div>
                </div>
              </div>
              <div class="tab-pane" id="settings" role="tabpanel">
                <div class="card-body">
                  <div id="fetch_data_table_mamu_5"></div>
                </div>
              </div>
              <div class="tab-pane" id="settings4" role="tabpanel">
                <div class="card-body">
                  <div id="fetch_data_table_mamu_5"></div>
                </div>
              </div>
            </div>
            </form>
          </div>
        </div>

      </div>

      <div class="col-md-6">
        <div class="card card-body">
          <div class="box-header with-border">
            <div class="row">
              <div class="col-md-6" align="left">
                <h3 class="box-title">รายการรายจ่ายวันนี้</h3>
              </div>
              <div class="col-md-6" align="right">

                <?php
                if ($button_create == '') {
                ?>
                  <button type="button" class="btn btn-warning pull-right" style="transition: 0.4s; <?php echo $button_create; ?>" onclick="history.back()"> <i class="fas fa-arrow-left"></i> กลับหน้าบิล </button>
                <?php
                }

                ?>
              </div>
            </div>
          </div>
          <div class="box-body" style="padding: 0;">
          <div id="div_table"></div>
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
<input type="hidden" name="per_input_read" id="per_input_approval" value="<?php echo $button_approval ?>">
<?php include('../template/footer.php'); ?>

<script type="text/javascript" src="js/javascript.js"></script>
<script src="../../plugins_b/bootstrap-datepicker-custom/js/bootstrap-datepicker.js"></script>
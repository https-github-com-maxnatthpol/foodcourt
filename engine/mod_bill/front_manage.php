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
        <h3 class="text-themecolor m-b-0 m-t-0">บิล</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:location.href='../index.php'">Home</a></li>
          <li class="breadcrumb-item active">บิล</li>
        </ol>
      </div>

    </div>
    <div class="">
      <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
    </div>

    <div class="row">

      <div class="col-md-12">
        <div class="card card-body">
          <div class="box-header with-border">
            <div class="row">
              <div class="col-md-6" align="left">
                <h3 class="box-title">จัดการบิล</h3>
              </div>
              <div class="col-md-6" align="right">

                <?php
                if ($button_create == '') {
                ?>
                  <button data-toggle="modal" data-target="#modal_add" type="button" class="btn btn-success pull-right" style="transition: 0.4s; <?php echo $button_create; ?>" id="add_btn"> <i class="fa fa-plus"></i> เปิดบิลใหม่ </button>
                <?php
                }

                ?>
              </div>
            </div>
          </div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="frmMain" id="frmMain" method="post">
              <div id="div_table_list"></div>
              <div class="boxsave" id="box-del-list">

                <?php
                if ($button_delete == '') {
                ?>
                  <button type="button" class="delmulti-menu btn btn-danger" style="transition: 0.4s; <?php echo $button_del; ?>" id="MultiDelete" disabled data-id="Delete"><i class="fa fa-remove"></i> ลบรายการที่เลือก <span class="num_"></span></button>
                <?php
                }

                ?>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Row -->
      <!-- ============================================================== -->
    </div>
  </div>
  <!-- End PAge Content -->



  <div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div id="div_edit"></div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div id="div_add" class="col-md-12" style="<?php echo $button_create ?>">
          <div class="card card-body">
            <div class="box-header with-border">
              <h3 class="box-title">เปิดบิลใหม่</h3>
            </div>
            <div class="box-body" style="padding: 0;">
              <form action="" name="form_add" id="form_add" method="post">
                <input type="hidden" name="form" value="form_add">

                <div id="div_form_add">
                  
                  <div class="row">

                    <div class="col-md-6">

                      <div class="form-group">
                        <label>บิล / โต๊ะ </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="กรอกชื่อ บิล / โต๊ะ">
                      </div>

                    </div>

                    <div class="col-md-6">

                      <div class="form-group">
                        <label>วันเวลาที่เปิด </label>
                        <?php date_default_timezone_set("Asia/Bangkok"); ?>
                        <input type="text" class="form-control"  value="<?php echo date("d/m/Y เวลา H:i");?>" placeholder="กรอกเวลา" disabled>
                      </div>
                    </div>
                    <div class="col-md-6">

                      <div class="form-group">
                        <label >ผู้เปิดบิล </label>
                        <input type="text" class="form-control" value="<?php echo $_SESSION['name'];?>" placeholder="กรอกเวลา" disabled>
                      </div>

                    </div>

                  </div>



                </div>
                <div class="boxsave" id="box-del-list" align="center">

                  <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>

                  <button type="button" class="btn btn-info  btnSendAdd" id="btnSendAdd" style="transition: 0.4s; margin-left: 5px;"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;บันทึก</button>


                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <input type="hidden" name="per_button_edit" id="per_button_edit" value="<?php echo $button_update ?>">
  <input type="hidden" name="per_button_del" id="per_button_del" value="<?php echo $button_delete ?>">
  <input type="hidden" name="per_button_open" id="per_button_open" value="<?php echo $button_create ?>">
  <input type="hidden" name="per_input_read" id="per_input_read" value="<?php echo $button_view ?>">
  <input type="hidden" name="per_input_read" id="per_input_approval" value="<?php echo $button_approval ?>">
  <?php include('../template/footer.php'); ?>



  <script type="text/javascript" src="js/javascript.js"></script>
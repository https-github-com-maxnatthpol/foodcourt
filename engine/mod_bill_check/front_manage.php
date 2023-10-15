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
        <h3 class="text-themecolor m-b-0 m-t-0">เช็คบิล</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:location.href='../index.php'">Home</a></li>
          <li class="breadcrumb-item active">เช็คบิล</li>
        </ol>
      </div>

    </div>
    <div class="">
      <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
    </div>

    <div class="row">

      <div class="col-md-12">
        <div class="ribbon-wrapper card">
          <div class="ribbon ribbon-bookmark ribbon-info"><i class="mdi mdi-calculator"></i> เช็คบิล</div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="frmMain" id="frmMain" method="post">
              <div id="div_table_list"></div>
              <div class="boxsave" id="box-del-list">
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Row -->
      <!-- ============================================================== -->
    </div>
    <div class="row">

      <div class="col-md-12">
        <div class="ribbon-wrapper card">
          <div class="ribbon ribbon-bookmark ribbon-warning"><i class="fas fa-history"></i> รายการที่เช็คบิลแล้ว</div>
          <div class="box-body" style="padding: 0;">
            <form action="" name="frmMain" id="frmMain" method="post">
              <div id="div_table_list_history"></div>
              <div class="boxsave" id="box-del-list">
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

  <div class="modal fade" id="modal_bill_check" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div id="bill_check"></div>

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
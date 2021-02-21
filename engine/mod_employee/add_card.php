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
                <h3 class="text-themecolor m-b-0 m-t-0">เพิ่มบัตร</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">บัตร</a></li>
                    <li class="breadcrumb-item active">เพิ่มบัตร</li>
                </ol>
            </div>
            <div class="col-md-7 col-4 align-self-center">
                <div class="d-flex m-t-10 justify-content-end">
                    <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                        <div class="chart-text m-r-10">
                            <h6 class="m-b-0"><small>ยอดเติมเงิน วันนี้</small></h6>
                            <h4 class="m-t-0 text-info">$58,356</h4>
                        </div>
                    </div>
                    <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                        <div class="chart-text m-r-10">
                            <h6 class="m-b-0"><small>ยอดเติมเงิน เดือนนี้</small></h6>
                            <h4 class="m-t-0 text-primary">$48,356</h4>
                        </div>
                    </div>
                    <div class="">
                        <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-body">
                    <h4 class="card-title">เพิ่มบัตร</h4>
                    <h6 class="card-subtitle">เพิ่มบัตร</h6>
                    <form action="" name="form_add_card" id="form_add_card" method="post" class="form-horizontal m-t-40">
                    <input type="hidden" name="form" value="form_add_card">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="card_number" placeholder="" value="640200010000001">
                                <div class="input-group-append">
                                    <button class="btn btn-info" type="button">สุ่มบัตร</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                        <button type="button" class="btn btn-success  btnSendAddCard" id="btnSendAddCard" style="transition: 0.4s; margin-left: 5px;"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;บันทึก</button>
                        </div>
                        <script>
function keyEnter(even) {
 
    if( even.keyCode == 13 ) {
     
        document.getElementById('text').value = "You Press Key Enter";
     
    }
     
}
</script>
 
<input type='text' id='text' onkeypress='return keyEnter(event)' />
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End PAge Content -->


<?php include('../template/footer.php'); ?>

<script type="text/javascript" src="js/javascript.js"></script>
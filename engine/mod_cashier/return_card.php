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
                <h3 class="text-themecolor m-b-0 m-t-0">คืนบัตร</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">คืนบัตร</li>
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
            <div class="col-md-6">
                <div class="card card-body">
                    <h3 class="box-title m-b-0"> สแกนบาร์โค้ด </h3>
                    <p class="text-muted m-b-30 font-13"> *สแกนบาร์โค้ดเพื่อคืนบัตร </p>
                    <hr class="m-t-0 m-b-40">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form action="" name="form_return_card" id="form_return_card" method="post">
                                <input type="hidden" name="form" value="form_return_card">
                                <!--ตั้งค่าการพิมพ์ -->
                                <input type="hidden" name="form" value="printslip_return_card">
                                <input type="hidden" name="ip" value="printslip_return_card">
                                <input type="hidden" name="printname" value="printslip_return_card">

                                <!--ตั้งค่าการพิมพ์ -->
                                <input type="hidden" name="amount_r" id="amount_r" value="">
                                <div class="form-group">
                                    <input type="text" id="card_number_r" name="card_number_r" class="form-control" maxlength="15" placeholder="" OnKeyPress="return chkNumber(this)" autocomplete="off" autofocus>
                                    <div class="col-md-12" id="card_number_r_alert">
                                        <small id="a_card_number_r" style="color: #fafafa;"></small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">จำนวนเงินที่ต้องคืน </label>
                                            <div class="input-group">
                                            <h1 style="color: red;"><p id="amount_t" class="form-control-static"> - </p></h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label class="control-label">&nbsp;</label>
                                                <div class="input-group">
                                                <button type="button" class="btn btn-success  btnSendReturnCard" id="btnSendReturnCard" style="transition: 0.4s; margin-left: 5px;"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;ยืนยัน</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-body">
                    <h3 class="box-title m-b-0">ข้อมูลบัตร</h3>
                    <p class="text-muted m-b-30 font-13"> *ตรวจสอบความถูกต้องของข้อมูลก่อนยืนยัน </p>
                    <form class="form-horizontal" role="form">
                        <div class="form-body">
                            <hr class="m-t-0 m-b-40">
                            <!--row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">หมายเลขบัตร:</label>
                                        <div class="col-md-9">
                                            <p id="number" class="form-control-static"> - </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <!--row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">เงินคงเหลือ:</label>
                                        <div class="col-md-9">
                                            <p id="amount" class="form-control-static"> - </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <!--row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">วันที่ออกบัตร:</label>
                                        <div class="col-md-9">
                                            <p id="Issue_date" class="form-control-static"> - </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <!--row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">ผู้ออกบัตร:</label>
                                        <div class="col-md-9">
                                            <p id="employee" class="form-control-static"> - </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <!--row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">สถานะบัตร:</label>
                                        <div class="col-md-9">
                                            <p id="status" class="form-control-static"> - </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
<!-- End PAge Content -->

<?php include('../template/footer.php'); ?>

<script type="text/javascript" src="js/javascript.js"></script>
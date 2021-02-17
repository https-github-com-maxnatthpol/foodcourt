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
                <h3 class="text-themecolor m-b-0 m-t-0">ซื้อบัตร / เติมเงิน</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">ซื้อบัตร / เติมเงิน</li>
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
                    <p class="text-muted m-b-30 font-13"> *สแกนบาร์โค้ดเพื่อเติมเงิน </p>
                    <hr class="m-t-0 m-b-40">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="เลขบัตร" autofocus>
                                        <div class="input-group-append">
                                            <button class="btn btn-warning" type="button">ลบ</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">จำนวนเงิน </label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">รับเงิน </label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">เงินทอน </label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label class="control-label">&nbsp;</label>
                                                <div class="input-group">
                                                <button type="submit" class="btn btn-info">ยืนยัน</button>
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
                                        <label class="control-label text-right col-md-3">ID:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> 0001 </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <!--row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">จำนวนเงิน:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> 7,150 บาท </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <!--row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">สถานะ:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static"> ระงับการใช้งาน </p>
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
                                            <p class="form-control-static"> 01/11/2564 </p>
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
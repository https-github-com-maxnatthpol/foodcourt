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
                    <div class="ribbon ribbon-bookmark ribbon-info"><i class="mdi mdi-calculator"></i> สแกนบาร์โค้ด</div>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form action="" name="form_buy_card" id="form_buy_card" method="post">
                                <input type="hidden" name="form" value="form_buy_card">
                                <!--ตั้งค่าการพิมพ์ -->
                                <input type="hidden" name="print" value="printslip_buy_card">
                                <?php
                                $sql = "SELECT `ip_cashier`,print_cashier FROM mod_cashier WHERE `id_cashier` =  '" . $_SESSION["id_data"] . "'";
                                $query = $db->Query($sql);
                                $result = mysqli_fetch_array($query);
                                $result[0];
                                ?>
                                <input type="hidden" id="PRINT_HOST" name="PRINT_HOST" value="<?= constant("PRINT_HOST"); ?>">
                                <input type="hidden" name="ip" value="<?=$result[0]?>">
                                <input type="hidden" name="printname" value="<?=$result[1]?>">

                                <input type="hidden" name="SESSION_name" value="<?= $_SESSION['name'] ?>">
                                <!--ตั้งค่าการพิมพ์ -->
                                <div class="form-group">
                                    <input type="text" id="card_number" name="card_number" class="form-control" maxlength="18" placeholder="" OnKeyPress="return chkNumber(this)" autocomplete="off" autofocus>
                                    <div class="col-md-12" id="card_number_alert">
                                        <small id="a_card_number" style="color: #fafafa;"></small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">จำนวนเงิน </label>
                                            <div class="input-group">
                                                <input type="number" id="amount_f" name="amount_f" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">เงินที่ได้รับ </label>
                                            <div class="input-group">
                                                <input type="number" id="receive_money" name="receive_money" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label class="control-label">&nbsp;</label>
                                                <div class="input-group">
                                                    <button type="button" class="btn btn-success  btnSendฺBuyCard" id="btnSendฺBuyCard" style="transition: 0.4s; margin-left: 5px;"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;ยืนยัน</button>
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
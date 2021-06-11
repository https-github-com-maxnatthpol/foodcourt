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
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->

        <div class="row">
            <div class="col-md-5">
                <div class="ribbon-wrapper card">
                    <div class="ribbon ribbon-bookmark ribbon-danger"><i class="mdi mdi-calculator"></i> สแกนบัตร</div>
                    <label for="example" class="text"><i class="mdi mdi-credit-card"></i> รหัสบัตร </label>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form action="" name="form_return_card" id="form_return_card" method="post">
                                <input type="hidden" name="form" value="form_return_card">
                                <!--ตั้งค่าการพิมพ์ -->
                                <input type="hidden" name="print" value="printslip_return_card">
                                <input type="hidden" name="SESSION_name" value="<?= $_SESSION['name'] ?>">
                                <?php
                                $sql = "SELECT `ip_cashier`,print_cashier FROM mod_cashier WHERE `id_cashier` =  '" . $_SESSION["id_data"] . "'";
                                $query = $db->Query($sql);
                                @$result = mysqli_fetch_array($query);
                                $result[0];
                                ?>
                                <input type="hidden" id="PRINT_HOST" name="PRINT_HOST" value="<?= constant("PRINT_HOST"); ?>">
                                <input type="hidden" name="ip" value="<?= $result[0] ?>">
                                <input type="hidden" name="printname" value="<?= $result[1] ?>">
                                <!--ตั้งค่าการพิมพ์ -->

                                <input type="hidden" name="amount_r" id="amount_r" value="">

                                <div class="form-group">
                                    <input type="text" id="card_number_r" name="card_number_r" class="form-control" maxlength="18" placeholder="" OnKeyPress="return chkNumber(this)" autocomplete="off" autofocus>
                                    <div class="col-md-12" id="card_number_r_alert">
                                        <small id="a_card_number_r" style="color: #fafafa;"></small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">หมายเลขบัตร </label>
                                            <div class="input-group">
                                                <h2>
                                                    <p id="number" class="form-control-static"> - </p>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">วันหมดอายุ </label>
                                            <div class="input-group">
                                                <h2>
                                                    <p id="expiry_date" class="form-control-static"> - </p>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">จำนวนเงินที่ต้องคืน </label>
                                            <div class="input-group">
                                                <h2>
                                                    <p id="amount_t" class="form-control-static"> - </p>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-danger  btnSendReturnCard" id="btnSendReturnCard" style="transition: 0.4s; margin-left: 5px;"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;ยืนยัน</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="ribbon-wrapper card">
                    <div class="ribbon ribbon-bookmark ribbon-danger"><i class="mdi mdi-calculator"></i> ข้อมูลการทำธุรกรรมวันนี้</div>
                    <div id="div_table_list"></div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End PAge Content -->

<?php include('../template/footer.php'); ?>

<script type="text/javascript" src="js/javascript.js"></script>
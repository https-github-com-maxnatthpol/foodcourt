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
                <h3 class="text-themecolor m-b-0 m-t-0">Gift Card</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Gift Card</li>
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
                    <div class="ribbon ribbon-bookmark ribbon-primary"><i class="mdi mdi-calculator"></i> สแกนบัตร</div>
                    <label for="example" class="text"><i class="mdi mdi-credit-card"></i> รหัสบัตร </label>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form action="" name="form_buy_card" id="form_buy_card" method="post">
                                <input type="hidden" name="form" value="form_buy_card">
                                <!--ตั้งค่าการพิมพ์ -->
                                <input type="hidden" name="print" value="printslip_buy_card">
                                <?php
                                $sql = "SELECT `ip_cashier`,print_cashier FROM mod_cashier WHERE `id_cashier` =  '" . $_SESSION["id_data"] . "'";
                                $query = $db->Query($sql);
                                @$result = mysqli_fetch_array($query);
                                ?>
                                <input type="hidden" id="PRINT_HOST" name="PRINT_HOST" value="<?= constant("PRINT_HOST"); ?>">
                                <input type="hidden" name="ip" value="<?= $result[0] ?>">
                                <input type="hidden" name="printname" value="<?= $result[1] ?>">

                                <input type="hidden" name="SESSION_name" value="<?= $_SESSION['name'] ?>">
                                <!--ตั้งค่าการพิมพ์ -->
                                <div class="form-group">
                                    <input type="text" id="card_number" name="card_number" class="form-control" maxlength="18" placeholder="" OnKeyPress="return chkNumber(this)" autocomplete="off" autofocus>
                                    <div class="col-md-12" id="card_number_alert">
                                        <small id="a_card_number" style="color: #fafafa;"></small>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">จำนวนเงิน </label>
                                            <div class="input-group">
                                                <input type="number" id="amount" name="amount" class="form-control" placeholder="" autocomplete="off" value="100">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="control-label">วันที่เริ่มต้น - วันที่สิ้นสุด</label>
                                            <div class="input-group">

                                                <input type="text" class="form-control daterange" name="start_to_end_date" id="start_to_end_date">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <span class="ti-calendar"></span>
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">หมายเลขบัตร </label>
                                            <div class="input-group">
                                                <h2>
                                                    <p id="number" class="form-control-static"> - </p>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">เงินคงเหลือ </label>
                                            <div class="input-group">
                                                <h2>
                                                    <p id="amount_r" class="form-control-static"> - </p>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">ประเภทบัตร </label>
                                            <div class="input-group">
                                                <h2>
                                                    <p id="status" class="form-control-static"> - </p>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <button type="button" class="btn btn-success  btnSendฺBuyCard" id="btnSendฺBuyCard" style="transition: 0.4s; margin-left: 5px;"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;ยืนยัน</button>
                                            </div>
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
                    <div class="ribbon ribbon-bookmark ribbon-primary"><i class="mdi mdi-calculator"></i> ข้อมูล Gift Card</div>
                    <div id="div_table_list"></div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End PAge Content -->


<?php include('../template/footer.php'); ?>

<script type="text/javascript" src="js/javascript.js"></script>
<script type="text/javascript">

  $(function () {

        function openWindowWithPost(url, date) {
            var form = document.createElement("form");
            form.target = "_blank";
            form.method = "POST";
            form.action = url;
            form.style.display = "none";

            var input = document.createElement("input");
            input.type = "hidden";
            input.name = "date";
            input.value = date;
            form.appendChild(input);

            document.body.appendChild(form);
            form.submit();
            document.body.removeChild(form);
        }

        moment.locale('th');
        $('.daterange').daterangepicker({

            showDropdowns: true,
            alwaysShowCalendars: true,
            startDate:moment(),
            endDate:  moment().add(1, 'days'),
            autoApply : true,
            ranges: {
                '2 วัน': [moment(), moment().add(2, 'days')],
                '3 วัน': [moment(), moment().add(3, 'days')],
                '4 วัน': [moment(), moment().add(4, 'days')],
                '5 วัน': [moment(), moment().add(5, 'days')],
                '6 วัน': [moment(), moment().add(6, 'days')],
                '7 วัน': [moment(), moment().add(7, 'days')]
            }
        });
    });
    
</script>
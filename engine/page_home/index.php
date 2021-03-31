<?php
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';
$db = new DB();
?>
<?php include('../template/header.php'); ?>
<style>
    .ct-series-a .ct-bar,
    .ct-series-a .ct-line,
    .ct-series-a .ct-point,
    .ct-series-a .ct-slice-donut {
        stroke: #26C6DA;
    }

    .ct-series-b .ct-bar,
    .ct-series-b .ct-line,
    .ct-series-b .ct-point,
    .ct-series-b .ct-slice-donut {
        stroke: #1E88E5;
    }

    .ct-chart {
        margin: auto;
        width: 360px;
        height: 360px;
    }
</style>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<?php include('../template/menu.php'); ?>
<!-- ============================================================== -->
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
                <h3 class="text-themecolor">แดชบอร์ด</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:location.href='../index.php'">หน้าแรก</a></li>
                    <li class="breadcrumb-item active">แดชบอร์ด</li>
                </ol>
            </div>
            <div class="col-md-7 col-4 align-self-center">
                <div class="d-flex m-t-10 justify-content-end">
                    <!--
                    <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                        <div class="chart-text m-r-10">
                            <h6 class="m-b-0"><small>รายวัน</small></h6>
                            <h4 class="m-t-0 text-info">0</h4>
                        </div>

                    </div>
                    <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                        <div class="chart-text m-r-10">
                            <h6 class="m-b-0"><small>รายเดือน</small></h6>
                            <h4 class="m-t-0 text-primary">0</h4>
                        </div>

                    </div>
-->
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
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg align-self-center round-info"><i class="mdi mdi-book-open-page-variant"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0 font-light">
                                    <?php
                                    $date_regdate = date("Y-m-d");
                                    $sql = "SELECT SUM(`amount`) as total FROM `history_payment_shop` WHERE `date_action` = '" . $date_regdate . "' ";
                                    $objResult = $db->QueryFetchArray($sql);
                                    if ($objResult["total"] == "") {
                                        echo "฿ 0";
                                    } else {
                                        echo "฿ ".number_format($objResult["total"],2);
                                    }
                                    ?>
                                </h3>
                                <h5 class="text-muted m-b-0">ยอดขายร้านค้า</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg align-self-center round-warning"><i class="mdi mdi-cellphone-link"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0 font-lgiht">
                                <?php
                                    $date_regdate = date("Y-m-d");
                                    $sql = "SELECT SUM((amount*percent_customer)/100) as total FROM `history_payment_shop` WHERE `date_action` = '" . $date_regdate . "' ";
                                    $objResult = $db->QueryFetchArray($sql);
                                    if ($objResult["total"] == "") {
                                        echo "฿ 0";
                                    } else {
                                        echo "฿ ".number_format($objResult["total"],2);
                                    }
                                ?>
                                </h3>
                                <h5 class="text-muted m-b-0">ยอดกำไร</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg align-self-center round-primary"><i class="mdi mdi-cart-outline"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0 font-lgiht">
                                <?php
                                    $date_regdate = date("Y-m-d");
                                    $strSQL_sum_2 = "SELECT SUM(`amount`) as amount_sum
                                    FROM `data_working_card`
                                    WHERE  (data_date BETWEEN '".$date_regdate." 00:00:00' AND '".$date_regdate." 23:59:59' )
                                    AND Identity = 2";
                                    $objQuery_sum_2 = $db->Query($strSQL_sum_2); 
                                    $objResult_sum_2 = mysqli_fetch_array($objQuery_sum_2);

                                    $strSQL_sum_0 = "SELECT SUM(`amount`) as amount_sum
                                    FROM `data_working_card`
                                    WHERE  (data_date BETWEEN '".$date_regdate." 00:00:00' AND '".$date_regdate." 23:59:59' )
                                    AND Identity = 0";
                                    
                                    $objQuery_sum_0 = $db->Query($strSQL_sum_0); 
                                    $objResult_sum_0 = mysqli_fetch_array($objQuery_sum_0);

                                    $strSQL_sum_1 = "SELECT SUM(`amount`) as amount_sum
                                    FROM `data_working_card`
                                    WHERE  (data_date BETWEEN '".$date_regdate." 00:00:00' AND '".$date_regdate." 23:59:59' )
                                    AND Identity = 1";
                                    $objQuery_sum_1 = $db->Query($strSQL_sum_1); 
                                    $objResult_sum_1 = mysqli_fetch_array($objQuery_sum_1);

                                    
                                    $total = ($objResult_sum_0['amount_sum']+$objResult_sum_2['amount_sum'])-$objResult_sum_1['amount_sum'];

                                    if ($total == "") {
                                        echo "฿ 0";
                                    } else {
                                        echo "฿ ".number_format($total,2);
                                    }
                                    ?>
                                </h3>
                                <h5 class="text-muted m-b-0">ยอดเติมเงิน</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg align-self-center round-danger"><i class="ti-wallet"></i>
                            </div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0 font-lgiht">
                                <?php
                                    $date_regdate = date("Y-m-d");
                                    $sql = "SELECT SUM(`amount`) as total FROM `card` WHERE `status` = 1 ";
                                    $objResult = $db->QueryFetchArray($sql);
                                    if ($objResult["total"] == "") {
                                        echo "฿ 0";
                                    } else {
                                        echo "฿ ".number_format($objResult["total"],2);
                                    }
                                    ?>
                                </h3>
                                <h5 class="text-muted m-b-0">ยอดเงินในบัตร</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->

        <div class="row">
            <!-- Column -->
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex flex-wrap">
                                    <div>
                                        <h3 class="card-title">รายงานสรุปยอดขายโดยรวมของร้านค้า</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                            <div id="div_chart_summary"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">รายงานสรุปยอดไม่ได้ระบุ </h3>
                        <div id="sales" style="height:290px; width:100%;"></div>
                    </div>
                    <div>
                        <hr class="m-t-0 m-b-0">
                    </div>
                    <div class="card-body text-center ">
                        <ul class="list-inline m-b-0">
                            <li>
                                <h6 class="text-muted  text-success"><i class="fa fa-circle font-10 m-r-10"></i>ไม่ได้ระบุ
                                </h6>
                            </li>
                            <li>
                                <h6 class="text-muted text-info"><i class="fa fa-circle font-10 m-r-10 "></i>ไม่ได้ระบุ</h6>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->


        <!-- Row -->
        <!-- Row -->

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->

    </div>

    <?php include('../template/footer.php'); ?>

    <!-- ============================================================== -->
    <!-- All custom script -->
    <!-- ============================================================== -->
    <!-- Chart JS -->
    <script src="js/dashboard.js"></script>
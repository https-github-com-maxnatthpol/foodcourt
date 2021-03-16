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

    .card-body {
        flex: 1 1 auto;
        padding: 0.5rem;
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
                <h3 class="text-themecolor m-b-0 m-t-0">สรุปข้อมูลทางการเงิน</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">สรุปข้อมูลทางการเงิน</li>
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
            <div class="col-md-12">
                <div class="ribbon-wrapper card" style="height: 500px;">
                    <div class="ribbon ribbon-bookmark ribbon-info">ข้อมูลสรุปยอดการใช้งาน</div>
                    <div class="contact-page-aside">
                        <!-- .left-aside-column-->
                        <div id="fetch_data_summary_total"></div>
                        <!-- /.left-aside-column-->
                        <div class="right-aside">
                            <div class="right-page-header">
                                <div class="d-flex">
                                    <div class="align-self-center">
                                        <h4 class="card-title m-t-10">ข้อมูลการทำธุรกรรม</h4>
                                    </div>
                                </div>
                            </div>
                            <div id="div_table_list"></div>
                            <!-- .left-aside-column-->
                        </div>
                        <!-- /.left-right-aside-column-->
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="ribbon-wrapper card">
                    <div class="ribbon ribbon-bookmark ribbon-info">กราฟข้อมูลสรุปยอดการใช้งาน</div>
                    <div class="card-body">
                        <canvas id="chart_summary" width="800" height="450"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End PAge Content -->


<?php include('../template/footer.php'); ?>

<script type="text/javascript" src="js/javascript.js"></script>
<script src="../../plugins_b/Chart.js/Chart.min.js"></script>
<!--SELECT DATE_FORMAT(data_date, "%Y-%m-%d") as d,SUM(amount) AS amount FROM data_working_card WHERE date(data_date)>=date_add(NOW(),interval -1 week) GROUP BY DATE_FORMAT(data_date, "%Y-%m-%d") ORDER BY data_date ASC -->

<script>
    $.ajax({
        url: "select_data.php",
        method: "POST",
        data: {
            form: "chart_summary",
        },
        success: function(data) {
            new Chart(document.getElementById("chart_summary"), {
                type: 'line',
                data: {
                    labels: [1500, 1600, 1700, 1750, 1800, 1850, 1900, 1950, 1999, 2050, ],
                    datasets: [{
                        data: [86, 114, 106, 106, 107, 111, 133, 221, 783, 2478, ],
                        label: "ยอดเงินสุทธิ",
                        borderColor: "#6610f2",
                        fill: false
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'กราฟสรุปยอดเงินสุทธิ (ย้อนหลัง 10 วัน)'
                    }
                }
            });
        }
    });
</script>
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
                <h3 class="text-themecolor m-b-0 m-t-0">สรุปยอดรายวัน</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">สรุปยอดรายวัน</li>
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
            <div class="col-md-12">
                <div class="ribbon-wrapper card" style="height: 500px;">
                    <div class="ribbon ribbon-bookmark ribbon-info">ข้อมูลสรุปยอดการใช้งานวันนี้</div>
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
       
<!--
        <div class="row">
            <div class="col-md-12">
                <div class="ribbon-wrapper card">
                    <div class="ribbon ribbon-bookmark ribbon-info">กราฟข้อมูลสรุปยอดการใช้งานวันนี้</div>
                    <div class="card-body">
                    <div id="div_chart_summary"></div>
                    </div>
                </div>
            </div>
        </div>
-->
    </div>
</div>
<!-- End PAge Content -->


<?php include('../template/footer.php'); ?>

<script type="text/javascript" src="js/javascript.js"></script>

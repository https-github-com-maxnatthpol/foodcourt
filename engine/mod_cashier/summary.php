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
                <div class="ribbon-wrapper card">
                    <div class="ribbon ribbon-bookmark ribbon-info">กราฟข้อมูลสรุปยอดการใช้งาน</div>

                </div>
            </div>
        </div>

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
                        <h4 class="card-title">Line Chart</h4>
                        <div id="morris-line-chart" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="363" version="1.1" width="629" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative;">
                                <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc>
                                <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="49.546875" y="331" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan>
                                </text>
                                <path fill="none" stroke="#eef0f2" d="M62.046875,331H604" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.546875" y="254.5" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">5,000</tspan>
                                </text>
                                <path fill="none" stroke="#eef0f2" d="M62.046875,254.5H604" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.546875" y="178" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">10,000</tspan>
                                </text>
                                <path fill="none" stroke="#eef0f2" d="M62.046875,178H604" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.546875" y="101.5" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">15,000</tspan>
                                </text>
                                <path fill="none" stroke="#eef0f2" d="M62.046875,101.5H604" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="49.546875" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">20,000</tspan>
                                </text>
                                <path fill="none" stroke="#eef0f2" d="M62.046875,25H604" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="504.5651010024302" y="343.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2013</tspan>
                                </text><text x="263.550710054678" y="343.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                    <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012</tspan>
                                </text>
                                <path fill="none" stroke="#009efb" d="M62.046875,290.2102C77.19258809234508,289.7818,107.48401427703524,292.792075,122.62972736938032,288.4966C137.7754404617254,284.201125,168.06686664641555,257.74819836065575,183.21257973876064,255.84640000000002C198.19366551488457,253.96527336065577,228.15583706713247,276.99482500000005,243.1369228432564,273.36490000000003C258.11800861938036,269.734975,288.08018017162823,230.42659959016396,303.0612659477522,226.80700000000002C318.2069790400973,223.14762459016396,348.4984052247874,240.443125,363.6441183171325,244.24900000000002C378.7898314094776,248.05487500000004,409.0812575941677,275.3355065573771,424.2269706865128,257.254C439.2080564626367,239.36903155737707,469.17022801488463,111.6657299723757,484.15131379100853,100.38310000000001C498.96777225091137,89.2244549723757,528.6006891707169,154.92755796703295,543.4171476306198,167.4889C558.5628607229648,180.32938296703296,588.8542869076549,193.365025,604,201.9904" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                <circle cx="62.046875" cy="290.2102" r="4" fill="#009efb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="122.62972736938032" cy="288.4966" r="4" fill="#009efb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="183.21257973876064" cy="255.84640000000002" r="4" fill="#009efb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="243.1369228432564" cy="273.36490000000003" r="4" fill="#009efb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="303.0612659477522" cy="226.80700000000002" r="4" fill="#009efb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="363.6441183171325" cy="244.24900000000002" r="4" fill="#009efb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="424.2269706865128" cy="257.254" r="4" fill="#009efb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="484.15131379100853" cy="100.38310000000001" r="4" fill="#009efb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="543.4171476306198" cy="167.4889" r="4" fill="#009efb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                <circle cx="604" cy="201.9904" r="4" fill="#009efb" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                            </svg>
                            <div class="morris-hover morris-default-style" style="left: 511.859px; top: 114px; display: none;">
                                <div class="morris-hover-row-label">2013 Q2</div>
                                <div class="morris-hover-point" style="color: #009efb">
                                    Item 1:
                                    8,432
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End PAge Content -->


<?php include('../template/footer.php'); ?>

<script type="text/javascript" src="js/javascript.js"></script>
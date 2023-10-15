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
<style type="text/css">
    #text_center {
        text-align: center;
    }

    #text_right {
        text-align: right;
    }

    #text_left {
        text-align: left;
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
                <h3 class="text-themecolor m-b-0 m-t-0">ขาย</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">ขาย</li>
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

                <div class="ribbon-wrapper card">
                    <div class="ribbon ribbon-bookmark ribbon-info"><i class="mdi mdi-calculator"></i> รายระเอียด</div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>บิล/โต๊ะ</td>
                                    <td>
                                        <div id='text_right'>
                                            <div class="label label-table label-info">พ.ต.อ ณัฐพัชร์</div>
                                        </div>
                                    </td>
                                    <td>ราคาสุทธิ</td>
                                    <td>
                                        <div id='text_right'>
                                            <div class="label label-table label-info">1200 บาท</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>เวลามา</td>
                                    <td>
                                        <div id='text_right'>
                                            <div class="label label-table label-info">17.00</div>
                                        </div>
                                    </td>
                                    <td>เวลาที่ใช้</td>
                                    <td>
                                        <div id='text_right'>
                                            <div class="label label-table label-info">3 ชั่วโมง</div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row button-group">
                        <div class="col-md-3">
                            <button type="button" class="btn waves-effect waves-light btn-block btn-info">เพิ่ม</button>
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn waves-effect waves-light btn-block btn-danger">ยกเลิก</button>
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn waves-effect waves-light btn-block btn-warning">พิมพ์ใบแจ้ง</button>
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn waves-effect waves-light btn-block btn-success">เช็คบิล</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="ribbon-wrapper card">
                    <div class="ribbon ribbon-bookmark ribbon-info"><i class="mdi mdi-av-timer"></i> เมนูอาหาร</div>
                    <div id="div_table_list_bill"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="ribbon-wrapper card">
                    <div class="ribbon ribbon-bookmark ribbon-info"><i class="mdi mdi-av-timer"></i> รายการอาหาร</div>
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
    $(function() {

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
            startDate: moment(),
            endDate: moment().add(2, 'days'),
            autoApply: true,
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
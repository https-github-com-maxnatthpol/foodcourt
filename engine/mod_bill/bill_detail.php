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
                <h3 class="text-themecolor m-b-0 m-t-0">รายระเอียดบิล</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)" onclick="history.back()">Home</a></li>
                    <li class="breadcrumb-item "><a href="javascript:void(0)" onclick="history.back()">บิล</a></li>
                    <li class="breadcrumb-item active">>รายระเอียดบิล</li>
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
                <div id="div_select_bill_detail"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card card-body">
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-md-6" align="left">
                                <h3 class="box-title">เมนูอาหาร</h3>
                            </div>
                            <div class="col-md-6" align="right">

                                <?php
                                if ($button_create == '') {
                                ?>
                                    <button data-toggle="modal" data-target="#modal_add" type="button" class="btn btn-success pull-right" style="transition: 0.4s; <?php echo $button_create; ?>" id="add_btn"> <i class="fa fa-plus"></i> เพิ่มเมนู / โปร </button>
                                <?php
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="box-body" style="padding: 0;">
                        <form action="" name="frmMain" id="frmMain" method="post">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">เครื่องดื่ม</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false">อาหาร</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-selected="false">โปร</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active show" id="home" role="tabpanel">
                                    <div class="card-body">
                                        <div id="fetch_data_table_mamu_1"></div>
                                    </div>
                                </div>
                                <!--second tab-->
                                <div class="tab-pane" id="profile" role="tabpanel">
                                    <div class="card-body">
                                    <div id="fetch_data_table_mamu_2"></div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings" role="tabpanel">
                                    <div class="card-body">
                                    <div id="fetch_data_table_mamu_5"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <div class="col-md-6">
                <div class="card card-body">
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-md-6" align="left">
                                <h3 class="box-title">รายการอาหาร</h3>
                            </div>
                            <div class="col-md-6" align="right">

                                <?php
                                if ($button_create == '') {
                                ?>
                                    <button type="button" class="btn btn-warning pull-right" style="transition: 0.4s; <?php echo $button_create; ?>" onclick="history.back()"> <i class="fas fa-arrow-left"></i> กลับหน้าบิล </button>
                                <?php
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="box-body" style="padding: 0;">
                        <div id="div_table_list"></div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- End PAge Content -->

<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div id="div_add" class="col-md-12" style="<?php echo $button_create ?>">
                <div class="card card-body">
                    <div class="box-header with-border">
                        <h3 class="box-title">เพิ่มเมนู / โปร</h3>
                    </div>
                    <div class="box-body" style="padding: 0;">
                        <form action="" name="form_add" id="form_add" method="post">
                            <input type="hidden" name="form" value="form_add">

                            <div id="div_form_add">

                                <div class="row">

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="example-email">ชื่อเมนู / โปร</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="กรอกชื่อเมนู / โปร">
                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="example-email">ราคา </label>
                                            <?php date_default_timezone_set("Asia/Bangkok"); ?>
                                            <input type="text" class="form-control" id="price" name="price" placeholder="กรอกราคา">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-email"> หมวดเมนู </label>
                                            <select class="form-control" name="mod_stock_type" id="mod_stock_type">
                                                <option value="0">-- เลือกหมวดหมู่เมนู--</option>
                                                <?php
                                                $strSQL = "SELECT *  FROM `mod_stock_type`";
                                                $objQuery = $db->Query($strSQL);
                                                while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
                                                    if ($objResult["id"] != 3 && $objResult["id"] != 4) {
                                                        echo '<option value="' . $objResult["id"] . '">' . $objResult["name"] . '</option>';
                                                    }
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-email">ผู้เพิ่มเมนู / โปร </label>
                                            <input type="text" class="form-control" value="<?php echo $_SESSION['name']; ?>" placeholder="กรอกเวลา" disabled>
                                        </div>
                                    </div>



                                </div>
                                <div class="boxsave" id="box-del-list" align="center">

                                    <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>

                                    <button type="button" class="btn btn-info  btnSendAdd" id="btnSendAdd" style="transition: 0.4s; margin-left: 5px;"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;บันทึก</button>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<?php include('../template/footer.php'); ?>

<script type="text/javascript" src="js/javascript _bill_detail.js"></script>
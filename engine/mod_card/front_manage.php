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
                <h3 class="text-themecolor m-b-0 m-t-0">จัดการบัตร</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:location.href='../index.php'">Home</a></li>
                    <li class="breadcrumb-item active">จัดการบัตร</li>
                </ol>
            </div>

        </div>
        <div class="">
            <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        </div>

        <div class="row">

            <div class="col-md-12">
                <div class="card card-body">
                    <div class="box-header with-border">
                        <div class="row">
                            <div class="col-md-6" align="left">
                                <h3 class="box-title">จัดการข้อมูลบัตร</h3>
                            </div>
                            <div class="col-md-6" align="right">

                                <?php
                                if ($button_create == '') {
                                ?>
                                    <button data-toggle="modal" data-target="#modal_add" type="button" class="btn btn-success pull-right m-r-10" style="transition: 0.4s; <?php echo $button_create; ?>" id="add_btn"><i class="fas fa-plus"></i> เพิ่มบัตรใหม่ </button>
                                    <button data-toggle="modal" data-target="#modal_transfer" type="button" class="btn btn-info pull-right m-r-10" style="transition: 0.4s; <?php echo $button_create; ?> " id="transfer_btn"><i class="fas fa-piggy-bank"></i> โอนเงิน </button>
                                <?php
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="box-body" style="padding: 0;">
                        <form action="" name="frmMain" id="frmMain" method="post">

                            <div id="div_table_list"></div>

                        </form>
                    </div>
                </div>
            </div>





            <!-- Row -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- End PAge Content -->



    <div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div id="div_edit"></div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_transfer" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div id="div_transfer"></div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_add" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" style="padding-top:30px;">

                <form action="" name="frm_select_num" id="frm_select_num" method="post">
                    <input type="hidden" name="form" value="frm_select_num">
                </form>

                <div id="div_add" class="col-md-12" style="<?php echo $button_create ?>">
                    <div class="card card-body">
                        <div class="box-header with-border">
                            <h3 class="box-title">เพิ่มบัตร</h3>
                        </div>
                        <div class="box-body" style="padding: 0;">
                            <form action="" name="form_add" id="form_add" method="post">
                                <input type="hidden" name="form" value="form_add">

                                <div id="div_form_add">

                                    <div class="row">

                                        <div class="col-md-3">

                                            <div class="form-group">
                                                <label for="example-email">หมายเลขบัตร </label>
                                                <input type="text" class="form-control" id="number_1" name="number_1" placeholder="กรอกหมายเลขบัตร" value="0">
                                            </div>

                                        </div>

                                        <div class="col-md-9">

                                            <div class="form-group">
                                                <label for="example-email">รหัสบัตร </label>
                                                <input type="text" class="form-control" id="card_number_1" name="card_number_1" placeholder="กรอกรหัสบัตร">
                                            </div>

                                        </div>

                                    </div>



                                </div>
                                <div class="boxsave" id="box-del-list" align="center">

                                    <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>

                                    <button type="button" class="btn btn-success  btnSendAdd" id="btnSendAdd" style="transition: 0.4s; margin-left: 5px;"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;บันทึก</button>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_edit" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div id="div_edit"></div>

            </div>
        </div>
    </div>

    <input type="hidden" name="per_button_edit" id="per_button_edit" value="<?php echo $button_update ?>">
    <input type="hidden" name="per_button_del" id="per_button_del" value="<?php echo $button_delete ?>">
    <input type="hidden" name="per_button_open" id="per_button_open" value="<?php echo $button_create ?>">
    <input type="hidden" name="per_input_read" id="per_input_read" value="<?php echo $button_view ?>">
    <input type="hidden" name="per_input_read" id="per_input_approval" value="<?php echo $button_approval ?>">
    <?php include('../template/footer.php'); ?>



    <script type="text/javascript" src="js/javascript.js"></script>
    <script type="text/javascript">

        $(".dropify").dropify({
            messages: {
                //          default: "Drag and drop a file here or click",
                default: "<span style='font-size: 16px; font-family: Sarabun, sans-serif;'>ลากและวางไฟล์ที่นี่หรือคลิก</span>",
                //          replace: "Drag and drop or click to replace",
                replace: "<span style='font-size: 14px; font-family: Sarabun, sans-serif;'>ลากและวางหรือคลิกเพื่อแทนที่</span>",
                //          remove: "Remove",
                remove: "<span style='font-size: 13px; font-family: Sarabun, sans-serif;'>ลบออก</span>",
                error: "อ๊ะมีบางอย่างผิดปกติเกิดขึ้น"
                //		  error: "Ooops, something wrong happended."	
            },
            tpl: {
                message: '<div class="dropify-message" ><span class="file-icon" /> <p style="text-align: center;">{{ default }}</p></div>'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })


        function chk_pic() {
            var file = document.form_add.name_img.value;
            var patt = /(.jpg|.png|.jpeg)/;
            var result = patt.test(file);
            if (!result) {
                swal.fire("คำเตือน", 'file type is wrong ("jpeg", "jpg", "png" only)', "error");
                var tagButton = document.getElementsByClassName("dropify-clear")[0];
                tagButton.click();
            }
            return result;
        }

        function chk_pic_edit() {
            var file = document.form_edit.name_img.value;
            var patt = /(.jpg|.png|.jpeg)/;
            var result = patt.test(file);
            if (!result) {
                swal.fire("คำเตือน", 'file type is wrong ("jpeg", "jpg", "png" only)', "error");
                var tagButton = document.getElementsByClassName("dropify-clear")[0];
                tagButton.click();
            }
            return result;
        }
    </script>
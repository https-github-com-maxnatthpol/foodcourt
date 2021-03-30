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
                <h3 class="text-themecolor m-b-0 m-t-0">รายงานยอดขาย</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:location.href='../index.php'">Home</a></li>
                    <li class="breadcrumb-item active">รายงานยอดขาย</li>
                </ol>
            </div>
        </div>
        <div class="">
            <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="ribbon-wrapper card">
                    <div class="ribbon ribbon-bookmark ribbon-info"><i class="mdi mdi-credit-card-scan"></i> ค้นหา</div>
                    <form id="form_search" name="form_search">
                        <input type="hidden" name="btn_search_status" id="btn_search_status" value="btn_search_all">
                        <input type="hidden" name="id_cashier" id="id_cashier" value="<?php echo $_SESSION["id_data"]; ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-email" class="text-themecolor"><i class="fas fa-calendar"></i> วันที่เริ่มต้น - วันที่สิ้นสุด </label>
                                    <div class='input-group mb-3'>
                                        <input type="text" class="form-control pull-right" id="datepicker-autoclose" data-provide="datepicker" data-date-language="th-th" name="employee_date" value="<?php echo date("Y-m-d"); ?>" placeholder="วัน/เดือน/ปี">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <span class="ti-calendar"></span>
                                            </span>
                                        </div>
                                        <button type="button" class="btn btn-success" style="margin-left: 10px;" id="btn_search">ค้นหา</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Row -->
            <div class="col-md-12 col-lg-12">
                <div class="ribbon-wrapper card">
                    <div class="ribbon ribbon-bookmark ribbon-info"><i class="fas fa-history"></i> รายงานยอดขาย </div>
                    <div class="box-body" style="padding: 0;">
                        <form action="" name="frmMain" id="frmMain" method="post">
                            <input type="hidden" name="form" value="Multi_del">
                            <input type="hidden" name="change" id="changeMulti">
                            <div id="div_table_list"></div>
                            <div class="boxsave" id="box-del-list">

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- End PAge Content -->

    <div style="display: none;">
        <span id="startDate">null</span>
        <b>To</b>
        <span id="endDate"><?php echo date("Y-m-d"); ?></span>
    </div>

    <input type="hidden" name="per_button_edit" id="per_button_edit" value="<?php echo $button_update ?>">
    <input type="hidden" name="per_button_del" id="per_button_del" value="<?php echo $button_delete ?>">
    <input type="hidden" name="per_button_open" id="per_button_open" value="<?php echo $button_create ?>">
    <input type="hidden" name="per_input_read" id="per_input_read" value="<?php echo $button_view ?>">
    <input type="hidden" name="per_input_approval" id="per_input_approval" value="<?php echo $button_approval ?>">
    <?php include('../template/footer.php'); ?>
    <script src="../../plugins_b/bootstrap-datepicker-custom/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="js/javascript.js"></script>
    <script type="text/javascript">
        (function($) {
            // en-th - (rare use) english language with thai-year
            $.fn.datepicker.dates['en-th'] =
                // en-en.th - english language with smart thai-year input (2540-2569) conversion 
                $.fn.datepicker.dates['en-en.th'] =
                $.fn.datepicker.dates['en'];

            // th-th - thai language with thai-year
            $.fn.datepicker.dates['th-th'] =
                $.fn.datepicker.dates['th'] = {
                    format: 'dd/mm/yyyy',
                    days: ["อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์", "เสาร์", "อาทิตย์"],
                    daysShort: ["อา", "จ", "อ", "พ", "พฤ", "ศ", "ส", "อา"],
                    daysMin: ["อา", "จ", "อ", "พ", "พฤ", "ศ", "ส", "อา"],
                    months: ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"],
                    monthsShort: ["ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."],
                    today: "วันนี้"
                };
        }(jQuery));

        $(document).on('click', '#btn_search', function() {
            var start_to_end_date = $('#start_to_end_date').val();
            var button_update = $('#per_button_edit').val();
            var button_delete = $('#per_button_del').val();
            var button_create = $('#per_button_open').val();
            var button_view = $('#per_input_read').val();
            var id_cashier = $('#id_cashier').val();
            $('#btn_search_status').val('btn_search');

            $.ajax({
                url: "select_data.php",
                method: "POST",
                data: {
                    form: "select_table",
                    button_update: button_update,
                    button_delete: button_delete,
                    button_create: button_create,
                    button_view: button_view,
                    start_to_end_date: start_to_end_date,
                    id_cashier: id_cashier
                },
                success: function(data) {
                    $('#div_table_list').html(data);
                    $('#table_front_manage').DataTable({
                        scrollY: true,
                        scrollCollapse: true,
                        scrollX: true,
                        //                   "order": [[ 1, 'DESC' ]],
                        language: {
                            sEmptyTable: "ไม่มีข้อมูลในตาราง",
                            sInfo: "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                            sInfoEmpty: "แสดง 0 ถึง 0 จาก 0 แถว",
                            sInfoFiltered: "(กรองข้อมูล _MAX_ ทุกแถว)",
                            sInfoPostFix: "",
                            sInfoThousands: ",",
                            sLengthMenu: "แสดง _MENU_ แถว",
                            sLoadingRecords: "กำลังโหลดข้อมูล...",
                            sProcessing: "กำลังดำเนินการ...",
                            sSearch: "ค้นหา: ",
                            sZeroRecords: "ไม่พบข้อมูล",
                            oPaginate: {
                                sFirst: "หน้าแรก",
                                sPrevious: "ก่อนหน้า",
                                sNext: "ถัดไป",
                                sLast: "หน้าสุดท้าย",
                            },
                            oAria: {
                                sSortAscending: ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
                                sSortDescending: ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย",
                            },
                        }
                    });
                }
            });
        })

        fetch_data_table();

        function fetch_data_table() {
            var button_update = $('#per_button_edit').val();
            var button_delete = $('#per_button_del').val();
            var button_create = $('#per_button_open').val();
            var button_view = $('#per_input_read').val();
            var id_cashier = $('#id_cashier').val();
            var start_to_end_date = $('#start_to_end_date').val();
            $.ajax({
                url: "select_data.php",
                method: "POST",
                data: {
                    form: "select_table",
                    button_update: button_update,
                    button_delete: button_delete,
                    button_create: button_create,
                    button_view: button_view,
                    id_cashier: id_cashier,
                    start_to_end_date: start_to_end_date
                },
                success: function(data) {
                    $('#div_table_list').html(data);
                    $('#table_front_manage').DataTable({
                        scrollY: true,
                        scrollCollapse: true,
                        scrollX: true,
                        //                   "order": [[ 1, 'DESC' ]],
                        language: {
                            sEmptyTable: "ไม่มีข้อมูลในตาราง",
                            sInfo: "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                            sInfoEmpty: "แสดง 0 ถึง 0 จาก 0 แถว",
                            sInfoFiltered: "(กรองข้อมูล _MAX_ ทุกแถว)",
                            sInfoPostFix: "",
                            sInfoThousands: ",",
                            sLengthMenu: "แสดง _MENU_ แถว",
                            sLoadingRecords: "กำลังโหลดข้อมูล...",
                            sProcessing: "กำลังดำเนินการ...",
                            sSearch: "ค้นหา: ",
                            sZeroRecords: "ไม่พบข้อมูล",
                            oPaginate: {
                                sFirst: "หน้าแรก",
                                sPrevious: "ก่อนหน้า",
                                sNext: "ถัดไป",
                                sLast: "หน้าสุดท้าย",
                            },
                            oAria: {
                                sSortAscending: ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
                                sSortDescending: ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย",
                            },
                        }
                    });
                }
            });
        }

        function leftPad(number, targetLength) {
            var output = number + '';
            while (output.length < targetLength) {
                output = '0' + output;
            }
            return output;
        }

        var minD = $("#startDate").html();
        var maxD = $("#endDate").html();


        $('#datepicker-autoclose').datepicker({
            format: "yyyy-mm-dd",
            startDate: new Date(minD),
            endDate: new Date(maxD),
            changeMonth: true,
            changeYear: true,
            autoclose: true

        });
    </script>
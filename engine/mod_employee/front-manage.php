<?php include('../template/header.php'); ?>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<?php require_once('../template/menu.php'); ?>
<!-- ============================================================== -->
<?php require_once '../lib/permission.php'; ?>

<!--Css table -->
<link rel="stylesheet" href="css/table-employee.css">

<style>
.oncard-header {
    border-top: solid #ffb22b;
}
</style>
<style type="text/css">
p {
    font-family: 'Prompt', sans-serif;
}
</style>
<style>
.btn-paginate {
    background-color: white;
    border-color: #bcbcbc;
    transition: 0.6s;
}

.btn-paginate:hover {
    background-color: #bcbcbc;
    color: white;
}

.page-active {
    background-color: #bcbcbc;
    color: white;
}

.remove-item {
    background-color: #fff6f6 !important;
    transition: 0.4s;
    color: red;
}

.remove-item:hover {
    background-color: #F5F5F5 !important;
    transition: 0.4s;
    color: red;
}

.sweet-alert .sa-icon {
    margin-bottom: 35px;
}

.box-manage-employee {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);
    transition: 0.3s;
    float: left;
    background-color: white;
    max-width: 200px;
    height: 300px;
    margin: auto;
    margin-bottom: 20px;
    margin-right: 15px;
    text-align: center;
}

.box-manage-employee:hover {
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
}

.box-manage-title {
    color: grey;
    font-size: 18px;
}

.contain-control {
    border-top: 1px solid #d8d8d8;
    padding: 5px;
    height: 45px;
    margin: auto;
    /*height: 47px;
          background-color: rgba(0,0,0,.03);*/
}

.status_transport {
    padding-top: 2px;
    padding-right: 5px;
    height: 30px;
    background-color: #f9f9f9;
}

.status_transport label {
    float: right;
}

.status_transport img {
    margin: 5px;
    float: left;
}

.contain-control .btn {
    border-radius: 0;
    float: right;
}

.contain-control .btn-edit {
    border-radius: 0;
    float: left;
}

.text-employee {
    text-align: left;
    font-size: 16px;
    padding: 5px;
    padding-left: 5px;
    border-top: 1px solid #d8d8d8;
    margin: auto;
    height: 55px;
}

.text-employee p {
    margin: 0;
}

small {
    margin-right: 2px;
}

.text-detail {
    text-align: left;
    padding-left: 5px;
    /*height: 50px;*/
}

.image-employee-attachment {
    font-size: 0px;
    width: 200px;
    height: 150px;
    position: relative;
    /*border-bottom:1px solid #d8d8d8;*/
}

/*-------------------------------------------list table*/
.image-employee-list {
    text-align: center;
    font-size: 0px;
    width: 70px;
    height: 50px;
    position: relative;
    /*border-bottom:1px solid #d8d8d8;*/
}

.image-employee-list img {
    width: auto;
    height: auto;
    max-width: 100%;
    max-height: 100%;
    cursor: pointer;
    border-radius: 10px;
}

/*------------------------------------------------------*/
.image-employee-attachment img {
    width: auto;
    height: auto;
    max-width: 100%;
    max-height: 100%;
    cursor: pointer;
}

.overlay-cover-del {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background-color: rgb(255, 255, 255, 0.7);
    cursor: pointer;
    /* transition: 0.5s;*/
}

.icon-del {
    display: none;
    position: absolute;
    top: 80%;
    left: 85%;
    font-size: 40px;
    color: #dd4b39;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
}

.view_add i {
    transition: 0.3s;
}

.view_add i:hover {
    font-size: 130px;
}

.checkbox {
    margin: 0;
}

.checkbox label {
    border: none;
}

.checkbox label:hover {
    border: none;
}

.checkbox label .toggle {
    margin-left: -20px;
    margin-right: 5px;
    width: 100px !important;
}

.changed_format i:hover {
    color: black !important;
}

.changed_format i {
    transition: 0.5s !important;
}

.sort-employee {
    transition: 0.4s;
    border-radius: 0;
}

.sort-employee:hover {
    background-color: #f6f8fa;
}

.sort-active {
    background-color: #ddd !important;
}

@media screen and (min-width: 799px) {
    body {
        white-space: normal;
        overflow-x: auto;
    }
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
                <h3 class="text-themecolor m-b-0 m-t-0">จัดการพนักงาน</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:location.href='../index.php'">Home</a></li>
                    <li class="breadcrumb-item active">จัดการพนักงาน</li>
                </ol>
            </div>

        </div>
        <div class="">
            <button
                class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i
                    class="ti-settings text-white"></i></button>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
		
		<?php if($button_view != 'display:none' ) { ?>	
		
        <div class="card" style="<?php echo $button_view ?>">
            <div class="card-header oncard-header">
                <span style="font-size: 18px;">คำแนะนำในการใช้งาน</span>
                <div class="card-actions">
                    <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                    <!--<a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>-->
                    <a class="btn-close" data-action="close"><i class="ti-close"></i></a>
                </div>
            </div>
            <div class="card-body collapse">
                <i class="fa fa-caret-right"></i>&nbsp;&nbsp;สามารถแก้ไข/ลบ
                พนักงานได้โดยคลิกไอคอนใต้หัวข้อพนักงานที่ต้องการ<br>
                <i class="fa fa-caret-right"></i>&nbsp;&nbsp;หากต้องการลบพนักงาน มากกว่า 1 พนักงานพร้อมกัน
                สามารถคลิกเครื่องหมายถูกหน้าหัวข้อพนักงานที่ต้องการลบ และคลิกไอคอน ลบข้อมูลที่เลือก<br>
                <i class="fa fa-caret-right"></i>&nbsp;&nbsp;กรณีที่มีการลบข้อมูล ระบบจะขึ้นข้อความแจ้งเตือน
                เพื่อยืนยันการลบ หากทำการยืนยันเรียบร้อยแล้ว จะไม่สามารถกู้คืนข้อมูลได้<br>
                <i class="fa fa-caret-right"></i>&nbsp;&nbsp;สามารถเลือกดูแสดงผลพนักงานได้ทั้งแบบคอลัมน์ และแบบแถว <br>
                <i class="fa fa-caret-right"></i>&nbsp;&nbsp;สามารถค้นหาพนักงานได้โดยใส่ชื่อหัวข้อพนักงานช่องค้นหา
                หรือเลือกหมวดหมู่ในการค้นหาได้<br>
            </div>
        </div>
        <div class="row" style="<?php echo $button_view ?>">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="padding: .38rem 1.25rem; background: #26c6da; color: #FFFFFF;">
                        <span style="font-size: 18px;">ค้นหาอย่างละเอียด</span><span id="validate-send-find"
                            style="color: red; display: none;"> *คุณยังไม่ได้กรอกรายละเอียด</span>
                        <div class="card-actions" style="color: white;">
                            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                            <!--<a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>-->
                            <!--<a class="btn-close" data-action="close"><i class="ti-close"></i></a>-->
                        </div>
                    </div>
                    <div class="card-body collapse">
                        <div class="row">
                            <div class="col-md-4" style="padding-bottom: 5px; padding: 3px;">
                                <input type="text" name="name_em" id="name_em" class="form-control"
                                    style="border-radius: 5px;" placeholder="ชื่อพนักงาน">
                            </div>
                            <div class="col-md-4" style="padding-bottom: 5px; padding: 3px;">
                                <input type="text" name="sur_em" id="sur_em" class="form-control"
                                    style="border-radius: 5px;" placeholder="นามสกุล">
                            </div>
                            <div class="col-md-4" style="padding-bottom: 5px; padding: 3px;">
                                <input type="text" name="code_id_em" id="code_id_em" class="form-control"
                                    style="border-radius: 5px;" placeholder="บัตรประจำตัวประชาขน">
                            </div>
                            <div class="col-md-4" style="padding-bottom: 5px; padding: 3px;">
                                <input type="date" name="birthday" id="birthday" class="form-control">
                            </div>
                            <div class="col-md-4" style="padding-bottom: 5px; padding: 3px;">
                                <input type="text" name="posi_em" id="posi_em" class="form-control"
                                    style="border-radius: 5px;" placeholder="ตำแหน่ง">
                            </div>
                            <div class="col-md-4" style="padding-bottom: 5px; padding: 3px;" align="">
                                <div class="btn-group" style="width: 100%">
                                    <button class="btn btn-primary" id="send_find-detail" style="width: 40%;"><i
                                            class="fa fa-search"></i> ค้นหา</button>
                                    <button class="btn btn-default" id="send_find-clear"
                                        style="width: 30%; padding-left: 2px; padding-right: 2px;">เคลียร์</button>
                                    <button class="btn btn-default" id="send_find-all"
                                        style="width: 30%; padding-left: 2px; padding-right: 2px;">ทั้งหมด</button>
                                    <input type="checkbox" name="" id="find-ck-1" style="display: none;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <input type="text" id="name_employee" name="q" class="form-control" placeholder="ค้นหาข้อมูลพนักงาน"
                        style="height: 43px;">
                    <span class="input-group-btn">
                        <button name="search" class="btn btn-flat" style="height: 43px;"><i class="fa fa-search"></i>
                            <input type="checkbox" name="" id="find-ck-2" style="display: none;">
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="card card-body" id="detail_list-employee" style="<?php echo $button_view ?>">
            <div class="box-header with-border">
                <h3 class="box-title">รายชื่อพนักงาน</h3>
                <div class="btn-group">

                    <span class="btn sort-employee n" data-id="n" data-c="n1"
                        style="border-right: 1px solid #ddd; border-left: 1px solid #ddd;"><i
                            class="fa fa-sort-alpha-desc"></i> ชื่อ</span>
                    <span class="btn sort-employee n1" data-id="n1" data-c="n"
                        style="border-right: 1px solid #ddd; border-left: 1px solid #ddd; display: none; margin-left: 0.2px;"><i
                            class="fa fa-sort-alpha-asc"></i> ชื่อ</span>

                    <span class="btn sort-employee s" data-id="s" data-c="s1" style="border-right: 1px solid #ddd;"><i
                            class="fa fa-sort-alpha-desc"></i> นามสกุล</span>
                    <span class="btn sort-employee s1" data-id="s1" data-c="s"
                        style="border-right: 1px solid #ddd; display: none;"><i class="fa fa-sort-alpha-asc"></i>
                        นามสกุล</span>

                    <span class="btn sort-employee u" data-id="u" data-c="u1" style="border-right: 1px solid #ddd;"><i
                            class="fa fa-sort-alpha-desc"></i> ชื่อผู้ใช้งาน</span>
                    <span class="btn sort-employee u1" data-id="u1" data-c="u"
                        style="border-right: 1px solid #ddd; display: none;"><i class="fa fa-sort-alpha-asc"></i>
                        ชื่อผู้ใช้งาน</span>

                    <span class="btn sort-employee p" data-id="p" data-c="p1" style="border-right: 1px solid #ddd;"><i
                            class="fa fa-sort-alpha-desc"></i> ตำแหน่ง</span>
                    <span class="btn sort-employee p1" data-id="p1" data-c="p"
                        style="border-right: 1px solid #ddd; display: none;"><i class="fa fa-sort-alpha-asc"></i>
                        ตำแหน่ง</span>
                </div>
                <label onclick="ClickCheckAll_W();" id="checkall_w" style="display: none; margin: 0 !important;">
                    <input id="checkall" type="checkbox" name="transport" value="1">
                    <label for="checkall" style="margin-bottom: -.5rem;"></label>
                    เลือกทั้งหมด
                </label>
                <a href="#" class="changed_format" data-id="1" style="font-size: 18px;display: none;">
                    <i class="fa fa-th pull-right" style=" cursor: pointer;"></i>
                </a>
                <a href="#" class="changed_format" data-id="2" style="font-size: 18px;display: none;">
                    <i class="fa fa-th-list pull-right" style=" cursor: pointer;"></i>
                </a>
                <?php
        if ($button_create == '') {
            ?>
                <button type="button" class="btn btn-success btn-sm pull-right"
                    onclick="javascript:location.href='front-add.php'"
                    style="margin-right: 10px; float: right; <?php echo $button_create ?> "><i
                        class="fa fa-plus"></i>&nbsp;&nbsp;เพิ่มพนักงาน</button>
                <?php
        }
        ?>
            </div>
            <div class="box-body" style="padding: 0;">
                <form action="" name="frmMain" id="frmMain" method="post">
                    <input type="hidden" name="form" value="Multivisible">
                    <input type="hidden" name="change" id="changeMulti">
                    <div id="live_em-list"></div>
                    <div class="boxsave" id="box-del-list">

                        <?php
            if ($button_delete_all == '') {
                ?>
                        <button type="button" class="delmulti-menu btn btn-danger"
                            style="transition: 0.4s; <?php echo $button_delete_all; ?>" id="MultiDelete" disabled
                            data-id="Delete"><i class="fa fa-remove"></i> ลบรายการที่เลือก <span
                                class="num_"></span></button>
                        <?php
            }
            if ($button_delete == '') {
                ?>
                        <button type="button" class="delmulti-menu btn btn-warning"
                            style="transition: 0.4s; <?php echo $button_delete; ?>" id="MultiDisabled" disabled
                            data-id="Disabled"><i class="fa fa-trash"></i> ยุติบทบาทพนักงานที่เลือก <span
                                class="num_"></span></button>
                        <?php
            } ?>

                        <?php
            if ($button_delete == '') {
                ?>
                        <button type="button" class="delmulti-menu btn btn-info"
                            style="transition: 0.4s; <?php echo $button_delete; ?>" id="MultiEnabled" disabled
                            data-id="Enabled"><i class="fa fa-eye"></i> ยกเลิกการยุติบทบาทพนักงานที่เลือก <span
                                class="num_"></span></button>
                        <?php
            } ?>
                    </div>
                </form>
            </div>
        </div>
		
		<?php } ?>
        <!-- Row -->
        <!-- ============================================================== -->
        <div class="row" id="detail_widget-employee" style="display: none;">
            <div class="col-md-12">
                <div>
                    <form action="" name="frmMain_w" id="frmMain_w" method="post">
                        <input type="hidden" name="form" value="Multivisible">
                        <input type="hidden" name="change" id="changeMulti_w">
                        <div id="live_em-widget"></div>
                        <div class="boxsave" id="box-del-widget" style="z-index: 56;">
                            <?php
              if ($button_delete_all == '') {
                  ?>
                            <button type="button" class="delmulti-menu btn btn-danger"
                                style="transition: 0.4s; <?php echo $button_delete_all; ?>" id="MultiDelete_w" disabled
                                data-id="Delete"><i class="fa fa-remove"></i> ลบรายการที่เลือก <span
                                    class="num_w"></span></button>
                            <?php
              }
              if ($button_delete == '') {
                  ?>
                            <button type="button" class="delmulti-menu btn btn-warning"
                                style="transition: 0.4s; <?php echo $button_delete; ?>" id="MultiDisabled_w" disabled
                                data-id="Disabled"><i class="fa fa-eye-slash"></i> ยุติบทบาทพนักงานที่เลือก <span
                                    class="num_w"></span></button>
                            <?php
              }
              ?>
                            <?php
              if ($button_delete_all == '') {
                  ?>
                            <button type="button" class="delmulti-menu btn btn-info"
                                style="transition: 0.4s; <?php echo $button_delete_all; ?>" id="MultiEnabled_w" disabled
                                data-id="Enabled"><i class="fa fa-eye"></i> ยกเลิกการยุติบทบาทพนักงานที่เลือก <span
                                    class="num_w"></span></button>
                            <?php
              }
              ?>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- /.box -->
    </div>
</div>
<!-- End PAge Content -->
<!-- ============================================================== -->


<?php include('../template/footer.php'); ?>

<!-- ============================================================== -->
<!-- All custom script -->
<!-- ============================================================== -->

<script>
$(document).ready(function(){
    fetch_data_employee();
    fetch_data_employee2();
});

$(document).on('click', '.sort-employee', function(){
    var sort = $(this).attr('data-id');
    var ch = $(this).attr('data-c');
    $('.sort-employee').removeClass('sort-active');
    $(this).hide();
    $('.'+ch).show();
    $('.'+ch).addClass('sort-active');
    var name_em   = $('#name_em').val();
    var sur_em   = $('#sur_em').val();
    var code_id_em   = $('#code_id_em').val();
    var birthday = $('#birthday').val();
    var posi_em   = $('#posi_em').val();
    var authen_em   = $('#authen_em').val();
    // alert(sort+name_em+code_id_em+code_em+birthday+posi_em);
    if($('#find-ck-1').is(':checked')){
        fetch_data_employee_widged(name_em,sur_em,code_id_em,birthday,posi_em,authen_em,sort);      //ใช้ฟังชั่นร่วมกับ ค้นหา detail
        fetch_data_employee_list(name_em,sur_em,code_id_em,birthday,posi_em,authen_em,sort); //ใช้ฟังชั่นร่วมกับ ค้นหา detail
    }else if($('#find-ck-2').is(':checked')){
        var name_f        = $('#name_employee').val();
        fetch_data_employee_find_fast(name_f,sort);      //ใช้ฟังชั่นร่วมกับ ค้นหา detail
        fetch_data_employee_find_fast_list(name_f,sort); //ใช้ฟังชั่นร่วมกับ ค้นหา detail
    }else{
        fetch_data_employee_sort(sort);
        fetch_data_employee_sort2(sort);
    }
});


$(document).on('click', '#send_find-detail', function(){
    var name_em   = $('#name_em').val();
    var sur_em   = $('#sur_em').val();
    var code_id_em   = $('#code_id_em').val();
    var birthday = $('#birthday').val();
    var posi_em   = $('#posi_em').val();

    if(name_em==''&& code_id_em =='' && birthday =='' && posi_em =='' && sur_em ==''){  
    $( "#find-ck-1" ).prop( "checked", false );
    $('#validate-send-find').show();
        setTimeout(function(){ 
        $('#validate-send-find').fadeOut(500); }, 4000);
    return false;
    }
    $( "#find-ck-1" ).prop( "checked", true );
    $('#find-ck-2').prop('checked',false);
    fetch_data_employee_widged(name_em,sur_em,code_id_em,birthday,posi_em);
    fetch_data_employee_list(name_em,sur_em,code_id_em,birthday,posi_em);

});

$(document).on('click', '#send_find-clear', function(){
    $('#find-ck-1').prop('checked',false);
    $('#name_em').val('');
    $('#sur_em').val('');
    $('#code_id_em').val('');
    $('#birthday').val('');
    $('#posi_em').val('');
    $("select#authen_em").prop('selectedIndex', 0);

    $('#daterange-btn span').html('<i class="fa fa-calendar"></i> วันที่แก้ไขล่าสุด');
});

$(document).on('click', '#send_find-all', function(){
    $('#find-ck-1').prop('checked',false);
    $('#find-ck-2').prop('checked',false);
    fetch_data_employee();
    fetch_data_employee2();
});

$(document).on('keyup', '#name_employee', function()
{
    var id = $(this).val();
    if (id == '') {
    $('#find-ck-2').prop('checked',false);
    fetch_data_employee_name();
    fetch_data_employee_name_list();
    }else{
    $('#find-ck-2').prop('checked',true);
    $('#find-ck-1').prop('checked',false);
    fetch_data_employee_name(id);
    fetch_data_employee_name_list(id);
    }
});

$(document).on('click', '.pagination_link', function(){
    var page = $(this).attr("id");
    var name_f = $(this).attr("data-n-fast");
    var name = $(this).attr('data-n');
    var code = $(this).attr('data-c');
    var surname = $(this).attr('data-surname');
    var posi_em = $(this).attr('data-posi');
    var code_id = $(this).attr('data-codeid');
    var date = $(this).attr('data-d');
    var sort = $(this).attr('data-sort');

    fetch_data_employee(page,name_f,name,code,surname,posi_em,code_id,date,sort);
    document.getElementById('MultiDelete').disabled = true;
});

$(document).on('click', '.pagination_link_w', function(){
    var page = $(this).attr("id");
    var name_f = $(this).attr("data-n-fast");
    var name = $(this).attr('data-n');
    var code = $(this).attr('data-c');
    var surname = $(this).attr('data-surname');
    var code_id = $(this).attr('data-codeid');
    var date = $(this).attr('data-d');
    var sort = $(this).attr('data-sort');
    fetch_data_employee2(page,name_f,name,code,surname,code_id,date,sort);
    document.getElementById('MultiDelete').disabled = true;
});

$(document).on('click', '.delete-em', function(){  
    var id = $(this).attr('data-id'); 
    var form = 'del';
    swal.fire({
        title: 'ยืนยันการทำรายการ?',
        html : "<label>คุณแน่ใจหรือจะลบพนักงาน !</label>",
        // text: "" + role_id,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'ยกเลิก!',
        confirmButtonText: 'ใช่, ต้องการลบ !'
        
    }).then((result) => {
        if (result.value){
            $.ajax({     
            type:"POST",
            url:'functions.php',
            data: {id:id,
                    form:form},             
            success:function(data){
                //alert(data.status);
                swal.fire("สำเร็จ", "ลบพนักงานเรียบร้อยแล้ว", "success");
            
                fetch_data_employee(); 
                fetch_data_employee2();
            },
        }); 

        }
    
    });
});

$(document).on('click', '.disabled-em', function(){  
    var id = $(this).attr('data-id'); 
    var form = 'disabled';
    swal.fire({
        title: 'ยืนยันการทำรายการ?',
        html : "<label>คุณแน่ใจหรือจะยุติบทบาทพนักงาน !</label>",
        // text: "" + role_id,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'ยกเลิก!',
        confirmButtonText: 'ยืนยัน'
    
    }).then((result) => {
        if (result.value){
            $.ajax({     
                type:"POST",
                url:'functions.php',
                data: {id:id,
                        form:form},             
                success:function(data){
                    if(data.status==0){
                        swal.fire("สำเร็จ", "ยุติบทบาทพนักงานเรียบร้อย", "success").then(function(){ 
                            fetch_data_employee(); 
                            fetch_data_employee2();                    
                        });
                    }else{
                        swal.fire("Error", "ไม่สามารถยุติบทบาทพนักงานคนนี้ได้", "warning");
                    }
                    
                },
            }); 

        }
    
    });
});

$(document).on('click', '.enabled-em', function(){  
    var id = $(this).attr('data-id'); 
    var form = 'enabled';
    swal.fire({
        title: 'ยืนยันการทำรายการ?',
        html : "<label>คุณแน่ใจหรือจะยกเลิกการยุติบทบาทพนักงาน</label>",
        // text: "" + role_id,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'ยกเลิก!',
        confirmButtonText: 'ยืนยัน'
    
    }).then((result) => {
        if (result.value){
            $.ajax({     
                type:"POST",
                url:'functions.php',
                data: {id:id,
                        form:form},             
                success:function(data){
                    if(data.status==0){
                        swal.fire("สำเร็จ", "ยกเลิกการยุติบทบาทพนักงานเรียบร้อย", "success");
                    }else{
                        swal.fire("Error", "ไม่สามารถยกเลิกยุติบทบาทพนักงานคนนี้ได้", "warning");
                    }
                    fetch_data_employee(); 
                    fetch_data_employee2();
                },
            });

        }
     
    });
});

var formClick;
$(document).on('click', '#MultiDelete', function () {
    formClick = $(this);
    var change = $(this).attr('data-id');
    $('#changeMulti').val(change);
    swal.fire({
        title: 'ยืนยันการทำรายการ?',
        html : "<label>คุณแน่ใจหรือจะลบพนักงานที่เลือก</label>",
        // text: "" + role_id,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'ยกเลิก!',
        confirmButtonText: 'ยืนยัน'
    
    }).then((result) => {
        if (result.value){
            $.ajax({
                type: "POST",
                url: "functions.php",
                data: $("#frmMain").serialize(),
                success: function(data) { 
                    $('.num_').html('');
                    if(data.status==0){
                        swal.fire("สำเร็จ", "ลบพนักงานที่เลือกเรียบร้อยแล้ว", "success");
                    }else{
                        swal.fire("Error", "ไม่สามารถลบพนักงานที่เลือกได้", "warning");
                    }
                    document.getElementById('MultiDelete').disabled = true;
                    document.getElementById('MultiEnabled').disabled = true;
                    document.getElementById('MultiDisabled').disabled = true;
                    fetch_data_employee(); 
                    fetch_data_employee2();
                },
            });

        }
    
});
});

$(document).on('click', '#MultiDisabled', function () {
    formClick = $(this);
    var change = $(this).attr('data-id');
    $('#changeMulti').val(change);
    swal.fire({
        title: 'ยืนยันการทำรายการ?',
        html : "<label>คุณแน่ใจหรือจะยุติบทบาทพนักงาน</label>",
        // text: "" + role_id,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'ยกเลิก!',
        confirmButtonText: 'ยืนยัน'
    
    }).then((result) => {
        if (result.value){
            $.ajax({
                type: "POST",
                url: "functions.php",
                data: $("#frmMain").serialize(),
                success: function(data) { 
                    $('.num_').html('');
                // alert(data);
                    if(data.status==0){
                        swal.fire("สำเร็จ", "ยุติบทบาทพนักงานเรียบร้อย", "success");
                    }else{
                        swal.fire("Error", "ไม่สามารถยุติบทบาทพนักงานคนนี้ได้", "warning");
                    }
                    fetch_data_employee(); 
                    fetch_data_employee2();
                    document.getElementById('MultiDelete').disabled = true;
                    document.getElementById('MultiEnabled').disabled = true;
                    document.getElementById('MultiDisabled').disabled = true;
                },
            });

        }
    
});
});

$(document).on('click', '#MultiEnabled', function () {
    formClick = $(this);
    var change = $(this).attr('data-id');
    $('#changeMulti').val(change);
    swal.fire({
        title: 'ยืนยันการทำรายการ?',
        html : "<label>คุณแน่ใจหรือจะยกเลิกยุติบทบาทพนักงาน</label>",
        // text: "" + role_id,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'ยกเลิก!',
        confirmButtonText: 'ยืนยัน'
    
    }).then((result) => {
        if (result.value){
            $.ajax({
            type: "POST",
            url: "functions.php",
            data: $("#frmMain").serialize(),
            success: function(data) { 
                $('.num_').html('');
                // alert(data);
                if(data.status==0){
                    swal.fire("สำเร็จ", "ยกเลิกการยุติบทบาทพนักงานเรียบร้อย", "success");
                }else{
                    swal.fire("Error", "ไม่สามารถยกเลิกยุติบทบาทพนักงานคนนี้ได้", "warning");
                }
                fetch_data_employee(); 
                fetch_data_employee2();
                document.getElementById('MultiDelete').disabled = true;
                document.getElementById('MultiEnabled').disabled = true;
                document.getElementById('MultiDisabled').disabled = true;
            },
        });

        }
    
});
});

var formClick;
$(document).on('click', '#MultiDelete_w', function () {
    formClick = $(this);
    var change = $(this).attr('data-id');
    $('#changeMulti_w').val(change);
    swal.fire({
        title: 'ยืนยันการทำรายการ?',
        html : "<label>คุณแน่ใจหรือจะลบพนักงานที่เลือก</label>",
        // text: "" + role_id,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'ยกเลิก!',
        confirmButtonText: 'ยืนยัน'
    
    }, function () {
    $.ajax({
        type: "POST",
        url: "functions.php",
        data: $("#frmMain").serialize(),
        success: function(data) { 
        $('.num_').html('');
            if(data.status==0){
                swal.fire("สำเร็จ", "ลบพนักงานที่เลือกเรียบร้อยแล้ว", "success");
            }else{
                swal.fire("Error", "ไม่สามารถลบพนักงานที่เลือกได้", "warning");
            }
            document.getElementById('MultiDelete_w').disabled = true;
            document.getElementById('MultiEnabled_w').disabled = true;
            document.getElementById('MultiDisabled_w').disabled = true;
            fetch_data_employee(); 
            fetch_data_employee2();
        },
    });
});
});

$(document).on('click', '#MultiDisabled_w', function () {
    formClick = $(this);
    var change = $(this).attr('data-id');
    $('#changeMulti_w').val(change);
    swal.fire({
        title: 'ยืนยันการทำรายการ?',
        html : "<label>คุณแน่ใจหรือจะยุติบทบาทพนักงาน</label>",
        // text: "" + role_id,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'ยกเลิก!',
        confirmButtonText: 'ยืนยัน'
    
    }, function () {
    $.ajax({
        type: "POST",
        url: "functions.php",
        data: $("#frmMain_w").serialize(),
        success: function(data) { 
            $('.num_').html('');
        // alert(data);
            if(data.status==0){
                swal.fire("สำเร็จ", "ยุติบทบาทพนักงานเรียบร้อย", "success");
            }else{
                swal.fire("Error", "ไม่สามารถยุติบทบาทพนักงานคนนี้ได้", "warning");
            }
            fetch_data_employee(); 
            fetch_data_employee2();
            document.getElementById('MultiDelete_w').disabled = true;
            document.getElementById('MultiEnabled_w').disabled = true;
            document.getElementById('MultiDisabled_w').disabled = true;
            $('#checkall').prop('checked',false);
        },
    });
});
});

$(document).on('click', '#MultiEnabled_w', function () {
    formClick = $(this);
    var change = $(this).attr('data-id');
    $('#changeMulti_w').val(change);
    swal.fire({
        title: 'ยืนยันการทำรายการ?',
        html : "<label>คุณแน่ใจหรือจะยกเลิกยุติบทบาทพนักงาน</label>",
        // text: "" + role_id,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'ยกเลิก!',
        confirmButtonText: 'ยืนยัน'
    
    }, function () {
    $.ajax({
        type: "POST",
        url: "functions.php",
        data: $("#frmMain_w").serialize(),
        success: function(data) { 
            $('.num_').html('');
            // alert(data);
            if(data.status==0){
                swal.fire("สำเร็จ", "ยกเลิกการยุติบทบาทพนักงานเรียบร้อย", "success");
            }else{
                swal.fire("Error", "ไม่สามารถยกเลิกยุติบทบาทพนักงานคนนี้ได้", "warning");
            }
            fetch_data_employee(); 
            fetch_data_employee2();
            document.getElementById('MultiDelete_w').disabled = true;
            document.getElementById('MultiEnabled_w').disabled = true;
            document.getElementById('MultiDisabled_w').disabled = true;
            $('#checkall').prop('checked',false);
        },
    });
});
});

$(document).on('click', '.edit-em', function(){
    var id = $(this).attr('data-id'); 
    location.href = "front-edit.php?id="+id;
});

$(document).on('click', '.changed_format', function(){
    var id =$(this).attr('data-id');
    if(id ==1){
    $('#detail_widget-employee').show();
    $('#live_em-list').hide();
    $('#changed_for_list').hide();
    $('#changed_for_widget').show();

    $('#checkall_w').show();
    }else{
    $('#live_em-list').show();
    $('#detail_widget-employee').hide();
    $('#changed_for_list').show();
    $('#changed_for_widget').hide();

    $('#checkall_w').hide();
    }
});

$(document).on('change', '.changed_math', function(){
    var id = $(this).val();
    // alert(id);
    swal.fire({
                    title: "ยืนยัน?",
                    text: "ยืนยันการจับคู่สินค้า",
                    type: "info",
                    showCancelButton: true,
                    cancelButtonText: "ยกเลิก",
                    confirmButtonText: "ยืนยัน",
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                }, function () {
                $.ajax({  
                        url:"back_edit-employeemath.php",  
                        method:"POST",  
                        data:{id:id},
                        success:function(data){  
                            swal("สำเร็จ", "ลบสินค้าทั้งหมดเรียบร้อยแล้ว", "success");
                            document.getElementById('MultiDelete').disabled = true;
                        fetch_data_employee();
                        fetch_data_employee2();
                        }  
                    });  
                });
    
});

$(document).on('change', '.level_employee', function(){
        var level = $(this).val();
        var id = $(this).attr('data-id');
        var id_level = level+'-'+id;
        $.ajax({
            // complete: function() { 
            //     swal("สำเร็จ", "เรียบร้อยแล้ว", "success");
            //     fetch_data_employee2();
            // },
            type:'POST',
            url:'ajaxDatalevel.php',
            data:'id_level='+id_level,               
            success:function(html){
                fetch_data_employee2();
                fetch_data_employee();
            },  
        }); 
    
});

$(document).on('click', '.checkbox_remove', function(){ 
    var i =0; 
    if($(this).is(":checked")) 
    {
        $(this).parents('tr').addClass("remove-item");
<?php if ($button_delete_all=='') { ?>
        document.getElementById('MultiDelete').disabled = false; 
<?php } ?>

<?php if ($button_delete=='') { ?>
        document.getElementById('MultiDisabled').disabled = false; 
<?php } ?>

<?php if ($button_delete_all=='') { ?> 
        document.getElementById('MultiEnabled').disabled = false;   
<?php } ?>
        $('.remove-item').each(function() {
        i++;       
        }); 
        $('.num_').html('[ '+i+' ]'); 
    } 
    else 
    {
        $(this).parents('tr').removeClass("remove-item");
        $('.remove-item').each(function() {
        i++;       
        });
        $('.num_').html('[ '+i+' ]');
        if($('input.checkbox_remove').is(':checked')){
        }else{
<?php if ($button_delete_all=='') { ?>
        document.getElementById('MultiDelete').disabled = true;
<?php } ?>

<?php if ($button_delete=='') { ?>
        document.getElementById('MultiDisabled').disabled = true;
<?php } ?>

<?php if ($button_delete_all=='') { ?>
        document.getElementById('MultiEnabled').disabled = true;
<?php } ?>
        }
        
    }
});

$(document).on('click', '.cr-image', function(){ 
    var i =0; 
    var id = $(this).attr('data-id');
    if($('.crck_w'+id).is(":checked")){
        $('.crck_w'+id).prop('checked', false);
        $('.overlay-image'+id).removeClass('overlay-cover-del');
        $('#icon-del'+id).hide();
        if($('.discard').hasClass('overlay-cover-del')){
    <?php if ($button_delete_all=='') { ?>
        document.getElementById('MultiDelete_w').disabled = false; 
    <?php } ?>

    <?php if ($button_delete=='') { ?>
        document.getElementById('MultiDisabled_w').disabled = false;  
    <?php } ?>

    <?php if ($button_delete_all=='') { ?>
        document.getElementById('MultiEnabled_w').disabled = false; 
    <?php } ?>

        }else{

    <?php if ($button_delete_all=='') { ?>
        document.getElementById('MultiDelete_w').disabled = true;
    <?php } ?>

    <?php if ($button_delete=='') { ?>
        document.getElementById('MultiDisabled_w').disabled = true;
    <?php } ?>

    <?php if ($button_delete_all=='') { ?>
        document.getElementById('MultiEnabled_w').disabled = true;
    <?php } ?>
        $('.overlay-cover-del').each(function() {
            i++;       
        }); 
        $('.num_w').html('[ '+i+' ]'); 
        }
    }else{
        $('.overlay-image'+id).addClass('overlay-cover-del');
        $('#icon-del'+id).show();
        $('.crck_w'+id).prop('checked', true);
    <?php if ($button_delete_all=='') { ?>
        document.getElementById('MultiDelete_w').disabled = false; 
    <?php } ?>

    <?php if ($button_delete=='') { ?>
        document.getElementById('MultiDisabled_w').disabled = false;  
    <?php } ?>

    <?php if ($button_delete_all=='') { ?>
        document.getElementById('MultiEnabled_w').disabled = false; 
    <?php } ?>
        $('.overlay-cover-del').each(function() {
        i++;       
        }); 
        $('.num_w').html('[ '+i+' ]'); 
    }        
});

//=========================Functions===========================
 function fetch_data_employee_sort(sort)  
{  
    $.ajax({  
        url:"select_em-widget.php",  
        method:"POST",  
        data:{sort:sort},
        success:function(data){  
        $('#live_em-widget').html(data);  
        }  
    });  
}

function fetch_data_employee_sort2(sort)  
{  
    $.ajax({  
        url:"select_em-list.php",  
        method:"POST",  
        data:{sort:sort},
        success:function(data){  
        $('#live_em-list').html(data);  
        }  
    });  
}

function fetch_data_employee_find_fast(name_f,sort)  
{  
    $.ajax({  
        url:"select_em-widget.php",  
        method:"POST",  
        data:{name:name_f,
            sort:sort},
        success:function(data){  
        $('#live_em-widget').html(data);  
        }  
    });  
}

function fetch_data_employee_find_fast_list(name_f,sort)  
{  
    $.ajax({  
        url:"select_em-list.php",  
        method:"POST",  
        data:{name:name_f,
            sort:sort},
        success:function(data){  
        $('#live_em-list').html(data);  
        }  
    });  
}

function fetch_data_employee_widged(name_em,sur_em,code_id_em,birthday,posi_em,authen_em,sort)  
{  
    $.ajax({  
        url:"select_em-widget.php",  
        method:"POST",  
        data:{name_em:name_em,
            sur_em:sur_em,
            code_id_em:code_id_em,
            birthday:birthday,
            posi_em:posi_em,
            sort:sort},
        success:function(data){  
        $('#live_em-widget').html(data);  
        }  
    });  
}

function fetch_data_employee_list(name_em,sur_em,code_id_em,birthday,posi_em,authen_em,sort)  
{  
    $.ajax({  
        url:"select_em-list.php",  
        method:"POST",  
        data:{name_em:name_em,
            sur_em:sur_em,
            code_id_em:code_id_em,
            birthday:birthday,
            posi_em:posi_em,
            sort:sort},
        success:function(data){  
        $('#live_em-list').html(data);  
        }  
    });  
} 

function fetch_data_employee_name(name)  
{  
    $.ajax({  
        url:"select_em-widget.php",  
        method:"POST",  
        data:{name:name},
        success:function(data){  
        $('#live_em-widget').html(data);  
        }  
    });  
} 

function fetch_data_employee_name_list(name)  
{  
    $.ajax({  
        url:"select_em-list.php",  
        method:"POST",  
        data:{name:name},
        success:function(data){  
        $('#live_em-list').html(data);  
        }  
    });  
}

function fetch_data_employee(page,name_f,name,code,surname,posi_em,code_id,date,sort)  
{  
    $.ajax({  
        url:"select_em-list.php",  
        method:"POST",  
        data:{page:page,
            name:name_f,
            name_em:name,
            sur_em:surname,
            code_id_em:code,
            birthday:date,
            posi_em:posi_em,
            sort:sort},
        success:function(data){  
    $('#live_em-list').html(data);  
        }  
    });  
}

function fetch_data_employee2(page,name_f,name,code,surname,code_id,date,sort)  
{  
    $.ajax({ 
        url:"select_em-widget.php",  
        method:"POST",  
        data:{page:page,
            name:name_f,
            name_em:name,
            sur_em:surname,
            code_id_em:code,
            birthday:code_id,
            posi_em:date,
            sort:sort},
        success:function(data){  
    $('#live_em-widget').html(data);  
        }  
    });  
}

function ClickCheckAll_W(){
    var i=1;
    for(i=1;i<=document.frmMain_w.hdnCount_w.value;i++){
    $('.num_w').html('[ '+i+' ]');
    if($('#checkall').is(":checked")){
        eval("document.frmMain_w.crck"+i+".checked=true");
        $(".discard").addClass("overlay-cover-del"); 
        $(".icon-del").show();
    <?php if ($button_delete_all=='') { ?>
        document.getElementById('MultiDelete_w').disabled = false; 
    <?php } ?>

    <?php if ($button_delete=='') { ?>
        document.getElementById('MultiDisabled_w').disabled = false;  
    <?php } ?>

    <?php if ($button_delete_all=='') { ?>
        document.getElementById('MultiEnabled_w').disabled = false; 
    <?php } ?>    

    }else{

        $('.num_w').html('');
        eval("document.frmMain_w.crck"+i+".checked=false");
        $(".icon-del").hide();
    <?php if ($button_delete_all=='') { ?>
        document.getElementById('MultiDelete_w').disabled = true;
    <?php } ?>

    <?php if ($button_delete=='') { ?>
        document.getElementById('MultiDisabled_w').disabled = true;
    <?php } ?>

    <?php if ($button_delete_all=='') { ?>
        document.getElementById('MultiEnabled_w').disabled = true;
    <?php } ?>
        $(".discard").removeClass("overlay-cover-del"); 
    }
    }
}

function ClickCheckAll(vol)
{

    var i=1;
    for(i=1;i<=document.frmMain.hdnCount.value;i++)
    {
    $('.num_').html('[ '+i+' ]');
    if(vol.checked == true)
    {
        eval("document.frmMain.Chk"+i+".checked=true");
        $("tr").addClass("remove-item"); 
<?php if ($button_delete_all=='') { ?>
        document.getElementById('MultiDelete').disabled = false; 
<?php } ?>

<?php if ($button_delete=='') { ?>
        document.getElementById('MultiDisabled').disabled = false; 
<?php } ?>

<?php if ($button_delete_all=='') { ?> 
        document.getElementById('MultiEnabled').disabled = false;   
<?php } ?>
    }
    else
    {
        $('.num_').html('');
        eval("document.frmMain.Chk"+i+".checked=false");
<?php if ($button_delete_all=='') { ?>
        document.getElementById('MultiDelete').disabled = true;
<?php } ?>

<?php if ($button_delete=='') { ?>
        document.getElementById('MultiDisabled').disabled = true;
<?php } ?>

<?php if ($button_delete_all=='') { ?>
        document.getElementById('MultiEnabled').disabled = true;
<?php } ?>
        $("tr").removeClass("remove-item");
    }
    }
}
</script>

<script>
	
	<?php
		if($button_view != ''){
			$btn_view = explode(":", $button_view);
			$btn_view_show = $btn_view[0].$btn_view[1];
	?>
		var btn_view = 'displaynone'
		var btn_view_show = '<?php echo $btn_view_show; ?>'
		if(btn_view == btn_view_show ){

							swal.fire({
							title: 'คุณไม่มีสิทธิเข้าใช้งาน หน้านี้',
							icon: 'warning',
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							allowEscapeKey : false,
							allowOutsideClick: false,
							confirmButtonText: 'ตกลง',
							onClose: () => {
									   window.location.href = "../";
								 }
						  })
	}
	<?php } ?>
</script>

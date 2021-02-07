<?php include('../template/header.php'); ?>
<?php
//session_start(); เดิม

require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';
$db = new DB();

$role_id_ed ='';
if (isset($_GET['role_id'])) {
} else {
    $role_id_ed  = 'none_data';
}
$role_id_ed = $db->clear($role_id_ed);

if (isset($_GET['se'])) {
    $user_type_se = $_GET['se'];
} else {
    $user_type_se  = 'none_data';
}
$user_type_se = $db->clear($user_type_se);

$per_id_edd ='';
if (isset($_GET['per_id'])) {
    $per_id_edd = $_GET['per_id'];
} else {
    $per_id_edd  = 'none_data';
}
$per_id_edd = $db->clear($per_id_edd);

$str_ed = "SELECT * FROM roles WHERE  id_role = '".$user_type_se."' ";
$result_ed = $db->QueryFetchArray($str_ed);

$result_ck = null;
$res_ed = null;
$user_name = '';
$role_tag = isset($result_ed)?$result_ed['tag']:null;

$str_chk = null;

if (isset($role_tag)) {
    switch ($role_tag) {
        case "mod_employee":
            $str_chk = "SELECT *,`roles`.name as role_name  ,CONCAT(`mod_employee`.`username`, ' ', `mod_employee`.`surname`) AS member_name  FROM `mod_employee`";
            $str_chk .= " INNER JOIN `users` ON `mod_employee`.`id_employee` = `users`.`id_data_role`";
            $str_chk .= " LEFT JOIN `roles` ON `users`.`id_role` = `roles`.`id_role`";
            $str_chk .= " WHERE `users`.`delete_datetime` IS NULL ";
            $str_chk .= " AND `roles`.`tag` = 'mod_employee'";

            if (isset($per_id_edd) && $per_id_edd != 'none_data') {
                $query_ed = $str_chk . " AND `users`.`id_user` = '" . $per_id_edd . "'";
                $res_ed =  $db->QueryFetchArray($query_ed);
                if (isset($res_ed)) {
                    $user_name = $res_ed['username'] . ' ' .$res_ed['surname'] ;
                }
            }
        break;
        case "mod_customer":
            $str_chk = "SELECT *,`roles`.name as role_name  ,CONCAT(`mod_customer`.`forename`, ' ', `mod_customer`.`surename`) AS member_name FROM `mod_customer`";
            $str_chk .= " INNER JOIN `users` ON `mod_customer`.`id_customer` = `users`.`id_data_role`";
            $str_chk .= " LEFT JOIN `roles` ON `users`.`id_role` = `roles`.`id_role`";
            $str_chk .= " WHERE `users`.`delete_datetime` IS NULL ";
            $str_chk .= " AND `roles`.`tag` = 'mod_customer'";
            //var_dump($str_chk);

            if (isset($per_id_edd) && $per_id_edd != 'none_data') {
                $query_ed = $str_chk . " AND `users`.`id_user` = '" . $per_id_edd . "'";
                $res_ed =  $db->QueryFetchArray($query_ed);
                if (isset($res_ed)) {
                    $user_name = $res_ed['forename'] . ' ' .$res_ed['surename'] ;
                }
            }
        break;
        case "mod_company":
            $str_chk = "SELECT *,`roles`.name as role_name  ,`mod_company`.`name` AS member_name FROM `mod_company`";
            $str_chk .= " INNER JOIN `users` ON `mod_company`.`id_company` = `users`.`id_data_role`";
            $str_chk .= " LEFT JOIN `roles` ON `users`.`id_role` = `roles`.`id_role`";
            $str_chk .= " WHERE `users`.`delete_datetime` IS NULL ";
            $str_chk .= " AND `roles`.`tag` = 'mod_company'";

            if (isset($per_id_edd) && $per_id_edd != 'none_data') {
                $query_ed = $str_chk . " AND `users`.`id_user` = '" . $per_id_edd . "'";
                $res_ed =  $db->QueryFetchArray($query_ed);
                if (isset($res_ed)) {
                    $user_name = $res_ed['name']  ;
                }
            }
        break;
    }
    //var_dump($str_chk);
    $result_ck = $db->Query($str_chk);
    //var_dump($result_ck);

    if (isset($per_id_edd) && $per_id_edd != 'none_data') {
    }
}


?>


<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<?php require_once('../template/menu.php'); ?>
<!-- ============================================================== -->
<?php require_once '../lib/permission.php'; ?>

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
 <?php
    $sql_admin ="SELECT `admin` FROM `users` WHERE `id_data_role`='".$_SESSION["id_data"]."' ";
    $objQuery_admin = $db->Query($sql_admin);
    $objResult_admin = mysqli_fetch_array($objQuery_admin, MYSQLI_ASSOC);
   $status_admin = $objResult_admin["admin"];
 ?>       
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">จัดการสิทธิ์การใช้งาน<?php //echo $per_id_edd ;//echo $objResult_admin["admin"];//echo $_SESSION["id_data"]; // var_dump($_SESSION)   ?></h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:location.href='../index.php'">Home</a></li>
                    <li class="breadcrumb-item active">จัดการสิทธิ์การใช้งาน</li>
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


        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="card">
            <div class="card-header oncard-header">
                <span style="font-size: 18px;">คำแนะนำในการใช้งาน</span>
                <div class="card-actions">
                    <a class="" data-action="collapse"><i class="ti-minus"></i></a>
                    <!--<a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>-->
                    <a class="btn-close" data-action="close"><i class="ti-close"></i></a>
                </div>
            </div>
            <div class="card-body collapse">
                <i class="fa fa-caret-right"></i>&nbsp;&nbsp;สิทธิ์การใช้งาน เป็นการกำหนดสิทธิ์การใช้งานให้แก่ผู้ใช้งานระบบ (User)<br>
                <i class="fa fa-caret-right"></i>&nbsp;&nbsp;สามารถแก้ไข/ลบ
                สิทธิ์ผู้ใช้งานได้โดยคลิกไอคอนใต้หัวข้อผู้ใช้งานที่ต้องการ<br>
                <i class="fa fa-caret-right"></i>&nbsp;&nbsp;กรณีที่มีการลบข้อมูล ระบบจะขึ้นข้อความแจ้งเตือน
                เพื่อยืนยันการลบ หากทำการยืนยันเรียบร้อยแล้ว จะไม่สามารถกู้คืนข้อมูลได้<br>
                <i class="fa fa-caret-right"></i>&nbsp;&nbsp;สามารถค้นหาผู้ใช้งานได้โดยใส่ชื่อผู้ใช้งานช่องค้นหา<br>
                <i class="fa fa-caret-right"></i>&nbsp;&nbsp;ขั้นตอนการกำหนดสิทธิ์การใช้งาน<br>
                <i class="fa fa-caret-right"></i>&nbsp;&nbsp;&nbsp;&nbsp;1.) เลือกกลุ่มผู้ใช้งาน<br>
                <i class="fa fa-caret-right"></i>&nbsp;&nbsp;&nbsp;&nbsp;2.) เลือกผู้ใช้งาน<br>
                <i class="fa fa-caret-right"></i>&nbsp;&nbsp;&nbsp;&nbsp;3.) กำหนด Username และ Password<br>
                <i class="fa fa-caret-right"></i>&nbsp;&nbsp;&nbsp;&nbsp;4.) กำหนดสิทธิ์การใช้งาน<br>
            </div>
        </div>
        <!-- Row -->
        <div class="row">
            <div class="col-md-6">
            <?php
            //var_dump($per_id_edd);
            //var_dump($result_ed);
            ?>
            <div class="card <?php if ($per_id_edd  != 'none_data') {
                print "card-outline-warning";
            } elseif ($per_id_edd=='none_data') {
                print "card-outline-info";
            } ?>">
                    <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                        <h4 class="m-b-0 text-white"><?php if ($per_id_edd  != 'none_data') {
                print "แก้ไขผู้ใช้งาน";
            } elseif ($per_id_edd=='none_data') {
                print "เพิ่มผู้ใช้งาน";
            } ?></h4>
                        </div>
                        <div class="col-md-2 float-right">
                        <div class="card-actions">
<?php if ($per_id_edd  != 'none_data') { ?>
    <button type="button" name="" id="" class="btn btn-danger cancel_edit_btn" btn-lg btn-block"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button>

<?php } elseif ($per_id_edd=='none_data') { ?>

    <a class="" data-action="collapse"><i class="ti-plus text-success"></i></a>

<?php } ?>
</div>
                        </div>
                    </div>


                        

                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" id="frmADD" class="upload-form-add form-horizontal">
                        <div class="form-body">
                            <input type="hidden" name="_method" value="<?php if ($per_id_edd  != 'none_data') {
                print "EDIT_PERMISSION_ADD";
            } elseif ($per_id_edd  == 'none_data') {
                print "ADD_PERMISSION";
            } ?>">
                            <input type="hidden" name="role_id_og" value="<?=$result_ed['id_role']?>">
                            <input type="hidden" name="per_id_og" id="id_user" value="<?=$res_ed['id_user']?>">

                            <h3 class="box-title" id="top">ผู้ใช้งาน</h3>
                            <input type="hidden" name="per_id_edd_edit" id="per_id_edd_edit" value="<?php echo $per_id_edd ?>">
                            <hr class="m-t-0 m-b-40">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">กลุ่มผู้ใช้งาน</label>
                                        <div class="col-md-9">
                                            <?php
                                            $str_ro = "SELECT * FROM roles where delete_datetime is null order by name asc";
                                            $query_ro = $db->Query($str_ro);
                                            if ($query_ro) {
                                                ?>     
                                            <?php while ($result_ro = mysqli_fetch_array($query_ro)) {?>
                                                <input name="user_type" type="radio" id="user_type_<?=$result_ro['id_role']?>" value="<?=$result_ro['id_role']?>" 
                                                onclick="handleClick(this);" <?php if ($user_type_se==$result_ro['id_role']) {
                                                    print'checked';
                                                } else {
                                                    print'';
                                                }?> />
                                                <label for="user_type_<?=$result_ro['id_role']?>"><?=$result_ro['name']?></label>                                                
                                            <?php }
                                            }?>
                                        </div>
                                    </div>
                                </div>
                            </div><!--/row-->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">ผู้ใช้งาน</label>
                                        <div class="col-md-9" style="<?php if ($per_id_edd  == 'none_data') {
                                                print"display:none;";
                                            } else {
                                                print'';
                                            }?> ">
                                            <input type="text" name="userName"  class="form-control" value="<?=$user_name?> "  placeholder="" aria-describedby="userName" readonly>
                                            <input type="hidden" name="userId"  class="form-control" value="<?=$res_ed['id_user']?>"  placeholder="" aria-describedby="helpId">

                                        </div><!--/Not select role -->
                                        <div class="col-md-9" style="<?php if ($per_id_edd  != 'none_data') {
                                                print"display:none;";
                                            } else {
                                                print'';
                                            }?> ">
                                            <?php
                                            //var_dump($result_ed);

                                            ?>

                                            <select  class="form-control custom-select"  data-show-subtext="true" data-live-search="true"   name="user" id="user">
                                                <option value="0"  selected="selected">- กรุณาเลือก -</option>
                                            <?php
                                            
                                            if (isset($user_type_se) && $user_type_se !='none_data' && isset($result_ed)) {
                                                switch ($result_ed["tag"]) {
                                                    case "mod_employee":
                                                        $str_us1 = "SELECT * FROM mod_employee  WHERE mod_employee.id_employee NOT IN (SELECT  id_data_role  FROM users WHERE users.delete_datetime IS NULL)";
                                                        $query_us1 = $db->Query($str_us1);
                                                        ?>
                                                        <?php while ($result_us1 = mysqli_fetch_array($query_us1)) {?>
                                                        <option value="<?=$result_us1['id_employee']?>" ><?=$result_us1['username']?> <?=$result_us1['surname']?></option>
                                                        <?php } ?>

                                                        <?php

                                                    break;
                                                    case "mod_customer":
                                                        $str_us1 = "SELECT * FROM mod_customer  WHERE mod_customer.id_customer NOT IN (SELECT  id_data_role  FROM users WHERE users.delete_datetime IS NULL)";
                                                        $query_us1 = $db->Query($str_us1);
                                                        ?>
                                                        <?php while ($result_us1 = mysqli_fetch_array($query_us1)) {?>
                                                        <option value="<?=$result_us1['id_customer']?>" ><?=$result_us1['forename']?> <?=$result_us1['surename']?></option>
                                                        <?php } ?>

                                                        <?php

                                                    break;
                                                    case "tutor":
                                                        $str_us1 = "SELECT * FROM tutor  WHERE tutor.id_tutor NOT IN (SELECT  id_data_role  FROM users WHERE users.delete_datetime IS NULL)";
                                                        $query_us1 = $db->Query($str_us1);
                                                        ?>
                                                        <?php while ($result_us1 = mysqli_fetch_array($query_us1)) {?>
                                                        <option value="<?=$result_us1['id_tutor']?>" ><?=$result_us1['forename_th']?> <?=$result_us1['surename_th']?></option>
                                                        <?php } ?>

                                                        <?php

                                                    break;
                                                    case "partner":
                                                        $str_us1 = "SELECT * FROM partner  WHERE partner.id_partner NOT IN (SELECT  id_data_role  FROM users WHERE users.delete_datetime IS NULL)";
                                                        $query_us1 = $db->Query($str_us1);
                                                        ?>
                                                        <?php while ($result_us1 = mysqli_fetch_array($query_us1)) {?>
                                                        <option value="<?=$result_us1['id_partner']?>" ><?=$result_us1['name_th']?></option>
                                                        <?php } ?>

                                                        <?php

                                                    break;
                                                    case "mod_company":
                                                        $str_us1 = "SELECT * FROM mod_company  WHERE mod_company.id_company NOT IN (SELECT  id_data_role  FROM users WHERE users.delete_datetime IS NULL)";
                                                        $query_us1 = $db->Query($str_us1);
                                                        ?>
                                                        <?php while ($result_us1 = mysqli_fetch_array($query_us1)) {?>
                                                        <option value="<?=$result_us1['id_company']?>" ><?=$result_us1['name']?></option>
                                                        <?php } ?>

                                                        <?php

                                                    break;
                                                ?>

                                            <?php
                                            }
                                            }?>
                                            </select>

                                        </div><!--/Role selected. -->
                                    </div>
                                    <div id="user"></div>
                                </div>
                            </div><!--/row-->

                            <h3 class="box-title">การเข้าสู่ระบบ</h3>
                            <hr class="m-t-0 m-b-40">
                            <div class="row">
                                <div class="col-md-12" <?php if ($per_id_edd  != 'none_data') {
                                                print'style="display: none;"';
                                            } else {
                                                print'';
                                            }?>>
                                    <div class="form-group row">
                                        <label for="exampleInputuname3" class="col-sm-3 control-label"><?=lang('ชื่อผู้ใช้งาน', 'Username')?>
                                            <font class="text-warning" id="employee-user-text">*</font>
                                        </label>                                        
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="ti-user"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control " id="employee-user" name="employee-user"  value=""
                        placeholder="<?=lang('ชื่อผู้ใช้งานสำหรับเข้าสู่ระบบ', 'Username for login')?>">
                                            </div>
                                            <span class="help-block ">
                                                <small>                                        
                                                <i class="fa fa-spinner fa-spin spin-check" style="position:absolute; margin-left: 10px; color: green !important; display: none; "></i>
                                                <i class="fa fa-check success-check" id="success_user" style="position:absolute;margin-left: 10px; color: green !important; display: none;"></i>
                                                <i class="fa fa-times-circle wrong-check" id="wrong_user" style="position:absolute; margin-left: 10px; color: orange !important; display: none;"> <?=lang('มีผู้อื่นใช้แล้ว', 'username has exists.')?></i>
                                                </small>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputPassword4" class="col-sm-3 control-label"><?=lang('รหัสผ่าน', 'Password')?>
                                            <font class="text-warning" id="employee-pass-text">*</font>
                                        </label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="ti-lock"></i>
                                                    </span>
                                                </div>
                                                <input type="password" class="form-control " id="employee-pass" name="employee-pass"  data-old="<?php echo $res_ed['user_password'] ?>" value="<?php echo $res_ed['user_password'] ?>"
                        placeholder="<?=lang('รหัสผ่านสำหรับเข้าสู่ระบบ', 'Login password')?>">
                                            </div>
                                            <span class="help-block ">

                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputPassword5" class="col-sm-3 control-label"><?=lang('รหัสผ่านอีกครั้ง', 'Password again')?>
                                            <font class="text-warning" id="employee-passA-text">*</font>
                                        </label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="ti-lock"></i>
                                                    </span>
                                                </div>
                                                <input type="password" class="form-control " id="employee-pass-again" name="employee-again-pass" 
                        placeholder="<?=lang('ยืนยันรหัสผ่าน', 'Re-enter password')?>">
                                            </div>
                                            <span class="help-block ">
                                            <font class="text-warning" id="employee-passA-again" style="display: none;">
                        <?=lang('*กรุณากรอกรหัสผ่านให้ตรงกัน', '* Please enter the corresponding password.')?></font>

                                            </span>
                                        </div>
                                    </div>
                                    

                                </div><!--/per_id_edd  != none_data-->

                                <div class="col-md-12" <?php if ($per_id_edd  == 'none_data') {
                                                print'style="display: none;"';
                                            } else {
                                                print'';
                                            }?>>
                                    <div class="form-group row">
                                        <label for="exampleInputuname3" class="col-sm-3 control-label"><?=lang('ชื่อผู้ใช้งาน', 'Username')?>
                                            <font class="text-warning" id="employee-user-text_ed" style="display: none;">*</font>
                                        </label>                                        
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="ti-user"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control " id="employee-user_ed" name="employee-user_ed" placeholder="" data-old="<?php echo $res_ed['user_name'] ?>" value="<?php echo $res_ed['user_name'] ?>" <?php echo $input_read; ?>>
                                            </div>
                                            <span class="help-block ">
                                                <small>                                        
                                                <i class="fa fa-spinner fa-spin spin-check" style="position:absolute; margin-left: 10px; color: green !important; display: none; "></i>
                                                <i class="fa fa-check success-check" id="success_user_ed" style="position:absolute;margin-left: 10px; color: green !important; "></i>
                                                <i class="fa fa-times-circle wrong-check"  style="position:absolute; margin-left: 10px; color: orange !important; display: none;"> <?=lang('มีผู้อื่นใช้แล้ว', 'username has exists.')?></i>
                                                </small>
                                                <br>
                                                <span class="btn btn-warning" id="change-pass"  style="margin-top: 5px; <?php echo $button_update; ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i> <?=lang('เปลี่ยนรหัสผ่าน', 'Change password')?></span> 
                                            </span>
                                        </div>
                                    </div>

                                    <div class="change-pass" style="display: none;">
                                        <div class="form-group row">
                                            <label for="inputPassword4" class="col-sm-3 control-label"><?=lang('รหัสผ่าน', 'Password')?>
                                                <font class="text-warning" id="employee-pass-text_ed">*</font>
                                            </label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <i class="ti-lock"></i>
                                                        </span>
                                                    </div>
                                                    <input type="password" class="form-control " id="employee-pass_ed" name="employee-pass_ed" placeholder="" value="">
                                                </div>
                                                <span class="help-block ">

                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputPassword5" class="col-sm-3 control-label"><?=lang('รหัสผ่านอีกครั้ง', 'Password again')?>
                                                <font class="text-warning" id="employee-passA-text_ed">*</font>
                                            </label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <i class="ti-lock"></i>
                                                        </span>
                                                    </div>
                                                    <input type="password" class="form-control " id="employee-pass-again_ed" name="employee-again-pass_ed" placeholder="" value="">
                                                </div>
                                                <span class="help-block ">
                                                <font class="text-warning" id="employee-passA-again_ed" style="display: none;">
                            <?=lang('*กรุณากรอกรหัสผ่านให้ตรงกัน', '* Please enter the corresponding password.')?></font>

                                                </span>
                                            </div>
                                        </div>

                                    </div>

                                </div><!--/per_id_edd  == none_data-->

                            </div><!--/row-->

                            <h3 class="box-title">สิทธิ์การใช้งาน</h3>
                            <h6 class="card-subtitle">สัญลักษณ์ :: <i class="fas fa-eye" style="color: #03A9F4;"></i> = <code>View</code> , 
 <i class="fas fa-plus" style="color: #26C6DA;"/></i> = <code>Create</code> , <i class="fas fa-pencil-alt" style="color:#CDDC39; "/></i> = <code>Update</code> ,
 <i class="fas fa-trash-alt" style="color: #c30000;"/></i> = <code>Delete</code> ,<i class="mdi mdi-file-export" style="color: #7460EE;"/></i> = <code>Export</code> ,
  <i class="mdi mdi-file-import" style="color: #E91E63;"/></i> = <code>Import</code> , <i class="mdi mdi-printer" style="color: #FFC107;"/></i> = <code>Print</code> ,
   <i class="mdi mdi-check-circle" style="color: #FF5722;"/></i> = <code>Approval</code>  </h6>
                            <hr class="m-t-0 m-b-40">
                            <div class="row">
                                <div class="col-md-12 ">
                                <input type="checkbox" id="checkall"  />
                                <label for="checkall">ทำได้ทุกฟังก์ชัน</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs profile-tab" role="tablist">
                                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#content" role="tab">Content</a> </li>
                                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#design" role="tab">Design</a> </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="content" role="tabpanel">
                                                <div class="card-body">
                                                    <?php 
                                                    if ($per_id_edd  != 'none_data') {
                                                        $str_perm = "SELECT`user_permissions`.*,`system`.`link_system` 
                                                        FROM `user_permissions`,`system` ,`roles`,`users`
                                                        WHERE `user_permissions`.id_system = `system`.`id_system`
                                                        AND `roles`.`id_role` = `users`.id_role
                                                        AND `user_permissions`.`id_user` = `users`.`id_user` AND `users`.`id_user` = '".$per_id_edd."' ";
                                                    } elseif ($per_id_edd  == 'none_data') {
                                                        $str_perm = "SELECT role_permissions.*,`system`.`link_system` 
                                                        FROM role_permissions,`system` ,`roles`
                                                        WHERE role_permissions.id_system = `system`.`id_system`
                                                        AND `roles`.`id_role` = role_permissions.id_role AND  `roles`.id_role = '".$user_type_se."' ";
                                                    }

                                                    
                                                    
                                                    $result_perm = $db->Query($str_perm);
                                                    $task_view = array();
                                                    $task_authen = array();
                                                    $permissions = array();
                                                    if ($result_perm) {
                                                        while ($obResult = mysqli_fetch_array($result_perm)) {
                                                            array_push($permissions, array("id"=>$obResult['id_system'],"permissions"=>$obResult['permissions'],"link"=>$obResult['link_system']));
                                                            array_push($task_view, $obResult['id_system']);
                                                            array_push($task_authen, $obResult['permissions']);
                                                        }
                                                    }

                                                   // $str = "SELECT * FROM system WHERE type = '1' AND level = '1'";
                                                    if ($status_admin =='0') {
                                                        $str = " SELECT`user_permissions`.*,`system`.`link_system`,`system`.`name_system`,`system`.`type`,`system`.`level`,`system`.`icon`  FROM `user_permissions`,`system` ,`roles`,`users` WHERE `user_permissions`.id_system = `system`.`id_system` AND `roles`.`id_role` = `users`.id_role AND `user_permissions`.`id_user` = `users`.`id_user` AND `users`.`id_data_role` = '".$_SESSION["id_data"]."' AND `system`.type ='1' AND `system`.`level`='1' ORDER BY `system`.sort ASC

                                                      ";
                                                    }else if ($status_admin =='1') {
                                                              $str = "SELECT * FROM system WHERE type = '1' AND level = '1' ORDER BY `system`.sort ASC";
                                                            }
                                                    $query = $db->Query($str);
                                                    $output = '';
                                                    $i = 0;
                                                    
                                                    while ($objResult = mysqli_fetch_array($query)) {
                                                        $task = searchByValue($objResult['id_system'], $permissions);
                                    
                                                        if (isset($task)) {
                                                            $key = array_search($objResult['id_system'], $task);
                                                            $auth = $task["permissions"];
                                                            $arrAuth = explode(",", $auth);

                                                            $chk_view = ((array_search('1', $arrAuth)) === false)?'':'checked';
                                                            $chk_create = ((array_search('2', $arrAuth)) === false)?'':'checked';
                                                            $chk_update = ((array_search('3', $arrAuth)) === false)?'':'checked';
                                                            $chk_delete = ((array_search('4', $arrAuth)) === false)?'':'checked';
                                                            $chk_download = ((array_search('5', $arrAuth)) === false)?'':'checked';
                                                            $chk_upload = ((array_search('6', $arrAuth)) === false)?'':'checked';
                                                            $chk_print = ((array_search('7', $arrAuth)) === false)?'':'checked';
                                                            $chk_approval = ((array_search('8', $arrAuth)) === false)?'':'checked';
                                                        } else {
                                                            $chk_view = '';
                                                            $chk_create = '';
                                                            $chk_update = '';
                                                            $chk_delete = '';
                                                            $chk_download = '';
                                                            $chk_upload = '';
                                                            $chk_print = '';
                                                            $chk_approval = '';
                                                        }

                                                        if ($objResult['icon']=='') {
                                                            $icon = '<i class="fa fa-circle-o text-yellow"></i>';
                                                        } else {
                                                            $icon = $objResult['icon'];
                                                        }
                                                        $i++;

                                                        $output .= '<div class="row">';
                                                        $output .= '<div class="col-md-4 ">';
                                                        $output .= '<div class="form-group">
                                                        <label style="cursor:pointer; font-weight:normal !important;">                             
                                                            '.$icon.'&nbsp;'.$objResult["name_system"].'
                                                        </label>                                       
                                                    </div>';
                                                        $output .= '</div>';
                                                        $output .= '<div class="col-md-8 ">';
                                                        $output .= '<input type="hidden" name="general_id'.$i.'" value="'.$objResult['id_system'].'" />';
                                                        $output .= '<input type="checkbox" id="general'.$i.'_1" name="general'.$i.'[]" class="filled-in chk-col-light-blue" '.$chk_view.' 
                            data-toggle="tooltip" data-placement="top" title="View"  value = "1" />
                            <label for="general'.$i.'_1"><i class="fas fa-eye " style="color: #03A9F4;"/></i></label>';
                                                        $output .= '<input type="checkbox" id="general'.$i.'_2" name="general'.$i.'[]" class="filled-in chk-col-green" '.$chk_create.' 
                            data-toggle="tooltip" data-placement="top" title="Create" value = "2"/>
                            <label for="general'.$i.'_2"><i class="fas fa-plus" style="color: #26C6DA;"/></i></label>';
                                                        $output .= '<input type="checkbox" id="general'.$i.'_3" name="general'.$i.'[]" class="filled-in chk-col-lime" '.$chk_update.' 
                            data-toggle="tooltip" data-placement="top" title="Update" value = "3"/>
                            <label for="general'.$i.'_3"><i class="fas fa-pencil-alt" style="color: #CDDC39;"/></i></label>';
                                                        $output .= '<input type="checkbox" id="general'.$i.'_4" name="general'.$i.'[]" class="filled-in chk-col-red" '.$chk_delete.' 
                            data-toggle="tooltip" data-placement="top" title="Delete" value = "4"/>
                            <label for="general'.$i.'_4"><i class="fas fa-trash-alt" style="color: #c30000;"/></i></label>';
                                                        $output .= '<input type="checkbox" id="general'.$i.'_5" name="general'.$i.'[]" class="filled-in chk-col-purple" '.$chk_download.' 
                            data-toggle="tooltip" data-placement="top" title="Export" value = "5"/>
                            <label for="general'.$i.'_5"><i class="mdi mdi-file-export" style="color: #7460EE;"/></i></label>';
                                                        $output .= '<input type="checkbox" id="general'.$i.'_6" name="general'.$i.'[]" class="filled-in chk-col-pink" '.$chk_upload.' 
                            data-toggle="tooltip" data-placement="top" title="Import" value = "6"/>
                            <label for="general'.$i.'_6"><i class="mdi mdi-file-import" style="color: #E91E63;"/></i></label>';
                                                        $output .= '<input type="checkbox" id="general'.$i.'_7" name="general'.$i.'[]" class="filled-in chk-col-amber" '.$chk_print.' 
                            data-toggle="tooltip" data-placement="top" title="Print" value = "7"/>
                            <label for="general'.$i.'_7"><i class="mdi mdi-printer" style="color: #FFC107;"/></i></label>';
                                                        $output .= '<input type="checkbox" id="general'.$i.'_8" name="general'.$i.'[]" class="filled-in chk-col-deep-orange" '.$chk_approval.' 
                            data-toggle="tooltip" data-placement="top" title="Approval" value = "8"/>
                            <label for="general'.$i.'_8"><i class="mdi mdi-check-circle" style="color: #FF5722;"/></i></label>';
                                                        $output .= '</div>';
                                                        $output .= '</div>';

                                                        //$strSQL2 = "SELECT * FROM system WHERE level ='2' AND groups = '".$objResult['id_system']."'";
                                                        if ($status_admin =='0') {
                                                        $strSQL2 = " SELECT`user_permissions`.*,`system`.`link_system`,`system`.`name_system`,`system`.`type`,`system`.`level`,`system`.`icon`  FROM `user_permissions`,`system` ,`roles`,`users` WHERE `user_permissions`.id_system = `system`.`id_system` AND `roles`.`id_role` = `users`.id_role AND `user_permissions`.`id_user` = `users`.`id_user` AND `users`.`id_data_role` = '".$_SESSION["id_data"]."' AND `system`.groups ='".$objResult['id_system']."' AND `system`.`level`='2' ORDER BY `system`.sort ASC

                                                        ";
                                                        }else if ($status_admin =='1') {
                                                              $strSQL2 = "SELECT * FROM system WHERE level ='2' AND groups = '".$objResult['id_system']."' ORDER BY `system`.sort ASC";
                                                            }
                                                        $objQuery2 = $db->Query($strSQL2);
                                                        while ($objResult2 = mysqli_fetch_array($objQuery2)) {
                                                            $task = searchByValue($objResult2['id_system'], $permissions);
                                                            if (isset($task)) {
                                                                $key = array_search($objResult2['id_system'], $task);
                                                                $auth = $task["permissions"];
                                                                $arrAuth = explode(",", $auth);
                                
                                                                $chk_view = ((array_search('1', $arrAuth)) === false)?'':'checked';
                                                                $chk_create = ((array_search('2', $arrAuth)) === false)?'':'checked';
                                                                $chk_update = ((array_search('3', $arrAuth)) === false)?'':'checked';
                                                                $chk_delete = ((array_search('4', $arrAuth)) === false)?'':'checked';
                                                                $chk_download = ((array_search('5', $arrAuth)) === false)?'':'checked';
                                                                $chk_upload = ((array_search('6', $arrAuth)) === false)?'':'checked';
                                                                $chk_print = ((array_search('7', $arrAuth)) === false)?'':'checked';
                                                                $chk_approval = ((array_search('8', $arrAuth)) === false)?'':'checked';
                                                            } else {
                                                                $chk_view = '';
                                                                $chk_create = '';
                                                                $chk_update = '';
                                                                $chk_delete = '';
                                                                $chk_download = '';
                                                                $chk_upload = '';
                                                                $chk_print = '';
                                                                $chk_approval = '';
                                                            }
                                                            if ($objResult2['icon']=='') {
                                                                $icon2 = '<i class="fa fa-circle-o text-yellow"></i>';
                                                            } else {
                                                                $icon2 = $objResult2['icon'];
                                                            }
                                                            $i++;

                                                            $output .= '<div class="row">';
                                                            $output .= '<div class="col-md-4 ">';
                                                            $output .= '<div class="form-group">
                                                            <label style="cursor:pointer; padding-left:20px;">                             
                                                                '.$icon2.'&nbsp;'.$objResult2["name_system"].'
                                                            </label>                                       
                                                        </div>';
                                                            $output .= '</div>';
                                                            $output .= '<div class="col-md-8 ">';
                                                            $output .= '<input type="hidden" name="general_id'.$i.'" value="'.$objResult2['id_system'].'" />';
                                                            $output .= '<input type="checkbox" id="general'.$i.'_1" name="general'.$i.'[]" class="filled-in chk-col-light-blue" '.$chk_view.' 
                                data-toggle="tooltip" data-placement="top" title="View"  value = "1"/>
                                <label for="general'.$i.'_1"><i class="fas fa-eye" style="color: #03A9F4;"/></i></label>';
                                                            $output .= '<input type="checkbox" id="general'.$i.'_2" name="general'.$i.'[]" class="filled-in chk-col-green" '.$chk_create.' 
                                data-toggle="tooltip" data-placement="top" title="Create" value = "2"/>
                                <label for="general'.$i.'_2"><i class="fas fa-plus" style="color: #26C6DA;"/></i></label>';
                                                            $output .= '<input type="checkbox" id="general'.$i.'_3" name="general'.$i.'[]" class="filled-in chk-col-lime" '.$chk_update.' 
                                data-toggle="tooltip" data-placement="top" title="Update" value = "3"/>
                                <label for="general'.$i.'_3"><i class="fas fa-pencil-alt" style="color: #CDDC39;"/></i></label>';
                                                            $output .= '<input type="checkbox" id="general'.$i.'_4" name="general'.$i.'[]" class="filled-in chk-col-red" '.$chk_delete.' 
                                data-toggle="tooltip" data-placement="top" title="Delete" value = "4"/>
                                <label for="general'.$i.'_4"><i class="fas fa-trash-alt" style="color: #c30000;"/></i></label>';
                                                            $output .= '<input type="checkbox" id="general'.$i.'_5" name="general'.$i.'[]" class="filled-in chk-col-purple" '.$chk_download.' 
                                data-toggle="tooltip" data-placement="top" title="Export" value = "5"/>
                                <label for="general'.$i.'_5"><i class="mdi mdi-file-export" style="color: #7460EE;"/></i></label>';
                                                            $output .= '<input type="checkbox" id="general'.$i.'_6" name="general'.$i.'[]" class="filled-in chk-col-pink" '.$chk_upload.' 
                                data-toggle="tooltip" data-placement="top" title="Import" value = "6"/>
                                <label for="general'.$i.'_6"><i class="mdi mdi-file-import" style="color: #E91E63;"/></i></label>';
                                                            $output .= '<input type="checkbox" id="general'.$i.'_7" name="general'.$i.'[]" class="filled-in chk-col-amber" '.$chk_print.' 
                                data-toggle="tooltip" data-placement="top" title="Print" value = "7"/>
                                <label for="general'.$i.'_7"><i class="mdi mdi-printer" style="color: #FFC107;"/></i></label>';
                                                            $output .= '<input type="checkbox" id="general'.$i.'_8" name="general'.$i.'[]" class="filled-in chk-col-deep-orange" '.$chk_approval.' 
                                data-toggle="tooltip" data-placement="top" title="Approval" value = "8"/>
                                <label for="general'.$i.'_8"><i class="mdi mdi-check-circle" style="color: #FF5722;"/></i></label>';
                                                            $output .= '</div>';
                                                            $output .= '</div>';

                                                           // $strSQL3 = "SELECT * FROM system WHERE level ='3' AND groups = '".$objResult2['id_system']."'";
                                                            if ($status_admin =='0') {
                                                            $strSQL3 = " SELECT`user_permissions`.*,`system`.`link_system`,`system`.`name_system`,`system`.`type`,`system`.`level`,`system`.`icon`  FROM `user_permissions`,`system` ,`roles`,`users` WHERE `user_permissions`.id_system = `system`.`id_system` AND `roles`.`id_role` = `users`.id_role AND `user_permissions`.`id_user` = `users`.`id_user` AND `users`.`id_data_role` = '".$_SESSION["id_data"]."' AND `system`.groups ='".$objResult2['id_system']."' AND `system`.`level`='3' ORDER BY `system`.sort ASC

                                                            ";
                                                            }else if ($status_admin =='1') {
                                                              $strSQL3 = "SELECT * FROM system WHERE level ='3' AND groups = '".$objResult2['id_system']."' ORDER BY `system`.sort ASC";
                                                            }
                                                            $objQuery3 = $db->Query($strSQL3);
                                                            while ($objResult3 = mysqli_fetch_array($objQuery3)) {
                                                                $task = searchByValue($objResult3['id_system'], $permissions);
                                                                if (isset($task)) {
                                                                    $key = array_search($objResult3['id_system'], $task);
                                                                    $auth = $task["permissions"];
                                                                    $arrAuth = explode(",", $auth);
                                    
                                                                    $chk_view = ((array_search('1', $arrAuth)) === false)?'':'checked';
                                                                    $chk_create = ((array_search('2', $arrAuth)) === false)?'':'checked';
                                                                    $chk_update = ((array_search('3', $arrAuth)) === false)?'':'checked';
                                                                    $chk_delete = ((array_search('4', $arrAuth)) === false)?'':'checked';
                                                                    $chk_download = ((array_search('5', $arrAuth)) === false)?'':'checked';
                                                                    $chk_upload = ((array_search('6', $arrAuth)) === false)?'':'checked';
                                                                    $chk_print = ((array_search('7', $arrAuth)) === false)?'':'checked';
                                                                    $chk_approval = ((array_search('8', $arrAuth)) === false)?'':'checked';
                                                                } else {
                                                                    $chk_view = '';
                                                                    $chk_create = '';
                                                                    $chk_update = '';
                                                                    $chk_delete = '';
                                                                    $chk_download = '';
                                                                    $chk_upload = '';
                                                                    $chk_print = '';
                                                                    $chk_approval = '';
                                                                }
                                                                if ($objResult3['icon']=='') {
                                                                    $icon3 = '<i class="fa fa-circle-o text-yellow"></i>';
                                                                } else {
                                                                    $icon3 = $objResult2['icon'];
                                                                }
                                                                $i++;

                                                                $output .= '<div class="row">';
                                                                $output .= '<div class="col-md-4 ">';
                                                                $output .= '<div class="form-group">
                                                                <label style="cursor:pointer; padding-left:40px;">                             
                                                                    '.$icon3.'&nbsp;'.$objResult3["name_system"].'
                                                                </label>                                       
                                                            </div>';
                                                                $output .= '</div>';
                                                                $output .= '<div class="col-md-8 ">';
                                                                $output .= '<input type="hidden" name="general_id'.$i.'" value="'.$objResult3['id_system'].'" />';
                                                                $output .= '<input type="checkbox" id="general'.$i.'_1" name="general'.$i.'[]" class="filled-in chk-col-light-blue" '.$chk_view.' 
                                    data-toggle="tooltip" data-placement="top" title="View"  value = "1"/>
                                    <label for="general'.$i.'_1"><i class="fas fa-eye" style="color: #03A9F4;"/></i></label>';
                                                                $output .= '<input type="checkbox" id="general'.$i.'_2" name="general'.$i.'[]" class="filled-in chk-col-green" '.$chk_create.' 
                                    data-toggle="tooltip" data-placement="top" title="Create" value = "2"/>
                                    <label for="general'.$i.'_2"><i class="fas fa-plus" style="color: #26C6DA;"/></i></label>';
                                                                $output .= '<input type="checkbox" id="general'.$i.'_3" name="general'.$i.'[]" class="filled-in chk-col-lime" '.$chk_update.' 
                                    data-toggle="tooltip" data-placement="top" title="Update" value = "3"/>
                                    <label for="general'.$i.'_3"><i class="fas fa-pencil-alt" style="color: #CDDC39;"/></i></label>';
                                                                $output .= '<input type="checkbox" id="general'.$i.'_4" name="general'.$i.'[]" class="filled-in chk-col-red" '.$chk_delete.' 
                                    data-toggle="tooltip" data-placement="top" title="Delete" value = "4"/>
                                    <label for="general'.$i.'_4"><i class="fas fa-trash-alt" style="color: #c30000;"/></i></label>';
                                                                $output .= '<input type="checkbox" id="general'.$i.'_5" name="general'.$i.'[]" class="filled-in chk-col-purple" '.$chk_download.' 
                                    data-toggle="tooltip" data-placement="top" title="Export" value = "5"/>
                                    <label for="general'.$i.'_5"><i class="mdi mdi-file-export" style="color: #7460EE;"/></i></label>';
                                                                $output .= '<input type="checkbox" id="general'.$i.'_6" name="general'.$i.'[]" class="filled-in chk-col-pink" '.$chk_upload.' 
                                    data-toggle="tooltip" data-placement="top" title="Import" value = "6"/>
                                    <label for="general'.$i.'_6"><i class="mdi mdi-file-import" style="color: #E91E63;"/></i></label>';
                                                                $output .= '<input type="checkbox" id="general'.$i.'_7" name="general'.$i.'[]" class="filled-in chk-col-amber" '.$chk_print.' 
                                    data-toggle="tooltip" data-placement="top" title="Print" value = "7"/>
                                    <label for="general'.$i.'_7"><i class="mdi mdi-printer" style="color: #FFC107;"/></i></label>';
                                                                $output .= '<input type="checkbox" id="general'.$i.'_8" name="general'.$i.'[]" class="filled-in chk-col-deep-orange" '.$chk_approval.' 
                                    data-toggle="tooltip" data-placement="top" title="Approval" value = "8"/>
                                    <label for="general'.$i.'_8"><i class="mdi mdi-check-circle" style="color: #FF5722;"/></i></label>';
                                                                $output .= '</div>';
                                                                $output .= '</div>';
                                                            }//--- End Type 1 level 3
                                                        }//--- End Type 1 level 2
                                                    } //--- End Type 1 level 1
                                                    $output .=' <input id="count_general" type="hidden" value="'.$i.'" name="count_general">';
                                                    echo $output;

                                                    ?>

                                                </div>

                                            </div><!-- End Tab content -->
                                            <div class="tab-pane" id="design" role="tabpanel">
                                                <div class="card-body">
                                                <?php
                                                    //$str = "SELECT * FROM system WHERE type = '2' AND level = '1'";
                                                    if ($status_admin =='0') {
                                                            $str = " SELECT`user_permissions`.*,`system`.`link_system`,`system`.`name_system`,`system`.`type`,`system`.`level`,`system`.`icon`  FROM `user_permissions`,`system` ,`roles`,`users` WHERE `user_permissions`.id_system = `system`.`id_system` AND `roles`.`id_role` = `users`.id_role AND `user_permissions`.`id_user` = `users`.`id_user` AND `users`.`id_data_role` = '".$_SESSION["id_data"]."' AND `system`.type ='2' AND `system`.`level`='1' ORDER BY `system`.sort ASC

                                                            ";
                                                            }else if ($status_admin =='1') {
                                                               $str = "SELECT * FROM system WHERE type = '2' AND level = '1' ORDER BY `system`.sort ASC";
                                                            }
                                                    $query = $db->Query($str);
                                                    $output = '';
                                                    $i = 0;
                                                    while ($objResult = mysqli_fetch_array($query)) {
                                                        $task = searchByValue($objResult['id_system'], $permissions);
                                    
                                                        if (isset($task)) {
                                                            $key = array_search($objResult['id_system'], $task);
                                                            $auth = $task["permissions"];
                                                            $arrAuth = explode(",", $auth);

                                                            $chk_view = ((array_search('1', $arrAuth)) === false)?'':'checked';
                                                            $chk_create = ((array_search('2', $arrAuth)) === false)?'':'checked';
                                                            $chk_update = ((array_search('3', $arrAuth)) === false)?'':'checked';
                                                            $chk_delete = ((array_search('4', $arrAuth)) === false)?'':'checked';
                                                            $chk_download = ((array_search('5', $arrAuth)) === false)?'':'checked';
                                                            $chk_upload = ((array_search('6', $arrAuth)) === false)?'':'checked';
                                                            $chk_print = ((array_search('7', $arrAuth)) === false)?'':'checked';
                                                            $chk_approval = ((array_search('8', $arrAuth)) === false)?'':'checked';
                                                        } else {
                                                            $chk_view = '';
                                                            $chk_create = '';
                                                            $chk_update = '';
                                                            $chk_delete = '';
                                                            $chk_download = '';
                                                            $chk_upload = '';
                                                            $chk_print = '';
                                                            $chk_approval = '';
                                                        }

                                                        if ($objResult['icon']=='') {
                                                            $icon = '<i class="fa fa-circle-o text-yellow"></i>';
                                                        } else {
                                                            $icon = $objResult['icon'];
                                                        }
                                                        $i++;

                                                        $output .= '<div class="row">';
                                                        $output .= '<div class="col-md-4 ">';
                                                        $output .= '<div class="form-group">
                                                        <label style="cursor:pointer; font-weight:normal !important;">                             
                                                            '.$icon.'&nbsp;'.$objResult["name_system"].'
                                                        </label>                                       
                                                    </div>';
                                                        $output .= '</div>';
                                                        $output .= '<div class="col-md-8 ">';
                                                        $output .= '<input type="hidden" name="system_id'.$i.'" value="'.$objResult['id_system'].'" />';
                                                        $output .= '<input type="checkbox" id="system'.$i.'_1" name="system'.$i.'[]" class="filled-in chk-col-light-blue" '.$chk_view.' 
                            data-toggle="tooltip" data-placement="top" title="View" value = "1"/>
                            <label for="system'.$i.'_1"><i class="fas fa-eye" style="color: #03A9F4;"/></i></label>';
                                                        $output .= '<input type="checkbox" id="system'.$i.'_2" name="system'.$i.'[]" class="filled-in chk-col-green" '.$chk_create.' 
                            data-toggle="tooltip" data-placement="top" title="Create" value = "2"/>
                            <label for="system'.$i.'_2"><i class="fas fa-plus" style="color: #26C6DA;"/></i></label>';
                                                        $output .= '<input type="checkbox" id="system'.$i.'_3" name="system'.$i.'[]" class="filled-in chk-col-lime" '.$chk_update.' 
                            data-toggle="tooltip" data-placement="top" title="Update" value = "3"/>
                            <label for="system'.$i.'_3"><i class="fas fa-pencil-alt" style="color: #CDDC39;"/></i></label>';
                                                        $output .= '<input type="checkbox" id="system'.$i.'_4" name="system'.$i.'[]" class="filled-in chk-col-red" '.$chk_delete.' 
                            data-toggle="tooltip" data-placement="top" title="Delete" value = "4"/>
                            <label for="system'.$i.'_4"><i class="fas fa-trash-alt" style="color: #c30000;"/></i></label>';
                                                        $output .= '<input type="checkbox" id="system'.$i.'_5" name="system'.$i.'[]" class="filled-in chk-col-purple" '.$chk_download.' 
                            data-toggle="tooltip" data-placement="top" title="Export" value = "5"/>
                            <label for="system'.$i.'_5"><i class="mdi mdi-file-export" style="color: #7460EE;"/></i></label>';
                                                        $output .= '<input type="checkbox" id="system'.$i.'_6" name="system'.$i.'[]" class="filled-in chk-col-pink" '.$chk_upload.' 
                            data-toggle="tooltip" data-placement="top" title="Import" value = "6"/>
                            <label for="system'.$i.'_6"><i class="mdi mdi-file-import" style="color: #E91E63;"/></i></label>';
                                                        $output .= '<input type="checkbox" id="system'.$i.'_7" name="system'.$i.'[]" class="filled-in chk-col-amber" '.$chk_print.' 
                            data-toggle="tooltip" data-placement="top" title="Print" value = "7"/>
                            <label for="system'.$i.'_7"><i class="mdi mdi-printer" style="color: #FFC107;"/></i></label>';
                                                        $output .= '<input type="checkbox" id="system'.$i.'_8" name="system'.$i.'[]" class="filled-in chk-col-deep-orange" '.$chk_approval.' 
                            data-toggle="tooltip" data-placement="top" title="Approval" value = "8"/>
                            <label for="system'.$i.'_8"><i class="mdi mdi-check-circle" style="color: #FF5722;"/></i></label>';
                                                        $output .= '</div>';
                                                        $output .= '</div>';

                                                        // $strSQL2 = "SELECT * FROM system WHERE level ='2' AND groups = '".$objResult['id_system']."'";
                                                        if ($status_admin =='0') {
                                                            $strSQL2 = " SELECT`user_permissions`.*,`system`.`link_system`,`system`.`name_system`,`system`.`type`,`system`.`level`,`system`.`icon`  FROM `user_permissions`,`system` ,`roles`,`users` WHERE `user_permissions`.id_system = `system`.`id_system` AND `roles`.`id_role` = `users`.id_role AND `user_permissions`.`id_user` = `users`.`id_user` AND `users`.`id_data_role` = '".$_SESSION["id_data"]."' AND `system`.groups ='".$objResult['id_system']."' AND `system`.`level`='2' ORDER BY `system`.sort ASC

                                                            ";
                                                            }else if ($status_admin =='1') {
                                                               $strSQL2 = "SELECT * FROM system WHERE level ='2' AND groups = '".$objResult['id_system']."' ORDER BY `system`.sort ASC";
                                                           }
                                                        $objQuery2 = $db->Query($strSQL2);
                                                        while ($objResult2 = mysqli_fetch_array($objQuery2)) {
                                                            $task = searchByValue($objResult2['id_system'], $permissions);
                                                            if (isset($task)) {
                                                                $key = array_search($objResult2['id_system'], $task);
                                                                $auth = $task["permissions"];
                                                                $arrAuth = explode(",", $auth);
                                
                                                                $chk_view = ((array_search('1', $arrAuth)) === false)?'':'checked';
                                                                $chk_create = ((array_search('2', $arrAuth)) === false)?'':'checked';
                                                                $chk_update = ((array_search('3', $arrAuth)) === false)?'':'checked';
                                                                $chk_delete = ((array_search('4', $arrAuth)) === false)?'':'checked';
                                                                $chk_download = ((array_search('5', $arrAuth)) === false)?'':'checked';
                                                                $chk_upload = ((array_search('6', $arrAuth)) === false)?'':'checked';
                                                                $chk_print = ((array_search('7', $arrAuth)) === false)?'':'checked';
                                                                $chk_approval = ((array_search('8', $arrAuth)) === false)?'':'checked';
                                                            } else {
                                                                $chk_view = '';
                                                                $chk_create = '';
                                                                $chk_update = '';
                                                                $chk_delete = '';
                                                                $chk_download = '';
                                                                $chk_upload = '';
                                                                $chk_print = '';
                                                                $chk_approval = '';
                                                            }
                                                            if ($objResult2['icon']=='') {
                                                                $icon2 = '<i class="fa fa-circle-o text-yellow"></i>';
                                                            } else {
                                                                $icon2 = $objResult2['icon'];
                                                            }
                                                            $i++;

                                                            $output .= '<div class="row">';
                                                            $output .= '<div class="col-md-4 ">';
                                                            $output .= '<div class="form-group">
                                                            <label style="cursor:pointer; padding-left:20px;">                             
                                                                '.$icon2.'&nbsp;'.$objResult2["name_system"].'
                                                            </label>                                       
                                                        </div>';
                                                            $output .= '</div>';
                                                            $output .= '<div class="col-md-8 ">';
                                                            $output .= '<input type="hidden" name="system_id'.$i.'" value="'.$objResult2['id_system'].'" />';
                                                            $output .= '<input type="checkbox" id="system'.$i.'_1" name="system'.$i.'[]" class="filled-in chk-col-light-blue" '.$chk_view.' 
                                data-toggle="tooltip" data-placement="top" title="View" value = "1"/>
                                <label for="system'.$i.'_1"><i class="fas fa-eye" style="color: #03A9F4;"/></i></label>';
                                                            $output .= '<input type="checkbox" id="system'.$i.'_2" name="system'.$i.'[]" class="filled-in chk-col-green" '.$chk_create.' 
                                data-toggle="tooltip" data-placement="top" title="Create" value = "2"/>
                                <label for="system'.$i.'_2"><i class="fas fa-plus" style="color: #26C6DA;"/></i></label>';
                                                            $output .= '<input type="checkbox" id="system'.$i.'_3" name="system'.$i.'[]" class="filled-in chk-col-lime" '.$chk_update.' 
                                data-toggle="tooltip" data-placement="top" title="Update" value = "3"/>
                                <label for="system'.$i.'_3"><i class="fas fa-pencil-alt" style="color: #CDDC39;"/></i></label>';
                                                            $output .= '<input type="checkbox" id="system'.$i.'_4" name="system'.$i.'[]" class="filled-in chk-col-red" '.$chk_delete.' 
                                data-toggle="tooltip" data-placement="top" title="Delete" value = "4"/>
                                <label for="system'.$i.'_4"><i class="fas fa-trash-alt" style="color: #c30000;"/></i></label>';
                                                            $output .= '<input type="checkbox" id="system'.$i.'_5" name="system'.$i.'[]" class="filled-in chk-col-purple" '.$chk_download.' 
                                data-toggle="tooltip" data-placement="top" title="Export" value = "5"/>
                                <label for="system'.$i.'_5"><i class="mdi mdi-file-export" style="color: #7460EE;"/></i></label>';
                                                            $output .= '<input type="checkbox" id="system'.$i.'_6" name="system'.$i.'[]" class="filled-in chk-col-pink" '.$chk_upload.' 
                                data-toggle="tooltip" data-placement="top" title="Import" value = "6"/>
                                <label for="system'.$i.'_6"><i class="mdi mdi-file-import" style="color: #E91E63;"/></i></label>';
                                                            $output .= '<input type="checkbox" id="system'.$i.'_7" name="system'.$i.'[]" class="filled-in chk-col-amber" '.$chk_print.' 
                                data-toggle="tooltip" data-placement="top" title="Print" value = "7"/>
                                <label for="system'.$i.'_7"><i class="mdi mdi-printer" style="color: #FFC107;"/></i></label>';
                                                            $output .= '<input type="checkbox" id="system'.$i.'_8" name="system'.$i.'[]" class="filled-in chk-col-deep-orange" '.$chk_approval.' 
                                data-toggle="tooltip" data-placement="top" title="Approval" value = "8"/>
                                <label for="system'.$i.'_8"><i class="mdi mdi-check-circle" style="color: #FF5722;"/></i></label>';
                                                            $output .= '</div>';
                                                            $output .= '</div>';

                                                            // $strSQL3 = "SELECT * FROM system WHERE level ='3' AND groups = '".$objResult2['id_system']."'";
                                                            if ($status_admin =='0') {
                                                            $strSQL3 = " SELECT`user_permissions`.*,`system`.`link_system`,`system`.`name_system`,`system`.`type`,`system`.`level`,`system`.`icon`  FROM `user_permissions`,`system` ,`roles`,`users` WHERE `user_permissions`.id_system = `system`.`id_system` AND `roles`.`id_role` = `users`.id_role AND `user_permissions`.`id_user` = `users`.`id_user` AND `users`.`id_data_role` = '".$_SESSION["id_data"]."' AND `system`.groups ='".$objResult2['id_system']."' AND `system`.`level`='3' ORDER BY `system`.sort ASC

                                                            ";
                                                            }else if ($status_admin =='1') {
                                                               $strSQL3 = "SELECT * FROM system WHERE level ='3' AND groups = '".$objResult2['id_system']."' ORDER BY `system`.sort ASC ";
                                                           }
                                                            $objQuery3 = $db->Query($strSQL3);
                                                            while ($objResult3 = mysqli_fetch_array($objQuery3)) {
                                                                $task = searchByValue($objResult3['id_system'], $permissions);
                                                                if (isset($task)) {
                                                                    $key = array_search($objResult3['id_system'], $task);
                                                                    $auth = $task["permissions"];
                                                                    $arrAuth = explode(",", $auth);
                                    
                                                                    $chk_view = ((array_search('1', $arrAuth)) === false)?'':'checked';
                                                                    $chk_create = ((array_search('2', $arrAuth)) === false)?'':'checked';
                                                                    $chk_update = ((array_search('3', $arrAuth)) === false)?'':'checked';
                                                                    $chk_delete = ((array_search('4', $arrAuth)) === false)?'':'checked';
                                                                    $chk_download = ((array_search('5', $arrAuth)) === false)?'':'checked';
                                                                    $chk_upload = ((array_search('6', $arrAuth)) === false)?'':'checked';
                                                                    $chk_print = ((array_search('7', $arrAuth)) === false)?'':'checked';
                                                                    $chk_approval = ((array_search('8', $arrAuth)) === false)?'':'checked';
                                                                } else {
                                                                    $chk_view = '';
                                                                    $chk_create = '';
                                                                    $chk_update = '';
                                                                    $chk_delete = '';
                                                                    $chk_download = '';
                                                                    $chk_upload = '';
                                                                    $chk_print = '';
                                                                    $chk_approval = '';
                                                                }
                                                                if ($objResult3['icon']=='') {
                                                                    $icon3 = '<i class="fa fa-circle-o text-yellow"></i>';
                                                                } else {
                                                                    $icon3 = $objResult2['icon'];
                                                                }
                                                                $i++;

                                                                $output .= '<div class="row">';
                                                                $output .= '<div class="col-md-4 ">';
                                                                $output .= '<div class="form-group">
                                                                <label style="cursor:pointer; padding-left:40px;">                             
                                                                    '.$icon3.'&nbsp;'.$objResult3["name_system"].'
                                                                </label>                                       
                                                            </div>';
                                                                $output .= '</div>';
                                                                $output .= '<div class="col-md-8 ">';
                                                                $output .= '<input type="hidden" name="system_id'.$i.'" value="'.$objResult3['id_system'].'" />';
                                                                $output .= '<input type="checkbox" id="system'.$i.'_1" name="system'.$i.'[]" class="filled-in chk-col-light-blue" '.$chk_view.' 
                                                                data-toggle="tooltip" data-placement="top" title="View" value = "1"/>
                                                                <label for="system'.$i.'_1"><i class="fas fa-eye" style="color: #03A9F4;"/></i></label>';
                                                                $output .= '<input type="checkbox" id="system'.$i.'_2" name="system'.$i.'[]" class="filled-in chk-col-green" '.$chk_create.' 
                                                                data-toggle="tooltip" data-placement="top" title="Create" value = "2"/>
                                                                <label for="system'.$i.'_2"><i class="fas fa-plus" style="color: #26C6DA;"/></i></label>';
                                                                $output .= '<input type="checkbox" id="system'.$i.'_3" name="system'.$i.'[]" class="filled-in chk-col-lime" '.$chk_update.' 
                                                                data-toggle="tooltip" data-placement="top" title="Update" value = "3"/>
                                                                <label for="system'.$i.'_3"><i class="fas fa-pencil-alt" style="color: #CDDC39;"/></i></label>';
                                                                $output .= '<input type="checkbox" id="system'.$i.'_4" name="system'.$i.'[]" class="filled-in chk-col-red" '.$chk_delete.' 
                                                                data-toggle="tooltip" data-placement="top" title="Delete" value = "4"/>
                                                                <label for="system'.$i.'_4"><i class="fas fa-trash-alt" style="color: #c30000;"/></i></label>';
                                                                $output .= '<input type="checkbox" id="system'.$i.'_5" name="system'.$i.'[]" class="filled-in chk-col-purple" '.$chk_download.' 
                                                                data-toggle="tooltip" data-placement="top" title="Export" value = "5"/>
                                                                <label for="system'.$i.'_5"><i class="mdi mdi-file-export" style="color: #7460EE;"/></i></label>';
                                                                $output .= '<input type="checkbox" id="system'.$i.'_6" name="system'.$i.'[]" class="filled-in chk-col-pink" '.$chk_upload.' 
                                                                data-toggle="tooltip" data-placement="top" title="Import" value = "6"/>
                                                                <label for="system'.$i.'_6"><i class="mdi mdi-file-import" style="color: #E91E63;"/></i></label>';
                                                                $output .= '<input type="checkbox" id="system'.$i.'_7" name="system'.$i.'[]" class="filled-in chk-col-amber" '.$chk_print.' 
                                                                data-toggle="tooltip" data-placement="top" title="Print" value = "7"/>
                                                                <label for="system'.$i.'_7"><i class="mdi mdi-printer" style="color: #FFC107;"/></i></label>';
                                                                $output .= '<input type="checkbox" id="system'.$i.'_8" name="system'.$i.'[]" class="filled-in chk-col-deep-orange" '.$chk_approval.' 
                                                                data-toggle="tooltip" data-placement="top" title="Approval" value = "8"/>
                                                                <label for="system'.$i.'_8"><i class="mdi mdi-check-circle" style="color: #FF5722;"/></i></label>';
                                                                $output .= '</div>';
                                                                $output .= '</div>';
                                                            }//--- End Type 1 level 3
                                                        }//--- End Type 1 level 2
                                                    } //--- End Type 1 level 1
                                                    $output .=' <input id="count_cat_design" type="hidden" value="'.$i.'" name="count_system">';
                                                    echo $output;

                                                    ?>

                                                </div>

                                            </div><!-- End Tab design -->
                                        </div><!-- End Tab panes -->

                                    </div> <!--/card-->     
                                    <button type="button" name="" id="save_btn" class="btn btn-success waves-effect waves-light m-r-10">
                                        <?php if ($role_id_ed == $result_ed['id_role']) { ?>
                                            แก้ไข
                                        <?php } elseif ($role_id_ed=='none_data') { ?>
                                            บันทึก
                                        <?php } ?>
                                        
                                    </button>
                                    <button type="reset" class="btn btn-inverse waves-effect waves-light">ยกเลิก</button>                          

                                </div>
                            </div><!--/row-->

                        </div>
                        </form>
                        
                    </div>
                </div>

            </div>
            <div class="col-md-6">
            <div class="card <?php if ($per_id_edd  != 'none_data') {
                                                        print "card-outline-warning";
                                                    } elseif ($per_id_edd  == 'none_data') {
                                                        print "card-outline-success";
                                                    } ?>">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">รายการผู้ใช้งาน</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive m-t-10" id="reload_sec">
                        <table id="per_table_list" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>ประเภทผู้ใช้งาน</th>
                                    <th>ชื่อผู้ใช้งาน</th>
                                    <th>User name</th>
                                    <th>Control</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            /*var_dump($user_type_se  . "**");
                            var_dump($result_ck);*/
                            if (isset($user_type_se) && isset($result_ck) && ($user_type_se != "none_data")) {
                                ?>
                            <?php $i = 1; ?>
                            <?php while ($result_em = mysqli_fetch_array($result_ck)) {?>
                                <?php if ($user_type_se == $result_em['id_role']) { ?>
                                <tr>
                                    <td><?=$i;?></td>
                                    <td><?=$result_em['role_name']?></td>
                                    <td><?=$result_em['member_name']?> </td>
                                    <td><?=$result_em['user_name']?></td>
                                    <td>
                                    <button type="button" name="" id="<?=$result_em['id_user']?>" class="btn btn-warning  edit_btn  btn-sm" btn-lg btn-block"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                    <button type="button" name="" id="<?=$result_em['id_user']?>" user_name="<?=$result_em['user_name']?>" class="btn btn-danger delete_btn  btn-sm" btn-lg btn-block"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                    </td>
                                </tr>
                                <?$i++ ;?>
                                <?php } ?>

                            <?php } ?>

                            <?php
                            }?>

                            </tbody>

                            </table>

                        </div>
                        
                    </div>
                </div>

            </div>
        </div>
        <!-- End Row -->


        <!-- End PAge Content -->
<!-- ============================================================== -->


<?php include('../template/footer.php'); ?>

<!-- ============================================================== -->
<!-- All custom script -->
<!-- ============================================================== -->
<script>
var table ;
$(document).ready( function () {
    $('#per_table_list').DataTable({
    });

    $('#checkall').click(function(event) {
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;
        });
    }
    else {
        $(':checkbox').each(function() {
            this.checked = false;
        });
    }
    });

    $.ajax({
        method:'POST', 
        url:'functions.php', 
        data:{_method:'SELECTOR_PER_LIST'},  
        // contentType: false,
        success: function(response) {
        },
    });

    $('#birthday').datepicker({
      format: 'dd/mm/yyyy'
    });

    fetch_data_employee();
    fetch_data_employee2();
});

$(document).on('click', '.cancel_edit_btn', function(event){  
  window.location = "front-manage.php?se=<?=$user_type_se?>";
});

$(document).on('click', '#save_btn', function(){ 

per_id_edd_edit = $("#per_id_edd_edit").val()
if (per_id_edd_edit=='none_data') {
  user = $("#user").val()
if (user=='0') {
   swal.fire('คำเตื่อน','กรุณาเลือกผู้ใช้งาน','warning')
   return false
}

if( $("#employee-user").val() == "" || $("#employee-pass").val() == ""  || $("#employee-pass-again").val() == ""  ){
  swal.fire('คำเตื่อน','กรุณากรอกข้อมูลให้ครบ','warning')
   return false
}
if($('#wrong_user').css('display') === 'block'){
              swal.fire("คำเตือน", "กรุณากรอกข้อมูลให้ถูกต้อง", "warning");
              return false
    }
    if($('#employee-passA-again').css('display') === 'inline'){
              swal.fire("คำเตือน", "กรุณากรอกข้อมูลให้ถูกต้อง", "warning");
              return false
    }
    if($('#employee-passA-text').css('display') === 'inline'){
              swal.fire("คำเตือน", "กรุณากรอกข้อมูลให้ถูกต้อง", "warning");
              return false

    }

}else{

    if( $("#employee-user_ed").val() == ""){
  swal.fire('คำเตื่อน','กรุณากรอกข้อมูลให้ครบ','warning')
   return false
}

    if($('#employee-user-text_ed').css('display') === 'inline'){
              swal.fire("คำเตือน", "กรุณากรอกข้อมูลให้ถูกต้อง", "warning");
              return false
    }
    if($('#success_user_ed').css('display') === 'none'){
              swal.fire("คำเตือน", "กรุณากรอกข้อมูลให้ถูกต้อง", "warning");
              return false
    }

    if ($("#employee-pass_ed").val() != "" || $("#employee-pass-again_ed").val() != "") {
        if($('#employee-passA-again_ed').css('display') === 'inline'){
              swal.fire("คำเตือน", "กรุณากรอกข้อมูลให้ถูกต้อง", "warning");
              return false
        }
        if($('#employee-passA-text_ed').css('display') === 'inline'){
              swal.fire("คำเตือน", "กรุณากรอกข้อมูลให้ถูกต้อง", "warning");
              return false

        }
    }
    

// employee-pass-text_ed
// employee-passA-text_ed
// employee-passA-again_ed
  
}


  console.log($('#employee-user-text_ed').css('display') )  
 

    var formData = new FormData($('.upload-form-add')[0]);

    swal.fire({
    title: 'ยืนยัน ?',
    html: "<label><?php if ($per_id_edd  != 'none_data') {
                                print "คุณต้องการแก้ไขรายการนี้ ?";
                            } elseif ($per_id_edd  == 'none_data') {
                                print "คุณต้องการเพิ่มรายการ ?";
                            } ?></label>",
    type: 'info',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'ใช่, ยืนยัน !'
    }).then((result) => {
    // ------------------------
        if (result.value) {
            $.ajax({
                type: "POST",
                url: "functions.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    // alert(data);
                    //console.log(data.status);
                    if(data.status==1){
                        swal.fire('Successfully','Managed Complete','success').then(function(){ 
                            window.location = "front-manage.php"+"?se=<?=$user_type_se?>";
                    
                        })
                    }
                },
            });
        }
    // ---------------------
    });         
           
});

$(document).on('click','#change-pass',function(){
    $('.change-pass').slideToggle();
});

$(document).on('click', '.edit_btn', function(event){  
        var per_id = $(this).attr("id"); 
        window.location = "front-manage.php"+"?per_id="+per_id+"&se=<?=$user_type_se?>"
});

$(document).on('click', '.delete_btn', function(event){  
    var per_id = $(this).attr("id"); 
    var user_name = $(this).attr("user_name"); 
    swal.fire({
        title: 'คำเตื่อน !',
        html : "<label>คุณต้องการลบรายการนี้ !</label> <br> <label>( User name : "+user_name+" )</label>",
        // text: "" + role_id,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่, ต้องการลบ !'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    method:'POST', 
                    url:'functions.php?per_id='+per_id, 
                    data:{_method:'DELETE_LIST_PER'},  
                    // contentType: false,
                    success: function(data) {
                        //console.log(data.status);
                    if(data.status==1){
                        swal.fire('สำเร็จ','ลบเรียบร้อย','success').then(function(){ 
                            window.location = "front-manage.php"+"?se=<?=$user_type_se?>";
                        })
                    }
                    },
                });
            }
    });

});

$(document).on('keyup', '#employee-user', function(){
    var username = $(this).val();
    var form = 'check_user_ex';
    if(username.length >= 4){
        $.ajax({  
            beforeSend:function(){
                $('.spin-check').show();
                $('.success-check').hide();
                $('.wrong-check').hide();
            },
            complete:function(){
                $('.spin-check').hide();
            },
            url:"functions.php",  
            method:"POST",  
            data: {username:username,
                _method:form},
            success:function(data){
            // alert(data);  
            if(data.status==0){
                $('#employee-user-text').removeClass('form-control-warning');
                $('#employee-user-text').hide();
                $('.wrong-check').show();
                $('.success-check').hide();
            }else{
                $('#employee-user-text').removeClass('form-control-warning');
                $('.success-check').show();
                $('.wrong-check').hide();
                $('#employee-user-text').hide(); 
            }
            }  
        });
    }else{
        $('.success-check').hide();
        $('.wrong-check').hide();
        $('#employee-user-text').show();
        $('#employee-user-text').addClass('form-control-warning');
    }

    var i =0;
    $('.form-control-warning').each(function(){
        i++;            
    });

    if(i==0){
        $('#next-authen').prop('disabled',false);
    }else{
        $('#next-authen').prop('disabled',true);
    }

   
    
});

$(document).on('keyup', '#employee-user_ed', function(){
    var username = $(this).val();
    var id_user = $('#id_user').val();
    var form = 'check_user_ex_ed';
    if(username.length >= 4){
        $.ajax({  
            beforeSend:function(){
                $('.spin-check').show();
                $('.success-check').hide();
                $('.wrong-check').hide();
            },
            complete:function(){
                $('.spin-check').hide();
            },
            url:"functions.php",  
            method:"POST",  
            data: {username:username,
                id_user :id_user ,
                _method:form},
            success:function(data){
            // alert(data);  
            if(data.status==0){
                $('#employee-user-text_ed').removeClass('form-control-warning');
                $('#employee-user-text_ed').hide();
                $('.wrong-check').show();
                $('.success-check').hide();
            }else{
                $('#employee-user-text_ed').removeClass('form-control-warning');
                $('.success-check').show();
                $('.wrong-check').hide();
                $('#employee-user-text_ed').hide(); 
            }
            }  
        });
    }else{
        $('.success-check').hide();
        $('.wrong-check').hide();
        $('#employee-user-text').show();
        $('#employee-user-text').addClass('form-control-warning');
    }

    var i =0;
    $('.form-control-warning').each(function(){
        i++;            
    });

    if(i==0){
        $('#next-authen').prop('disabled',false);
    }else{
        $('#next-authen').prop('disabled',true);
    }

   
    
});

$(document).on('click','.set_authen', function(){
    var i = $(this).attr('data-id');
    $('.authen'+i).removeClass('authen_acitve-block');
    $(this).addClass('authen_acitve-block');
});

$(document).on('click','.set_authen_d', function(){
    var i = $(this).attr('data-id');
    $('.authen_d'+i).removeClass('authen_acitve-block');
    $(this).addClass('authen_acitve-block');
});

$(document).on('click','#general', function(){
    $(this).addClass('btn-primary');
    $(this).addClass('text_general');
    $('#system').removeClass('btn-warning');
    $('#system').removeClass('text_general');
    $('#general_show').show();
    $('#system_show').hide();
});

$(document).on('click','#system', function(){
    $(this).addClass('btn-warning');
    $(this).addClass('text_general');
    $('#general').removeClass('btn-primary');
    $('#general').removeClass('text_general');
    $('#general_show').hide();
    $('#system_show').show();
});

$(document).on('click','#Description', function(){
    $('#tab-description').show();
    $('#tab-username').hide();
    $('#tab-authen').hide();
    $('#tab-view').hide();

    $('#next-login').show();
    $('#back-login').hide();
    $('#back-authen').hide();
    $('#next-authen').hide();
    $('#back-view').hide();
    $('#next-view').hide();

    $('#Username').addClass('btn-default');
    $('#Username').removeClass('btn-primary');

    $('#Description').addClass('btn-primary');
    $('#Description').removeClass('btn-default');

    $('#Authentication').addClass('btn-default');
    $('#Authentication').removeClass('btn-primary');

    $('#view').addClass('btn-default');
    $('#view').removeClass('btn-primary');
});

$(document).ajaxStart(function () {
    Pace.restart()
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
    swal({
        title: "<?=lang('ยืนยัน?', 'Confirm?')?>",
        text: "<?=lang('คุณแน่ใจหรือจะลบพนักงาน', 'Are you sure you want to delete the employee?')?>",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "<?=lang('ยกเลิก', 'Cancel')?>",
        confirmButtonClass: "btn-danger",
        confirmButtonText: "<?=lang('ยืนยัน', 'Confirm')?>",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
        }, function () {
            $.ajax({     
                type:"POST",
                url:'functions.php',
                data: {id:id,
                        form:form},             
                success:function(data){
                    // alert(data.status);
                    swal("<?=lang('สำเร็จ', 'Success')?>", "<?=lang('ลบพนักงานเรียบร้อยแล้ว', 'Staff has been deleted')?>", "success");
                
                    fetch_data_employee(); 
                    fetch_data_employee2();
                },
            }); 
    });
});

$(document).on('click', '.disabled-em', function(){  
    var id = $(this).attr('data-id'); 
    var form = 'disabled';
    swal({
    title: "<?=lang('ยืนยัน?', 'Confirm?')?>",
    text: "<?=lang('คุณแน่ใจหรือจะยุติบทบาทพนักงาน', 'Are you sure you will terminate the employee role?')?>",
    type: "warning",
    showCancelButton: true,
    cancelButtonText: "<?=lang('ยกเลิก', 'Cancel')?>",
    confirmButtonClass: "btn-danger",
    confirmButtonText: "<?=lang('ยืนยัน', 'Confirm')?>",
    closeOnConfirm: false,
    showLoaderOnConfirm: true
    }, function () {
    $.ajax({     
        type:"POST",
        url:'functions.php',
        data: {id:id,
                form:form},             
        success:function(data){
            if(data.status==0){
                swal("<?=lang('สำเร็จ', 'Success')?>", "<?=lang('ยุติบทบาทพนักงานเรียบร้อย', 'Terminate the employee role successfully')?>", "success");
            }else{
                swal("Error", "<?=lang('ไม่สามารถยุติบทบาทพนักงานคนนี้ได้', 'Could not terminate this employee role')?>", "warning");
            }
            fetch_data_employee(); 
            fetch_data_employee2();
        },
    }); 
    });
});

$(document).on('click', '.enabled-em', function(){  
    var id = $(this).attr('data-id'); 
    var form = 'enabled';
    swal({
    title: "<?=lang('ยืนยัน?', 'Confirm?')?>",
    text: "<?=lang('คุณแน่ใจหรือจะยกเลิกการยุติบทบาทพนักงาน', 'Are you sure you will cancel the termination of the employee role?')?>",
    type: "warning",
    showCancelButton: true,
    cancelButtonText: "<?=lang('ยกเลิก', 'Cancel')?>",
    confirmButtonClass: "btn-danger",
    confirmButtonText: "<?=lang('ยืนยัน', 'Confirm')?>",
    closeOnConfirm: false,
    showLoaderOnConfirm: true
    }, function () {
    $.ajax({     
        type:"POST",
        url:'functions.php',
        data: {id:id,
                form:form},             
        success:function(data){
            if(data.status==0){
                swal("<?=lang('สำเร็จ', 'Success')?>", "<?=lang('ยกเลิกการยุติบทบาทพนักงานเรียบร้อย', 'Cancel the termination of the employee role')?>", "success");
            }else{
                swal("Error", "<?=lang('ไม่สามารถยกเลิกยุติบทบาทพนักงานคนนี้ได้', 'Cannot cancel the termination of this employee role')?>", "warning");
            }
            fetch_data_employee(); 
            fetch_data_employee2();
        },
    }); 
    });
});

var formClick;
$(document).on('click', '#MultiDelete', function () {
    formClick = $(this);
    var change = $(this).attr('data-id');
    $('#changeMulti').val(change);
    swal({
        title: "<?=lang('ยืนยัน?', 'Confirm?')?>",
        text: "<?=lang('คุณแน่ใจหรือจะลบพนักงานที่เลือก', 'Are you sure you want to delete the selected employees?')?>",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "<?=lang('ยกเลิก', 'Cancel')?>",
        confirmButtonClass: "btn-danger",
        confirmButtonText: "<?=lang('ยืนยัน', 'Confirm')?>",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
        }, function () {
        $.ajax({
            type: "POST",
            url: "functions.php",
            data: $("#frmMain").serialize(),
            success: function(data) { 
                $('.num_').html('');
                if(data.status==0){
                swal("<?=lang('สำเร็จ', 'Success')?>", "<?=lang('ลบพนักงานที่เลือกเรียบร้อยแล้ว', 'Deleted selected employees')?>", "success");
                }else{
                swal("Error", "<?=lang('ไม่สามารถลบพนักงานที่เลือกได้', 'Unable to delete the selected employee.')?>", "warning");
                }
                document.getElementById('MultiDelete').disabled = true;
                document.getElementById('MultiEnabled').disabled = true;
                document.getElementById('MultiDisabled').disabled = true;
                fetch_data_employee(); 
                fetch_data_employee2();
            },
        });
    });
});

$(document).on('click', '#MultiDisabled', function () {
    formClick = $(this);
    var change = $(this).attr('data-id');
    $('#changeMulti').val(change);
    swal({
        title: "<?=lang('ยืนยัน?', 'Confirm?')?>",
        text: "<?=lang('คุณแน่ใจหรือจะยุติบทบาทพนักงาน', 'Are you sure you will terminate the employee role?')?>",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "<?=lang('ยกเลิก', 'Cancel')?>",
        confirmButtonClass: "btn-danger",
        confirmButtonText: "<?=lang('ยืนยัน', 'Confirm')?>",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
        }, function () {
        $.ajax({
            type: "POST",
            url: "functions.php",
            data: $("#frmMain").serialize(),
            success: function(data) { 
                $('.num_').html('');
            // alert(data);
                if(data.status==0){
                swal("<?=lang('สำเร็จ', 'Success')?>", "<?=lang('ยุติบทบาทพนักงานเรียบร้อย', 'Terminate the employee role successfully')?>", "success");
                }else{
                swal("Error", "<?=lang('ไม่สามารถยุติบทบาทพนักงานคนนี้ได้', 'Could not terminate this employee role')?>", "warning");
                }
                fetch_data_employee(); 
                fetch_data_employee2();
                document.getElementById('MultiDelete').disabled = true;
                document.getElementById('MultiEnabled').disabled = true;
                document.getElementById('MultiDisabled').disabled = true;
            },
        });
    });
});

$(document).on('click', '#MultiEnabled', function () {
    formClick = $(this);
    var change = $(this).attr('data-id');
    $('#changeMulti').val(change);
    swal({
        title: "<?=lang('ยืนยัน?', 'Confirm?')?>",
        text: "<?=lang('คุณแน่ใจหรือจะยกเลิกยุติบทบาทพนักงาน', 'Are you sure you want to cancel the employee role?')?>",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "<?=lang('ยกเลิก', 'Cancel')?>",
        confirmButtonClass: "btn-danger",
        confirmButtonText: "<?=lang('ยืนยัน', 'Confirm')?>",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
        }, function () {
        $.ajax({
            type: "POST",
            url: "functions.php",
            data: $("#frmMain").serialize(),
            success: function(data) { 
                $('.num_').html('');
                // alert(data);
                if(data.status==0){
                    swal("<?=lang('สำเร็จ', 'Success')?>", "<?=lang('ยกเลิกการยุติบทบาทพนักงานเรียบร้อย', 'Cancel the termination of the employee role')?>", "success");
                }else{
                    swal("Error", "<?=lang('ไม่สามารถยกเลิกยุติบทบาทพนักงานคนนี้ได้', 'Cannot cancel the termination of this employee role')?>", "warning");
                }
                fetch_data_employee(); 
                fetch_data_employee2();
                document.getElementById('MultiDelete').disabled = true;
                document.getElementById('MultiEnabled').disabled = true;
                document.getElementById('MultiDisabled').disabled = true;
            },
        });
    });
});

var formClick;
$(document).on('click', '#MultiDelete_w', function () {
    formClick = $(this);
    var change = $(this).attr('data-id');
    $('#changeMulti_w').val(change);
    swal({
        title: "<?=lang('ยืนยัน?', 'Confirm?')?>",
        text: "<?=lang('คุณแน่ใจหรือจะลบพนักงานที่เลือก', 'Are you sure you want to delete the selected employees?')?>",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "<?=lang('ยกเลิก', 'Cancel')?>",
        confirmButtonClass: "btn-danger",
        confirmButtonText: "<?=lang('ยืนยัน', 'Confirm')?>",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
        }, function () {
        $.ajax({
            type: "POST",
            url: "functions.php",
            data: $("#frmMain").serialize(),
            success: function(data) { 
            $('.num_').html('');
                if(data.status==0){
                swal("<?=lang('สำเร็จ', 'Success')?>", "<?=lang('ลบพนักงานที่เลือกเรียบร้อยแล้ว', 'Deleted selected employees')?>", "success");
                }else{
                swal("Error", "<?=lang('ไม่สามารถลบพนักงานที่เลือกได้', 'Unable to delete the selected employee.')?>", "warning");
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
    swal({
        title: "<?=lang('ยืนยัน?', 'Confirm?')?>",
        text: "<?=lang('คุณแน่ใจหรือจะยุติบทบาทพนักงาน', 'Are you sure you will terminate the employee role?')?>",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "<?=lang('ยกเลิก', 'Cancel')?>",
        confirmButtonClass: "btn-danger",
        confirmButtonText: "<?=lang('ยืนยัน', 'Confirm')?>",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
        }, function () {
        $.ajax({
            type: "POST",
            url: "functions.php",
            data: $("#frmMain_w").serialize(),
            success: function(data) { 
                $('.num_').html('');
            // alert(data);
                if(data.status==0){
                swal("<?=lang('สำเร็จ', 'Success')?>", "<?=lang('ยุติบทบาทพนักงานเรียบร้อย', 'Terminate the employee role successfully')?>", "success");
                }else{
                swal("Error", "<?=lang('ไม่สามารถยุติบทบาทพนักงานคนนี้ได้', 'Could not terminate this employee role')?>", "warning");
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
    swal({
        title: "<?=lang('ยืนยัน?', 'Confirm?')?>",
        text: "<?=lang('ยืนยันการจับคู่สินค้า', 'Confirm product matching')?>",
        type: "primary",
        showCancelButton: true,
        cancelButtonText: "<?=lang('ยกเลิก', 'Cancel')?>",
        confirmButtonText: "<?=lang('ยืนยัน', 'Confirm')?>",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }, function () {
    $.ajax({  
            url:"back_edit-employeemath.php",  
            method:"POST",  
            data:{id:id},
            success:function(data){  
                swal("<?=lang('สำเร็จ', 'Success')?>", "<?=lang('ลบสินค้าทั้งหมดเรียบร้อยแล้ว', 'All products have been deleted.')?>", "success");
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

//=======================Functions================================
var currentValue = 0;
function handleClick(radio_value) {
    currentValue = radio_value.value;
    //console.log(currentValue);
    window.location = "front-manage.php" + "?se=" +currentValue ;
}


function fetch_select_user_type(val){
    //console.log(val);
    $.ajax({
        type: 'post',
        url: 'functions.php',
        datatype:'json',
        data: {option:val , _method:'SELECTOR_USER_TYPE'},
        success: function (response) {

            console.log('response.data[0] : ',response.data[0]);

            var pot = "";
            console.log('val : ',val);
            if(val == 'admin'){

                $.each(response.data, function (key, val) {
                    
                    if(val["id_employee"] != ""){
                        pot += "<option value='" + val["id_employee"] + "'>" + val["firstrname"] + val["surname"] + "</option>"
                    }else{
                        pot += "<option value='' disabled>" + 'None Data.'  +"</option>"
                    }  

                });
            
            }else if(val == 'agent'){

                $.each(response.data, function (key, val) {
                    
                    if(val["company_id"] != ""){
                        pot += "<option value='" + val["company_id"] + "'>" + val["name"] +"</option>"
                    }else{
                        pot += "<option value='' disabled>" + 'None Data.'  +"</option>"
                    }  

                });
            
            }else if(val == 'customer'){

                $.each(response.data, function (key, val) {
                    
                    if(val["id_customer"] != ""){
                        pot += "<option value='" + val["id_customer"] + "'>" + val["fname"] + val["lname"] +"</option>"
                    }else{
                        pot += "<option value='' disabled>" + 'None Data.'  +"</option>"
                    }  

                });
            }


            $("#user").html(pot); 
            
        }
    });
}

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

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
        }
    return true;
}

function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('realtime').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}

function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}



$(document).on('keyup', '#employee-pass', function(){
          var pass = $(this).val();
          var ck_pass = $('#employee-pass-again').val();
          if(pass != ''){
            $('#employee-pass-text').hide();
            $('#employee-pass-text').removeClass('warning-text-check-b2');
          }else{
            $('#employee-pass-text').show();
            $('#employee-pass-text').addClass('warning-text-check-b2');
          }

          if(pass == ck_pass){
            $('#employee-passA-text').hide();
            $('#employee-passA-text').removeClass('warning-text-check-b2');
            $('#employee-passA-again').removeClass('warning-text-check-b2');
            $('#employee-passA-again').hide();
          }else{
            $('#employee-passA-text').show();
            $('#employee-passA-text').addClass('warning-text-check-b2');
            $('#employee-passA-again').addClass('warning-text-check-b2');
            $('#employee-passA-again').show();    
          }

          var i =0;
          $('.warning-text-check-b2').each(function(){
            i++;            
          });
          if(i==0){
            $('#next-view').prop('disabled',false);
          }else{
            $('#next-view').prop('disabled',true);
          }
        });

        $(document).on('keyup', '#employee-pass-again', function(){
          var pass = $(this).val();
          var ck_pass = $('#employee-pass').val();
          if(pass != ''){
            if(pass == ck_pass){
              $('#employee-passA-text').hide();
              $('#employee-passA-text').removeClass('warning-text-check-b2');
              $('#employee-passA-again').removeClass('warning-text-check-b2');
              $('#employee-passA-again').hide();
            }else{
              $('#employee-passA-text').show();
              $('#employee-passA-text').addClass('warning-text-check-b2');
              $('#employee-passA-again').addClass('warning-text-check-b2');
              $('#employee-passA-again').show();
            }
          }else{
            $('#employee-passA-text').show();
            $('#employee-passA-text').addClass('warning-text-check-b2');
            $('#employee-passA-again').addClass('warning-text-check-b2');
            $('#employee-passA-again').show();
          }

          var i =0;
          $('.warning-text-check-b2').each(function(){
            i++;            
          });

          if(i==0){
            $('#next-view').prop('disabled',false);
          }else{
            $('#next-view').prop('disabled',true);
          }
        });




        $(document).on('keyup', '#employee-pass_ed', function(){
          var pass = $(this).val();
          var ck_pass = $('#employee-pass-again_ed').val();
          if(pass != ''){
            $('#employee-pass-text_ed').hide();
            $('#employee-pass-text_ed').removeClass('warning-text-check-b2');
          }else{
            $('#employee-pass-text_ed').show();
            $('#employee-pass-text_ed').addClass('warning-text-check-b2');
          }

          if(pass == ck_pass){
            $('#employee-passA-text_ed').hide();
            $('#employee-passA-text_ed').removeClass('warning-text-check-b2');
            $('#employee-passA-again_ed').removeClass('warning-text-check-b2');
            $('#employee-passA-again_ed').hide();
          }else{
            $('#employee-passA-text_ed').show();
            $('#employee-passA-text_ed').addClass('warning-text-check-b2');
            $('#employee-passA-again_ed').addClass('warning-text-check-b2');
            $('#employee-passA-again_ed').show();    
          }

          var i =0;
          $('.warning-text-check-b2').each(function(){
            i++;            
          });
          if(i==0){
            $('#next-view').prop('disabled',false);
          }else{
            $('#next-view').prop('disabled',true);
          }
        });

        $(document).on('keyup', '#employee-pass-again_ed', function(){
          var pass = $(this).val();
          var ck_pass = $('#employee-pass').val();
          if(pass != ''){
            if(pass == ck_pass){
              $('#employee-passA-text_ed').hide();
              $('#employee-passA-text_ed').removeClass('warning-text-check-b2');
              $('#employee-passA-again_ed').removeClass('warning-text-check-b2');
              $('#employee-passA-again_ed').hide();
            }else{
              $('#employee-passA-text_ed').show();
              $('#employee-passA-text_ed').addClass('warning-text-check-b2');
              $('#employee-passA-again_ed').addClass('warning-text-check-b2');
              $('#employee-passA-again_ed').show();
            }
          }else{
            $('#employee-passA-text_ed').show();
            $('#employee-passA-text_ed').addClass('warning-text-check-b2');
            $('#employee-passA-again_ed').addClass('warning-text-check-b2');
            $('#employee-passA-again_ed').show();
          }

          var i =0;
          $('.warning-text-check-b2').each(function(){
            i++;            
          });

          if(i==0){
            $('#next-view').prop('disabled',false);
          }else{
            $('#next-view').prop('disabled',true);
          }
        });
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
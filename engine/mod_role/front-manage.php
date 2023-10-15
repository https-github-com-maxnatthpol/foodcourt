<?php include('../template/header.php'); ?>
<?php
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';
$db = new DB();

$role_id_ed ='';
if (isset($_GET['role_id'])) {
    $role_id_ed = $_GET['role_id'];
} else {
    $role_id_ed  = 'none_data';
}

$role_id_ed = $db->clear($role_id_ed);
$str_ed = "SELECT * FROM roles WHERE  id_role = '".$role_id_ed."' and delete_datetime is null";
$result_ed = $db->QueryFetchArray($str_ed);

$str_perm = "SELECT role_permissions.*,`system`.`link_system` FROM role_permissions,`system` 
WHERE role_permissions.id_system = `system`.`id_system` AND id_role = '".$role_id_ed."' ";
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

?>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<?php require_once('../template/menu.php'); ?>
<!-- ============================================================== -->
<?php //require_once '../lib/permission.php'; ?>

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
                <h3 class="text-themecolor m-b-0 m-t-0">จัดการกลุ่มผู้ใช้งาน</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:location.href='../index.php'">Home</a></li>
                    <li class="breadcrumb-item active">จัดการกลุ่มผู้ใช้งาน</li>
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
                <i class="fa fa-caret-right"></i>&nbsp;&nbsp;
                กลุ่มผู้ใช้งาน คือ กลุ่มผู้ใช้ระบบ ได้แก่ พนักงาน/ผู้ดูแลระบบ , ลูกค้า , Partner , วิทยากร<br>
                <i class="fa fa-caret-right"></i>&nbsp;&nbsp;สามารถแก้ไข/ลบ
                กลุ่มผู้ใช้งานได้โดยคลิกไอคอนใต้หัวข้อกลุ่มผู้ใช้งานที่ต้องการ<br>
                <i class="fa fa-caret-right"></i>&nbsp;&nbsp;กรณีที่มีการลบข้อมูล ระบบจะขึ้นข้อความแจ้งเตือน
                เพื่อยืนยันการลบ หากทำการยืนยันเรียบร้อยแล้ว จะไม่สามารถกู้คืนข้อมูลได้<br>
                <i class="fa fa-caret-right"></i>&nbsp;&nbsp;สามารถค้นหากลุ่มผู้ใช้งานได้โดยใส่ชื่อหัวข้อกลุ่มผู้ใช้งานช่องค้นหา<br>
                <i class="fa fa-caret-right"></i>&nbsp;&nbsp;Tag คือ ส่วนอ้างอิงตารางข้อมูล เช่น mod_employee = พนักงาน, mod_customer = ลูกค้า, partner = Partner, tutor = วิทยากร<br>
                <i class="fa fa-caret-right"></i>&nbsp;&nbsp;ความหมายสัญลักษณ์ :: <i class="fas fa-eye" style="color: #03A9F4;"></i> = View ,
                <i class="fas fa-plus" style="color: #26C6DA;"/></i> = Create , <i class="fas fa-pencil-alt" style="color:#CDDC39; "/></i> = Update , 
                <i class="mdi mdi-file-export" style="color: #7460EE;"/></i> = Export , <i class="mdi mdi-file-import" style="color: #E91E63;"/></i> = Import ,
                <i class="mdi mdi-printer" style="color: #FFC107;"/></i> = Print , <i class="mdi mdi-check-circle" style="color: #FF5722;"/></i> = Approval<br>
            </div>
        </div>

        <!-- Row -->
        <div class="row">
            <div class="col-md-6">
                <div class="card <?php if ($role_id_ed == $result_ed['id_role']) {
    print "card-outline-warning";
} elseif ($role_id_ed=='none_data') {
    print "card-outline-info";
} ?>">
                    <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                        <h4 class="m-b-0 text-white"><?php if ($role_id_ed == $result_ed['id_role']) {
    print "แก้ไขกลุ่มผู้ใช้งาน";
} elseif ($role_id_ed=='none_data') {
    print "เพิ่มกลุ่มผู้ใช้งาน";
} ?></h4>
                        </div>
                        <div class="col-md-2 float-right">
                        <div class="card-actions">
<?php if ($role_id_ed == $result_ed['id_role']) { ?>
    <button type="button" name="" id="" class="btn btn-danger cancel_edit_btn" btn-lg btn-block"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button>

<?php } elseif ($role_id_ed=='none_data') { ?>

    <a class="" data-action="collapse"><i class="ti-plus text-success"></i></a>

<?php } ?>
</div>
                        </div>
                    </div>


                        

                    </div>
                    <div class="card-body">
                    <form method="post" enctype="multipart/form-data" id="frmADD" class="upload-form-add">
                    <div class="form-body">
                    <input type="hidden" name="_method" value="<?php if ($role_id_ed == $result_ed['id_role']) {
    print "EDIT_ROLE_ADD";
} elseif ($role_id_ed=='none_data') {
    print "ADD_ROLE";
} ?>">
<input type="hidden" name="role_id_og" value="<?=$result_ed['id_role']?>">

<div class="row p-t-20">
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="role_name" id="role_name" class="form-control" placeholder="Admin, Customer" aria-describedby="helpId" value="<?=$result_ed['name']?>" >
        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="">Tag</label>
            <input type="text" name="role_tag" id="role_tag" class="form-control" placeholder="mod_employee, mod_customer" aria-describedby="helpId" value="<?=$result_ed['tag']?>">
        </div>
    </div>
</div>
 <!--/row-->
 <h3 class="box-title m-t-40"><?=lang('สิทธิ์การใช้งาน', 'Permission')?></h3>
 <h6 class="card-subtitle">สัญลักษณ์ :: <i class="fas fa-eye" style="color: #03A9F4;"></i> = <code>View</code> , 
 <i class="fas fa-plus" style="color: #26C6DA;"/></i> = <code>Create</code> , <i class="fas fa-pencil-alt" style="color:#CDDC39; "/></i> = <code>Update</code> ,
 <i class="fas fa-trash-alt" style="color: #c30000;"/></i> = <code>Delete</code> ,<i class="mdi mdi-file-export" style="color: #7460EE;"/></i> = <code>Export</code> ,
  <i class="mdi mdi-file-import" style="color: #E91E63;"/></i> = <code>Import</code> , <i class="mdi mdi-printer" style="color: #FFC107;"/></i> = <code>Print</code> ,
   <i class="mdi mdi-check-circle" style="color: #FF5722;"/></i> = <code>Approval</code> 
  
   </h6>
 <hr>
 <div class="row">
    <div class="col-md-12 ">
    <input type="checkbox" id="checkall"  />
    <label for="checkall">ทำได้ทุกฟังก์ชัน</label>
    </div>
 </div>
 <div class="row">
    <div class="col-md-12 ">
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
                        $str = "SELECT * FROM system WHERE type = '1' AND level = '1'";
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

                            $strSQL2 = "SELECT * FROM system WHERE level ='2' AND groups = '".$objResult['id_system']."'";
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

                                $strSQL3 = "SELECT * FROM system WHERE level ='3' AND groups = '".$objResult2['id_system']."'";
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
                        $str = "SELECT * FROM system WHERE type = '2' AND level = '1'";
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

                            $strSQL2 = "SELECT * FROM system WHERE level ='2' AND groups = '".$objResult['id_system']."'";
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

                                $strSQL3 = "SELECT * FROM system WHERE level ='3' AND groups = '".$objResult2['id_system']."'";
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

        </div>
        <button type="button" name="" id="save_btn" class="btn btn-success waves-effect waves-light m-r-10">
            <?php if ($role_id_ed == $result_ed['id_role']) { ?>
                แก้ไข
            <?php } elseif ($role_id_ed=='none_data') { ?>
                บันทึก
            <?php } ?>
            
        </button>
        <button type="reset" class="btn btn-inverse waves-effect waves-light">ยกเลิก</button>
    </div>
</div>

</div> <!-- form-body-->
</form>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
            <div class="card card-outline-success">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">รายการกลุ่มผู้ใช้งาน</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive m-t-10" id="reload_sec">
                            <table id="role_table_list" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>Name</th>
                                    <th>Tag</th>
                                    <th>Control</th>
                                </tr>
                            </thead>
                            <tbody>

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
    $('[data-toggle="tooltip"]').tooltip();

    $.ajax({
        method:'POST', 
        url:'functions.php', 
        data:{_method:'SELECTOR_LIST'},  
        success: function(response) {
        //console.log('SELECTOR_LIST : ',response.data);
        table = $('#role_table_list').DataTable({
            data: response.data,
            columns: [{
                    data: "id_role",
                    render: function (data, type, full, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    data: "name"
                },
                {
                    data: "tag"
                },
        
                {
                defaultContent: "<button type=\"button\" class=\"btn btn-warning btn-sm edit_btn\">Edit</button>&nbsp;<button  type=\"button\" class=\"btn btn-danger btn-sm delete_btn\">Delete</button>"
                // defaultContent: "</button>&nbsp;<button type=\"button\" class=\"btn btn-danger btn-sm del-data\">Delete</button>"
                }
            ],
            // language: {
            //     lengthMenu: "แสดง _MENU_ แถวต่อหน้า",
            //     zeroRecords: "ไม่พบข้อมูล",
            //     info: "กำลังแสดงหน้าที่ _PAGE_ จาก _PAGES_",
            //     infoEmpty: "ไม่พบข้อมูล",
            //     infoFiltered: "(จากทั้งหมด _MAX_)"
            // },
            // paging: false,
            // searching: false,
            // scrollY: 250

        });

        },
    });
});

//=====================Cancel============================
$(document).on('click', '.cancel_edit_btn', function(event){  
  window.location = "front-manage.php";
});

//=====================Save===============================
$(document).on('click', '#save_btn', function(){ 
    var formData = new FormData($('.upload-form-add')[0]);

    if($("#role_id").val() != "" && $("#role_name").val()  ){
        swal.fire({
            title: 'ยืนยันการทำรายการ',
            html: "<label><?php if ($role_id_ed == $result_ed['id_role']) {
                            print "คุณต้องการแก้ไขรายการนี้ ?";
                        } elseif ($role_id_ed=='none_data') {
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
                        console.log(data.status);

                        if(data.status==1){
                            swal.fire('Successfully','Managed Complete','success').then(function(){ 
                            window.location = "front-manage.php";
                        })
                        }
                        // $('#role_table_list').DataTable().ajax.reload();
                    },
                });
            }
        // ---------------------
        });         

    }else {
        swal('คำเตือน!','กรุณากรอกข้อมูลให้ครบถ้วน','warning')
        if($("#role_tag").val() == ""){
            $("#role_tag").attr("style" , "border-color: red; border-width: 1px;");
            setTimeout(function() {
                $("#role_tag").attr("style" , "");
            }, 5000);
        }
        if($("#role_name").val() == ""){
            $("#role_name").attr("style" , "border-color: red; border-width: 1px;");
            setTimeout(function() {
                $("#role_name").attr("style" , "");
            }, 5000);
        }
              
    }
           
});

//=====================Edit===============================
$(document).on('click', '.edit_btn', function(event){
    var $tr = $(this).closest('tr');
    var rowData = $('#role_table_list').DataTable().row($tr).data();
    var role_id = rowData.id_role;
    window.location = "front-manage.php"+"?role_id="+role_id;
});

//=====================Delete===============================
$(document).on('click', '.delete_btn', function(event){
    var $tr = $(this).closest('tr');
    var rowData = $('#role_table_list').DataTable().row($tr).data();
    var role_id = rowData.id_role;
    var role_name = rowData.name;

    swal.fire({
        title: 'คำเตือน !',
        html : "<label>คุณต้องการลบรายการนี้ !</label> <br> <label>( Name : "+role_name+" )</label>",
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
          url:'functions.php?role_id='+role_id, 
          data:{_method:'DELETE_LIST'},  
          // contentType: false,
          success: function(data) {
            //console.log(data.status);
          if(data.status==1){
            swal.fire('สำเร็จ','ลบเรียบร้อย','success').then(function(){ 
                window.location = "front-manage.php";
            })
          }
         },
        });
      }
    });
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
						
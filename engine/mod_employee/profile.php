<?php include('../template/header.php');?>
<?php
require_once '../lib/connect.php';
$db = new DB();

$str = "SELECT * FROM mod_employee WHERE id_employee = '".$_GET['id']."'";
$query = $db->Query($str);
$result = mysqli_fetch_array($query);

?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
	<!--alerts CSS -->
    <link href="../../plugins_b/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
	<!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="../../plugins_b/dropify/dist/css/dropify.min.css">


    <?php require_once('../template/menu.php');?>
        <!-- ============================================================== -->
  <?php require_once '../lib/permission.php';
      if ($button_create !== '') {
          echo "<script>location.href='front-manage.php';</script>";
      }
  ?>
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Profile</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:location.href='../index.php'">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                    
                </div>
                <!-- ============================================================== -->
				<div class="">
                                <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
               
				
      <div class="alert alert-success alert-dismissible" id="result_add" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <div id="loader_add">
              <h4><i class="fa fa-circle-o-notch fa-spin"></i></h4>
              กำลัง Inserting...
            </div>
            <div id="success_add">
              <h4><i class="icon fa fa-check"></i> แก้ไขข้อมูล!</h4>
              แก้ไขข้อมูลสำเร็จ.
            </div>
          </div>

      <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-warning">&nbsp;&nbsp;</i>เสร็จสิ้น</h4>
              </div>
              <div class="modal-body">
                <center><h4>แก้ไขพนักงานเรียบร้อยแล้ว คุณจะไปหน้าจัดการพนักงานหรือไม่</h4></center>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">แก้ไขพนักงานต่อ..</button>
                <button type="button" class="btn btn-primary" id="btnYes">ยืนยัน</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
                
				
                <!-- ============================================================== -->
                <!-- Start Page Content -->
		
                <form action="functions.php" method="post" enctype="multipart/form-data" id="frmADD" class="upload-form-add">
<input type="hidden" name="form" value="edit">
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
<?php
 $str_admin = 'SELECT * FROM users WHERE id_data_role = "'.$_GET['id'].'"';
 $query_admin = $db->Query($str_admin);
 $result_admin = mysqli_fetch_array($query_admin);

 $str_image = "SELECT * FROM mod_employee_image WHERE id_employee = '".$_GET['id']."'";
 $query_image = $db->Query($str_image);
 $num_image    = mysqli_num_rows($query_image);
 $result_image = mysqli_fetch_array($query_image);

 $date_img  = $result_image['date_image'];
 $date_img = explode("-", $date_img);

 if ($num_image > 0) {
     $image = "../../uploads/$date_img[0]/employee/" . $result_image['name_image'];
 } else {
     $image = "../images/user.png";
 }


  if ($_SESSION['admin']=='0' && $button_create != '') {
      ?>
					<div class="card card-outline-danger">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">คำเตือน</h4></div>
                            <div class="card-body">
                                <h3 class="card-title">คุณไม่ได้รับสิทธิ์ให้ใช้งานระบบนี้</h3>
                            </div>
                    </div>
<?php
  } else {
      ?>
                <!-- ============================================================== -->
                <!-- Row -->
         		<div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="card">
                            <div class="card-body card-body-img">
                                <h4 class="card-title">รูปภาพพนักงาน</h4>
								<div style="width: 100%; padding-bottom: 10px; display: none;" align="center">
								  <img id='img-upload' src="img/upload.jpg" />
								</div>
                                <input type="file" name="image_employee" accept="image/*" id="imgInp" class="dropify checkfileemployee" data-default-file="<?php echo $image; ?>" />
                                </div>
                        </div>
                                <div class="card">
                                <div class="card-body">
                                <h4 class="card-title">รายละเอียดเบื้องต้น</h4>
								<p>ชื่อ : <font id="name-ex"><?php echo $result['username']; ?></font><br></p>
								<p>นามสกุล : <font id="sur-ex"><?php echo $result['surname']; ?></font><br></p>
								<p>รหัสพนักงาน : <font id="code-ex"><?php echo $result['position']; ?></font><br></p>
								<p>ตำแหน่ง : <font id="posi-ex"><?php echo $result['tel']; ?></font><br></p>
  </div>

  </div>
								
                         
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="card">
                            <div class="card-body card-body-data">
                                <h4 class="card-title">ข้อมูลพนักงาน</h4>
								<!--<input type="text" id="myInput" oninput="myFunction()">-->
								<div class="tab-content Authentication" style="border: 1px solid #ddd; border-radius: 5px;">
									<div class="row">
									<div class="col-lg-4 col-md-4">
									  <span class="btn btn-info btn-block" id="Description">Description</span>
									</div>
									<div class="col-lg-4 col-md-4">
									  <span class="btn btn-default btn-block" id="Username">Username</span>
									</div>
									<div class="col-lg-4 col-md-4" style="display:none">
									  <span class="btn btn-default btn-block" id="view">Authentication</span>
									</div>
									</div>
								</div>
								<div class="card-body" id="tab-description">
								
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item active"> 
										<a class="nav-link active" data-toggle="tab" href="#thai" role="tab"><span class="hidden-sm-up"><i class="flag-icon flag-icon-th"></i></span> <span class="hidden-xs-down"><i class="flag-icon flag-icon-th"></i> ภาษาไทย</span></a> 
									</li>
                                    <li class="nav-item" id="back-thai"> 
										<a class="nav-link" data-toggle="tab" href="#english" role="tab"><span class="hidden-sm-up"><i class="flag-icon flag-icon-us"></i></span> <span class="hidden-xs-down"><i class="flag-icon flag-icon-us"></i> ภาษาอังกฤษ</span></a> 
									</li>
                                </ul>
                                <!-- Tab panes -->
				<div class="tab-content tabcontent-border">
                  <div class="tab-pane active" id="thai">
                    <div>
                      <div class="row">
                        <div class="col-md-6">
						  <div class="p-10">
							  ชื่อพนักงาน <font class="warning-text-check" id="employee-name-text">*</font>
                              <div class="input-group">
                                	<div class="input-group-prepend">
                                      	<span class="input-group-text">
                                        	<i class="fas fa-user"></i>
                                      	</span>
                                	</div>
                                    <input type="text" class="form-control" placeholder="ชื่อพนักงาน" name="employee-name" id="employee-name" oninput="myFunctionex()" value="<?php echo $result['username'] ?>" <?php echo $input_read; ?>>
                         		</div>
                     		</div>	
                        </div>
                        <div class="col-md-6">
						  <div class="p-10">
							  นามสกุล <font class="warning-text-check" id="employee-sur-text">*</font>
                              <div class="input-group">
                                	<div class="input-group-prepend">
                                      	<span class="input-group-text">
                                        	<i class="fas fa-user"></i>
                                      	</span>
                                	</div>
                                    <input type="text" class="form-control" placeholder="นามสกุล" name="employee-sur" id="employee-sur" oninput="myFunctions_ex()" value="<?php echo $result['surname'] ?>" <?php echo $input_read; ?>>
                         		</div>
                     		</div>	
                        </div>
                        <div class="col-md-6">
						  <div class="p-10">
							  เลขที่บัตรประชาชน <font class="warning-text-check" id="employee-code-text">*</font>
                              <div class="input-group">
                                	<div class="input-group-prepend">
                                      	<span class="input-group-text">
                                        	<i class="fa fa-barcode"></i>
                                      	</span>
                                	</div>
                                    <input type="text" class="form-control" maxlength="13" onkeypress="return isNumber(event)" placeholder="รหัสประจำตัวประชาชน" name="employee-code" id="employee-code" oninput="myFunctionc_ex()" value="<?php echo $result['code_id'] ?>" <?php echo $input_read; ?>>
                         		</div>
                     		</div>	
                        </div>
                        <div class="col-md-6">
						  <div class="p-10">
							  วันเกิด <font class="warning-text-check" id="employee-birth-text">*</font> วัน/เดือน/ปี
                              <div class="input-group">
                                	<div class="input-group-prepend">
                                      	<span class="input-group-text">
                                        	<i class="fa fa-calendar"></i>
                                      	</span>
                                	</div><!-- employee-date -->
                                    <input type="text" class="form-control pull-right" id="datepicker-autoclose" name="employee-date"  placeholder="วัน/เดือน/ปี" value="<?php echo $result['birthday'] ?>" <?php echo $input_read; ?>>
                         		</div>
                     		</div>
						  </div>
                        <div class="col-md-6">
						  <div class="p-10">
							  ตำแหน่ง 
                              <div class="input-group">
                                	<div class="input-group-prepend">
                                      	<span class="input-group-text">
                                        	<i class="fa fa-sitemap"></i>
                                      	</span>
                                	</div>
                                    <input type="text" class="form-control pull-right" placeholder="ตำแหน่งพนักงาน" id="employee-opti" name="employee-opti" oninput="myFunctionp_ex()" value="<?php echo $result['position'] ?>" <?php echo $input_read; ?>>
                         		</div>
                     		</div>	
                        </div>
                        <div class="col-md-6">
						  <div class="p-10">
							  เบอร์โทรศัพท์ 
                              <div class="input-group">
                                	<div class="input-group-prepend">
                                      	<span class="input-group-text">
                                        	<i class="fa fa-phone"></i>
                                      	</span>
                                	</div>
                                    <input type="text" class="form-control" maxlength="10" id="tel" name="tel" onkeypress="return isNumber(event)" placeholder="เบอร์โทรศัพท์" value="<?php echo $result['tel'] ?>" <?php echo $input_read; ?>>
                         		</div>
                     		</div>	
                        </div>
                        <div class="col-md-6">
						  <div class="p-10">
							  รายละเอียดพนักงาน 
                              <div class="input-group">
									<div class="input-group-prepend">
                                      	<span class="input-group-text">
                                        	<i class="fa fa-home"></i>
                                      	</span>
                                	</div>
                                    <textarea type="text" class="form-control" id="employee-detail" placeholder="รายละเอียดพนักงาน" name="employee-detail" <?php echo $input_read; ?>><?php echo $result['detail_employee'] ?></textarea>	
                         		</div>
                     		</div>	
                        </div>
                      </div> 
                    </div>  
                  </div>
                  <div class="tab-pane" id="english">
                    <div>
                      <div class="row">
                        <div class="col-md-6">
						  <div class="p-10">
							  ชื่อพนักงาน
                              <div class="input-group">
                                	<div class="input-group-prepend">
                                      	<span class="input-group-text">
                                        	<i class="fas fa-language"></i>
                                      	</span>
                                	</div>
                                    <input type="text" class="form-control " id="employee-name-en" name="employee-name-en" placeholder="ชื่อพนักงาน" value="<?php echo $result['username_en'] ?>" <?php echo $input_read; ?>>
                         		</div>
                     		</div>	
                        </div>
                        <div class="col-md-6">
						  <div class="p-10">
							  นามสกุล
                              <div class="input-group">
                                	<div class="input-group-prepend">
                                      	<span class="input-group-text">
                                        	<i class="fas fa-language"></i>
                                      	</span>
                                	</div>
                                    <input type="text" class="form-control " id="employee-sur-en" name="employee-sur-en" placeholder="นามสกุล" value="<?php echo $result['surname_en'] ?>" <?php echo $input_read; ?>>
                         		</div>
                     		</div>	
                        </div>
                        <div class="col-md-6">
						  <div class="p-10">
							  ตำแหน่ง
                              <div class="input-group">
                                	<div class="input-group-prepend">
                                      	<span class="input-group-text">
                                        	<i class="fas fa-language"></i>
                                      	</span>
                                	</div>
                                    <input type="text" class="form-control" id="employee-opti-en" name="employee-opti-en" placeholder="ตำแหน่งพนักงาน" value="<?php echo $result['position_en'] ?>" <?php echo $input_read; ?>>
                         		</div>
                     		</div>	
                        </div>
                        <div class="col-md-6">
						  <div class="p-10">
							  รายละเอียดพนักงาน
                              <div class="input-group">
                                	<div class="input-group-prepend">
                                      	<span class="input-group-text">
                                        	<i class="fas fa-language"></i>
                                      	</span>
                                	</div>
                                    <textarea class="form-control" placeholder="รายละเอียดพนักงาน" id="employee-detail-en" name="employee-detail-en" <?php echo $input_read; ?>><?php echo $result['detail_employee_en'] ?></textarea>
                         		</div>
                     		</div>	
                        </div>
                      </div> 
                    </div> 
                  </div>
                </div>	
                </div>
<?php
    $str_member = "SELECT * FROM users WHERE id_data_role = '".$_GET['id']."' ";
      $query_member = $db->Query($str_member);
      $result_member = mysqli_fetch_array($query_member); ?>
				<div id="tab-username" style="display: none;"> 
                <div class="card-login" align="center">
                  <div class="card-card-center">
					  <div class="p-10">
                      <p>อีเมลล์ <font class="" id="employee-email-text" style="display: none;">*</font></p>
					  <div class="input-group">
                                	<div class="input-group-prepend">
                                      	<span class="input-group-text">
                                        	<i class="fas fa-envelope"></i>
                                      	</span>
                                	</div>
                                    <input type="text" class="form-control" id="employee-email" name="employee-email" placeholder="อีเมลล์ Exam. yourname@gmail.com" value="<?php echo $result['email'] ?>" <?php echo $input_read; ?>>
                      </div>
					  </div>	  
                    <div class="p-10">
                      <p>ชื่อผู้ใช้งาน  <font class="warning-text-check-b2" id="employee-user-text">*</font>
                                        <i class="fa fa-spinner fa-spin spin-check" style="position:absolute; margin-left: 10px; color: green !important; display: none; "></i>
                                        <i class="fa fa-check success-check" style="position:absolute;margin-left: 10px; color: green !important; display: none;"></i>
                                        <i class="fa fa-times-circle wrong-check" style="position:absolute; margin-left: 10px; color: red !important; display: none;"> ชื่อผู้ใช้มีอยู่แล้ว.</i></p>
					  <div class="input-group">
                                	<div class="input-group-prepend">
                                      	<span class="input-group-text">
                                        	<i class="fa fa-user"></i>
                                      	</span>
                                	</div>
                                    <input type="text" class="form-control" id="employee-user" name="employee-user" placeholder="ชื่อผู้ใช้งานสำหรับเข้าสู่ระบบ" data-old="<?php echo $result_member['user_name'] ?>" value="<?php echo $result_member['user_name'] ?>" <?php echo $input_read; ?>>
                      </div>
                      <span class="help-block ">	
                      <span class="btn btn-warning" id="change-pass"  style="margin-top: 5px; <?php echo $button_update; ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i> <?=lang('เปลี่ยนรหัสผ่าน', 'Change password')?></span> 
                      
                      </span>
                    </div>
                    <div class="change-pass" style="display: none;">
                    <div class="p-10">
                      <p>รหัสผ่าน <font class="warning-text-check-b2" id="employee-pass-text">*</font></p>
					  <div class="input-group">
                                	<div class="input-group-prepend">
                                      	<span class="input-group-text">
                                        	<i class="fas fa-lock"></i>
                                      	</span>
                                	</div>
                                    <input type="password" class="form-control " id="employee-pass" name="employee-pass" placeholder="รหัสผ่านสำหรับเข้าสู่ระบบ">
                      </div>	
                    </div>
                    <div class="p-10">
                      <p>รหัสผ่านอีกครั้ง <font class="warning-text-check-b2" id="employee-passA-text">*</font></p>
					  <div class="input-group">
                                	<div class="input-group-prepend">
                                      	<span class="input-group-text">
                                        	<i class="fas fa-lock"></i>
                                      	</span>
                                	</div>
                                    <input type="password" class="form-control" id="employee-pass-again" name="employee-again-pass" placeholder="รหัสผ่านสำหรับเข้าสู่ระบบ">
                      </div>
						<div class="col-12" style="border-radius: 2px; background-color: #dd4b39; transition: 0.5s; display:inline-block;">
                      <font class="" id="employee-passA-again" style="display: none; color: white;">*กรุณากรอกรหัสผ่านให้ตรงกัน</font>
						</div>	
                    </div>
                    </div>
                  </div>
                </div>
              </div>
			  <div id="tab-view" style="display: none;"> 
                <div class="box-login" align="center">
                  <div class="box-box-center" style="width: 100%; max-width: 100%; text-align: left">
					<div class="p-10">
                    <span style="font-size: 18px; font-weight: bold;">สิทธิ์ในการมองเห็น</span>
                    
          </div>	
          <h6 class="card-subtitle">สัญลักษณ์ :: <i class="fas fa-eye" style="color: #03A9F4;"></i> = <code>View</code> , 
 <i class="fas fa-plus" style="color: #26C6DA;"/></i> = <code>Create</code> , <i class="fas fa-pencil-alt" style="color:#CDDC39; "/></i> = <code>Update</code> ,
 <i class="fas fa-trash-alt" style="color: #c30000;"/></i> = <code>Delete</code> ,<i class="mdi mdi-file-export" style="color: #7460EE;"/></i> = <code>Export</code> ,
  <i class="mdi mdi-file-import" style="color: #E91E63;"/></i> = <code>Import</code> , <i class="mdi mdi-printer" style="color: #FFC107;"/></i> = <code>Print</code> ,
   <i class="mdi mdi-check-circle" style="color: #FF5722;"/></i> = <code>Approval</code> 
  
   </h6>
   <div class="row">
    <div class="col-md-12 ">
    <input type="checkbox" id="checkall"  />
    <label for="checkall">ทำได้ทุกฟังก์ชัน</label>
    </div>
 </div>
                    <hr style="margin-top: 10px; margin-bottom: 10px">
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
                        
$str_perm = "SELECT`user_permissions`.*,`system`.`link_system` 
FROM `user_permissions`,`system` ,`users`
WHERE `user_permissions`.id_system = `system`.`id_system`
AND `user_permissions`.`id_user` = `users`.`id_user` AND `users`.id_data_role = '".$_GET['id']."' ";

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

      $str = "SELECT * FROM system WHERE type = '1' AND level = '1'";
      $query = $db->Query($str);
      $output = '';
      $i = 0;
      while ($objResult = mysqli_fetch_array($query)) {
          $task = searchByValue($objResult['id_system'], $permissions);
          //var_dump($task);
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
                            data-toggle="tooltip" data-placement="top" title="View"  value = "1"/>
                            <label for="general'.$i.'_1"><i class="fas fa-eye" style="color: #03A9F4;"></i></label>';
          $output .= '<input type="checkbox" id="general'.$i.'_2" name="general'.$i.'[]" class="filled-in chk-col-green" '.$chk_create.' 
                            data-toggle="tooltip" data-placement="top" title="Create" value = "2"/>
                            <label for="general'.$i.'_2"><i class="fas fa-plus" style="color: #26C6DA;"/></i></label>';
          $output .= '<input type="checkbox" id="general'.$i.'_3" name="general'.$i.'[]" class="filled-in chk-col-lime" '.$chk_update.' 
                            data-toggle="tooltip" data-placement="top" title="Update" value = "3"/>
                            <label for="general'.$i.'_3"><i class="fas fa-pencil-alt" style="color:#CDDC39; "/></i></label>';
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
                                <label for="general'.$i.'_1"><i class="fas fa-eye" style="color: #03A9F4;"></i></label>';
              $output .= '<input type="checkbox" id="general'.$i.'_2" name="general'.$i.'[]" class="filled-in chk-col-green" '.$chk_create.' 
                                data-toggle="tooltip" data-placement="top" title="Create" value = "2"/>
                                <label for="general'.$i.'_2"><i class="fas fa-plus" style="color: #26C6DA;"/></i></label>';
              $output .= '<input type="checkbox" id="general'.$i.'_3" name="general'.$i.'[]" class="filled-in chk-col-lime" '.$chk_update.' 
                                data-toggle="tooltip" data-placement="top" title="Update" value = "3"/>
                                <label for="general'.$i.'_3"><i class="fas fa-pencil-alt" style="color:#CDDC39; "/></i></label>';
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
                                    <label for="general'.$i.'_1"><i class="fas fa-eye" style="color: #03A9F4;"></i></label>';
                  $output .= '<input type="checkbox" id="general'.$i.'_2" name="general'.$i.'[]" class="filled-in chk-col-green" '.$chk_create.' 
                                    data-toggle="tooltip" data-placement="top" title="Create" value = "2"/>
                                    <label for="general'.$i.'_2"><i class="fas fa-plus" style="color: #26C6DA;"/></i></label>';
                  $output .= '<input type="checkbox" id="general'.$i.'_3" name="general'.$i.'[]" class="filled-in chk-col-lime" '.$chk_update.' 
                                    data-toggle="tooltip" data-placement="top" title="Update" value = "3"/>
                                    <label for="general'.$i.'_3"><i class="fas fa-pencil-alt" style="color:#CDDC39; "/></i></label>';
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
      echo $output; ?>

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
                            <label for="system'.$i.'_1"><i class="fas fa-eye" style="color: #03A9F4;"></i></label>';
          $output .= '<input type="checkbox" id="system'.$i.'_2" name="system'.$i.'[]" class="filled-in chk-col-green" '.$chk_create.' 
                            data-toggle="tooltip" data-placement="top" title="Create" value = "2"/>
                            <label for="system'.$i.'_2"><i class="fas fa-plus" style="color: #26C6DA;"/></i></label>';
          $output .= '<input type="checkbox" id="system'.$i.'_3" name="system'.$i.'[]" class="filled-in chk-col-lime" '.$chk_update.' 
                            data-toggle="tooltip" data-placement="top" title="Update" value = "3"/>
                            <label for="system'.$i.'_3"><i class="fas fa-pencil-alt" style="color:#CDDC39; "/></i></label>';
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
                                <label for="system'.$i.'_1"><i class="fas fa-eye" style="color: #03A9F4;"></i></label>';
              $output .= '<input type="checkbox" id="system'.$i.'_2" name="system'.$i.'[]" class="filled-in chk-col-green" '.$chk_create.' 
                                data-toggle="tooltip" data-placement="top" title="Create" value = "2"/>
                                <label for="system'.$i.'_2"><i class="fas fa-plus" style="color: #26C6DA;"/></i></label>';
              $output .= '<input type="checkbox" id="system'.$i.'_3" name="system'.$i.'[]" class="filled-in chk-col-lime" '.$chk_update.' 
                                data-toggle="tooltip" data-placement="top" title="Update" value = "3"/>
                                <label for="system'.$i.'_3"><i class="fas fa-pencil-alt" style="color:#CDDC39; "/></i></label>';
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
                                    <label for="system'.$i.'_1"><i class="fas fa-eye" style="color: #03A9F4;"></i></label>';
                  $output .= '<input type="checkbox" id="system'.$i.'_2" name="system'.$i.'[]" class="filled-in chk-col-green" '.$chk_create.' 
                                    data-toggle="tooltip" data-placement="top" title="Create" value = "2"/>
                                    <label for="system'.$i.'_2"><i class="fas fa-plus" style="color: #26C6DA;"/></i></label>';
                  $output .= '<input type="checkbox" id="system'.$i.'_3" name="system'.$i.'[]" class="filled-in chk-col-lime" '.$chk_update.' 
                                    data-toggle="tooltip" data-placement="top" title="Update" value = "3"/>
                                    <label for="system'.$i.'_3"><i class="fas fa-pencil-alt" style="color:#CDDC39; "/></i></label>';
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
      echo $output; ?>

                    </div>

                </div><!-- End Tab design -->
            </div><!-- End Tab panes -->

        </div>

                   <div class="box box-danger box-solid" style="<?php echo $task_alert ?>">
                      <div class="box-header ">
                        <h3 class="box-title">คำเตือน</h3>
                      </div>
                      <div class="box-body">
                        คุณไม่ได้รับสิทธิ์ในการกำหนดสิทธิ์ในการมองเห็น
                      </div>
                    </div>

                  </div>
                </div>
              </div>
			  <div class="box-footer" style="border: none;">

              <button type="button" class="btn btn-success pull-right" id="next-login" style="transition: 0.4s; margin-left: 5px;"></i>&nbsp;ถัดไป</button>
                <button type="button" class="btn btn-success pull-right" id="next-authen" style="transition: 0.4s; margin-left: 5px; display: none;"></i>&nbsp;ถัดไป</button>
                <button type="button" class="btn btn-success pull-right" id="next-view" style="transition: 0.4s; margin-left: 5px; display: none;"></i>&nbsp;ถัดไป</button>
                <button type="button" class="btn btn-light pull-left" id="back-login" style="transition: 0.4s; margin-left: 5px; display: none;"></i>&nbsp;ย้อนกลับ</button>
                <button type="button" class="btn btn-light pull-left" id="back-authen" style="transition: 0.4s; margin-left: 5px; display: none;"></i>&nbsp;ย้อนกลับ</button>
                <button type="button" class="btn btn-light pull-left" id="back-view" style="transition: 0.4s; margin-left: 5px; display: none;"></i>&nbsp;ย้อนกลับ</button>
              </div>					
								
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
	    
      <!-- /.box -->
<?php
  }
?>
</form>
				<!-- Row -->
                    <div class="col-12 m-t-30">
                        <div class="card">
                            <div class="card-body collapse show" style="border-top: solid #1e88e5;">
								<button type="button" class="btn btn-info btnSendEdit" id="btnSendEdit" style="transition: 0.4s; margin-left: 5px; float:right;<?php echo $button_update ?>"><i class="fa fa-check"></i>&nbsp;บันทึก</button>
          						<button type="button" class="btn btn-warning btnCancel" id="btnCancel" style="float:right" onclick="javascript:history.back();"><i class="fa fa-times"></i>&nbsp;ยกเลิก</button>
                            </div>
                        </div>
                    </div>
                <!-- End Row -->
            <!-- /.form send to DB-->
      <div class="modal fade" id="modal-default-image">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-warning">&nbsp;&nbsp;</i>คำเตือน</h4>
              </div>
              <div class="modal-body">
                <div id="image">
                  <center><img src="" width="60" height="60"><h4>กรูณาเลือกรูปภาพ</h4></center>
                </div>
                <div id="checkbox">
                  <center><img src="" width="60" height="60"><h4>กรูณาเลือกหมวดหมู่บทความ</h4>
                    ในกรณีไม่มีหมวดหมู่ที่ต้องการสามารถเพิ่มหมวดหมู่ที่ปุ่ม เพิ่มหมวดหมู่</center>
                </div>
                <div id="clearbox">
                  <center><img src="" width="60" height="60"><h4>การเคลียร์หน้าเพิ่มพนักงานจะเป็นการล้างหน้าจอรวมถึงภาพ/หมวดหมู่/เนื้อหาจะถูกล้างไปด้วย</h4></center>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-block btn-primary" data-dismiss="modal">ฉันเข้าใจแล้ว</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div class="modal fade" id="modal-alert">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-warning">&nbsp;&nbsp;</i>คำเตือน</h4>
              </div>
              <div class="modal-body">
                <div id="clearbox">
                  <h4>กรุณากรอกข้อมูลที่มีเครื่องหมาย <font style="color: orange;">*</font> ให้ครบทุกช่อง</h4>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">ฉันเข้าใจแล้ว</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->	
	</div>
</div>
  </div>	

<!-- ============================================================== -->
<!-- All custom script -->
<!-- ============================================================== -->
       
		
<?php include('../template/footer.php');?>

<!-- -----------------------------------------อัพรูปภาพ แบบ dropify---------------------------------------------------------->

<script src="../../plugins_b/bootstrap-datepicker-custom/js/bootstrap-datepicker.js"></script>

<script>
	
    (function($) {
        // Basic
        $('.dropify').dropify();

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
      })(jQuery);
    </script>
<!-- -----------------------------------------พิมพ์ขึ้นข้อความ---------------------------------------------------------->
	<script>
	function myFunctionex() {
	  var ex = document.getElementById("employee-name").value;
	  document.getElementById("name-ex").innerHTML = ex;
	}
	</script>
	<script>
	function myFunctions_ex() {
	  var s_ex = document.getElementById("employee-sur").value;
	  document.getElementById("sur-ex").innerHTML = s_ex;
	}
	</script>
	<script>
	function myFunctionc_ex() {
	  var c_ex = document.getElementById("employee-code").value;
	  document.getElementById("code-ex").innerHTML = c_ex;
	}
	</script>
	<script>
	function myFunctionp_ex() {
	  var p_ex = document.getElementById("employee-opti").value;
	  document.getElementById("posi-ex").innerHTML = p_ex;
	}
	</script>

<!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../../plugins_b/styleswitcher/jQuery.style.switcher.js"></script>

<div style="display: none;">
<span id="startDate">null</span> 
<b>To</b>
<span id="endDate"><?php echo date("d-M-y") ?></span>
</div>	

<script>
      $(document).ready(function(){
		  
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


      $(document).on('click','#change-pass',function(){
        $('.change-pass').slideToggle();
    });


        $(document).on('click', '.check_cat', function(){
          var level = $(this).attr('data-lev');
          var data_id = $(this).attr('data-id');
          var id = $(this).val();
          var id_t = $(this).attr('data-top');
          // alert(level+' '+data_id);
          if(level ==2){
            if($('.check_top2'+id).is(':checked')){
               $('.check_top1'+id_t).prop('checked', true);
            }else{
               $('.input_top2'+id).val('');
               $('.input_top3-ex2'+id).val('');
               $('.check_top3-ex2'+id).prop('checked', false);
            }
          }else if(level==3){
            if($('.check_top3'+id).is(':checked')){
              $('.check_top2'+id_t).prop('checked', true);
              var id_t2 = $('.check_top2'+id_t).attr('data-top');
              $('.check_top1'+id_t2).prop('checked', true);
            }else{
              $('.input_top3'+id).val('');
            }
          }else{
             if(!$('.check_top1'+id).is(':checked')){

              $('.input_top1'+id).val('');
              $('.input_top2-ex1'+id).val('');
              $('.input_top3-ex1'+id).val('');
               // alert(id);
              $('.check_top3-ex1'+id).prop('checked', false);
              $('.check_top2-ex1'+id).prop('checked', false);
              // $('#general23').val('');
             }
          }
        });
        //----------------------------------------------------------------------------------------------Next to mission------------------------------------------------------------------------------
        //---------------------------------------------------click Description
        $(document).on('click','.set_authen', function(){
          var i = $(this).attr('data-id');
          $('.authen'+i).removeClass('authen_acitve-block');
          $(this).addClass('authen_acitve-block');
        })

        $(document).on('click','.set_authen_d', function(){
          var i = $(this).attr('data-id');
          $('.authen_d'+i).removeClass('authen_acitve-block');
          $(this).addClass('authen_acitve-block');
        })

        $(document).on('click','.set_authen_p', function(){
          var i = $(this).attr('data-id');
          $('.authen_p'+i).removeClass('authen_acitve-block');
          $(this).addClass('authen_acitve-block');
        })

        $(document).on('click','#general', function(){
          $(this).addClass('btn-info');
          $(this).addClass('text_general');
          $('#system').removeClass('btn-warning');
          $('#system').removeClass('text_general');
          $('#general_show').show();
          $('#system_show').hide();
        });

        $(document).on('click','#system', function(){
          $(this).addClass('btn-warning');
          $(this).addClass('text_general');
          $('#general').removeClass('btn-info');
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
          $('#Username').removeClass('btn-info');

          $('#Description').addClass('btn-info');
          $('#Description').removeClass('btn-default');

          $('#Authentication').addClass('btn-default');
          $('#Authentication').removeClass('btn-info');

          $('#view').addClass('btn-default');
          $('#view').removeClass('btn-info');
        });
        //----------------------------------------------------click Username
        $(document).on('click','#Username', function(){
          if($('#next-login').is(':disabled',true)){
            $('#modal-alert').modal('show');
            return false;
          }
          $('#tab-authen').hide();
          $('#tab-description').hide();
          $('#tab-username').show();
          $('#tab-view').hide();

          $('#next-login').hide();
          $('#back-login').show();
          $('#back-view').hide();
         // $('#next-view').show();

          $('#Username').addClass('btn-info');
          $('#Username').removeClass('btn-default');

          $('#Description').addClass('btn-default');
          $('#Description').removeClass('btn-info');

          $('#Authentication').addClass('btn-default');
          $('#Authentication').removeClass('btn-info');

          $('#view').addClass('btn-default');
          $('#view').removeClass('btn-info');
        });
              //-----------------------------------------------------click view
              $(document).on('click','#view', function(){
          // if($('#next-authen').is(':disabled',true)){
          //   $('#modal-alert').modal('show');
          //   return false;
          // }

          $('#tab-view').show();
          $('#tab-authen').hide();
          $('#tab-description').hide();
          $('#tab-username').hide();

          $('#next-login').hide();
          $('#back-login').hide();
          $('#back-authen').hide();
          $('#next-authen').hide();
          $('#back-view').show();
          $('#next-view').hide();

          $('#Username').addClass('btn-default');
          $('#Username').removeClass('btn-info');

          $('#Description').addClass('btn-default');
          $('#Description').removeClass('btn-info');

          $('#Authentication').addClass('btn-default');
          $('#Authentication').removeClass('btn-info');

          //$('#btnSendAdd').prop('disabled',false);
          $('#view').addClass('btn-info');
          $('#view').removeClass('btn-default');
        });

        //---------------------------------------next login------------------------------------------
        $(document).on('click','#next-login',function(){
          $('#tab-description').hide();
          $('#tab-username').show();

          $('#next-login').hide();
          $('#back-login').show();
          //$('#next-view').show();
          $('#back-view').hide();

          $('#Username').addClass('btn-info');
          $('#Username').removeClass('btn-default');

          $('#Description').addClass('btn-default');
          $('#Description').removeClass('btn-info');

          $('#Authentication').addClass('btn-default');
          $('#Authentication').removeClass('btn-info');

          $('#view').addClass('btn-default');
          $('#view').removeClass('btn-info');

        });

         $(document).on('click','#back-login',function(){
          $('#tab-description').show();
          $('#tab-username').hide();
          $('#tab-authen').hide();

          $('#next-login').show();
          $('#back-login').hide();
          $('#back-authen').hide();
          $('#next-authen').hide();
          $('#next-view').hide();
          $('#back-view').hide();

          $('#Username').addClass('btn-default');
          $('#Username').removeClass('btn-info');

          $('#Description').addClass('btn-info');
          $('#Description').removeClass('btn-default');

          $('#Authentication').addClass('btn-default');
          $('#Authentication').removeClass('btn-info');

          $('#view').addClass('btn-default');
          $('#view').removeClass('btn-info');

        });
       
        $(document).on('click','#back-view',function(){
          $('#tab-description').hide();
          $('#tab-username').show();

          $('#tab-view').hide();
          $('#next-login').hide();
          $('#back-login').show();
          //$('#next-view').show();
          $('#back-view').hide();

          $('#Username').addClass('btn-info');
          $('#Username').removeClass('btn-default');

          $('#Description').addClass('btn-default');
          $('#Description').removeClass('btn-info');

          $('#Authentication').addClass('btn-default');
          $('#Authentication').removeClass('btn-info');

          $('#view').addClass('btn-default');
          $('#view').removeClass('btn-info');
        });

        $(document).on('click','#next-view',function(){
          $('#tab-authen').hide();
          $('#tab-description').hide();
          $('#tab-username').hide();
          $('#tab-view').show();

          $('#next-login').hide();
          $('#back-login').hide();
          $('#back-authen').hide();
          $('#next-authen').hide();
          $('#next-view').hide();
          $('#back-view').show();

          $('#Username').addClass('btn-default');
          $('#Username').removeClass('btn-info');

          $('#Description').addClass('btn-default');
          $('#Description').removeClass('btn-info');

  
          $('#Authentication').addClass('btn-default');
          $('#Authentication').removeClass('btn-info');

          $('#view').addClass('btn-info');
          $('#view').removeClass('btn-default');

          //$('#btnSendAdd').prop('disabled',false);
        });

        $(document).on('click', '.authen-active', function(){
          $('.authen-active').removeClass('active-authen');
          $(this).addClass('active-authen');
        });

        $(document).on('click', '#img-upload', function(){
          $('.btn-file :file').trigger('click');
        });
        //------------------------------------------------------------------------------------------------input employee-------------------------------------------------------------------------------
        $(document).on('keyup', '#employee-name', function(){
          var name = $(this).val();
          if(name!=''){
            $('#employee-name-text').hide();
            $('#employee-name-text').removeClass('warning-text-check');
          }else{
            $('#employee-name-text').show();
            $('#employee-name-text').addClass('warning-text-check');
          }

          var i =0;
          $('.warning-text-check').each(function(){
            i++;            
          });

          if(i==0){
            $('#next-login').prop('disabled',false);
          }else{
            $('#next-login').prop('disabled',true);
          }
          $('#name-ex').html(name);
        });

        $(document).on('keyup', '#employee-sur', function(){
          var name = $(this).val();
          if(name!=''){
            $('#employee-sur-text').hide();
            $('#employee-sur-text').removeClass('warning-text-check');
          }else{
            $('#employee-sur-text').show();
            $('#employee-sur-text').addClass('warning-text-check');
          }

          var i =0;
          $('.warning-text-check').each(function(){
            i++;            
          });

          if(i==0){
            $('#next-login').prop('disabled',false);
          }else{
            $('#next-login').prop('disabled',true);
          }
          $('#sur-ex').html(name);
        });

        $(document).on('change', '#datepicker-autoclose', function(){
            var name = $(this).val();
          if(name!=''){
            $('#employee-birth-text').hide();
            $('#employee-birth-text').removeClass('warning-text-check');
          }else{
            $('#employee-birth-text').show();
            $('#employee-birth-text').addClass('warning-text-check');
          }

          var i =0;
          $('.warning-text-check').each(function(){
            i++;            
          });

          if(i==0){
            $('#next-login').prop('disabled',false);
          }else{
            $('#next-login').prop('disabled',true);
          }

        });

        $(document).on('keyup', '#employee-code', function(){
            var name = $(this).val();
          if(name.length >= 13){
            $('#employee-code-text').hide();
            $('#employee-code-text').removeClass('warning-text-check');
          }else{
            $('#employee-code-text').show();
            $('#employee-code-text').addClass('warning-text-check');
          }

          var i =0;
          $('.warning-text-check').each(function(){
            i++;            
          });
          
          if(i==0){
            $('#next-login').prop('disabled',false);
          }else{
            $('#next-login').prop('disabled',true);
          }
          $('#code-ex').html(name);
        });

        $(document).on('keyup', '#employee-opti', function(){
          var name = $(this).val()
          $('#posi-ex').html(name);
        })
//-----------------------------------------------------------------------------------------------------------------Input Username--------------------------------------
        $(document).on('keyup', '#employee-email', function(){
            var email = new String($(this).val());
            var v_email = email.indexOf('@');
            if(email==''){
              $('#employee-email-text').hide();
              $('#employee-email-text').removeClass('warning-text-check-b2');
            }else{
              if(v_email>0){
                var num = email.length;
                var sum = num-1;
                if(sum > v_email){
                  $('#employee-email-text').hide();
                  $('#employee-email-text').removeClass('warning-text-check-b2');
                }else{
                  $('#employee-email-text').show();
                  $('#employee-email-text').addClass('warning-text-check-b2');
                }
              }else{
                  $('#employee-email-text').show();
                  $('#employee-email-text').addClass('warning-text-check-b2');
              }
            }
          var i =0;
          $('.warning-text-check-b2').each(function(){
            i++;            
          });

          /*if(i==0){
            $('#next-authen').prop('disabled',false);
          }else{
            $('#next-authen').prop('disabled',true);
          }*/
        });      

         $(document).on('keyup', '#employee-user', function(){
            var username = $(this).val();
          var form = 'check_user_ex';
          var old_user = $(this).attr('data-old');
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
                       form:form,
                       old_user:old_user},
                success:function(data){
                if(username == old_user){
                  $('#employee-user-text').removeClass('warning-text-check-b2');
                  $('.success-check').show();
                  $('.wrong-check').hide();
                  $('#employee-user-text').hide(); 
                }else{
                  if(data.status==0){
                    $('#employee-user-text').removeClass('warning-text-check-b2');
                    $('#employee-user-text').hide();
                    $('.wrong-check').show();
                    $('.success-check').hide();
                  }else{
                    $('#employee-user-text').removeClass('warning-text-check-b2');
                    $('.success-check').show();
                    $('.wrong-check').hide();
                    $('#employee-user-text').hide(); 
                  }
                } 
              }  
            });
          }else{
            $('.success-check').hide();
            $('.wrong-check').hide();
            $('#employee-user-text').show();
            $('#employee-user-text').addClass('warning-text-check-b2');
          }

          var i =0;
          $('.warning-text-check-b2').each(function(){
            i++;            
          });

          /*if(i==0){
            $('#next-authen').prop('disabled',false);
          }else{
            $('#next-authen').prop('disabled',true);
          }*/
        });        

        $(document).on('keyup', '#employee-pass', function(){
            var pass = $(this).val();
          var ck_pass = $('#employee-pass-again').val();
          // if(pass != ''){
          //   $('#employee-pass-text').hide();
          //   $('#employee-pass-text').removeClass('warning-text-check-b2');
          // }else{
          //   $('#employee-pass-text').show();
          //   $('#employee-pass-text').addClass('warning-text-check-b2');
          // }

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

          /*if(i==0){
            $('#next-authen').prop('disabled',false);
          }else{
            $('#next-authen').prop('disabled',true);
          }*/
        });

        $(document).on('keyup', '#employee-pass-again', function(){
            var pass = $(this).val();
          var ck_pass = $('#employee-pass').val();
          // if(pass != ''){
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
          // }else{
          //   $('#employee-passA-text').show();
          //   $('#employee-passA-text').addClass('warning-text-check-b2');
          //   $('#employee-passA-again').addClass('warning-text-check-b2');
          //   $('#employee-passA-again').show();
          // }

          var i =0;
          $('.warning-text-check-b2').each(function(){
            i++;            
          });

          /*if(i==0){
            $('#next-authen').prop('disabled',false);
          }else{
            $('#next-authen').prop('disabled',true);
          }*/
        });


        //---------------------------------------clear form----------------------------------------------------------------------------------
        $(document).on('click', '.btnSendClear', function() {
          document.getElementById('frmADD').reset();
          $('#img-upload').attr('src', 'img/upload.jpg');
          $('#name-ex').html('');
          $('#sur-ex').html('');
          $('#code-ex').html('');
          $('#posi-ex').html('');
        });
     //------------------------------------------------------------ADD article--------------------------------------------------------------
        $(document).on('click', '.btnSendEdit', function(){ 
           /* if($('#next-authen').is(':disabled',true) || $('#next-login').is(':disabled',true)){
              $('#modal-alert').modal('show');
              return false;
            } */
            var formData = new FormData($('.upload-form-add')[0]);
              $.ajax({
                  beforeSend: function() {
                    // setting a timeout
                    $('#result_add').show();
                    $('#success_add').hide();
                    $('#loader_add').show();
                  },
                  complete: function() {
                      $('#loader_add').hide();
                      $('#success_add').show();  
                      setTimeout(function(){$("#result_add").hide(0)}, 10000);
                      $('#modal-default').modal('show');

                  },
                   type: "POST",
                   url: "functions.php",
                   data: formData,
                   processData: false,
                   contentType: false,
                   success: function(data) {
                    // alert(data);
                  },
              });
          });

        $(document).on('click', '#btnYes', function (){
          location.href = "../index.php";
        })
          });

        $(document).on('click', '#btnYes', function (){
           location.href = "../index.php";
        })

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
      
      
               //----------------------------------------------Check isnumber-----------------------------------------------------------------
       function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
          }
        return true;
      } 
</script>

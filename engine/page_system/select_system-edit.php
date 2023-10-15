<?php
session_start();
 require_once '../lib/connect.php';
 require_once '../lib/service.php';
 $db = new DB();

$id = $_POST['id'];
$output = '';
$output .= '';

$str = 'SELECT * FROM system WHERE id_system = "'.$id.'"';
$query = $db->Query($str);
$result = mysqli_fetch_array($query);
$output .= '<input type="hidden" name="id_edit" value="'.$id. '" id="id_edit">
              <div class="box-body" style="padding: 0;" >
                <div class="nav-tabs-custom nav-tabs-custom-edit" style="box-shadow: none; margin-bottom: 5px;">
						<!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#thai_edit" role="tab"><span class="hidden-sm-up"><i class="flag-icon flag-icon-th"></i></span> <span class="hidden-xs-down"><i class="flag-icon flag-icon-th"></i> ภาษาไทย</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#english_edit" role="tab"><span class="hidden-sm-up"><i class="flag-icon flag-icon-us"></i></span> <span class="hidden-xs-down"><i class="flag-icon flag-icon-us"></i> ภาษาอังกฤษ</span></a> </li>
                                </ul>
                         <!-- Tab panes -->
					
						 <div class="tab-content" style="padding: 5px 15px 5px 15px; margin-top: 15px;">
                        <div class="tab-pane active" id="thai_edit">
						  <div class="input-group" style="padding-left: 5px; padding-right: 5px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        ชื่อระบบ
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="ภาษาไทย" name="name" id="name_th-edit" onkeyup="checklength_edit()" value="'.$result['name_system'].'">
                                            </div>
                        </div>
                        <div class="tab-pane" id="english_edit">
						<div class="input-group" style="padding-left: 5px; padding-right: 5px;">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text" >
                                                        System name
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="english" id="english" placeholder="ภาษาอังกฤษ" value="'.$result['name_system_en'].'">
                                            </div>
                      </div>
					  
                     <div class="row"> 
                      <div class="col-lg-3" style="padding-top: 20px;">
                        <div class="box-box-fa ch-icon-edit" data-id="' .$id.'" id="change-icon-edit">';
if ($result['icon']=='') {
    $output .= '<i class="mdi mdi-checkbox-blank-circle-outline"></i>';
} else {
    $output .= $result['icon'];
}
$output .= '                 
                        </div>
                      </div>
                      <div class="col-lg-9" style="padding-top: 50px; padding-right: 20px;">

                      <div class="content-choice">
                        
						<div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" >
                                                        icon
                                                    </span>
                                                </div>
                                                <input type="text" name="icon" id="change-icon-value-edit" class="form-control"  placeholder="'.htmlspecialchars('สามารถไส่ชื่อไอคอนได้ที่นี่ ตัวอย่าง <i class="fa fa-check"></i>').'" value="'.htmlspecialchars($result['icon']).'"
                                                                  onkeyup="checklength()">
                                            </div>
                        <div class="group-btn-custom">';
if ($result['level']==1) {
    $check_h = 'checked';
    $check_s = '';
    $display_form   = '';
    $display_under  = 'display:none;';
    $active_hlink = 'active_link';
    $active_slink = '';
} else {
    $check_h = '';
    $display_form   = 'display:none;';
    $display_under  = '';
    $check_s = 'checked';
    $active_hlink = '';
    $active_slink = 'active_link';
}

if ($result['type']==1) {
    $check_type1 = 'checked';
    $check_type2 = '';
} else {
    $check_type1 = '';
    $check_type2 = 'checked';
}

$output .= '
                            <span class="btn btn-secondary '.$active_hlink.'" id="head-link-edit">หัวข้อหลัก</span>
                            <span class="btn btn-secondary '.$active_slink.'" id="sub-link-edit" data-id="'.$id.'">หัวข้อย่อย</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-type" style="padding:10px; text-align: center; font-size: 16px; display:none;">
                    <label><input type="radio" name="form-system" value="1" id="mn_system_edit" '.$check_h.'> หัวข้อหลัก</label>                          
                    <label><input type="radio" name="form-system" value="2" id="mn_system_sub_edit" '.$check_s.' data-id="'.$id.'"> หัวข้อย่อย</label>
                  </div>
                    <div class=""></div>
                      <div class="row" style="padding: 15px;">
                        <div class="col-lg-6" style="">
                          <div class="card card-outline-inverse" id="mn_system_show_edit" style="'.$display_form.'">
                            <div class="card-header" style="background: #d2d6de">
                                <h4 class="m-b-0 text-black-50">รูปแบบระบบ</h4>
							</div>
							<div class="card-body">
								<div class="demo-radio-button">
                                    <input name="form-type" type="radio" id="radio_30_edit" value="1" '.$check_type1.' class="with-gap radio-col-red"/>
                                    <label for="radio_30_edit">จัดการเนื้อหา</label>
                                    <input name="form-type" type="radio" id="radio_31_edit" value="2" '.$check_type2.' class="with-gap radio-col-red" />
                                    <label for="radio_31_edit">จัดการดีไซต์</label>
                                </div>	
                            </div>
                          </div>  
                          <div class="card card-outline-inverse" id="mn_system_sub_show_edit" style="'.$display_under. '">
                            <div class="card-header" style="background: #d2d6de">
                              <h4 class="m-b-0 text-black-50">ภายใต้ระบบ</h4>
                            </div>
                            <div class="card-body">
                              <div id="live_system_sub-edit"></div>
                            </div>
                          </div>  
                        </div>
					
                        <div class="col-lg-6">
                            <div class="card card-outline-inverse">
                            <div class="card-header" style="background: #d2d6de">
                              <h4 class="m-b-0 text-black-50">การเชื่อมต่อ</h4>
                            </div>
                            <div class="box-body" style="padding: 0">
                              <table class="table">
                                <tr>
                                  <td width="30">
                                    <img src="../images/folder.png" width="25" height="25">
                                  </td>
                                  <td>
                                    <select class="form-control select_dir-edit" id="basic6">
                                      <option value="#">#</option>';
$cut_dir = explode('/', $result['link_system']);
$num_dir = count($cut_dir);
if ($num_dir == 1) {
    $folder = '';
    $file_in = '';
} else {
    $folder = $cut_dir[0];
    $file_in = $cut_dir[1];
}

  $dir = "../../engine/";
  if (is_dir($dir)) {
      if ($dh = opendir($dir)) {
          while (($file = readdir($dh)) !== false) {
              if ($file=='.' || $file=='..') {
                  continue;
              }
              if (strpos($file, 'mod') !== false || strpos($file, 'page') !== false) {
                  if ($file === $folder) {
                      $select_folder = 'selected';
                  } else {
                      $select_folder = '';
                  }
                  $output .= '<option value='.$file.' '.$select_folder.'>'.$file.'</option>';
              }
          }
          closedir($dh);
      }
  }
  if ($result['link_system']=='#') {
      $select_disbled = 'disabled';
  } else {
      $select_disbled = '';
  }
$output .= '
                                    </select>
                                  </td>
                                </tr>
                                <tr>
                                  <td><i class="fa fa-link" style="font-size: 24px; color:#3c8dbc !important "></i></td>
                                  <td>
                                    <div id="select_dir-file">
                                      
                                    </div>
                                    <div id="select_dir-file-edit">
                                    <select class="form-control select_dir-file hide_dir-file" '.$select_disbled.' id="basic7" name="name_file">';
if ($folder == '') {
    $output .=                          '<option></option>';
} else {
    $dir_s = "../../engine/".$folder;
    if (is_dir($dir_s)) {
        if ($dh_s = opendir($dir_s)) {
            while (($file_s = readdir($dh_s)) !== false) {
                if ($file_s=='.' || $file_s=='..') {
                    continue;
                }
                if (strpos($file_s, '.php') !== false || strpos($file_s, '.html') !== false) {
                    if ($file_s === $file_in) {
                        $select_file_in = 'selected';
                    } else {
                        $select_file_in = '';
                    }
                    $output .= "<option value=".$cut_dir[0].'/'.$file_s." ".$select_file_in.">" . $file_s . "</option>";
                }
            }
            closedir($dh_s);
        }
    }
}
$output .= '                          
                                    </select>
                                    </div>
                                  </td>
                                </tr>
								<tr >
                                  <td><i class="fas fa-external-link-square-alt" style="font-size: 24px; color:#3c8dbc !important "></i></td>
                                  <td>
                                    <div id="select_dir-file" style="top: 40px;">
                                      
                                    </div>
';
$cut_dir = explode('/', $result['link_system']);
  $output .= '
  <input type="text" class="form-control" placeholder="ภาษาไทย" name="" id="" value="'.$result['link_system'].'">';

$output .= '
                                  </td>
                                </tr>  
                              </table>
							  <div class="row" style="padding-left: 30px;">
								<a class="mytooltip" href="javascript:void(0)" style="color: #FF0004; z-index: 9;"> *ข้อควรระวังการใช้งาน<span class="tooltip-content5"><span class="tooltip-text3"><span class="tooltip-inner2">ควรตั้งชื่อ folder <i class="fa fa-folder"></i> ให้ขึ้นต้นด้วย mod ทุกครั้ง </span></span></span></a>
								</div>
                            </div>
                          </div>  
                          <p style="float: left; margin-right: 10px;"></p>    
                        </div>
                      </div>  
              </div>


              <div class="modal fade" id="modal-view-edit">
                <div class="modal-dialog modal-em-add">
                  <div class="modal-content">
                    <div class="modal-header" style="border-bottom: none;">
                      <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h4 class="modal-title">แก้ไขกำหนดสิทธิ์</h4>
                    </div>
                    <div class="modal-body" style="padding-top: 0">
                      <div class="row" style="padding-bottom: 10px;">
                        <div class="col-md-5">
                          <div class="input-group pull-right">
                            <input type="text" name="q" class="form-control" placeholder="Search..." id="search-jquery-editview">
                            <span class="input-group-btn">
                              <button name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                              </button>
                            </span>
                          </div>
                        </div>
                      </div>
					</div>
                        ';
$str_member = "SELECT * FROM users WHERE id_user = '".$_SESSION['user_id']."'";
$query_member = $db->Query($str_member);
$result_member = mysqli_fetch_array($query_member);

//ini_set('display_errors', 1);
//error_reporting(~0);
  $str_tbl = "SHOW TABLES LIKE 'mod_employee'";
  $query_tbl = $db->Query($str_tbl);
  if ($num = mysqli_num_rows($query_tbl) != 1) {
      $output .= 'ไม่มีตารางข้อมูลพนักงาน';
  } else {
      $strSQL = "SELECT mod_employee.*, users.* FROM mod_employee,users WHERE mod_employee.id_employee = users.id_role ORDER BY id_employee";

      $objQuery = $db->Query($strSQL);

      $num_rows = mysqli_num_rows($objQuery);
      $objQuery = $db->Query($strSQL);

      $row_objresult = mysqli_num_rows($objQuery);
      $output .= ' <div style="overflow:auto; max-height:500px;">
            <table class="employee" >
              <thead>';
      if ($row_objresult != 0) {
          $output .= '
                    <tr>
                      <th colspan="2">รูปภาพ</th>
                      <th style="text-align:center;">ชื่อ-นามสกุล</th>
                      <th style="text-align:center;">ชื่อผู้ใช้งาน</th>
                      <th style="text-align:center;">ตำแหน่ง</th>
                      <th style="text-align:center;">สิทธ์การเข้าใช้</th>
                    </tr>';
      }
      $output .= '
                  </thead>
                  <tbody id="table-search-editview">
        ';
      $i   = 0;
      $num = 0;
      while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
          $str    = "SELECT * FROM mod_employee_image WHERE id_employee = '".$objResult['id_employee']."'";
          $query = $db->Query($str);
          $row    = mysqli_num_rows($query);
          $result = mysqli_fetch_array($query);
          $date_img  = $result['date_image'];
          $date_img = explode("-", $date_img);

          if ($row > 0) {
              $image = "../../uploads/$date_img[0]/employee/" . $result['name_image'];
          } else {
              $image = "../img/suit.jpg";
          }

          if ($objResult['id_employee']==$result_member['id_role']) {
              $border_td = 'border-top:1px orange solid;';
              $border_tr = 'border-bottom:1px solid orange;';
          } else {
              $border_td ='';
              $border_tr = '';
          }

          $result_perm = getUserPermissions($objResult['id_user']);
          $task_view = array();
          $task_authen = array();
          $permissions = array();
          while ($obPerm= mysqli_fetch_array($result_perm)) {
              array_push($permissions, array("id"=>$obPerm['id_system'],"permissions"=>$obPerm['permissions'],"link"=>$obPerm['link_system']));
              array_push($task_view, $obPerm['id_system']);
              array_push($task_authen, $obPerm['permissions']);
          }

          $task = searchByValue($_POST['id'], $permissions);

          if (isset($task)) {
              $key = array_search($_POST['id'], $task);
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


          /*$module = explode(",", $objResult['task_view']);
          $authen = explode(",", $objResult['task_authen']);
          if (($key = array_search($_POST['id'], $module)) !== false) {
              // echo $key;
              if ($authen[$key]==1) {
                  $check1 = "checked";
                  $check2 = "";
                  $check3 = "";
                  $check0 = "";

                  $class1 = "authen_acitve-block";
                  $class2 = "";
                  $class3 = "";
                  $class0 = "";
              } elseif ($authen[$key]==2) {
                  $check1 = "";
                  $check2 = "checked";
                  $check3 = "";
                  $check0 = "";

                  $class1 = "";
                  $class2 = "authen_acitve-block";
                  $class3 = "";
                  $class0 = "";
              } elseif ($authen[$key]==3) {
                  $check1 = "";
                  $check2 = "";
                  $check3 = "checked";
                  $check0 = "";

                  $class1 = "";
                  $class2 = "";
                  $class3 = "authen_acitve-block";
                  $class0 = "";
              }
          } else {
              $check1 = "";
              $check2 = "";
              $check3 = "";
              $check0 = "checked";

              $class1 = "";
              $class2 = "";
              $class3 = "";
              $class0 = "authen_acitve-block";
          }*/


          $num++;
          $i++;
          $output .= '<tr style="'.$border_tr.'" class="show-tr-em-add ">
              
               <td width="3%" style="'.$border_td.'">
                ' . $i . '
              </td>

              <td style="width:10px; '.$border_td.'">
                <div class="image-employee-list">
                  <img src="' . $image . '">
                </div>
              </td>
              <td style="text-align:center; '.$border_td.'">
                <div id="test" >
                  ' . $objResult['username'] .'  ' . $objResult['surname'] . '<br>
                </div>';
          
          $output .= '</td>';
 
          $output .= '
              <td style="text-align:center; '.$border_td.'">';
          $str_role    = "SELECT * FROM users WHERE id_data_role = '".$objResult['id_employee']."' "; /*AND data_role = 'mod_employee' อันเก่า*/
          $query_role = $db->Query($str_role);
          $result_role = mysqli_fetch_array($query_role);
          $output .= '
                ' . $result_role['id_user'] .' 
              </td>
              <td style="text-align: center; '.$border_td.'">
                ' . $objResult['position'] .' 
              </td>

              <td style="text-align: center; '.$border_td.'">';

          $output .= '<input type="hidden" name="general_id'.$i.'" value="'.$_POST['id'].'" />';
          $output .= '<input type="checkbox" id="general'.$i.'_1" name="general'.$i.'[]" class="filled-in chk-col-light-blue" '.$chk_view.' 
                                                        data-toggle="tooltip" data-placement="top" title="View"  value = "1"/>
                                                        <label for="general'.$i.'_1">V</label>';
          $output .= '<input type="checkbox" id="general'.$i.'_2" name="general'.$i.'[]" class="filled-in chk-col-green" '.$chk_create.' 
                                                        data-toggle="tooltip" data-placement="top" title="Create" value = "2"/>
                                                        <label for="general'.$i.'_2">C</label>';
          $output .= '<input type="checkbox" id="general'.$i.'_3" name="general'.$i.'[]" class="filled-in chk-col-lime" '.$chk_update.' 
                                                        data-toggle="tooltip" data-placement="top" title="Update" value = "3"/>
                                                        <label for="general'.$i.'_3">U</label>';
          $output .= '<input type="checkbox" id="general'.$i.'_4" name="general'.$i.'[]" class="filled-in chk-col-red" '.$chk_delete.' 
                                                        data-toggle="tooltip" data-placement="top" title="Delete" value = "4"/>
                                                        <label for="general'.$i.'_4">D</label>';
          $output .= '<input type="checkbox" id="general'.$i.'_5" name="general'.$i.'[]" class="filled-in chk-col-purple" '.$chk_download.' 
                                                        data-toggle="tooltip" data-placement="top" title="Export" value = "5"/>
                                                        <label for="general'.$i.'_5">E</label>';
          $output .= '<input type="checkbox" id="general'.$i.'_6" name="general'.$i.'[]" class="filled-in chk-col-pink" '.$chk_upload.' 
                                                        data-toggle="tooltip" data-placement="top" title="Import" value = "6"/>
                                                        <label for="general'.$i.'_6">I</label>';
          $output .= '<input type="checkbox" id="general'.$i.'_7" name="general'.$i.'[]" class="filled-in chk-col-amber" '.$chk_print.' 
                                                        data-toggle="tooltip" data-placement="top" title="Print" value = "7"/>
                                                        <label for="general'.$i.'_7">P</label>';
          $output .= '<input type="checkbox" id="general'.$i.'_8" name="general'.$i.'[]" class="filled-in chk-col-deep-orange" '.$chk_approval.' 
                                                        data-toggle="tooltip" data-placement="top" title="Approval" value = "8"/>
                                                        <label for="general'.$i.'_8">A</label>';


          $output .= ' 
              </td>

            </tr>
        ';
      }

      if ($row_objresult == 0) {
          $output .= '<tr>
                <td colspan="9" bgcolor="white">
                  <div class="row">
                    <div class="col-md-12" align="center">
                      <h3 style="color:gray; margin-bottom:-10px;">Oops! ไม่พบข้อมูลที่คุณค้นหา</h3>
                      <a href="front-add.php" class="view_add">
                        <font style="font-size:122px; color:#ddd; padding-left:25px;"><i class="fa fa-user-plus"></i></font>
                        <h5 style="color:gray; margin-top:-30px;">เพิ่มพนักงานใหม่</h3>
                      </a>
                    </div>
                  </div>
                </td>
              </tr>';
      }
      $output .= '</tbody>
          </table>
          </div>
          <input type="hidden" name="hdnCount" value="'.$num.'">
          <input id="count_general" type="hidden" value="'.$i.'" name="count_general">
        <div class="box-footer">';
      if ($num_rows > 0) {
          $output .= '
          <div class="row">
            <div class="col-sm-5">
              <font size="3">รายชื่อทั้งหมด ' . $num_rows . '</font>
            </div>
            ';
      } else {
          $output .= 'ไม่มีข้อมูล';
      }
  }

$output .= '
                    </div>
                    <!--/.modal-body-->
                  </div><!-- /.modal-content -->
                </div>
              </div>';
echo $output;
?>
<script type="text/javascript">
    $('#basic6').selectpicker({
        liveSearch: true,
        maxOptions: 1
      });
    $('#basic7').selectpicker({
        liveSearch: true,
        maxOptions: 1
      });
</script>
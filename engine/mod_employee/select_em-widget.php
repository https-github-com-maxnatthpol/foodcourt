<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/functions.php';
require_once '../lib/config.php';
$db = new DB();

$task_view = isset($_SESSION['task_view']) ?$_SESSION['task_view']:null;
$task_authen = isset($_SESSION['task_authen'])?$_SESSION['task_authen']:null;
$permissions = isset($_SESSION['permissions'])?$_SESSION['permissions']:null;

/*function searchByValue($id, $array)
{
    foreach ($array as $key => $val) {
        if ($val['id'] === $id) {
            $resultSet['permissions'] = $val['permissions'];
            $resultSet['key'] = $key;
            $resultSet['id'] = $val['id'];
            return $resultSet;
        }
    }
    return null;
}*/

if ($_SESSION['admin']!='1') { //---User
    $task = searchByValue($_COOKIE['id_system'], $permissions);
    $button_manage = isset($task)?'':'display:none';

    if (isset($task)) {
        $key = array_search($_COOKIE['id_system'], $task);
        $auth = $task["permissions"];
        $arrAuth = explode(",", $auth);
        $button_view = ((array_search('1', $arrAuth)) === false)?'display:none':'';
        $button_create = ((array_search('2', $arrAuth)) === false)?'display:none':'';
        $button_update = ((array_search('3', $arrAuth)) === false)?'display:none':'';
        $button_delete = ((array_search('4', $arrAuth)) === false)?'display:none':'';
        $input_read = ((array_search('1', $arrAuth)) === false)?'readonly':'';
        $image_click = ((array_search('1', $arrAuth)) === false)?'':'img-upload';
        $button_download = ((array_search('5', $arrAuth)) === false)?'display:none':'';
        $button_upload = ((array_search('6', $arrAuth)) === false)?'display:none':'';
        $button_print = ((array_search('7', $arrAuth)) === false)?'display:none':'';
        $button_approval = ((array_search('8', $arrAuth)) === false)?'display:none':'';

        $task_manage = 'display:none;';
        $task_alert = '';
        $button_delete_all = 'display:none;';
    } else {
        $button_view = 'display:none';
        $button_create = 'display:none';
        $button_update = 'display:none';
        $button_delete = 'display:none';
        $input_read = 'readonly';
        $image_click = '';
        $button_download = 'display:none';
        $button_upload = 'display:none';
        $button_print = 'display:none';
        $button_approval = 'display:none';

        $task_manage = 'display:none;';
        $task_alert = '';
        $button_delete_all = 'display:none;';
    }
} else { //--Admin
    $button_manage = '';
    $button_view = '';
    $button_create = '';
    $button_update = '';
    $button_delete = '';
    $input_read = '';
    $image_click = 'img-upload';
    $button_download = '';
    $button_upload = '';
    $button_print = '';
    $button_approval = '';

    $task_manage = '';
    $task_alert = 'display:none;';
    $button_delete_all = '';
}

if ($_SESSION['admin']!='1') {
    $null_del = ' AND users.delete_datetime IS NULL';
} else {
    $null_del = ' AND users.delete_datetime IS NULL';
}

$result_member = getCurrentUser();

//ini_set('display_errors', 1);
//error_reporting(~0);
//send fast
$strKeyword_name_fast = null;
//send detail
$strKeyword_name = null;
$strKeyword_code = null;
$strKeyword_sur  = null;
$strKeyword_code_id = null;
$strKeyword_birthday = null;
$strKeyword_posi = null;
$strKeyword_authen = null;
//sort
$strKeyword_sort = null;
if (isset($_POST['name']) && $_POST['name'] != '') {
    $strKeyword_name_fast = $db->clear($_POST["name"]);
    $strSQL              = "SELECT mod_employee.*, users.*  
                            FROM mod_employee
                            LEFT JOIN users ON mod_employee.id_employee = users.id_data_role
                            WHERE mod_employee.username   LIKE '%" . $strKeyword_name_fast . "%' 
                            OR mod_employee.surname       LIKE '%" . $strKeyword_name_fast . "%'
                            OR mod_employee.username_en   LIKE '%" . $strKeyword_name_fast . "%'
                            OR mod_employee.surname_en    LIKE '%" . $strKeyword_name_fast . "%'
                            OR mod_employee.position      LIKE '%" . $strKeyword_name_fast . "%'
                            OR mod_employee.position_en   LIKE '%" . $strKeyword_name_fast . "%'
                            OR mod_employee.code_id       LIKE '%" . $strKeyword_name_fast . "%'
                            OR mod_employee.email         LIKE '%" . $strKeyword_name_fast . "%'
                            OR mod_employee.tel           LIKE '%" . $strKeyword_name_fast . "%'
                            OR users.user_name      	  LIKE '%" . $strKeyword_name_fast . "%'
                            OR users.admin          	  LIKE '%" . $strKeyword_name_fast . "%'
                            $null_del
                            ";#ไปตรวจสอบที่ php แทน
} elseif (isset($_POST['name_em'])) {
    $strKeyword_name = $db->clear($_POST["name_em"]);
    $strKeyword_sur  = $db->clear($_POST["sur_em"]);
    $strKeyword_birthday = $db->clear($_POST["birthday"]);
    $strKeyword_posi     = $db->clear($_POST["posi_em"]);
    $strKeyword_code_id = $db->clear($_POST['code_id_em']);
    $strSQL          = "SELECT mod_employee.*, users.*  
                            FROM mod_employee
                            LEFT JOIN users ON mod_employee.id_employee = users.id_data_role
                            WHERE mod_employee.username   LIKE '%" . $strKeyword_name . "%'
                            AND mod_employee.surname      LIKE '%" . $strKeyword_sur . "%'
                            AND mod_employee.code_id      LIKE '%" . $strKeyword_code_id . "%'
                            AND mod_employee.birthday     LIKE '%" . $strKeyword_birthday . "%'
                            AND mod_employee.position     LIKE '%" . $strKeyword_posi . "%'
                            $null_del
                            ";
} else {
    $strSQL = "SELECT mod_employee.*, users.* FROM mod_employee,users WHERE mod_employee.id_employee = users.id_data_role $null_del";
}

$objQuery = $db->Query($strSQL);

$num_rows = mysqli_num_rows($objQuery);

$per_page = 50;
$page     = 1;

if (isset($_POST["page"])) {
    $page = $_POST["page"];
}

$prev_page = $page - 1;
$next_page = $page + 1;

$row_start = (($per_page * $page) - $per_page);
if ($num_rows <= $per_page) {
    $num_pages = 1;
} elseif (($num_rows % $per_page) == 0) {
    $num_pages = ($num_rows / $per_page);
} else {
    $num_pages = ($num_rows / $per_page) + 1;
    $num_pages = (int) $num_pages;
}
$row_end = $per_page * $page;
if ($row_end > $num_rows) {
    $row_end = $num_rows;
}
// ORDER BY--------------------------------------------------------
if (isset($_POST['sort']) && $_POST['sort'] != '') {
    $strKeyword_sort = $_POST['sort'];
    // set POST
    if ($_POST['sort'] == 'n') {
        $strSQL .= " ORDER BY firstrname ASC LIMIT $row_start, $per_page";
    } elseif ($_POST['sort'] == 'n1') {
        $strSQL .= " ORDER BY firstrname DESC LIMIT $row_start, $per_page";
    } elseif ($_POST['sort'] == 's') {
        $strSQL .= " ORDER BY surname DESC LIMIT $row_start, $per_page";
    } elseif ($_POST['sort'] == 's1') {
        $strSQL .= " ORDER BY surname ASC LIMIT $row_start, $per_page";
    } elseif ($_POST['sort'] == 'u') {
        $strSQL .= " ORDER BY user_member ASC LIMIT $row_start, $per_page";
    } elseif ($_POST['sort'] == 'u1') {
        $strSQL .= " ORDER BY user_member DESC LIMIT $row_start, $per_page";
    } elseif ($_POST['sort'] == 'p') {
        $strSQL .= " ORDER BY position ASC LIMIT $row_start, $per_page";
    } elseif ($_POST['sort'] == 'p1') {
        $strSQL .= " ORDER BY position DESC LIMIT $row_start, $per_page";
    }
} else {
    $strSQL .= " ORDER BY id_employee LIMIT $row_start, $per_page";
}
$objQuery = $db->Query($strSQL);

$row_objresult = mysqli_num_rows($objQuery);
$output        = '';
$output .= ' <div style="overflow-x:auto;">
            <table class="">
              <thead>';
if ($row_objresult != 0) {
    $output .= '
                    <tr>
                      <th style="text-align: center; min-width:50px; width:50px;"><input class="ClickCheckAll" type="checkbox" name="CheckAll" id="CheckAll" value="Y" onClick="ClickCheckAll(this);"></th>
                      <th colspan="2">'.lang('เลือกทั้งหมด', 'Select all').'</th>
                      <th style="text-align:center;">'.lang('ชื่อ-นามสกุล', 'Name').'</th>
                      <th style="text-align:center;">'.lang('ชื่อผู้ใช้งาน', 'Username').'</th>
                      <th style="text-align:center;">'.lang('ตำแหน่ง', 'Postion').'</th>
                      <th style="text-align:center;">'.lang('ควบคุม', 'Control').'</th>
                    </tr>';
}
$output .= '
                  </thead>
                  <tbody>
        ';
$i   = $row_start;
$num = 0;
while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
    $str    = "SELECT * FROM mod_employee_image WHERE id_employee = '".$objResult['id_employee']."'";
    $query = $db->Query($str);
    $row    = mysqli_num_rows($query);
    $result = mysqli_fetch_array($query);

    $date_img  = $result['date_image'];
    $date_img = explode("-", $date_img);
    //echo $date_img[0]; // 2019
    //echo $data_img[1]; // 11

    if ($row > 0) {
        $image = "../../uploads/$date_img[0]/employee/" . $result['name_image'];
    } else {
        $image = "../images/user.png";
    }

    if ($objResult['id_employee']==$result_member['id_data_role']) {
        $border_td = 'border-top:1px orange solid;';
        $border_tr = 'border-bottom:1px solid orange;';
    } else {
        $border_td ='';
        $border_tr = '';
    }




    $num++;
    $i++;
    $output .= '<tr style="'.$border_tr.'">
              <td style="text-align: center; '.$border_td.'" >
                  <input type="checkbox" class="checkbox_remove" name="Chk[]" id="Chk' . $num . '" value="' . $objResult['id_employee'] . '">
              </td>

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
    $str_role    = "SELECT * FROM users,roles WHERE id_data_role = '".$objResult['id_employee']."' AND users.id_role = roles.id_role AND roles.tag = 'mod_employee'";
    $query_role = $db->Query($str_role);
    $result_role = mysqli_fetch_array($query_role);
    $output .= '
                ' . $result_role['user_name'] .' 
              </td>
              <td style="text-align: center; '.$border_td.'">
                ' . $objResult['position'] .' 
              </td>


              <td style="text-align: center; '.$border_td.' width: 150px; min-width:150px">
                <div class="btn-group">';

    if ($button_update=='') {
        $output .= '
            <button style="background-color: white; '.$button_update.'" type="button" class="edit-em btn btn-default" id="" data-id="' . $objResult['id_employee'] . '" >
                  <i class="fa fa-edit"></i>
            </button>';
    }

    if ($button_update=='') {
        if ($result_role['delete_datetime']==null) {
            $output .= '<button type="button" class="btn btn-default disabled-em" data-id="' . $objResult['id_employee'] . '" style="'.$button_update.'"><i class="fa fa-trash"></i></button>';
        } else {
            $output .= '<button type="button" class="btn btn-default enabled-em" data-id="' . $objResult['id_employee'] . '" style="'.$button_update.'"><i class="fa fa-eye-slash text-yellow"></i></button>';
        }
    }

    if ($button_delete_all=='') {
        $output .= '<button type="button" class="btn btn-default delete-em" data-id="' . $objResult['id_employee'] . '" style="'.$button_delete.'"><i class="fa fa-close"></i></button>';
    }
    $output .= '
                   
                </div>
              </td>

            </tr>
        ';
}
// $page_query = "SELECT * FROM mod_employee";
// $page_result = mysqli_query($objConnect,$page_query);
// $total_records = mysqli_num_rows($page_result);
// $total_pages = ceil($total_records/$record_per_page);
$start = $row_start + 1;

if (@$prev_page == 0) {
    $active_prev = "Disabled";
} else {
    $active_prev = '';
}
if (@$row_end == $num_rows) {
    $active_next = "Disabled";
} else {
    $active_next = '';
}
if ($row_objresult == 0) {
    $output .= '<tr>
                <td colspan="9" bgcolor="white">
                  <div class="row">
                    <div class="col-md-12" align="center">
                      <h3 style="color:gray; margin-bottom:-10px;">Oops! '.lang('ไม่พบข้อมูลที่คุณค้นหา', 'No data found for your search.').'</h3>
                      <a href="front-add.php" class="view_add">
                        <font style="font-size:122px; color:#ddd; padding-left:25px;"><i class="fa fa-user-plus"></i></font>
                        <h5 style="color:gray; margin-top:-30px;">'.lang('เพิ่มพนักงาใหม่', 'Add Employee').'</h3>
                      </a>
                    </div>
                  </div>
                </td>
              </tr>';
}
$output .= '</tbody>
          </table>
          </div>
          <input type="hidden" name="hdnCount" value="' . $num . '">

        <div class="box-footer">';
if ($num_rows > 0) {
    $output .= '
          <div class="row">
            <div class="col-sm-5">
              <font size="3">'.lang('รายชื่อที่', '').' ' . $start . ' '.lang('ถึง', 'To').' ' . $row_end . ' '.lang('จากทั้งหมด', 'From Total').' ' . $num_rows . '</font>
            </div>
            <div class="col-sm-7">
              <div class="btn-group" style="float:right; background-color:white;">
                <button type="button" class="btn btn-paginate previous btn-button pagination_link" id=' . $prev_page . ' ' . $active_prev . '
                  data-n-fast="' . $strKeyword_name_fast . '"
                  data-n="' . $strKeyword_name . '"
                  data-c="' . $strKeyword_code . '"
                  data-surname="'.$strKeyword_sur.'"
                  data-posi = "'.$strKeyword_posi.'"
                  data-s="' . $strKeyword_code_id . '"
                  data-d="' . $strKeyword_birthday . '"
                  data-sort="' . $strKeyword_sort . '">'.lang('ก่อนหน้า', 'Prev').'</button>';

    for ($a=1; $a<=$num_pages;$a++) {
        if ($a == $page) {
            $class = "page-active";
        } else {
            $class = "";
        }
        $output .= '<button type="button" class="btn btn-paginate btn-button pagination_link ' . $class . '" id=' . $a . '
                              data-n-fast="' . $strKeyword_name_fast . '"
                              data-n="' . $strKeyword_name . '"
                              data-c="' . $strKeyword_code . '"
                              data-surname="'.$strKeyword_sur.'"
                              data-posi = "'.$strKeyword_posi.'"
                              data-s="' . $strKeyword_code_id . '"
                              data-d="' . $strKeyword_birthday . '"
                              data-sort="' . $strKeyword_sort . '">' . $a . '</button>';
    }
    $output .= '<button type="button" class="btn btn-paginate next btn-button pagination_link" id=' . $next_page . ' ' . @$active_next . '
                  data-n-fast="' . $strKeyword_name_fast . '"
                  data-n="' . $strKeyword_name . '"
                  data-c="' . $strKeyword_code . '"
                  data-surname="'.$strKeyword_sur.'"
                  data-posi = "'.$strKeyword_posi.'"
                  data-codeid="' . $strKeyword_code_id . '"
                  data-d="' . $strKeyword_birthday . '"
                  data-authen="' . $strKeyword_authen . '"
                  data-sort="' . $strKeyword_sort . '">'.lang('ถัดไป', 'Next').'</button>
              </div>
            </div>
          </div>
        </div>';
} else {
    $output .= 'ไม่มีข้อมูล';
}
echo $output
?>


        <!--
        <div align="center">
        <div class="btn-group">';

        for($a=1; $a<=$total_pages;$a++)
        {
          $output .= '<button type="button" class="btn btn-default btn-flat pagination_link" id='.$a.'>'.$a.'</button>';
        }
$output .='</div></div></div>';
echo $output;-->
<!-----------------------------------------------------------------for dev in future  -->
<!-- <td style="text-align: center;">
                  <input type="text" class="level_slide" style="width: 30px; border: 1px solid #ccc; text-align: center; border-radius: 4px; height: 30px;" value="'.$objResult["level"].'" data-id="'.$objResult['id_article'].'" onkeypress="return isNumber(event)" />
              </td>

    <th style="text-align: center;">ลำดับ</th>

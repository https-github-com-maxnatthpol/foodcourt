<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SESSION['admin'] != '1') {
    $null_del = ' ';
} else {
    $null_del = ' ';
}

//ชุดเดิม
//if ($_SESSION['admin'] != '1') {
//    $null_del = ' AND users.delete_datetime IS NULL';
//} else {
//    $null_del = ' AND users.delete_datetime IS NULL';
//}

require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';
$db = new DB();

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
                            "; #ไปตรวจสอบที่ php แทน
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
// if(isset($_GET["cat"]))
// {
//   $strKeyword = $_GET["cat"];
// }

$objQuery = $db->Query($strSQL);
$num_rows = mysqli_num_rows($objQuery);

$per_page = 50;
$page     = 1;

if (isset($_POST["page"])) {
    $page = $db->clear($_POST["page"]);
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
    $strKeyword_sort = $db->clear($_POST['sort']);
    // set POST
    if ($_POST['sort'] == 'n') {
        $strSQL .= " ORDER BY username ASC LIMIT $row_start, $per_page";
    } elseif ($_POST['sort'] == 'n1') {
        $strSQL .= " ORDER BY username DESC LIMIT $row_start, $per_page";
    } elseif ($_POST['sort'] == 's') {
        $strSQL .= " ORDER BY surname DESC LIMIT $row_start, $per_page";
    } elseif ($_POST['sort'] == 's1') {
        $strSQL .= " ORDER BY surname ASC LIMIT $row_start, $per_page";
    } elseif ($_POST['sort'] == 'u') {
        $strSQL .= " ORDER BY user_name ASC LIMIT $row_start, $per_page";
    } elseif ($_POST['sort'] == 'u1') {
        $strSQL .= " ORDER BY user_name DESC LIMIT $row_start, $per_page";
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
                    <tr style="vertical-align: top;">
                      <th style="text-align: center; min-width:50px; width:50px; padding-top: 10px;">
					  <input class="ClickCheckAll filled-in chk-col-light-blue" type="checkbox" name="CheckAll" id="CheckAll" value="Y" onClick="ClickCheckAll(this);"><label for="CheckAll"></label>
					  </th>
                      <th style="padding-top: 10px;" colspan="2">เลือกทั้งหมด</th>
                      <th style="text-align:center; padding-top: 10px;">ชื่อ-นามสกุล</th>
                      <th style="text-align:center; padding-top: 10px;">ชื่อผู้ใช้งาน</th>
                      <th style="text-align:center; padding-top: 10px;">ตำแหน่ง</th>
                      <th style="text-align:center; padding-top: 10px;">ควบคุม</th>
                    </tr>';
}
$output .= '
                  </thead>
                  <tbody>
        ';
$i   = $row_start;
$num = 0;
while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
    $str    = "SELECT * FROM mod_employee_image WHERE id_employee = '" . $objResult['id_employee'] . "'";
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

    if ($objResult['id_employee'] == $result_member['id_data_role']) {
        $border_td = 'border-top:1px orange solid;';
        $border_tr = 'border-bottom:1px solid orange;';
    } else {
        $border_td = '';
        $border_tr = '';
    }




    $num++;
    $i++;
    $output .= '<tr style="' . $border_tr . '; vertical-align: top;" >
              <td style="text-align: center; ' . $border_td . '; padding-top: 10px;" >
                  <input type="checkbox" class="checkbox_remove filled-in chk-col-light-blue" name="Chk[]" id="Chk' . $num . '" value="' . $objResult['id_employee'] . '"><label for="Chk' . $num . '"></label>
              </td>

               <td width="3%" style="' . $border_td . '; padding-top: 10px;">
                ' . $i . '
              </td>

              <td style="width:10px; ' . $border_td . '; padding-top: 10px;">
                <div class="image-employee-list">
                  <img src="' . $image . '">
                </div>
              </td>
              <td style="text-align:center; ' . $border_td . '; padding-top: 10px;">
                <div id="test" >
                  ' . $objResult['username'] . '  ' . $objResult['surname'] . '<br>
                </div>';

    $output .= '</td>';

    $output .= '
              <td style="text-align:center; ' . $border_td . '; padding-top: 10px;">';
    $str_role    = "SELECT * FROM users WHERE id_data_role = '" . $objResult['id_employee'] . "' ";
    $query_role = $db->Query($str_role);
    $result_role = mysqli_fetch_array($query_role);
    $output .= '
                ' . $result_role['user_name'] . ' 
              </td>
              <td style="text-align: center; ' . $border_td . '; padding-top: 10px;">
                ' . $objResult['position'] . ' 
              </td>


              <td style="text-align: center; ' . $border_td . ' width: 150px; min-width:150px; padding-top: 10px;">
                <div class="btn-group">';

    if ($button_update == '') {
        $output .= '
            <button style=" ' . $button_update . '" type="button" class="edit-em btn btn-warning" id="" data-id="' . $objResult['id_employee'] . '" >
                  <i class="fa fa-edit"></i>
            </button>';
    }

    if ($button_delete == '') {
        if ($result_role['delete_datetime'] == null) {
            $output .= '<button type="button" class="btn btn-danger disabled-em" data-id="' . $objResult['id_employee'] . '" style="' . $button_delete . '"><i class="mdi mdi-delete-empty"></i></button>';
        } else {
            $output .= '<button type="button" class="btn btn-default enabled-em" data-id="' . $objResult['id_employee'] . '" style="' . $button_delete . '"><i class="fa fa-eye-slash" style="color: #ffb22b"></i></button>';
        }
    }

    if ($button_delete_all == '') {
        $output .= '<button type="button" class="btn btn-dark delete-em" data-id="' . $objResult['id_employee'] . '" style="' . $button_delete_all . '"><i class="fa fa-times"></i></button>';
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
          <input type="hidden" name="hdnCount" value="' . $num . '">

        <div class="box-footer">';
if ($num_rows > 0) {
    $output .= '
          <div class="row">
            <div class="col-sm-5">
              <font size="3">รายชื่อที่ ' . $start . ' ถึง ' . $row_end . ' จากทั้งหมด ' . $num_rows . '</font>
            </div>
            <div class="col-sm-7">
              <div class="btn-group" style="float:right; background-color:white;">
                <button type="button" class="btn btn-paginate previous btn-button pagination_link" id=' . $prev_page . ' ' . $active_prev . '
                  data-n-fast="' . $strKeyword_name_fast . '"
                  data-n="' . $strKeyword_name . '"
                  data-c="' . $strKeyword_code . '"
                  data-surname="' . $strKeyword_sur . '"
                  data-posi = "' . $strKeyword_posi . '"
                  data-s="' . $strKeyword_code_id . '"
                  data-d="' . $strKeyword_birthday . '"
                  data-sort="' . $strKeyword_sort . '">ก่อนหน้า</button>';

    for ($a = 1; $a <= $num_pages; $a++) {
        if ($a == $page) {
            $class = "page-active";
        } else {
            $class = "";
        }
        $output .= '<button type="button" class="btn btn-paginate btn-button pagination_link ' . $class . '" id=' . $a . '
                              data-n-fast="' . $strKeyword_name_fast . '"
                              data-n="' . $strKeyword_name . '"
                              data-c="' . $strKeyword_code . '"
                              data-surname="' . $strKeyword_sur . '"
                              data-posi = "' . $strKeyword_posi . '"
                              data-s="' . $strKeyword_code_id . '"
                              data-d="' . $strKeyword_birthday . '"
                              data-sort="' . $strKeyword_sort . '">' . $a . '</button>';
    }
    $output .= '<button type="button" class="btn btn-paginate next btn-button pagination_link" id=' . $next_page . ' ' . @$active_next . '
                  data-n-fast="' . $strKeyword_name_fast . '"
                  data-n="' . $strKeyword_name . '"
                  data-c="' . $strKeyword_code . '"
                  data-surname="' . $strKeyword_sur . '"
                  data-posi = "' . $strKeyword_posi . '"
                  data-codeid="' . $strKeyword_code_id . '"
                  data-d="' . $strKeyword_birthday . '"
                  data-authen="' . $strKeyword_authen . '"
                  data-sort="' . $strKeyword_sort . '">ถัดไป</button>
              </div>
            </div>
          </div>
        </div>';
} else {
//    $output .= 'ไม่มีข้อมูล';
	$output .= '';
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
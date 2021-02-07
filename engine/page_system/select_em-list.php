<?php
require_once '../lib/connect.php';
$db = new DB();

/*$str_member = "SELECT * FROM tbl_member WHERE id_member = '".$_SESSION['user_id']."'";
$query_member = mysqli_query($objConnect,$str_member);
$result_member = mysqli_fetch_array($query_member);*/

//ini_set('display_errors', 1);
//error_reporting(~0);
$output = '';
$str_tbl = "SHOW TABLES LIKE 'mod_employee'";
$query_tbl = $db->Query($str_tbl);
if ($num = mysqli_num_rows($query_tbl) != 1) {
    $output .= 'ไม่มีตารางข้อมูลพนักงาน';
} else {
    $strSQL = "SELECT mod_employee.*, users.* FROM mod_employee,users WHERE mod_employee.id_employee = users.id_role ORDER BY id_employee";

    $objQuery = $db->Query($strSQL);

    $num_rows = mysqli_num_rows($objQuery);

    $objQuery      = mysqli_query($objConnect, $strSQL) or die(mysqli_error());

    $row_objresult = mysqli_num_rows($objQuery);
    $output        = '';
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
                  <tbody id="table-search-addview">
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




        $num++;
        $i++;
        $output .= '<tr style="'.$border_tr.'" class="show-tr-em-add">

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
                  ' . $objResult['forename'] .'  ' . $objResult['surname'] . '<br>
                </div>';
          
        $output .= '</td>';
 
        $output .= '
              <td style="text-align:center; '.$border_td.'">';
        $str_role    = "SELECT * FROM users WHERE id_role = '".$objResult['id_employee']."' "; /*AND data_role = 'mod_employee' อันเก่า*/
        $query_role = $db->Query($str_role);
        $result_role = mysqli_fetch_array($query_role);
        $output .= '
                ' . $result_role['user_name'] .' 
              </td>
              <td style="text-align: center; '.$border_td.'">
                ' . $objResult['position'] .' 
              </td>

              <td style="text-align: center; '.$border_td.'">';
        $output .= '      <label><span class="btn btn-default btn-sm set_authen authen'.$i.'" data-id="'.$i.'">Manage 
                             <input type="radio" name="general'.$i.'" value="1-'.$result['id_employee'].'" style="display:none;"> </span></label>
                      <label><span class="btn btn-default btn-sm set_authen authen'.$i.'" data-id="'.$i.'">Write 
                             <input type="radio" name="general'.$i.'" value="2-'.$result['id_employee'].'" style="display:none;"> </span></label>
                      <label><span class="btn btn-default btn-sm set_authen authen'.$i.'" data-id="'.$i.'">Read 
                             <input type="radio" name="general'.$i.'" value="3-'.$result['id_employee'].'" style="display:none;"> </span></label>
                      <label><span class="btn btn-default btn-sm set_authen authen'.$i.' authen_acitve-block" data-id="'.$i.'">Disable 
                             <input type="radio" name="general'.$i.'" value="0-'.$result['id_employee'].'" checked style="display:none;"> </span></label> 
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
          <input type="hidden" name="hdnCount_em_add" value="'.$num.'">
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

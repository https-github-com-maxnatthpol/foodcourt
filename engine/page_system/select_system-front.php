<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    if ($id=='') {
        $text = '';
    } else {
        $text = 'AND type ='."'$id'";
    }
} else {
    $text = '';
}
require_once '../lib/connect.php';
$db = new DB();

$strSQL = "SELECT * FROM system WHERE level = '1' ".$text." ORDER BY sort ASC ";
$objQuery = $db->Query($strSQL);

$output = '';
$output .='<div style="overflow-x:auto; max-height:530px; ">
            <table class="table" style="margin-bottom:0" id="table-search">';
$output .= '<thead>
                <tr style="background-color:#dddddd !important; color:black !important; ">
                 	<th style="text-align: center; min-width:20px; width:20px; border-bottom:none;">
					<input class="ClickCheckAll filled-in chk-col-light-blue" type="checkbox" name="CheckAll" id="CheckAll" value="Y" onClick="ClickCheckAll(this);"><label for="CheckAll"></label>
					</th>
                    <th style="min-width:250px; width:80%; border-bottom:none; vertical-align: top;">เลือกทั้งหมด</th>
                    <th style="text-align: center; min-width:100px; width:150px; border-bottom:none; vertical-align: top;">ลำดับ</th>
                    <th style="text-align: center; min-width:100px; width:100px; border-bottom:none; vertical-align: top;">ควบคุม</th>
                </tr>
            </thead>
            <tbody>
 		';
        $i=0;
while ($objResult = mysqli_fetch_array($objQuery)) {
    $i++;
    if ($objResult['icon']=='') {
        $icon = '<i class="mdi mdi-checkbox-blank-circle-outline" style="color: #ffb22b;"></i>';
    } else {
        $icon = $objResult['icon'];
    }
    $output .= '<tr class="show-tr">

              <td style="text-align: center;">
			  	<input type="checkbox" name="Chk[]" id="Chk'.$i.'" value="'.$objResult['id_system'].'" class="checkbox_remove filled-in chk-col-light-blue" />
                                    <label for="Chk'.$i.'"></label>
                
              </td>

              <td>
              '.$icon.'&emsp;'.$objResult["name_system"].'
              </td>
              <td align="center">
              <input type="text" class="form-control sort_level" data-id="'.$objResult['id_system'].'" 
                                                                 data-type="'.$objResult['type'].'" 
                                                                 value="'.$objResult["sort"].'" 
                                                                 style="width:35px; min-width:35px; height:30px; text-align:center; border-radius:4px; padding:2px;">
              </td>
              <td style="text-align: center;">
                <div class="btn-group"> 
                    <button type="button" class="btn btn-secondary edit-system btn-sm" data-id="'.$objResult['id_system'].'"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-secondary delete-system btn-sm" style="background-color: red;" data-id="'.$objResult['id_system'].'"><i class="mdi mdi-delete-empty" style="color: white;" ></i></button>
                </div>
              </td>

            </tr>';
    //------------------------------------------------------------------------------------------------sub 2------------------------------------------------------------------------------------
    $strSQL1 = "SELECT * FROM system WHERE level = '2' AND groups = '".$objResult['id_system']."' ORDER BY sort ASC";
    $objQuery1 = $db->Query($strSQL1);
    while ($objResult1 = mysqli_fetch_array($objQuery1)) {
        if ($objResult1['icon']=='') {
            $icon1 = '<i class="mdi mdi-checkbox-blank-circle-outline" style="color: #ffb22b;"></i>';
        } else {
            $icon1 = $objResult1['icon'];
        }
        $i++;
        $output .= '<tr style="background:#fbfcfd;"  class="show-tr">

              <td style="text-align: center;">
                <input type="checkbox" name="Chk[]" id="Chk'.$i.'" value="'.$objResult1['id_system'].'" class="checkbox_remove filled-in chk-col-light-blue" />
                <label for="Chk'.$i.'"></label>
              </td>
             
              <td>
              <div class="input-group">
                <span class="input-group-addon" style="border:none; background:transparent; padding-left:0;">
                  <i class="fas fa-level-up-alt" id="share"></i>
                </span>
                &nbsp;'.$icon1.'&emsp;'.$objResult1["name_system"].'
              </div>
              </td>
              <td align="center">
                <input type="text" class="form-control sort_level"  data-id="'.$objResult1['id_system'].'"  
                                                                    data-type="'.$objResult1['type'].'" 
                                                                    value="'.$objResult1["sort"].'" 
                                                                    style="width:35px; min-width:35px; height:30px; text-align:center; border-radius:4px; padding:2px;">
              </td>
              <td style="text-align: center;">
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary edit-system btn-sm" data-id="'.$objResult1['id_system'].'"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-secondary delete-system btn-sm" style="background-color: red; data-id="'.$objResult1['id_system'].'"><i class="mdi mdi-delete-empty" style="color: white;"></i></button>
                </div>
              </td>

            </tr>';
        //-------------------------------------------------------------------------------------------sub 3------------------------------------------------------------------------------------
        $strSQL2 = "SELECT * FROM system WHERE level = '3' AND groups = '".$objResult1['id_system']."' ORDER BY sort ASC";
        $objQuery2 = $db->Query($strSQL2);
        while ($objResult2 = mysqli_fetch_array($objQuery2)) {
            if ($objResult2['icon']=='') {
                $icon2 = '<i class="mdi mdi-checkbox-blank-circle-outline" style="color: #ffb22b;"></i>';
            } else {
                $icon2 = $objResult2['icon'];
            }
            $i++;
            $output .= '<tr style="background:#fcfcfc;"  class="show-tr">

              <td style="text-align: center;">
			  	<input type="checkbox" name="Chk[]" id="Chk'.$i.'" value="'.$objResult2['id_system'].'" class="checkbox_remove filled-in chk-col-light-blue" />
                <label for="Chk'.$i.'"></label>
              </td>
             
              <td>
              <div class="input-group" style="padding-left:18px;">
                <span class="input-group-addon" style="border:none; background:transparent;">
                  <i class="fas fa-level-up-alt" id="share"></i>
                </span>
                &nbsp;'.$icon2.'&emsp;'.$objResult2["name_system"].'
              </div>
              </td>
              <td align="center">
                <input type="text" class="form-control sort_level"  data-id="'.$objResult2['id_system'].'" 
                                                                    data-type="'.$objResult2['type'].'" 
                                                                    value="'.$objResult2["sort"].'" 
                                                                    style="width:35px; min-width:35px; height:30px; text-align:center; border-radius:4px; padding:2px;">
              </td>
              <td style="text-align: center;">
                <div class="btn-group">
                    <button type="button" class="btn btn-secondary edit-system btn-sm" data-id="'.$objResult2['id_system'].'"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-secondary delete-system btn-sm" style="background-color: red; data-id="'.$objResult2['id_system'].'"><i class="mdi mdi-delete-empty" style="color: white;"></i></button>
                </div>
              </td>

            </tr>';
        }
    }
}
$output .='<tbody>
		</table>
    </div>
		<input type="hidden" name="hdnCount" value="'.$i.'">
		';
echo $output;
?>
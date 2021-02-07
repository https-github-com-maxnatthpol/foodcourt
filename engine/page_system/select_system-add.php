<?php
require_once '../lib/connect.php';
$db = new DB();

$output ='';
$output .= '
        <select id="basic2" name="sub_system" class="selectpicker show-tick form-control" data-live-search="true">';

$strSQL = "SELECT * FROM system WHERE level = '1'";
$objQuery = $db->Query($strSQL);
$num_row = mysqli_num_rows($objQuery);
while ($objResult = mysqli_fetch_array($objQuery)) {
    $output .= '<option value="1-'.$objResult["id_system"].'-'.$objResult['type'].'">'.$objResult["name_system"]. '</option>
            ';
    $strSQL1 = "SELECT * FROM system WHERE level = '2' AND groups = '".$objResult['id_system']."'";
    $objQuery1 = $db->Query($strSQL1);
    while ($objResult1 = mysqli_fetch_array($objQuery1)) {
        $output .= '<option value="2-'.$objResult1["id_system"].'-'.$objResult1['type'].'">- '.$objResult1["name_system"].'</option>
                  ';
        $strSQL2 = "SELECT * FROM system WHERE level = '3' AND groups = '".$objResult1['id_system']."'";
        $objQuery2 = $db->Query($strSQL2);
        while ($objResult2 = mysqli_fetch_array($objQuery2)) {
            $output .= '<option value="'.$objResult2["id_system"].'" disabled>&nbsp;&nbsp;- '.$objResult2["name_system"].'</option>
                              ';
        }
    }
}
    if ($num_row<=0) {
        $output .= '<option>ไม่มีข้อมูลในระบบ</option>';
    }
    $output .= '</select>';
    echo $output;
?>   
<script type="text/javascript">
 $(document).ready(function(){
      $('#basic2').selectpicker({
        liveSearch: true,
        maxOptions: 1
      });
    });
</script>
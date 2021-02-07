<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';


if (isset($_POST['form'])) {
    if ($_POST['form']=="select_table_front_manage") {
        select_table_front_manage();
    }
} else {
}


function select_table_front_manage()
{
    $db = new DB();
    $name_arr = ['','','','','',''
        ,'keyworde_en','description_en','title_en','address_en','name_en','logo_img','email','keyworde_th','description_th','title_th'
        ,'address_th','name_th','logo_img2','telephone','random_banner','head_title','head_title_mini','merchantid','google_map_key','email_vc','email_group','telephone2','detail_th','detail_en'];
    $value = [];

    for ($i=0; $i < count($name_arr) ; $i++) {
        $strSQL = "SELECT `id`,`value` FROM `settings` WHERE `name` = '".$name_arr[$i]."'";
        $objQuery = $db->Query($strSQL);
        $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
        if (isset($objResult["id"])) {
            $value[] = $objResult["value"];
        } else {
            $value[] = "";
        }
    }
    //var_dump($value);
    header('Content-Type: application/json');
    echo json_encode(array(
    'keyworde_en'=>$value[6],'description_en'=>$value[7],'title_en'=>$value[8],
    'address_en'=>$value[9],'name_en'=>$value[10],'logo_img'=>$value[11],'email'=>$value[12],'keyworde_th'=>$value[13],
    'description_th'=>$value[14],'title_th'=>$value[15],'address_th'=>$value[16],'name_th'=>$value[17],'logo_img2'=>$value[18],
    'telephone'=>$value[19],'random_banner'=>$value[20],'head_title'=>$value[21],'head_title_mini'=>$value[22]
    ,'merchantid'=>$value[23],'google_map_key'=>$value[24],'email_vc'=>$value[25],'email_group'=>$value[26],'telephone2'=>$value[27],'detail_th'=>$value[28],'detail_en'=>$value[29]));
}
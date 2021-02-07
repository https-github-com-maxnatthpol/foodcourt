<?php
require_once '../lib/connect.php';

function getEmployee($data)
{
    $db = new DB();
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
    if (isset($data['name']) && $data['name'] != '') {
        $strKeyword_name_fast = $db->clear($data["name"]);
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
                            AND users.delete_datetime IS NULL
                            "; #ไปตรวจสอบที่ php แทน                                                   
    } elseif (isset($data['name_em'])) {
        $strKeyword_name = $db->clear($data["name_em"]);
        $strKeyword_sur  = $db->clear($data["sur_em"]);
        $strKeyword_birthday = $db->clear($data["birthday"]);
        $strKeyword_posi     = $db->clear($data["posi_em"]);
        $strKeyword_code_id = $db->clear($data['code_id_em']);
        $strSQL          = "SELECT mod_employee.*, users.*  
                            FROM mod_employee
                            LEFT JOIN users ON mod_employee.id_employee = users.id_data_role
                            WHERE mod_employee.username   LIKE '%" . $strKeyword_name . "%'
                            AND mod_employee.surname      LIKE '%" . $strKeyword_sur . "%'
                            AND mod_employee.code_id      LIKE '%" . $strKeyword_code_id . "%'
                            AND mod_employee.birthday     LIKE '%" . $strKeyword_birthday . "%'
                            AND mod_employee.position     LIKE '%" . $strKeyword_posi . "%'
                            AND users.delete_datetime IS NULL
                            ";
    } else {
        $strSQL = "SELECT mod_employee.*, users.* FROM mod_employee,users WHERE mod_employee.id_employee = users.id_data_role AND users.delete_datetime IS NULL";
    }


    $objQuery = $db->Query($strSQL);
    return $objQuery;
}
<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

require_once '../lib/connect.php';

if ($_POST['form'] == 'check_user_ex') {
    doCheckuser();
    exit;
} elseif ($_POST['form'] == 'add') {
    doAddemployee();
    exit;
} elseif ($_POST['form'] == 'edit') {
    doEdit();
    exit;
} elseif ($_POST['form'] == 'disabled') {
    doDisabled();
    exit;
} elseif ($_POST['form'] == 'enabled') {
    doenabled();
    exit;
} elseif ($_POST['form'] == 'Multivisible') {
    doMultivisible();
    exit;
} elseif ($_POST['form'] == 'del') {
    doDel();
    exit;
}

function doCheckuser()
{
    $db = new DB();
    header('Content-Type: application/json');
    $str = "SELECT id_user,user_name FROM users WHERE user_name = '" . $db->clear($_POST['username']) . "'";
    $query = $db->Query($str);
    $num_row = mysqli_num_rows($query);
    $fetch = mysqli_fetch_array($query);
    if ($num_row > 0) {
        echo json_encode(array('status' => '0', 'message' => "Successful!"));
    } else {
        echo json_encode(array('status' => '1', 'message' => $str));
    }
}

function doDisabled()
{
    $db = new DB();
    header('Content-Type: application/json');
    date_default_timezone_set("Asia/Bangkok");
    $date_regdate = date("Y-m-d H:i:s");

    $str = "UPDATE users SET delete_datetime = '" . $date_regdate . "' WHERE id_data_role = '" . $db->clear($_POST['id']) . "'";
    $query = $db->Query($str);
    if ($query) {
        echo json_encode(array('status' => '0', 'message' => "Successful!"));
    } else {
        echo json_encode(array('status' => '1', 'message' => $str));
    }
}

function doenabled()
{
    $db = new DB();
    header('Content-Type: application/json');
    date_default_timezone_set("Asia/Bangkok");
    $date_regdate = date("Y-m-d H:i:s");

    $str = "UPDATE users SET delete_datetime = NULL WHERE id_data_role = '" . $db->clear($_POST['id']) . "' ";
    $query = $db->Query($str);
    if ($query) {
        echo json_encode(array('status' => '0', 'message' => "Successful!"));
    } else {
        echo json_encode(array('status' => '1', 'message' => $str));
    }
}

function doMultivisible()
{
    $db = new DB();
    header('Content-Type: application/json');
    date_default_timezone_set("Asia/Bangkok");
    $date_regdate = date("Y-m-d H:i:s");

    if ($_POST['change'] == 'Disabled') {
        for ($i = 0; $i < count($_POST["Chk"]); $i++) {
            $strSQL = "UPDATE users SET delete_datetime = '" . $date_regdate . "' WHERE id_data_role = '" . $_POST["Chk"][$i] . "' ";
            $objQuery = $db->Query($strSQL);
        }
        if ($objQuery) {
            echo json_encode(array('status' => '0', 'message' => "Successful!"));
        } else {
            echo json_encode(array('status' => '1', 'message' => $strSQL));
        }
    } elseif ($_POST['change'] == 'Enabled') {
        for ($i = 0; $i < count($_POST["Chk"]); $i++) {
            $strSQL = "UPDATE users SET delete_datetime = NULL WHERE id_data_role = '" . $_POST["Chk"][$i] . "' ";
            $objQuery = $db->Query($strSQL);
        }
        if ($objQuery) {
            echo json_encode(array('status' => '0', 'message' => "Successful!"));
        } else {
            echo json_encode(array('status' => '1', 'message' => $strSQL));
        }
    } else {
        for ($i = 0; $i < count($_POST["Chk"]); $i++) {
            $strSQL = "SELECT * FROM mod_employee_image WHERE id_employee = '" . $_POST["Chk"][$i] . "'";
            $objQuery = $db->Query($strSQL);
            $objResult = mysqli_fetch_array($objQuery);
            $numrow = mysqli_num_rows($objQuery);

            $date_img  = $objResult['date_image'];
            $date_img = explode("-", $date_img);
            //echo $date_img[0]; // 2019
            //echo $data_img[1]; // 11
            if ($numrow > 0) {
                $file = iconv("utf-8", "tis-620", $objResult["name_image"]);
                if (unlink("../../uploads/$date_img[0]/employee/" . $file)) {
                }
            }

            $str_del_member = "DELETE FROM users WHERE id_data_role = '" . $_POST["Chk"][$i] . "' "; //AND data_role = 'mod_employee' อันเก่า
            $query_del_member = $db->Query($str_del_member);

            $strSQL = "DELETE FROM mod_employee WHERE id_employee = '" . $_POST["Chk"][$i] . "' ";
            $objQuery = $db->Query($strSQL);
        }
        if ($objQuery) {
            echo json_encode(array('status' => '0', 'message' => "Successful!"));
        } else {
            echo json_encode(array('status' => '1', 'message' => $strSQL));
        }
    }
}

function doAddemployee()
{
    $db = new DB();
    date_default_timezone_set("Asia/Bangkok");

    $id_employee = setMD5();
    $id_extends_roles = setMD5();
    $id_extends = $id_employee;
    $pass = password_hash($_POST['employee-pass'], PASSWORD_DEFAULT);

    $date_regdate = date("Y-m-d H:i:s");

    $strSQL = "INSERT INTO mod_employee";
    $strSQL .= "(id_employee,username,surname,username_en,surname_en,birthday,position,position_en,code_id,detail_employee,detail_employee_en,email,tel)";
    $strSQL .= "VALUES ";
    $strSQL .= "('" . $id_employee . "','" . $_POST['employee-name'] . "','" . $_POST['employee-sur'] . "','"
        . $_POST['employee-name-en'] . "','" . $_POST['employee-sur-en'] . "','" . $_POST['employee-date'] . "','" . $_POST['employee-opti']
        . "','" . $_POST['employee-opti-en'] . "','" . $_POST['employee-code'] . "','" . $_POST['employee-detail'] . "','" . $_POST['employee-detail-en']
        . "','" . $_POST['employee-email'] . "','" . $_POST['tel'] . "')";
    $objQuery = $db->Query($strSQL);
    if ($objQuery) {
        echo "Add done";

        $id_user = setMD5();

        $strRole = "SELECT * FROM roles where delete_datetime is null and tag = 'mod_employee' ORDER BY update_datetime limit 1";
        $role = $db->Query($strRole);
        $result_role = mysqli_fetch_array($role);
        if (isset($result_role["id_role"])) {
            $id_extends_roles = $result_role["id_role"];
        } else {
            $id_extends_roles = "";
        }
        //$id_extends_roles =isset($role)?$role["	id_role"]:"";

        /*member_session_update, = ''*/
        $strSQL_user = "INSERT INTO users";
        $strSQL_user .= "(id_user,user_name,user_password,create_datetime,admin,id_data_role,token,id_role,user_email)";
        $strSQL_user .= "VALUES";
        $strSQL_user .= "('" . $id_user . "','" . $_POST['employee-user'] . "','" . $pass . "','" . $date_regdate . "','0','" . $id_extends . "','','" . $id_extends_roles . "','" . $_POST['employee-email'] . "')";

        $userquery = $db->Query($strSQL_user);
        if ($userquery) {
            echo "Add user";
        } else {
            echo "ERR user";
        }
    } else {
        echo "Error Add [" . $strSQL . "]";
    }

    $dateYear =  "" . date("Y") . "";
    $file = "../../uploads";
    $strPath = "uploads/$dateYear/employee/";
    if (is_dir($file)) {
        //echo ("$file มีไฟล์นี้อยู่แล้ว");
        $file_dateYear = "../../uploads/$dateYear";
        if (is_dir($file_dateYear)) {
            $file_employee = "../../uploads/$dateYear/employee";
            if (is_dir($file_employee)) {
                if ($_FILES['image_employee']['name'] != '') {
                    $namefile = $_FILES["image_employee"]["name"];
                    $sur = strrchr($namefile, "."); //ตัดนามสกุลไฟล์เก็บไว้
                    $name = "EM-" . (Date("dmy") . rand('1000', '9999') . $sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล

                    $target = "../../uploads/$dateYear/employee/" . $name;
                    $newname = $name;

                    if (file_exists($target)) {
                        $oldname = pathinfo($name, PATHINFO_FILENAME);
                        $ext = pathinfo($name, PATHINFO_EXTENSION);
                        $newname = $oldname;
                        do {
                            $r = rand(1000, 9999);
                            $newname = $oldname . "-" . $r . ".$ext";
                            $target = "../../uploads/$dateYear/employee/" . $newname;
                        } while (file_exists($target));
                    }

                    if (copy($_FILES["image_employee"]["tmp_name"], iconv('UTF-8', 'windows-874', "../../uploads/$dateYear/employee/" . $newname))) {
                        echo "Copy/Upload Complete<br>";

                        $size = $_FILES['image_employee']['size'];
                        $strSQL = "INSERT INTO mod_employee_image";
                        $strSQL .= "(name_image,size,date_image,id_employee,directory)";
                        $strSQL .= "VALUES ";
                        $strSQL .= "('$newname','$size','$date_regdate','$id_extends','$strPath')";
                        $objQuery = $db->Query($strSQL);
                    } else {
                        echo "Copy/upload error<br>";
                    }
                    if ($objQuery) {
                        echo "Add done.[" . $strSQL . "]";
                    } else {
                        echo "Error Add [" . $strSQL . "]";
                    }
                }
            } else {
                //echo ("$file ไม่มีไฟล์นี้อยู่");
                $flgCreate_em = mkdir("../../uploads/$dateYear/employee");
                if ($flgCreate_em) {
                    //echo " ไฟล์ได้สร้างขึ้นแล้ว";
                    if ($_FILES['image_employee']['name'] != '') {
                        $namefile = $_FILES["image_employee"]["name"];
                        $sur = strrchr($namefile, "."); //ตัดนามสกุลไฟล์เก็บไว้
                        $name = "EM-" . (Date("dmy") . rand('1000', '9999') . $sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
                        $target = "../../uploads/$dateYear/employee/" . $name;
                        $newname = $name;

                        if (file_exists($target)) {
                            $oldname = pathinfo($name, PATHINFO_FILENAME);
                            $ext = pathinfo($name, PATHINFO_EXTENSION);
                            $newname = $oldname;
                            do {
                                $r = rand(1000, 9999);
                                $newname = $oldname . "-" . $r . ".$ext";
                                $target = "../../uploads/$dateYear/employee/" . $newname;
                            } while (file_exists($target));
                        }

                        if (copy($_FILES["image_employee"]["tmp_name"], iconv('UTF-8', 'windows-874', "../../uploads/$dateYear/employee/" . $newname))) {
                            echo "Copy/Upload Complete<br>";

                            $size = $_FILES['image_employee']['size'];
                            $strSQL = "INSERT INTO mod_employee_image";
                            $strSQL .= "(name_image,size,date_image,id_employee,directory)";
                            $strSQL .= "VALUES ";
                            $strSQL .= "('$newname','$size','$date_regdate','$id_extends','$strPath')";
                            $objQuery = $db->Query($strSQL);
                        } else {
                            echo "Copy/upload error<br>";
                        }
                        if ($objQuery) {
                            echo "Add done.[" . $strSQL . "]";
                        } else {
                            echo "Error Add [" . $strSQL . "]";
                        }
                    }
                } else {
                    //echo " ไม่สามารถสร้างไฟล์ขึ้นได้";
                }
            }
        } else {
            //echo ("$file ไม่มีไฟล์นี้อยู่");
            $flgCreate = mkdir("../../uploads/$dateYear");
            if ($flgCreate) {
                //echo " ไฟล์ได้สร้างขึ้นแล้ว";
                $file_employee = "../../uploads/$dateYear/employee";
                if (is_dir($file_employee)) {
                    if ($_FILES['image_employee']['name'] != '') {
                        $namefile = $_FILES["image_employee"]["name"];
                        $sur = strrchr($namefile, "."); //ตัดนามสกุลไฟล์เก็บไว้
                        $name = "EM-" . (Date("dmy") . rand('1000', '9999') . $sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
                        $target = "../../uploads/$dateYear/employee/" . $name;
                        $newname = $name;

                        if (file_exists($target)) {
                            $oldname = pathinfo($name, PATHINFO_FILENAME);
                            $ext = pathinfo($name, PATHINFO_EXTENSION);
                            $newname = $oldname;
                            do {
                                $r = rand(1000, 9999);
                                $newname = $oldname . "-" . $r . ".$ext";
                                $target = "../../uploads/$dateYear/employee/" . $newname;
                            } while (file_exists($target));
                        }

                        if (copy($_FILES["image_employee"]["tmp_name"], iconv('UTF-8', 'windows-874', "../../uploads/$dateYear/employee/" . $newname))) {
                            echo "Copy/Upload Complete<br>";

                            $size = $_FILES['image_employee']['size'];
                            $strSQL = "INSERT INTO mod_employee_image";
                            $strSQL .= "(name_image,size,date_image,id_employee,directory)";
                            $strSQL .= "VALUES ";
                            $strSQL .= "('$newname','$size','$date_regdate','$id_extends','$strPath')";
                            $objQuery = $db->Query($strSQL);
                        } else {
                            echo "Copy/upload error<br>";
                        }
                        if ($objQuery) {
                            echo "Add done.[" . $strSQL . "]";
                        } else {
                            echo "Error Add [" . $strSQL . "]";
                        }
                    }
                } else {
                    //echo ("$file ไม่มีไฟล์นี้อยู่");
                    $flgCreate_em = mkdir("../../uploads/$dateYear/employee");
                    if ($flgCreate_em) {
                        //echo " ไฟล์ได้สร้างขึ้นแล้ว";
                        if ($_FILES['image_employee']['name'] != '') {
                            $namefile = $_FILES["image_employee"]["name"];
                            $sur = strrchr($namefile, "."); //ตัดนามสกุลไฟล์เก็บไว้
                            $name = "EM-" . (Date("dmy") . rand('1000', '9999') . $sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
                            $target = "../../uploads/$dateYear/employee/" . $name;
                            $newname = $name;

                            if (file_exists($target)) {
                                $oldname = pathinfo($name, PATHINFO_FILENAME);
                                $ext = pathinfo($name, PATHINFO_EXTENSION);
                                $newname = $oldname;
                                do {
                                    $r = rand(1000, 9999);
                                    $newname = $oldname . "-" . $r . ".$ext";
                                    $target = "../../uploads/$dateYear/employee/" . $newname;
                                } while (file_exists($target));
                            }

                            if (copy($_FILES["image_employee"]["tmp_name"], iconv('UTF-8', 'windows-874', "../../uploads/$dateYear/employee/" . $newname))) {
                                echo "Copy/Upload Complete<br>";

                                $size = $_FILES['image_employee']['size'];
                                $strSQL = "INSERT INTO mod_employee_image";
                                $strSQL .= "(name_image,size,date_image,id_employee,directory)";
                                $strSQL .= "VALUES ";
                                $strSQL .= "('$newname','$size','$date_regdate','$id_extends','$strPath')";
                                $objQuery = $db->Query($strSQL);
                            } else {
                                echo "Copy/upload error<br>";
                            }
                            if ($objQuery) {
                                echo "Add done.[" . $strSQL . "]";
                            } else {
                                echo "Error Add [" . $strSQL . "]";
                            }
                        }
                    } else {
                        //echo " ไม่สามารถสร้างไฟล์ขึ้นได้";
                    }
                }
            } else {
                //echo " ไม่สามารถสร้างไฟล์ขึ้นได้";
            }
        }
    } else {
        //echo ("$file ไม่มีไฟล์นี้อยู่");
        $flgCreate = mkdir("../../uploads");
        if ($flgCreate) {
            //echo " ไฟล์ได้สร้างขึ้นแล้ว";
            $file_dateyear = "../../uploads/$dateYear";
            if (is_dir($file_dateyear)) {
                $file_employee = "../../uploads/$dateYear/employee";
                if (is_dir($file_employee)) {
                    if ($_FILES['image_employee']['name'] != '') {
                        $namefile = $_FILES["image_employee"]["name"];
                        $sur = strrchr($namefile, "."); //ตัดนามสกุลไฟล์เก็บไว้
                        $name = "EM-" . (Date("dmy") . rand('1000', '9999') . $sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
                        $target = "../../uploads/$dateYear/employee/" . $name;
                        $newname = $name;

                        if (file_exists($target)) {
                            $oldname = pathinfo($name, PATHINFO_FILENAME);
                            $ext = pathinfo($name, PATHINFO_EXTENSION);
                            $newname = $oldname;
                            do {
                                $r = rand(1000, 9999);
                                $newname = $oldname . "-" . $r . ".$ext";
                                $target = "../../uploads/$dateYear/employee/" . $newname;
                            } while (file_exists($target));
                        }

                        if (copy($_FILES["image_employee"]["tmp_name"], iconv('UTF-8', 'windows-874', "../../uploads/$dateYear/employee/" . $newname))) {
                            echo "Copy/Upload Complete<br>";

                            $size = $_FILES['image_employee']['size'];
                            $strSQL = "INSERT INTO mod_employee_image";
                            $strSQL .= "(name_image,size,date_image,id_employee,directory)";
                            $strSQL .= "VALUES ";
                            $strSQL .= "('$newname','$size','$date_regdate','$id_extends','$strPath')";
                            $objQuery = $db->Query($strSQL);
                        } else {
                            echo "Copy/upload error<br>";
                        }
                        if ($objQuery) {
                            echo "Add done.[" . $strSQL . "]";
                        } else {
                            echo "Error Add [" . $strSQL . "]";
                        }
                    }
                } else {
                    //echo ("$file ไม่มีไฟล์นี้อยู่");
                    $flgCreate = mkdir("../../uploads/$dateYear/employee");
                    if ($flgCreate) {
                        //echo " ไฟล์ได้สร้างขึ้นแล้ว";
                        if ($_FILES['image_employee']['name'] != '') {
                            $namefile = $_FILES["image_employee"]["name"];
                            $sur = strrchr($namefile, "."); //ตัดนามสกุลไฟล์เก็บไว้
                            $name = "EM-" . (Date("dmy") . rand('1000', '9999') . $sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
                            $target = "../../uploads/$dateYear/employee/" . $name;
                            $newname = $name;

                            if (file_exists($target)) {
                                $oldname = pathinfo($name, PATHINFO_FILENAME);
                                $ext = pathinfo($name, PATHINFO_EXTENSION);
                                $newname = $oldname;
                                do {
                                    $r = rand(1000, 9999);
                                    $newname = $oldname . "-" . $r . ".$ext";
                                    $target = "../../uploads/$dateYear/employee/" . $newname;
                                } while (file_exists($target));
                            }

                            if (copy($_FILES["image_employee"]["tmp_name"], iconv('UTF-8', 'windows-874', "../../uploads/$dateYear/employee/" . $newname))) {
                                echo "Copy/Upload Complete<br>";

                                $size = $_FILES['image_employee']['size'];
                                $strSQL = "INSERT INTO mod_employee_image";
                                $strSQL .= "(name_image,size,date_image,id_employee,directory)";
                                $strSQL .= "VALUES ";
                                $strSQL .= "('$newname','$size','$date_regdate','$id_extends','$strPath')";
                                $objQuery = $db->Query($strSQL);
                            } else {
                                echo "Copy/upload error<br>";
                            }
                            if ($objQuery) {
                                echo "Add done.[" . $strSQL . "]";
                            } else {
                                echo "Error Add [" . $strSQL . "]";
                            }
                        }
                    } else {
                        //echo " ไม่สามารถสร้างไฟล์ขึ้นได้";
                    }
                }
            } else {
                //echo ("$file ไม่มีไฟล์นี้อยู่");
                $flgCreate = mkdir("../../uploads/$dateYear");
                if ($flgCreate) {
                    //echo " ไฟล์ได้สร้างขึ้นแล้ว";
                    $file_employee = "../../uploads/$dateYear/employee";
                    if (is_dir($file_employee)) {
                        if ($_FILES['image_employee']['name'] != '') {
                            $namefile = $_FILES["image_employee"]["name"];
                            $sur = strrchr($namefile, "."); //ตัดนามสกุลไฟล์เก็บไว้
                            $name = "EM-" . (Date("dmy") . rand('1000', '9999') . $sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
                            $target = "../../uploads/$dateYear/employee/" . $name;
                            $newname = $name;

                            if (file_exists($target)) {
                                $oldname = pathinfo($name, PATHINFO_FILENAME);
                                $ext = pathinfo($name, PATHINFO_EXTENSION);
                                $newname = $oldname;
                                do {
                                    $r = rand(1000, 9999);
                                    $newname = $oldname . "-" . $r . ".$ext";
                                    $target = "../../uploads/$dateYear/employee/" . $newname;
                                } while (file_exists($target));
                            }

                            if (copy($_FILES["image_employee"]["tmp_name"], iconv('UTF-8', 'windows-874', "../../uploads/$dateYear/employee/" . $newname))) {
                                echo "Copy/Upload Complete<br>";

                                $size = $_FILES['image_employee']['size'];
                                $strSQL = "INSERT INTO mod_employee_image";
                                $strSQL .= "(name_image,size,date_image,id_employee,directory)";
                                $strSQL .= "VALUES ";
                                $strSQL .= "('$newname','$size','$date_regdate','$id_extends','$strPath')";
                                $objQuery = $db->Query($strSQL);
                            } else {
                                echo "Copy/upload error<br>";
                            }
                            if ($objQuery) {
                                echo "Add done.[" . $strSQL . "]";
                            } else {
                                echo "Error Add [" . $strSQL . "]";
                            }
                        }
                    } else {
                        //echo ("$file ไม่มีไฟล์นี้อยู่");
                        $flgCreate = mkdir("../../uploads/$dateYear/employee");
                        if ($flgCreate) {
                            //echo " ไฟล์ได้สร้างขึ้นแล้ว";
                            if ($_FILES['image_employee']['name'] != '') {
                                $namefile = $_FILES["image_employee"]["name"];
                                $sur = strrchr($namefile, "."); //ตัดนามสกุลไฟล์เก็บไว้
                                $name = "EM-" . (Date("dmy") . rand('1000', '9999') . $sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
                                $target = "../../uploads/$dateYear/employee/" . $name;
                                $newname = $name;

                                if (file_exists($target)) {
                                    $oldname = pathinfo($name, PATHINFO_FILENAME);
                                    $ext = pathinfo($name, PATHINFO_EXTENSION);
                                    $newname = $oldname;
                                    do {
                                        $r = rand(1000, 9999);
                                        $newname = $oldname . "-" . $r . ".$ext";
                                        $target = "../../uploads/$dateYear/employee/" . $newname;
                                    } while (file_exists($target));
                                }

                                if (copy($_FILES["image_employee"]["tmp_name"], iconv('UTF-8', 'windows-874', "../../uploads/$dateYear/employee/" . $newname))) {
                                    echo "Copy/Upload Complete<br>";

                                    $size = $_FILES['image_employee']['size'];
                                    $strSQL = "INSERT INTO mod_employee_image";
                                    $strSQL .= "(name_image,size,date_image,id_employee,directory)";
                                    $strSQL .= "VALUES ";
                                    $strSQL .= "('$newname','$size','$date_regdate','$id_extends','$strPath')";
                                    $objQuery = $db->Query($strSQL);
                                } else {
                                    echo "Copy/upload error<br>";
                                }
                                if ($objQuery) {
                                    echo "Add done.[" . $strSQL . "]";
                                } else {
                                    echo "Error Add [" . $strSQL . "]";
                                }
                            }
                        } else {
                            //echo " ไม่สามารถสร้างไฟล์ขึ้นได้";
                        }
                    }
                } else {
                    //echo " ไม่สามารถสร้างไฟล์ขึ้นได้";
                }
            }
        } else {
            //echo " ไม่สามารถสร้างไฟล์ขึ้นได้";
        }
    }
    $strSQL_member = "";
    for ($i = 1; $i <= $_POST['count_general']; $i++) {
        if (!empty($_POST['general' . $i])) {
            $permissions = implode(", ", $_POST['general' . $i]);
            $id_system = $_POST['general_id' . $i];

            $strSQL_member .= "INSERT INTO user_permissions";
            $strSQL_member .= "(id_user ,id_system ,permissions)";
            $strSQL_member .= "VALUES ";
            $strSQL_member .= "('" . $id_user . "','" . $id_system . "','" . $permissions . "');";
        }
    }

    for ($i = 1; $i <= $_POST['count_system']; $i++) {
        if (!empty($_POST['system' . $i])) {
            $permissions = implode(", ", $_POST['system' . $i]);
            $id_system = $_POST['system_id' . $i];

            $strSQL_member .= "INSERT INTO user_permissions";
            $strSQL_member .= "(id_user ,id_system ,permissions)";
            $strSQL_member .= "VALUES ";
            $strSQL_member .= "('" . $id_user . "','" . $id_system . "','" . $permissions . "');";
        }
    }

    $memberquery = $db->MultipleQueries($strSQL_member);
}

function doEdit()
{
    $db = new DB();
    date_default_timezone_set("Asia/Bangkok");
    $date_regdate = date("Y-m-d H:i:s");

    $id_user = null;

    $str = "UPDATE mod_employee SET";
    $str .= " username = '" . $_POST['employee-name'] . "' ";
    $str .= ",surname = '" . $_POST['employee-sur'] . "' ";
    $str .= ",username_en = '" . $_POST['employee-name-en'] . "' ";
    $str .= ",surname_en = '" . $_POST['employee-sur-en'] . "' ";
    $str .= ",birthday = '" . $_POST['employee-date'] . "' ";
    $str .= ",position = '" . $_POST['employee-opti'] . "' ";
    $str .= ",position_en = '" . $_POST['employee-opti-en'] . "' ";
    $str .= ",code_id = '" . $_POST['employee-code'] . "' ";
    $str .= ",detail_employee = '" . $_POST['employee-detail'] . "' ";
    $str .= ",detail_employee_en = '" . $_POST['employee-detail-en'] . "' ";
    $str .= ",email = '" . $_POST['employee-email'] . "' ";
    $str .= ",tel = '" . $_POST['tel'] . "' ";
    //$str .= ",id_branch = '".$_POST['branch']."'";
    $str .= "WHERE id_employee = '" . $_POST['id'] . "'";
    $query = $db->Query($str);

    if ($_POST['employee-pass'] != '') {
        $pass = password_hash($_POST['employee-pass'], PASSWORD_DEFAULT);
    } else {
        $str_member = "SELECT * FROM users WHERE id_data_role = '" . $_POST['id'] . "'";/* AND data_role = 'mod_employee' อันเก่า */
        $query_member = $db->Query($str_member);
        $result_member = mysqli_fetch_array($query_member);

        $pass = $result_member['user_password'];
        $id_user = $result_member['id_user'];
    }

    $dateYear =  "" . date("Y") . "";
    $file = "../../uploads";
    $strPath = "uploads/$dateYear/employee/";


    //		echo $memberquery_u;

    // $strRole = "SELECT * FROM roles where delete_datetime is null where tag = 'mod_employee' limit 1";
    // $role = $db->QueryFetchArray($strRole);
    // $id_extends_roles =isset($role)?$role["	id_role"]:"";

    $strRole = "SELECT * FROM roles where delete_datetime is null and tag = 'mod_employee' ORDER BY update_datetime limit 1";
    $role = $db->Query($strRole);
    $result_role = mysqli_fetch_array($role);
    if (isset($result_role["id_role"])) {
        $id_extends_roles = $result_role["id_role"];
    } else {
        $id_extends_roles = "";
    }

    $date_us = date("Y-m-d H:i:s");
    $str_member_u1 = "UPDATE users SET";
    $str_member_u1 .= " user_name = '" . $_POST['employee-user'] . "' ";
    $str_member_u1 .= ",user_password = '" . $pass . "' ";
    $str_member_u1 .= ",update_datetime = '" . $date_us . "' ";
    $str_member_u1 .= ",id_role = '" . $id_extends_roles . "' ";
    $str_member_u1 .= " WHERE id_data_role = '" . $_POST['id'] . "' ";
    $querystr_member_u1 = $db->Query($str_member_u1);


    if ($_FILES['image_employee']['name'] != '') {
        $str_check_image = "SELECT * FROM mod_employee_image WHERE id_employee = '" . $_POST['id'] . "' order by date_image desc limit 1";
        $query_check_image = $db->Query($str_check_image);
        $num_check_image = (!$query_check_image) ? 0 : mysqli_num_rows($query_check_image);

        if ($num_check_image > 0) {
            $result_check_image = mysqli_fetch_array($query_check_image);
            $image_em = iconv("utf-8", "tis-620", $result_check_image["name_image"]);

            $date_img  = $result_check_image['date_image'];
            $date_img = explode("-", $date_img);
            //echo $date_img[0]; // 2019
            //echo $data_img[1]; // 11

            if (unlink("../../uploads/$date_img[0]/employee/" . $image_em)) {
                echo "Delete old image complete<br>";

                $namefile = $_FILES["image_employee"]["name"];
                $sur = strrchr($namefile, "."); //ตัดนามสกุลไฟล์เก็บไว้
                $name = "EM-" . (Date("dmy") . rand('1000', '9999') . $sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
                $target = "../../uploads/$date_img[0]/employee/" . $name;
                $newname = $name;

                if (file_exists($target)) {
                    $oldname = pathinfo($name, PATHINFO_FILENAME);
                    $ext = pathinfo($name, PATHINFO_EXTENSION);
                    $newname = $oldname;
                    do {
                        $r = rand(1000, 9999);
                        $newname = $oldname . "-" . $r . ".$ext";
                        $target = "../../uploads/$date_img[0]/employee/" . $newname;
                    } while (file_exists($target));
                }

                if (copy($_FILES["image_employee"]["tmp_name"], iconv('UTF-8', 'windows-874', "../../uploads/$date_img[0]/employee/" . $newname))) {
                    echo "Copy/Upload Complete<br>";

                    $size = $_FILES['image_employee']['size'];
                    $strSQL = "UPDATE mod_employee_image SET";
                    $strSQL .= " name_image = '" . $newname . "' ";
                    $strSQL .= ",size = '" . $size . "' ";
                    $strSQL .= ",date_image = '" . $date_regdate . "' ";
                    $strSQL .= ",directory = '" . $strPath . "' ";
                    $strSQL .= "WHERE id_employee = '" . $_POST['id'] . "'";
                    $objQuery = $db->Query($strSQL);
                } else {
                    echo "Copy/upload error 1<br>";
                }

                if ($objQuery) {
                    echo "Add done 1.[" . $strSQL . "]";
                } else {
                    echo "Error Add 1 [" . $strSQL . "]";
                }
            }
        } else {
            $dateYear =  "" . date("Y") . "";

            $namefile = $_FILES["image_employee"]["name"];
            $sur = strrchr($namefile, "."); //ตัดนามสกุลไฟล์เก็บไว้
            $name = "EM-" . (Date("dmy") . rand('1000', '9999') . $sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
            $target = "../../uploads/$dateYear/employee/" . $name;
            $newname = $name;

            if (file_exists($target)) {
                $oldname = pathinfo($name, PATHINFO_FILENAME);
                $ext = pathinfo($name, PATHINFO_EXTENSION);
                $newname = $oldname;
                do {
                    $r = rand(1000, 9999);
                    $newname = $oldname . "-" . $r . ".$ext";
                    $target = "../../uploads/$dateYear/employee/" . $newname;
                } while (file_exists($target));
            }

            if (copy($_FILES["image_employee"]["tmp_name"], iconv('UTF-8', 'windows-874', "../../uploads/$dateYear/employee/" . $newname))) {
                echo "Copy/Upload Complete<br>";

                $size = $_FILES['image_employee']['size'];
                $strSQL = "INSERT INTO mod_employee_image";
                $strSQL .= "(name_image,size,date_image,id_employee,directory)";
                $strSQL .= " VALUES ";
                $strSQL .= " ('$newname','$size','$date_regdate','" . $_POST['id'] . "','" . $strPath . "')";
                $objQuery = $db->Query($strSQL);
            } else {
                echo "Copy/upload error 2<br>";
            }
            if ($objQuery) {
                echo "Add done 2.[" . $strSQL . "]";
            } else {
                echo "Error Add 2 [" . $strSQL . "]";
            }
        }
    }

    if ($query) {
        //        echo 'complete';
        $str_member_u = "";
        $str_member_u .= "DELETE from user_permissions WHERE id_user = '" . $id_user . "';";

        for ($i = 1; $i <= $_POST['count_general']; $i++) {
            if (!empty($_POST['general' . $i])) {
                $permissions = implode(", ", $_POST['general' . $i]);
                $id_system = $_POST['general_id' . $i];

                $str_member_u .= "INSERT INTO user_permissions";
                $str_member_u .= "(id_user ,id_system ,permissions)";
                $str_member_u .= "VALUES ";
                $str_member_u .= "('" . $id_user . "','" . $id_system . "','" . $permissions . "');";
            }
        }

        for ($i = 1; $i <= $_POST['count_system']; $i++) {
            if (!empty($_POST['system' . $i])) {
                $permissions = implode(", ", $_POST['system' . $i]);
                $id_system = $_POST['system_id' . $i];

                $str_member_u .= "INSERT INTO user_permissions";
                $str_member_u .= "(id_user ,id_system ,permissions)";
                $str_member_u .= "VALUES ";
                $str_member_u .= "('" . $id_user . "','" . $id_system . "','" . $permissions . "');";
            }
        }
        $memberquery_u = $db->MultipleQueries($str_member_u);
    } else {
        echo 'error';
    }

    $strSQL_member = "";
    for ($i = 1; $i <= $_POST['count_general']; $i++) {
        if (!empty($_POST['general' . $i])) {
            $permissions = implode(", ", $_POST['general' . $i]);
            $id_system = $_POST['general_id' . $i];

            $strSQL_member .= "  UPDATE `user_permissions` SET`permissions`='" . $permissions . "' WHERE `id_system` ='" . $id_system . "' AND `id_user`='" . $id_user . "'  ";
            $objQuery = $db->Query($strSQL_member);
        }
    }

    for ($i = 1; $i <= $_POST['count_system']; $i++) {
        if (!empty($_POST['system' . $i])) {
            $permissions = implode(", ", $_POST['system' . $i]);
            $id_system = $_POST['system_id' . $i];

            $strSQL_member .= "UPDATE `user_permissions` SET`permissions`='" . $permissions . "' WHERE `id_system` ='" . $id_system . "' AND `id_user`='" . $id_user . "'  ";
            $objQuery = $db->Query($strSQL_member);
        }
    }

    //$memberquery = $db->MultipleQueries($strSQL_member);

    //$memberquery = $db->MultipleQueries($str_member_u);
}

function doDel()
{
    $db = new DB();
    header('Content-Type: application/json');
    $strSQL = "SELECT * FROM mod_employee_image WHERE id_employee = '" . $_POST["id"] . "'";
    $objQuery = $db->Query($strSQL);
    $objResult = mysqli_fetch_array($objQuery);
    $numrow = mysqli_num_rows($objQuery);
    if ($numrow > 0) {
        $date_img  = $objResult['date_image'];
        $date_img = explode("-", $date_img);
        //echo $date_img[0]; // 2019
        //echo $data_img[1]; // 11

        $file = iconv("utf-8", "tis-620", $objResult["name_image"]);
        if (unlink("../../uploads/$date_img[0]/employee/" . $file)) {
        }
    }

    $str_del_member = "DELETE FROM users WHERE id_data_role = '" . $_POST['id'] . "' ";
    /*AND data_role = 'mod_employee' อันเก่า*/
    $query_del_member = $db->Query($str_del_member);

    $strSQL = "DELETE FROM mod_employee WHERE id_employee = '" . $_POST["id"] . "' ";
    $objQuery = $db->Query($strSQL);
    if ($objQuery) {
        echo json_encode(array('status' => '0', 'message' => "Successful!"));
    } else {
        echo json_encode(array('status' => '1', 'message' => $strSQL));
    }
}


function setMD5()
{
    $passuniq = uniqid();
    $passmd5 = md5($passuniq);

    $sumlenght = strlen($passmd5); #num passmd5

    $letter_pre = chr(rand(97, 122)); #set char for prefix

    $letter_post = chr(rand(97, 122)); #set char for postfix

    $letter_mid = chr(rand(97, 122)); #set char for middle string

    $num_rand = rand(0, $sumlenght); #random for cut passmd5

    $cut_pre = substr($passmd5, 0, $num_rand); #cutmd5 start 0 stop $numrand
    $setmid = $cut_pre . $letter_mid; #set pre string + char middle

    $cut_post = substr($passmd5, $num_rand, $sumlenght + 1);

    $set_modify_md5 = $letter_pre . $setmid . $cut_post . $letter_post;
    return $set_modify_md5;
}

//function
function random_number()
{
    $alphabet = "0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 7; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function thai_date_and_time_short($time)
{   // 19  ธ.ค. 2556 10:10:4
    $dayTH = ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'];
    $monthTH = [null, 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
    $thai_date_return = date("j", $time);
    $thai_date_return .= " " . $monthTH[date("n", $time)];
    $thai_date_return .= " " . (date("Y", $time) + 543);
    $thai_date_return .= " เวลา " . date("H:i:s", $time);
    return $thai_date_return;
}

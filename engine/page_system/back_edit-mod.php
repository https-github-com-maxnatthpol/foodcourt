<?php
require_once '../lib/connect.php';
$db = new DB();

if (isset($_POST['id_edit'])) {
    if (empty($_POST['sub_system'])) {
        if (empty($_POST['name_file'])) {
            $file = '#';
        } else {
            $file = $_POST['name_file'];
        }
        $str = "UPDATE system SET ";
        $str .= " name_system ='".$_POST['name']."' ";
        $str .= " ,name_system_en ='".$_POST['name_en']."' ";
        $str .= " ,type = '".$_POST['form-type']."'";
        $str .= " ,icon = '".$_POST['icon']."'";
        $str .= " ,link_system = '".$file."'";
        // $str .= " ,icon = '".$_POST['icon']."'";
        $str .= "WHERE id_system = '".$_POST['id_edit']."' ";
        $query = $db->Query($str);
        if ($query) {
            echo "complete".$str;
        } else {
            echo "error".$str;
        }
    } else {
        echo $_POST['sub_system'];
        $cut = explode("-", $_POST['sub_system']);// 0 เปลี่ยนซับ 1 คือเลขที่จะเปลี่ยน
        if (count($cut)==3) {
            $type = $_POST['form-type'];
        } else {
            $type  = $cut[3];
        }
        if ($cut[0] =='0' || $_POST['form-system']=='1') {
            $group = "";
            $level = "1";

            

            $str1 = "SELECT * from system WHERE id_system = '".$cut[2]."'";
            $query1 = $db->Query($str1);
            $result1 = mysqli_fetch_array($query1);

            $str2 = "SELECT * from system WHERE groups = '".$result1['id_system']."'";
            $query2 = $db->Query($str2);
            while ($result2 = mysqli_fetch_array($query2)) {
                $str = "UPDATE system SET ";
                $str .= " level ='2' ";//-----------------------------------จาก3 มาเป็น2
                $str .= " ,type = '".$type."'";
                $str .= "WHERE id_system = '".$result2['id_system']."' ";
                $query = $db->Query($str);
                if ($query) {
                    echo "complete".$str.'test = '.$cut[2]."<br>";
                } else {
                    echo "error".$str."<br>";
                }
            }
        } elseif ($cut[0] == 1) {
            $level = '2';
            $group = $cut[1];
            $type  = $cut[3];
            // echo $type;
            $str1 = "SELECT * from system WHERE id_system = '".$cut[2]."'";
            $query1 = $db->Query($str1);
            $result1 = mysqli_fetch_array($query1);

            $str2 = "SELECT * from system WHERE groups = '".$result1['id_system']."'";
            $query2 = $db->Query($str2);
            while ($result2 = mysqli_fetch_array($query2)) {
                echo $result2['name_system'];
                $str = "UPDATE system SET ";
                $str .= " level ='3' ";
                $str .= " ,type = '".$type."'";
                $str .= "WHERE id_system = '".$result2['id_system']."' ";
                $query = $db->Query($str);
                if ($query) {
                    echo "complete".$str."<br>";
                } else {
                    echo "error".$str."<br>";
                }
                $str3 = "DELETE FROM system WHERE level ='3' AND groups = '".$result2['id_system']."'";
                $query3 = $db->Query($str3);
                if ($query3) {
                    echo "DEL 3".$str3."<br>";
                } else {
                    echo "ERR 3".$str3."<br>";
                }
            }
        } else {
            $level = '3';
            $group = $cut[1];
            $type  = $cut[3];

            $str1 = "SELECT * from system WHERE id_system = '".$cut[2]."'";
            $query1 = $db->Query($str1);
            $result1 = mysqli_fetch_array($query1);

            $str2 = "SELECT * from system WHERE groups = '".$result1['id_system']."'";
            $query2 = $db->Query($str2);
            while ($result2 = mysqli_fetch_array($query2)) {
                if ($result2['level']==3) {
                    $str = "DELETE FROM system WHERE level ='3' AND groups = '".$result2['groups']."'";
                    $query = $db->Query($str);
                    echo $str;
                } else {
                    $str2 = "SELECT * from system WHERE groups = '".$result1['id_system']."'";
                    $query2 = $db->Query($str2);
                    while ($result2 = mysqli_fetch_array($query2)) {
                        $str = "DELETE FROM system WHERE level ='2' AND groups = '".$result2['groups']."'";
                        $query = $db->Query($str);
                        echo $str;

                        $str3 = "DELETE FROM system WHERE level ='3' AND groups = '".$result2['id_system']."'";
                        $query3 = $db->Query($str3);
                        if ($query3) {
                            echo "DEL 3".$str3."<br>";
                        } else {
                            echo "ERR 3".$str3."<br>";
                        }
                    }
                }
            }
        }
        //-----------------------------------------------------------------เปลี่ยน ตัวหลักที่ส่งเข้ามา-----------------------------////////////////////////////
        if (empty($_POST['name_file'])) {
            $file = '#';
        } else {
            $file = $_POST['name_file'];
        }
        $str = "UPDATE system SET ";
        $str .= " groups ='".$group."' ";
        $str .= " ,level ='".$level."' ";
        $str .= " ,name_system ='".$_POST['name']."' ";
        $str .= " ,name_system_en ='".$_POST['name_en']."' ";
        $str .= " ,type = '".$type."'";
        $str .= " ,icon = '".$_POST['icon']."'";
        $str .= " ,link_system = '".$file."'";
        $str .= "WHERE id_system = '".$cut[2]."' ";
        $query = $db->Query($str);
        if ($query) {
            echo "complete".$str;
        } else {
            echo "error".$str;
        }
    }

    $id = $_POST['id_edit'];
    if (isset($_POST['Chk'])) {
        $str_replace = "UPDATE mod_employee  SET task_view =  REPLACE(REPLACE(task_view,',".$id."', ''), '".$id."', '')  WHERE task_view LIKE '%".$id."%'";
        
        $query_replace = $db->Query($str_replace);
        for ($i=0;$i<count($_POST["Chk"]);$i++) {
            //getch tasklist employee
            $str_fetch = "SELECT id_employee,task_view FROM mod_employee WHERE id_employee = '".$_POST['Chk'][$i]."' ";
            $query_fetch = $db->Query($str_fetch);
            $result_fetch = mysqli_fetch_array($query_fetch);

            //cut string system and desigh
            $module =$result_fetch['task_view'];
            //check type form get
            $sum_system = strlen($module);#count string
            if ($sum_system>0) {
                $text = $module.','.$id;
            } else {
                $text = $module.$id;
            }
            $strSQL = "UPDATE mod_employee SET task_view = '".$text."' WHERE id_employee = '".$_POST["Chk"][$i]."' ";
            $objQuery = $db->Query($strSQL);

            if ($objQuery) {
                echo 'complete';
            } else {
                echo 'error';
            }
        }
    }
}
?>

<!-- 	$text_all = ''
		for($i=0;$i<count($_POST["Chk"]);$i++){	
			$text_all .= $_POST["Chk"].',';
		}
		$module_cut = explode(",", $text_all);
		$str_fetch = "SELECT id_employee,task_view FROM mod_employee WHERE task_view = '%".$id."'%";
		$query_fetch = mysqli_query($objConnect,$str_fetch);
		while($result_fetch = mysqli_fetch_array($query_fetch)){
			if(in_array($result_fetch['id_employee'], $module_cut)){
				continue;
			}
		}
 -->
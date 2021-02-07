<?php
require_once '../lib/connect.php';
$db = new DB();
if (isset($_POST['Chk'])) {
    for ($i=0;$i<count($_POST["Chk"]);$i++) {
        $str = "SELECT * FROM system WHERE id_system = '".$_POST["Chk"][$i]."' ";
        $query = $db->Query($str);
        $result = mysqli_fetch_array($query);
            
        if ($result['level']==1) {
            $str2 = "SELECT * FROM system WHERE level = '2' AND groups = '".$result['id_system']."' ";
            $query2 = $db->Query($query2);

            while ($result2 = mysqli_fetch_array($query2)) {
                echo $result2['id_system'];
                $str_d = "DELETE FROM system WHERE level = '3' AND groups = '".$result2['id_system']."' ";
                $query_d = $db->Query($str_d);
                if ($query_d) {
                    echo "Delete Catagory complete [".$str_d."]";
                } else {
                    echo "error [".$str_d."]";
                }
            }

            $str3 = "DELETE FROM system WHERE groups = '".$_POST["Chk"][$i]."' ";
            $query3 = $db->Query($str3);
            if ($query3) {
                echo "Delete Catagory complete [".$str3."]";
            } else {
                echo "error [".$str_sub."]";
            }

            $strSQL = "DELETE FROM system WHERE id_system = '".$_POST["Chk"][$i]."' ";
            $objQuery = $db->Query($strSQL);
            if ($objQuery) {
                echo "Delete Catagory complete [".$strSQL."]";
            } else {
                echo "error [".$strSQL."]";
            }
        } elseif ($result['level']==2) {
            $str_sub = "DELETE FROM system WHERE level = '3' AND groups = '".$_POST["Chk"][$i]."' ";
            $query_sub = $db->Query($str_sub);
            if ($query_sub) {
                echo "Delete Catagory complete [".$str_sub."]";
            } else {
                echo "error [".$str_sub."]";
            }

            $str_sub = "DELETE FROM system WHERE id_system = '".$_POST["Chk"][$i]."' ";
            $query_sub = $db->Query($str_sub);
            if ($query_sub) {
                echo "complete".$str_sub;
            } else {
                echo "error".$str_sub;
            }
        } else {
            $strSQL = "DELETE FROM system WHERE id_system = '".$_POST["Chk"][$i]."' ";
            $objQuery = $db->Query($strSQL);
            if ($objQuery) {
                echo "Delete Catagory complete [".$strSQL."]";
            } else {
                echo "error [".$strSQL."]";
            }
        }
    }
} else {
    $str = "SELECT * FROM system WHERE id_system = '".$_POST['id']."' ";
    $query = $db->Query($str);
    $result = mysqli_fetch_array($query);

    if ($result['level']==1) {
        $str2 = "SELECT * FROM system WHERE level = '2' AND groups = '".$result['id_system']."' ";
        $query2 = $db->Query($str2);

        while ($result2 = mysqli_fetch_array($query2)) {
            echo $result2['id_system'];
            $str_d = "DELETE FROM system WHERE level = '3' AND groups = '".$result2['id_system']."' ";
            $query_d = $db->Query($str_d);
            if ($query_d) {
                echo "Delete Catagory complete [".$str_d."]";
            } else {
                echo "error [".$str_d."]";
            }
        }

        $str3 = "DELETE FROM system WHERE groups = '".$_POST['id']."' ";
        $query3 = $db->Query($str3);
        if ($query3) {
            echo "Delete Catagory complete [".$str3."]";
        } else {
            echo "error [".$str_sub."]";
        }

        $strSQL = "DELETE FROM system WHERE id_system = '".$_POST["id"]."' ";
        $objQuery = $db->Query($strSQL);
        if ($objQuery) {
            echo "Delete Catagory complete [".$strSQL."]";
        } else {
            echo "error [".$strSQL."]";
        }
    } elseif ($result['level']==2) {
        $str_sub = "DELETE FROM system WHERE level = '3' AND groups = '".$_POST['id']."' ";
        $query_sub = $db->Query($str_sub);
        if ($query_sub) {
            echo "Delete Catagory complete [".$str_sub."]";
        } else {
            echo "error [".$str_sub."]";
        }

        $str_sub = "DELETE FROM system WHERE id_system = '".$_POST['id']."' ";
        $query_sub = $db->Query($str_sub);
        if ($query_sub) {
            echo "complete".$str_sub;
        } else {
            echo "error".$str_sub;
        }
    } else {
        $strSQL = "DELETE FROM system WHERE id_system = '".$_POST["id"]."' ";
        $objQuery = $db->Query($strSQL);
        if ($objQuery) {
            echo "Delete Catagory complete [".$strSQL."]";
        } else {
            echo "error [".$strSQL."]";
        }
    }
}

<?php
    require_once '../lib/connect.php';
    $db = new DB();

    $str = 'UPDATE system SET';
    $str .= ' sort = "'.$_POST['sort'].'"';
    $str .= ' WHERE id_system = "'.$_POST['id'].'"';
    $query = $db->Query($str);
    if ($query) {
        echo 'Complete'.$str;
    } else {
        echo 'Notcomplete'.$str;
    }

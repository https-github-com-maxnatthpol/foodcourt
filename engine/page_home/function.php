<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';
require_once '../lib/functions.php';


if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case "course_webinar":
            course_webinar();

        break;

        case "sales":
            sales();

        break;

    }
}

function course_webinar()
{
    $db = new DB();

    //============Category
    //$sqlCategory = "SELECT `name_th` FROM `category` WHERE `delete_datetime` IS null ORDER BY `name_th`";
    $sqlCategory = "SELECT `name_th` FROM `category`
    WHERE category.delete_datetime is null
    AND ((id_category IN (SELECT DISTINCT id_category FROM course WHERE course.delete_datetime IS null) ) or 
    (id_category IN (SELECT DISTINCT id_category FROM webinar WHERE webinar.delete_datetime IS null) ))
    ORDER BY `name_th`";
    $objCategory = $db->Query($sqlCategory);
    
    $arrCategory = array();
    $category = "";
   
    if (isset($objCategory)) {
        $num = $objCategory->num_rows;
        while ($result = mysqli_fetch_array($objCategory, MYSQLI_ASSOC)) {
            if ($num > 1) {
                array_push($arrCategory, $result["name_th"]);
            } else {
                $category = $result;
            }
        }

        if ($num > 1) {
            $category = count($arrCategory) > 1?implode(",", $arrCategory):$arrCategory;
        }
    }
    $category = [$category];

    //==========Course
    $sqlCourse = "SELECT C.id_category ,(ifnull((SELECT ifnull((SUM(orders_item.subtotal)),0) as total
    FROM `orders` 
    LEFT JOIN orders_item ON orders.id_orders = orders_item.id_orders
    LEFT JOIN course ON orders_item.id_course = course.id_course
    WHERE orders.delete_datetime IS null 
    AND MONTH(orders.orders_datetime) = MONTH(CURRENT_DATE())
    AND YEAR(orders.orders_datetime) = YEAR(CURRENT_DATE())
    AND course.id_category = C.id_category),0)) as total
FROM category as C
WHERE C.delete_datetime IS null";
    $objCourse = $db->Query($sqlCourse);
    
    $arrCourse = array();
    $course = "";
   
    if (isset($objCourse)) {
        $num = $objCourse->num_rows;
        while ($result = mysqli_fetch_array($objCourse, MYSQLI_ASSOC)) {
            if ($num > 1) {
                array_push($arrCourse, $result["total"]);
            } else {
                $course = $result;
            }
        }

        if ($num > 1) {
            $course = count($arrCourse) > 1?implode(",", $arrCourse):$arrCourse;
        }
    }
    $course = [$course];

    //==========Webinar
    $sqlWebinar = "SELECT C.id_category ,(ifnull((SELECT ifnull((SUM(orders_item.subtotal)),0) as total
    FROM `orders` 
    LEFT JOIN orders_item ON orders.id_orders = orders_item.id_orders
    LEFT JOIN webinar ON orders_item.id_course = webinar.id_webinar
    WHERE orders.delete_datetime IS null 
    AND MONTH(orders.orders_datetime) = MONTH(CURRENT_DATE())
    AND YEAR(orders.orders_datetime) = YEAR(CURRENT_DATE())
    AND webinar.id_category = C.id_category),0)) as total
FROM category as C
WHERE C.delete_datetime IS null";
    $objWebinar = $db->Query($sqlWebinar);
    
    $arrWebinar = array();
    $webinar = "";
   
    if (isset($objWebinar)) {
        $num = $objWebinar->num_rows;
        while ($result = mysqli_fetch_array($objWebinar, MYSQLI_ASSOC)) {
            if ($num > 1) {
                array_push($arrWebinar, $result["total"]);
            } else {
                $webinar = $result;
            }
        }

        if ($num > 1) {
            $webinar = count($arrWebinar) > 1?implode(",", $arrWebinar):$arrWebinar;
        }
    }
    $webinar = [$webinar];

    //Prepare data
    $labels = $arrCategory;
    $series = [$arrCourse,$arrWebinar];

    echo json_encode(array('labels' => $labels,'series'=> $series,'category'=> $category,'course'=> $course,'webinar'=> $webinar));
}

function sales()
{
    $db = new DB();

    //==========Course
    $sqlCourse = "SELECT ifnull((SUM(orders_item.subtotal)),0) as total
    FROM `orders` 
    LEFT JOIN orders_item ON orders.id_orders = orders_item.id_orders
    LEFT JOIN course ON orders_item.id_course = course.id_course
    WHERE orders.delete_datetime IS null 
    AND MONTH(orders.orders_datetime) = MONTH(CURRENT_DATE())
    AND YEAR(orders.orders_datetime) = YEAR(CURRENT_DATE()) 
    AND orders_item.type  = 1";
    $objCourse = $db->Query($sqlCourse);
    
    $arrCourse = array();
    $course = "";
   
    if (isset($objCourse)) {
        $num = $objCourse->num_rows;
        while ($result = mysqli_fetch_array($objCourse, MYSQLI_ASSOC)) {
            if ($num > 1) {
                array_push($arrCourse, $result["total"]);
            } else {
                $course = $result["total"];
            }
        }

        if ($num > 1) {
            $course = count($arrCourse) > 1?implode(",", $arrCourse):$arrCourse;
        }
    }
    $course = $course;

    //==========Webinar
    $sqlWebinar = "SELECT ifnull((SUM(orders_item.subtotal)),0) as total
    FROM `orders` 
    LEFT JOIN orders_item ON orders.id_orders = orders_item.id_orders
    LEFT JOIN webinar ON orders_item.id_course = webinar.id_webinar
    WHERE orders.delete_datetime IS null 
    AND MONTH(orders.orders_datetime) = MONTH(CURRENT_DATE())
    AND YEAR(orders.orders_datetime) = YEAR(CURRENT_DATE()) 
    AND orders_item.type  = 2";
    $objWebinar = $db->Query($sqlWebinar);
    
    $arrWebinar = array();
    $webinar = "";
   
    if (isset($objWebinar)) {
        $num = $objWebinar->num_rows;
        while ($result = mysqli_fetch_array($objWebinar, MYSQLI_ASSOC)) {
            if ($num > 1) {
                array_push($arrWebinar, $result["total"]);
            } else {
                $webinar = $result["total"];
            }
        }

        if ($num > 1) {
            $webinar = count($arrWebinar) > 1?implode(",", $arrWebinar):$arrWebinar;
        }
    }
    $webinar = $webinar;
    
    $total = $course + $webinar;
    $course = $total==0?0:(($course / $total) * 100);
    $webinar = $total==0?0:(($webinar / $total) * 100);

    echo json_encode(array('course'=> $course,'webinar'=> $webinar));
}

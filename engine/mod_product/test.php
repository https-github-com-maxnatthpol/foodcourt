<?php
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/permission.php';
require_once("pagination_function.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <title>Document</title> 
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@4.1.0/dist/css/bootstrap.min.css" >
    <style type="text/css">
        html{
            font-family:tahoma, Arial,"Times New Roman";
            font-size:14px;
        }
        body{
            font-family:tahoma, Arial,"Times New Roman";
            font-size:14px;
        }    
    </style>
</head>
<body>
 
<br>
<br>
<div class="container">
 
<div class="table-responsive-sm">
<table class="table table-bordered table-striped table-hover table-sm">
  <thead >
    <tr class="table-primary">
      <th class="text-center" scope="col" width="30">#</th>
      <th class="text-left" scope="col">ชื่อจังหวัด</th>
    </tr>
  </thead>
  <tbody>
<?php
$num = 0;
$db = new DB();
  $id_course = $db->clear($_POST["id_course"]);
$sql = "
SELECT 
course_review.id_review
FROM `course_review` 
WHERE course_review.delete_datetime IS null AND  course_review.id_course = '".$id_course."'
";  

$result = $db->Query($sql);
$total=$result->num_rows;
 
$e_page=10; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
$step_num=0;
if(!isset($_GET['page']) || (isset($_GET['page']) && $_GET['page']==1)){   
    $_GET['page']=1;   
    $step_num=0;
    $s_page = 0;    
}else{   
    $s_page = $_GET['page']-1;
    $step_num=$_GET['page']-1;  
    $s_page = $s_page*$e_page;
}   
$sql.=" ORDER BY province_id  LIMIT ".$s_page.",$e_page";
$result=$mysqli->query($sql);
if($result && $result->num_rows>0){  // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
    while($row = $result->fetch_assoc()){ // วนลูปแสดงรายการ
        $num++;
?>
    <tr>
      <th class="text-center" scope="row"><?=($step_num*$e_page)+$num?></th>
      <td class="text-left" ><?=$row['province_name']?></td>
    </tr>
<?php
    }   
}
?>      
  </tbody>
</table>
 
<?php
page_navi($total,(isset($_GET['page']))?$_GET['page']:1,$e_page);
?>
</div>
 
<br>
</div>
 
<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
<script src="https://unpkg.com/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(function(){
     
});
</script>
</body>
</html>
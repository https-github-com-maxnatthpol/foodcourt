<?php
session_start(); 
 //require_once '../engine/lib/functions.php';

function setMD5(){

  $passuniq = uniqid();
  $passmd5 = md5($passuniq);

  $sumlenght = strlen($passmd5);#num passmd5

  $letter_pre = chr(rand(97,122));#set char for prefix

  $letter_post = chr(rand(97,122));#set char for postfix

  $letter_mid = chr(rand(97,122));#set char for middle string

  $num_rand = rand(0,$sumlenght);#random for cut passmd5

  $cut_pre = substr($passmd5,0,$num_rand);#cutmd5 start 0 stop $numrand
  $setmid = $cut_pre.$letter_mid;#set pre string + char middle

  $cut_post = substr($passmd5,$num_rand, $sumlenght+1);

  $set_modify_md5 = $letter_pre.$setmid.$cut_post.$letter_post;
  return $set_modify_md5;
}



if(isset($_POST['_method'])){

  //register.php  
  if($_POST['_method']=='SELECT_TEX') {
    SELECT_TEX();
    exit;
  }



elseif($_POST['_method']=='ADD_CUTTOMER') {
    ADD_CUTTOMER();
    exit;
}elseif($_POST['_method']=='CHECK_IDCARD') {
  CHECK_IDCARD();
  exit;
}elseif($_POST['_method']=='CHECK_EMAIL') {
  CHECK_EMAIL();
  exit;
}elseif($_POST['_method']=='CHECK_NUMBER_LI') {
  CHECK_NUMBER_LI();
  exit;
}elseif($_POST['_method']=='facebook_login'){
  facebook_login();
}elseif($_POST['_method']=='ADD_EDIT_CUTTOMER'){
  ADD_EDIT_CUTTOMER();
}elseif($_POST['_method']=='ADD_EDIT_PARTNER'){
  ADD_EDIT_PARTNER();
}elseif($_POST['_method']=='ADD_EDIT_TUTOR'){
  ADD_EDIT_TUTOR();
}elseif($_POST['_method']=='CHACK_NEW_PASS'){
  CHACK_NEW_PASS();
}elseif($_POST['_method']=='CREATE_COMMENTNEWS'){
  CREATE_COMMENTNEWS();
  exit;
}elseif($_POST['_method']=='SELECTOR_COMPANY') {
  SELECTOR_COMPANY();
  exit;
}elseif($_POST['_method']=='ADD_COMPANY') {
  ADD_COMPANY();
  exit;
}elseif($_POST['_method']=='SE_COMPANY') {
  SE_COMPANY();
  exit;
}elseif($_POST['_method']=='ADD_NEXT') {
  ADD_NEXT();
 exit;
}elseif($_POST['_method']=='SE_PAYLIST') {
       SE_PAYLIST();
       exit;
}elseif($_POST['_method']=='SE_PAYLIST_check') {
       SE_PAYLIST_check();
       exit;
}
elseif($_POST['_method']=='se_pay') {
       se_pay();
       exit;
}elseif($_POST['_method']=='CHECK_COPON') {
       CHECK_COPON();
       exit;
}elseif($_POST['_method']=='PAY_PAL_COMPLETED') {
       PAY_PAL_COMPLETED();
       exit;
}elseif($_POST['_method']=='CREATE_SLIP') {
      CREATE_SLIP();
      exit;
}elseif($_POST['_method']=='save_otp') {
      save_otp();
      exit;
}elseif($_POST['_method']=='check_otp') {
      check_otp();
      exit;
}


}

if(isset($_POST['ac'])){
  if($_GET['ac']=='true'){
    SELECT_CENTER();
  }
}





function facebook_login(){
  require_once 'admin/library/connect.php';
  header('Content-Type: application/json');
  date_default_timezone_set("Asia/Bangkok");

$fbEmail = $_POST['fbEmail'];
$fbID = $_POST['fbID'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$birthday = $_POST['birthday'];
$pic = $_POST['pic'];
// session_start();

//$id_employee = $_SESSION['id_employee'];

$id_cust = setMD5();


$sql_type = "SELECT id_facebook FROM mod_customer 
WHERE id_facebook = '$fbID'";
$query = mysqli_query($objConnect, $sql_type);
$row = mysqli_fetch_array($query);
    
// $premium_id = $row['sku'];




if(isset($row)){
    if ($query) {
        echo  json_encode(array('code' => 200, 'message' => $sql));
        } else {
        echo  json_encode(array('code' => 404, 'message' => $sql));
        }
}else{

    $sql = "INSERT INTO mod_customer  (id_customer, fname, lname, birthday,img_path,email,id_facebook) 
    VALUES ('".$id_cust."','".$first_name."','".$last_name."','".$birthday."','".$pic."','".$fbEmail."','".$fbID."')";
    print $sql;
$query = mysqli_query($objConnect, $sql);

if ($query) {
echo  json_encode(array('code' => 200, 'message' => $sql));
} else {
echo  json_encode(array('code' => 404, 'message' => $sql));
}

}



}




//     //add_credit.php
//     }
    
// }


function ADD_CUTTOMER(){

require_once '../../engine/lib/connect.php';
require_once '../../engine/lib/service.php';
$db = new DB ();	
// require_once 'admin/library/functions.php';
header('Content-Type: application/json');
date_default_timezone_set("Asia/Bangkok");
$date = date("Y-m-d H:i:s");
  
 $id_customer = setMD5();
 $id_member = setMD5();
 $id_role = setMD5();	

$fname = $_POST['fname'];
$sname = $_POST['sname'];
$idcard = $_POST['idcard'];
$li_number = $_POST['li_number'];	
$email = $_POST['email'];
$pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);
$conPass = $_POST['conPass'];

	
/*$image_path = '';*/	

$date = date("Y-m-d H:i:sa");
$date_y  = explode("-", $date);
	
		$str = "INSERT INTO mod_customer (`id_customer`, `forename`, `surename`, `email`, `id_card`, `license_number` ,`create_datetime`,`status`)

        VALUES ('$id_customer', '$fname', '$sname', '$email', '$idcard', '$li_number', '$date','2')";

    $query = $db->Query($str);
	
	$sql = "SELECT * FROM roles WHERE tag = 'mod_customer' ";
    $query = $db->Query($sql);
    $result = mysqli_fetch_array($query);
	
	$id_date_role = $result['id_role'];
	
	/*$str2 = "INSERT INTO roles (`id_role`, `name`, `tag` , `update_datetime`)
        VALUES ('$id_role', '$fname' , 'mod_customer', '$date')";*/
    /*$query2 = $db->Query($str2);*/
	
	$str3 = "INSERT INTO user_images (`id_image`, `id_user` , `date` , `directory`, `active`, `type`) VALUES ('', '$id_customer', '$date', '../../uploads/$date_y[0]/mod_customer/' , '1', '1')";
    $query3 = $db->Query($str3);
	
	$str4 = "INSERT INTO user_address (`id_address`, `id_user`, `address`, `district`, `amphur`, `province`, `postcode`, `type`, `status`, `create_datetime`) VALUES ('', '$id_customer', '', '', '', '', '', '1', '1', '$date')";

    $query4 = $db->Query($str4);
    //  var_dump($objConnect->error);

/*$str = "INSERT INTO mod_customer_image (id_image,id_employee)

        VALUES ('','$id_employee')";

      
    $query = mysqli_query($objConnect,$str); */ 
    //  var_dump($objConnect->error);    

if($query){
  
$strSQL3 ="INSERT INTO users";
$strSQL3 .= "(`id_user`, `user_name`, `user_password`, `user_email`, `create_datetime`, `update_datetime` ,`id_data_role`,`id_role`)";
$strSQL3 .= "VALUES ";
$strSQL3 .= "('$id_member','$email','$pass','$email','$date','$date','$id_customer', '$id_date_role')";
$objQuery3 = $db->Query($strSQL3);




  echo json_encode(array('status' => '1','message'=> "สำเร็จ."));
}else{
  echo json_encode(array('status' => '0','message'=> "ผิดพลาด: "));
}

    
}


function save_otp(){ 
  require_once '../../engine/lib/connect.php';
  $db = new DB (); 
  
  $idcard = $_POST['idcard'];

  $chars = "23456789";
$ret_char = "";
        
        $num = strlen($chars);
        for($i = 0; $i < 6; $i++) {
            $ret_char.= $chars[rand()%$num];
            $ret_char.=""; 
        }
        $otp_input =  $ret_char; 

  $strotp ="UPDATE `member` SET `OTP` = '$otp_input' WHERE `member`.`id_card` = '$idcard' ";
  $objQueryotp = $db->Query($strotp);
}


function check_otp(){
require_once '../../engine/lib/connect.php';
  $db = new DB ();  
  // require_once 'admin/library/functions.php';
  header('Content-Type: application/json');

  $sql = 'SELECT * FROM member WHERE id_card = "'.$_POST['idcard'].'"  AND OTP = "'.$_POST['login'].'" ';
  $query = $db->Query($sql);
  $num = mysqli_num_rows($query);

  if($num>0){
    echo json_encode(array('status' => '1', 'message' => 'มี'));
  }else{
    echo json_encode(array('status' => '0', 'message' => 'ไม่มี'));
  }
}


function CHECK_NUMBER_LI(){	
  require_once '../../engine/lib/connect.php';
  $db = new DB ();	
  // require_once 'admin/library/functions.php';
  header('Content-Type: application/json');
 

	$sql = 'SELECT * FROM mod_customer WHERE license_number = "'.$_POST['li_number'].'" ';
	$query = $db->Query($sql);
	$num = mysqli_num_rows($query);
	if($num>0){
		echo json_encode(array('status' => '1', 'message' => $sql));
	}else{
		echo json_encode(array('status' => '0', 'message' => $sql));
	}
}

function CHECK_IDCARD(){	
  require_once '../../engine/lib/connect.php';
  $db = new DB ();	
  // require_once 'admin/library/functions.php';
  header('Content-Type: application/json');
 

//	$sql = 'SELECT * FROM mod_customer WHERE id_card = "'.$_POST['idcard'].'" ';
//	$query = $db->Query($sql);
//	$num = mysqli_num_rows($query);
//	if($num>0){
//		echo json_encode(array('status' => '1', 'message' => $sql));
//	}else{
//		echo json_encode(array('status' => '0', 'message' => $sql));
//	}
	$sql = 'SELECT * FROM member WHERE expire_date >= CURDATE() AND id_card = "'.$_POST['idcard'].'" ';
	$query = $db->Query($sql);
	$result = mysqli_fetch_array($query);
	$num = mysqli_num_rows($query);
	if($num>0){
			$sql_c = 'SELECT * FROM mod_customer WHERE id_card = "'.$_POST['idcard'].'" AND `delete_datetime` IS NOT NULL ';
			$query_c = $db->Query($sql_c);
			$result_c = mysqli_fetch_array($query_c);
			$num_c = mysqli_num_rows($query_c);
			if($num_c==0){
				echo json_encode(array('status' => '2', 'message' => $result));
			}
		else{
				echo json_encode(array('status' => '1', 'message' => 'ถูกใช้ไปแล้ว'));
			}
//		echo json_encode(array('status' => '1', 'message' => $result));
	}else{
		echo json_encode(array('status' => '0', 'message' => 'ผิดพลาด'));
	}
}

function CHECK_EMAIL(){
  require_once '../../engine/lib/connect.php';
  $db = new DB ();	
  // require_once 'admin/library/functions.php';
  header('Content-Type: application/json');
 

	$sql = 'SELECT * FROM mod_customer WHERE email = "'.$_POST['email'].'" AND `delete_datetime` IS null ';
	$query = $db->Query($sql);
	$num = mysqli_num_rows($query);
	if($num>0){
		echo json_encode(array('status' => '1', 'message' => $sql));
	}else{
		echo json_encode(array('status' => '0', 'message' => $sql));
	}
}



function  ADD_EDIT_CUTTOMER(){
require_once '../../engine/lib/connect.php';
header('Content-Type: application/json');
date_default_timezone_set("Asia/Bangkok");
$db = new DB ();	
// require_once 'admin/library/functions.php';
$date = date("Y-m-d H:i:sa");	

$id_customer=$_POST['id'];
$email = $_POST['email'];
$edit_email = $_POST['edit_email'];	
$pass = $_POST['pass'];
$fname = $_POST['fname'];
$sname = $_POST['sname'];
$tel = $_POST['tel'];
$idcard = $_POST['idcard'];
$li_number = $_POST['li_number'];
$taxnumber = $_POST['taxnumber'];
$address = $_POST['address'];
$district = $_POST['district'];
$amphoe = $_POST['amphoe'];
$province = $_POST['province'];
$zipcode = $_POST['edit_zipcode'];
$pass_og = $_POST['pass_og'];

if($pass == ""){
    $pass = $pass_og;  
} else {
    $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);
}

$conpass = $_POST['conpass'];

$sql = "SELECT * FROM mod_customer WHERE id_customer = '".$id_customer."'";
    $query = $db->Query($sql);
    $result = mysqli_fetch_array($query);
    
$sqlimg = "SELECT * FROM user_images WHERE id_user = '".$id_customer."'";
    $queryimg = $db->Query($sqlimg);
    $resultimg = mysqli_fetch_array($queryimg);
	
	$datetime_up = date("Y-m-d H:i:s");
	$date_img = explode("-", $datetime_up);

      if($_FILES['image']['name']!=''){
        $path = '../../uploads/'.$date_img[0].'';
        if(!is_dir($path)){
          mkdir($path,0777);
        }
		  
		$path = '../../uploads/'.$date_img[0].'/mod_customer';
        if(!is_dir($path)){
          mkdir($path,0777);
        }  

        $namefile = $_FILES["image"]["name"];
        $sur = strrchr($namefile, "."); //ตัดนามสกุลไฟล์เก็บไว้
        $name = "CUS-".(Date("dmy").rand('1000','9999').$sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
        $target = "../../uploads/$date_img[0]/mod_customer/".$name;
        $newname = $name;

        if(file_exists($target)){
          $oldname = pathinfo($name, PATHINFO_FILENAME);
          $ext = pathinfo($name, PATHINFO_EXTENSION);
          $newname = $oldname;
          do{
            $r = rand(1000,9999);
            $newname = $oldname."-".$r.".$ext";
            $target = "../../uploads/$date_img[0]/mod_customer/".$newname;
          }while (file_exists($target)); 
        }
        
        if(copy($_FILES["image"]["tmp_name"],iconv('UTF-8','windows-874',"../../uploads/$date_img[0]/mod_customer/".$newname))){
          // echo "Copy/Upload Complete<br>";
        }else{
          // echo "Copy/upload error<br>";
        }

        if($resultimg['name']!=''){
          unlink('../../uploads/'.$date_img[0].'/mod_customer/'.$resultimg['name']);
          $image_path = $newname;
        }else{
          $image_path = $newname;
        }
      }else{
        $image_path = $resultimg['name'];
      }

      $str = "UPDATE mod_customer SET ";
      $str .= "  forename = '".$fname."'";
      $str .= " ,surename = '".$sname."'";
      $str .= " ,id_card = '".$idcard."'";
      $str .= " ,license_number = '".$li_number."'";
      $str .= " ,email = '".$email."'";
      $str .= " ,telephone = '".$tel."'";
      $str .= " ,update_datetime = '".$date."'";
      $str .= "  WHERE id_customer = '".$id_customer."'";
      $query = $db->Query($str);
    
      $str = "UPDATE user_images SET ";
      $str .= "  name = '".$image_path."'";
	  /*$str .= " ,directory = '".$target."'";*/
	  $str .= " ,date = '".$date."'";
      $str .= "  WHERE id_user = '".$id_customer."'";
      $query = $db->Query($str);
	
	  $str = "UPDATE user_address SET ";
      $str .= "  tax_number = '".$taxnumber."'";
      $str .= " ,address = '".$address."'";
	  $str .= " ,district = '".$district."'";
	  $str .= " ,amphur = '".$amphoe."'";
	  $str .= " ,province = '".$province."'";
	  $str .= " ,postcode = '".$zipcode."'";
	  $str .= " ,update_datetime = '".$date."'";
      $str .= "  WHERE id_user = '".$id_customer."'";
      $query = $db->Query($str);
        
// echo $str;
    
      if($query){

        $strSQL3 = "UPDATE users SET
        user_name = '$edit_email'
        ,user_password = '$pass'
        ,update_datetime = '$date'
        WHERE id_data_role = '$id_customer'";
        $objQuery3 = $db->Query($strSQL3);

       	echo json_encode(array('status' => '1', 'message' => $str));
      	}else{
		    echo json_encode(array('status' => '0', 'message' => $str));
      }

}


function  ADD_EDIT_PARTNER(){
require_once '../../engine/lib/connect.php';
header('Content-Type: application/json');
date_default_timezone_set("Asia/Bangkok");
$db = new DB ();	
// require_once 'admin/library/functions.php';
$date = date("Y-m-d H:i:sa");	

$id_partner=$_POST['id'];
$email = $_POST['email'];
$edit_email = $_POST['edit_email'];	
$pass = $_POST['pass'];
$fname = $_POST['fname'];
$tel = $_POST['tel'];
$idcard = $_POST['idcard'];
$taxnumber = $_POST['taxnumber'];
$address = $_POST['address'];
$district = $_POST['district'];
$amphoe = $_POST['amphoe'];
$province = $_POST['province'];
$zipcode = $_POST['edit_zipcode'];
$pass_og = $_POST['pass_og'];

if($pass == ""){
    $pass = $pass_og;  
} else {
    $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);
}

$conpass = $_POST['conpass'];

$sql = "SELECT * FROM partner WHERE id_partner = '".$id_partner."'";
    $query = $db->Query($sql);
    $result = mysqli_fetch_array($query);
    
$sqlimg = "SELECT * FROM user_images WHERE id_user = '".$id_partner."'";
    $queryimg = $db->Query($sqlimg);
    $resultimg = mysqli_fetch_array($queryimg);
	
	$datetime_up = date("Y-m-d H:i:s");
	$date_img = explode("-", $datetime_up);

      if($_FILES['image']['name']!=''){
        $path = '../../uploads/'.$date_img[0].'';
        if(!is_dir($path)){
          mkdir($path,0777);
        }
		  
		$path = '../../uploads/'.$date_img[0].'/mod_partner';
        if(!is_dir($path)){
          mkdir($path,0777);
        }  

        $namefile = $_FILES["image"]["name"];
        $sur = strrchr($namefile, "."); //ตัดนามสกุลไฟล์เก็บไว้
        $name = "PARTNER-".(Date("dmy").rand('1000','9999').$sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
        $target = "../../uploads/$date_img[0]/mod_partner/".$name;
        $newname = $name;

        if(file_exists($target)){
          $oldname = pathinfo($name, PATHINFO_FILENAME);
          $ext = pathinfo($name, PATHINFO_EXTENSION);
          $newname = $oldname;
          do{
            $r = rand(1000,9999);
            $newname = $oldname."-".$r.".$ext";
            $target = "../../uploads/$date_img[0]/mod_partner/".$newname;
          }while (file_exists($target)); 
        }
        
        if(copy($_FILES["image"]["tmp_name"],iconv('UTF-8','windows-874',"../../uploads/$date_img[0]/mod_partner/".$newname))){
          // echo "Copy/Upload Complete<br>";
        }else{
          // echo "Copy/upload error<br>";
        }

        if($resultimg['name']!=''){
          unlink('../../uploads/'.$date_img[0].'/mod_partner/'.$resultimg['name']);
          $image_path = $newname;
        }else{
          $image_path = $newname;
        }
      }else{
        $image_path = $resultimg['name'];
      }

      $str = "UPDATE partner SET ";
      $str .= "  name_th = '".$fname."'";
      $str .= " ,tax_id = '".$idcard."'";
      $str .= " ,email = '".$email."'";
      $str .= " ,telephone = '".$tel."'";
      $str .= " ,update_datetime = '".$date."'";
      $str .= "  WHERE id_partner = '".$id_partner."'";
      $query = $db->Query($str);
    
      $str = "UPDATE user_images SET ";
      $str .= "  name = '".$image_path."'";
	  /*$str .= " ,directory = '".$target."'";*/
	  $str .= " ,date = '".$date."'";
      $str .= "  WHERE id_user = '".$id_partner."'";
      $query = $db->Query($str);
	
	$sql = 'SELECT * FROM user_address WHERE id_user = "'.$id_partner.'" ';
	$query = $db->Query($sql);
	$num = mysqli_num_rows($query);
	if($num>0){
		
	  $str = "UPDATE user_address SET ";
      $str .= "  tax_number = '".$taxnumber."'";
      $str .= " ,address = '".$address."'";
	  $str .= " ,district = '".$district."'";
	  $str .= " ,amphur = '".$amphoe."'";
	  $str .= " ,province = '".$province."'";
	  $str .= " ,postcode = '".$zipcode."'";
	  $str .= " ,update_datetime = '".$date."'";
      $str .= "  WHERE id_user = '".$id_partner."'";
      $query = $db->Query($str);
		
	}else{
	  $str = "INSERT INTO user_address (`id_address`, `id_user`, `tax_number`, `address`, `district`, `amphur`, `province`, `postcode`, `telephone`, `type`, `status`, `create_id`, `create_datetime`) 
      VALUES('','$id_partner','$taxnumber','$address','$district','$amphoe','$province','$zipcode','','1','4','','$date')";
      $query = $db->Query($str); 	
	}
	    
// echo $str;
      if($query){

        $strSQL3 = "UPDATE users SET
        user_name = '$edit_email'
        ,user_password = '$pass'
        ,update_datetime = '$date'
        WHERE id_data_role = '$id_partner'";
        $objQuery3 = $db->Query($strSQL3);

       	echo json_encode(array('status' => '1', 'message' => $str));
      	}else{
		    echo json_encode(array('status' => '0', 'message' => $str));
      }
}

function  ADD_EDIT_TUTOR(){
require_once '../../engine/lib/connect.php';
header('Content-Type: application/json');
date_default_timezone_set("Asia/Bangkok");
$db = new DB ();	
// require_once 'admin/library/functions.php';
$date = date("Y-m-d H:i:sa");	

$id_tutor=$_POST['id'];
$email = $_POST['email'];
$edit_email = $_POST['edit_email'];	
$pass = $_POST['pass'];
$fname = $_POST['fname'];
$sname = $_POST['sname'];	
$tel = $_POST['tel'];
$idcard = $_POST['idcard'];
$li_number = $_POST['li_number'];
$address = $_POST['address'];
$district = $_POST['district'];
$amphoe = $_POST['amphoe'];
$province = $_POST['province'];
$zipcode = $_POST['zipcode'];
$pass_og = $_POST['pass_og'];
$detail_p = $_POST['profile_th'];
	
$category = '';	
for ($i=0; $i < count($_POST["category"]) ; $i++) { 
		$category .= $_POST["category"][$i].',';
	}
$categories = $db->clear($category);
	

if($pass == ""){
    $pass = $pass_og;  
} else {
    $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);
}

$conpass = $_POST['conpass'];

$sql = "SELECT * FROM tutor WHERE id_tutor = '".$id_tutor."'";
    $query = $db->Query($sql);
    $result = mysqli_fetch_array($query);
    
$sqlimg = "SELECT * FROM user_images WHERE id_user = '".$id_tutor."'";
    $queryimg = $db->Query($sqlimg);
    $resultimg = mysqli_fetch_array($queryimg);
	
	$datetime_up = date("Y-m-d H:i:s");
	$date_img = explode("-", $datetime_up);

      if($_FILES['image']['name']!=''){
        $path = '../../uploads/'.$date_img[0].'';
        if(!is_dir($path)){
          mkdir($path,0777);
        }
		  
		$path = '../../uploads/'.$date_img[0].'/mod_tutor';
        if(!is_dir($path)){
          mkdir($path,0777);
        }  

        $namefile = $_FILES["image"]["name"];
        $sur = strrchr($namefile, "."); //ตัดนามสกุลไฟล์เก็บไว้
        $name = "TUTOR-".(Date("dmy").rand('1000','9999').$sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
        $target = "../../uploads/$date_img[0]/mod_tutor/".$name;
        $newname = $name;

        if(file_exists($target)){
          $oldname = pathinfo($name, PATHINFO_FILENAME);
          $ext = pathinfo($name, PATHINFO_EXTENSION);
          $newname = $oldname;
          do{
            $r = rand(1000,9999);
            $newname = $oldname."-".$r.".$ext";
            $target = "../../uploads/$date_img[0]/mod_tutor/".$newname;
          }while (file_exists($target)); 
        }
        
        if(copy($_FILES["image"]["tmp_name"],iconv('UTF-8','windows-874',"../../uploads/$date_img[0]/mod_tutor/".$newname))){
          // echo "Copy/Upload Complete<br>";
        }else{
          // echo "Copy/upload error<br>";
        }

        if($resultimg['name']!=''){
          unlink('../../uploads/'.$date_img[0].'/mod_tutor/'.$resultimg['name']);
          $image_path = $newname;
        }else{
          $image_path = $newname;
        }
      }else{
        $image_path = $resultimg['name'];
      }

      $str = "UPDATE tutor SET ";
      $str .= "  forename_th = '".$fname."'";
	  $str .= " ,surename_th = '".$sname."'";
      $str .= " ,id_card = '".$idcard."'";
	  $str .= " ,license_number = '".$li_number."'";
	  $str .= " ,categories = '".$categories."'";
	  $str .= " ,profile_th = '".$detail_p."'";
      $str .= " ,email = '".$email."'";
      $str .= " ,telephone = '".$tel."'";
      $str .= " ,update_datetime = '".$date."'";
      $str .= "  WHERE id_tutor = '".$id_tutor."'";
      $query = $db->Query($str);
    
      $str = "UPDATE user_images SET ";
      $str .= "  name = '".$image_path."'";
	  /*$str .= " ,directory = '".$target."'";*/
	  $str .= " ,date = '".$date."'";
      $str .= "  WHERE id_user = '".$id_tutor."'";
      $query = $db->Query($str);
	
	  $sql = 'SELECT * FROM user_address WHERE id_user = "'.$id_tutor.'" ';
	  $query = $db->Query($sql);
	  $num = mysqli_num_rows($query);
	  if($num>0){
		
	  $str = "UPDATE user_address SET ";
      $str .= " address = '".$address."'";
	  $str .= " ,district = '".$district."'";
	  $str .= " ,amphur = '".$amphoe."'";
	  $str .= " ,province = '".$province."'";
	  $str .= " ,postcode = '".$zipcode."'";
	  $str .= " ,update_datetime = '".$date."'";
      $str .= "  WHERE id_user = '".$id_tutor."'";
      $query = $db->Query($str);
		
	}else{
	  $str = "INSERT INTO user_address (`id_address`, `id_user`, `address`, `district`, `amphur`, `province`, `postcode`, `telephone`, `type`, `status`, `create_id`, `create_datetime`) 
      VALUES('','$id_tutor','$address','$district','$amphoe','$province','$zipcode','','1','2','','$date')";
      $query = $db->Query($str); 	
	}
	    
// echo $str;
      if($query){

        $strSQL3 = "UPDATE users SET
        user_name = '$edit_email'
        ,user_password = '$pass'
        ,update_datetime = '$date'
        WHERE id_data_role = '$id_tutor'";
        $objQuery3 = $db->Query($strSQL3);

       	echo json_encode(array('status' => '1', 'message' => $str));
      	}else{
		    echo json_encode(array('status' => '0', 'message' => $str));
      }
}


function CHACK_NEW_PASS(){

  require_once 'admin/library/connect.php';
  header('Content-Type: application/json');
  date_default_timezone_set("Asia/Bangkok");

	if(isset($_POST["username"]) && isset($_POST["password"]) ){
		$username = $_POST["username"];
		$password = $_POST["password"];
		// require 'config.php';
		$str = "SELECT * FROM tbl_member WHERE user_member = '".$username."' ";
		$query = mysqli_query($objConnect, $str);
		$result = mysqli_fetch_array($query);
		$row = mysqli_num_rows($query);
		if(!$result) {
			echo json_encode(array('status' => '0','message'=> 'Error login data!'));
		}else{

			if($result['data_role']=='mod_customer'){ // ไปหน้าบ้าน
				$hash = $result['pass_member'];
				if(password_verify($password,$hash)){
						$str_customer = 'SELECT * FROM mod_customer WHERE id_customer = "'.$result['id_data_role'].'"';
						$query_customer = mysqli_query($objConnect,$str_customer);
						// $_SESSION["user_id"] = session_id();
						// $_SESSION["user_member"] = $result['id_member'];
						// $_SESSION["id_customer"] = $result['id_data_role'];
						// $_SESSION['permission'] = 'customer';
						// $_SESSION["task_view"] = '';
						// $_SESSION["task_authen"] = '';


					echo json_encode(array('status' => '1','message'=> $_SESSION['permission']));
				}else{
					echo json_encode(array('status' => '0','message'=> $password));
				}
			}
		}
		mysqli_close($objConnect);

	}
  

}






function CREATE_COMMENTNEWS(){
  require_once 'admin/library/connect.php';
  header('Content-Type: application/json');
  date_default_timezone_set("Asia/Bangkok");
    
$id_news=$_POST['id'];
    
    $sql2 = "INSERT INTO mod_comnews (id_comnews,name_comnews,detail_comnews,img_path,id_news) 
    VALUES('','','".$_POST['message']."','','".$id_news."')";
    $query2 = mysqli_query($objConnect,$sql2);


		if($query2){
      
			echo json_encode(array('status' => '1', 'message' => $sql2));
		}else{
			echo json_encode(array('status' => '0', 'message' => $sql2));
		}

}



 ?>




 <?php
 function ADD_COMPANY(){
   require_once '../engine/lib/connect.php';
   $db = new DB ();	 
   header('Content-Type: application/json');
   date_default_timezone_set("Asia/Bangkok");
   $date = date("Y-m-d H:i:sa");
	 
   $company_id = setMD5();
   $member_id = $_SESSION["id_customer"];

   $str = "INSERT INTO company (`id`, `member_id`, `tax_id`, `name`, `address`, `district`, `amphoe`, `province`, `zipcode`, `telephone`, `email`, `fax`, `create_by`, `create_time`)

   VALUES ('$company_id',  
   '$member_id',
   '".$_POST['taxpayer_number']."',
   '".$_POST['company']."',
   '".$_POST['address']."',
   '".$_POST['district_1']."',
   '".$_POST['district_2']."',
   '".$_POST['province']."',
   '".$_POST['zip_code']."',
   '',
   '',
   '',
   '".$_SESSION["id_customer"]."',
   '$date')";

   $query = $db->Query($str);  

   if($query){
     echo json_encode(array('status' => '1','message'=> "เพิ่มข้อมูลสำเร็จ. "));
   }else{
     echo json_encode(array('status' => '0','message'=> "ผิดพลาด: ".$str));
   }


 }

 function SELECTOR_COMPANY(){
   require_once '../engine/lib/connect.php';
   $db = new DB ();
   header('Content-Type: application/json');
 

 	$sql = 'SELECT * FROM company WHERE id = "'.$_POST['id_company'].'" ';
   //$query = mysqli_query($objConnect,$sql);
   // echo 	$sql;

   $resultArray = array();
   $query = $db->Query($sql);
   while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)){
      //  $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
       array_push($resultArray, $result);
   }
   echo json_encode(['data'=> $resultArray]);
  

 }

 function SE_COMPANY(){
   require_once '../engine/lib/connect.php';
   $db = new DB ();
   header('Content-Type: application/json');
  
   $sql = 'SELECT * FROM company WHERE member_id = "'.$_SESSION["id_customer"].'" ORDER BY create_time DESC';

   $resultArray = array();
   $query = $db->Query($sql);
   while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)){
       array_push($resultArray, $result);
   }
   echo json_encode(['data'=> $resultArray]);
  

 }

function SE_PAYLIST(){
  require_once '../engine/lib/connect.php';
  $db = new DB ();
  header('Content-Type: application/json');
 
  
	$sql = 'SELECT * FROM  payment_history WHERE member_id = "'.$_SESSION['id_customer'].'" AND status = 0 OR status = 2 ';

  $resultArray = array();
  $query = $db->Query($sql);
  while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)){
      array_push($resultArray, $result);
  }
  echo json_encode(['data'=> $resultArray]);
}

function SE_PAYLIST_check(){
  require_once '../engine/lib/connect.php';
  $db = new DB ();
  header('Content-Type: application/json');
 
  
	$sql = 'SELECT * FROM  payment_history WHERE member_id = "'.$_SESSION['id_customer'].'" AND status = 2 ';

  $resultArray = array();
  $query = $db->Query($sql);
  while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)){
      array_push($resultArray, $result);
  }
  echo json_encode(['data'=> $resultArray]);
}

 function se_pay(){
   require_once '../engine/lib/connect.php';
   $db = new DB ();	 
   header('Content-Type: application/json');
 
  
 	$sql = 'SELECT total , credit , id ,rid FROM payment_history WHERE status = 0 AND id = "'.$_POST["id"].'" ';

   $resultArray = array();
   $query = $db->Query($sql);
   while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)){
       array_push($resultArray, $result);
   }
   echo json_encode(['data'=> $resultArray]);
 }




   

 function CHECK_COPON(){
   require_once '../engine/lib/connect.php';
   $db = new DB ();	  
   // require_once 'admin/library/functions.php';
   header('Content-Type: application/json');
 

 	$sql = 'SELECT * FROM coupon WHERE code  LIKE "%'.$_POST['coupon'].'%" ';
  
   $resultArray = array();
   $query = $db->Query($sql);
   $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
   array_push($resultArray, $result);
   // echo json_encode(['data'=> $resultArray]);

 	$num = mysqli_num_rows($query);
 	if($num>0){
 		echo json_encode(array('status' => '1', 'data'=> $resultArray ));
 	}else{
 		echo json_encode(array('status' => '0', 'data'=> $resultArray ));
   }
  
 }


 function ADD_NEXT(){

   require_once '../engine/lib/connect.php';
   $db = new DB ();	 
   // require_once 'admin/library/functions.php';
   header('Content-Type: application/json');
   date_default_timezone_set("Asia/Bangkok");
  
   $date = date("Y-m-d H:i:sa");
   $payment_history_id = setMD5();

 
   if(isset($_POST['not_slip'])){
     $receipt = $_POST['not_slip'];
   }else{
     $receipt = 0;
   } 
       $str = "INSERT INTO payment_history (`id`, `rid`, `refno`, `customeremail`, `productdetail`, `total`, `credit`, `status`, `cardtype`, `status_address`, `create_by`, `create_time`, `company_id`, `coupon_code`, `receipt`, `credit_expire`, `member_id`)
  
           VALUES (
		   '$payment_history_id',  
           '".$_POST['rid']."',
           '".$_POST['refno']."',
           '".$_POST['email']."',
           'ชำระเงิน',
           '".$_POST['price']."',
           '".$_POST['credit']."',
           '0',
           '',
           '',
           '".$_SESSION['id_customer']."',
           '$date',
           '".$_POST['company_id']."',
           '".$_POST['coupon']."',
           '$receipt',
           '".$_POST['credit_expire']."',
           '".$_SESSION['id_customer']."')";
  
        
       $query = $db->Query($str);  
       //  var_dump($objConnect->error);
  
  
   if($query){
	   
     $sql = 'SELECT used FROM `coupon` WHERE id = "'.$_POST['id_coupon'].'" ';
     $query = $db->Query($sql);  
     $result = mysqli_fetch_array($query);

     $used = $result['used'];
     $used += 1 ; 
     $str = "UPDATE coupon SET used =  $used WHERE id = '".$_POST['id_coupon']."' ";
     $query = $db->Query($str);



     echo json_encode(array('status' => '1','message'=> "SUCCESS NEW RECORD. "));
   }else{
     echo json_encode(array('status' => '0','message'=> "ERROR: ".$str));
   }
  
  
   }


   function PAY_PAL_COMPLETED(){
     require_once '../engine/lib/connect.php';
	   $db = new DB ();
     header('Content-Type: application/json');
     date_default_timezone_set("Asia/Bangkok");
    
     $date = date("Y-m-d H:i:sa");

     // $payment_amount = $_POST['payment_amount'];

     $str = "INSERT INTO payments (`transaction_id`, `payer_id`, `payment_amount`, `payment_status`, `payment_currency`, `invoice_id`, `create_datetime`, `create_by`)
  
     VALUES ('".$_POST['transaction_id']."', 
     '".$_POST['payer_id']."',
     '".$_POST['payment_amount']."',
     '".$_POST['payment_status']."',
     '".$_POST['payment_currency']."',
     '".$_POST['invoice_id']."',
     '$date',
     '".$_SESSION['id_customer']."'
     )";



           $query = $db->Query($str);  

           if($query){


             $str = "UPDATE payment_history SET status = 1 ,payment_type =   '".$_POST['pay_type']."' WHERE id = '".$_POST['pm_his_id']."' ";
             $query = $db->Query($str);


 // -----------------------------------------------------------------------------------------------------
             $sql1 = 'SELECT credit FROM `member` WHERE id = "'.$_SESSION['id_customer'].'" ';
             $query1 = $db->Query($sql1);  
             $result1 = mysqli_fetch_array($query1);



             $sql0 = 'SELECT credit FROM `payment_history` WHERE id = "'.$_POST['pm_his_id'].'" ';
             $query0 = $db->Query($sql0);  
             $result0 = mysqli_fetch_array($query0);


             $credit_0 = $result0['credit'];
             $credit_1 = $result1['credit'];


             $credit_update = $credit_1 +  $credit_0 ;


             $str2 = "UPDATE member SET credit =  $credit_update WHERE id = '".$_SESSION['id_customer']."' ";
             $query2 = $db->Query($str2);


             if($query2){
              
               $credit_history_id = setMD5();

               $str = "INSERT INTO credit_history (`id`, `rid`, `credit`, `create_time`, `create_by`)
  
               VALUES ('$credit_history_id', 
               '".$_POST['invoice_id']."',
               '".$_POST['payment_amount']."',   
    
               '$date',
               '".$_SESSION['id_customer']."'
               )";

                $query = $db->Query($str);  
             }



             echo json_encode(array('status' => '1','message'=> "SUCCESS NEW RECORD. "));
           }else{
             echo json_encode(array('status' => '0','message'=> "ERROR: ".$str));
           }


   }
function CREATE_SLIP(){
     
  require_once '../engine/lib/connect.php';
  $db = new DB ();
  header('Content-Type: application/json');
  date_default_timezone_set("Asia/Bangkok");
  
  $date = date("Y-m-d H:i:sa");
  $id_customer = $_SESSION['id_customer'];

header('Content-Type: application/json');
    if($_FILES['image']['name']!=''){
		$datetime_up = date("Y-m-d H:i:s");
		$date_img = explode("-", $datetime_up);
		
		$path_date = '../uploads/'.$date_img[0].'';
			if(!is_dir($path_date)){
				mkdir($path_date,0777);
			}
					$path = '../uploads/'.$date_img[0].'/slip';
					if(!is_dir($path)){
						mkdir($path,0777);
					}

        $namefile = $_FILES["image"]["name"];
        $sur = strrchr($namefile, "."); //ตัดนามสกุลไฟล์เก็บไว้
        $name = "SP-".(Date("dmy").rand('1000','9999').$sur); //ผมตั้งเป็น วันที่_เวลา.นามสกุล
        $target = "../uploads/$date_img[0]/slip/".$name;
        $newname = $name;

        if(file_exists($target)){
            $oldname = pathinfo($name, PATHINFO_FILENAME);
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            $newname = $oldname;
            do{
                $r = rand(1000,9999);
                $newname = $oldname."-".$r.".$ext";
                $target = "../uploads/$date_img[0]/slip/".$newname;
            }while (file_exists($target)); 
        }
        
        copy($_FILES["image"]["tmp_name"],iconv('UTF-8','windows-874',"../uploads/$date_img[0]/slip/".$newname));
        
        $image_path = $newname;

    }else{
        $image_path = '';
    }

    // $sql = "UPDATE mod_transection SET status = 1 WHERE id_transection = '".$_POST['id_transection']."'";
    // $query = mysqli_query($objConnect,$sql);

    $sql = "INSERT INTO mod_order_slip ( `id_order`, `id_payment`, `price_in`, `slip_datetime`, `path_slip`) 
    VALUES(
      '".$_POST['pm_his_id']."',
      '".$_POST['id_payment']."',
      '".$_POST['pay_price_num']."',
      '$date',
      '$image_path' )";
// echo $sql;
	 $str2 = "UPDATE payment_history SET status = 2 where rid = '".$_POST['invoice_id']."' ";
     $query2 = $db->Query($str2);


    $query = $db->Query($sql);

    if($query){
        echo json_encode(array('status' => '1', 'message' => $sql));
    }else{
        echo json_encode(array('status' => '0', 'message' => $sql));
    }
  }
?>



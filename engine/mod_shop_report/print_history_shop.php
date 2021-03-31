<?php
error_reporting(E_ALL & ~E_NOTICE);
require_once '../lib/connect.php';
require_once '../lib/service.php';
require_once '../lib/config.php';
require_once '../lib/functions.php';

checkAdminUser();
$db = new DB();
$logo = getSetting('logo_img');
$logo = $logo == ""?HEAD_LOGO_MINI:$logo;

$name_th = getSetting('name_th');
$name_th = $name_th == ""?HEAD_LOGO_MINI:$name_th;

$address_th = getSetting('address_th');
$address_th = $address_th == ""?HEAD_LOGO_MINI:$address_th;
    
$telephone = getSetting('telephone');
$telephone = $telephone == ""?HEAD_LOGO_MINI:$telephone;

$email = getSetting('email');
$email = $email == ""?HEAD_LOGO_MINI:$email;

$id_customer = $_GET['id'];

$strSQL = "SELECT `id_customer`,`forename` FROM `mod_customer` WHERE `delete_datetime` IS null AND id_customer = '".$id_customer."' ";
$objQuery = $db->Query($strSQL);
$objResult = mysqli_fetch_array($objQuery);
$objResult_num = mysqli_num_rows($objQuery);

$strSQL_address = "SELECT `address`,`district`,`amphur`,`province`,`postcode` FROM `user_address` WHERE `delete_datetime` IS null AND id_user = '".$id_customer."' AND status = '1' ";
$objQuery_address = $db->Query($strSQL_address);
$objResult_address = mysqli_fetch_array($objQuery_address);
$objResult_num_address = mysqli_num_rows($objQuery_address);

$str_histor_shop = "SELECT `sales_store_id`,`sales_store_shop`,`sales_store_percent`,`sales_store_total`,`date_action`,`id_customer`,`create_datetime` FROM `mod_sales_store` WHERE id_customer = '".$id_customer."' ";
$objQuery_histor_shop = $db->Query($str_histor_shop);
$objResult_histor_shop = mysqli_fetch_array($objQuery_histor_shop);

if($objResult_num == '0'){
 ?> 
<script>
	window.location.href = "front_manage.php";
</script>
<?php    
}
else { ?>

    <!DOCTYPE html>
    <html lang="th">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>รายงานยอดขายร้านค้า <?php echo $objResult["forename"]; ?></title>
            <link href="cssa4/bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <!-- Custom styles  -->
            <link href="cssa4/CssA4.css" rel="stylesheet">
            <link href="cssa4/CssCustom.css" rel="stylesheet">
        </head>
        <body>

        <div class="bodystarter"></div>
<?php
function navcssa4() {
            ?>
            <nav class="navbar navbar-inverse navbar-fixed-top" id="non-printable">
                <div class="container">
<!--
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
-->
                    <div id="navbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-left">
                            <li><a href="#" onClick="window.history.back()"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Back</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a>View 1/1</a></li>
                            <li><a href="" onClick="window.print()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </nav>
            <?php
        }

function closecssa4() {
            ?>
            <script src="../../plugins_b/jquery/jquery.min.js"></script>
            <script src="cssa4/bootstrap/js/bootstrap.min.js"></script>
        </body>
    </html>
    <?php
}

function Convert($amount_number)
{
    $amount_number = number_format($amount_number, 2, ".","");
    $pt = strpos($amount_number , ".");
    $number = $fraction = "";
    if ($pt === false)
        $number = $amount_number;
    else
    {
        $number = substr($amount_number, 0, $pt);
        $fraction = substr($amount_number, $pt + 1);
    }

    $ret = "";
    $baht = ReadNumber ($number);
    if ($baht != "")
        $ret .= $baht . "บาท";

    $satang = ReadNumber($fraction);
    if ($satang != "")
        $ret .=  $satang . "สตางค์";
    else
        $ret .= "ถ้วน";
    return $ret;
}

function ReadNumber($number)
{
    $position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
    $number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
    $number = $number + 0;
    $ret = "";
    if ($number == 0) return $ret;
    if ($number > 1000000)
    {
        $ret .= ReadNumber(intval($number / 1000000)) . "ล้าน";
        $number = intval(fmod($number, 1000000));
    }

    $divider = 100000;
    $pos = 0;
    while($number > 0)
    {
        $d = intval($number / $divider);
        $ret .= (($divider == 10) && ($d == 2)) ? "ยี่" :
            ((($divider == 10) && ($d == 1)) ? "" :
            ((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
        $ret .= ($d ? $position_call[$pos] : "");
        $number = $number % $divider;
        $divider = $divider / 10;
        $pos++;
    }
    return $ret;
}

global $ary_month;
$ary_month = array(
		"TH_ABBR" => array(1=>"ม.ค.", 2=>"ก.พ.", 3=>"มี.ค.", 4=>"เม.ย.", 5=>"พ.ค.", 6=>"มิ.ย.", 7=>"ก.ค.", 8=>"ส.ค.", 9=>"ก.ย.", 10=>"ต.ค.", 11=>"พ.ย.", 12=>"ธ.ค."),
		"TH_FULL" => array(1=>"มกราคม", 2=>"กุมภาพันธ์", 3=>"มีนาคม", 4=>"เมษายน", 5=>"พฤษภาคม", 6=>"มิถุนายน", 7=>"กรกฎาคม", 8=>"สิงหาคม", 9=>"กันยายน", 10=>"ตุลาคม", 11=>"พฤศจิกายน", 12=>"ธันวาคม"),
		"EN_ABBR" => array(1=>"Jan", 2=>"Feb", 3=>"Mar", 4=>"Apr", 5=>"May", 6=>"Jun",7=>"Jul", 8=>"Aug",9=>"Sep", 10=>"Oct", 11=>"Nov", 12=>"Dec"),
		"EN_FULL" => array(1=>"January", 2=>"Febuary", 3=>"March", 4=>"April", 5=>"May", 6=>"June", 7=>"July", 8=>"August", 9=>"September", 10=>"October", 11=>"November", 12=>"December"),
);

function setdatetime($input, $output, $digit_only = false, $month_idx="TH_ABBR"){
	global $ary_month;
	if($input == "0000-00-00 00:00" or $input == "0000-00-00" or $input == "") return "";
	$input = str_replace("/", "-", $input);
	list($ary_date, $ary_time) = explode(' ', $input);
	list($year, $month, $day) = explode('-', $ary_date);
	@list($hour, $min, $sec) = explode(':', $ary_time);
	$thai = (strtoupper(substr($month_idx,0,2)) == "TH")? true : false;
	$year = ($thai)? ($year+543) : $year;
	$ary_tmp = array();

	$ary_tmp['YYYY'] = $year;
	$ary_tmp['YY'] = substr($year, 2, 2);
	$ary_tmp['MM'] = ($digit_only)? $month : "</div><span class='s17'>".$ary_month[$month_idx][intval($month)]."</span><div class='s13'>";
	$ary_tmp['DD'] = $day;
	$ary_tmp['HR'] = $hour;
	$ary_tmp['MN'] = $min;
	$ary_tmp['SC'] = $sec;
	return str_replace(array_keys($ary_tmp), array_values($ary_tmp), $output);
}
//opencssa4();
navcssa4();

?>

<page size="A4" class="page" >
    <div class="page-padding">
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td align="left"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="17%"><table table width="100%">
<!--                            <img src="Assets/plugins/cssa4/logo_b.png" width="125" />-->
                            <img src="<?php echo $logo; ?>" alt="homepage" class="dark-logo" style="height:135px; padding: 5px;"/>      
                        </tr>
                        <tr>
                            <td align="left">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="left">&nbsp;</td>
                        </tr>
                    </table></td>

                <td  align="left" width="63%"><table table width="100%">
                        <tr>
                        <tr>
                            <td align="left"><div class="thick23"><?php echo $name_th; ?></div></td>
                        </tr>
                        <td align="left">
                            <div class="s13"><?php echo $address_th;?></div></br>
                            โทร : <div class="s13"><?php echo $telephone;?></div> อีเมล : <?php echo $email;?> </br>
<!--                            เลขทะเบียนพาณิชย์ / เลขที่ผู้เสียภาษี : <div class="s13">1330400130896</div></td>-->
            </tr>
            <tr>
                <td align="left">&nbsp;</td>
            </tr>
        </table></td>

        <td  align="right" width="20%"><table table width="100%" border="0" cellpadding="0" cellspacing="0" >
                <tr>
                    <td align="right" colspan="2"><div class="thick23"><?php echo $_POST["Document"]; ?></div></td>
                </tr>
                <tr>
                    <td align="right">เลขที่</td>
                    <td align="right"><div class="s13"><?php echo substr($objResult_histor_shop['sales_store_id'], 0 ,11); ?></div></td>
                </tr>
                <tr>
                    <td align="right">วันที่</td>
                    <td align="right"><div class="s13"><?php echo setdatetime($objResult_histor_shop["create_datetime"],"DD MM YYYY"); ?></div></td>
                </tr>
                <tr>

                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
            </table></td>
        </tr>
        </table></td>
        </tr>

        <tr>
            <td align="left"><table width="100%" align="left" cellpadding="0" cellspacing="0">
                    <tr>
                        <th colspan="2" ><div class="thick15">ร้านค้า</div></th>
                    </tr>
                    <tr>
                        <td align="left"><div class="s15"><?php echo $objResult["forename"]; ?>
                                 &nbsp; | ที่อยู่ : 
                            <?php if ($objResult_num_address == '0') {
                                echo 'ยังไม่ได้ระบุ';
                            } else { ?>
                            <?php echo $objResult_address["address"].' ตำบล '.$objResult_address["district"].' อำเภอ '.$objResult_address["amphur"].' จังหวัด '.$objResult_address["province"].' '.$objResult_address["postcode"];?>
                            <?php } ?>
                            </div></td>
                    </tr>
                </table></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td align="left"><table width="100%" cellpadding="0" cellspacing="0" border="1">
                    <tr class="borderbot">
                        <td width="55%" align="left"><div class="thick15">รายการ</div></td>
                        <td width="15%" align="right"><div class="thick15">ยอดรวม</div></td>
                        <td width="15%" align="right"><div class="thick15">ยอดหัก</div></td>
                        <td width="15%" align="right"><div class="thick15">ยอดสุทธิ</div></td>
                    </tr>
                    <div class="s15">
                        <tr class="height40">
                            <td align="left">ยอดขายวันที่ <?php echo setdatetime($objResult_histor_shop["date_action"],"DD MM YYYY"); ?></td>
                            <td align="right"><div class="s12" style="margin-right: 1px;"><?php echo $objResult_histor_shop['sales_store_shop']; ?></div></td>
                            <td align="right"><div class="s12" style="margin-right: 1px;"><?php echo $objResult_histor_shop['sales_store_percent']; ?></div></td>
                            <td align="right"><div class="s12" style="margin-right: 1px;"><?php echo $objResult_histor_shop['sales_store_total']; ?></div></td>
                        </tr>
                    </div>
                    <tr class="height40 bordertop">
                        <td align="left" colspan="2">อ้างอิง : <div class="s13"><?php echo substr($objResult_histor_shop['sales_store_id'], 0 ,35); ?></br></div></td>
                        <td align="right">รวม</td>
                        <?php
                            for($j=1; $j<=10; $j++) {
                                $sum += $_POST['work_item_price'.$j];
                            }
                        ?>
                        <td align="right"><div class="s15"><?php echo number_format($sum, 2, '.', ','); ?></div></td>
                    </tr>
                    <tr class="height40">
                        <td align="left" colspan="2"></td>
                        <td align="right">ส่วนลด</td>
                        <td align="right"><div class="s15"><?php echo number_format($_POST['discount'], 2, '.', ','); ?></div></td>
                    </tr>
                    <tr class="height40 borderbot">
                        <td align="center" colspan="2"><div class="thick17"><?php echo Convert(($sum-$_POST['discount'])); ?></div></td>
                        <td align="right">รวมทั้งสิ้น</td>
                        <td align="right"><div class="thick17"><?php echo number_format(($sum-$_POST['discount']), 2, '.', ','); ?></div></td>
                    </tr>

                </table></td>
        </tr>
        <tr>
            <td align="left">&nbsp;</td>
        </tr>
        </table>
        <div ><img align="right" src="Assets/images/sig.png" width="165"></div>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
            <tr>
                <td align="left" width="40%">(...................................................)</br>ผู้รับ ลงวันที่.../...../..........</td>
                </td>
                <td align="right" width="40%">&nbsp;</td>
                <td align="right" style="padding-right:25px;" width="20%">(เลิศศักดิ์ หงษ์จันทร์)</br>ผู้ส่ง &nbsp; &nbsp; &nbsp; </td>
            </tr>
        </table>

    </div>
</page>
<?php
    closecssa4();
    }
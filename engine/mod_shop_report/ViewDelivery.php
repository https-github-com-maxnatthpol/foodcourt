<?php
function opencssa4() {
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title><?php echo $_POST["no"]."_".$_POST["callname"]; ?></title>
            <link href="Assets/plugins/cssa4/bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <!-- Custom styles  -->
            <link href="Assets/plugins/cssa4/CssA4.css" rel="stylesheet">
            <link href="Assets/plugins/cssa4/CssCustom.css" rel="stylesheet">
        </head>
        <body>

            <div class="bodystarter"></div>
            <?php
        }

function navcssa4() {
            ?>
            <nav class="navbar navbar-inverse navbar-fixed-top" id="non-printable">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div id="navbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-left">
                            <li><a href="#" onClick="window.history.back()"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Back</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a>View 1/1</a></li>
                            <li><a href="#" onClick="window.print()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </nav>
            <?php
        }

function closecssa4() {
            ?>
            <script type="text/javascript" src="Assets/js/jquery-2.2.3.min.js"></script>
            <script src="Assets/plugins/cssa4/bootstrap/js/bootstrap.min.js"></script>
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

opencssa4();

navcssa4();

?>

<page size="A4" class="page" >
    <div class="page-padding">
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td align="left"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="17%"><table table width="100%">
                                    <img src="Assets/plugins/cssa4/logo_b.png" width="125" />
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
                            <td align="left"><div class="thick23">ร้านเมียนประ</div></td>
                        </tr>
                        <td align="left">
                             <div class="s13">70</div> หมู่ <div class="s13">9</div> ต.ธาตุ อ.วารินชำราบ จ.อุบลราชธานี <div class="s13">34190</div></br>
                            โทร : <div class="s13">080-3670479</div> อีเมลล์ : mionpra@gmail.com </br>
                            เลขทะเบียนพาณิชย์ / เลขที่ผู้เสียภาษี : <div class="s13">1330400130896</div></td>
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
                    <td align="right"><div class="s13"><?php echo $_POST["no"]; ?></div></td>
                </tr>
                <tr>
                    <td align="right">วันที่</td>
                    <td align="right"><div class="s13"><?php echo setdatetime($_POST["date"],"DD MM YYYY"); ?></div></td>
                </tr>
                <tr>
                    <td align="right">พิมพ์โดย</td>
                    <td align="right"><div class="s13">Lertsak</div></td>
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
                        <th colspan="2" ><div class="thick15">ลูกค้า</div></th>
                    </tr>
                    <tr>
                        <td align="left"><div class="s15"><?php echo $_POST["cus_name"]; ?>
                                 &nbsp; <?php echo $_POST["cus_add"]; ?>
                            </div></td>
                    </tr>
                </table></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td align="left"><table width="100%" cellpadding="0" cellspacing="0">
                    <tr class="borderbot">
                        <td width="5%"  align="center"><div class="thick15">#</div></td>
                        <td width="50%" align="left"><div class="thick15">รายการ</div></td>
                        <td width="11.25%" align="right"><div class="thick15">จำนวน</div></td>
                        <td width="11.25%" align="right"><div class="thick15">หน่วย</div></td>
                        <td width="11.25%" align="right"><div class="thick15">หน่วยละ</div></td>
                        <td width="11.25%" align="right"><div class="thick15">จำนวนเงิน</div></td>
                    </tr>
                    <div class="s15">
                        <?php for($i=1; $i<=10; $i++) { ?>
                        <tr class="height40">
                            <td height="20" align="center"><div class="s12"><?php if(isset($_POST['work_item_name'.$i])){echo $i;}else{echo"&nbsp;";} ?></div></td>
                            <td align="left"><?php if(isset($_POST['work_item_name'.$i])){echo $_POST['work_item_name'.$i];}else{echo"&nbsp;";} ?></td>
                            <td align="right"><div class="s12"><?php if(isset($_POST['work_item_amount'.$i])){echo $_POST['work_item_amount'.$i];}else{echo"&nbsp;";} ?></div></td>
                            <td align="right"><?php if(isset($_POST['work_item_unit'.$i])){echo $_POST['work_item_unit'.$i];}else{echo"&nbsp;";} ?></td>
                            <td align="right"><div class="s12"><?php if(isset($_POST['work_item_unit_price'.$i])){echo number_format($_POST['work_item_unit_price'.$i], 2, '.', ',');}else{echo"&nbsp;";} ?></div></td>
                            <td align="right"><div class="s12"><?php if(isset($_POST['work_item_price'.$i])){echo number_format($_POST['work_item_price'.$i], 2, '.', ',');}else{echo"&nbsp;";} ?></div></td>
                        </tr>
                        <?php } ?>
                    </div>
                    <tr class="height40 bordertop">
                        <td align="left" colspan="4">อ้างอิง : <div class="s13"><?php echo $_POST["refer"]; ?></br>หมายเหตุ : <?php echo $_POST["note"]; ?></div></td>
                        <td align="right">รวม</td>
                        <?php
                            for($j=1; $j<=10; $j++) {
                                $sum += $_POST['work_item_price'.$j];
                            }
                        ?>
                        <td align="right"><div class="s15"><?php echo number_format($sum, 2, '.', ','); ?></div></td>
                    </tr>
                    <tr class="height40">
                        <td align="left" colspan="4"></td>
                        <td align="right">ส่วนลด</td>
                        <td align="right"><div class="s15"><?php echo number_format($_POST['discount'], 2, '.', ','); ?></div></td>
                    </tr>
                    <tr class="height40 borderbot">
                        <td align="center" colspan="4"><div class="thick17"><?php echo Convert(($sum-$_POST['discount'])); ?></div></td>
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

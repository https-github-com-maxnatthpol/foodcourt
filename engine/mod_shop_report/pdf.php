<?php

require_once '../lib/connect.php';
$db = new DB();
require_once '../../plugins_b/Tcpdf/tcPDF.php';


class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        
        $this->SetFont('THSarabun', 'B', 20);
        //$this->SetTopMargin(10 );
        // Title
        
        $html = '';
        $this->Cell(0, 15, 'รายงานยอดขาย', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->writeHTMLCell('', '', '', '', $html);

    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('THSarabun', 'I', 8);
        // Page number
        $this->Cell(0, 10, ' Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

}


$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
// create new PDF document

// set document information
// $pdf->SetCreator(PDF_CREATOR);
// $pdf->SetAuthor('Nicola Asuni');
// $pdf->SetTitle('TCPDF Example 003');
// $pdf->SetSubject('TCPDF Tutorial');
// $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)


// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'BI', 12);


// -----------------------------------------------------------------------------

  
  $pdf->SetMargins(20,25,20);
    $pdf->SetFont('THSarabun', '', 18);
    //$pdf->SetAutoPageBreak(TRUE, 0); 
    
 $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
   $pdf->AddPage();
 




$button_update  = $_POST["button_update"];
$button_delete  = $_POST["button_delete"];
$button_create   = $_POST["button_create"];
$button_view   = $_POST["button_view"];
$strSQL = "";
$strSQL .= "";


if (isset($_POST["start_to_end_date"]) && $_POST["start_to_end_date"] != '' ) {
  $date_start_end = explode("-", $_POST["start_to_end_date"]);

  $date_start_arr = explode("/", $date_start_end[0]);
  $date_start = $date_start_arr[2].'/'.$date_start_arr[1].'/'.$date_start_arr[0];

  $date_end_arr = explode("/", $date_start_end[1]);
  $date_end = $date_end_arr[2].'/'.$date_end_arr[1].'/'.$date_end_arr[0];

  $date_start1  = $db->clear($date_start);
  $date_end1  = $db->clear($date_end);
  $date_start_clear = preg_replace('/[[:space:]]+/','', trim($date_start1));
  $date_end_clear = preg_replace('/[[:space:]]+/','', trim($date_end1));
  
  $strSQL .= " AND (orders.orders_datetime BETWEEN '".$date_start_clear."' AND '".$date_end_clear."' )";
}
if (isset($_POST["category"]) && ($_POST["category"] != ''&& $_POST["category"] != '0')) {
  $category  = $db->clear($_POST["category"]);
  $strSQL .= " AND (course.id_category = '".$category."' OR webinar.id_category = '".$category."' )";
}


if (isset($_POST["tutor"]) && ($_POST["tutor"] != ''&& $_POST["tutor"] != '0')) {
  $tutor  = $db->clear($_POST["tutor"]);
  $strSQL .= " AND (course.id_tutor = '".$tutor."' OR webinar.id_tutor = '".$tutor."')";
}


if (isset($_POST["search_key"]) && $_POST["search_key"] != '') {
  $search_key  = $db->clear($_POST["search_key"]);
  $strSQL .= " AND (course.name_th LIKE '%".$search_key."%' OR course.name_en LIKE '%".$search_key."%' OR webinar.name_th LIKE '%".$search_key."%' OR webinar.name_en LIKE '%".$search_key."%'  )";
}
 $strSQL .= " GROUP BY orders_item.id_course , orders.orders_datetime ORDER BY orders.orders_datetime DESC , SUM(orders_item.subtotal) DESC";
$objQuery = $db->Query($strSQL);
  
$output = '
<table class="table" id="table_front_manage" width="100%" border="1">
    <thead >
    <tr>
      <th width="10%" align="center">ลำดับ</th>
      <th width="20%" align="center">วันที่</th>
      <th width="20%" align="center">หมวดหมู่</th>
      <th width="30%" align="center">หลักสูตร</th>
      <th width="20%" align="center">ยอดเงินรวม</th>
    </tr>
    </thead>
    <tbody>
';
  $num=0;
  while ($objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
  $num++;

$output .= '
<tr class="show-tr">
        <td width="10%" align="center">'. $num .'</td>
        <td width="20%" align="left">'.$objResult['orders_datet'] .'</td>
        <td width="20%" align="left">'. $objResult["category_name"] .'</td>
        <td width="30%" align="left">'. $objResult["name_th"] .'</td>
        <td width="20%" align="right">'.  number_format($objResult["sum_total"], 2, '.', ',') .'</td>
        
      </tr>
';
}
$output .= '
</tbody>
  </table>
';
$output .= '';
$output .= '';
$output .= '';
// output the HTML content

 $pdf->writeHTML($output, true, false, true, false, '');
 




ob_end_clean(); 
//Close and output PDF document
//แสดง
//$pdf->Output('example_test.pdf', 'I');
//บันทึก
$pdf->Output(__DIR__ . '/example_test.pdf', 'F');
  
// -----------------------------------------------------------------------------
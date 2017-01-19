<?php
require_once('TCPDF/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
// $pdf->SetCreator(PDF_CREATOR);
// $pdf->SetAuthor('Nicola Asuni');
// $pdf->SetTitle('TCPDF Example 048');
// $pdf->SetSubject('TCPDF Tutorial');
// $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 048', PDF_HEADER_STRING);

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
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();

$pdf->SetFont('helvetica', '', 8);

if (isset($_POST['ORDNO']) && isset($_POST['PCKLSTNO'])) { // 列印揀貨單
  $pdf->Write(0, '揀貨單', '', 0, 'L', true, 0, false, false, 0);
  $ORDNO = $_POST['ORDNO'];
  $PCKLSTNO = $_POST['PCKLSTNO'];
  $query = mysql_query("SELECT * FROM PCKLST WHERE PCKLSTNO=$PCKLSTNO");
  $count = 0;
  while($fetch = mysql_fetch_array($query)) {
    if ($count > 0) {
      date_default_timezone_set('Asia/Taipei');
      $DATEPRTORG = date("Y-m-d H:i:s");
      $queryADDRESS = mysql_query("SELECT ADD_1 FROM CUSADD WHERE CUSNO=$fetch['CUSNO'] AND ADDNO=$fetch['SHIP_ADD_NO']");
      $fetchADDRESS = mysql_fetch_array($queryADDRESS);
      $tbl = '<table><tr><td>揀貨單編號</td><td>'.$fetch['PCKLSTNO'].'</td></tr><tr><td>訂單編號</td><td>'.$fetch['ORDNO'].'</td></tr><tr><td>顧客編號</td><td>'.$fetch['CUSNO'].'</td></tr><tr><td>運送地址</td><td>'.$fetchADDRESS['ADD_1'].'</td></tr><tr><td>倉庫編號</td><td>'.$fetch['WHOUSE'].'</td></tr><tr><td>要求完成日期</td><td>'.$fetch['DATE_REQ'].'</td></tr><tr><td>印製時間</td><td>'.$DATEPRTORG.'</td></tr><tr><td>印製次數</td><td>'.$fetch['PRINTAG'].'</td></tr></table><p>--------------------------------------------------------------------------------</p><table><tr><th>物料編號</th><th>要求數量</th><th>存貨位置編號</th><th>運送日期</th></tr>';
      $pdf->writeHTML($tbl, true, false, false, false, '');
    }
    $count += 1;
    $tbl = '<tr><td>'.$fetch['ITEMNO'].'</td><td>'.$fetch['QTYSHIPREQ'].'</td><td>'.$fetch['LOCNO'].'</td><td>'.$fetch['DATE_SHIP'].'</td></tr>';
  }
  $tbl .= '</table>';
  $pdf->writeHTML($tbl, true, false, false, false, '');
  $pdf->Output('PCK_'.$PCKLSTNO.'.pdf', 'I');
}

elseif (isset($_POST['PCKLSTNO']) && isset($_POST['INVOICENO'])) { // 列印發票
  $pdf->Write(0, '發票', '', 0, 'L', true, 0, false, false, 0);
  $PCKLSTNO = $_POST['PCKLSTNO'];
  $INVOICENO = $_POST['INVOICENO'];
  $query = mysql_query("SELECT * FROM INVOICE WHERE INVOICENO=$INVOICENO");
  $count = 0;
  while($fetch = mysql_fetch_array($query)) {
    if ($count > 0) {
      $queryADDRESS1 = mysql_query("SELECT ADD_1 FROM CUSADD WHERE CUSNO=$fetch['CUSNO'] AND ADDNO=$fetch['SHIP_ADD_NO']");
      $fetchADDRESS1 = mysql_fetch_array($queryADDRESS);
      $queryADDRESS2 = mysql_query("SELECT ADD_1 FROM CUSADD WHERE CUSNO=$fetch['CUSNO'] AND ADDNO=$fetch['BILL_ADD_NO']");
      $fetchADDRESS2 = mysql_fetch_array($queryADDRESS);
      $tbl = '<table><tr><td>發票編號</td><td>'.$fetch['INVOICENO'].'</td></tr><tr><td>揀貨單編號</td><td>'.$fetch['PCKLSTNO'].'</td></tr><tr><td>訂單編號</td><td>'.$fetch['ORDNO'].'</td></tr><tr><td>顧客編號</td><td>'.$fetch['CUSNO'].'</td></tr><tr><td>運送地址</td><td>'.$fetchADDRESS1['ADD_1'].'</td></tr><tr><td>帳單地址</td><td>'.$fetchADDRESS2['ADD_1'].'</td></tr><tr><td>要求完成日期</td><td>'.$fetch['DATE_REQ'].'</td></tr><tr><td>最後更新日期</td><td>'.$fetch['DATE_L_MNT'].'</td></tr><tr><td>印製次數</td><td>'.$fetch['PRINTAG'].'</td></tr></table><p>--------------------------------------------------------------------------------</p><table><tr><th>物料編號</th><th>物料分類</th><th>基本價格</th><th>簽約基本價格</th><th>賣出價格</th><th>交易數量</th><th>總銷售額</th><th>含稅狀態</th><th>倒置狀態</th></tr>';
      $pdf->writeHTML($tbl, true, false, false, false, '');
    }
    $count += 1;
    $tbl = '<tr><td>'.$fetch['ITEMNO'].'</td><td>'.$fetch['ITEMCLASS'].'</td><td>'.$fetch['BASE_PRICE'].'</td><td>'.$fetch['PRICE_CNT'].'</td><td>'.$fetch['PRICE_SELL'].'</td><td>'.$fetch['QTYTRAN'].'</td><td>'.$fetch['NET_SALES'].'</td><td>'.$fetch['TAX_CODE'].'</td><td>'.$fetch['REV_CODE'].'</td></tr>';
  }
  $tbl .= '</table>';
  $pdf->writeHTML($tbl, true, false, false, false, '');
  $pdf->Output('INV_'.$INVOICENO.'.pdf', 'I');
}

elseif (isset($_POST['PCKLSTNO'])) { // 重印揀貨單
  $pdf->Write(0, '揀貨單', '', 0, 'L', true, 0, false, false, 0);
  $PCKLSTNO = $_POST['PCKLSTNO'];
  $query = mysql_query("SELECT * FROM PCKLST WHERE PCKLSTNO=$PCKLSTNO");
  $count = 0;
  while($fetch = mysql_fetch_array($query)) {
    if ($count > 0) {
      date_default_timezone_set('Asia/Taipei');
      $DATEPRTORG = date("Y-m-d H:i:s");
      $queryADDRESS = mysql_query("SELECT ADD_1 FROM CUSADD WHERE CUSNO=$fetch['CUSNO'] AND ADDNO=$fetch['SHIP_ADD_NO']");
      $fetchADDRESS = mysql_fetch_array($queryADDRESS);
      $tbl = '<table><tr><td>揀貨單編號</td><td>'.$fetch['PCKLSTNO'].'</td></tr><tr><td>訂單編號</td><td>'.$fetch['ORDNO'].'</td></tr><tr><td>顧客編號</td><td>'.$fetch['CUSNO'].'</td></tr><tr><td>運送地址</td><td>'.$fetchADDRESS['ADD_1'].'</td></tr><tr><td>倉庫編號</td><td>'.$fetch['WHOUSE'].'</td></tr><tr><td>要求完成日期</td><td>'.$fetch['DATE_REQ'].'</td></tr><tr><td>印製時間</td><td>'.$DATEPRTORG.'</td></tr><tr><td>印製次數</td><td>'.$fetch['PRINTAG'].'</td></tr></table><p>--------------------------------------------------------------------------------</p><table><tr><th>物料編號</th><th>要求數量</th><th>存貨位置編號</th><th>運送日期</th></tr>';
      $pdf->writeHTML($tbl, true, false, false, false, '');
    }
    $count += 1;
    $tbl = '<tr><td>'.$fetch['ITEMNO'].'</td><td>'.$fetch['QTYSHIPREQ'].'</td><td>'.$fetch['LOCNO'].'</td><td>'.$fetch['DATE_SHIP'].'</td></tr>';
  }
  $tbl .= '</table>';
  $pdf->writeHTML($tbl, true, false, false, false, '');
  $pdf->Output('PCK_'.$PCKLSTNO.'.pdf', 'I');
}

elseif (isset($_POST['INVOICENO'])) { // 重印發票
  $pdf->Write(0, '發票', '', 0, 'L', true, 0, false, false, 0);
  $INVOICENO = $_POST['INVOICENO'];
  $query = mysql_query("SELECT * FROM INVOICE WHERE INVOICENO=$INVOICENO");
  $count = 0;
  while($fetch = mysql_fetch_array($query)) {
    if ($count > 0) {
      $queryADDRESS1 = mysql_query("SELECT ADD_1 FROM CUSADD WHERE CUSNO=$fetch['CUSNO'] AND ADDNO=$fetch['SHIP_ADD_NO']");
      $fetchADDRESS1 = mysql_fetch_array($queryADDRESS);
      $queryADDRESS2 = mysql_query("SELECT ADD_1 FROM CUSADD WHERE CUSNO=$fetch['CUSNO'] AND ADDNO=$fetch['BILL_ADD_NO']");
      $fetchADDRESS2 = mysql_fetch_array($queryADDRESS);
      $tbl = '<table><tr><td>發票編號</td><td>'.$fetch['INVOICENO'].'</td></tr><tr><td>揀貨單編號</td><td>'.$fetch['PCKLSTNO'].'</td></tr><tr><td>訂單編號</td><td>'.$fetch['ORDNO'].'</td></tr><tr><td>顧客編號</td><td>'.$fetch['CUSNO'].'</td></tr><tr><td>運送地址</td><td>'.$fetchADDRESS1['ADD_1'].'</td></tr><tr><td>帳單地址</td><td>'.$fetchADDRESS2['ADD_1'].'</td></tr><tr><td>要求完成日期</td><td>'.$fetch['DATE_REQ'].'</td></tr><tr><td>最後更新日期</td><td>'.$fetch['DATE_L_MNT'].'</td></tr><tr><td>印製次數</td><td>'.$fetch['PRINTAG'].'</td></tr></table><p>--------------------------------------------------------------------------------</p><table><tr><th>物料編號</th><th>物料分類</th><th>基本價格</th><th>簽約基本價格</th><th>賣出價格</th><th>交易數量</th><th>總銷售額</th><th>含稅狀態</th><th>倒置狀態</th></tr>';
      $pdf->writeHTML($tbl, true, false, false, false, '');
    }
    $count += 1;
    $tbl = '<tr><td>'.$fetch['ITEMNO'].'</td><td>'.$fetch['ITEMCLASS'].'</td><td>'.$fetch['BASE_PRICE'].'</td><td>'.$fetch['PRICE_CNT'].'</td><td>'.$fetch['PRICE_SELL'].'</td><td>'.$fetch['QTYTRAN'].'</td><td>'.$fetch['NET_SALES'].'</td><td>'.$fetch['TAX_CODE'].'</td><td>'.$fetch['REV_CODE'].'</td></tr>';
  }
  $tbl .= '</table>';
  $pdf->writeHTML($tbl, true, false, false, false, '');
  $pdf->Output('INV_'.$INVOICENO.'.pdf', 'I');
}

/*
$tbl = <<<EOD
<table border="1" cellpadding="2" cellspacing="2" nobr="true">
 <tr>
  <th colspan="3" align="center">NON-BREAKING TABLE</th>
 </tr>
 <tr>
  <td>1-1</td>
  <td>1-2</td>
  <td>1-3</td>
 </tr>
 <tr>
  <td>2-1</td>
  <td>3-2</td>
  <td>3-3</td>
 </tr>
 <tr>
  <td>3-1</td>
  <td>3-2</td>
  <td>3-3</td>
 </tr>
</table>
EOD;
*/
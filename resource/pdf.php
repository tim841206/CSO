<?php
include_once("TCPDF/tcpdf.php");
include_once("database.php");

while ($data = array_pop($_GET['data'])) {
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
  // add a page
  $pdf->AddPage();

  if (isset($data['ORDNO']) && isset($data['PCKLSTNO'])) { // 列印揀貨單
    $pdf->SetFont('cid0jp', 'B', 20);
    $pdf->Write(0, '揀貨單', '', 0, 'C', true, 0, false, false, 0);
    $pdf->SetFont('cid0jp', '', 12);
    $ORDNO = $data['ORDNO'];
    $PCKLSTNO = $data['PCKLSTNO'];
    $query = mysql_query("SELECT * FROM PCKLST WHERE PCKLSTNO='$PCKLSTNO'");
    $count = 0;
    while($fetch = mysql_fetch_array($query)) {
      if ($count == 0) {
        $CUSNO = $fetch['CUSNO'];
        $ADDNO = $fetch['SHIP_ADD_NO'];
        date_default_timezone_set('Asia/Taipei');
        $DATEPRTORG = date("Y-m-d H:i:s");
        $queryADDRESS = mysql_query("SELECT ADD_1 FROM CUSADD WHERE CUSNO='$CUSNO' AND ADDNO='$ADDNO'");
        $fetchADDRESS = mysql_fetch_array($queryADDRESS);
        $tbl = '<br><table><tr><td>揀貨單編號</td><td>'.$fetch['PCKLSTNO'].'</td></tr><tr><td>訂單編號</td><td>'.$fetch['ORDNO'].'</td></tr><tr><td>顧客編號</td><td>'.$fetch['CUSNO'].'</td></tr><tr><td>運送地址</td><td>'.$fetchADDRESS['ADD_1'].'</td></tr><tr><td>倉庫編號</td><td>'.$fetch['WHOUSE'].'</td></tr><tr><td>要求完成日期</td><td>'.$fetch['DATE_REQ'].'</td></tr><tr><td>印製時間</td><td>'.$DATEPRTORG.'</td></tr><tr><td>印製次數</td><td>'.$fetch['PRINTAG'].'</td></tr></table><p>-------------------------------------------------------------------------------------------------------------------------------</p>';
        $pdf->writeHTML($tbl, true, false, false, false, '');
        $tbl = '<table><tr><th>物料編號</th><th>要求數量</th><th>存貨位置編號</th><th>運送日期</th></tr>';
      }
      $count += 1;
      $tbl .= '<tr><td>'.$fetch['ITEMNO'].'</td><td>'.$fetch['QTYSHIPREQ'].'</td><td>'.$fetch['LOCNO'].'</td></tr>';
    }
    $tbl .= '</table>';
    $pdf->writeHTML($tbl, true, false, false, false, '');
    ob_end_clean();
    $pdf->Output('PCK_'.$PCKLSTNO.'.pdf', 'D');
  }

  elseif (isset($data['PCKLSTNO']) && isset($data['INVOICENO'])) { // 列印發票
    $pdf->SetFont('cid0jp', 'B', 20);
    $pdf->Write(0, '發票', '', 0, 'C', true, 0, false, false, 0);
    $pdf->SetFont('cid0jp', '', 12);
    $PCKLSTNO = $data['PCKLSTNO'];
    $INVOICENO = $data['INVOICENO'];
    $query = mysql_query("SELECT * FROM INVOICE WHERE INVOICENO='$INVOICENO'");
    $count = 0;
    while($fetch = mysql_fetch_array($query)) {
      if ($count == 0) {
        $CUSNO = $fetch['CUSNO'];
        $ADDNO = $fetch['SHIP_ADD_NO'];
        $queryADDRESS1 = mysql_query("SELECT ADD_1 FROM CUSADD WHERE CUSNO='$CUSNO' AND ADDNO='$ADDNO'");
        $fetchADDRESS1 = mysql_fetch_array($queryADDRESS);
        $queryADDRESS2 = mysql_query("SELECT ADD_1 FROM CUSADD WHERE CUSNO='$CUSNO' AND ADDNO='$ADDNO'");
        $fetchADDRESS2 = mysql_fetch_array($queryADDRESS);
        $tbl = '<br><table><tr><td>發票編號</td><td>'.$fetch['INVOICENO'].'</td></tr><tr><td>揀貨單編號</td><td>'.$fetch['PCKLSTNO'].'</td></tr><tr><td>訂單編號</td><td>'.$fetch['ORDNO'].'</td></tr><tr><td>顧客編號</td><td>'.$fetch['CUSNO'].'</td></tr><tr><td>運送地址</td><td>'.$fetchADDRESS1['ADD_1'].'</td></tr><tr><td>帳單地址</td><td>'.$fetchADDRESS2['ADD_1'].'</td></tr><tr><td>要求完成日期</td><td>'.$fetch['DATE_REQ'].'</td></tr><tr><td>最後更新日期</td><td>'.$fetch['DATE_L_MNT'].'</td></tr><tr><td>印製次數</td><td>'.$fetch['PRINTAG'].'</td></tr></table><p>-------------------------------------------------------------------------------------------------------------------------------</p>';
        $pdf->writeHTML($tbl, true, false, false, false, '');
        $tbl = '<table><tr><th>物料編號</th><th>物料分類</th><th>基本價格</th><th>簽約基本價格</th><th>賣出價格</th><th>交易數量</th><th>總銷售額</th><th>含稅狀態</th><th>倒置狀態</th></tr>';
      }
      $count += 1;
      $tbl .= '<tr><td>'.$fetch['ITEMNO'].'</td><td>'.$fetch['ITEMCLASS'].'</td><td>'.$fetch['BASE_PRICE'].'</td><td>'.$fetch['PRICE_CNT'].'</td><td>'.$fetch['PRICE_SELL'].'</td><td>'.$fetch['QTYTRAN'].'</td><td>'.$fetch['NET_SALES'].'</td><td>'.$fetch['TAX_CODE'].'</td><td>'.$fetch['REV_CODE'].'</td></tr>';
    }
    $tbl .= '</table>';
    $pdf->writeHTML($tbl, true, false, false, false, '');
    ob_end_clean();
    $pdf->Output('INV_'.$INVOICENO.'.pdf', 'D');
  }

  elseif (isset($data['PCKLSTNO'])) { // 重印揀貨單
    $pdf->SetFont('cid0jp', 'B', 20);
    $pdf->Write(0, '揀貨單', '', 0, 'C', true, 0, false, false, 0);
    $pdf->SetFont('cid0jp', '', 12);
    $PCKLSTNO = $data['PCKLSTNO'];
    $query = mysql_query("SELECT * FROM PCKLST WHERE PCKLSTNO='$PCKLSTNO'");
    $count = 0;
    while($fetch = mysql_fetch_array($query)) {
      if ($count == 0) {
        $CUSNO = $fetch['CUSNO'];
        $ADDNO = $fetch['SHIP_ADD_NO'];
        date_default_timezone_set('Asia/Taipei');
        $DATEPRTORG = date("Y-m-d H:i:s");
        $queryADDRESS = mysql_query("SELECT ADD_1 FROM CUSADD WHERE CUSNO='$CUSNO' AND ADDNO='$ADDNO'");
        $fetchADDRESS = mysql_fetch_array($queryADDRESS);
        $tbl = '<table><tr><td>揀貨單編號</td><td>'.$fetch['PCKLSTNO'].'</td></tr><tr><td>訂單編號</td><td>'.$fetch['ORDNO'].'</td></tr><tr><td>顧客編號</td><td>'.$fetch['CUSNO'].'</td></tr><tr><td>運送地址</td><td>'.$fetchADDRESS['ADD_1'].'</td></tr><tr><td>倉庫編號</td><td>'.$fetch['WHOUSE'].'</td></tr><tr><td>要求完成日期</td><td>'.$fetch['DATE_REQ'].'</td></tr><tr><td>印製時間</td><td>'.$DATEPRTORG.'</td></tr><tr><td>印製次數</td><td>'.$fetch['PRINTAG'].'</td></tr></table><p>-------------------------------------------------------------------------------------------------------------------------------</p>';
        $pdf->writeHTML($tbl, true, false, false, false, '');
        $tbl = '<table><tr><th>物料編號</th><th>要求數量</th><th>存貨位置編號</th><th>運送日期</th></tr>';
      }
      $count += 1;
      $tbl .= '<tr><td>'.$fetch['ITEMNO'].'</td><td>'.$fetch['QTYSHIPREQ'].'</td><td>'.$fetch['LOCNO'].'</td></tr>';
    }
    $tbl .= '</table>';
    $pdf->writeHTML($tbl, true, false, false, false, '');
    ob_end_clean();
    $pdf->Output('PCK_'.$PCKLSTNO.'.pdf', 'D');
  }

  elseif (isset($data['INVOICENO'])) { // 重印發票
    $pdf->SetFont('cid0jp', 'B', 20);
    $pdf->Write(0, '發票', '', 0, 'C', true, 0, false, false, 0);
    $pdf->SetFont('cid0jp', '', 12);
    $INVOICENO = $data['INVOICENO'];
    $query = mysql_query("SELECT * FROM INVOICE WHERE INVOICENO='$INVOICENO'");
    $count = 0;
    while($fetch = mysql_fetch_array($query)) {
      if ($count == 0) {
        $CUSNO = $fetch['CUSNO'];
        $ADDNO = $fetch['SHIP_ADD_NO'];
        $queryADDRESS1 = mysql_query("SELECT ADD_1 FROM CUSADD WHERE CUSNO='$CUSNO' AND ADDNO='$ADDNO'");
        $fetchADDRESS1 = mysql_fetch_array($queryADDRESS);
        $queryADDRESS2 = mysql_query("SELECT ADD_1 FROM CUSADD WHERE CUSNO='$CUSNO' AND ADDNO='$ADDNO'");
        $fetchADDRESS2 = mysql_fetch_array($queryADDRESS);
        $tbl = '<br><table><tr><td>發票編號</td><td>'.$fetch['INVOICENO'].'</td></tr><tr><td>揀貨單編號</td><td>'.$fetch['PCKLSTNO'].'</td></tr><tr><td>訂單編號</td><td>'.$fetch['ORDNO'].'</td></tr><tr><td>顧客編號</td><td>'.$fetch['CUSNO'].'</td></tr><tr><td>運送地址</td><td>'.$fetchADDRESS1['ADD_1'].'</td></tr><tr><td>帳單地址</td><td>'.$fetchADDRESS2['ADD_1'].'</td></tr><tr><td>要求完成日期</td><td>'.$fetch['DATE_REQ'].'</td></tr><tr><td>最後更新日期</td><td>'.$fetch['DATE_L_MNT'].'</td></tr><tr><td>印製次數</td><td>'.$fetch['PRINTAG'].'</td></tr></table><p>-------------------------------------------------------------------------------------------------------------------------------</p>';
        $pdf->writeHTML($tbl, true, false, false, false, '');
        $tbl = '<table><tr><th>物料編號</th><th>物料分類</th><th>基本價格</th><th>簽約基本價格</th><th>賣出價格</th><th>交易數量</th><th>總銷售額</th><th>含稅狀態</th><th>倒置狀態</th></tr>';
      }
      $count += 1;
      $tbl .= '<tr><td>'.$fetch['ITEMNO'].'</td><td>'.$fetch['ITEMCLASS'].'</td><td>'.$fetch['BASE_PRICE'].'</td><td>'.$fetch['PRICE_CNT'].'</td><td>'.$fetch['PRICE_SELL'].'</td><td>'.$fetch['QTYTRAN'].'</td><td>'.$fetch['NET_SALES'].'</td><td>'.$fetch['TAX_CODE'].'</td><td>'.$fetch['REV_CODE'].'</td></tr>';
    }
    $tbl .= '</table>';
    $pdf->writeHTML($tbl, true, false, false, false, '');
    ob_end_clean();
    $pdf->Output('INV_'.$INVOICENO.'.pdf', 'D');
  }
}
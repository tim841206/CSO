<?
include_once("../resource/database.php");

if ($_POST['module'] == "ExportMAS") {
    if ($_POST['event'] == "ExportSLSMAS") {
        $FromSALPERNO = $_POST['FromSALPERNO'];
        $ToSALPERNO = $_POST['ToSALPERNO'];
        $resource = mysql_query("SELECT * FROM SLSMAS WHERE SALPERNO>='$FromSALPERNO' AND SALPERNO<='$ToSALPERNO' AND ACTCODE=1");
        if ($_POST['option'] == "Search") {
            echo json_encode(array('table' => Export("SLSMAS", $resource)));
            return;
        }
        elseif ($_POST['option'] == "Export") {
            $pdf = curl_init();
            curl_setopt($pdf, CURLOPT_URL, "../resource/xls.php");
            curl_setopt($pdf, CURLOPT_POST, true);
            curl_setopt($pdf, CURLOPT_POSTFIELDS, http_build_query(array("type" => 'SLSMAS', "FromSALPERNO" => $FromSALPERNO, "ToSALPERNO" => $ToSALPERNO)));
            $output = curl_exec($pdf);
            curl_close($pdf);
            echo json_encode(array('state' => $output));
            return;
        }
        else {
            echo json_encode(array('state' => 400));
            return;
        }
    }
    elseif ($_POST['event'] == "ExportCUSMAS") {
        $FromCUSNO = $_POST['FromCUSNO'];
        $ToCUSNO = $_POST['ToCUSNO'];
        $resource = mysql_query("SELECT * FROM CUSMAS WHERE CUSNO>='$FromCUSNO' AND CUSNO<='$ToCUSNO' AND ACTCODE=1");
        if ($_POST['option'] == "Search") {
            echo json_encode(array('table' => Export("CUSMAS", $resource)));
            return;
        }
        elseif ($_POST['option'] == "Export") {
            $pdf = curl_init();
            curl_setopt($pdf, CURLOPT_URL, "../resource/xls.php");
            curl_setopt($pdf, CURLOPT_POST, true);
            curl_setopt($pdf, CURLOPT_POSTFIELDS, http_build_query(array("type" => 'CUSMAS', "FromCUSNO" => $FromCUSNO, "ToCUSNO" => $ToCUSNO)));
            $output = curl_exec($pdf);
            curl_close($pdf);
            echo json_encode(array('state' => $output));
            return;
        }
        else {
            echo json_encode(array('state' => 400));
            return;
        }
    }
    elseif ($_POST['event'] == "ExportCUSADD") {
        $FromCUSNO = $_POST['FromCUSNO'];
        $ToCUSNO = $_POST['ToCUSNO'];
        $resource = mysql_query("SELECT * FROM CUSADD WHERE CUSNO>='$FromCUSNO' AND CUSNO<='$ToCUSNO' AND ACTCODE=1");
        if ($_POST['option'] == "Search") {
            echo json_encode(array('table' => Export("CUSADD", $resource)));
            return;
        }
        elseif ($_POST['option'] == "Export") {
            $pdf = curl_init();
            curl_setopt($pdf, CURLOPT_URL, "../resource/xls.php");
            curl_setopt($pdf, CURLOPT_POST, true);
            curl_setopt($pdf, CURLOPT_POSTFIELDS, http_build_query(array("type" => 'CUSADD', "FromCUSNO" => $FromCUSNO, "ToCUSNO" => $ToCUSNO)));
            $output = curl_exec($pdf);
            curl_close($pdf);
            echo json_encode(array('state' => $output));
            return;
        }
        else {
            echo json_encode(array('state' => 400));
            return;
        }
    }
    elseif ($_POST['event'] == "ExportCUSREGION") {
        $FromREGIONNO = $_POST['FromREGIONNO'];
        $ToREGIONNO = $_POST['ToREGIONNO'];
        $resource = mysql_query("SELECT * FROM CUSREGION WHERE REGIONNO>='$FromREGIONNO' AND REGIONNO<='$ToREGIONNO' AND ACTCODE=1");
        if ($_POST['option'] == "Search") {
            echo json_encode(array('table' => Export("CUSREGION", $resource)));
            return;
        }
        elseif ($_POST['option'] == "Export") {
            $pdf = curl_init();
            curl_setopt($pdf, CURLOPT_URL, "../resource/xls.php");
            curl_setopt($pdf, CURLOPT_POST, true);
            curl_setopt($pdf, CURLOPT_POSTFIELDS, http_build_query(array("type" => 'CUSREGION', "FromREGIONNO" => $FromREGIONNO, "ToREGIONNO" => $ToREGIONNO)));
            $output = curl_exec($pdf);
            curl_close($pdf);
            echo json_encode(array('state' => $output));
            return;
        }
        else {
            echo json_encode(array('state' => 400));
            return;
        }
    }
    elseif ($_POST['event'] == "ExportCUSCITY") {
        $FromCITYNO = $_POST['FromCITYNO'];
        $ToCITYNO = $_POST['ToCITYNO'];
        $resource = mysql_query("SELECT * FROM CUSCITY WHERE CITYNO>='$FromCITYNO' AND CITYNO<='$ToCITYNO' AND ACTCODE=1");
        if ($_POST['option'] == "Search") {
            echo json_encode(array('table' => Export("CUSCITY", $resource)));
        return;
        }
        elseif ($_POST['option'] == "Export") {
            $pdf = curl_init();
            curl_setopt($pdf, CURLOPT_URL, "../resource/xls.php");
            curl_setopt($pdf, CURLOPT_POST, true);
            curl_setopt($pdf, CURLOPT_POSTFIELDS, http_build_query(array("type" => 'CUSCITY', "FromCITYNO" => $FromCITYNO, "ToCITYNO" => $ToCITYNO)));
            $output = curl_exec($pdf);
            curl_close($pdf);
            echo json_encode(array('state' => $output));
            return;
        }
        else {
            echo json_encode(array('state' => 400));
            return;
        }
    }
    else {
        echo json_encode(array('state' => 400));
        return;
    }
}
else {
    echo json_encode(array('state' => 400));
    return;
}

function Export($title, $resource) {
    $table = '<table>';
    if ($title == "SLSMAS") {
        $table .= '<tr><th>銷售員</th></tr>';
        $table .= '<tr><th>銷售員編號</th><th>銷售員名稱</th><th>員工編號</th><th>酬勞比率(%)</th><th>年結帳至今銷售額</th><th>季結帳至今銷售額</th><th>月結帳至今銷售額</th></tr>';
        while($SLSMAS = mysql_fetch_array($resource)){
            $table .= '<tr><td>'.$SLSMAS['SALPERNO'].'</td><td>'.$SLSMAS['SALPERNM'].'</td><td>'.$SLSMAS['EMPNO'].'</td><td>'.$SLSMAS['COMRATE'].'</td><td>'.$SLSMAS['SALEAMTYTD'].'</td><td>'.$SLSMAS['SALEAMTSTD'].'</td><td>'.$SLSMAS['SALEAMTMTD'].'</td></tr>';
        }
    }
    elseif ($title == "CUSMAS") {
        $table .= '<tr><th>顧客</th></tr>';
        $table .= '<tr><th>顧客編號</th><th>顧客名稱</th><th>地址編號 1</th><th>地址編號 2</th><th>地址編號 3</th><th>所屬城市</th><th>所屬縣市</th><th>所屬國家</th><th>郵遞區號</th><th>接觸人員</th><th>電話</th><th>傳真</th><th>電子信箱</th><th>網址</th><th>所屬銷售員編號</th><th>預設運送地編號</th><th>預設帳單地編號</th><th>年結帳至今銷售額</th><th>季結帳至今銷售額</th><th>月結帳至今銷售額</th><th>應收帳款</th><th>30~60天應收帳款</th><th>60~90天應收帳款</th><th>90~120天應收帳款</th><th>超過120天應收帳款</th><th>特殊要求</th><th>信用狀態</th><th>統一編號</th></tr>';
        while($CUSMAS = mysql_fetch_array($resource)){
            $table .= '<tr><td>'.$CUSMAS['CUSNO'].'</td><td>'.$CUSMAS['CUSNM'].'</td><td>'.$CUSMAS['ADDNO_1'].'</td><td>'.$CUSMAS['ADDNO_2'].'</td><td>'.$CUSMAS['ADDNO_3'].'</td><td>'.$CUSMAS['CITY'].'</td><td>'.$CUSMAS['COUNTY'].'</td><td>'.$CUSMAS['COUNTRY'].'</td><td>'.$CUSMAS['ZCODE'].'</td><td>'.$CUSMAS['CNTPER'].'</td><td>'.$CUSMAS['TEL'].'</td><td>'.$CUSMAS['FAX'].'</td><td>'.$CUSMAS['EMAIL'].'</td><td>'.$CUSMAS['WSITE'].'</td><td>'.$CUSMAS['SALPERNO'].'</td><td>'.$CUSMAS['DFSHIPNO'].'</td><td>'.$CUSMAS['DFBILLNO'].'</td><td>'.$CUSMAS['SALEAMTYTD'].'</td><td>'.$CUSMAS['SALEAMTSTD'].'</td><td>'.$CUSMAS['SALEAMTMTD'].'</td><td>'.$CUSMAS['CURAR'].'</td><td>'.$CUSMAS['AR30_60'].'</td><td>'.$CUSMAS['AR60_90'].'</td><td>'.$CUSMAS['AR90_120'].'</td><td>'.$CUSMAS['M120AR'].'</td><td>'.$CUSMAS['SPEINS'].'</td><td>'.$CUSMAS['CREDITSTAT'].'</td><td>'.$CUSMAS['TAXID'].'</td></tr>';
        }
    }
    elseif ($title == "CUSADD") {
        $table .= '<tr><th>顧客地址</th></tr>';
        $table .= '<tr><th>顧客編號</th><th>地址編號</th><th>地址 1</th><th>地址 2</th><th>地址 3</th><th>所屬城市</th><th>所屬縣市</th><th>所屬國家</th><th>郵遞區號</th><th>接觸人員</th><th>電話</th><th>傳真</th><th>電子信箱</th></tr>';
        while($CUSADD = mysql_fetch_array($resource)){
            $table .= '<tr><td>'.$CUSADD['CUSNO'].'</td><td>'.$CUSADD['ADDNO'].'</td><td>'.$CUSADD['ADD_1'].'</td><td>'.$CUSADD['ADD_2'].'</td><td>'.$CUSADD['ADD_3'].'</td><td>'.$CUSADD['CITY'].'</td><td>'.$CUSADD['COUNTY'].'</td><td>'.$CUSADD['COUNTRY'].'</td><td>'.$CUSADD['ZCODE'].'</td><td>'.$CUSADD['CNTPER'].'</td><td>'.$CUSADD['TEL'].'</td><td>'.$CUSADD['FAX'].'</td><td>'.$CUSADD['EMAIL'].'</td></tr>';
        }
    }
    elseif ($title == "CUSREGION") {
        $table .= '<tr><th>顧客地區</th></tr>';
        $table .= '<tr><th>廠商暨地區編號</th><th>通路編號</th><th>通路名稱</th><th>廠商公司編號</th><th>廠商公司名稱</th><th>地區編號</th><th>敘述</th></tr>';
        while($CUSREGION = mysql_fetch_array($resource)){
            $table .= '<tr><td>'.$CUSREGION['REGIONNO'].'</td><td>'.$CUSREGION['CHANNELNO'].'</td><td>'.$CUSREGION['CHANNELNM'].'</td><td>'.$CUSREGION['COMPANYNO'].'</td><td>'.$CUSREGION['COMPANYNM'].'</td><td>'.$CUSREGION['DISTRICTNO'].'</td><td>'.$CUSREGION['DESCRIPTION'].'</td></tr>';
        }
    }
    elseif ($title == "CUSCITY") {
        $table .= '<tr><th>顧客城市</th></tr>';
        $table .= '<tr><th>城市編號</th><th>城市名稱</th><th>所屬廠商暨地區編號</th></tr>';
        while($CUSCITY = mysql_fetch_array($resource)){
            $table .= '<tr><td>'.$CUSCITY['CITYNO'].'</td><td>'.$CUSCITY['CITYNM'].'</td><td>'.$CUSCITY['REGIONNO'].'</td></tr>';
        }
    }
    $table .= '</table>';
    return $table;
}
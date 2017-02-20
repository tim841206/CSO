<?
include_once("../resource/database.php");
include_once("../resource/attachment.php");

if (safe($_POST['module']) == "ExportMAS") {
    if (safe($_POST['event']) == "ExportSLSMAS") {
        $FromSALPERNO = safe($_POST['FromSALPERNO']);
        $ToSALPERNO = safe($_POST['ToSALPERNO']);
        $resource = mysql_query("SELECT * FROM SLSMAS WHERE SALPERNO>='$FromSALPERNO' AND SALPERNO<='$ToSALPERNO' AND ACTCODE=1");
        if (safe($_POST['option']) == "Search") {
            echo json_encode(array('table' => Search("SLSMAS", $resource)));
            return;
        }
        elseif (safe($_POST['option']) == "Export") {
            $result = Export("SLSMAS", $resource);
            echo json_encode(array('state' => $result));
            return;
        }
        else {
            echo "Invalid Access!";
        }
    }
    elseif (safe($_POST['event']) == "ExportCUSMAS") {
        $FromCUSNO = safe($_POST['FromCUSNO']);
        $ToCUSNO = safe($_POST['ToCUSNO']);
        $resource = mysql_query("SELECT * FROM CUSMAS WHERE CUSNO>='$FromCUSNO' AND CUSNO<='$ToCUSNO' AND ACTCODE=1");
        if (safe($_POST['option']) == "Search") {
            echo json_encode(array('table' => Search("CUSMAS", $resource)));
            return;
        }
        elseif (safe($_POST['option']) == "Export") {
            $result = Export("CUSMAS", $resource);
            echo json_encode(array('state' => $result));
            return;
        }
        else {
            echo "Invalid Access!";
        }
    }
    elseif (safe($_POST['event']) == "ExportCUSADD") {
        $FromCUSNO = safe($_POST['FromCUSNO']);
        $ToCUSNO = safe($_POST['ToCUSNO']);
        $resource = mysql_query("SELECT * FROM CUSADD WHERE CUSNO>='$FromCUSNO' AND CUSNO<='$ToCUSNO' AND ACTCODE=1");
        if (safe($_POST['option']) == "Search") {
            echo json_encode(array('table' => Search("CUSADD", $resource)));
            return;
        }
        elseif (safe($_POST['option']) == "Export") {
            $result = Export("CUSADD", $resource);
            echo json_encode(array('state' => $result));
            return;
        }
        else {
            echo "Invalid Access!";
        }
    }
    elseif (safe($_POST['event']) == "ExportCUSREGION") {
        $FromREGIONNO = safe($_POST['FromREGIONNO']);
        $ToREGIONNO = safe($_POST['ToREGIONNO']);
        $resource = mysql_query("SELECT * FROM CUSREGION WHERE REGIONNO>='$FromREGIONNO' AND REGIONNO<='$ToREGIONNO' AND ACTCODE=1");
        if (safe($_POST['option']) == "Search") {
            echo json_encode(array('table' => Search("CUSREGION", $resource)));
            return;
        }
        elseif (safe($_POST['option']) == "Export") {
            $result = Export("CUSREGION", $resource);
            echo json_encode(array('state' => $result));
            return;
        }
        else {
            echo "Invalid Access!";
        }
    }
    elseif (safe($_POST['event']) == "ExportCUSCITY") {
        $FromCITYNO = safe($_POST['FromCITYNO']);
        $ToCITYNO = safe($_POST['ToCITYNO']);
        $resource = mysql_query("SELECT * FROM CUSCITY WHERE CITYNO>='$FromCITYNO' AND CITYNO<='$ToCITYNO' AND ACTCODE=1");
        if (safe($_POST['option']) == "Search") {
            echo json_encode(array('table' => Search("CUSCITY", $resource)));
        return;
        }
        elseif (safe($_POST['option']) == "Export") {
            $result = Export("CUSCITY", $resource);
            echo json_encode(array('state' => $result));
            return;
        }
        else {
            echo "Invalid Access!";
        }
    }
    else {
        echo "Invalid Access!";
    }
}
else {
    echo "Invalid Access!";
}

function Search($title, $resource) {
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
        $table .= '<tr><th>顧客編號</th><th>顧客名稱</th><th>地址 1</th><th>地址 2</th><th>地址 3</th><th>所屬城市</th><th>所屬縣市</th><th>所屬國家</th><th>郵遞區號</th><th>接觸人員</th><th>電話</th><th>傳真</th><th>電子信箱</th><th>網址</th><th>所屬銷售員編號</th><th>預設運送地編號</th><th>預設帳單地編號</th><th>年結帳至今銷售額</th><th>季結帳至今銷售額</th><th>月結帳至今銷售額</th><th>應收帳款</th><th>30~60天應收帳款</th><th>60~90天應收帳款</th><th>90~120天應收帳款</th><th>超過120天應收帳款</th><th>特殊要求</th><th>信用狀態</th><th>統一編號</th></tr>';
        while($CUSMAS = mysql_fetch_array($resource)){
            $table .= '<tr><td>'.$CUSMAS['CUSNO'].'</td><td>'.$CUSMAS['CUSNM'].'</td><td>'.$CUSMAS['ADD_1'].'</td><td>'.$CUSMAS['ADD_2'].'</td><td>'.$CUSMAS['ADD_3'].'</td><td>'.$CUSMAS['CITY'].'</td><td>'.$CUSMAS['COUNTY'].'</td><td>'.$CUSMAS['COUNTRY'].'</td><td>'.$CUSMAS['ZCODE'].'</td><td>'.$CUSMAS['CNTPER'].'</td><td>'.$CUSMAS['TEL'].'</td><td>'.$CUSMAS['FAX'].'</td><td>'.$CUSMAS['EMAIL'].'</td><td>'.$CUSMAS['WSITE'].'</td><td>'.$CUSMAS['SALPERNO'].'</td><td>'.$CUSMAS['DFSHIPNO'].'</td><td>'.$CUSMAS['DFBILLNO'].'</td><td>'.$CUSMAS['SALEAMTYTD'].'</td><td>'.$CUSMAS['SALEAMTSTD'].'</td><td>'.$CUSMAS['SALEAMTMTD'].'</td><td>'.$CUSMAS['CURAR'].'</td><td>'.$CUSMAS['AR30_60'].'</td><td>'.$CUSMAS['AR60_90'].'</td><td>'.$CUSMAS['AR90_120'].'</td><td>'.$CUSMAS['M120AR'].'</td><td>'.$CUSMAS['SPEINS'].'</td><td>'.$CUSMAS['CREDITSTAT'].'</td><td>'.$CUSMAS['TAXID'].'</td></tr>';
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

function Export($title, $resource) {
    if ($title == "SLSMAS") {
        $fp = fopen("銷售員.xls", "w");
        $content = "銷售員編號 \t銷售員名稱 \t員工編號 \t 酬勞比率(%) \t年結帳至今銷售額 \t季結帳至今銷售額 \t月結帳至今銷售額\n";
        while ($SLSMAS = mysql_fetch_array($resource)) {
            $content .= $SLSMAS['SALPERNO']."\t".$SLSMAS['SALPERNM']."\t".$SLSMAS['EMPNO']."\t".$SLSMAS['COMRATE']."\t".$SLSMAS['SALEAMTYTD']."\t".$SLSMAS['SALEAMTSTD']."\t".$SLSMAS['SALEAMTMTD']."\n";
        }
    }
    elseif ($title == "CUSMAS") {
        $fp = fopen("顧客.xls", "w");
        $content = "顧客編號 \t顧客名稱 \t地址編號 1 \t地址編號 2 \t地址編號 3 \t所屬城市 \t所屬縣市 \t所屬國家 \t郵遞區號 \t接觸人員 \t電話 \t傳真 \t電子信箱 \t網址 \t所屬銷售員編號 \t預設運送地編號 \t預設帳單地編號 \t年結帳至今銷售額 \t季結帳至今銷售額 \t月結帳至今銷售額 \t應收帳款 \t30~60天應收帳款 \t60~90天應收帳款 \t90~120天應收帳款 \t超過120天應收帳款 \t特殊要求 \t信用狀態 \t統一編號\n";
        while ($CUSMAS = mysql_fetch_array($resource)) {
            $content .= $CUSMAS['CUSNO']."\t".$CUSMAS['CUSNM']."\t".$CUSMAS['ADDNO_1']."\t".$CUSMAS['ADDNO_2']."\t".$CUSMAS['ADDNO_3']."\t".$CUSMAS['CITY']."\t".$CUSMAS['COUNTY']."\t".$CUSMAS['COUNTRY']."\t".$CUSMAS['ZCODE']."\t".$CUSMAS['CNTPER']."\t".$CUSMAS['TEL']."\t".$CUSMAS['FAX']."\t".$CUSMAS['EMAIL']."\t".$CUSMAS['WSITE']."\t".$CUSMAS['SALPERNO']."\t".$CUSMAS['DFSHIPNO']."\t".$CUSMAS['DFBILLNO']."\t".$CUSMAS['SALEAMTYTD']."\t".$CUSMAS['SALEAMTSTD']."\t".$CUSMAS['SALEAMTMTD']."\t".$CUSMAS['CURAR']."\t".$CUSMAS['AR30_60']."\t".$CUSMAS['AR60_90']."\t".$CUSMAS['AR90_120']."\t".$CUSMAS['M120AR']."\t".$CUSMAS['SPEINS']."\t".$CUSMAS['CREDITSTAT']."\t".$CUSMAS['TAXID']."\n";
        }
    }
    elseif ($title == "CUSADD") {
        $fp = fopen("顧客地址.xls", "w");
        $content = "顧客編號 \t地址編號 \t地址 1 \t地址 2 \t地址 3 \t所屬城市 \t所屬縣市 \t所屬國家 \t郵遞區號 \t接觸人員 \t電話 \t傳真 \t電子信箱\n";
        while ($CUSADD = mysql_fetch_array($resource)) {
            $content .= $CUSADD['CUSNO']."\t".$CUSADD['ADDNO']."\t".$CUSADD['ADD_1']."\t".$CUSADD['ADD_2']."\t".$CUSADD['ADD_3']."\t".$CUSADD['CITY']."\t".$CUSADD['COUNTY']."\t".$CUSADD['COUNTRY']."\t".$CUSADD['ZCODE']."\t".$CUSADD['CNTPER']."\t".$CUSADD['TEL']."\t".$CUSADD['FAX']."\t".$CUSADD['EMAIL']."\n";
        }
    }
    elseif ($title == "CUSREGION") {
        $fp = fopen("顧客地區.xls", "w");
        $content = "廠商暨地區編號 \t通路編號 \t通路名稱 \t廠商公司編號 \t廠商公司名稱 \t地區編號 \t敘述\n";
        while ($CUSREGION = mysql_fetch_array($resource)) {
            $content .= $CUSREGION['REGIONNO']."\t".$CUSREGION['CHANNELNO']."\t".$CUSREGION['CHANNELNM']."\t".$CUSREGION['COMPANYNO']."\t".$CUSREGION['COMPANYNM']."\t".$CUSREGION['DISTRICTNO']."\t".$CUSREGION['DESCRIPTION']."\n";
        }
    }
    elseif ($title == "CUSCITY") {
        $fp = fopen("顧客城市.xls", "w");
        $content = "城市編號 \t城市名稱 \t所屬廠商暨地區編號\n";
        while ($CUSCITY = mysql_fetch_array($resource)) {
            $content .= $CUSCITY['CITYNO']."\t".$CUSCITY['CITYNM']."\t".$CUSCITY['REGIONNO']."\n";
        }
    }
    if (fputs($fp, mb_convert_encoding($content, "Big5", "UTF-8"))) {
        fclose($fp);
        return 0;
    }
    else {
        fclose($fp);
        return -1;
    }
}
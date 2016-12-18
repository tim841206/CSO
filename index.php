<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['module']) && !empty($_POST['event'])){
	if ($_POST['module'] == 'CreateMAS'){
		if ($_POST['event'] == 'CreateSLSMAS'){
			echo json_encode(array('state' => 0, 'destination' => 'CreateMAS/CreateSLSMAS.html'));
			return;
		}
		elseif ($_POST['event'] == 'CreateCUSMAS'){
			echo json_encode(array('state' => 0, 'destination' => 'CreateMAS/CreateCUSMAS.html'));
			return;
		}
		elseif ($_POST['event'] == 'CreateCUSADD'){
			echo json_encode(array('state' => 0, 'destination' => 'CreateMAS/CreateCUSADD.html'));
			return;
		}
		elseif ($_POST['event'] == 'CreateCUSREGION'){
			echo json_encode(array('state' => 0, 'destination' => 'CreateMAS/CreateCUSREGION.html'));
			return;
		}
		elseif ($_POST['event'] == 'CreateCUSCITY'){
			echo json_encode(array('state' => 0, 'destination' => 'CreateMAS/CreateCUSCITY.html'));
			return;
		}
		elseif ($_POST['event'] == 'CreateCUSADDCITY'){
			echo json_encode(array('state' => 0, 'destination' => 'CreateMAS/CreateCUSADDCITY.html'));
			return;
		}
		else {
			echo json_encode(array('state' => 3));
			return;
		}
	}
	elseif ($_POST['module'] == 'EditMAS'){
		if ($_POST['event'] == 'EditSLSMAS'){
			echo json_encode(array('state' => 0, 'destination' => 'EditMAS/EditSLSMAS.html'));
			return;
		}
		elseif ($_POST['event'] == 'EditCUSMAS'){
			echo json_encode(array('state' => 0, 'destination' => 'EditMAS/EditCUSMAS.html'));
			return;
		}
		elseif ($_POST['event'] == 'EditCUSADD'){
			echo json_encode(array('state' => 0, 'destination' => 'EditMAS/EditCUSADD.html'));
			return;
		}
		elseif ($_POST['event'] == 'EditCUSREGION'){
			echo json_encode(array('state' => 0, 'destination' => 'EditMAS/EditCUSREGION.html'));
			return;
		}
		elseif ($_POST['event'] == 'EditCUSCITY'){
			echo json_encode(array('state' => 0, 'destination' => 'EditMAS/EditCUSCITY.html'));
			return;
		}
		elseif ($_POST['event'] == 'EditCUSADDCITY'){
			echo json_encode(array('state' => 0, 'destination' => 'EditMAS/EditCUSADDCITY.html'));
			return;
		}
		else {
			echo json_encode(array('state' => 3));
			return;
		}
	}
	elseif ($_POST['module'] == 'DeleteMAS'){
		if ($_POST['event'] == 'DeleteSLSMAS'){
			echo json_encode(array('state' => 0, 'destination' => 'DeleteMAS/DeleteSLSMAS.html'));
			return;
		}
		elseif ($_POST['event'] == 'DeleteCUSMAS'){
			echo json_encode(array('state' => 0, 'destination' => 'DeleteMAS/DeleteCUSMAS.html'));
			return;
		}
		elseif ($_POST['event'] == 'DeleteCUSADD'){
			echo json_encode(array('state' => 0, 'destination' => 'DeleteMAS/DeleteCUSADD.html'));
			return;
		}
		elseif ($_POST['event'] == 'DeleteCUSREGION'){
			echo json_encode(array('state' => 0, 'destination' => 'DeleteMAS/DeleteCUSREGION.html'));
			return;
		}
		elseif ($_POST['event'] == 'DeleteCUSCITY'){
			echo json_encode(array('state' => 0, 'destination' => 'DeleteMAS/DeleteCUSCITY.html'));
			return;
		}
		elseif ($_POST['event'] == 'DeleteCUSADDCITY'){
			echo json_encode(array('state' => 0, 'destination' => 'DeleteMAS/DeleteCUSADDCITY.html'));
			return;
		}
		else {
			echo json_encode(array('state' => 3));
			return;
		}
	}
	elseif ($_POST['module'] == 'ExportMAS'){
		if ($_POST['event'] == 'ExportSLSMAS'){
			echo json_encode(array('state' => 0, 'destination' => 'ExportMAS/ExportSLSMAS.html'));
			return;
		}
		elseif ($_POST['event'] == 'ExportCUSMAS'){
			echo json_encode(array('state' => 0, 'destination' => 'ExportMAS/ExportCUSMAS.html'));
			return;
		}
		elseif ($_POST['event'] == 'ExportCUSADD'){
			echo json_encode(array('state' => 0, 'destination' => 'ExportMAS/ExportCUSADD.html'));
			return;
		}
		elseif ($_POST['event'] == 'ExportCUSREGION'){
			echo json_encode(array('state' => 0, 'destination' => 'ExportMAS/ExportCUSREGION.html'));
			return;
		}
		elseif ($_POST['event'] == 'ExportCUSCITY'){
			echo json_encode(array('state' => 0, 'destination' => 'ExportMAS/ExportCUSCITY.html'));
			return;
		}
		else {
			echo json_encode(array('state' => 3));
			return;
		}
	}
	elseif ($_POST['module'] == 'SearchMAS'){
		if ($_POST['event'] == 'SearchSLSMAS'){
			echo json_encode(array('state' => 0, 'destination' => 'SearchMAS/SearchSLSMAS.html'));
			return;
		}
		elseif ($_POST['event'] == 'SearchCUSMAS'){
			echo json_encode(array('state' => 0, 'destination' => 'SearchMAS/SearchCUSMAS.html'));
			return;
		}
		elseif ($_POST['event'] == 'SearchCUSADD'){
			echo json_encode(array('state' => 0, 'destination' => 'SearchMAS/SearchCUSADD.html'));
			return;
		}
		elseif ($_POST['event'] == 'SearchCUSREGION'){
			echo json_encode(array('state' => 0, 'destination' => 'SearchMAS/SearchCUSREGION.html'));
			return;
		}
		elseif ($_POST['event'] == 'SearchCUSCITY'){
			echo json_encode(array('state' => 0, 'destination' => 'SearchMAS/SearchCUSCITY.html'));
			return;
		}
		elseif ($_POST['event'] == 'SearchCUSADDCITY'){
			echo json_encode(array('state' => 0, 'destination' => 'SearchMAS/SearchCUSADDCITY.html'));
			return;
		}
		else {
			echo json_encode(array('state' => 3));
			return;
		}
	}
	elseif ($_POST['module'] == 'CrossSearchMAS'){
		if ($_POST['event'] == 'SLSMASSearchCUSMAS'){
			echo json_encode(array('state' => 0, 'destination' => 'CrossSearchMAS/SLSMASSearchCUSMAS.html'));
			return;
		}
		elseif ($_POST['event'] == 'CUSMASSearchCUSADD'){
			echo json_encode(array('state' => 0, 'destination' => 'CrossSearchMAS/CUSMASSearchCUSADD.html'));
			return;
		}
		elseif ($_POST['event'] == 'CUSREGIONSearchCUSCITY'){
			echo json_encode(array('state' => 0, 'destination' => 'CrossSearchMAS/CUSREGIONSearchCUSCITY.html'));
			return;
		}
		elseif ($_POST['event'] == 'CUSCITYSearchCUSADDCITY'){
			echo json_encode(array('state' => 0, 'destination' => 'CrossSearchMAS/CUSCITYSearchCUSADDCITY.html'));
			return;
		}
		else {
			echo json_encode(array('state' => 3));
			return;
		}
	}
	elseif ($_POST['module'] == 'ORDMAS'){
		if ($_POST['event'] == 'CreateORDMAS'){
			echo json_encode(array('state' => 0, 'destination' => 'ORDMAS/CreateORDMAS.html'));
			return;
		}
		elseif ($_POST['event'] == 'EditORDMAS'){
			echo json_encode(array('state' => 0, 'destination' => 'ORDMAS/EditORDMAS.html'));
			return;
		}
		elseif ($_POST['event'] == 'DeleteORDMAS'){
			echo json_encode(array('state' => 0, 'destination' => 'ORDMAS/DeleteORDMAS.html'));
			return;
		}
		elseif ($_POST['event'] == 'CreateORDMAT'){
			echo json_encode(array('state' => 0, 'destination' => 'ORDMAS/CreateORDMAT.html'));
			return;
		}
		elseif ($_POST['event'] == 'EditORDMAT'){
			echo json_encode(array('state' => 0, 'destination' => 'ORDMAS/EditORDMAT.html'));
			return;
		}
		elseif ($_POST['event'] == 'DeleteORDMAT'){
			echo json_encode(array('state' => 0, 'destination' => 'ORDMAS/DeleteORDMAT.html'));
			return;
		}
		else {
			echo json_encode(array('state' => 3));
			return;
		}
	}
	elseif ($_POST['module'] == 'SearchORDMAS'){
		if ($_POST['event'] == 'SLSMASSearchORDMAS'){
			echo json_encode(array('state' => 0, 'destination' => 'SearchORDMAS/SLSMASSearchORDMAS.html'));
			return;
		}
		elseif ($_POST['event'] == 'ORDNOSearchORDMAT'){
			echo json_encode(array('state' => 0, 'destination' => 'SearchORDMAS/ORDNOSearchORDMAT.html'));
			return;
		}
		elseif ($_POST['event'] == 'ORDNOSearchORDMAS'){
			echo json_encode(array('state' => 0, 'destination' => 'SearchORDMAS/ORDNOSearchORDMAS.html'));
			return;
		}
		elseif ($_POST['event'] == 'ORDMATSearchORDMAS'){
			echo json_encode(array('state' => 0, 'destination' => 'SearchORDMAS/ORDMATSearchORDMAS.html'));
			return;
		}
		else {
			echo json_encode(array('state' => 3));
			return;
		}
	}
	elseif ($_POST['module'] == 'PublishORDMAS'){
		if ($_POST['event'] == 'R_ORDMAS'){
			echo json_encode(array('state' => 0, 'destination' => 'PublishORDMAS/R_ORDMAS.html'));
			return;
		}
		elseif ($_POST['event'] == 'C_ORDMAS'){
			echo json_encode(array('state' => 0, 'destination' => 'PublishORDMAS/C_ORDMAS.html'));
			return;
		}
		elseif ($_POST['event'] == 'F_ORDMAS'){
			echo json_encode(array('state' => 0, 'destination' => 'PublishORDMAS/F_ORDMAS.html'));
			return;
		}
		elseif ($_POST['event'] == 'RR_ORDMAS'){
			echo json_encode(array('state' => 0, 'destination' => 'PublishORDMAS/RR_ORDMAS.html'));
			return;
		}
		else {
			echo json_encode(array('state' => 3));
			return;
		}
	}
	elseif ($_POST['module'] == 'Transaction'){
		if ($_POST['event'] == 'PrintPCK'){
			echo json_encode(array('state' => 0, 'destination' => 'Transaction/PrintPCK.html'));
			return;
		}
		elseif ($_POST['event'] == 'SearchPCK'){
			echo json_encode(array('state' => 0, 'destination' => 'Transaction/SearchPCK.html'));
			return;
		}
		elseif ($_POST['event'] == 'PergePCK'){
			echo json_encode(array('state' => 0, 'destination' => 'Transaction/PergePCK.html'));
			return;
		}
		elseif ($_POST['event'] == 'CreateINV'){
			echo json_encode(array('state' => 0, 'destination' => 'Transaction/CreateINV.html'));
			return;
		}
		elseif ($_POST['event'] == 'PrintINV'){
			echo json_encode(array('state' => 0, 'destination' => 'Transaction/PrintINV.html'));
			return;
		}
		elseif ($_POST['event'] == 'SearchINV'){
			echo json_encode(array('state' => 0, 'destination' => 'Transaction/SearchINV.html'));
			return;
		}
		else {
			echo json_encode(array('state' => 3));
			return;
		}
	}
	else {
		echo json_encode(array('state' => 2));
			return;
	}
}
else {
	echo json_encode(array('state' => 1));
	return;
}
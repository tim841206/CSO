<?
include_once("../resource/database.php");

if ($_POST['module'] == "Transaction") {
	if ($_POST['event'] == "CreateINV") {
		
	}
	elseif ($_POST['event'] == "PrintINV") {
		
	}
	elseif ($_POST['event'] == "SearchINV") {
		
	}
	elseif ($_POST['event'] == "PergePCK") {
		
	}
	elseif ($_POST['event'] == "PrintPCK") {
		
	}
	elseif ($_POST['event'] == "SearchPCK") {
		
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
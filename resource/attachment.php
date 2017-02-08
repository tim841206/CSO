<?
function safe($value) {
	return htmlspecialchars(addslashes($value));
}
?>
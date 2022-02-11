<?php session_start();
	if ($_SESSION['username']!=''){
		unset($_SESSION['username']); // xóa session login
		session_destroy();
	}
	header('location: index.php');

?>
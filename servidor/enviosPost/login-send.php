<?php 
	include '../clases/classcontroler.php';
	$inicioSession = new sessions;
	if ($_POST) {
		$inicioSession->ykuser = $_POST['ykuser'];
		$inicioSession->ykpass = md5($_POST['ykpass']);
		$inicioSession->startsessions();
	}else{
		echo "<script language='JavaScript'> alert('Oppss no se puede iniciar la sesión'); window.location='../../cpanel/index.php';</script>";
	}

?>
<?php 
	session_start();
	include '../clases/classcontroler.php';
	$destroysession = new sessions;
	if ($_REQUEST) {
		$destroysession->destroysession();
	}
?>
<?php
	$query_supprimer = "DELETE FROM user WHERE login ='" . $_SESSION['login'] . "'";
	$result = mysql_query($query_supprimer);
	if($result){
		echo 'Votre compte a été supprimé.';
		session_destroy();
		header("Refresh:1 ;url=index.php");
	}

?>
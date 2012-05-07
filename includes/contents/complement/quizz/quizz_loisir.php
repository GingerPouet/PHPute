<?php
	$query_quizz_themes = "SELECT titre,loginUser FROM quizz NATURAL JOIN quizz_theme WHERE idTheme = 6";
	$result = mysql_query($query_quizz_themes);

	while($row = mysql_fetch_row($result)){
		$titre_quizz = $row[0];
		$user_quizz = $row[1];
		
		
		echo '- ' . $titre_quizz . '<br/> par :  <a href="index.php?page=profil&login=' . $user_quizz . '">' . $user_quizz . '</a><br/><br/>';
	}
?>
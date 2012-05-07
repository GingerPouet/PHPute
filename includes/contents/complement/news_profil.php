<?php

if(isset($_GET["login"])&& ($_GET["login"]== $_SESSION["login"])){

	echo '<h1> Mes quizz : </h1><br/>';

	$query_quizz= "SELECT titre FROM quizz WHERE loginUser = '".$_SESSION["login"]."' ";
	$result = mysql_query($query_quizz);
	
	if($result){
		$nb_lignes = mysql_num_rows($result);
		if($nb_lignes == 0) echo 'Vous n\'avez créé aucun quizz pour le moment. <a href="index.php?page=quizz"> Créez votre premier quizz.</a><br />';
		else{
			while($row = mysql_fetch_row($result)){
				$quizz_de_user = $row[0];
				echo '- ' . $quizz_de_user . '<br />';
			}
			echo '<br /> <a href="index.php?page=quizz"> Créer un nouveau quizz.</a><br />';
		}
	}
	
	echo '<br /><h1> Mon score : </h1><br/>';

	$query_score = "SELECT score FROM user WHERE login = '".$_SESSION["login"]."' ";
	$result2 = mysql_query($query_score);
	
	if($result2){
		while($row = mysql_fetch_row($result2)){
			$score_user = $row[0];
			echo 'Vous avez ' . $score_user . ' points. <br /><br /> Vous pouvez augmenter votre score en jouant aux quizz. <br /><a href="index.php?page=quizz"> Accéder aux quizz.</a><br />';
		}
	}
	
	echo '<br /><b>Meilleurs joueurs :</b><br/><br />';
	
	$query_meilleur = "SELECT login, score, sex FROM user WHERE score = (SELECT MAX(score) FROM user)";
	$result3 = mysql_query($query_meilleur);
	
	if($result3){
		$row = mysql_fetch_row($result3);
		$meilleur = $row[0];
		$m_score = $row[1];
		$m_sexe = $row[2];
		
		if($m_sexe == 'f') echo '- 1ère ';
		else echo '- 1er : ';
		echo 'avec ' . $m_score . ' points : <a href="index.php?page=profil&login=' . $meilleur . '">' . $meilleur . '</a><br />';
	
	}

	$query_deuxieme = "SELECT login, score FROM user WHERE score = (SELECT MAX(score) FROM user WHERE score < " . $m_score . ")" ;
	$result4 = mysql_query($query_deuxieme);
	
	if($result4){
		$row = mysql_fetch_row($result4);
			$deuxieme = $row[0];
			$d_score = $row[1];
			echo '- 2ème avec ' . $d_score . ' points : <a href="index.php?page=profil&login=' . $deuxieme . '">' . $deuxieme . '</a><br />';
		}
	
	
	$query_troisieme = "SELECT login, score FROM user WHERE score = (SELECT MAX(score) FROM user WHERE score < " . $d_score . ")" ;
	$result5 = mysql_query($query_troisieme);
	
	if($result5){
		$row = mysql_fetch_row($result5);
			$troisieme = $row[0];
			$t_score = $row[1];
			echo '- 3ème avec ' . $t_score . ' points : <a href="index.php?page=profil&login=' . $troisieme . '">' . $troisieme . '</a><br />';
		}
}


?>
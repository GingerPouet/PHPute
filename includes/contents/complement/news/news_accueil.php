<div class="news_haut">
	<?php

	echo '<h1> Actu : </h1><br />';

	echo '<b> Dernier(s) inscrit(s) : </b><br /><br />';
	$query_dernier = "SELECT login, sex, idUser FROM user WHERE idUser = (SELECT MAX(idUser) FROM user)";
	$result = mysql_query($query_dernier);
	
	if($result){
		$row = mysql_fetch_row($result);
		$der_login = $row[0];
		$der_sex = $row[1];
		$der_id = $row[2];


		$query_av_der = "SELECT login, sex FROM user WHERE idUser = (SELECT MAX(idUser) FROM user WHERE idUser < " . $der_id . ")" ;
		$result2 = mysql_query($query_av_der);
		
		if($result2){
			$row = mysql_fetch_row($result2);
				$av_login = $row[0];
				$av_sex = $row[1];
				
			if($av_sex=='f') echo '<img src="img/f.png">'; else echo'<img src="img/h.png">'; 
			echo '<a href="index.php?page=profil&login=' . $av_login . '">' . $av_login . '</a><br />';
		}
			if($der_sex=='f') echo '<img src="img/f.png">'; else echo'<img src="img/h.png">'; 
			echo '<a href="index.php?page=profil&login=' . $der_login . '">' . $der_login . '</a><br />';
	}
		
		echo '<br /><br />';
	?>
</div>

<div class="droite_bas">
<?php
	echo '<b> Dernier(s) quizz créé(s) : </b><br /><br />';
	
		$query_derq = "SELECT titre,loginUser,idQuizz FROM quizz WHERE idQuizz = (SELECT MAX(idQuizz) FROM quizz)";
		$result3 = mysql_query($query_derq);
	
	if($result3){
		$row = mysql_fetch_row($result3);
		$derq_titre = $row[0];
		$derq_user = $row[1];
		$derq_id = $row[2];


		$query_av_derq = "SELECT titre,loginUser FROM quizz WHERE idQuizz = (SELECT MAX(idQuizz) FROM quizz WHERE idQuizz < " . $derq_id . ")" ;
		$result4 = mysql_query($query_av_derq);
		
		if($result4){
			$row = mysql_fetch_row($result4);
				$av_titre = $row[0];
				$av_user = $row[1];
				
			echo '- ' . $av_titre . '<br /> par : <a href="index.php?page=profil&login=' . $av_user . '">' . $av_user . '</a><br /><br />';
		}

			echo '- ' . $derq_titre . '<br /> par : <a href="index.php?page=profil&login=' . $derq_user . '">' . $derq_user . '</a><br /><br />';
	}

		
?>
</div>
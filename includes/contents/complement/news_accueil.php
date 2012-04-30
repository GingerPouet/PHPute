<div class="news_haut">
	<?php

	echo '<h1> Actu : </h1><br/>';

	echo '<b> Dernier(s) inscrit(s) : </b><br/><br/>';
		$query_der_inscrit = "SELECT login,sex FROM user WHERE idUser = (SELECT MAX(idUser) FROM user) OR idUser = (SELECT MAX(idUser-1) FROM user)";
		$result = mysql_query($query_der_inscrit);

		while($row = mysql_fetch_row($result)){

			$login_der = $row[0];
			$sex_der = $row[1];

			echo '- ';
			if($sex_der=='f') echo '<img src="img/f.png">'; else echo'<img src="img/h.png">'; 
			echo '<a href="index.php?page=profil&login=' . $login_der . '">' . $login_der . '</a><br/>';
		}
		
		echo '<br/><br/>';
	?>
</div>

<div class="droite_bas">
<?php
	echo '<b> Dernier(s) quizz créé(s) : </b><br/><br/>';
		$query_der_quizz = "SELECT titre,loginUser FROM quizz WHERE idQuizz = (SELECT MAX(idQuizz) FROM quizz) OR idQuizz = (SELECT MAX(idQuizz-1) FROM quizz)";
		$result = mysql_query($query_der_quizz);
		
		while($row = mysql_fetch_row($result)){
		
			$titre = $row[0];
			$login = $row[1];	
			
			echo '- ' . $titre . '<br/> par :  <a href="index.php?page=profil&login=' . $login . '">' . $login . '</a><br/><br/>';
		}		
		
?>
</div>
<div class="news_haut">
<?php

	echo '<b> Voir les quizz par rubrique : </b><br/><br/>';
	
	$query_themes_presents = "SELECT DISTINCT idTheme FROM quizz NATURAL JOIN quizz_theme WHERE idTheme NOT IN (SELECT titre FROM quizz NATURAL JOIN quizz_theme WHERE idTheme IS NULL) ORDER BY idTheme";
	$result = mysql_query($query_themes_presents);
	
	while($row = mysql_fetch_row($result)){
		$idTheme = $row[0];
		
		switch($idTheme) {
			case 1:
				$theme = 'Musique';
				$page_t = 'musique';
				break;
			case 2:
				$theme = 'Cinéma';
				$page_t = 'cinema';
				break;
			case 3:
				$theme = 'Littérature';
				$page_t = 'litterature';
				break;
			case 4:
				$theme = 'Sport';
				$page_t = 'sport';
				break;
			case 5:
				$theme = 'Histoire';
				$page_t = 'histoire';
				break;
			case 6:
				$theme = 'Loisir';
				$page_t = 'loisir';
				break;
			case 7:
				$theme = 'Animaux';
				$page_t = 'animaux';
				break;
			case 8:
				$theme = 'Humour';
				$page_t = 'humour';
				break;
			default:
				break;
		}
	
		echo '<a href="index.php?page=quizz&page_t=' . $page_t . '">' . $theme . '</a><br />';
	}
	
?>

</div>

<div class="droite_bas">
<?php
	if(isset($_GET['page_t'])){
		switch ($_GET['page_t']){
		
			case 'musique':
			include ("includes/contents/complement/quizz/quizz_musique.php");
			break;
			
			case 'cinema':
			include ("includes/contents/complement/quizz/quizz_cinema.php");
			break;
			
			case 'litterature':
			include ("includes/contents/complement/quizz/quizz_litterature.php");
			break;
			
			case 'sport':
			include ("includes/contents/complement/quizz/quizz_sport.php");
			break;
			
			case 'histoire':
			include ("includes/contents/complement/quizz/quizz_histoire.php");
			break;
			
			case 'loisir':
			include ("includes/contents/complement/quizz/quizz_loisir.php");
			break;
			
			case 'animaux':
			include ("includes/contents/complement/quizz/quizz_animaux.php");
			break;
			
			case 'humour':
			include ("includes/contents/complement/quizz/quizz_humour.php");
			break;
			
			default:
			break;
		
		}
	}

?>	
</div>
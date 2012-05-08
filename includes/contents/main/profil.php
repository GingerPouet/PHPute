<div class="info">  
	<?php
	if(isset($_GET["login"])&& ($_GET["login"]== $_SESSION["login"])){
		$sql= "SELECT * FROM user WHERE login = '".$_SESSION["login"]."' ";
		$result = mysql_query($sql);
		if($result){
		 $row = mysql_fetch_assoc($result);
		 $_SESSION["idUser"] = $row["idUser"];
		 $_SESSION["login"] = $row["login"];
		 $_SESSION["score"] = $row["score"];
		 $_SESSION["nom"] = $row["nom"];
		 $_SESSION["prenom"] = $row["prenom"];
		 $_SESSION["sex"] = $row["sex"];
		 $_SESSION["dateN"] = $row["dateN"];
		 $_SESSION["dateI"] = $row["dateI"];
		 $_SESSION["nbquizz"] = $row["nbquizz"];
		 $_SESSION["avatar"] = $row["avatar"];
		}
		$idUser = $_SESSION["idUser"];
		$login = $_SESSION["login"];
		$score = $_SESSION["score"];
		$nom = $_SESSION["nom"];
		$prenom = $_SESSION["prenom"];
		$sex = $_SESSION["sex"];
		$dateN = $_SESSION["dateN"];
		$dateI = $_SESSION["dateI"];
		$nbquizz = $_SESSION["nbquizz"];
		$avatar = $_SESSION["avatar"];
		
	}
	else if(isset($_GET["login"])&& ($_GET["login"]!= $_SESSION["login"])){
		$sql= "SELECT * FROM user WHERE login = '".$_GET["login"]."' ";
		$result = mysql_query($sql);
		if($result){
		 $row = mysql_fetch_assoc($result);
		 $infoUser["idUser"] = $row["idUser"];
		 $infoUser["login"] = $row["login"];
		 $infoUser["score"] = $row["score"];
		 $infoUser["nom"] = $row["nom"];
		 $infoUser["prenom"] = $row["prenom"];
		 $infoUser["sex"] = $row["sex"];
		 $infoUser["dateN"] = $row["dateN"];
		 $infoUser["dateI"] = $row["dateI"];
		 $infoUser["nbquizz"] = $row["nbquizz"];
		 $infoUser["avatar"] = $row["avatar"];
		}
		$idUser = $infoUser["idUser"];
		$login = $infoUser["login"];
		$score = $infoUser["score"];
		$nom = $infoUser["nom"];
		$prenom = $infoUser["prenom"];
		$sex = $infoUser["sex"];
		$dateN = $infoUser["dateN"];
		$dateI = $infoUser["dateI"];
		$nbquizz = $infoUser["nbquizz"];
		$avatar = $infoUser["avatar"];
	}
	?>

	<div class="droite_haut">

	<?php 
	
		$query_avatar = "SELECT avatar FROM user WHERE login = '" . $login . "'";
		$result = mysql_query($query_avatar);
		
		if($result){
			$row = mysql_fetch_row($result);
			$avatar_bdd = $row[0];
			
			switch($avatar_bdd){
					case 1:
						$type_image = 'jpg';
						break;
					case 2:
						$type_image = 'jpeg';
						break;
					case 3:
						$type_image = 'gif';
						break;
					case 4:
						$type_image = 'png';
						break;
					default:
						$type_image = 'jpg';
						break;
				}
				
			if($avatar_bdd != 0) {
				?><div class="rotate"> <?php echo '<img src="img/uploads/' . $idUser . '.' . $type_image . '" align="right" class="avatar">'; ?> </div><?php 
			}
		}
				
				
		echo '<h1>' ;
		if($sex=='f') echo '<img src="img/f.png">';
		else echo'<img src="img/h.png">'; 
		echo $login . "</h1><br/><br/><br/>";
		?>

	</div>

	<?php
	if(isset($_GET["login"])&& ($_GET["login"]== $_SESSION["login"])){
		?>
		<form method="post" action="<?php echo 'index.php?page=profil&login='.$login; ?>" enctype="multipart/form-data">
			<p>
				<input type="submit" name ="modifier" value="Modifier l'image"/>
			</p>
		</form>
		<?php
		if(isset($_POST['modifier'])){
			include("includes/contents/complement/changer_avatar.php");
		}
		?>

<!-- <pre><?php  print_r($_FILES); ?></pre> -->
		
<?php

if(isset($_POST['change'])){

	//test de validation de l'image

	if(isset($_FILES['im_avatar'])) {
		$extensions_acceptees = array('jpg','jpeg','gif','png');
		$maxsize = $_REQUEST['MAX_FILE_SIZE']; //on récupère la taille maximum pour comparer après
		$etat = 1;

		if($_FILES['im_avatar']['error'] > 0){
			$erreur = "Erreur lors du transfert";
			$etat = 0;
		} else if($_FILES['im_avatar']['size'] > $maxsize){
			$erreur = "L'image dépasse la taille autorisée";
			$etat = 0;
		} else if( preg_match('#[\x00-\x1F\x7F-\x9F/\\\\]#', $_FILES['im_avatar']['name'])){
			$erreur = "Nom de fichier non valide";
			$etat=0;
		}

		$extension_upload = strtolower(substr(strrchr($_FILES['im_avatar']['name'],'.'),1));
		
		if(!in_array($extension_upload,$extensions_acceptees)){
			$erreur = "Le format de l'image n'est pas accepté";
			$etat = 0;
		} 
		
		if(!$etat) echo $erreur;
		else {
			$chemin = 'img/uploads/' . $_SESSION['idUser'] . '.' . $extension_upload ;
			$resultat = move_uploaded_file($_FILES['im_avatar']['tmp_name'],$chemin);
			if ($resultat) {
				echo "Transfert reussi<br />";
				switch($extension_upload){
					case 'jpg':
						$type_image = 1;
						break;
					case 'jpeg':
						$type_image = 2;
						break;
					case 'gif':
						$type_image = 3;
						break;
					case 'png':
						$type_image = 4;
						break;
					default:
						$type_image = 0;
						break;
				}
				$query_change = "UPDATE user SET avatar = " . $type_image . " WHERE login = '" . $_SESSION['login'] . "'";
				$result2 = mysql_query($query_change);
				if(!$result2) echo 'erreur dans la bdd';
	
				echo '<a href="index.php?page=profil&login=' . $_SESSION['login'] . '">Raffraichir la page</a>';
			}

			//redimensionnement de l'image
			$file = $chemin;
			$x = 65; 
			$y = 80;

			$size = getimagesize($file); 

			if ($size) { 

				switch($size['mime']) {
				
					case 'image/jpeg':
						$img_big = imagecreatefromjpeg($file); # On ouvre l'image d'origine 
						$img_new = imagecreate($x, $y); 
						$img_mini = imagecreatetruecolor($x, $y)
						or   $img_mini = imagecreate($x, $y); 
						imagecopyresized($img_mini,$img_big,0,0,0,0,$x,$y,$size[0],$size[1]); 
						imagejpeg($img_mini,$file ); 
						break;
					
				case 'image/png':
						$img_big = imagecreatefrompng($file); # On ouvre l'image d'origine 
						$img_new = imagecreate($x, $y); 
						$img_mini = imagecreatetruecolor($x, $y) 
						or   $img_mini = imagecreate($x, $y); 
						imagecopyresized($img_mini,$img_big,0,0,0,0,$x,$y,$size[0],$size[1]); 
						imagepng($img_mini,$file ); 
						break;

				case 'image/gif':
						$img_big = imagecreatefromgif($file); # On ouvre l'image d'origine 
						$img_new = imagecreate($x, $y); 
						$img_mini = imagecreatetruecolor($x, $y) 
						or   $img_mini = imagecreate($x, $y); 
						imagecopyresized($img_mini,$img_big,0,0,0,0,$x,$y,$size[0],$size[1]); 
						imagegif($img_mini,$file ); 
						break;
					
				}
			}
		}
	}
}

?>

		<div class="clear"></div>
		<?php
	}
	?>
	
	<div class="droite_bas">
		<?php
		
		//pour la date de naissance et la date d'inscription :
		$query_dateN = "SELECT DAY(dateN),MONTH(dateN),YEAR(dateN) FROM user WHERE login = '" . $login . "'";
		$result3 = mysql_query($query_dateN);
		
		if($result3){
			$row = mysql_fetch_row($result3);
			$jour = $row[0];
			$mois = $row[1];
			$annee = $row[2];
		}
		
		$query_dateI = "SELECT DAY(dateI),MONTH(dateI),YEAR(dateI) FROM user WHERE login = '" . $login . "'";
		$result4 = mysql_query($query_dateI);
		
		if($result4){
			$row = mysql_fetch_row($result4);
			$jourI = $row[0];
			$moisI = $row[1];
			$anneeI = $row[2];
		}
		
		echo '<b> ' . $prenom .' '. $nom .'</b><br/><br/>';
		echo '<b> Date de naissance : </b>' . $jour . '-' . $mois . '-' . $annee . '<br/>';
		if($sex == 'f') echo '<b> Inscrite ';
		else echo '<b> Inscrit ';
		echo 'depuis le : </b>' . $jourI . '-' . $moisI . '-' . $anneeI . '<br/>';
		echo '<b> Score : </b>'. $score . '<br/>';
		echo '<b> Quizz crée(s) : </b>' . $nbquizz . '<br/>';
		?>
	</div>
</div>


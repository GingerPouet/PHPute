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
	}
	?>

	<div class="droite_haut">

		<?php $avatar=NULL; ?> 	
		<div class="rotate"> <?php echo '<img src="img/uploads/' . $idUser . '.jpg" align="right" class="avatar">'; ?> </div>
				
		<?php 
		echo '<h1>' ;
		if($sex=='f') echo '<img src="img/f.png">';
		else echo'<img src="img/h.png">'; 
		echo $login . "</h1><br/><br/><br/>";
		?>

	</div>

	<?php
	if(isset($_GET["login"])&& ($_GET["login"]== $_SESSION["login"])){
		?>
		<form method="post" action="<?php echo 'index.php?page=profil&login='.$login.'&avatar=changer'; ?>" enctype="multipart/form-data">
			<p>
				<input type="submit" name ="submit" value="Modifier l'image"/>
			</p>
		</form>
		<?php
		if(isset($_GET['avatar'])) $avatar=$_GET['avatar'];
		if($avatar=='changer') {
			include("includes/contents/complement/changer_avatar.php");
		}
		?>
		<div class="clear"></div>
		<?php
	}
	?>
	
	<div class="droite_bas">
		<?php
		echo '<b> ' . $prenom .' '. $nom .'</b><br/><br/>';
		echo '<b> Date de naissance : </b>' . $dateN . '<br/>';
		echo '<b> Inscrit depuis le : </b>' . $dateI . '<br/>';
		echo '<b> Score : </b>'. $score . '<br/>';
		echo '<b> Quizz crée(s) : </b>' . $nbquizz . '<br/>';
		?>
	</div>
</div>


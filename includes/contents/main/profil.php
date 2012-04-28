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
	}
	else if(isset($_GET["login"])&& ($_GET["login"]!= $_SESSION["login"])){
		$sql= "SELECT * FROM user WHERE login = '".$_GET["login"]."' ";
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
	}
	?>

	<div class="droite_haut">

		<?php $avatar=NULL; ?> 
		<div class="rotate"> <?php echo '<img src="img/uploads/' . $_SESSION['idUser'] . '.jpg" align="right" class="avatar">'; ?> </div>
		
		<?php 
		echo '<h1>' ;
		if($_SESSION["sex"]=='f') echo '<img src="img/f.png">';
		else echo'<img src="img/h.png">'; 
		echo $_SESSION["login"] . "</h1><br/><br/><br/>";
		?>

	</div>
		
	<form method="post" action="<?php echo 'index.php?page=profil&login='.$_SESSION["login"].'&avatar=changer'; ?>" enctype="multipart/form-data">
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

	<div class="droite_bas">
	<?php
		echo $_SESSION["prenom"] ." ".$_SESSION["nom"] ."<br/>";
		echo "Date de naissance: ".$_SESSION["dateN"] ."<br/>";
		echo "Inscrit depuis le: ".$_SESSION["dateI"] ."<br/>";
		echo "Score: ".$_SESSION["score"]."<br/>";
		echo "Quizz créé(s) : ".$_SESSION["nbquizz"]."<br/>";

		?>
	</div>

</div>


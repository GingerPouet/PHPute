<form method="post" action="<?php echo 'index.php?page=profil&login=' . $_SESSION["login"] . '&avatar=changer'; ?>" enctype="multipart/form-data">
    <p>
        Choisir l'image (jpg, png, gif | max. 1Mo) :<br />
        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /> <!-- taille max : 1 Mo-->
        <input type="file" name="avatar"/><br />
        <input type="submit" name ="submit" value="Envoyer" />
    </p>
</form>

<!-- <pre><?php  print_r($_FILES); ?></pre> -->

<?php //test de validation de l'image

if(isset($_FILES['avatar'])) {
	$extensions_acceptees = array('jpg','jpeg','gif','png');
	$maxsize = $_REQUEST['MAX_FILE_SIZE']; //on récupère la taille maximum pour comparer après
	$etat = 1;

	if($_FILES['avatar']['error'] > 0){
		$erreur = "Erreur lors du transfert";
		$etat = 0;
	} else if($_FILES['avatar']['size'] > $maxsize){
		$erreur = "L'image dépasse la taille autorisée";
		$etat = 0;
	} else if( preg_match('#[\x00-\x1F\x7F-\x9F/\\\\]#', $_FILES['avatar']['name'])){
		$erreur = "Nom de fichier non valide";
		$etat=0;
	}

	$extension_upload = strtolower(substr(strrchr($_FILES['avatar']['name'],'.'),1));
	
	if(!in_array($extension_upload,$extensions_acceptees)){
		$erreur = "Le format de l'image n'est pas accepté";
		$etat = 0;
	} 
	
	if(!$etat) echo $erreur;
	else {
		$chemin = 'img/uploads/' . $_SESSION['idUser'] . '.' . $extension_upload ;
		$resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$chemin);
		if ($resultat) echo "Transfert reussi";

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
?>
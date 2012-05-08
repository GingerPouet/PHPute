<?php

		$query_mail = "SELECT mail,mdp FROM user WHERE login = '" . $_SESSION['login'] . "'";
		$result = mysql_query($query_mail);
		if($result){
			$row = mysql_fetch_row($result);
			$mail = $row[0];
			$mdp = $row[1];
		}
	
		?>
		<form id="modifier_infos" method="post" action="<?php echo 'index.php?page=modifier_infos'; ?>">
				<label>Nom </label><input type="text" value="<?php echo $_SESSION["nom"]; ?>" name="nom" /><br/>
				<label>Prénom </label><input type="text" value="<?php echo $_SESSION["prenom"]; ?>" name="prenom" /><br/> 
				<label>Email </label><input type="text" value="<?php echo $mail; ?>" name="mail" /><br/>
				<label>Mot de passe </label><input type="password" value="<?php echo $mdp; ?>" name="mdp" /><br/>
				<label>Date de naissance </label><input type="text" value="<?php echo $_SESSION["dateN"]; ?>" name="dateN"  /><br/>
				<input type="submit" name="save" value="Enregistrer les modifications" />
		</form>


<?php    if (isset($_POST['save'])){
        //on vérifie que les champs soient bien renseignés
        if(!empty($_POST['mdp'])&& !empty($_POST['mail'])&& !empty($_POST['nom'])&& !empty($_POST['prenom'])&&!empty($_POST['dateN'])){
		
            if(strlen($_POST['mdp'])>10 || strlen($_POST['mdp'])<4){
                echo '<div class="alert">Votre mot de passe doit être compris entre 4 et 10 caractères </div>';
            exit;
            }
            else if(strlen($_POST['nom'])>25 || strlen($_POST['nom'])<2){
                echo '<div class="alert">Votre nom doit être compris entre 2 et 25 caractères</div>';
            exit;
            }
            else if(strlen($_POST['prenom'])>25 || strlen($_POST['prenom'])<2){
                echo '<div class="alert">Votre prénom doit être compris entre 2 et 25 caractères</div>';
            exit;
            }
            // on vérifie également que le format de l'adresse mail est valide, /!\ on ne vérifie pas l'existance de l'adresse seulement sa composition.
            else if(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
                echo '<div class="alert">Adresse mail fausse.</div>';
            exit;
            }
			
			//si tout est bien
			
			$query_modifier="UPDATE user SET mail = '" . $_POST['mail'] ."', mdp = '" . $_POST['mdp'] ."', nom = '" . $_POST['nom'] . "', prenom = '" . $_POST['prenom'] . "', dateN = '" . $_POST['dateN'] . "' WHERE login ='" . $_SESSION['login'] . "'";
			$result= mysql_query($query_modifier);
			if($result){
				echo 'Modifications enregistrées !<br />';
				header("Refresh:1 ;url=index.php?page=profil&login=" . $_SESSION['login']);
			}   
			else{
				echo 'Une erreur s\'est produite';
			}
        }
            
    else{
        //sinon on renseigne l'utilisateur sur le champs manquant
        if(empty($_POST['mdp'])) {
            echo '<div class="alert">Vous n\'avez pas saisi de mot de passe</div>';
        }
        if(empty($_POST['nom'])){
            echo '<div class="alert">Vous n\'avez pas saisi de nom</div>';
        }
        if(empty($_POST['prenom'])) {
            echo '<div class="alert">Vous n\'avez pas saisi de prénom</div>';
        }
        if(empty($_POST['mail'])){
            echo '<div class="alert">Vous n\'avez pas saisi d\'adresse mail</div>';
        }
        if(empty($_POST['dateN'])) {
            echo '<div class="alert">Vous n\'avez pas saisi de date de naissance</div>';
        }
    }
}
	
?>

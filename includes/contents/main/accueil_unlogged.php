<div class="intro">
    <p> Bienvenue sur KQKB ! ,</p><br/>
    <p>Pour bénéficier des services de ce site, vous devez être conneté.</p><br/>
</div>
<h1>Connexion</h1>
<form id="login-form" method="post" action="index.php">
        <label>Login</label><input type="text" name="login" value="" /><br/>
        <label>Mot de passe</label><input type="password" name="mdp" value="" /><br/>
        <input type="submit" name="log" value="Se connecter" />  <!--oublie de mdp voir site du zéro-->
</form>

<?php

    // si le bouton du formulaire de log est cliqué, on vérifie que les champs soient bien renseignés
    if (isset($_POST['log'])){
        if(!empty($_POST['login'])&& ($_POST['mdp'])){
            //si c'est le cas, on vérifie que le mdp et le login soient bien dans la BDD et correspondent l'un à l'autre
            $sql = "SELECT idUser,login,mdp FROM user WHERE login = '".$_POST["login"]."' ";
            $result = mysql_query($sql);
            $nbResults = mysql_num_rows($result);
            if($nbResults>0){
                $row = mysql_fetch_assoc($result);
                if($row['mdp'] == $_POST['mdp']){
                     $_SESSION["idUser"] = $row["idUser"];
                     $_SESSION["login"] = $row["login"];
                     header("Refresh:1 ;url=index.php");
                     echo 'connexion établie';
                 }
                 else{
                     echo 'Le mot de passe est incorrect.';
                 }
            }
            else{
                echo 'Le login ou me mot de passe est incorrect';
            }
        }
        else{
            //sinon on renseigne l'utilisateur sur le champs manquant
            if(empty($_POST['login'])){
                echo '<div class="alert">Vous n\'avez pas saisi de login</div>';
            }
            if(empty($_POST['mdp'])) {
                echo '<div class="alert">Vous n\'avez pas saisi de mot de passe</div>';
            }
        }
    }
?> 

<br/>
<div class="intro">
    <p>Si vous n'êtes pas encore inscrit rejoignez-nous !</p><br/>
</div>
<h1>Inscription</h1>
<form id="inscription-form" method="post" action="index.php">
        <label>Login </label><input type="text" name="login" id="login"/><br/>
        <label>Email </label><input type="text" name="mail" id="mail" /><br/>
        <label>Nom </label><input type="text" name="nom" id="nom"/><br/>
        <label>Prénom </label><input type="text" name="prenom" id="prenom" /><br/>
        <label>Mot de passe </label><input type="password" name="mdp" id="mdp"/><br/>
        <label>Date de naissance </label><input type="text" name="dateN" value="YYYY-MM-DD" id="birthday"/><br/>
        <label>Sexe </label><input type= "radio" name="sex" value="homme" class="sex"> H
                                                <input type= "radio" name="sex" value="femme" class="sex"> F<br/>
        <input type="submit" name="sign" value="Valider l'inscription" />
</form>

<?php
// si le bouton du formulaire d'inscription est cliqué 
    if (isset($_POST['sign'])){
        //on vérifie que les champs soient bien renseignés
        if(!empty($_POST['login'])&& !empty($_POST['mdp'])&& !empty($_POST['mail'])&& !empty($_POST['nom'])&& !empty($_POST['prenom'])&&!empty($_POST['dateN'])&& !empty($_POST['sex'])&& $_POST["dateN"]!="YYY/MM/JJ"){
            // si c'est le cas on vérifie que le login ne soit pas déjà utilisé dans la BDD
            $checklog = "SELECT login FROM user WHERE login = '".$_POST["login"]."' ";
            $result3 = mysql_query($checklog);
            //si c'est le cas on affiche un message d'erreur
            $nbResults2 = mysql_num_rows($result3);
            if($nbResults2>0){
                echo '<div class="alert">Ce login est déjà utilisé. Veuillez en choisir un autre</div>';
            }
            //sinon, on poursuit l'inscription par le test de la longueur des informations saisies par l'utilisateur
            else{
                if(strlen($_POST['mdp'])>10 || strlen($_POST['mdp'])<4){
                    echo '<div class="alert">Votre mot de passe doit être compris entre 4 et 10 caractères </div>';
                exit;
                }
                else if(strlen($_POST['login'])>15 || strlen($_POST['login'])<4){
                    echo '<div class="alert">Votre login doit être compris entre 4 et 15 caractères </div>';
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
				//si tout va bien on procède àl'inscription
				$today = date('Y-m-d');
				$request="INSERT INTO user (login, mail, mdp, nom, prenom, sex, dateN, dateI, nbquizz, score) VALUES ('".$_POST['login']."','".$_POST['mail']."','".$_POST['mdp']."','".$_POST['nom']."','".$_POST['prenom']."','".$_POST['sex']."','".$_POST['dateN']."','".$today."', '0','0')";
				$inscription= mysql_query($request);
				if($inscription){
					echo 'Inscription réussie vous pouvez vous connecter dès maintenant!';
				}   
				else{
					echo 'L\'inscription à échouée.';
				}
            }
            
        }
        else{
            //sinon on renseigne l'utilisateur sur le champs manquant
            if(empty($_POST['login'])){
                echo '<div class="alert">Vous n\'avez pas saisi de login</div>';
            }
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
            if(empty($_POST['dateN'])|| $_POST["dateN"]!="YYY/MM/JJ") {
                echo '<div class="alert">Vous n\'avez pas saisi de date de naissance</div>';
            }
            if(empty($_POST['sex'])){
                echo '<div class="alert">Vous n\'avez pas renseigné votre sexe</div>';
            }
        }
    }
?> 

	
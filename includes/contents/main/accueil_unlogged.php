<div class="intro">
    <p> Bienvenue sur KQBB ! ,</p><br/>
    <p>Pour participer et bénéficier des services de ce site, vous devez être conneté.</p><br/>
</div>
<h1>Connexion</h1>
<form id="login-form" method="post" action="index.php">
        <label>Login</label><input type="text" name="login" value="" /><br/>
        <label>Mot de passe</label><input type="password" name="mdp" value="" /><br/>
        <input type="submit" name="log" value="Se connecter" />  <!--oublie de mdp voir site du z�ro-->
</form>

<?php
    if (isset($_POST['log'])){
        if(!empty($_POST['login'])&& ($_POST['mdp'])){
            //vérifier que le mdp et le login soient bien dans la BDD et charger initier la session en fonction de l'idUser correspondante.
        }
        else{
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
        <label>Login</label><input type="text" name="login" id="login"/><br/>
        <label>Email </label><input type="text" name="mail" id="mail" /><br/>			
        <label>Mot de passe </label><input type="password" name="mdp" id="mdp"/><br/>
        <label>Date de naissance </label><input type="text" name="dateN" value="YYYY-MM-DD" id="birthday"/><br/>
        <label>Sexe </label><input type= "radio" name="sex" value="homme" class="sex"> H
                                                <input type= "radio" name="sex" value="femme" class="sex"> F<br/>
        <input type="submit" name="sign" value="Valider l'inscription" />
</form>

<?php
// si le bouton du formulaire d'inscription est cliqué, on vérifie que les champs soient bien renseignés
    if (isset($_POST['sign'])){
        if(!empty($_POST['login'])&& !empty($_POST['mdp'])&& !empty($_POST['mail'])&&!empty($_POST['dateN'])&& !empty($_POST['sex'])&& $_POST["dateN"]!="YYY/MM/JJ"){
            // si c'est le cas on lance la fonction de création de compte
            //LANCER LA FONCTION DE CREATION DE COMPTE
        }
        else{
            //sinon on renseigne l'utilisateur sur le champs manquant
            if(empty($_POST['login'])){
                echo '<div class="alert">Vous n\'avez pas saisi de login</div>';
            }
            if(empty($_POST['mdp'])) {
                echo '<div class="alert">Vous n\'avez pas saisi de mot de passe</div>';
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

	
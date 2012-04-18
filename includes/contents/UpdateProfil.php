<?php
if(!empty($_POST["mail"])||!empty($_POST["nom"])||!empty($_POST["prenom"])||(!empty($_POST["ancien_mdp"])&&!empty($_POST["nouveau_mdp"])&&!empty($_POST["confirme_mdp"]))) {
echo $user->updateInfosUser($_SESSION["id"],$_POST["mail"],$_POST["ancien_mdp"],$_POST["nouveau_mdp"],$_POST["confirme_mdp"],$_POST["nom"],$_POST["prenom"]);
}

//formulaire contenant les anciennes infos de l'utilisateur
echo "<h1>Modifier mes informations personnelles</h1>";
$form= "<form method=\"post\" id=\"modifyUser\">\n";
foreach($infosUser as $key=>$val){
if(is_string($key) && $key!="sex" && $key!="idUser" && $key!="DateN") // si la clé du tableau est une chaine et qu'il ne s'agit pas des champs "sex", "idUser", "dateN" on l'affiche
    $form.= "\t<label>".$key."</label><input type=\"text\" name=\"".$key."\" value=\"".$val."\" /><br/>\n";
}
$form.= "<label name='old_password'>Ancien mot de passe :</label><input type=\"password\" name='old_password'><br/>";
$form.= "<label name='new_password'>Nouveau mot de passe :</label><input type=\"password\" name='new_password'><br/>";
$form.= "<label name='new_password'>Retapez le nouveau mot de passe :</label><input type=\"password\" name='confirm_password'><br/>";
$form.= "\t<input type=\"submit\" value=\"Envoyer\" />\n</form>\n";
echo $form;

?>
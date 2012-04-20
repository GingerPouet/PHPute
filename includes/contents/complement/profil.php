<p>page de profil</p>
<div class="info">
    
    
<?php
if(isset($_SESSION['login'])){
    $sql= "SELECT * FROM user WHERE login = '".$_SESSION["login"]."' ";
    $result = mysql_query($sql);
    if($result){
     $row = mysql_fetch_assoc($result);
     $_SESSION["idUser"] = $row["idUser"];
     $_SESSION["login"] = $row["login"];
     $_SESSION["score"] = $row["score"];
     $_SESSION["nom"] = $row["nom"];
     $_SESSION["prenom"] = $row["prenom"];
     $_SESSION["dateN"] = $row["dateN"];
     $_SESSION["dateI"] = $row["dateI"];
     $_SESSION["nbquizz"] = $row["nbquizz"];
    }
}
echo "<h1>" . $_SESSION["login"] . "</h1>";
echo $_SESSION["nom"] ." ".$_SESSION["prenom"] ."<br/>";
echo "Date de naissance: ".$_SESSION["dateN"] ."<br/>";
echo "Inscrit depuis le: ".$_SESSION["dateI"] ."<br/>";
echo "Score: ".$_SESSION["score"]."<br/>";
echo "Quizz créé(s) : ".$_SESSION["nbquizz"]."<br/>";
?> 
    
<form method="post" action="profil.php" enctype="multipart/form-data">
       <p>
               Choisir une image (JPG, PNG ou GIF | max. à fixer) :<br />
               <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /> <!---taille max : 1 Mo-->
               <input type="file" name="avatar"/><br />
               <input type="submit" name ="submit" value="Charger l'image" />
       </p>
</form>

<?php //test de validation de l'image

$idUser = 0; //j'ai mis 0 pour le test, faudra voir avec la BDD plus tard
// en fait à la place d'un idUser que tu définis il faudrat utiliser $_SESSION["idUser"] puisque tu ne peut modifier que ton avatar et donc uniquement quand tu es loggé donc sur ta session.
$extensions_acceptees = array('jpg','jpeg','gif','png');
$maxsize = $_REQUEST['MAX_FILE_SIZE']; //on récupère la taille maximum pour comparer après
$etat = 1;

if($_FILES['avatar']['error'] > 0){
       $erreur = "Erreur lors du transfert";
       $etat = 0;
} else if($_FILES['avatar']['size'] > $maxsize){
       $erreur = "L'image dépasse la taille autorisée";
       $etat = 0;
}
$extension_upload = strtolower(substr(strrchr($_FILES['avatar']['name'],'.'),1));
echo $extension_upload;
if(!in_array($extension_upload,$extensions_acceptees)){
       $erreur = "Le format de l'image n'est pas accepté";
       $etat = 0;
} ?>

<pre><?php  print_r($_FILES); ?></pre>
<!--- c'est pour tester si l'image a bien été stockée dans le tableau,
faudra l'enlever après -->

<?php

if($etat){
       $chemin = '/PHPute/includes/contents/complement/uploads/' . $idUser . '.'
. $extension_upload ;
       $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$chemin);
//la ligne du dessus ne marche pas, en fait il stocke pas l'image dans le dossier uploads, il la stocke nulle part j'ai l'impression. donc après rien ne marche, huhu.
       echo $resultat;
       if ($resultat) echo "Transfert réussi";
}
?>



<?php

if(isset($_SESSION['login'])){
    $sql= "SELECT * FROM user WHERE login = '".$_SESSION["login"]."' ";
    $result = mysql_query($sql);
    if($result){
     $row = mysql_fetch_assoc($result);
     $_SESSION["idUser"] = $row["idUser"];
     $_SESSION["login"] = $row["login"];
     $_SESSION["score"] = $row["score"];
     $_SESSION["nom"] = $row["nom"];
     $_SESSION["prenom"] = $row["prenom"];
     $_SESSION["dateN"] = $row["dateN"];
     $_SESSION["dateI"] = $row["dateI"];
     $_SESSION["nbquizz"] = $row["nbquizz"];
    }
}
echo "<h1>" . $_SESSION["login"] . "</h1>";
echo $_SESSION["nom"] ." ".$_SESSION["prenom"] ."<br/>";
echo "Date de naissance: ".$_SESSION["dateN"] ."<br/>";
echo "Inscrit depuis le: ".$_SESSION["dateI"] ."<br/>";
echo "Score: ".$_SESSION["score"];
echo "Quizz créé(s) : ".$_SESSION["nbquizz"];
?>
</div>
<div class="quizz"></div>

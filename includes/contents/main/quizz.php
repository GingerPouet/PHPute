<?php
if(isset($_GET['theme'])){
    $sql = "SELECT titre FROM quizz WHERE theme1 = '".$_GET["theme"]."'OR theme2='".$_GET["theme"]."'OR theme3='".$_GET["theme"]."' ";
    $result2 = mysql_query($sql);
    while($row= mysql_fetch_row($result2)){
        echo $row[0];
    }
}


if(isset($_SESSION['login'])){
    //afficher la page de création d'un quizz.
}
?>

<!-- penser au fieldset et aux legend pour la conception des quizz. c'est joli-->
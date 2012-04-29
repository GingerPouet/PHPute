<?php
if(isset($_GET['theme'])){
    $sql = "SELECT titre FROM quizz WHERE idQuizz= (SELECT idQuizz from quizz_theme WHERE idTheme='".$_GET["theme"]."' )";
    $result2 = mysql_query($sql);
    while($row= mysql_fetch_row($result2)){
        echo $row[0];
    }
}


if(isset($_SESSION['login'])&& !isset($_GET['theme'])){
    include ("includes/contents/complement/create_quizz.php");
}
?>


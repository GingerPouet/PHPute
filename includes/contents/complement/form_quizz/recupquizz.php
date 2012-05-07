<?php
// On récupère le titre et les thèmes séléctionés plus tôt
    $recup_titre= "SELECT titre FROM quizz WHERE idQuizz=(SELECT MAX(idQuizz) FROM quizz)";
    $result_titre = mysql_query ( $recup_titre);
    if($result_titre){
        $titre = mysql_fetch_assoc($result_titre);
        echo 'Titre: '.$titre['titre'].'<br />';
    }
    $recup_theme = "SELECT intitule FROM theme WHERE idTheme=(SELECT idTheme FROM quizz_theme WHERE idQuizz=(SELECT MAX(idQuizz)FROM quizz))";
    $result_theme = mysql_query($recup_theme);
    while($row_theme = mysql_fetch_row($result_theme)){
        echo 'Thème(s): '.$row_theme[0].'<br />';  
    }
?>

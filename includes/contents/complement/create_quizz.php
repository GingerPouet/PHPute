<?php
echo'Créez votre quizz en un clin d\'oeil.<br />';

if(isset($_POST['titre'])&& isset($_POST['theme'])){
    $sql_add_titre="INSERT INTO quizz (titre,loginUser) VALUES ('".$_POST['titre']."','".$_SESSION['login']."')";
    $result_add_titre = mysql_query($sql_add_titre);
    if($result_add_titre){
        echo 'Titre: '.$_POST['titre'].'<br />';
    }
    $sql_add_theme1 = "INSERT INTO quizz_theme (idQuizz, idTheme) VALUES ((SELECT idQuizz FROM quizz WHERE titre ='".$_POST['titre']."'AND loginUser='".$_SESSION['login']."'),'".$_POST['theme']."')";
    $result_add_theme1 = mysql_query($sql_add_theme1);
    if($result_add_theme1){
        $select_intitule = "SELECT intitule FROM theme WHERE idTheme='".$_POST['theme']."'";
        $result_intitule1 = mysql_query($select_intitule);
        $intitule1 = mysql_fetch_assoc($result_intitule1);
        echo 'Thème: '.$intitule1['intitule'].'<br />'; 
        include('includes/contents/complement/form_quizz/suite_quizz.php');
    }
}else{ 
    echo 'Veuillez indiquer un titre et choisir un thème.';
?>
    <form method="post" action="index.php?page=quizz">
                <label>Titre</label><input type="text" name="titre"/><br />
                 <select name="theme">
                    <option value="1">Musique</option>
                    <option value="2">Cinéma</option>
                    <option value="3">Littéraure</option>
                    <option value="4">Sport</option>
                    <option value="5">Histoire</option>
                    <option value="6">Loisir</option>
                    <option value="7">Animaux</option>
                    <option value="8">Humour</option>
                    <option selected value="x"></option>
                </select>
                <input type="submit"/>
    </form>
<?php
}
?>
<!-- penser au fieldset et aux legend pour la conception des quizz. c'est joli-->

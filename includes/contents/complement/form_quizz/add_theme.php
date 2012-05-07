<?php
   if (isset($_POST['theme'])){
        $sql_add_theme2 = "INSERT INTO quizz_theme (idQuizz, idTheme) VALUES ((SELECT MAX(idQuizz) FROM quizz),'".$_POST['theme']."')";
        echo $sql_add_theme2;
        $result_add_theme2 = mysql_query($sql_add_theme2);
        
     }else{
?>
    <form method="post" action="index.php?page=add_theme">
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

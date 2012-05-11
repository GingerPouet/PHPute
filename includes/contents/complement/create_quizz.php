<b>Créez votre quizz en un clin d'oeil.</b><br />
<p>La création d'un quizz est simple, il vous suffit d'entrer un titre et au moins un thème, puis de renseigner vos questions et les réponses correspondantes grâce au formulaire que l'on vous propose ci-dessous.</p>
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Titre et thèmes</a></li>
		<li><a href="#tabs-2">Questions</a></li>
		<li><a href="#tabs-3">Finalisation</a></li>
	</ul>
	<div id="tabs-1">
                        <?php
        if(isset($_POST['titre'])&& isset($_POST['theme'])){
            $sql_add_titre="INSERT INTO quizz (titre,loginUser) VALUES ('".$_POST['titre']."','".$_SESSION['login']."')";
            $sql_add_theme1 = "INSERT INTO quizz_theme (idQuizz, idTheme) VALUES ((SELECT idQuizz FROM quizz WHERE titre ='".$_POST['titre']."'AND loginUser='".$_SESSION['login']."'),'".$_POST['theme']."')";

            $result_add_titre = mysql_query($sql_add_titre);
            $result_add_theme1 = mysql_query($sql_add_theme1);
            if(isset($_POST['theme2']) && $_POST['theme2']!= "x"){
                $sql_add_theme2 = "INSERT INTO quizz_theme (idQuizz, idTheme) VALUES ((SELECT MAX(idQuizz) FROM quizz),'".$_POST['theme2']."')";
                $result_add_theme2 = mysql_query($sql_add_theme2); 
            }
            if($result_add_titre && $result_add_theme1){
                include ('includes/contents/complement/form_quizz/recupquizz.php');
            }

        }else{ 
            echo 'Veuillez indiquer un titre et choisir un ou plusieurs thèmes.';
        ?>
            <form method="post" action="index.php?page=quizz">
                        <label>Titre :</label><input type="text" name="titre"/><br />
                        <label>Thème(s):</label>
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
                        <select name="theme2">
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
	</div>
	<div id="tabs-2">
            <form method="post" action="index.php?page=quizz">
                <label>Question 1</label><input type="text" name="question1"/><br/>
                <label>Réponse 1</label><input type="text" name="reponse1_1"/><br/>
                <label>Réponse 2</label><input type="text" name="reponse1_2"/><br/>
                <label>Réponse 3</label><input type="text" name="reponse1_3"/><br/>
                <input type="submit"/>
            </form>
	</div>
	<div id="tabs-3">
		<?php
                include 'includes/contents/complement/form_quizz/recupquizz.php';
                ?>
  

        </div>
</div>

<?php 
    session_start(); 
    $conn=mysql_connect("localhost","root","");
    if (!$conn) {
        echo "Impossible de se connecter à la base de données : " . mysql_error();
   exit;
   }
    if (!mysql_select_db("projet_php")) {
        echo "Impossible de sélectionner la base projet_php : " . mysql_error();
    exit;
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
    <head>
            <meta charset="utf-8" />
                    <!--[if lt IE 9]>
                            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"> </script>
                    <! [endif]-->
            <link rel="stylesheet" href="CSS/style.css" />
            <link rel="stylesheet" href="CSS/smoothness/jquery-ui-1.8.20.custom.css"/>
            <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
            <script type="text/javascript" src="js/jquery-ui-1.8.20.custom.min.js"></script>
            <script type="text/javascript" src="js/script.js"></script>
            <title>Kitch Quizz on a Kitch Beach</title>
    </head>
    
    <body>
        <header>
            <div id="banner">

<?php
if ((isset($_SESSION['login'])) && (!empty($_SESSION['login']))){
    echo '<div class="bjr">Bonjour '. $_SESSION['login'].', bienvenu sur KQKB.</div>';
    include ("includes/contents/complement/bienvenulog.php");
}  else {
    echo 'marche pas';  
    echo $_SESSION['login'];
}
?>
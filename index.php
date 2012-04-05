<?php include("includes/headers/head.php")?>

<!-- banniere-->

    <!--if logged : 
        include: header 
        content: include: switch page (default: accueil_logged) + actu
    else : 
        include: header_unlogged
            content: include: accueil_unlogged + actu-->
    

<?php 
    include("includes/headers/header_unlogged.php");
    include("includes/footer.php");
?>
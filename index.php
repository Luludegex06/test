<?php 
    if(isset($_COOKIE['user_connected'])){
        echo('Bonjour, '.$_COOKIE['user_connected'].' !');
        
    }else{
        header('Location:cookie_form.php');
    }
?>
<br><br><a href="./first_page_garage.php">Afficher la liste des garages</a>
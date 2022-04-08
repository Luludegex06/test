<?php
    if(isset($_COOKIE['user_connected'])){
        if (isset($_GET['alert'])){
            $alert = $_GET['alert'];
            if ($alert =='added'){
                echo 'Garage ajouté !';
            }else if($alert =='error'){
                echo "Impossible d'ajouter le garage...";
            }else if($alert =='deleted')
                echo "Garage supprimé !";
        }
        require "src/tp_queries.php";
        $garageQueries = new GarageQueries();
        $garageQueries->startConnection();
        $garageQueries->showGarage();        
    }else{
        header('Location:cookie_form.php');
    }
?>
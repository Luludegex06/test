<?php
    $firstname = $_POST['firstname'];
    setcookie('user_connected', $firstname);
    if ($firstname==null){
        header('Location:cookie_form.php');
    }else{
        header('Location:first_page_garage.php');
        require "src/tp_queries.php";
        $garageQueries = new GarageQueries();
        $garageQueries->startConnection();
        $garageQueries->showGarage();
    }
?>
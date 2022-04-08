<?php
    if(isset($_COOKIE['user_connected'])){
        $id = $_GET['garage_id'];
        require "src/tp_queries.php";
        $garageQueries = new GarageQueries();
        $garageQueries->startConnection();
        $garageQueries->showCar($id);   
    }else{
        header('Location:cookie_form.php');
    }
   
?>
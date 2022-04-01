<?php
    $id = $_GET['garage_id'];
    require "src/tp_queries.php";
    $garageQueries = new GarageQueries();
    $garageQueries->startConnection();
    $garageQueries->showCar($id);
?>
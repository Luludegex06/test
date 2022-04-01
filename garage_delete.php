<?php
    $id = $_GET['garage_id'];
    require "src/tp_queries.php";
    $GarageQueries = new GarageQueries();
    $GarageQueries->startConnection();
    $GarageQueries->deleteGarage($id);
?>
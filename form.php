<?php


    $new_garage = [
        'name' => $_POST['name'],
        'city' => $_POST['city'],
        'birthdate' => $_POST['birthdate'],
        'city' => $_POST['city'],
        'annual_turnover' => $_POST['annual_turnover'],
    ];

    require "src/tp_queries.php";
    $garageQueries = new GarageQueries();
    $garageQueries->startConnection();
    $checking = $garageQueries->garageForm($new_garage);

    if ($checking = true){
        echo('Garage ajouté');

    }else{
        echo("Impossible d'ajouter le garage");
    }
?>


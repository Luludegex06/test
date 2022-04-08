<?php
    class GarageQueries{

        private $dbh;
        
        function startConnection(){
            $user = 'root';
            $pass = 'root';        
            try{
                $this->dbh = new PDO( 'mysql:host=localhost;dbname=tp_sql', $user, $pass);
                //echo("Connection OK");
            }
            catch(PDOException $ex){
                echo $ex->getMessage();
                die("Connection KO");
            }
        }

        function showGarage(){
            echo'<br><br><a href="./garage_add.php">AJOUTER UN GARAGE</a><br><br>';
            $sql = "SELECT * FROM garage";
            $query = $this->dbh->query($sql);
            $values = $query->fetchAll();
            foreach($values as $garages){
                echo '<p>';
                echo 'Name : '.' ';
                echo $garages['name'].' <br>';                    
                echo 'City : '.' ';
                echo $garages['city'].' <br>';
                $id = $garages['ID'];
                $sql_car_count = "SELECT COUNT(*)
                FROM car
                WHERE garage_id = $id";
                $query_car_count = $this->dbh->query($sql_car_count);
                $count = $query_car_count->fetch();
                $nb_car = $count[0];
                echo'<a href="garage_car.php?garage_id='.$garages['ID'].'">Afficher les voitures de ce garage </a>';
                echo'<br><a href="./garage_delete.php?garage_id='.$garages['ID'].'">Supprimer ce garage </a>';
                echo '<br>Nombre de voitures : '.$nb_car;
                echo'<br><a href="./garage_car_price.php?garage_id='.$garages['ID'].'">Prix des voitures</a>';
            }
            
        }

        function showCar($id){
            $sql = "SELECT * FROM car WHERE garage_id = $id ORDER BY price DESC;  ";
            $query = $this->dbh->query($sql);
            $values = $query->fetchAll();
            foreach($values as $car){
                echo '<p>';
                echo ' Model: '.' ';
                echo $car['model'].' ';                    
                echo 'Color : '.' ';
                echo $car['color'].' ';
                echo 'Price : '.' ';
                echo $car['price'].' ';
                echo 'Garage ID : '.' ';
                echo $car['garage_id'].' ';
                echo '</p>';
            }

        }

        function garageForm($new_garage){
            $sql = "INSERT INTO garage (name, city, birthdate, annual_turnover) VALUES (:name, :city, :birthdate, :annual_turnover)";
            $stmt = $this->dbh->prepare($sql);
            $succeed = $stmt->execute($new_garage);
            if ($succeed == true){
                header('Location:first_page_garage.php?alert=added');
            }
            return $succeed;
        }

        function deleteGarage($id){
            $sql = 'DELETE FROM garage WHERE id ='.$id;
            $stmt = $this->dbh->prepare($sql);
            $succeed = $stmt->execute();
            if ($succeed){
                header('Location:first_page_garage.php?alert=deleted');
            }
            return $succeed;   
        }

        function showPrice($id){

            $sql = "SELECT * FROM car WHERE garage_id = $id ORDER BY price DESC;  ";
            $query = $this->dbh->query($sql);
            $car = $query->execute();
            foreach($car as $price){
                echo '<p>';
                echo ' Model: '.' ';
                echo $car['model'].' ';                    
                echo 'Color : '.' ';
                echo $car['color'].' ';
                echo 'Price : '.' ';
                echo $car['price'].' ';
                echo 'Garage ID : '.' ';
                echo $car['garage_id'].' ';
                echo '</p>';
            }
        }
    }
?>
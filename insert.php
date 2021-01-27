<?php
include 'includes/autoload.php';
include 'includes/connect.php';


$sql = "INSERT INTO `component`(`name`, `brand`) VALUES (:name, :brand)";

for ($i = 0; $i < 20; $i++) {
    $name = 'Pièce de la mort '.$i;
    $brand = 'ASTUS '.$i;
    $statement = $connection->prepare($sql);
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':brand', $brand, PDO::PARAM_STR);

    $statement->execute();
}


<?php 
require_once 'includes/autoload.php';
require_once 'includes/connect.php';

// $sql = "INSERT INTO `computer`(`name`)
//         VALUES ('ASTUS Rogue One'), ('Sansong Galaxy Truc')";
//         $count = $connection->exec($sql);

// $sql = "INSERT INTO `component`(`name`, `brand`)
//         VALUES ('Piece de la mort', 'ASTUS')";
//         $count = $connection->exec($sql);

$sql = "INSERT INTO `component`(`name`, `brand`, `type`) VALUES (:name, :brand, :type)";
for ($i = 0; $i < 20; $i++) {
        $name = 'DBGT2077'.$i;
        $brand = 'ASTUS'.$i;
        $type = 'graphicCard'.$i;
        $statement = $connection->prepare($sql);
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':brand', $brand, PDO::PARAM_STR);
        $statement->bindParam(':type', $type, PDO::PARAM_STR);
        $statement->execute();
}

$sql = "INSERT INTO `computer`(`name`, `type`) VALUES (:name, :type)";
for ($i = 0; $i < 20; $i++) {
        $name = 'Aliengear'.$i;
        $type = 'Laptop'.$i;
        $statement = $connection->prepare($sql);
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':type', $type, PDO::PARAM_STR);
        $statement->execute();
}
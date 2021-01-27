<?php 
require_once 'includes/autoload.php';
require_once 'includes/connect.php';

$sql = "INSERT INTO `computer`(`name`)
        VALUES ('ASTUS Rogue One'), ('Sansong Galaxy Truc')";
        $count = $connection->exec($sql);

$sql = "INSERT INTO `component`(`name`, `brand`)
        VALUES ('Piece de la mort', 'ASTUS')";
        $count = $connection->exec($sql);
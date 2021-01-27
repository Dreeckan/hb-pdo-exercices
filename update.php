<?php 
require_once 'includes/autoload.php';
require_once 'includes/connect.php';


// $sql = "ALTER TABLE computer
// ADD type VARCHAR(32) DEFAULT NULL";
// $count = $connection->exec($sql);

// $sql = "ALTER TABLE component
// ADD type VARCHAR(32) DEFAULT NULL";
// $count = $connection->exec($sql);

// $sql = "ALTER TABLE device
// ADD type VARCHAR(32) DEFAULT NULL";
// $count = $connection->exec($sql);

$sql = "UPDATE `computer`
        SET type = 'desktop'
        WHERE id = 13";
        $count = $connection->exec($sql);

$sql = "UPDATE `computer`
        SET type = 'laptop'
        WHERE id = 14";
        $count = $connection->exec($sql);

$sql = "UPDATE `component`
        SET type = 'ram'
        WHERE id = 2";
        $count = $connection->exec($sql);
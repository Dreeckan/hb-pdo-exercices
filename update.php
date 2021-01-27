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

// $sql = "UPDATE `computer`
//         SET type = 'desktop'
//         WHERE id = 13";
//         $count = $connection->exec($sql);

// $sql = "UPDATE `computer`
//         SET type = 'laptop'
//         WHERE id = 14";
//         $count = $connection->exec($sql);

// $sql = "UPDATE `component`
//         SET type = 'ram'
//         WHERE id = 2";
//         $count = $connection->exec($sql);

$sth = $connection->prepare("SELECT * FROM computer");
$sth->execute();
$result = $sth->fetchAll(PDO::FETCH_ASSOC);

foreach($result as $results) {
    echo $results['id']; echo '<br />';
    echo $results['name']; echo '<br />';
    echo $results['type']; echo '<br />';
    echo '<br />';
}

$sth = $connection->prepare("SELECT * FROM component");
$sth->execute();
$result = $sth->fetchAll(PDO::FETCH_ASSOC);

foreach($result as $results) {
    echo $results['id']; echo '<br />';
    echo $results['brand']; echo '<br />';
    echo $results['name']; echo '<br />';
    echo $results['type']; echo '<br />';
    echo '<br />';
}
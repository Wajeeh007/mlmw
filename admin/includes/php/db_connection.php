<?php
$connection = mysqli_connect('localhost', 'root', '', 'MLMW');
//           hostname   username  password  database_name

if (!$connection) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>

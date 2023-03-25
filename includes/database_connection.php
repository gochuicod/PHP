<?php
    $servername = "localhost";
    $username = "gochuicod";
    $password = "20259388";
    $dbname = "php_training";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) die("Connection failed: ".$conn->connect_error);
?>
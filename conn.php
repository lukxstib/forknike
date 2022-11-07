<?php
    $servername = "127.0.0.1";
    $username = "stibolu20";
    $password = "";
    $dbname = "stibolu20";

    // $servername = "127.0.0.1";
    // $username = "root";
    // $password = "";
    // $dbname = "brousek";
    global $conn;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,
        [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
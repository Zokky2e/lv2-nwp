<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "radovi";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $secret_key = "aaa176392554797c653c752e3a26656a";
    $iv = "d704e0b2d3ce2308";

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
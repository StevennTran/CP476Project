<?php

    header("Content-Type: text/plain");
    
    //database information
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "book";

    $conn = new mysqli($servername, $username, $password);
    $sql = "CREATE DATABASE $dbname";
    $conn->query($sql);
    $conn->close();

    // create a table
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username CHAR(32) NOT NULL UNIQUE,
        password CHAR(32) NOT NULL,
        role TINYINT NOT NULL)";
    $conn->query($sql);
    $conn->close();

    //user ID
    $sUsername = $_GET["username"];
    $sPassword = $_GET["password"];

    //create the SQL query string
    $sql = "Select * from users where username='".$sUsername."' AND password='".$sPassword."'";
              
    $info = "";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user = $row['username'];
        $role = $row['role'];
        $info = "$user,$role";
    } else {
        $info = "FALSE";
    }
    $conn->close();
    echo $info;
?>
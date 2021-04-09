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
    $sql = "CREATE TABLE recommend (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username CHAR(64) NOT NULL,
        bookID CHAR(64) NOT NULL,
        who CHAR(64) NOT NULL)";
    $conn->query($sql);
    $conn->close();

    $sql = "Select DISTINCT username FROM users";
              
    $info = "";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    $result = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);

    foreach ($result as $row){
        $nUsername = $row['username'];
        $info = $info."|"."$nUsername";
    }
    if(strlen($info) == 0){
        $info = "NO USERS";
    }
    $conn->close();
    echo $info;
?>
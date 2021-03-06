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
    $sql = "CREATE TABLE forum (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username CHAR(32) NOT NULL,
        bookID CHAR(32) NOT NULL,
        booktitle CHAR(32) NOT NULL,
        comment CHAR(128) NOT NULL,
        who CHAR(32) NOT NULL,
        timestamp CHAR(64) NOT NULL)";
    $conn->query($sql);
    $conn->close();

    //user ID
    // $suserName = $_GET["username"];
    $bookID = $_GET["bookID"];
    // $title = $_GET["title"];
    //create the SQL query string
    $sql = "Select * from forum where bookID ='".$bookID."'";
              
    $info = "";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    $result = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);

    foreach ($result as $row){
        $nUsername = $row['username'];
        $nComment = $row['comment'];
        $ntimestamp = $row['timestamp'];
        $info = $info."|"."$nUsername,$nComment,$ntimestamp";
    }
    if(strlen($info) == 0){
        $info = "NO COMMENTS";
    }
    $conn->close();
    echo $info;
?>
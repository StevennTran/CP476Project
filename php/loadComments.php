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
        who CHAR(32) NOT NULL)";
    $conn->query($sql);
    $conn->close();

    //user ID
    $suserName = $_GET["username"];
    $bookID = $_GET["bookID"];
    $title = $_GET["title"];

    //create the SQL query string
    $sql = "Select * from forum where bookID ='".$bookID."'";
              
    $info = "";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nUserName = $row['username'];
        $nComment = $row['comment'];
        $info = "$nUserName,$nComment";
    } else {
        $info = "NO COMMENTS";
    }
    $conn->close();
    echo $info;
?>
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

    //user ID
    $suserName = $_GET["username"];
    $suserName = "'".$suserName."'";
    $nbookID = $_GET['bookID'];
    $nbookID = "'".$nbookID."'";
    $sWho = $_GET["who"];
    $sWho = "'".$sWho."'";
    $sql = "INSERT INTO recommend (username,bookID,who) VALUES ("$suserName.",".$nbookID.",".$sWho.")";   
    $info = "";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    if ($conn->query($sql) === TRUE) {
        echo "\nInsert successfully";
        #echo $conn -> error;
      } else {
        #echo "FALSE";
        echo $conn -> error;
      }
    $conn->close();
    echo $info;
?>
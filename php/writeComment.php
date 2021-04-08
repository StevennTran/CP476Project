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
    $suserName = str_replace("+?+?", " ", $suserName);
    $suserName = "'".$suserName."'";
    $bookID = $_GET["bookID"];
    $bookID = "'".$bookID."'";
    $title = $_GET["title"];
    $title = str_replace("+?+?", " ", $title);
    $title = "'".$title."'";
    $comment = $_GET["comment"];
    $comment = str_replace("+?+?", " ", $comment);
    $comment = "'".$comment."'";
    //create the SQL query string
    // echo $suserName;
    // echo $bookID;
    // echo $title;
    // echo $comment;
    $sql = "INSERT INTO forum (username,bookID,booktitle,comment,who) VALUES (".$suserName.",".$bookID.",".$title.",".$comment."'null')";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    if ($conn->query($sql) === TRUE) {
        echo "\nInsert successfully";
      } else {
        echo "FALSE";
      }
    $conn->close();
?>
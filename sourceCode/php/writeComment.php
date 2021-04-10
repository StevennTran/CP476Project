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
    $est = 'EST';
    $timestamp = time();
    $dt = new DateTime("now", new DateTimeZone($est)); //first argument "must" be a string
    $dt->setTimestamp($timestamp); //adjust the object to correct timestamp
    //echo 
    $timestap = $dt->format('d.m.Y, H:i:s');
    $timestap = "'".$timestap."'";
    //create the SQL query string
    // echo $suserName;
    // echo $bookID;
    // echo $title;
    // echo $comment;
    $sql = "INSERT INTO forum (username,bookID,booktitle,comment,who,timestamp) VALUES (".$suserName.",".$bookID.",".$title.",".$comment.",'null',".$timestap.")";
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
?>
<?php
 
 function getConnection(){
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mvc";

    $conn = new mysqli($host, $username, $password, $dbname);
    if($conn->connect_error){
        return null;
    }
    return $conn;
}

?>
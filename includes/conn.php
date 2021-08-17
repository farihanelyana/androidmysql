<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');


$server = 'localhost';
$usrnm = 'root';
$password = '';
$dbname = 'android';
$conn = new mysqli($server, $usrnm, $password, $dbname);

function x($string)
{
    global $conn;
    
    if(mysqli_connect_errno()){
        echo "Failed to connect with database".mysqli_connect_err();
    }

    return mysqli_real_escape_string($conn, $string);
}
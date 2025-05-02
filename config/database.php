<?php

// Create connection to database
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'testdb';

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
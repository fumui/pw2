<?php

// Database Configuration
$dbHost = 'localhost';
$dbName = 'epublib';
$dbUser = 'root';
$dbPass = '';

// Create a database connection
$db = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check connection status
if ($db->connect_error) {
    die("Database connection failed: " . $db->connect_error);
}

return $db;

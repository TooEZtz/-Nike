<?php
function pdo_connect_mysql()
{
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'nike';
    $DATABASE_PORT = '3306'; 

    try {
        $connString = "mysql:host=$DATABASE_HOST;port=$DATABASE_PORT;dbname=$DATABASE_NAME;";
        $pdo = new PDO($connString, $DATABASE_USER, $DATABASE_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $exception) {
        error_log("Database connection error: " . $exception->getMessage()); 
        exit('Failed to connect to database!');
    }
}

function sanitize($input){
    
}



?>


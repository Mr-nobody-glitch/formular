<!-- 

// $host='localhost';
// $db='formular_db';
// $user='root';
// $pass='';
// $charset='utf8mb4';
$db= new
PDO('mysql:host=localhost;dbname=formular_db;charset=utf8','root','');
try
{
// On se connecte à MySQL
$dbc= new PDO('mysql:host=localhost;dbname=formular_db;charset=utf8','root','');
echo "hello data base";
}
catch(Exception $e)
{ // En cas d'erreur, on affiche un message et on arrête tout 
    die('Erreur : '.$e->getMessage()); } -->


<?php
// Development Connection
$host = '127.0.0.1';
$db = 'formular_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

//Remote Database Connection2
// $host = 'remotemysql.com';
// $db = 'ZMy3vpAwsp';
// $user = 'ZMy3vpAwsp';
// $pass = 'In38ZpZRb3';
// $charset = 'utf8mb4';

//Remote Database Connection
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
   // echo "hello data base";
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage());
}

require_once 'crud.php';
require_once 'user.php';

$crud = new crud($pdo);
$user = new user($pdo);

$user->insertuser("admin","password");


?>
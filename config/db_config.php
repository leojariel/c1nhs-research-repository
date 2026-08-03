<?php

$host = 'localhost';
$dbname = 'c1nhs_research_db';
$dbusername = 'root';
$dbpassword = 'JoHnLeopoldoleiraj5u5i';

try {
 $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);

 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
 echo 'connection failed:' . $e->getMessage();
}

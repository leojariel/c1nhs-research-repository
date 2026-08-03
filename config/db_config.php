<?php

$host = 'localhost';
$dbname = 'c1nhs_research_db';
$dbusername = 'root';
$dbpassword = 'JoHnLeopoldoleiraj5u5i';

try {
 $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);

 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
 echo 'connection failed:' . $e->getMessage();
}

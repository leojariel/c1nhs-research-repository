<?php

$servername = 'localhost';
$username = 'host';
$password = 'JoHnleopoldoleiraj5u5i';
$dbname = 'c1nhs_research_db';

try {
 $conn = new PDO('mysql:host=$servername;dbname=$dbname', $username, $password);

 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 echo 'connection success';
} catch (PDOException $e) {
 echo 'connection failed:' . $e->getMessage();
}

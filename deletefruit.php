<?php
//Corey Gumbs
//SSL-1115
//Week 3 Homework - PT2
//JSON FruitADS API
//Fia O'Loughlin


$user = "root";
$pass = "root";
$dbh = new PDO('mysql:host=localhost;dbname=SSL;port=8889;', $user, $pass);

$fruitid = $_GET['id'];

$stmt = $dbh->prepare("DELETE FROM fruits WHERE id IN (:fruitid);");
$stmt->bindParam(':fruitid',$fruitid);
$stmt->execute();

header('Location: fruits.php');
die();
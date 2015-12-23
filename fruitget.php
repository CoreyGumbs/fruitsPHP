<?php

//Corey Gumbs
//SSL-1115
//Week 3 Homework - PT2
//JSON FruitADS API
//Fia O'Loughlin



//connect to database
$dbh = new PDO("mysql:host=localhost;port=8889;dbname=SSL", "root", "root");
//query database to select random() query from database
$stmt = $dbh->prepare('SELECT fruitname, fruitcolor, fruitimage FROM fruits WHERE fruitimage is not null ORDER BY RAND() LIMIT 1');
$stmt->execute();

//variable to store database query
$result = $stmt->fetchAll();

//prepare document for JSON data
header("Content-type:application/json");

//encode $result variable to JSON data
echo json_encode($result);
?>
<?php

//Corey Gumbs
//SSL-1115
//Week 3 Homework - PT2
//JSON FruitADS API
//Fia O'Loughlin




//Connect to the Database
$user = "root";
$pass = "root";
$dbh = new PDO('mysql:host=localhost;dbname=SSL;port=8889;', $user, $pass);

//Conditional that checks for server request from the form submit
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //variables that take form input from the $_Post
    $fruitname = ucfirst($_POST['fruit_name']);
    $fruitcolor = ucfirst($_POST['fruit_color']);
    $fruitimage = ucfirst($_POST['fruit_image']);

    //inserts the form data into the database
    $stmt = $dbh->prepare("INSERT INTO fruits(fruitname, fruitcolor,fruitimage) VALUES (:fruitname, :fruitcolor, :fruitimage);");
    $stmt->bindParam(':fruitname', $fruitname);
    $stmt->bindParam(':fruitcolor', $fruitcolor);
    $stmt->bindParam(':fruitimage', $fruitimage);
    $stmt->execute();

};
//INCLUDE FRUITADS.PHP PAGE
include 'fruitads.php';

//foreach loop/display values
    //reads/parses the database and returns the data for output to web page
    $stmt = $dbh->prepare('SELECT id, fruitname, fruitcolor, fruitimage from fruits order by id ASC ;');
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //foreach loop that cycles through array and out puts the values
    foreach ($results as $row) {
        echo "
             <tr>
                <td>{$row['id']}</td>
                <td>{$row['fruitname']}</td>
                <td>{$row['fruitcolor']}</td>
                <td class='imgLink'><a href='{$row['fruitimage']}'>{$row['fruitimage']}</a></td>
                <td><a href='deletefruit.php?id={$row['id']}'><button class='deleteBtn'>delete</button></a></td>
             </tr>
                ";
    }
//INCLUDE HTML FOOTER/CLOSING TAGS
include 'footer.php';

?>
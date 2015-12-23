<!--
//Corey Gumbs
//SSL-1115
//Week 3 Homework - PT2
//JSON FruitADS API
//Fia O'Loughlin
-->

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fruits</title>
    <link rel='stylesheet' href='css/normalize.css'>
    <link rel='stylesheet' href='css/styles.css'>
</head>
<body>
<article>
    <section id='jumbotron'>
        <h1>Save Your Favorite Fruit</h1>
        <h2>The Database For Produce</h2>
    </section>
    <nav>
        <!-- Design Purposes but available to build on-->
    </nav>
    <aside id='formWrapper'>
        <h3>Enter Your Fruit</h3>
        <form action='fruits.php' method='post'>
            Fruit Name:
            <input type='text' name="fruit_name" value="" required><br/>
            Fruit Color:
            <input type='text' name="fruit_color" value=""><br/>
            Fruit Image URL/Link:
            <input type='text' name="fruit_image" value=""><br/>
            <input type='reset' name="reset" value="reset">
            <input type='submit' name="submit" value="submit">
        </form>
    </aside>
    <!-- Start Fruit of the Day Section Here -->
    <aside id="dayWrapper">

            <?php
                //get or call JSON data from Fruitsget.php
                $contents = file_get_contents("http://localhost:8888/Week3/Homework/Week3_HW_Part2_Gumbs_Corey_SSL-1115/fruitget.php");

                //decode JSON data into associative array
                $decode = json_decode($contents, true);

                //iterate through JSON data/associative array for output
                foreach($decode as $fruit){
                    echo "<h2>Fruit of the Day: <span>{$fruit["fruitcolor"]} {$fruit["fruitname"]}</span></h2>";
                    echo "<img src='{$fruit["fruitimage"]}' alt='{$fruit["fruitcolor"]} {$fruit["fruitname"]}'/>";
                }
            ?>
    </aside>
    <!-- End Fruit of the day -->
    <section  id='tableWrapper'>
        <div>
            <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Fruit Name</th>
                    <th>Fruit Color</th>
                    <th>Fruit Image</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
<!DOCTYPE HTML>
<?php //phpinfo(); 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();


?>
<html lang="en">
    <head>

        <link rel='stylesheet' href='normalize.css'>
        <link rel='stylesheet' href='beer.css'>
        <title>Kelowna Beer Club</title>
    </head>

    <body>
        <header>
            <?php 
            include 'headerFiller.php';
            fillheader();
            ?>
        </header>

        <Main class="tblock">
            <h2>Beer Reviews</h2>

            <div style="max-width:40%; margin:0 auto;">
            <form method="POST" action="reviews.php">
                <select name='beer'>
                    <option value='placeholder' disabled selected>Select Beer</option> 
                    <?php
                    include 'beerOptionPrint.php';
                    echo beersPrint();
                    ?>
                </select>
                <input type="submit" id="submit" name="submit" value="Filter Beers">
            </form>
            </div>

            <?php
            include 'reviewprint.php';
            if (isset($_POST["beer"])) {
                printspecificreviews($_POST["beer"]);
            } else {
                printallreviews();
            }
            ?>
        </Main>

        <footer><p>Copyright &copy; CK technologies</p>
        </footer>
    </body>
</html>

<!DOCTYPE HTML>
<?php //phpinfo(); 
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
            <h3>About</h3>
            <p>This page was created for the 213 Course Project in the 2017 fall semester at Okanagan College</p>
            <h3>Created by Clay Gale and Kaylan Horne</h3>
        </Main>

        <footer><p>Copyright &copy; CK technologies</p>
        </footer>
    </body>
</html>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
SESSION_START();

?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
        </script>
        <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.bxslider').bxSlider({
                    captions: true,
                    adaptiveHeight: true});
            });
        </script>
 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
 
        <link rel="stylesheet" href="normalize.css">
        <link rel="stylesheet" href="beer.css">
        <title>Kelowna Beer Club</title>
    </head>
 
    <body>
        <header>
            <?php
            include 'headerFiller.php';
            fillheader();
            ?>
        </header>
        <main>
 
            <div class="bxslider">
                <?php
                include 'BXPrint.php';
                bxPrint();
                ?>
               
            </div>
        </main>
 
        <footer>Copyright &copy; CK technologies</footer>
 
    </div>
</body>
</html> 
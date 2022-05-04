<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

SESSION_START();
if ((!filter_input(INPUT_POST, 'email')) || (!filter_input(INPUT_POST, 'password'))) {
    header("Location: login.php");
    exit;
}
$mysqli = mysqli_connect("localhost", "cs213user", "letmein", "presentation");
$targetemail = filter_input(INPUT_POST, 'email'); //email entered on previous page
$targetpasswd = filter_input(INPUT_POST, 'password'); // password on previous page
$sql = "SELECT firstname FROM users WHERE email = '" . $targetemail .
        "' AND password = PASSWORD('" . $targetpasswd . "')";

$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli)); // if query is successful you get result
// if not then die(get out from script
//get the number of rows in the result set; should be 1 if a match
if (mysqli_num_rows($result) == 1) { //
    //if authorized, get the values of f_name l_name
    while ($info = mysqli_fetch_array($result)) { // info is array. fetch array grabs one record at a time and
        //store it into an associate array.
        $f_name = stripslashes($info['firstname']); //strips slashes will get rid of slashes - \n
        // if more than one record we need to do more work in the while loop
    }
    //set authorization cookie
    setcookie("auth", "1", time() + 60 * 30, "/", "", 0); // sets cookie for the visit
    $_SESSION["email"] = $targetemail;
    $_SESSION["fname"] = $f_name;
} else {
    header("Location: firstpage.php");
    exit;
}

mysqli_free_result($result);
mysqli_close($mysqli);
?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
        </script>
        <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.bxslider').bxSlider({captions: true});
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

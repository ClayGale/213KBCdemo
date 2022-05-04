<?php

session_start();

//Connect to Database
$mysqli = mysqli_connect("localhost", "cs213user", "letmein", "presentation");

//If connection fails
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
} else {

    $targetBeer = $_POST["beer"];

    $beersql = "SELECT * FROM beer WHERE beer = '$targetBeer'";

    $beerresult = mysqli_query($mysqli, $beersql) or die(mysqli_error($mysqli));

    if (mysqli_num_rows($beerresult) > 0) {
        while ($row = mysqli_fetch_assoc($beerresult)) {
            echo $row["beer"];
            echo "<br/>";
            echo $row["description"];
            echo "<br>";
        }

        $res = mysqli_query($mysqli, $beersql);

        if ($res === TRUE) {
            mysqli_close($mysqli);
            header('Location: ' . $_SERVER['HTTP_REFERER']); //Goes to previous page
        } else {
            mysqli_close($mysqli);
            echo "MOO!";
        }
    }
}
?>
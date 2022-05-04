<?php

function beersPrint() {
    $mysqli = mysqli_connect("localhost", "cs213user", "letmein", "presentation");

    //If connection fails
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    } else {

        $beersql = "SELECT beer FROM beer";

        $beerresult = mysqli_query($mysqli, $beersql) or die(mysqli_error($mysqli));

        $beerarray = mysqli_fetch_all($beerresult, MYSQLI_ASSOC); //gets all beer in a big array
        if (mysqli_num_rows($beerresult) > 0) {
            foreach ($beerarray as $row) {
                $display_block = $display_block . "<option value='" . $row["beer"] . "'>" . $row["beer"] . "</option>";
            }
        } else {
            $display_block = "<option value='heiniken'>Error. No Beer</option>";
        }
        mysqli_free_result($beerresult);
        mysqli_close($mysqli);
        return $display_block;
    }
}

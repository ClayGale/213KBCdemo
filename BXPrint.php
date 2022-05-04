<?php

function bxPrint() {
    $mysqli = mysqli_connect("localhost", "cs213user", "letmein", "presentation");

    //If connection fails
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    } else {

        $beersql = "SELECT * FROM beer";

        $beerresult = mysqli_query($mysqli, $beersql) or die(mysqli_error($mysqli));

        $beerarray = mysqli_fetch_all($beerresult,MYSQLI_ASSOC); //gets all beer in a big array
        if (mysqli_num_rows($beerresult) > 0) {
            foreach ($beerarray as $row) {
                
                $path1 = "images/" . $row["beer"] . ".jpg";
                $path2 = "images/" . $row["beer"] . ".jpeg";

                if(file_exists($path1)){
                    $path = $path1; 
                }
                else if(file_exists($path1)){
                    $path = $path2;
                }
                else{
                    $path = "images/beer.jpg"; //image missing, using generic image
                }

                $display_block = "<div class='row collapse slide-pane'>
                <div class='small-6 medium-6 large-6 columns'>
                    <img src='" . $path . "'/>
                </div>
                <div class='small-6 medium-6  columns text-pane'>
                    <h1>" . $row["beer"] . "</h1>
                    <p>" . $row["description"] . "</p>
                </div>
            </div>";
                echo $display_block;
                unset($display_block);
            }
        }
        mysqli_free_result($beerresult);
        mysqli_close($mysqli);
    }
}

?>


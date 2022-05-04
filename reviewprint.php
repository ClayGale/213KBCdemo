<?php

function printallreviews() {
    $mysqli = mysqli_connect("localhost", "cs213user", "letmein", "presentation");

    //If connection fails
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    } else {
        //Outer Join!
        $reviewsql = "SELECT u.firstname, r.beer, r.review, r.rating FROM users u, breviews r WHERE u.email = r.email ";

        $reviewresult = mysqli_query($mysqli, $reviewsql) or die(mysqli_error($mysqli));

        $reviewarray = mysqli_fetch_all($reviewresult,MYSQLI_ASSOC); //gets all beer in a big array
        if (mysqli_num_rows($reviewresult) > 0) {
            foreach ($reviewarray as $row) {
                
                if(is_null($row["review"])){
                    continue; //skips the review if there is no review
                }
                
                if($row["rating"] == "l"){
                    $pref = "liked";
                }
                else if($row["rating"] == "n"){
                    $pref = "didn't care for";
                }
                else if($row["rating"] == "d"){
                    $pref = "disliked";
                }
            
                $display_block = "<strong>" . $row["firstname"] . " " . $pref . " " . $row["beer"] . " and had this to say about it:</strong> <br>"
                        . $row["review"];
                echo $display_block;
                echo "<br><br>";
                unset($display_block);
            }
        }
        
        mysqli_free_result($reviewresult);
        mysqli_close($mysqli);
    }
}

function printspecificreviews($targetbeer) {
    $mysqli = mysqli_connect("localhost", "cs213user", "letmein", "presentation");

    //If connection fails
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    } else {
        //Outer Join!
        $reviewsql = "SELECT u.firstname, r.beer, r.review, r.rating FROM users u, breviews r WHERE u.email = r.email ";

        $reviewresult = mysqli_query($mysqli, $reviewsql) or die(mysqli_error($mysqli));

        $reviewarray = mysqli_fetch_all($reviewresult,MYSQLI_ASSOC); //gets all beer in a big array
        if (mysqli_num_rows($reviewresult) > 0) {
            foreach ($reviewarray as $row) {
                
                if(is_null($row["review"])){
                    continue; //skips the review if there is no review
                }
                
                if($targetbeer != $row["beer"]){ //skips this review if it is not for the desired beer
                    continue;
                }
                
                if($row["rating"] == "l"){
                    $pref = "liked";
                }
                else if($row["rating"] == "n"){
                    $pref = "didn't care for";
                }
                else if($row["rating"] == "d"){
                    $pref = "disliked";
                }
            
                $display_block = "<strong>" . $row["firstname"] . " " . $pref . " " . $row["beer"] . " and had this to say about it:</strong> <br>"
                        . $row["review"];
                echo $display_block;
                echo "<br><br>";
                unset($display_block);
            }
        }
        
        mysqli_free_result($reviewresult);
        mysqli_close($mysqli);
    }
}
?>


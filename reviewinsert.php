<?php
SESSION_START();
if(!isset($_SESSION["email"])){
    header("Location: login.php"); //sends user back to log in page if no email is set. This will probably never happen
}
include 'beerOptionPrint.php';
$display_block = "<h2>Select What Beer to Review</h2>
            <select name='beer'>
                 <option value='placeholder' disabled selected>Select Beer</option> 
                  ". beersPrint() ."
            </select>

                <label><strong>Review: </strong>
                    <textarea rows='4' cols='30' name='review' placeholder='Enter text here'>
                    </textarea></label>
                <div class='handfield' style='min-width:60%; float:right;'>

                    <input id='like' type='radio' name='rating' value='l' required>
                    <label class='hand like' for='like'></label>
                    <input id='neutral' type='radio' name='rating' value='n' required>
                    <label class='hand neutral' for='neutral'></label>
                    <input id='dislike' type='radio' name='rating' value='d' required>
                    <label class='hand dislike' for='dislike'></label>

                </div> <br>
                <input type='submit' name='submit' value='Submit Review'>
            </form>";
if (($_POST) && ($_POST["action"] == "")) {

    $mysqli = mysqli_connect("localhost", "cs213user", "letmein", "presentation"); //connect to database
    $check_sql = "SELECT firstname FROM users WHERE email = '" . $_SESSION["email"] . "'"; // grab users name from user table
    $check_res = mysqli_query($mysqli, $check_sql) or die(mysqli_error($mysqli));
    //get number of results and do action
    if (mysqli_num_rows($check_res) < 1) { // if there is no user name that matches result will be 0
        $display_block = "Sorry, only members can leave a review. Please create an account."
                . "<form method='POST' action='create.php'>
                <input type='submit' value='Sign Up'><br><br>  
                </form>";
        exit; //inform user they cant leave review and link to sign up
    } else {
        $add_sql = "INSERT INTO breviews (email, beer, rating, review) "
                . " VALUES('" . $_SESSION["email"] . "','" . $_POST["beer"] . "', '" . $_POST["rating"] . "','" . $_POST["review"] . "')";
        $add_res = mysqli_query($mysqli, $add_sql) or die(mysqli_error($mysqli));
        $display_block = "<p>You're review has been logged. Thank you for your input!</p><br>"
                . "<a href='reviewinsert.php'>Go Back to review form</a>"; // inform user review is logged
        //close connection to MySQL                 
        mysqli_close($mysqli);
    }
}
?>
<html>
    <head>
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
        <main class="smallform">
            <form class='tblock' method='POST' action='' id='reviewform'>
                <?php
                if(isset($_SESSION["error"])){
                    echo $_SESSION["error"];
                }
                unset($_SESSION["error"]);
                echo "$display_block";
                ?>
        </main>

        <div class="tblock smallform"> 
            <h2>Can't find the beer you want to review? Add it!</h2>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <label for="fileToUpload">Select a .jpg file to upload:
                    <input type="file" name="fileToUpload" id="fileToUpload" required></label> 
                <label for="beername"><strong>Beer Name:</strong>
                    <input id="beername" type='text' name='beer'required></label>
                <label for="beerdesc"><strong>Description:</strong>
                    <textarea rows='4' cols='30' name='desc' placeholder='Enter description here' id="beerdesc"required></textarea></label>
                <input type="submit" value="Add Beer" name="submit">
            </form>
        </div>
        <footer><p>Copyright &copy; CK technologies</p>
        </footer>
    </body>
</html>
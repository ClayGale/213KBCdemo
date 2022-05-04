<?php
SESSION_START();

$display_block = "<html>
    <head>
        <link rel='stylesheet' href='normalize.css'>
        <link rel='stylesheet' href='beer.css'>

        <title>Create an account</title>
    </head>

    <body>

        <header>
            <nav class='signin'>
                <a href='login.php'><input type ='button' name='submit' value='Log In' class='smallbutton'></a>
            </nav>

            <h1>Welcome to the Okanagan Beer Club</h1>
            
            <nav>
        </header>
        <div class='container tblock'>";
if (($_POST) && ($_POST[""] == "")) {
    //trying to subscribe; validate email address
    if ($_POST["email"] == "") {        //IF EMAIL IS EMPTY RELOAD PAGE
        header("Location: create.php");
        exit;
    } else {        // IF FORM IS FILLED OUT
        strtolower($_POST["email"]); //changes email to lower case
//connect to database
        global $mysqli;
//connect to server and select database; you may need it
        $mysqli = mysqli_connect("localhost", "cs213user", "letmein", "presentation");
//if connection fails, stop script execution
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        global $mysqli, $check_res;
        //check that email is not already in list
        $check_sql = "SELECT firstname FROM users WHERE email = '" . $_POST["email"] . "'";
        $check_res = mysqli_query($mysqli, $check_sql) or die(mysqli_error($mysqli));
        //get number of results and do action
        if (mysqli_num_rows($check_res) < 1) {
            //free result
            mysqli_free_result($check_res);
            //add user to database
            $add_sql = "INSERT INTO users (firstname, lastname, email, password, age, gender, startdate) "
                    . " VALUES('" . $_POST["f_name"] . "','" . $_POST["l_name"] . "', '" . $_POST["email"] . "',"
                    . "PASSWORD('" . $_POST["password"] . "'),'" . $_POST["age"] . "', '" . $_POST["gender"] . "', curdate())";
            $add_res = mysqli_query($mysqli, $add_sql) or die(mysqli_error($mysqli));
            $success = TRUE;
            //close connection to MySQL                 
            mysqli_close($mysqli);
        } else {
            $display_block = $display_block . "
            <p><strong>That email is already in use. Please try another one.</strong></p><br/>";
        }
    }
}
$display_block = $display_block . "
            <form method='POST' action=''>
                <label><strong>First name:</strong>
                    <input type='text' name='f_name' required/></label>
                <label><strong>Last name:</strong>
                    <input type='text' name='l_name'/></label>
                <label><strong>Email:</strong>
                    <input type='text' name='email' required></label>
                <label><strong>Password:</strong>
                    <input type='password' id='password' name='password' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' 
                           title='Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters' required></label>
                <label><strong>Age:</strong>
                    <input type='text' name='age'></label>
                <div style='min-width:60%; float:right;'>
                <label><strong>Gender:</strong>
                Male<input type='radio' name='gender' value='male'>
                Female<input type='radio' name='gender' value='female'></label>
                </div>
                <input type='submit' name='submit' value='Create Account'>
                
            </form>
        </div>
        <div class='tblock side'>
            <div id='message'>
                <h3>Password must contain the following:</h3>
                <p id='letter' class='invalid'>A <b>lowercase</b> letter</p>
                <p id='capital' class='invalid'>A <b>capital (uppercase)</b> letter</p>
                <p id='number' class='invalid'>A <b>number</b></p>
                <p id='length' class='invalid'>Minimum <b>8 characters</b></p>
            </div>

            <script src='create.js'></script>
        </div>
        <footer><p>Copyright &copy; CK technologies</p>
        </footer>

    </body>
</html>";
?>
<?php

if ($success == TRUE)
    $display_block = "<p>You're account has been created. Thank you for joining us!</p><br>"
            . "<a href='login.php'>Goto Login page</a>"; // EMAIL IS UNIQUE. DISPLAY LINK TO LOG IN

echo "$display_block";
?>

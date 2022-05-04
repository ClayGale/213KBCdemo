<?php

SESSION_START();
if ((!filter_input(INPUT_POST, 'email')) || (!filter_input(INPUT_POST, 'password'))) {
    header("Location: login.php");
    exit;
} else {
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
        setcookie("auth", "1", time() + 60 * 30, "/", "", 0); // sets cookie and session variables
        $_SESSION["email"] = $targetemail;
        $_SESSION["fname"] = $f_name;
        mysqli_close($mysqli);
        mysqli_free_result($result);
        header("Location: firstpage.php");
    } else if (mysqli_num_rows($check_res) < 1) {
        
        $_SESSION["error"] = "<p> check your email and password. Or <a href='create.php'> create account </a> </p>"; //gives a message to be returned too the login page
        header("Location: login.php");
    }
}
?>
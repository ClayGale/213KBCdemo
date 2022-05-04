 <?php SESSION_START(); ?>
<!DOCTYPE html>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

        <script>
            $(document).ready(function () {
            $("#password2").keyup(function(){
                    validate();
                });
                function validate() {
                    var password1 = $("#password1").val();
                    var password2 = $("#password2").val();
                    if (password1 == password2) {
                        $("#validate-status").text("Valid");
                        $("#validate-status").css("color: green");
                    } else {
                        $("#validate-status").text("Password does not match!");
                        $("#validate-status").css("color: red");
                    }
                }
                ;
            });
        </script>

        <link rel="stylesheet" href="normalize.css">
        <link rel="stylesheet" href="beer.css" />
        <title>User Login Form</title>
    </head>
    <body style="background-color: lightgrey">
        <header>
            <?php
            include 'headerFiller.php';
            fillheader();
            ?>
        </header>
        <div class="tblock smallform">
            <div class="c1">
                <h1> Sign In </h1> 
                <?php
                if(isset($_SESSION["error"])){
                    echo $_SESSION["error"];
                }
                unset($_SESSION["error"]);
                ?>
                <form method="POST" action="check.php">
                    <label><strong>Email:</strong>
                        <input type='text' name='email'required></label>    
                    <label><strong>Password:</strong>          
                        <input type="password" name="password" id="password1"></label> 
                    <label><strong>Confirm Password:</strong>
                        <input type="password" id="password2"></label>
                    <p id="validate-status"></p>           
                    <input type="submit" id="submit" name="submit" value="Submit" class="nicebutton">
                </form>
                <form action="/my/link/location" method="get">
                    <input type="submit" name="submit" value="Create Account" class="nicebutton smallform">
                </form><br>
            </div>               
        </div>                                                 
    </body>

    <footer><p>Copyright &copy; CK technologies</p>
    </footer>
</html>  







<?php

function fillheader() {
    if (isset($_SESSION["fname"])) {
        $display_block = "<nav class='signin'>
                <a href='logout.php'><input type ='button' name='submit' value='Log Out' class='smallbutton'></a>
            </nav>

            <h1>Welcome to the Kelowna Beer Club " . $_SESSION["fname"] . "</h1>
            
            <nav>
		<ul id='banner-buttons'>
			<li id='nav-bar'> <a href='firstpage.php'>Info</a> </li> 
			<li id='nav-bar'> <a href='members.php'>See Beers</a> </li>
			<li id='nav-bar'> <a href='reviewinsert.php'>Place Review</a> </li>
			<li id='nav-bar'> <a href='reviews.php'>See Reviews</a> </li> 
			<li id='nav-bar'> <a href='about.php'>About</a> </li>
		</ul>
            </nav>
            
    "; 
    } else {
        $display_block = "<nav class='signin'>
                <a href='login.php'><input type ='button' name='submit' value='Log In' class='smallbutton'></a>
                
                <a href='create.php'><input type ='button' name='submit' value='Sign up' class='smallbutton'></a>
            </nav>

            <h1>Welcome to the Kelowna Beer Club</h1>
    ";
    }
    echo $display_block;
    unset($display_block);
}

?>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$target_dir = "images/"; //pulled from W3schools and altered
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
$target_file = $target_dir . $_POST["beer"] . "." . $imageFileType; //changes the name of the target file
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
//echo $imageFileType;
if ($imageFileType != "jpg" && $imageFileType != "jpeg") {
    echo "Sorry, only JPG files are allowed."; 
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $mysqli = mysqli_connect("localhost", "cs213user", "letmein", "presentation"); //add a corresponding entry for the beer
    $add_sql = "INSERT INTO `beer`(`beer`, `description`) VALUES ('" . $_POST["beer"] . "',\"" . $_POST["desc"] . "\")";
    $add_res = mysqli_query($mysqli, $add_sql) or die(mysqli_error($mysqli));
    mysqli_close($mysqli);
    sleep(2);
    header("Location: members.php");
}
?>

<?php 

include("database.php");

//Form Submission Check

if (isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($connect, $_POST['user']);
    $msg = mysqli_real_escape_string($connect, $_POST['message']);

 

 //Set TimeZone

    date_default_timezone_set('Asia/Kolkata');
    $time = date('h:i:s A', time());


    //validate input

    if (!isset($user) || $user == "" || !isset($msg) || $msg == "") {

          $error = "Please fill in your name and a message";
        header('Location: index.php?error=' . urlencode($error));
        exit();


    } else {
             
        $query = "INSERT INTO shouts (user, message, time) VALUES ('$user','$msg','$time')";

        if (!mysqli_query($connect, $query)) {
            die('Error:' . mysqli_error($connect));
        } else {
            header("Location: index.php");
            exit();
        }
    }
}
?>
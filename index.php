<?php 
include("database.php");

$qry = "SELECT * FROM shouts ORDER BY id DESC";
$results = $connect->query($qry);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shout It!</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div id="container">
            <header>
                <h1>Shout It! Shoutbox</h1>   
            </header>
            <div id="shouts">
                <ul>
<?php
while ($row = $results->fetch_assoc()) {

    echo '<li class="shout"><span>' . $row["time"] . ' - </span><b>' . $row["user"] . ':</b> ' . $row["message"] . '</li>';

}
?>  
                </ul>
            </div>
            <div id="input">
            <?php if (isset($_GET['error'])) : ?>
                <div id="error"><?php echo $_GET['error']; ?></div>
<?php endif; ?>
                
                <form method="POST" action="process.php">
                    <input id="name" type="text" name="user" placeholder="Enter Your Name">
                    <input id="msg"  type="text" name="message" placeholder="Enter Your Message">
                    <br>
                    <input class="shout-btn" type="submit" name="submit" value="Shout It Out!">
                </form>
            </div>
    </div>
</body>
</html>
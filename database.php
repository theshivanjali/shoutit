<?php 
//connection
$connect = new mysqli("localhost","root","","shoutit");

//Test Connection
if ($connect->connect_error) 
{
    die("Connection failed: " . $connect->connect_error);
}

?>
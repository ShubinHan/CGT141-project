<?php
//connect.php
$server = 'localhost';
$username   = 'username';
$password   = 'password';
$database   = 'database';

if(!mysqli_connect($server, $username,  $password))
{
    exit('Error: could not connect to server');
}
if(!mysqli_connect($database))
{
    exit('Error: could not establish database connection');
}
?>
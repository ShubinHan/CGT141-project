<?php
/**
 * Created by PhpStorm.
 * User: hansh
 * Date: 10/11/2017
 * Time: 6:39 AM
 */
$username = isset($_POST['username'])?$_POST['username']:"";
$password = isset($_POST['password'])?$_POST['password']:"";

$conn = mysqli_connect('localhost','root','123','users');

$sql_select="SELECT username FROM User WHERE username = '$username'";

$ret = mysqli_query($conn,$sql_select);
$row = mysqli_fetch_array($ret);

if($username == $row['username']) {
    header("Location:register.php?err=1");
} else {

    $sql_insert = "INSERT INTO User(username,password) VALUES('$username','$password')";

    mysqli_query($conn,$sql_insert);
    header("Location:register.php?err=2");
}

mysqli_close($conn);
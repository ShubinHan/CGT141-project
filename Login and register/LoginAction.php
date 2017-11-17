<?php
/**
 * Created by PhpStorm.
 * User: hansh
 * Date: 10/4/2017
 * Time: 1:49 PM
 */
$username = isset($_POST['username'])?$_POST['username']:"";
$password = isset($_POST['password'])?$_POST['password']:"";

if(!empty($username)&&!empty($password)) {

    $conn = mysqli_connect('localhost','root','123','users');

    $sql_select = "SELECT username,password FROM users WHERE username = '$username' AND password = '$password'";

    $ret = mysqli_query($conn,$sql_select);

    $row = mysqli_fetch_array($ret);


    if($username==$row['username']&&$password==$row['password']) {

        echo 'Welcome, ' . $_SESSION['username'] . '. <a href="../Main%20page/Course%20list.php">go to my courses</a>.';

        mysqli_close($conn);
    }else {

        header("Location:login.php?err=1");
    }
}else {

    header("Location:login.php?err=2");
}

?>
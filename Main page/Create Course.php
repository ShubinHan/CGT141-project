<?php
//create_cat.php
include 'connect.php';

if($_SESSION['signed_in'] == false)
{
    echo 'Sorry, you have to be <a href="../Login%20and%20register/login.php">signed in</a> to create a new course.';
}
else
{ if($_SERVER['REQUEST_METHOD'] != 'POST')
{

    echo '<form method="post" action="">
        Course name: <input type="text" name="Coursename" />
        <input type="submit" value="Add course" />
     </form>';
}
else
{
    //the form has been posted, so save it
    $sql_insert = "INSERT INTO Courses (Coursename) VALUES($Coursename)";
    $result = mysqli_query($sql);
    if(!$result)
    {
        echo 'Error';
    }
    else
    {
        echo 'New Course successfully added.';
    }
}
}
?>
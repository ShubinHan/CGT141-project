<?php

include 'connect.php';

echo '<h2>Create a topic</h2>';
if($_SESSION['signed_in'] == false)
{
    echo 'Sorry, you have to be <a href="../Login%20and%20register/login.php">signed in</a> to create a topic.';
}
else
{
    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {
        $sql_select = "SELECT CourseID,CouresName FROM Coures";

        $result = mysqli_query($sql);

        if(!$result)
        {
            echo 'Error while selecting from database. Please try again later.';
        }
        else
        {
            echo '<form method="post" action="">
                   Subject: <input type="text" name="topicSubject" />
                    Category:';

                echo '<select name="topicCourse">';
                while($row = mysqli_fetch_assoc($result))
                {
                    echo '<option value="' . $row['CourseID'] . '">' . $row['CourseName'] . '</option>';
                }
                echo '</select>';

                echo 'Message: <textarea name="postContent" /></textarea>
                    <input type="submit" value="CreateTopic" />
                 </form>';
            }

    }
    else
    {
        $query  = "BEGIN WORK;";
        $result = mysqli_query($query);

        if(!$result)
        {
            echo 'An error occured while creating your topic. Please try again later.';
        }
        else
        {$sql = "INSERT INTO 
                        topics(topicSubject,
                               topicDate,
                               topicCourse,
                               topicBy)
                   VALUES('" . mysqli_real_escape_string($_POST['topicSubject']) . "',
                               NOW(),
                               " . mysql_real_escape_string($_POST['topicCourse']) . ",
                               " . $_SESSION['userid'] . "
                               )";

            $result = mysqli_query($sql);
            if(!$result)
            {
                echo 'An error occured while inserting your data. Please try again later.' . mysql_error();
                $sql = "ROLLBACK;";
                $result = mysql_query($sql);
            }
            else
            {
                $topicId = mysql_insert_id();

                $sql = "INSERT INTO
                            posts(postContent,
                                  postDate,
                                  postTopic,
                                  postBy)
                        VALUES
                            ('" . mysql_real_escape_string($_POST['postContent']) . "',
                                  NOW(),
                                  " . $topicId . ",
                                  " . $_SESSION['userid'] . "
                            )";
                $result = mysql_query($sql);

                if(!$result)
                {
                    echo 'An error occured while inserting your post. Please try again later.' . mysql_error();
                    $sql = "ROLLBACK;";
                    $result = mysql_query($sql);
                }
                else
                {
                    $sql = "COMMIT;";
                    $result = mysql_query($sql);


                    echo 'You have successfully created <a href="topic.php?id='. $topicId . '">new topic</a>.';
                }
            }
        }
    }
}

?>
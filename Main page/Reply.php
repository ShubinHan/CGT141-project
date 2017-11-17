<?php

include 'connect.php';

if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    echo 'This file cannot be called directly.';
}
else
{
    if(!$_SESSION['signed_in'])
    {
        echo 'You must be signed in to post a reply.';
    }
    else
    {
        $sql = "INSERT INTO 
                    posts(postContent,
                          postDate,
                          postTopic,
                          postBy) 
                VALUES ('" . $_POST['replyContent'] . "',
                        NOW(),
                        " . mysql_real_escape_string($_GET['id']) . ",
                        " . $_SESSION['userid'] . ")";

        $result = mysql_query($sql);

        if(!$result)
        {
            echo 'Your reply has not been saved, please try again later.';
        }
        else
        {
            echo 'Your reply has been saved, check out <a href="./topic.php?id=' . htmlentities($_GET['id']) . '">the topic</a>.';
        }
    }
}

include 'footer.php';
?>
<?php
//create_cat.php
include 'connect.php';

$sql = "SELECT
            topicID,
            topicSubject
        FROM
            Topic
        WHERE
            TopicId = " . mysql_real_escape_string($_GET['id']);

$result = mysql_query($sql);

if(!$result)
{
    echo 'The topic could not be displayed, please try again later.' . mysql_error();
}
else
{
    if(mysql_num_rows($result) == 0)
    {
        echo 'This category does not exist.';
    }
    else
    {
        //display category data
        while($row = mysql_fetch_assoc($result))
        {
            echo '<h2>Topics in ′' . $row['cat_name'] . '′ category</h2>';
        }

        //do a query for the topics
        $sql = "SELECT  
                    post.postTopic,
                    post.postContent,
                    post.postDate,
                    post.postsBy,
                    users.userId,
                    users.userName
                FROM
                    post
                LEFT JOIN
                users
                ON
                post.postBy = users.userId
                
                WHERE
                     posts.postTopic = " . mysql_real_escape_string($_GET['id']);

        $result = mysql_query($sql);

        if(!$result)
        {
            echo 'The topics could not be displayed, please try again later.';
        }
        else
        {
            if(mysql_num_rows($result) == 0)
            {
                echo 'There are no topics in this category yet.';
            }
            else
            {
                echo '<table border="1">
                      <tr>
                        <th>Topic</th>
                        <th>Content</th>
                      </tr>';

                while($row = mysql_fetch_assoc($result))
                {
                    echo '<tr>';
                    echo '<td class="leftpart">';
                    echo  $row['post.postDate,post.postsBy,'];
                    echo '</td>';
                    echo '<td class="rightpart">';
                    echo $row['postContent'];
                    echo '</td>';
                    echo '</tr>';
                }
            }
        }
    }
}

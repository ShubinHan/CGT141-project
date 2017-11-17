<?php

include 'connect.php';

$sql = "SELECT
            CourseId,
            CourseName
        FROM
            Course
        WHERE
            CourseId = " . mysql_real_escape_string($_GET['id']);

$result = mysql_query($sql);

if(!$result)
{
    echo 'The category could not be displayed, please try again later.' . mysql_error();
}
else
{
    if(mysql_num_rows($result) == 0)
    {
        echo 'This category does not exist.';
    }
    else
    {
        while($row = mysql_fetch_assoc($result))
        {
            echo '<h2>Topics in ′' . $row['CoursName'] . '′ category</h2>';
        }

        $sql = "SELECT  
                    topicId,
                    topicSubject,
                    topicDate,
                    topicCourse
                FROM
                    topics
                WHERE
                    topicCourse = " . mysql_real_escape_string($_GET['id']);

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
                        <th>Created at</th>
                      </tr>';

                while($row = mysql_fetch_assoc($result))
                {
                    echo '<tr>';
                    echo '<td class="leftpart">';
                    echo '<h3><a href="Topic.php?id=' . $row['topicId'] . '">' . $row['topicsubject'] . '</a><h3>';
                    echo '</td>';
                    echo '<td class="rightpart">';
                    echo date('d-m-Y', strtotime($row['topic_date']));
                    echo '</td>';
                    echo '</tr>';
                }
            }
        }
    }
}

include 'footer.php';
?>
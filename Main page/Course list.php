<?php
include 'connect.php';


        $sql_select = "SELECT CourseID,CouresName FROM Coures";


        echo '<table border="1">
              <tr>
                <th>Courses</th>
                <th>Last topic</th>
              </tr>';

        while($row = mysqli_fetch_row($result))
        {
            echo '<tr>';
            echo '<td class="leftpart">';
            echo '<h3><a href="Courses.php?id">' . $row['cat_name'] . '</a></h3>' ;
            echo '</td>';
            echo '<td class="rightpart">';
            echo '<a href="topic.php?id=">Topic subject</a> at 10-10';
            echo '</td>';
            echo '</tr>';
        }
        echo 'No courses you take?<a href="./Create%20Course.php">create one</a>';
?>
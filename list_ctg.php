<?php 
require('connection.php');



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list_ctg</title>
</head>
<body>
    <?php 
        
        $sql    = "SELECT * FROM `category`";
        $query  = $conn->query($sql);
        $data   = mysqli_fetch_assoc($query);

       echo "<table border='1'>
        <tr>
            <th> Category Name </th> 
            <th> Category Entrydate </th>
            <th>Action</th>
        </tr>";

       while($data = mysqli_fetch_assoc($query)){
           $category_id       = $data['category_id'];
           $category_name       = $data['category_name'];
           $category_entrydate	= $data['category_entrydate'];

            echo "<tr>
                    <td>$category_name</td>
                    <td>$category_entrydate</td>
                    <td> <a href='edit_ctg.php?id=$category_id'>Edit</a></td>
                </tr>";
       }

       echo "</table>";

    ?>
</body>
</html>
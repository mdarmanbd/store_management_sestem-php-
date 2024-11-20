<?php 

require('connection.php');


if(isset($_POST['category_name'])){
    $category_name      =  $_POST['category_name'];
    $category_entrydate = $_POST['category_entrydate'];

   $sql = "INSERT INTO category (category_name, category_entrydate) 
            VALUES ('$category_name', '$category_entrydate')";

    if($conn->query($sql) == TRUE){
        echo " data create successfully ";
    } else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_ctg</title>
</head>
<body>
    <form action="add_ctg.php" method="POST">
        Category: <br>
        <input type="text" name="category_name"><br><br>
        Category Entry Date: <br>
        <input type="date" name="category_entrydate"><br><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>
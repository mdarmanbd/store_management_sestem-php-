<?php 
require('connection.php');


if(isset($_GET['id'])){
    
    $get_id = $_GET['id'];
    $sql    = "SELECT * FROM category WHERE category_id = $get_id";
    $query  = $conn->query($sql);
    $data   = mysqli_fetch_assoc($query);

    $category_id        = $data['category_id'];
    $category_name      = $data['category_name'];
    $category_entrydate = $data['category_entrydate'];

    // echo$category_id;
    // echo $category_name;
    // echo $category_entrydate;

    if(isset($_POST['category_name'])){
        $new_category_id = $_POST['category_id'];
        $new_category_name = $_POST['category_name'];
        $new_category_entrydate = $_POST['category_entrydate'];

        $sql = "UPDATE category SET 
                category_name = '$new_category_name',
                category_entrydate = '$new_category_entrydate'
                WHERE category_id = '$new_category_id'
            ";

       if($conn->query($sql) == TRUE){

            echo "Record updated successfully";

       } else{

            echo "Error updating record: " . $conn->error;

       }

    }

 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit_ctg</title>
</head>
<body>
    
    <form action="edit_ctg.php" method="POST">
        Category: <br>
        <input type="text" name="category_name" value="<?php echo $category_name ?>"><br><br>
        Category Entry Date: <br>
        <input type="date" name="category_entrydate" value="<?php echo $category_entrydate ?>"><br><br>
        <input type="text" name="category_id" value="<?php echo $category_id ?>" hidden><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
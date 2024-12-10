<?php 
require('connection.php');

if(isset($_POST['product_name'])){
    $productName = $_POST['product_name'];
    $produtCategory = $_POST['product_category'];
    $productCode = $_POST['product_code'];
    $productEntryDate = $_POST['product_entrydate'];

    $sql = "INSERT INTO product (product_name, product_category, product_code, product_entrydate) 
            VALUES ('$productName', '$produtCategory', '$productCode', '$productEntryDate')";

    if($conn->query($sql)){
        echo " data create successfully ";
    } else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
}else{
    echo "need to entry product name";
}

$sql    = "SELECT * FROM `category`";
$query  = $conn->query($sql);
$data   = mysqli_fetch_array($query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
</head>
<body>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
        Product name : <br>
        <input type="text" name="product_name"><br><br>
        Product category : <br>
        
       <select name='product_category'>
        <?php 
        while($data = mysqli_fetch_array($query)){
            $ctgId = $data['category_id'];
            $ctgName = $data['category_name'];
            echo "<option value='$ctgId'>$ctgName</option>";
        }
        ?>
       </select><br><br>
        Product code : <br>
        <input type="text" name="product_code"><br><br>
        Product entrydate : <br>
        <input type="date" name="product_entrydate"><br><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>
<?php 
require('connection.php');

if(isset($_GET['id'])){
    $getId = $_GET['id'];
    $sql    = "SELECT * FROM `product` WHERE product_id = $getId ";
    $query  = $conn->query($sql);
    $data   = mysqli_fetch_assoc($query);
    $productName      = $data['product_name'];
    $productCode      = $data['product_code'];
    $productEntryDate = $data['product_entrydate'];
    $productId        = $data['product_id'];
    $productCtg        = $data['product_category'];

    $sqlC = "SELECT * FROM `category`";
    $queryC = $conn->query($sqlC);

    $categories = [];
    while ($row = mysqli_fetch_assoc($queryC)) {
        $categories[] = $row;
    }

    // var_dump($categories);
    
}


if(isset($_POST['newProductName'])){
    $newProductName         = $_POST['newProductName'];
    $newProductCategory     = $_POST['newProductCategory'];
    $newProductCode         = $_POST['newProductCode'];
    $newProductEntryDate    = $_POST['newProductEntryDate'];
    $ProductId           = $_POST['ProductId'];

    echo $newProductName;
    echo "<br>";
    echo "newProductCategory " . " = " . $newProductCategory;
    echo "<br>";
    echo $newProductCode;
    echo "<br>";
    echo $newProductEntryDate;
    echo "<br>";
    echo "newProductId " . " = " . $ProductId;
    echo "<br>";

    $sqlUpdate = "UPDATE product SET 
            product_name        = '$newProductName',
            product_category    = '$newProductCategory',
            product_code        = '$newProductCode',
            product_entrydate	= '$newProductEntryDate'
            WHERE product_id    = '$ProductId'";

    if($conn->query($sqlUpdate)){
        echo "Update data in product table";
    }else{
        echo "Error updating record: " . $conn->error;
    }

        
}

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
        <input type="text" name="newProductName" value="<?php echo $productName; ?>" ><br><br>
        Product category : <br>

       <select name='newProductCategory'>
           <?php foreach ($categories as $category): ?>
                <option value="<?= $category['category_id'];?>" <?= $category['category_id'] == $productCtg  ? 'selected' : '' ; ?> >
                    <?php echo $category['category_name']; ?>
                </option>
            <?php endforeach; ?>
           
       </select><br><br>
        Product code : <br>
        <input type="text" name="newProductCode" value="<?php echo $productCode;?>"><br><br>
        Product entrydate : <br>
        <input type="date" name="newProductEntryDate" value="<?php echo $productEntryDate ?>"><br><br>
        <input type="text" name="ProductId" value="<?php echo $productId;?>"><br><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>
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

    // echo $productId ;

    // $sqlC    = "SELECT * FROM `category`";
    // $queryC  = $conn->query($sqlC);
    // $dataC   = mysqli_fetch_array($queryC);

    $sqlC = "SELECT * FROM `category`";
    $queryC = $conn->query($sqlC);

    $categories = [];
    while ($row = mysqli_fetch_assoc($queryC)) {
        $categories[] = $row;
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
        <input type="text" name="productName" value="<?php echo $productName; ?>" ><br><br>
        Product category : <br>

       <select name='product_category'>
           <?php foreach ($categories as $category): ?>
                
                <option value="<?= $category['category_id']; ?> ">
                    <?= htmlspecialchars($category['category_name']); ?>
                </option>
            <?php endforeach; ?>
           
       </select><br><br>
        Product code : <br>
        <input type="text" name="productCode" value="<?php echo $productCode;?>"><br><br>
        Product entrydate : <br>
        <input type="date" name="productEntryDate" value="<?php echo $productEntryDate ?>"><br><br>
        <input type="text" name="productId" value="<?php echo $productId;?>"><br><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>
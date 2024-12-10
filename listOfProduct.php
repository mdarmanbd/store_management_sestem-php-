<?php 
require('connection.php');

$sqliList = "SELECT * FROM `category`";
$queryList = $conn->query($sqliList);

$dataList = [];

while($fatchData = mysqli_fetch_assoc($queryList)){
    $ctgId = $fatchData['category_id'];
    $ctgName = $fatchData['category_name'];
    $dataList[$ctgId] = $ctgName;
}

// print_r($dataList[1]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list of product</title>
</head>
<body>
    <?php 
        
        $sql    = "SELECT * FROM `product`";
        $query  = $conn->query($sql);
        $data   = mysqli_fetch_assoc($query);

       echo "<table border='1'>
        <tr>
            <th> product Name </th>
            <th> product category </th> 
            <th> product code </th>
            <th>Action</th>
        </tr>";

       while($data = mysqli_fetch_assoc($query)){
           $product_id      = $data['product_id'];
           $product_name    = $data['product_name'];
           $product_category    = $data['product_category'];
           $product_code	= $data['product_code'];

            echo "<tr>
                    <td>$product_name</td>
                    <td>$dataList[$product_category]</td>
                    <td>$product_code</td>
                   <td> <a href='editProduct.php?id=$product_id'>Edit</a></td>
                    
                </tr>";
       }

       echo "</table>";

    ?>
</body>
</html>
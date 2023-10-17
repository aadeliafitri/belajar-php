<?php 
    include 'koneksi.php';

    $productCode = $_POST["product_code"];
    $productName = $_POST["product_name"];
    $categoryProduct = $_POST["category"];
    $descProduct = $_POST["description"];
    $price = $_POST["price"];
    $discAmount = $_POST["discount"];
    $stock = $_POST["stock"];
    $unit = $_POST["unit"];
    $isActive = $_POST["is_active"];
    $fileLocation = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];
    $directory = '../assets/file/'.$fileName;

    // echo $isActive;
    if ($isActive == "on") {
        $isActive = 1;
    } else {
        $isActive = 0;
    }

    if (empty($productCode)) {
        header("Location: addproduct.php?notif=tambahkosong&jenis=product_code");
    } else if (empty($productName)) {
        header("Location: addproduct.php?notif=tambahkosong&jenis=product_name");
    } else if (empty($categoryProduct)) {
        header("Location: addproduct.php?notif=tambahkosong&jenis=category_product");
    } else if (empty($descProduct)) {
        header("Location: addproduct.php?notif=tambahkosong&jenis=description_product");
    } else if (empty($price)) {
        header("Location: addproduct.php?notif=tambahkosong&jenis=price");
    } else if (empty($discAmount)) {
        header("Location: addproduct.php?notif=tambahkosong&jenis=discount");
    } else if (empty($stock)) {
        header("Location: addproduct.php?notif=tambahkosong&jenis=stock");
    } else  if (empty($unit)) {
        header("Location: product.php?notif=tambahkosong&jenis=unit");
    } else  if (empty($isActive)) {
        header("Location: addproduct.php?notif=tambahkosong&jenis=is_active");
    } else  if (!move_uploaded_file($fileLocation,$directory)) {
        header("Location: addproduct.php?notif=tambahkosong&jenis=file");
    } else{
        $sql = "INSERT INTO products (`product_name`, `category_id`, `product_code`, `is_active`, `description`, `price`, `unit`, `discount_amount`, `stock`, `image`) 
        VALUES('$productName', $categoryProduct, '$productCode', $isActive, '$descProduct', $price, '$unit', '$discAmount', $stock, '$fileName')";

        $query = mysqli_query($con, $sql);
        if(!$query) {
            echo "Failed add data: ". mysqli_error($con);
            die;
        }

        header("Location:product.php?notif=tambahberhasil");
    }

?>
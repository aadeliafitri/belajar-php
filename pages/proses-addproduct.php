<?php 
    require_once 'koneksi.php';
    include '../models/product.php';

    $db = new Database();
    $product = new Product($db);

    $productCode = $_POST["product_code"];
    $productName = $_POST["product_name"];
    $categoryProduct = $_POST["category"];
    $descProduct = $_POST["description"];
    $price = $_POST["price"];
    $discAmount = $_POST["discount"];
    $stock = $_POST["stock"];
    $unit = $_POST["unit"];
    $isActive = $_POST["is_active"];
    // $fileLocation = $_FILES['file']['tmp_name'];
    // $fileName = $_FILES['file']['name'];
    // $directory = '../assets/file/'.$fileName;

    // Array untuk menyimpan lokasi file
    $imageLocations = [];

    // Loop melalui file yang diunggah
    if (!empty($_FILES['files']['name'][0])) {
        foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
            $fileName = $_FILES['files']['name'][$key];
            $uploadDir = '../assets/file/';
            $fileLocation = $uploadDir . $fileName;

            if (move_uploaded_file($tmp_name, $fileLocation)) {
                $imageLocations[] = $fileName;
            }
        }
    }
    // echo $isActive;
    // if ($isActive == "on") {
    //     $isActive = 1;
    // } else {
    //     $isActive = 0;
    // }

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
    } else{
        // Simpan lokasi gambar dalam format JSON
        $imageLocationsJSON = json_encode($imageLocations);
        $product->addProduct($productCode, $productName, $categoryProduct, $descProduct, $price, $discAmount, $stock, $unit, $isActive, $imageLocationsJSON);

        header("Location:product.php?notif=tambahberhasil");
    }

?>
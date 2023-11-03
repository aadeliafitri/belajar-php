<?php 

require_once 'koneksi.php';

include '../models/product.php';

$db = new Database();
$product = new Product($db);

session_start();

if(isset($_SESSION['id_product'])){
    $productID = $_SESSION['id_product'];
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
    if ($isActive == "on") {
        $isActive = 1;
    } else {
        $isActive = 0;
    }

    $currentImage= $product->getCurrentProductImage($productID);
 
    //get image
    // $selectImage = "SELECT `image` FROM `products` WHERE `id`='$productID'";
    // $queryImage = mysqli_query($con,$selectImage);
    // while($dataImage = mysqli_fetch_row($queryImage)){
    //     $image= $dataImage[0];
    // }
   
    if(empty($categoryProduct)){
	    header("Location:editproduct.php?data=$id_produk&notif=editkosong&jenis=product_category");
	}else if(empty($productCode)){
	    header("Location:editproduct.php?data=$id_produk&notif=editkosong&jenis=product_code");
	}else if(empty($productName)){
	    header("Location:editproduct.php?data=$id_produk&notif=editkosong&jenis=product_name");
	}else if(empty($descProduct)){
	    header("Location:editproduct.php?data=$id_produk&notif=editkosong&jenis=description");
	}else if(empty($price)){
	    header("Location:editproduct.php?data=$id_produk&notif=editkosong&jenis=price");
	}else if(empty($discAmount)){
	    header("Location:editproduct.php?data=$id_produk&notif=editkosong&jenis=discount_amount");
	}else if(empty($stock)){
	    header("Location:editproduct.php?data=$id_produk&notif=editkosong&jenis=stock");
	}else if(empty($unit)){
	    header("Location:editproduct.php?data=$id_produk&notif=editkosong&jenis=unit");
	}else  if(empty($isActive)) {
        header("Location: editproduct.php?data=$id_produk&notif=editkosong&jenis=is_active");
    }else{
        $uploadSuccess = $product->handleFileUpload($files, $currentImage);
	    if($uploadSuccess){
            $product->deleteCurrentImage($currentImage);
            $image = $uploadSuccess;
	        $product->editProduct($productCode, $productName, $categoryProduct, $descProduct, $price, $discAmount, $stock, $unit, $isActive, $image, $productID);
        }else{
            $image = $currentImage;
	        $product->editProduct($productCode, $productName, $categoryProduct, $descProduct, $price, $discAmount, $stock, $unit, $isActive, $image, $productID);
        }
        header("Location:product.php?notif=editberhasil");
    }
}
?>
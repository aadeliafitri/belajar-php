<?php 

include 'koneksi.php';

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
    $fileLocation = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];
    $directory = '../assets/file/'.$fileName;

    // echo $isActive;
    if ($isActive == "on") {
        $isActive = 1;
    } else {
        $isActive = 0;
    }
 
    //get image
    $selectImage = "SELECT `image` FROM `products` WHERE `id`='$productID'";
    $queryImage = mysqli_query($con,$selectImage);
    while($dataImage = mysqli_fetch_row($queryImage)){
        $image= $dataImage[0];
        //echo $foto;
    }
   
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
        $fileLocation = $_FILES['file']['tmp_name'];
	    $fileName = $_FILES['file']['name'];
	    $directory = '../assets/file/'.$fileName;
	    if(move_uploaded_file($fileLocation,$directory)){
            if(!empty($image)){
                unlink("../assets/file/$image");
            }
	        $sql = "UPDATE `products` set `category_id`='$categoryProduct', `product_name`='$productName', `product_code`='$productCode', `description`='$descProduct', `price`='$price', `discount_amount`='$discAmount',`stock`='$stock', `unit`='$unit', `is_active`='$isActive', `image`='$fileName'
	        WHERE `id`='$productID'";
	        mysqli_query($con,$sql);
        }else{
	        $sql = "UPDATE `products` set `category_id`='$categoryProduct', `product_name`='$productName', `product_code`='$productCode', `description`='$descProduct', `price`='$price', `discount_amount`='$discAmount',`stock`='$stock', `unit`='$unit', `is_active`='$isActive', `image`='$fileName'
	        WHERE `id`='$productID'";
	        mysqli_query($con,$sql);
        }
        header("Location:product.php?notif=editberhasil");
    }
}
?>
<?php
require_once '../pages/koneksi.php';

class Product{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function deleteProduct($productID) {
        $con = $this->db->getConnection();
        $deleteProduct = "DELETE FROM products WHERE id = ?";
        $stmt = $con->prepare($deleteProduct);
        $stmt->bind_param("i", $productID);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getProducts($page, $perPage, $search = '') {
        $offset = ($page - 1) * $perPage;
        $query = "SELECT * FROM view_products";

        if (!empty($search)) {
            $query .= " WHERE `view_products`.`product_name` LIKE '%$search%' OR `view_products`.`category_name` LIKE '%$search%'";
        }

        $query .= " ORDER BY `view_products`.`category_name`, `view_products`.`product_name` LIMIT $offset, $perPage";

        $result = $this->db->getConnection()->query($query);
        return $result;
    }

    public function getProductCount($search = '') {
        $query = "SELECT COUNT(*) as count FROM view_products";

        if (!empty($search)) {
            $query .= " WHERE `view_products`.`product_name` LIKE '%$search%' OR `view_products`.`category_name` LIKE '%$search%'";
        }

        $result = $this->db->getConnection()->query($query);
        $row = $result->fetch_assoc();
        return $row['count'];
    }

    public function addProduct($productCode, $productName, $categoryProduct, $descProduct, $price, $discAmount, $stock, $unit, $isActive, $fileLocations) {

        // Atur isActive sesuai dengan nilai yang diterima
        $isActive = $isActive == "on" ? 1 : 0;

        // Siapkan query untuk memasukkan data produk ke dalam database
        $sql = "INSERT INTO products (`product_name`, `category_id`, `product_code`, `is_active`, `description`, `price`, `unit`, `discount_amount`, `stock`, `image`) 
        VALUES('$productName', $categoryProduct, '$productCode', $isActive, '$descProduct', $price, '$unit', '$discAmount', $stock, '$fileLocations')";

        // Jalankan query
        $query = mysqli_query($this->db->getConnection(), $sql);

        return $query;
    }

    public function getProductCategories() {
        // $offset = ($page - 1) * $perPage;
        $query = "SELECT `id`,`category_name` FROM `product_categories` ORDER BY `category_name`";

        $result = $this->db->getConnection()->query($query);
        return $result;
    }

    public function editProduct($productCode, $productName, $categoryProduct, $descProduct, $price, $discAmount, $stock, $unit, $isActive, $image, $productID) {

        // $this->sanitizeData($productCode, $productName, $descProduct, $price, $discAmount, $stock, $unit);

        $isActive = $isActive === "on" ? 1 : 0;

        // $currentImage = $this->getCurrentProductImage($productID);

        $sql = "UPDATE `products` SET `category_id`='$categoryProduct', `product_name`='$productName', `product_code`='$productCode', `description`='$descProduct', `price`='$price', `discount_amount`='$discAmount', `stock`='$stock', `unit`='$unit', `is_active`='$isActive', `image`='$image' WHERE `id`='$productID'";

        $query = mysqli_query($this->db->getConnection(), $sql);

        return $query;
    
    }

    public function getProductDetail($productID): mysqli_result {
        $sql = "SELECT `product_name`, `product_code`, `category_id`, `description`, `price`, `discount_amount`, `stock`, `unit`, `is_active` FROM `products` WHERE `id`='$productID'";

        $result = $this->db->getConnection()->query($sql);
        return $result;
    }

    public function getCurrentProductImage($productID)
    {
        $selectImage = "SELECT `image` FROM `products` WHERE `id`='$productID'";
        $queryImage = mysqli_query($this->db->getConnection(), $selectImage);

        if ($dataImage = mysqli_fetch_row($queryImage)) {
            return $dataImage[0];
        }
        return null;
    }

    public function handleFileUpload($files, $currentImage)
    {
        // Implement file upload logic here and return the new file name on success
        // Otherwise, return null
        if ($files['tmp_name'] && is_uploaded_file($files['tmp_name'])) {
            // Upload the file, generate a new filename, and move the uploaded file
            $newFileName = uniqid() . "_" . $files['name'];
            $uploadDirectory = '../assets/file/' . $newFileName;

            if (move_uploaded_file($files['tmp_name'], $uploadDirectory)) {
                return $newFileName;
            }
        }
        return $currentImage;
    }

    public function deleteCurrentImage($currentImage)
    {
        // Implement logic to delete the current image, if it's different from the new one
        if (!empty($currentImage)) {
            $imagePath = '../assets/file/' . $currentImage;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    }
}
?>
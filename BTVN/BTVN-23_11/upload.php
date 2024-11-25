<?php
    if (isset($_POST['add'])) {
        // Xử lý ảnh tải lên
        $imagePath = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $imagePath = $target_file;
            }
        }
    
        // Thêm sản phẩm vào mảng
        $products[] = [
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'image' => $imagePath
        ];
    
        // Lưu mảng sản phẩm vào file
        file_put_contents('products.php', "<?php\n\$products = " . var_export($products, true) . ";");
    }
    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        
        // Xử lý ảnh tải lên
        $imagePath = $products[$id]['image']; // Dùng ảnh cũ nếu không thay đổi
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $imagePath = $target_file;
            }
        }
    
        // Cập nhật thông tin sản phẩm
        $products[$id] = [
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'image' => $imagePath
        ];
    
        // Lưu mảng sản phẩm vào file
        file_put_contents('products.php', "<?php\n\$products = " . var_export($products, true) . ";");
    }
        
?>
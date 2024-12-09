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
    
        // Thêm vào mảng
        $flowers[] = [
            'name' => $_POST['name'],
            'Description' => $_POST['Description'],
            'image' => $imagePath
        ];
    
        // Lưu mảng vào file
        file_put_contents('flowers.php', "<?php\n\$flowers = " . var_export($flowers, true) . ";");
    }
    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        
        // Xử lý ảnh tải lên
        $imagePath = $flowers[$id]['image']; // Dùng ảnh cũ nếu không thay đổi
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $imagePath = $target_file;
            }
        }
    
        // Cập nhật thông tin 
        $flowers[$id] = [
            'name' => $_POST['name'],
            'Description' => $_POST['Description'],
            'image' => $imagePath
        ];
    
        // Lưu mảng vào file
        file_put_contents('flowers.php', "<?php\n\$flowers = " . var_export($flowers, true) . ";");
    }
        
?>
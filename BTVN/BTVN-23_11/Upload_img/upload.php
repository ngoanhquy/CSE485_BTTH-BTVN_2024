<?php
// Kiểm tra xem file đã được tải lên chưa
if (!isset($_FILES["fileToUpload"])) {
    echo "Không tìm thấy tệp để tải lên.";
    exit;
}

// Thư mục đích
$target_dir = "uploads/";

// Tạo thư mục nếu chưa tồn tại
if (!file_exists($target_dir)) {
    if (!mkdir($target_dir, 0777, true)) {
        echo "Không thể tạo thư mục đích.";
        exit;
    }
}


// Kiểm tra kích thước tệp
#Kiểm tra kích thước tệp
if ($_FILES["fileToUpload"]["size"] > 500000) { // Ví dụ, giới hạn là 500 KB
    echo "Xin lỗi, tệp tin của bạn quá lớn.";
    exit;
}



$imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
// Chỉ cho phép một số định dạng tệp tin nhất định
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"


) {
    echo "Xin lỗi, chỉ các tệp JPG, JPEG, PNG & GIF mới được cho phép.";
    exit;
}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "Tệp " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " đã được tải lên. <br>";
    echo "<img src='" . $target_file . "' alt='Uploaded Image' style='max-width: 300px; max-height: 300px;'><br>";
} else {
    echo "Xin lỗi, đã có lỗi xảy ra trong quá trình tải tệp tin của bạn.";
}


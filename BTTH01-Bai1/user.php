<?php include 'header.php'; ?>
<?php include 'flowers.php'; ?>

<main>
    <div class="container">
        <h1>Danh sách các loài hoa</h1>
        <div class="flowers-list">
            <?php
            foreach ($flowers as $flower) {
                echo "
                <div class='flower-item'>
                    <h2>{$flower['name']}</h2>
                    <p>{$flower['Description']}</p>
                    <img src='{$flower['image']}' alt='{$flower['name']}' class='flower-image'>
                </div>";
            }
            ?>
        </div>
    </div>
</main>


<!-- CSS -->
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 0;
    }
    .container {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }
    .flowers-list {
        display: flex;
        flex-direction: column;
        gap: 10px; /* Giảm khoảng cách giữa các mục */
    }
    .flower-item {
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #fafafa;
        padding: 15px; /* Giảm padding để nội dung gọn hơn */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }
    .flower-item:hover {
        transform: translateY(-3px); /* Hiệu ứng hover nhẹ hơn */
    }
    h2 {
        font-size: 18px;
        margin-bottom: 8px; /* Giảm khoảng cách giữa tiêu đề và mô tả */
        color: #444;
    }
    p {
        font-size: 14px;
        color: #666;
        line-height: 1.4;
        margin-bottom: 8px; /* Giảm khoảng cách giữa mô tả và ảnh */
    }
    .flower-image {
        width: 100%;
        height: auto; /* Đảm bảo ảnh hiển thị đầy đủ */
        max-height: 250px; /* Giới hạn chiều cao tối đa */
        object-fit: contain; /* Hiển thị toàn bộ ảnh mà không bị cắt */
        border-radius: 5px;
    }
</style>



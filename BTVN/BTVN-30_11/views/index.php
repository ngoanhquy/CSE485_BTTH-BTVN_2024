<!DOCTYPE html>
<html>
<head>
    <title>Danh sách sản phẩm</title>
</head>
<body>
    <h1>Danh sách sản phẩm</h1>
    <a href="index.php?controller=ProductsController&action=create">Thêm sản phẩm mới</a>
    <table border="1">
        <tr>
            <th>#</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($products as $product): ?>
        <tr>
            <td><?= htmlspecialchars($product['id']) ?></td>
            <td><?= htmlspecialchars($product['name']) ?></td>
            <td><?= htmlspecialchars($product['price']) ?> VND</td>
            <td>
            <form action="index.php?controller=ProductsController&action=update" method="GET" style="display:inline;">
    <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>">
    <button type="submit">Sửa</button>
</form>


                <form action="index.php?controller=ProductsController&action=delete" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>">
                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

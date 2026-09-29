<?php
// Thông tin kết nối cơ sở dữ liệu
$host = 'localhost';
$db   = 'my_guitar_shop1';
$user = 'root';
$pass = '';
$dsn  = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Dữ liệu cần cập nhật cho danh mục
    $category_id = 2; // ID danh mục cần sửa
    $new_name = 'Guitar Acoustic Mới'; // Tên mới

    // Câu lệnh SQL UPDATE
    $sql = "UPDATE categories SET categoryName = :category_name WHERE categoryID = :category_id";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'category_name' => $new_name,
        'category_id'   => $category_id
    ]);

    echo "Cập nhật danh mục thành công!";

} catch (PDOException $e) {
    echo "Lỗi cập nhật: " . $e->getMessage();
}
?>

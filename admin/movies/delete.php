<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once(__DIR__ . '/../../dbconnect.php');

$movies_id = $_GET['movies_id'];
$sqlSelect = "SELECT * FROM movies WHERE id = $movies_id;";
// var_dump($sqlSelect);die;

$resultSelect = mysqli_query($conn, $sqlSelect);
$moviesRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);
// var_dump($moviesRow);die;
$upload_dir = __DIR__ . "/../../assets/images/";

// Kiểm tra nếu file có tổn tại thì xóa file đi
$old_file = $upload_dir . $moviesRow['image'];
if (file_exists($old_file)) {
    // Hàm unlink(filepath) dùng để xóa file trong PHP
    unlink($old_file);
}

$movies_id = $_GET['movies_id'];
$sqlDelete = "DELETE FROM movies WHERE id=" . $movies_id;
// var_dump($sqlDelete);die;

// 5. Thực thi câu lệnh DELETE
$result = mysqli_query($conn, $sqlDelete);

// 6. Đóng kết nối
mysqli_close($conn);

// Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
header('location:index.php');
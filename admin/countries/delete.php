<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once(__DIR__ . '/../../dbconnect.php');

$countries_id = $_GET['countries_id'];
$sqlDelete = "DELETE FROM countries WHERE id=" . $countries_id;
// var_dump($sqlDelete);die;

// 5. Thực thi câu lệnh DELETE
$result = mysqli_query($conn, $sqlDelete);

// 6. Đóng kết nối
mysqli_close($conn);

// Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
header('location:index.php');
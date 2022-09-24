<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once(__DIR__ . '/../../dbconnect.php');

$episodes_id = $_GET['episodes_id'];
$sqlSelect = "SELECT * FROM episodes WHERE id= $episodes_id;";
// var_dump($sqlSelect);die;
$resultSelect = mysqli_query($conn, $sqlSelect);
$episodesRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);
// var_dump($episodesRow);die;

$upload_dir = __DIR__ . "/../../xem-phim/link-phim/";

$old_file = $upload_dir . $episodesRow['linkphim'];
if (file_exists($old_file)) {
    unlink($old_file);
}
$episodes_id = $_GET['episodes_id'];
$sqlDelete = "DELETE FROM episodes WHERE id=" . $episodes_id;

$result = mysqli_query($conn, $sqlDelete);

mysqli_close($conn);

header('location:index.php');
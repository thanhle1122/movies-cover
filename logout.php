<?php
if (session_id() === '') {
    session_start();
}
include_once __DIR__ . '/../../dbconnect.php';

session_destroy();

header('location: index.php')
?>
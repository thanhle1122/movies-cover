<?php
if (session_id() === '') {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Thanh Moives</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="/web-xem-phim/assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/web-xem-phim/assets/css/style.css" rel="stylesheet" type="text/css" media="all" />

    <link href="/web-xem-phim/assets/css/jquery.slidey.min.css" rel="stylesheet">

    <script type="text/javascript" src="/web-xem-phim/assets/js/jquery-2.1.4.min.js"></script>

    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="/web-xem-phim/assets/js/easing.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/web-xem-phim/thong-tin-phim/assets/css/style.css" rel="stylesheet" type="text/css" media="all">
    <?php include_once(__DIR__ . '/../../frontend/layouts/styles.php'); ?>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <div class="container">
            <div class="w3layouts_logo">
                <a href="/web-xem-phim/index.php">
                    <h1>Thanh<span>Movies</span></h1>
                </a>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- End Header -->

    <!-- Main -->
    <main role="main" class="mb-2">
        <!-- Block content -->
        <div class="container mt-2">
            <div class="full borderf">
                <h1 class="tieu-de">Quản lý Sửa Thể loại Phim</h1>
            </div>
            <?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            // 1. Mở kết nối
            include_once __DIR__ . '/../../dbconnect.php';
            // 2. Chuẩn bị câu lệnh
            $genres_id = $_GET['genres_id'];
            $sqlSelect = "SELECT * FROM genres WHERE id = $genres_id;";
            // 3. Thực thi câu lệnh
            $resultSelect = mysqli_query($conn, $sqlSelect);
            // 4. Phân tách dữ liệu
            $genresRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);
            // var_dump($genresRow); die;
            ?>
        </div>

        <div class="container">
            <div class="full borderf">
                <h3 class="text-movies">Sửa Thể loại Phim</h3>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <form name="frmThemMoi" id="frmThemMoi" method="post" action="" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="genres_title">Tên Thể Loại Phim</label>
                                <input type="text" class="form-control" id="genres_title" name="genres_title" placeholder="Tên Thể Loại Phim" value="<?= $genresRow['title_genre'] ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="genres_status">Tình trạng Thể Loại Phim</label>
                                <select class="form-control" id="genres_status" name="genres_status">
                                    <option value="<?= $genresRow['status'] = 1 ?>">Đã duyệt</option>
                                    <option value="<?= $genresRow['status'] = 2 ?>">Chưa duyệt</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="genres_description">Mô tả Thể Loại Phim</label>
                                <textarea class="form-control" id="genres_description" name="genres_description" placeholder="Mô tả Thể Loại Phim" rows="10"><?= $genresRow['description'] ?></textarea>
                            </div>
                        </div>
                        <a href="/web-xem-phim/admin/genres/index.php" class="btn btn-success">Quay về</a>
                        <button class="btn btn-primary" name="btnLuu">Lưu dữ liệu</button>
                    </form>
                </div>
            </div>

            <!-- End Form -->

            <?php
            // Hiển thị tất cả lỗi trong PHP
            // Chỉ nên hiển thị lỗi khi đang trong môi trường Phát triển (Development)
            // Không nên hiển thị lỗi trên môi trường Triển khai (Production)
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            include_once(__DIR__ . '/../../dbconnect.php');
            if (isset($_POST['btnLuu'])) {
                $genres_title = $_POST['genres_title'];
                $genres_status = $_POST['genres_status'];
                $genres_description = $_POST['genres_description'];

                $errors = [];
                // -- Validate Tên Thể Loại Phim
                // required
                if (empty($genres_title)) {
                    $errors['genres_title'][] = [
                        'rule' => 'required',
                        'rule_value' => true,
                        'value' => $genres_title,
                        'msg' => 'Vui lòng nhập Tên Thể Loại Phim'
                    ];
                }
                // minlength 3
                else if (!empty($genres_title) && strlen($genres_title) < 3) {
                    $errors['genres_title'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 3,
                        'value' => $genres_title,
                        'msg' => 'Tên Thể Loại Phim phải có ít nhất 3 ký tự'
                    ];
                }
                // maxlength 50
                else if (!empty($genres_title) && strlen($genres_title) > 50) {
                    $errors['genres_title'][] = [
                        'rule' => 'maxlength',
                        'rule_value' => 50,
                        'value' => $genres_title,
                        'msg' => 'Tên Thể Loại Phim không được vượt quá 50 ký tự'
                    ];
                }

                // -- Validate Tình trạng Thể Loại Phim
                // required
                if (empty($genres_status)) {
                    $errors['genres_status'][] = [
                        'rule' => 'required',
                        'rule_value' => true,
                        'value' => $genres_status,
                        'msg' => 'Vui lòng nhập Tình trạng Thể Loại Phim'
                    ];
                }
                // minlength 1
                else if (!empty($genres_status) && strlen($genres_status) < 1) {
                    $errors['genres_status'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 1,
                        'value' => $genres_status,
                        'msg' => 'Tình trạng Thể Loại Phim phải có ít nhất 1 ký tự'
                    ];
                }
                // maxlength 1
                else if (!empty($genres_status) && strlen($genres_status) > 256) {
                    $errors['genres_status'][] = [
                        'rule' => 'maxlength',
                        'rule_value' => 256,
                        'value' => $genres_status,
                        'msg' => 'Tình trạng Thể Loại Phim không được vượt quá 256 ký tự'
                    ];
                }

                // -- Validate Mô tả Thể Loại Phim
                // required
                if (empty($genres_description)) {
                    $errors['genres_description'][] = [
                        'rule' => 'required',
                        'rule_value' => true,
                        'value' => $genres_description,
                        'msg' => 'Vui lòng nhập Mô tả Thể Loại Phim'
                    ];
                }
                // minlength 3
                else if (!empty($genres_description) && strlen($genres_description) < 1) {
                    $errors['genres_description'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 1,
                        'value' => $genres_description,
                        'msg' => 'Mô tả Phim phải có ít nhất 1 ký tự'
                    ];
                }
                // maxlength 65000
                else if (!empty($genres_description) && strlen($genres_description) > 100000) {
                    $errors['genres_description'][] = [
                        'rule' => 'maxlength',
                        'rule_value' => 100000,
                        'value' => $genres_description,
                        'msg' => 'Mô tả Phim không được vượt quá 100000 ký tự'
                    ];
                }
            }
            ?>

            <?php if (
                isset($_POST['btnLuu'])   // Nếu người dùng có bấm nút "Lưu dữ liệu"
                && isset($errors)         // Nếu biến $errors có tồn tại
                && (!empty($errors))      // Nếu giá trị của biến $errors không rỗng
            ) : ?>
                <div class="general">
                    <div id="errors-container" class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul>
                            <?php foreach ($errors as $fields) : ?>
                                <?php foreach ($fields as $field) : ?>
                                    <li><?php echo $field['msg']; ?></li>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>

            <?php
            if (
                isset($_POST['btnLuu'])  // Nếu người dùng có bấm nút "Lưu dữ liệu"
                && (!isset($errors) || (empty($errors))) // Nếu biến $errors không tồn tại Hoặc giá trị của biến $errors rỗng
            ) {
                // 4. Chuẩn bị câu lệnh SQL
                $sqlSuaTheLoaiPhim = <<<EOT
                UPDATE genres
                SET 
                    title_genre = '$genres_title',
                    description = '$genres_description',
                    status = '$genres_status'
                WHERE id = $genres_id
EOT;
                // 5. Thực thi câu truy vấn SQL để lấy về dữ liệu
                mysqli_query($conn, $sqlSuaTheLoaiPhim) or die("<b>Có lỗi khi thực thi câu lệnh SQL: </b>" . mysqli_error($conn) . "<br /><b>Câu lệnh vừa thực thi:</b></br>$sqlSuaTheLoaiPhim");

                // 6. Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
                // Điều hướng bằng Javascript
                echo '<script>location.href = "index.php";</script>';
            }

            ?>
        </div>

    </main>

    <?php include_once(__DIR__ . '/../../frontend/layouts/scripts.php'); ?>
    <!-- Footer -->
    <?php include_once __DIR__ . '/../../admin/footer.php' ?>

</body>

</html>
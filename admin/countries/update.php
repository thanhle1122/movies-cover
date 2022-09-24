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
                <h1 class="tieu-de">Quản lý Sửa Quốc gia Phim</h1>
            </div>
            <?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            // 1. Mở kết nối
            include_once __DIR__ . '/../../dbconnect.php';
            // 2. Chuẩn bị câu lệnh
            $countries_id = $_GET['countries_id'];
            $sqlSelect = "SELECT * FROM countries WHERE id = $countries_id;";
            // 3. Thực thi câu lệnh
            $resultSelect = mysqli_query($conn, $sqlSelect);
            // 4. Phân tách dữ liệu
            $countriesRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);
            // var_dump($countriesRow); die;
            ?>
        </div>

        <div class="container">
            <div class="full borderf">
                <h3 class="text-movies">Sửa Quốc gia Phim</h3>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <form name="frmThemMoi" id="frmThemMoi" method="post" action="" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="countries_title">Tên Quốc gia Phim</label>
                                <input type="text" class="form-control" id="countries_title" name="countries_title" placeholder="Tên Quốc gia Phim" value="<?= $countriesRow['title'] ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="countries_status">Tình trạng Quốc gia Phim</label>
                                <select class="form-control" id="countries_status" name="countries_status">
                                    <option value="<?= $countriesRow['status'] = 1 ?>">Đã duyệt</option>
                                    <option value="<?= $countriesRow['status'] = 2 ?>">Chưa duyệt</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="countries_description">Mô tả Quốc gia Phim</label>
                                <textarea class="form-control" id="countries_description" name="countries_description" placeholder="Mô tả Quốc gia Phim" rows="10"><?= $countriesRow['description'] ?></textarea>
                            </div>
                        </div>
                        <a href="/web-xem-phim/admin/countries/index.php" class="btn btn-success">Quay về</a>
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
                $countries_title = $_POST['countries_title'];
                $countries_status = $_POST['countries_status'];
                $countries_description = $_POST['countries_description'];

                $errors = [];
                // -- Validate Tên Quốc gia Phim
                // required
                if (empty($countries_title)) {
                    $errors['countries_title'][] = [
                        'rule' => 'required',
                        'rule_value' => true,
                        'value' => $countries_title,
                        'msg' => 'Vui lòng nhập Tên Quốc gia Phim'
                    ];
                }
                // minlength 3
                else if (!empty($countries_title) && strlen($countries_title) < 3) {
                    $errors['countries_title'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 3,
                        'value' => $countries_title,
                        'msg' => 'Tên Quốc gia Phim phải có ít nhất 3 ký tự'
                    ];
                }
                // maxlength 50
                else if (!empty($countries_title) && strlen($countries_title) > 50) {
                    $errors['countries_title'][] = [
                        'rule' => 'maxlength',
                        'rule_value' => 50,
                        'value' => $countries_title,
                        'msg' => 'Tên Quốc gia Phim không được vượt quá 50 ký tự'
                    ];
                }

                // -- Validate Tình trạng Quốc gia Phim
                // required
                if (empty($countries_status)) {
                    $errors['countries_status'][] = [
                        'rule' => 'required',
                        'rule_value' => true,
                        'value' => $countries_status,
                        'msg' => 'Vui lòng nhập Tình trạng Quốc gia Phim'
                    ];
                }
                // minlength 1
                else if (!empty($countries_status) && strlen($countries_status) < 1) {
                    $errors['countries_status'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 1,
                        'value' => $countries_status,
                        'msg' => 'Tình trạng Quốc gia Phim phải có ít nhất 1 ký tự'
                    ];
                }
                // maxlength 1
                else if (!empty($countries_status) && strlen($countries_status) > 256) {
                    $errors['countries_status'][] = [
                        'rule' => 'maxlength',
                        'rule_value' => 256,
                        'value' => $countries_status,
                        'msg' => 'Tình trạng Quốc gia Phim không được vượt quá 256 ký tự'
                    ];
                }

                // -- Validate Mô tả Quốc gia Phim
                // required
                if (empty($countries_description)) {
                    $errors['countries_description'][] = [
                        'rule' => 'required',
                        'rule_value' => true,
                        'value' => $countries_description,
                        'msg' => 'Vui lòng nhập Mô tả Quốc gia Phim'
                    ];
                }
                // minlength 3
                else if (!empty($countries_description) && strlen($countries_description) < 1) {
                    $errors['countries_description'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 1,
                        'value' => $countries_description,
                        'msg' => 'Mô tả Phim phải có ít nhất 1 ký tự'
                    ];
                }
                // maxlength 65000
                else if (!empty($countries_description) && strlen($countries_description) > 100000) {
                    $errors['countries_description'][] = [
                        'rule' => 'maxlength',
                        'rule_value' => 100000,
                        'value' => $countries_description,
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
                $sqlSuaQuocGiaPhim = <<<EOT
                UPDATE countries
                SET 
                    title = '$countries_title',
                    description = '$countries_description',
                    status = '$countries_status'
                WHERE id = $countries_id
EOT;
                // 5. Thực thi câu truy vấn SQL để lấy về dữ liệu
                mysqli_query($conn, $sqlSuaQuocGiaPhim) or die("<b>Có lỗi khi thực thi câu lệnh SQL: </b>" . mysqli_error($conn) . "<br /><b>Câu lệnh vừa thực thi:</b></br>$sqlSuaQuocGiaPhim");

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
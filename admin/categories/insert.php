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
                <h1 class="tieu-de">Quản lý Thêm Danh mục Phim</h1>
            </div>
            <?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            // 1. Mở kết nối
            include_once __DIR__ . '/../../dbconnect.php';
            // 2. Chuẩn bị câu lệnh
            $sqlDanhMuc = "
                SELECT * 
                FROM categories 
            ";
            // 3. Thực thi câu lệnh
            $resultDanhMuc = mysqli_query($conn, $sqlDanhMuc);
            // 4. Phân tách dữ liệu
            $dataDanhMuc = [];
            while ($item = mysqli_fetch_array($resultDanhMuc, MYSQLI_ASSOC)) {
                $dataDanhMuc[] = array(
                    'categories_id' => $item['id'],
                    'categories_title' => $item['title'],
                    'categories_description' => $item['description'],
                    'categories_status' => $item['status'],
                );
            }
            // var_dump($dataDanhMuc); die;
            ?>
        </div>

        <div class="container">
            <div class="full borderf">
                <h3 class="text-movies">Thêm Danh mục Phim</h3>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <form name="frmThemMoi" id="frmThemMoi" method="post" action="" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="categories_title">Tên Danh mục Phim</label>
                                <input type="text" class="form-control" id="categories_title" name="categories_title" placeholder="Tên Danh mục Phim" value="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="categories_status">Tình trạng Danh mục Phim</label>
                                <select class="form-control" id="categories_status" name="categories_status">
                                    <option value="<?= $dataPhim['categories_status'] = 1 ?>">Đã duyệt</option>
                                    <option value="<?= $dataPhim['categories_status'] = 2 ?>">Chưa duyệt</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="categories_description">Mô tả Danh mục Phim</label>
                                <textarea class="form-control" id="categories_description" name="categories_description" placeholder="Mô tả Danh mục Phim" rows="10"></textarea>
                            </div>
                        </div>
                        <a href="/web-xem-phim/admin/categories/index.php" class="btn btn-success">Quay về</a>
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
                $categories_title = $_POST['categories_title'];
                $categories_status = $_POST['categories_status'];
                $categories_description = $_POST['categories_description'];

                $errors = [];
                // -- Validate Tên Danh mục Phim
                // required
                if (empty($categories_title)) {
                    $errors['categories_title'][] = [
                        'rule' => 'required',
                        'rule_value' => true,
                        'value' => $categories_title,
                        'msg' => 'Vui lòng nhập Tên Danh mục Phim'
                    ];
                }
                // minlength 3
                else if (!empty($categories_title) && strlen($categories_title) < 3) {
                    $errors['categories_title'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 3,
                        'value' => $categories_title,
                        'msg' => 'Tên Danh mục Phim phải có ít nhất 3 ký tự'
                    ];
                }
                // maxlength 50
                else if (!empty($categories_title) && strlen($categories_title) > 50) {
                    $errors['categories_title'][] = [
                        'rule' => 'maxlength',
                        'rule_value' => 50,
                        'value' => $categories_title,
                        'msg' => 'Tên Danh mục Phim không được vượt quá 50 ký tự'
                    ];
                }

                // -- Validate Tình trạng Danh mục Phim
                // required
                if (empty($categories_status)) {
                    $errors['categories_status'][] = [
                        'rule' => 'required',
                        'rule_value' => true,
                        'value' => $categories_status,
                        'msg' => 'Vui lòng nhập Tình trạng Danh mục Phim'
                    ];
                }
                // minlength 1
                else if (!empty($categories_status) && strlen($categories_status) < 1) {
                    $errors['categories_status'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 1,
                        'value' => $categories_status,
                        'msg' => 'Tình trạng Danh mục Phim phải có ít nhất 1 ký tự'
                    ];
                }
                // maxlength 1
                else if (!empty($categories_status) && strlen($categories_status) > 256) {
                    $errors['categories_status'][] = [
                        'rule' => 'maxlength',
                        'rule_value' => 256,
                        'value' => $categories_status,
                        'msg' => 'Tình trạng Danh mục Phim không được vượt quá 256 ký tự'
                    ];
                }

                // -- Validate Mô tả Danh mục Phim
                // required
                if (empty($categories_description)) {
                    $errors['categories_description'][] = [
                        'rule' => 'required',
                        'rule_value' => true,
                        'value' => $categories_description,
                        'msg' => 'Vui lòng nhập Mô tả Danh mục Phim'
                    ];
                }
                // minlength 3
                else if (!empty($categories_description) && strlen($categories_description) < 1) {
                    $errors['categories_description'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 1,
                        'value' => $categories_description,
                        'msg' => 'Mô tả Phim phải có ít nhất 1 ký tự'
                    ];
                }
                // maxlength 65000
                else if (!empty($categories_description) && strlen($categories_description) > 100000) {
                    $errors['categories_description'][] = [
                        'rule' => 'maxlength',
                        'rule_value' => 100000,
                        'value' => $categories_description,
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
                $sqlThemMoiDanhMuc = <<<EOT
                INSERT INTO categories(title, description, status)
                VALUES ('$categories_title', '$categories_description', '$categories_status');
EOT;
                // 5. Thực thi câu truy vấn SQL để lấy về dữ liệu
                mysqli_query($conn, $sqlThemMoiDanhMuc) or die("<b>Có lỗi khi thực thi câu lệnh SQL: </b>" . mysqli_error($conn) . "<br /><b>Câu lệnh vừa thực thi:</b></br>$sqlThemMoiDanhMuc");

                // 6. Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
                // Điều hướng bằng Javascript
                echo '<script>location.href = "index.php";</script>';
            }

            ?>
        </div>

    </main>

    <script>
        // Hiển thị ảnh preview (xem trước) khi người dùng chọn Ảnh
        const reader = new FileReader();
        const fileInput = document.getElementById("movies_image");
        const img = document.getElementById("preview-img");
        reader.onload = e => {
            img.src = e.target.result;
        }
        fileInput.addEventListener('change', e => {
            const f = e.target.files[0];
            reader.readAsDataURL(f);
        })
    </script>

    <?php include_once(__DIR__ . '/../../frontend/layouts/scripts.php'); ?>
    <!-- Footer -->
    <?php include_once __DIR__ . '/../../admin/footer.php' ?>

</body>

</html>
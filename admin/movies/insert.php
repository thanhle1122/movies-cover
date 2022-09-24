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
                <h1 class="tieu-de">Quản lý Thêm Danh sách Phim</h1>
            </div>
            <?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            // 1. Mở kết nối
            include_once __DIR__ . '/../../dbconnect.php';
            // 2. Chuẩn bị câu lệnh
            $sqlPhim = "
            SELECT * 
            FROM movies
            ";
            // 3. Thực thi câu lệnh
            $resultPhim = mysqli_query($conn, $sqlPhim);
            // 4. Phân tách dữ liệu
            $dataPhim = [];
            while ($item = mysqli_fetch_array($resultPhim, MYSQLI_ASSOC)) {
                $dataPhim[] = array(
                    'movies_id' => $item['id'],
                    'movies_title' => $item['title_movie'],
                    'movies_description' => $item['description'],
                    'movies_status' => $item['status'],
                    'movies_image' => $item['image'],
                    'movies_year' => $item['year'],
                    'movies_list_episodes' => $item['list_episodes'],
                    'movies_category_id' => $item['category_id'],
                    'movies_genre_id' => $item['genre_id'],
                    'movies_country_id' => $item['country_id'],
                );
            }
            // var_dump($dataPhim); die;
            ?>
        </div>

        <div class="container">
            <div class="full borderf">
                <h3 class="text-movies">Thêm Danh sách Phim</h3>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <form name="frmThemMoi" id="frmThemMoi" method="post" action="" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-8">
                                <label for="movies_title">Tên Phim</label>
                                <input type="text" class="form-control" id="movies_title" name="movies_title" placeholder="Tên Phim" value="">
                            </div>
                            <div class="form-group col-4">
                                <label for="movies_list_episodes">Số tập Phim</label>
                                <input type="number" class="form-control" id="movies_list_episodes" name="movies_list_episodes" placeholder="Số tập Phim" value="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-8">
                                <label for="movies_status">Tình trạng Phim</label>
                                <select class="form-control" id="movies_status" name="movies_status">
                                    <option value="<?= $dataPhim['movies_status'] = 1 ?>">Đang tiến hành</option>
                                    <option value="<?= $dataPhim['movies_status'] = 2 ?>">Hoàn thành</option>
                                </select>
                            </div>
                            <div class="form-group col-4">
                                <label for="movies_year">Năm phát hành Phim</label>
                                <input type="number" class="form-control" id="movies_year" name="movies_year" placeholder="Năm phát hành Phim" value="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="movies_category_id">Sắp xếp theo Phim</label>
                                <select class="form-control" id="movies_category_id" name="movies_category_id">
                                    <option value="<?= $dataPhim['movies_category_id'] = 1 ?>">Phim đề cử</option>
                                    <option value="<?= $dataPhim['movies_category_id'] = 2 ?>">Phim mới cập nhật</option>
                                    <option value="<?= $dataPhim['movies_category_id'] = 3 ?>">Phim phổ biến</option>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="movies_genre_id">Thể loại Phim</label>
                                <select class="form-control" id="movies_genre_id" name="movies_genre_id">
                                    <option value="<?= $dataPhim['movies_genre_id'] = 1 ?>">Anime</option>
                                    <option value="<?= $dataPhim['movies_genre_id'] = 34 ?>">CN Animation</option>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label for="movies_country_id">Quốc gia Phim</label>
                                <select class="form-control" id="movies_country_id" name="movies_country_id">
                                    <option value="<?= $dataPhim['movies_country_id'] = 1 ?>">Nhật Bản</option>
                                    <option value="<?= $dataPhim['movies_country_id'] = 2 ?>">Trung Quốc</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="movies_image">Hình đại diện Phim</label>

                                <!-- Tạo khung div hiển thị ảnh cho người dùng Xem trước khi upload file lên Server -->
                                <div class="preview-img-container text-center">
                                    <img src="/web-xem-phim/assets/images/default-image_600.png" id="preview-img" width="200px" height="215px" />
                                </div>

                                <!-- Input cho phép người dùng chọn FILE 
                                Chỉ cho phép người dùng chọn các file Ảnh (*.jpg, *.jpeg, *.png, *.gif)
                                -->
                                <input type="file" class="form-control" id="movies_image" name="movies_image" accept=".jpg, .jpeg, .png, .gif">
                            </div>
                            <div class="form-group col">
                                <label for="movies_description">Mô tả cốt truyện Phim</label>
                                <textarea class="form-control" id="movies_description" name="movies_description" placeholder="Mô tả cốt truyện Phim" rows="10"></textarea>
                            </div>
                        </div>
                        <a href="/web-xem-phim/admin/movies/index.php" class="btn btn-success">Quay về</a>
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
                $movies_title = $_POST['movies_title'];
                $movies_list_episodes = $_POST['movies_list_episodes'];
                $movies_status = $_POST['movies_status'];
                $movies_description = $_POST['movies_description'];
                $movies_category_id = $_POST['movies_category_id'];
                $movies_genre_id = $_POST['movies_genre_id'];
                $movies_country_id = $_POST['movies_country_id'];
                $movies_year = $_POST['movies_year'];

                $errors = [];
                // -- Validate Tên Phim
                // required
                if (empty($movies_title)) {
                    $errors['movies_title'][] = [
                        'rule' => 'required',
                        'rule_value' => true,
                        'value' => $movies_title,
                        'msg' => 'Vui lòng nhập Tên Phim'
                    ];
                }
                // minlength 3
                else if (!empty($movies_title) && strlen($movies_title) < 3) {
                    $errors['movies_title'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 3,
                        'value' => $movies_title,
                        'msg' => 'Tên Phim phải có ít nhất 3 ký tự'
                    ];
                }
                // maxlength 50
                else if (!empty($movies_title) && strlen($movies_title) > 50) {
                    $errors['movies_title'][] = [
                        'rule' => 'maxlength',
                        'rule_value' => 50,
                        'value' => $movies_title,
                        'msg' => 'Tên Phim không được vượt quá 50 ký tự'
                    ];
                }

                // -- Validate Tình trạng Phim
                // required
                if (empty($movies_status)) {
                    $errors['movies_status'][] = [
                        'rule' => 'required',
                        'rule_value' => true,
                        'value' => $movies_status,
                        'msg' => 'Vui lòng nhập Tình trạng Phim'
                    ];
                }
                // minlength 1
                else if (!empty($movies_status) && strlen($movies_status) < 1) {
                    $errors['movies_status'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 1,
                        'value' => $movies_status,
                        'msg' => 'Tình trạng Phim phải có ít nhất 1 ký tự'
                    ];
                }
                // maxlength 1
                else if (!empty($movies_status) && strlen($movies_status) > 1) {
                    $errors['movies_status'][] = [
                        'rule' => 'maxlength',
                        'rule_value' => 1,
                        'value' => $movies_status,
                        'msg' => 'Tình trạng Phim không được vượt quá 1 ký tự'
                    ];
                }

                // -- Validate Số tập Phim
                // required
                if (empty($movies_list_episodes)) {
                    $errors['movies_list_episodes'][] = [
                        'rule' => 'required',
                        'rule_value' => true,
                        'value' => $movies_list_episodes,
                        'msg' => 'Vui lòng nhập Số tập Phim'
                    ];
                }
                // minlength 3
                else if (!empty($movies_list_episodes) && strlen($movies_list_episodes) < 1) {
                    $errors['movies_list_episodes'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 1,
                        'value' => $movies_list_episodes,
                        'msg' => 'Số tập Phim phải có ít nhất 1 ký tự'
                    ];
                }
                // maxlength 50
                else if (!empty($movies_list_episodes) && strlen($movies_list_episodes) > 2000) {
                    $errors['movies_list_episodes'][] = [
                        'rule' => 'maxlength',
                        'rule_value' => 2000,
                        'value' => $movies_list_episodes,
                        'msg' => 'Số tập Phim không được vượt quá 2000 ký tự'
                    ];
                }

                // -- Validate Mô tả cốt truyện Phim
                // required
                if (empty($movies_description)) {
                    $errors['movies_description'][] = [
                        'rule' => 'required',
                        'rule_value' => true,
                        'value' => $movies_description,
                        'msg' => 'Vui lòng nhập Mô tả cốt truyện Phim'
                    ];
                }
                // minlength 3
                else if (!empty($movies_description) && strlen($movies_description) < 1) {
                    $errors['movies_description'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 1,
                        'value' => $movies_description,
                        'msg' => 'Mô tả Phim phải có ít nhất 1 ký tự'
                    ];
                }
                // maxlength 65000
                else if (!empty($movies_description) && strlen($movies_description) > 100000) {
                    $errors['movies_description'][] = [
                        'rule' => 'maxlength',
                        'rule_value' => 100000,
                        'value' => $movies_description,
                        'msg' => 'Mô tả Phim không được vượt quá 100000 ký tự'
                    ];
                }
                // -- Validate Sắp xếp phim
                // required
                if (empty($movies_category_id)) {
                    $errors['movies_category_id'][] = [
                        'rule' => 'required',
                        'rule_value' => true,
                        'value' => $movies_category_id,
                        'msg' => 'Vui lòng nhập Sắp xếp phim'
                    ];
                }
                // minlength 3
                else if (!empty($movies_category_id) && strlen($movies_category_id) < 1) {
                    $errors['movies_category_id'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 1,
                        'value' => $movies_category_id,
                        'msg' => 'Sắp xếp phim phải có ít nhất 1 ký tự'
                    ];
                }
                // maxlength 50
                else if (!empty($movies_category_id) && strlen($movies_category_id) > 50) {
                    $errors['movies_category_id'][] = [
                        'rule' => 'maxlength',
                        'rule_value' => 50,
                        'value' => $movies_category_id,
                        'msg' => 'Sắp xếp phim không được vượt quá 50 ký tự'
                    ];
                }
                // -- Validate Thể loại phim
                // required
                if (empty($movies_genre_id)) {
                    $errors['movies_genre_id'][] = [
                        'rule' => 'required',
                        'rule_value' => true,
                        'value' => $movies_genre_id,
                        'msg' => 'Vui lòng nhập Thể loại phim'
                    ];
                }
                // minlength 3
                else if (!empty($movies_genre_id) && strlen($movies_genre_id) < 1) {
                    $errors['movies_genre_id'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 1,
                        'value' => $movies_genre_id,
                        'msg' => 'Thể loại phim phải có ít nhất 1 ký tự'
                    ];
                }
                // maxlength 50
                else if (!empty($movies_genre_id) && strlen($movies_genre_id) > 3) {
                    $errors['movies_genre_id'][] = [
                        'rule' => 'maxlength',
                        'rule_value' => 3,
                        'value' => $movies_genre_id,
                        'msg' => 'Thể loại Phim không được vượt quá 3 ký tự'
                    ];
                }
                // -- Validate Quốc gia Phim
                // required
                if (empty($movies_country_id)) {
                    $errors['movies_country_id'][] = [
                        'rule' => 'required',
                        'rule_value' => true,
                        'value' => $movies_country_id,
                        'msg' => 'Vui lòng nhập Quốc gia Phim'
                    ];
                }
                // minlength 3
                else if (!empty($movies_country_id) && strlen($movies_country_id) < 1) {
                    $errors['movies_country_id'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 1,
                        'value' => $movies_country_id,
                        'msg' => 'Quốc gia Phim phải có ít nhất 1 ký tự'
                    ];
                }
                // maxlength 50
                else if (!empty($movies_country_id) && strlen($movies_country_id) > 100) {
                    $errors['movies_country_id'][] = [
                        'rule' => 'maxlength',
                        'rule_value' => 100,
                        'value' => $movies_country_id,
                        'msg' => 'Quốc gia Phim không được vượt quá 100 ký tự'
                    ];
                }

                // -- Validate File hình ảnh đại diện
                // Thu thập thông tin về FILES
                // Nếu người dùng có chọn file để upload
                if (isset($_FILES['movies_image'])) {
                    if ($_FILES['movies_image']['error'] > 0) {
                        // File Upload Bị Lỗi
                        $fileError = $_FILES["movies_image"]["error"];

                        // Tùy thuộc vào giá trị lỗi mà chúng ta sẽ trả về câu thông báo lỗi thân thiện cho người dùng...
                        switch ($fileError) {
                            case UPLOAD_ERR_OK: // 0
                                break;
                            case UPLOAD_ERR_INI_SIZE:
                                // Exceeds max size in php.ini
                                $errors['movies_image'][] = [
                                    'rule' => 'max_size',
                                    'rule_value' => '5Mb',
                                    'value' => $_FILES["movies_image"]["tmp_name"],
                                    'msg' => 'File bạn upload có dung lượng quá lớn. Vui lòng upload file không vượt quá 5Mb...'
                                ];
                                break;
                            case UPLOAD_ERR_PARTIAL:
                                // Exceeds max size in html form
                                $errors['movies_image'][] = [
                                    'rule' => 'max_size',
                                    'rule_value' => '5Mb',
                                    'value' => $_FILES["movies_image"]["tmp_name"],
                                    'msg' => 'File bạn upload có dung lượng quá lớn. Vui lòng upload file không vượt quá 5Mb...'
                                ];
                                break;
                            case UPLOAD_ERR_NO_FILE:
                                // No file was uploaded
                                $errors['movies_image'][] = [
                                    'rule' => 'no_file',
                                    'rule_value' => true,
                                    'value' => $_FILES["movies_image"]["tmp_name"],
                                    'msg' => 'Bạn chưa chọn file để upload...'
                                ];
                                break;
                            case UPLOAD_ERR_NO_TMP_DIR:
                                // No /tmp dir to write to
                                break;
                            case UPLOAD_ERR_CANT_WRITE:
                                // Error writing to disk
                                break;
                            case UPLOAD_ERR_EXTENSION:
                                // A PHP extension stopped the file upload
                                break;
                            default:
                                // No error was faced! Phew!
                                break;
                        }
                    } else {
                        // -- Validate trường hợp file Upload lên Server thành công mà bị sai về Loại file (file types)
                        // Nếu người dùng upload file khác *.jpg, *.jpeg, *.png, *.gif
                        // thì báo lỗi
                        $file_extension = pathinfo($_FILES['movies_image']["name"], PATHINFO_EXTENSION); // Lấy đuôi file (file extension) để so sánh
                        if (!($file_extension == 'jpg' || $file_extension == 'jpeg'
                            || $file_extension == 'png' || $file_extension == 'gif'
                        )) {
                            $errors['movies_image'][] = [
                                'rule' => 'file_extension',
                                'rule_value' => '.jpg, .jpeg, .png, .gif',
                                'value' => $_FILES['movies_image']["name"],
                                'msg' => 'Chỉ cho phép upload các định dạng (*.jpg, *.jpeg, *.png, *.gif)...'
                            ];
                        }

                        // -- Validate trường hợp file Upload lên Server thành công mà kích thước file quá lớn
                        $file_size = $_FILES['movies_image']["size"];
                        if ($file_size > (1024 * 1024 * 10)) { // 1 Mb = 1024 Kb = 1024 * 1024 Byte
                            $errors['movies_image'][] = [
                                'rule' => 'file_size',
                                'rule_value' => (1024 * 1024 * 10),
                                'value' => $_FILES['movies_image']["name"],
                                'msg' => 'Chỉ cho phép upload file nhỏ hơn 10Mb...'
                            ];
                        }
                    }
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
                $upload_dir = __DIR__ . "/../../assets/images/";

                $tentaptin = date('YmdHis') . '_' . $_FILES['movies_image']['name'];

                move_uploaded_file($_FILES['movies_image']['tmp_name'], $upload_dir . $tentaptin);

                // 4. Chuẩn bị câu lệnh SQL
                $sqlThemMoiPhim = <<<EOT
                INSERT INTO movies(title_movie, description, status, image, year, list_episodes, category_id, genre_id, country_id)
                VALUES ('$movies_title', '$movies_description', '$movies_status', '$tentaptin', '$movies_year', '$movies_list_episodes', '$movies_category_id', '$movies_genre_id', '$movies_country_id');
EOT;
                // 5. Thực thi câu truy vấn SQL để lấy về dữ liệu
                mysqli_query($conn, $sqlThemMoiPhim) or die("<b>Có lỗi khi thực thi câu lệnh SQL: </b>" . mysqli_error($conn) . "<br /><b>Câu lệnh vừa thực thi:</b></br>$sqlThemMoiPhim");

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
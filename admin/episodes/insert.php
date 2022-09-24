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
                <h1 class="tieu-de">Quản lý Thêm Tập Phim</h1>
            </div>
            <?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            // 1. Mở kết nối
            include_once __DIR__ . '/../../dbconnect.php';
            // 2. Chuẩn bị câu lệnh
            $sqlPhim = "
            SELECT id, title_movie
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
                );
            }
            // var_dump($dataPhim); die;
            ?>
        </div>

        <div class="container">
            <div class="full borderf">
                <h3 class="text-movies">Thêm Tập Phim</h3>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <form name="frmThemMoi" id="frmThemMoi" method="post" action="" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="movies_id">Tên Phim</label>
                                <select name="movies_id" id="movies_id" class="form-control">
                                    <option value="">Vui lòng chọn Phim</option>
                                    <?php foreach ($dataPhim as $dtp) : ?>
                                        <option value="<?= $dtp['movies_id'] ?>"><?= $dtp['movies_title'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="episodes_episode">Tập Phim</label>
                                <input type="number" class="form-control" id="episodes_episode" name="episodes_episode" placeholder="Tập Phim" value="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="episodes_linkphim">Link Phim</label>
                                <div class="preview-vid-container">
                                    <video width="50%" height="50%" loop="true" controls="controls" id="preview-vid" muted>
                                        <source src="/web-xem-phim/xem-phim/link-phim/placeholder-video.png" type="video/mp4">
                                    </video>
                                </div>
                                <input type="file" class="form-control" id="episodes_linkphim" name="episodes_linkphim" accept=".mp4">
                            </div>
                        </div>
                        <a href="/web-xem-phim/admin/episodes/index.php" class="btn btn-success">Quay về</a>
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
                $movies_id = $_POST['movies_id'];
                $episodes_episode = $_POST['episodes_episode'];

                $errors = [];
                // -- Validate Tên Phim
                // required
                if (empty($movies_id)) {
                    $errors['movies_id'][] = [
                        'rule' => 'required',
                        'rule_value' => true,
                        'value' => $movies_id,
                        'msg' => 'Vui lòng chọn Tên phim'
                    ];
                }
                // -- Validate Tập Phim
                // required
                if (empty($episodes_episode)) {
                    $errors['episodes_episode'][] = [
                        'rule' => 'required',
                        'rule_value' => true,
                        'value' => $episodes_episode,
                        'msg' => 'Vui lòng nhập Tập Phim'
                    ];
                }
                // minlength 3
                else if (!empty($episodes_episode) && strlen($episodes_episode) < 1) {
                    $errors['episodes_episode'][] = [
                        'rule' => 'minlength',
                        'rule_value' => 1,
                        'value' => $episodes_episode,
                        'msg' => 'Tập Phim phải có ít nhất 1 ký tự'
                    ];
                }
                // maxlength 65000
                else if (!empty($episodes_episode) && strlen($episodes_episode) > 200000) {
                    $errors['episodes_episode'][] = [
                        'rule' => 'maxlength',
                        'rule_value' => 200000,
                        'value' => $episodes_episode,
                        'msg' => 'Tập Phim không được vượt quá 200000 ký tự'
                    ];
                }

                if (isset($_FILES['episodes_linkphim'])) {
                    if ($_FILES['episodes_linkphim']['error'] > 0) {
                        // File Upload Bị Lỗi
                        $fileError = $_FILES["episodes_linkphim"]["error"];

                        // Tùy thuộc vào giá trị lỗi mà chúng ta sẽ trả về câu thông báo lỗi thân thiện cho người dùng...
                        switch ($fileError) {
                            case UPLOAD_ERR_OK: // 0
                                break;
                            case UPLOAD_ERR_INI_SIZE:
                                // Exceeds max size in php.ini
                                $errors['episodes_linkphim'][] = [
                                    'rule' => 'max_size',
                                    'rule_value' => '10240Mb',
                                    'value' => $_FILES["episodes_linkphim"]["tmp_name"],
                                    'msg' => 'File bạn upload có dung lượng quá lớn. Vui lòng upload file không vượt quá 10240Mb...'
                                ];
                                break;
                            case UPLOAD_ERR_PARTIAL:
                                // Exceeds max size in html form
                                $errors['episodes_linkphim'][] = [
                                    'rule' => 'max_size',
                                    'rule_value' => '10240Mb',
                                    'value' => $_FILES["episodes_linkphim"]["tmp_name"],
                                    'msg' => 'File bạn upload có dung lượng quá lớn. Vui lòng upload file không vượt quá 10240Mb...'
                                ];
                                break;
                            case UPLOAD_ERR_NO_FILE:
                                // // No file was uploaded
                                // $errors['episodes_linkphim'][] = [
                                //     'rule' => 'no_file',
                                //     'rule_value' => true,
                                //     'value' => $_FILES["episodes_linkphim"]["tmp_name"],
                                //     'msg' => 'Bạn chưa chọn file để upload...'
                                // ];
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
                        // Nếu người dùng upload file khác *.mp4
                        // thì báo lỗi
                        $file_extension = pathinfo($_FILES['episodes_linkphim']["name"], PATHINFO_EXTENSION); // Lấy đuôi file (file extension) để so sánh
                        if (!($file_extension == 'mp4'
                        )) {
                            $errors['episodes_linkphim'][] = [
                                'rule' => 'file_extension',
                                'rule_value' => '.mp4',
                                'value' => $_FILES['episodes_linkphim']["name"],
                                'msg' => 'Chỉ cho phép upload định dạng (*.mp4)...'
                            ];
                        }

                        // -- Validate trường hợp file Upload lên Server thành công mà kích thước file quá lớn
                        $file_size = $_FILES['episodes_linkphim']["size"];
                        if ($file_size > (1024 * 1024 * 10240)) { // 1 Mb = 1024 Kb = 1024 * 1024 Byte
                            $errors['episodes_linkphim'][] = [
                                'rule' => 'file_size',
                                'rule_value' => (1024 * 1024 * 10240),
                                'value' => $_FILES['episodes_linkphim']["name"],
                                'msg' => 'Chỉ cho phép upload file nhỏ hơn 10240Mb...'
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

                $upload_dir = __DIR__ . "/../../xem-phim/link-phim/";

                $tentaptin = date('YmdHis') . '_' . $_FILES['episodes_linkphim']['name'];

                move_uploaded_file($_FILES['episodes_linkphim']['tmp_name'], $upload_dir . $tentaptin);

                // 4. Chuẩn bị câu lệnh SQL
                $sqlThemMoiTapPhim = <<<EOT
                INSERT INTO episodes(linkphim, episode, moive_id)
                VALUES ('$tentaptin', '$episodes_episode', '$movies_id')
EOT;
                // 5. Thực thi câu truy vấn SQL để lấy về dữ liệu
                mysqli_query($conn, $sqlThemMoiTapPhim) or die("<b>Có lỗi khi thực thi câu lệnh SQL: </b>" . mysqli_error($conn) . "<br /><b>Câu lệnh vừa thực thi:</b></br>$sqlThemMoiTapPhim");

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

    <script>
        // Hiển thị video preview khi chọn video
        const reader = new FileReader();
        const fileInput = document.getElementById("episodes_linkphim");
        const vid = document.getElementById("preview-vid");
        reader.onload = e => {
            vid.src = e.target.result;
        }
        fileInput.addEventListener('change', e => {
            const f = e.target.files[0];
            reader.readAsDataURL(f);
        })
    </script>

</body>

</html>
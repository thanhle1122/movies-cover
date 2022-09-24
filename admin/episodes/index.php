<?php
if (session_id() === '') {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Thanh Moives</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //for-mobile-apps -->
    <link href="/web-xem-phim/assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/web-xem-phim/assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="/web-xem-phim/assets/css/contactstyle.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/web-xem-phim/assets/css/faqstyle.css" type="text/css" media="all" />
    <link href="/web-xem-phim/assets/css/single.css" rel='stylesheet' type='text/css' />
    <link href="/web-xem-phim/assets/css/medile.css" rel='stylesheet' type='text/css' />
    <!-- banner-slider -->
    <link href="/web-xem-phim/assets/css/jquery.slidey.min.css" rel="stylesheet">
    <!-- //banner-slider -->
    <!-- pop-up -->
    <link href="/web-xem-phim/assets/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //pop-up -->
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="/web-xem-phim/assets/css/font-awesome.min.css" />
    <!-- //font-awesome icons -->
    <!-- js -->
    <script type="text/javascript" src="/web-xem-phim/assets/js/jquery-2.1.4.min.js"></script>
    <!-- //js -->
    <!-- banner-bottom-plugin -->
    <link href="/web-xem-phim/assets/css/owl.carousel.css" rel="stylesheet" type="text/css" media="all">
    <script src="/web-xem-phim/assets/js/owl.carousel.js"></script>
    <script>
        $(document).ready(function() {
            $("#owl-demo").owlCarousel({

                autoPlay: 3000, //Set AutoPlay to 3 seconds

                items: 5,
                itemsDesktop: [640, 4],
                itemsDesktopSmall: [414, 3]

            });

        });
    </script>
    <!-- //banner-bottom-plugin -->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="/web-xem-phim/assets/js/move-top.js"></script>
    <script type="text/javascript" src="/web-xem-phim/assets/js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
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
            <div class="w3l_sign_in_register">
                <ul>
                    <li><a href="/web-xem-phim/admin/index.php">Quay về trang quản lý</a></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <script>
        $('.toggle').click(function() {
            // Switches the Icon
            $(this).children('i').toggleClass('fa-pencil');
            // Switches the forms  
            $('.form').animate({
                height: "toggle",
                'padding-top': 'toggle',
                'padding-bottom': 'toggle',
                opacity: "toggle"
            }, "slow");
        });
    </script>
    <!-- End Header -->

    <!-- Main -->
    <main role="main" class="mb-2">
        <!-- Block content -->
        <div class="container mt-2">
            <div class="full borderf">
                <h1 class="tieu-de">Quản lý Danh sách Tập Phim</h1>
            </div>
            <?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            // 1. Mở kết nối
            include_once __DIR__ . '/../../dbconnect.php';
            // 2. Chuẩn bị câu lệnh
            $sqlTapPhim = "
            SELECT epi.id, epi.moive_id, epi.linkphim,epi.episode, mv.title_movie
            FROM episodes epi
            JOIN movies mv ON epi.moive_id = mv.id
            ORDER BY mv.title_movie, epi.episode
            ";
            // 3. Thực thi câu lệnh
            $resultTapPhim = mysqli_query($conn, $sqlTapPhim);
            // 4. Phân tách dữ liệu
            $dataTapPhim = [];
            while ($item = mysqli_fetch_array($resultTapPhim, MYSQLI_ASSOC)) {
                $dataTapPhim[] = array(
                    'episodes_id' => $item['id'],
                    'episodes_moive_id' => $item['moive_id'],
                    'episodes_linkphim' => $item['linkphim'],
                    'episodes_episode' => $item['episode'],
                    'title_movie' => $item['title_movie'],
                );
            }
            // var_dump($dataTapPhim);die;
            ?>
        </div>

        <div class="container">
            <div class="full borderf">
                <h3 class="text-movies">Danh sách Tập Phim</h3>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <div style="display: flex;">
                        <a href="insert.php" class="btn btn-primary mb-2">
                            <div style="display: flex;">
                                <i class="material-icons">library_add</i>
                                Thêm mới
                            </div>
                        </a>
                        <input style="margin-left: 10px" type="text" class="timkiem form-control" name="" value="" placeholder="Tìm kiếm">
                    </div>
                    <table class="table table-bordered">
                        <thead class="thead-dark" style="text-align: center;">
                            <tr>
                                <th>ID</th>
                                <th>Tên Phim</th>
                                <th>Link Phim</th>
                                <th>Tập phim</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody class="danhsach">
                            <?php
                            include_once __DIR__ . '/../../dbconnect.php';

                            if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
                                $page_no = $_GET['page_no'];
                            } else {
                                $page_no = 1;
                            }

                            $total_records_per_page = 6;
                            $offset = ($page_no - 1) * $total_records_per_page;
                            $previous_page = $page_no - 1;
                            $next_page = $page_no + 1;
                            $adjacents = "2";

                            $result_count = mysqli_query($conn, "SELECT COUNT(*) As total_records FROM episodes epi
                            JOIN movies mv ON epi.moive_id = mv.id ORDER BY mv.title_movie, epi.episode");
                            $total_records = mysqli_fetch_array($result_count);
                            $total_records = $total_records['total_records'];
                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $second_last = $total_no_of_pages - 1; // total page minus 1

                            $result = mysqli_query($conn, "SELECT epi.id, epi.moive_id, epi.linkphim,epi.episode, mv.title_movie
                            FROM episodes epi
                            JOIN movies mv ON epi.moive_id = mv.id ORDER BY mv.title_movie, epi.episode LIMIT $offset, $total_records_per_page");
                            $dataTapPhim = [];
                            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                $dataTapPhim[] = array(
                                    'episodes_id' => $item['id'],
                                    'episodes_moive_id' => $item['moive_id'],
                                    'episodes_linkphim' => $item['linkphim'],
                                    'episodes_episode' => $item['episode'],
                                    'title_movie' => $item['title_movie'],
                                );
                            }
                            // var_dump($dataTapPhim); die;
                            ?>
                            <?php foreach ($dataTapPhim as $item) : ?>
                                <tr>
                                    <td style="text-align: center;"><?= $item['episodes_id'] ?></td>
                                    <td><?= $item['title_movie'] ?></td>
                                    <td style="text-align: center;">
                                        <video width="50%" height="50%" loop="true" controls="controls" id="vid" muted>
                                            <source src="/web-xem-phim/xem-phim/link-phim/<?= $item['episodes_linkphim'] ?>" type="video/mp4">
                                        </video>
                                    </td>
                                    <td style="text-align: center;"><?= $item['episodes_episode'] ?></td>
                                    <td style="justify-content: center">
                                        <div style="display: flex;">
                                            <a title="Chỉnh sửa" href="update.php?episodes_id=<?= $item['episodes_id'] ?>" class="btn btn-warning">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <div style="border:1px #ddd none;height:10px;width:10px "></div>
                                            <button title="Xóa" type="button" class="btn btn-danger btnDelete" data-episodes_id="<?= $item['episodes_id'] ?>">
                                                <i class="material-icons">delete_forever</i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            <?php
                            mysqli_close($conn);
                            ?>
                        </tbody>
                    </table>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <?php if ($page_no > 2) {
                                echo "<li><a href='?page_no=1'>&lsaquo;&lsaquo; Đầu</a></li>";
                            } ?>
                            <li <?php if ($page_no <= 1) {
                                    echo "class='disabled'";
                                } ?>>
                                <a <?php if ($page_no > 1) {
                                        echo "href='?page_no=$previous_page'";
                                    } ?>>&lsaquo;</a>
                            </li>

                            <?php
                            if ($total_no_of_pages <= 10) {
                                for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
                                    if ($counter == $page_no) {
                                        echo "<li class='active'><a>$counter</a></li>";
                                    } else {
                                        echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                    }
                                }
                            } elseif ($total_no_of_pages > 10) {

                                if ($page_no <= 4) {
                                    for ($counter = 1; $counter < 8; $counter++) {
                                        if ($counter == $page_no) {
                                            echo "<li class='active'><a>$counter</a></li>";
                                        } else {
                                            echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                        }
                                    }
                                    echo "<li><a>...</a></li>";
                                    echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                                    echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                                } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
                                    echo "<li><a href='?page_no=1'>1</a></li>";
                                    echo "<li><a href='?page_no=2'>2</a></li>";
                                    echo "<li><a>...</a></li>";
                                    for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                                        if ($counter == $page_no) {
                                            echo "<li class='active'><a>$counter</a></li>";
                                        } else {
                                            echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                        }
                                    }
                                    echo "<li><a>...</a></li>";
                                    echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                                    echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                                } else {
                                    echo "<li><a href='?page_no=1'>1</a></li>";
                                    echo "<li><a href='?page_no=2'>2</a></li>";
                                    echo "<li><a>...</a></li>";

                                    for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                                        if ($counter == $page_no) {
                                            echo "<li class='active'><a>$counter</a></li>";
                                        } else {
                                            echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                        }
                                    }
                                }
                            }
                            ?>

                            <li <?php if ($page_no >= $total_no_of_pages) {
                                    echo "class='disabled'";
                                } ?>>
                                <a <?php if ($page_no < $total_no_of_pages) {
                                        echo "href='?page_no=$next_page'";
                                    } ?>>Trang kế</a>
                            </li>
                            <?php if ($page_no < $total_no_of_pages) {
                                echo "<li><a href='?page_no=$total_no_of_pages'>Cuối &rsaquo;&rsaquo;</a></li>";
                            } ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </main>
    <!-- End Main -->

    <?php include_once(__DIR__ . '/../../frontend/layouts/scripts.php'); ?>

    <script>
        $('.btnDelete').on('click', function(e) {
            // Lấy giá trị của thuộc tính "data-episodes_id" của nút mà người dùng đang click
            var episodes_id = $(this).attr('data-episodes_id');

            // Hiển thị cảnh báo
            var xacNhanXoa = confirm('Bạn có chắc chắn muốn xóa?');
            if (xacNhanXoa == true) { // Người dùng đã chọn Yes
                // Điều hướng đến trang delete.php với tham số episodes_id được truyền theo request GET
                location.href = 'delete.php?episodes_id=' + episodes_id;
            }
        });
    </script>

    <script src="/web-xem-phim/assets/js/jquery.magnific-popup.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });
            // Search
            $('.timkiem').keyup(function() {
                var txt = $('.timkiem').val();
                $.post('ajax.php', {
                    data: txt
                }, function(data) {
                    $('.danhsach').html(data);
                })
            })

        });
    </script>

    <!-- Footer -->
    <?php include_once __DIR__ . '/../../admin/footer.php' ?>

</body>

</html>
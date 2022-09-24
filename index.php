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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    <!-- start-smoth-scrolling -->
</head>

<body>
    <!-- header -->
    <?php include_once __DIR__ . '/frontend/partials/header.php' ?>

    <!-- //bootstrap-pop-up -->
    <!-- nav -->

    <?php
    // 1. Mở kết nối
    include_once __DIR__ . '/dbconnect.php';
    // 2. Chuẩn bị câu lệnh
    $sqlPhim = "
        SELECT * 
        FROM movies
    ";
    $sqlDanhMuc = "
        SELECT * 
        FROM categories 
    ";
    $sqlQuocGia = "
        SELECT * 
        FROM countries
    ";
    $sqlTapPhim = "
        SELECT * 
        FROM episodes
    ";
    $sqlTheLoai = "
        SELECT * 
        FROM genres
    ";
    // 3. Thực thi câu lệnh
    $resultPhim = mysqli_query($conn, $sqlPhim);
    $resultDanhMuc = mysqli_query($conn, $sqlDanhMuc);
    $resultQuocGia = mysqli_query($conn, $sqlQuocGia);
    $resultTapPhim = mysqli_query($conn, $sqlTapPhim);
    $resultTheLoai = mysqli_query($conn, $sqlTheLoai);
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
    $dataDanhMuc = [];
    while ($item = mysqli_fetch_array($resultDanhMuc, MYSQLI_ASSOC)) {
        $dataDanhMuc[] = array(
            'categories_id' => $item['id'],
            'categories_title' => $item['title'],
            'categories_description' => $item['description'],
            'categories_status' => $item['status'],
        );
    }
    $dataQuocGia = [];
    while ($item = mysqli_fetch_array($resultQuocGia, MYSQLI_ASSOC)) {
        $dataQuocGia[] = array(
            'countries_id' => $item['id'],
            'countries_title' => $item['title'],
            'countries_description' => $item['description'],
            'countries_status' => $item['status'],
        );
    }
    $dataTapPhim = [];
    while ($item = mysqli_fetch_array($resultTapPhim, MYSQLI_ASSOC)) {
        $dataTapPhim[] = array(
            'episodes_id' => $item['id'],
            'episodes_moive_id' => $item['moive_id'],
            'episodes_linkphim' => $item['linkphim'],
            'episodes_episode' => $item['episode'],
        );
    }
    $dataTheLoai = [];
    while ($item = mysqli_fetch_array($resultTheLoai, MYSQLI_ASSOC)) {
        $dataTheLoai[] = array(
            'genres_id' => $item['id'],
            'genres_title' => $item['title_genre'],
            'genres_description' => $item['description'],
            'genres_status' => $item['status'],
        );
    }

    // var_dump($dataQuocGia); die;
    ?>

    <div class="movies_nav">
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="navbar-header navbar-left">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                    <nav>
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="/web-xem-phim/index.html">Home</a></li>
                            <li class="dropdown">
                                <!-- Thể loại -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Genres <b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <li>
                                        <div class="col-sm-3">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="/web-xem-phim/index.php">Anime</a></li>
                                                <li><a href="/web-xem-phim/index.php">Hành động</a></li>
                                                <li><a href="/web-xem-phim/index.php">Hài hước</a></li>
                                                <li><a href="/web-xem-phim/index.php">Tình cảm</a></li>
                                                <li><a href="/web-xem-phim/index.php">Harem</a></li>
                                                <li><a href="/web-xem-phim/index.php">Bí ẩn</a></li>
                                                <li><a href="/web-xem-phim/index.php">Bi kịch</a></li>
                                                <li><a href="/web-xem-phim/index.php">Giả tưởng</a></li>
                                                <li><a href="/web-xem-phim/index.php">Viễn tưởng</a></li>
                                                <li><a href="/web-xem-phim/index.php">CN Animation</a></li>
                                                <li><a href="/web-xem-phim/index.php">Dị giới</a></li>
                                                <li><a href="/web-xem-phim/index.php">[CNA] Hài hước</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="/web-xem-phim/index.php">Học đường</a></li>
                                                <li><a href="/web-xem-phim/index.php">Đời thường</a></li>
                                                <li><a href="/web-xem-phim/index.php">Võ thuật</a></li>
                                                <li><a href="/web-xem-phim/index.php">Trò chơi</a></li>
                                                <li><a href="/web-xem-phim/index.php">Thám tử</a></li>
                                                <li><a href="/web-xem-phim/index.php">Thể thao</a></li>
                                                <li><a href="/web-xem-phim/index.php">Âm nhạc</a></li>
                                                <li><a href="/web-xem-phim/index.php">Psychological</a></li>
                                                <li><a href="/web-xem-phim/index.php">Tiên hiệp</a></li>
                                                <li><a href="/web-xem-phim/index.php">Kiếm hiệp</a></li>
                                                <li><a href="/web-xem-phim/index.php">Đam mỹ</a></li>
                                                <li><a href="/web-xem-phim/index.php">Võ hiệp</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="/web-xem-phim/index.php">Lịch sử</a></li>
                                                <li><a href="/web-xem-phim/index.php">Siêu năng lực</a></li>
                                                <li><a href="/web-xem-phim/index.php">Shounen</a></li>
                                                <li><a href="/web-xem-phim/index.php">Shounen AI</a></li>
                                                <li><a href="/web-xem-phim/index.php">Shoujo</a></li>
                                                <li><a href="/web-xem-phim/index.php">Shoujo AI</a></li>
                                                <li><a href="/web-xem-phim/index.php">Mecha</a></li>
                                                <li><a href="/web-xem-phim/index.php">Quân đội</a></li>
                                                <li><a href="/web-xem-phim/index.php">Xuyên không</a></li>
                                                <li><a href="/web-xem-phim/index.php">Trùng sinh</a></li>
                                                <li><a href="/web-xem-phim/index.php">Ecchi</a></li>
                                                <li><a href="/web-xem-phim/index.php">Demon</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="/web-xem-phim/index.php">Drama</a></li>
                                                <li><a href="/web-xem-phim/index.php">Seinen</a></li>
                                                <li><a href="/web-xem-phim/index.php">Siêu nhiên</a></li>
                                                <li><a href="/web-xem-phim/index.php">Phiêu lưu</a></li>
                                                <li><a href="/web-xem-phim/index.php">Kinh dị</a></li>
                                                <li><a href="/web-xem-phim/index.php">Ma cà rồng</a></li>
                                                <li><a href="/web-xem-phim/index.php">Tokusatsu</a></li>
                                                <li><a href="/web-xem-phim/index.php">Samurai</a></li>
                                                <li><a href="/web-xem-phim/index.php">Huyền ảo</a></li>
                                                <li><a href="/web-xem-phim/index.php">[CNA] Ngôn tình</a></li>
                                                <li><a href="/web-xem-phim/index.php">Live Action</a></li>
                                                <li><a href="/web-xem-phim/index.php">Khoa huyễn</a></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Country <b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <li>
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="/web-xem-phim/movie-follow-country/china.php">Trung Quốc</a></li>
                                                <li><a href="/web-xem-phim/movie-follow-country/japan.php">Nhật Bản</a></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="/web-xem-phim/faq.php">FAQ</a></li>
                            <li><a href="/web-xem-phim/contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </nav>
        </div>
    </div>
    <!-- //nav -->
    <!-- banner-bottom -->
    <div class="banner-bottom">
        <h4 class="latest-text w3_latest_text">Phim đề cử</h4>
        <div class="container">
            <div class="w3_agile_banner_bottom_grid">
                <div id="owl-demo" class="owl-carousel owl-theme">
                    <?php foreach ($dataPhim as $p) : ?>
                        <div class="item">
                            <div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
                                <a href="/web-xem-phim/thong-tin-phim/thong-tin-phim.php?movies_id=<?= $p['movies_id'] ?>" class="hvr-shutter-out-horizontal"><img src="/web-xem-phim/assets/images/<?= $p['movies_image'] ?>" title="album-name" class="img-responsive" alt=" " />
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                                </a>
                                <div class="mid-1 agileits_w3layouts_mid_1_home">
                                    <div class="w3l-movie-text">
                                        <h6><a href="/web-xem-phim/thong-tin-phim/thong-tin-phim.php?movies_id=<?= $p['movies_id'] ?>"><?= $p['movies_title'] ?></a></h6>
                                    </div>
                                    <div class="mid-2 agile_mid_2_home">
                                        <p><?= $p['movies_year'] ?></p>
                                        <div class="block-stars">
                                            <ul class="w3l-ratings">
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="ribben">
                                    <p>NEW</p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- //banner-bottom -->
    <div class="general_social_icons">
        <nav class="social">
            <ul>
                <li class="w3_twitter"><a href="https://twitter.com">Twitter <i class="fa fa-twitter"></i></a></li>
                <li class="w3_facebook"><a href="https://facebook.com">Facebook <i class="fa fa-facebook"></i></a></li>
                <li class="w3_dribbble"><a href="https://dribbble.com">Dribbble <i class="fa fa-dribbble"></i></a></li>
                <li class="w3_g_plus"><a href="https://googgle.com">Google+ <i class="fa fa-google-plus"></i></a></li>
            </ul>
        </nav>
    </div>
    <!-- general -->
    <div class="general">
        <h4 class="latest-text w3_latest_text">Danh sách phim</h4>
        <div class="container">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <div class="w3_agile_featured_movies" style="display: flex;flex-wrap: wrap;align-items: center;">
                    <?php foreach ($dataPhim as $p) : ?>
                        <div class="col-md-2 w3l-movie-gride-agile">
                            <a href="/web-xem-phim/thong-tin-phim/thong-tin-phim.php?movies_id=<?= $p['movies_id'] ?>" class="hvr-shutter-out-horizontal"><img src="/web-xem-phim/assets/images/<?= $p['movies_image'] ?>" title="album-name" class="img-responsive" alt=" " />
                                <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                            </a>
                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                <div class="w3l-movie-text">
                                    <h6><a href="/web-xem-phim/thong-tin-phim/thong-tin-phim.php?movies_id=<?= $p['movies_id'] ?>"><?= $p['movies_title'] ?></a></h6>
                                </div>
                                <div class="mid-2 agile_mid_2_home">
                                    <p><?= $p['movies_year'] ?></p>
                                    <div class="block-stars">
                                        <ul class="w3l-ratings">
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="ribben">
                                <p>NEW</p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
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

        });
    </script>

    <!-- footer -->
    <?php include_once __DIR__ . '/frontend/partials/footer.php' ?>

</body>

</html>
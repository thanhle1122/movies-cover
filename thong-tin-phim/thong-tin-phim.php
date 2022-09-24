<?php
if (session_id() === '') {
    session_start();
}
?>

<?php include_once __DIR__ . '/../dbconnect.php'; ?>

<?php

$movies_id = null;
if (isset($_GET['movies_id'])) {
    $movies_id = $_GET['movies_id'];
}

$sqlThongTinPhim = "
    SELECT mv.id, mv.title_movie, mv.description, mv.`status`, mv.image, mv.`year`, mv.list_episodes, gr.title_genre
    FROM movies mv
    JOIN genres gr ON gr.id = mv.genre_id
    WHERE mv.id = $movies_id;
";
$resultThongTinPhim = mysqli_query($conn, $sqlThongTinPhim);

$dataThongTinPhim = [];
while ($item = mysqli_fetch_array($resultThongTinPhim, MYSQLI_ASSOC)) {
    $dataThongTinPhim[] = array(
        'movies_id' => $item['id'],
        'movies_title' => $item['title_movie'],
        'movies_description' => $item['description'],
        'movies_status' => $item['status'],
        'movies_image' => $item['image'],
        'movies_year' => $item['year'],
        'movies_list_episodes' => $item['list_episodes'],
        'genres_title' => $item['title_genre'],
    );
}
$sqlSoTapPhim = "
    SELECT id,linkphim,episode,moive_id
    FROM episodes
    WHERE moive_id = $movies_id
    ORDER BY episode ASC;
";

$resultSoTapPhim = mysqli_query($conn, $sqlSoTapPhim);

$dataSoTapPhim = [];
while ($item = mysqli_fetch_array($resultSoTapPhim, MYSQLI_ASSOC)) {
    $dataSoTapPhim[] = array(
        'episodes_id' => $item['id'],
        'episodes_linkphim' => $item['linkphim'],
        'episodes_episode' => $item['episode'],
    );
}

// var_dump($dataThongTinPhim);die;
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
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="/web-xem-phim/thong-tin-phim/assets/js/mdb.min.js"></script>
    <link href="/web-xem-phim/thong-tin-phim/assets/css/mdb.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="/web-xem-phim/thong-tin-phim/assets/css/style.css" rel="stylesheet" type="text/css" media="all">
    
    <?php include_once __DIR__ . '/../frontend/layouts/styles.php' ?>
</head>

<body>
    <!-- header -->
    <?php include_once __DIR__ . '/../frontend/partials/header.php' ?>
    <div class="main">
        <div class="container border" style="align-items: center;color: #fff;background: #191919;border-radius: 0!important;border: 2px solid #dee2e6!important;">
            <div class="row border" style="border: 2px solid #dee2e6!important;">
                <div class="col" style="padding: 10px 0px;">
                    <?php foreach ($dataThongTinPhim as $ttp) : ?>
                        <div class="col-md-12 text-center tile-movies ">
                            <h2><?= $ttp['movies_title'] ?></h2>
                        </div>
                </div>
            </div>
            <div class="row border" style="border: 2px solid #dee2e6!important;">
                <div class="col-md-12 content-movies">
                    <div class="row" style="margin: 15px 0px 30px 0px;">
                        <div class="col-md-2 content-movies-img">
                            <img class="img-fluid" src="/web-xem-phim/assets/images/<?= $ttp['movies_image'] ?>" alt="">
                        </div>
                        <div class="col-md-10 content-movies-list">
                            <div class="row" style="padding: 10px 0px;align-items: center;">
                                <div class="col-md-4 content-movies-list">
                                    <div style="font-weight: 700;font-size: 20px;">Thể loại</div>
                                </div>
                                <div class="col-md-8 content-movies-list text-center">
                                    <div style="font-weight: 700;font-size: 20px;"><?= $ttp['genres_title'] ?></div>
                                </div>
                            </div>
                            <div class="row" style="padding: 10px 0px;align-items: center;border-top: #2f2f2f 1px solid;">
                                <div class="col-md-4 content-movies-list">
                                    <div style="font-weight: 700;font-size: 20px;">Trạng thái</div>
                                </div>
                                <div class="col-md-8 content-movies-list text-center">
                                    <?php if ($ttp['movies_status'] == 1) : ?>
                                        <div style="font-weight: 700;font-size: 20px;"><?= $ttp['movies_status'] = "Đang tiến hành" ?></div>
                                    <?php else : ?>
                                        <div style="font-weight: 700;font-size: 20px;"><?= $ttp['movies_status'] = "Hoàn thành" ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row" style="padding: 10px 0px;align-items: center;border-top: #2f2f2f 1px solid;">
                                <div class="col-md-4 content-movies-list">
                                    <div style="font-weight: 700;font-size: 20px;">Năm phát hành</div>
                                </div>
                                <div class="col-md-8 content-movies-list text-center">
                                    <div style="font-weight: 700;font-size: 20px;"><?= $ttp['movies_year'] ?></div>
                                </div>
                            </div>
                            <div class="row" style="padding: 10px 0px;align-items: center;border-top: #2f2f2f 1px solid;">
                                <div class="col-md-4 content-movies-list">
                                    <div style="font-weight: 700;font-size: 20px;">Thời lượng</div>
                                </div>
                                <div class="col-md-8 content-movies-list text-center">
                                    <div style="font-weight: 700;font-size: 20px;"><?= $ttp['movies_list_episodes'] ?> Tập</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row border" style="border: 2px solid #dee2e6!important;">
                <div class="col-md-4 border">
                    <h3>Danh sách tập</h3>
                    <div class="col-md-4-episode-movies">
                        <div class="scrollbar scrollbar-warning">
                            <div class="force-overflow">
                                <?php foreach ($dataSoTapPhim as $stp) : ?>
                                    <a style="background: #333232;text-align: center;padding: 10px 5px;border: 1px solid #4e4e4e;font-size: 13px;width: 20%;box-sizing: border-box;" class="btn btn-dark" href="/web-xem-phim/xem-phim/xem-phim.php?movies_id=<?= $movies_id ?>&episodes_episode=<?= $stp['episodes_episode'] ?>&total_episode=<?= count($dataSoTapPhim) ?>">
                                        <span><?= $stp['episodes_episode'] ?></span>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 border">
                    <h3>Nội dung</h3>
                    <div class="col-md-8-content-movies" style="display: grid">
                        <?= $ttp['movies_description'] ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        </div>
    </div>
    <br>
    <br>
    <!-- footer -->
    <?php include_once __DIR__ . '/../frontend/partials/footer.php' ?>

</body>
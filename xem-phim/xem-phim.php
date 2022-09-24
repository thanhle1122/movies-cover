<?php
if (session_id() === '') {
    session_start();
}
?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<?php include_once __DIR__ . '/../dbconnect.php'; ?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Data movies
$movies_id = $_GET['movies_id'];
$episodes_episode = $_GET['episodes_episode'];
$total_episode = $_GET['total_episode'];

$sqlThongTinPhim = "
    SELECT mv.id, mv.title_movie, mv.description, mv.`status`, mv.image, mv.`year`, mv.list_episodes, gr.title_genre
    FROM movies mv
    JOIN genres gr ON gr.id = mv.genre_id
    WHERE mv.id = $movies_id;
";
$resultThongTinPhim = mysqli_query($conn, $sqlThongTinPhim);

$dataThongTinPhim = [];
$dataThongTinPhim = mysqli_fetch_array($resultThongTinPhim, MYSQLI_ASSOC);

// Data episodes
$sqlSoTapPhim = "
    SELECT id,linkphim,episode,moive_id
    FROM episodes
    WHERE episode = $episodes_episode
    AND moive_id = $movies_id;
";

$resultSoTapPhim = mysqli_query($conn, $sqlSoTapPhim);

$dataSoTapPhim = [];
$dataSoTapPhim = mysqli_fetch_array($resultSoTapPhim, MYSQLI_ASSOC);

if (is_null($dataSoTapPhim)) {
    echo 'Tập bạn tìm không tồn tại...';
    die;
}
// Data episodes 2
$sqlSoTapPhimDS = "
    SELECT id,linkphim,episode,moive_id
    FROM episodes
    WHERE moive_id = $movies_id
    ORDER BY episode DESC;
";

$resultSoTapPhimDS = mysqli_query($conn, $sqlSoTapPhimDS);

$dataSoTapPhimDS = [];
while ($item = mysqli_fetch_array($resultSoTapPhimDS, MYSQLI_ASSOC)) {
    $dataSoTapPhimDS[] = array(
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

    <style>

    </style>
    <!-- start-smoth-scrolling -->
    <?php include_once __DIR__ . '/../frontend/layouts/styles.php' ?>
</head>

<body>
    <!-- header -->
    <?php include_once __DIR__ . '/../frontend/partials/header.php' ?>
    <div class="main-watching">
        <div class="container">
            <div style="background: #1d1c1c;padding: 10px;margin-bottom: 10px;border-radius: 5px;box-sizing: border-box;">
                <div class="row">
                    <div class="col-md-12 align-center" style="margin-bottom: 10px;border-bottom: 1px dashed #ccc;padding-bottom: 10px;">
                        <a style="color: #ffb970;" href="/web-xem-phim/thong-tin-phim/thong-tin-phim.php?movies_id=<?= $movies_id ?>"><i class="fa fa-film" aria-hidden="true"></i> <?= $dataThongTinPhim['title_movie'] ?></a>
                    </div>
                    <div class="col-md-12 align-center">
                        <p style="margin: 0;font-weight: 700;color: greenyellow;">Đang xem Tập <?= $dataSoTapPhim['episode'] ?></p>
                    </div>
                </div>
            </div>
            <div style="display: flex;justify-content: space-between;background-color: #1d1c1c;">
                <div style="font-weight: 500;position: relative;height: 50px;display: flex;padding: 0 30px;">
                    <div style="margin: 10px 0;">
                        <div style="display:flex;color: greenyellow;font-size: 17px;font-weight: 700;position: relative;" class="watching-episode">
                            Tập <?= $dataSoTapPhim['episode'] ?>
                        </div>
                    </div>
                </div>
                <div style="display: flex;font-size: 17px;position: relative;align-items: center;padding: 0 10px;background-color: #000;">
                    <a href="/web-xem-phim/thong-tin-phim/thong-tin-phim.php?movies_id=<?= $movies_id ?>" class="btn btn-info" style="background-color: #795548;display: inline-flex;border-radius: 5px;margin: 0 2px;padding: 10px;cursor: pointer;">
                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                    </a>
                    <button class="btn btn-warning" style="color: #fff;background-color: #b73a3a;display: inline-flex;border-radius: 5px;margin: 0 2px;padding: 10px;cursor: pointer;">
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="watching-movie">
                        <video width="100%" height="100%" loop="true" autoplay="autoplay" controls="controls" id="vid" muted>
                            <source src="/web-xem-phim/xem-phim/link-phim/<?= $dataSoTapPhim['linkphim'] ?>" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
            <div style="background: #1d1c1c;padding: 10px;margin-top: 10px;border-radius: 5px;box-sizing: border-box;">
                <div class="row">
                    <div class="col text-center">
                        <?php
                        // Tính toán trước Số = hiện tại +/- 1
                        $episodeBefore = $dataSoTapPhim['episode'] - 1;
                        $episodeAfter = $dataSoTapPhim['episode'] + 1;
                        // Set trạng thái Disabled nếu Số Tập tính toán không hợp lý
                        $statusEpisodeBefore = ($episodeBefore <= 0) ? 'disabled' : '';
                        $statusEpisodeAfter = ($episodeAfter > $total_episode) ? 'disabled' : '';
                        ?>
                        <a style="display:inline-flex;" href="xem-phim.php?movies_id=<?= $movies_id ?>&episodes_episode=<?= $episodeBefore ?>&total_episode=<?= $total_episode ?>" class="btn btn-warning <?= $statusEpisodeBefore ?>"><i class="large material-icons">chevron_left</i>Trước</a>

                        <a title="Quay về trang thông tin phim" href="/web-xem-phim/thong-tin-phim/thong-tin-phim.php?movies_id=<?= $movies_id ?>" class="btn btn-danger"><i class="large material-icons">menu</i></a>

                        <a style="display:inline-flex;" href="xem-phim.php?movies_id=<?= $movies_id ?>&episodes_episode=<?= $episodeAfter ?>&total_episode=<?= $total_episode ?>" class="btn btn-warning <?= $statusEpisodeAfter ?>">Sau<i class="large material-icons">chevron_right</i></a>
                    </div>
                </div>
            </div>
            <div style="background: #1d1c1c;padding: 10px;margin:10px 0px 10px 0px;border-radius: 5px;box-sizing: border-box;">
                <div style="font-size: 16px;margin-bottom: 10px;border-bottom: 1px dashed #ccc;padding-bottom: 10px;">
                    <span style="font-weight: 700;color: #fff;">
                        Danh sách tập
                    </span>
                </div>
                <div style="display: flex;">
                    <div class="scrollbar scrollbar-warning">
                        <div class="force-overflow">
                            <style>
                                .scrollbar {
                                    /* margin-left: 30px; */
                                    float: left;
                                    height: 80px;
                                    overflow-y: scroll;
                                    /* margin-bottom: 25px; */
                                    display: flex;
                                }

                                .force-overflow {
                                    width: 1080px;
                                    min-height: 200px;
                                }

                                .scrollbar-warning::-webkit-scrollbar-track {
                                    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
                                    background-color: #F5F5F5;
                                    border-radius: 10px;
                                }

                                .scrollbar-warning::-webkit-scrollbar {
                                    width: 12px;
                                    background-color: #F5F5F5;
                                }

                                .scrollbar-warning::-webkit-scrollbar-thumb {
                                    border-radius: 10px;
                                    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
                                    background-color: #FF8800;
                                }

                                .scrollbar-warning {
                                    scrollbar-color: #FF8800 #F5F5F5;
                                }
                            </style>
                            <?php foreach ($dataSoTapPhimDS as $stpDS) : ?>
                                <a style="background: #333232;text-align: center;padding: 10px 5px;border: 1px solid #4e4e4e;font-size: 13px;width: 5%;box-sizing: border-box;" class="btn btn-dark" href="/web-xem-phim/xem-phim/xem-phim.php?movies_id=<?= $movies_id ?>&episodes_episode=<?= $stpDS['episodes_episode'] ?>&total_episode=<?= count($dataSoTapPhimDS) ?>">
                                    <span><?= $stpDS['episodes_episode'] ?></span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        document.getElementById('vid').play();
    </script>
    <!-- footer -->
    <?php include_once __DIR__ . '/../frontend/partials/footer.php' ?>

</body>
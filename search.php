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
                            <li class="active"><a href="/web-xem-phim/index.php">Home</a></li>
                            <li class="dropdown">
                                <!-- Th??? lo???i -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Genres <b class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <li>
                                        <div class="col-sm-3">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="/web-xem-phim/index.php">Anime</a></li>
                                                <li><a href="/web-xem-phim/index.php">H??nh ?????ng</a></li>
                                                <li><a href="/web-xem-phim/index.php">H??i h?????c</a></li>
                                                <li><a href="/web-xem-phim/index.php">T??nh c???m</a></li>
                                                <li><a href="/web-xem-phim/index.php">Harem</a></li>
                                                <li><a href="/web-xem-phim/index.php">B?? ???n</a></li>
                                                <li><a href="/web-xem-phim/index.php">Bi k???ch</a></li>
                                                <li><a href="/web-xem-phim/index.php">Gi??? t?????ng</a></li>
                                                <li><a href="/web-xem-phim/index.php">Vi???n t?????ng</a></li>
                                                <li><a href="/web-xem-phim/index.php">CN Animation</a></li>
                                                <li><a href="/web-xem-phim/index.php">D??? gi???i</a></li>
                                                <li><a href="/web-xem-phim/index.php">[CNA] H??i h?????c</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="/web-xem-phim/index.php">H???c ???????ng</a></li>
                                                <li><a href="/web-xem-phim/index.php">?????i th?????ng</a></li>
                                                <li><a href="/web-xem-phim/index.php">V?? thu???t</a></li>
                                                <li><a href="/web-xem-phim/index.php">Tr?? ch??i</a></li>
                                                <li><a href="/web-xem-phim/index.php">Th??m t???</a></li>
                                                <li><a href="/web-xem-phim/index.php">Th??? thao</a></li>
                                                <li><a href="/web-xem-phim/index.php">??m nh???c</a></li>
                                                <li><a href="/web-xem-phim/index.php">Psychological</a></li>
                                                <li><a href="/web-xem-phim/index.php">Ti??n hi???p</a></li>
                                                <li><a href="/web-xem-phim/index.php">Ki???m hi???p</a></li>
                                                <li><a href="/web-xem-phim/index.php">??am m???</a></li>
                                                <li><a href="/web-xem-phim/index.php">V?? hi???p</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="/web-xem-phim/index.php">L???ch s???</a></li>
                                                <li><a href="/web-xem-phim/index.php">Si??u n??ng l???c</a></li>
                                                <li><a href="/web-xem-phim/index.php">Shounen</a></li>
                                                <li><a href="/web-xem-phim/index.php">Shounen AI</a></li>
                                                <li><a href="/web-xem-phim/index.php">Shoujo</a></li>
                                                <li><a href="/web-xem-phim/index.php">Shoujo AI</a></li>
                                                <li><a href="/web-xem-phim/index.php">Mecha</a></li>
                                                <li><a href="/web-xem-phim/index.php">Qu??n ?????i</a></li>
                                                <li><a href="/web-xem-phim/index.php">Xuy??n kh??ng</a></li>
                                                <li><a href="/web-xem-phim/index.php">Tr??ng sinh</a></li>
                                                <li><a href="/web-xem-phim/index.php">Ecchi</a></li>
                                                <li><a href="/web-xem-phim/index.php">Demon</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="/web-xem-phim/index.php">Drama</a></li>
                                                <li><a href="/web-xem-phim/index.php">Seinen</a></li>
                                                <li><a href="/web-xem-phim/index.php">Si??u nhi??n</a></li>
                                                <li><a href="/web-xem-phim/index.php">Phi??u l??u</a></li>
                                                <li><a href="/web-xem-phim/index.php">Kinh d???</a></li>
                                                <li><a href="/web-xem-phim/index.php">Ma c?? r???ng</a></li>
                                                <li><a href="/web-xem-phim/index.php">Tokusatsu</a></li>
                                                <li><a href="/web-xem-phim/index.php">Samurai</a></li>
                                                <li><a href="/web-xem-phim/index.php">Huy???n ???o</a></li>
                                                <li><a href="/web-xem-phim/index.php">[CNA] Ng??n t??nh</a></li>
                                                <li><a href="/web-xem-phim/index.php">Live Action</a></li>
                                                <li><a href="/web-xem-phim/index.php">Khoa huy???n</a></li>
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
                                                <li><a href="/web-xem-phim/movie-follow-country/china.php">Trung Qu???c</a></li>
                                                <li><a href="/web-xem-phim/movie-follow-country/japan.php">Nh???t B???n</a></li>
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
        <?php
        include_once __DIR__ . '/dbconnect.php';

        if (isset($_POST['search'])) {
            $key = $_POST['key'];
        }
        $sqlSelect = " SELECT *FROM movies WHERE title_movie LIKE '%" . $key . "%'";

        $query = mysqli_query($conn, $sqlSelect);

        ?>
        <h4 class="latest-text w3_latest_text">T??? kh??a t??m ki???m: <?php echo $_POST['key']; ?></h4>
        <div class="container">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <div class="w3_agile_featured_movies" style="display: flex;flex-wrap: wrap;align-items: center;">
                    <?php while ($item = mysqli_fetch_array($query)) { ?>
                        <div class="col-md-2 w3l-movie-gride-agile">
                            <a href="/web-xem-phim/thong-tin-phim/thong-tin-phim.php?movies_id=<?= $item['id'] ?>" class="hvr-shutter-out-horizontal"><img src="/web-xem-phim/assets/images/<?= $item['image'] ?>" title="album-name" class="img-responsive" alt=" " />
                                <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                            </a>
                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                <div class="w3l-movie-text">
                                    <h6><a href="/web-xem-phim/thong-tin-phim/thong-tin-phim.php?movies_id=<?= $item['id'] ?>"><?= $item['title_movie'] ?></a></h6>
                                </div>
                                <div class="mid-2 agile_mid_2_home">
                                    <p><?= $item['year'] ?></p>
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
                    <?php } ?>
                    <div class="clearfix"> </div>
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
    <div class="fixed-bottom">
        <div class="footer">
            <div class="container">
                <div class="col-md-5 w3ls_footer_grid1_left">
                    <p>&copy; 2022 Thanh Movies. All rights reserved | L?? Nh???t Thanh - 187060090</p>
                </div>
                <div class="col-md-7 w3ls_footer_grid1_right">
                    <ul>
                        <li>
                            <a href="/web-xem-phim/index.php">Movies</a>
                        </li>
                        <li>
                            <a href="/web-xem-phim/faq.php">FAQ</a>
                        </li>
                        <li>
                            <a href="/web-xem-phim/contact.php">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //footer -->
    <!-- Bootstrap Core JavaScript -->
    <script src="/web-xem-phim/assets/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".dropdown").hover(
                function() {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function() {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //Bootstrap Core JavaScript -->
    <!-- here stars scrolling icon -->
    <script type="text/javascript">
        $(document).ready(function() {

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!-- //here ends scrolling icon -->

</body>

</html>
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
    <div class="general_social_icons">
        <nav class="social">
            <ul>
                <li class="w3_twitter"><a href="https://twitter.com">Twitter <i class="fa fa-twitter"></i></a></li>
                <li class="w3_facebook"><a href="https://facebook.com">Facebook <i class="fa fa-facebook"></i></a></li>
                <li class="w3_dribbble"><a href="https://dribbble.com">Dribbble <i class="fa fa-dribbble"></i></a></li>
                <li class="w3_g_plus"><a href="https://google.com">Google+ <i class="fa fa-google-plus"></i></a></li>
            </ul>
        </nav>
    </div>
    <!-- nav -->
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
                            <li><a href="/web-xem-phim/index.php">Home</a></li>
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
                            <li class="active"><a href="/web-xem-phim/faq.php">FAQ</a></li>
                            <li><a href="/web-xem-phim/contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </nav>
        </div>
    </div>
    <!-- end nav -->
    <!-- faq-banner -->
    <div class="faq">
        <h4 class="latest-text w3_faq_latest_text w3_latest_text">FAQ</h4>
        <div class="container">
            <div class="panel-group w3l_panel_group_faq" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title asd">
                            <a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Mục đích của trang web này là gì?
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body panel_text">
                            Cho phép mọi người có thể xem phim online một cách miễn phí
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title asd">
                            <a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Question?
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body panel_text">
                            Answers
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title asd">
                            <a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Question?
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body panel_text">
                            Answers
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFour">
                        <h4 class="panel-title asd">
                            <a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Question?
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                        <div class="panel-body panel_text">
                            Answers
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFive">
                        <h4 class="panel-title asd">
                            <a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Question?
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                        <div class="panel-body panel_text">
                            Answers
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingSix">
                        <h4 class="panel-title asd">
                            <a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Question?
                            </a>
                        </h4>
                    </div>
                    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                        <div class="panel-body panel_text">
                            Answers
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingSeven">
                        <h4 class="panel-title asd">
                            <a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Question?
                            </a>
                        </h4>
                    </div>
                    <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                        <div class="panel-body panel_text">
                            Answers
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingEight">
                        <h4 class="panel-title asd">
                            <a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Question?
                            </a>
                        </h4>
                    </div>
                    <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
                        <div class="panel-body panel_text">
                            Answers
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingNine">
                        <h4 class="panel-title asd">
                            <a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Question?
                            </a>
                        </h4>
                    </div>
                    <div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
                        <div class="panel-body panel_text">
                            Answers
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //faq-banner -->

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
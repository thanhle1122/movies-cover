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
                            <li class="active"><a href="/web-xem-phim/contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </nav>
        </div>
    </div>
    <!-- end nav -->
    <!-- contact -->
    <div class="contact-agile">
        <div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.215319425367!2d105.75776341461555!3d9.99906509285181!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a089c799d1a341%3A0xa3c33eac2e0e8938!2zVHLGsOG7nW5nIMSQ4bqhaSBI4buNYyBUw6J5IMSQw7Q!5e0!3m2!1svi!2s!4v1662734458809!5m2!1svi!2s" width="1520" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="faq">
            <h4 class="latest-text w3_latest_text">Contact Us</h4>
            <div class="container">
                <div class="col-md-3 location-agileinfo">
                    <div class="icon-w3">
                        <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                    </div>
                    <h3>Address</h3>
                    <h4>T??y ???? University</h4>
                    <h4>Tr???n Chi??n,</h4>
                    <h4>C???n Th??.</h4>
                </div>
                <div class="col-md-3 call-agileits">
                    <div class="icon-w3">
                        <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                    </div>
                    <h3>Call</h3>
                    <h4>+0123456789</h4>
                    <h4>+0123456789</h4>
                    <h4>+0123456789</h4>
                </div>
                <div class="col-md-3 mail-wthree">
                    <div class="icon-w3">
                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                    </div>
                    <h3>Email</h3>
                    <h4><a href="mailto:info@example.com">thanh1@mail.com</a></h4>
                    <h4><a href="mailto:info@example.com">thanh2@mail.com</a></h4>
                    <h4><a href="mailto:info@example.com">thanh3@mail.com</a></h4>
                </div>
                <div class="col-md-3 social-w3l">
                    <div class="icon-w3">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    </div>
                    <h3>Social media</h3>
                    <ul>
                        <li><a href="https://facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i><span class="text">Facebook</span></a></li>
                        <li class="twt"><a href="https://twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i><span class="text">Twitter</span></a></li>
                        <li class="ggp"><a href="https://google.com"><i class=" fa fa-google-plus" aria-hidden="true"></i><span class="text">Google+</span></a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
                <form action="#" method="post">
                    <input type="text" name="your name" placeholder="FIRST NAME" required="">
                    <input type="text" name="your name" placeholder="LAST NAME" required="">
                    <input type="text" name="your email" placeholder="EMAIL" required="">
                    <input type="text" name="subject" placeholder="SUBJECT" required="">
                    <textarea name="your message" placeholder="YOUR MESSAGE" required=""></textarea>
                    <input type="submit" value="SEND MESSAGE">
                </form>
            </div>
        </div>
    </div>
    <!-- //contact -->

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
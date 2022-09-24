<!-- <div class="fixed-bottom"> -->
    <div class="footer">
            <div class="container">
                <div class="col-md-5 w3ls_footer_grid1_left">
                    <p>&copy; 2022 Thanh Movies. All rights reserved | Lê Nhật Thanh - 187060090</p>
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
<!-- </div> -->
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
            /*
            	var defaults = {
            	containerID: 'toTop', // fading element id
            	containerHoverID: 'toTopHover', // fading element hover id
            	scrollSpeed: 1200,
            	easingType: 'linear' 
            	};
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!-- //here ends scrolling icon -->
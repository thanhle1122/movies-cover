<?php
if (session_id() === '') {
    session_start();
}

include_once __DIR__ . '/../../dbconnect.php';

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $pass = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users(username, `password`, email, phone) VALUES('$name', '$pass', '$email', '$phone')";
    $result = mysqli_query($conn, $sql);
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sqlAdmin = "SELECT * FROM users WHERE email = '$email' AND ut_id = '1'";

    $sqlUser = "SELECT * FROM users WHERE email = '$email' AND ut_id = '2'";

    $resultAdmin = mysqli_query($conn, $sqlAdmin);
    // var_dump($resultAdmin);die;
    $resultUser = mysqli_query($conn, $sqlUser);
    // var_dump($resultUser);die;
    $userData = mysqli_fetch_assoc($resultUser);
    $checkEmail = mysqli_num_rows($resultUser);
    if ($checkEmail == 1) {

        $checkPass = password_verify($password, $userData['password']);

        if ($checkPass) {
            // Lưu vào Session
            $_SESSION['user'] = $userData;
            header('location: index.php');
        } else {
            echo '<script>alert("Sai mật khẩu");</script>';
        }
    } else {
        echo '<script>alert("Email không tồn tại");</script>';
    };

    if (mysqli_num_rows($resultAdmin) == 1) {
        $_SESSION['admin'] = mysqli_fetch_assoc($resultAdmin);
        // var_dump($_SESSION);die;
        header('location: admin/index.php');
    } else {
        // echo 'Không đúng tài khoản';
    };
}

$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
?>

<div class="header">
    <div class="container" style="display:flex">
        <div class="w3layouts_logo">
            <a href="/web-xem-phim/index.php">
                <h1>Thanh<span>Movies</span></h1>
            </a>
        </div>
        <div class="w3_search">
            <form action="/web-xem-phim/search.php" method="POST">
                <input type="text" name="key" placeholder="Search">
                <input type="submit" name="search" value="Go">
            </form>
        </div>
        <?php if (isset($user['email'])) { ?>
            <div class="w3l_sign_in_register" style="display:flex;justify-content:end;margin-left: 15px;">
                <ul>
                    <li>
                        <a href="#"><?php echo $user['email'] ?></a>
                    </li>
                </ul>
            </div>
            <div class="w3l_sign_in_register">
                <ul style="padding-left: 0;">
                    <li><a href="/web-xem-phim/logout.php">Logout</a></li>
                </ul>
            </div>
        <?php } else { ?>
            <div class="w3l_sign_in_register" style="display:flex;justify-content:end">
                <ul>
                    <li><a href="#" data-toggle="modal" data-target="#myModal">Login</a></li>
                </ul>
            </div>
        <?php } ?>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //header -->
<!-- bootstrap-pop-up -->
<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Sign In & Sign Up
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <section>
                <div class="modal-body">
                    <div class="w3_login_module">
                        <div class="module form-module">
                            <div class="toggle"><i class="fa fa-times fa-pencil"></i>
                                <div class="tooltip">Click Me</div>
                            </div>
                            <div class="form">
                                <h3>Login to your account</h3>
                                <form action="#" method="post">
                                    <input type="email" name="email" placeholder="Email" id="" required="">
                                    <input type="password" name="password" placeholder="Password" id="" required="">
                                    <input type="submit" value="Login">
                                </form>
                            </div>
                            <div class="form">
                                <h3>Create an account</h3>
                                <form action="#" method="post">
                                    <input type="text" name="name" placeholder="Username" required="">
                                    <input type="password" name="password" placeholder="Password" required="">
                                    <input type="email" name="email" placeholder="Email Address" required="">
                                    <input type="text" name="phone" placeholder="Phone Number" required="">
                                    <input type="submit" value="Register">
                                </form>
                            </div>
                            <div class="cta"><a href="#">Forgot your password?</a></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
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
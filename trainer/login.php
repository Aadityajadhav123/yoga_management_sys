<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT ID FROM tbltrainer WHERE Tname = :username and Temail = :password";

    $query = $dbh->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);


    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            $_SESSION['ycrsaid'] = $result['ID'];
           
        }
       // localStorage.setItem("user_login", $result['ID'])
        if (!empty($_POST["remember"])) {
            
            //COOKIES for username
            setcookie("user_login", $_POST["username"], time() + (10 * 365 * 24 * 60 * 60));
            //COOKIES for password
            setcookie("userpassword", $_POST["password"], time() + (10 * 365 * 24 * 60 * 60));
        } else {
            if (isset($_COOKIE["user_login"])) {
                setcookie("user_login", "");
                if (isset($_COOKIE["userpassword"])) {
                    setcookie("userpassword", "");
                }
            }
        }
        $_SESSION['login'] = $_POST['username'];
        // echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
        header('Location: dashboard.php');
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}

?>
<!DOCTYPE html>
<html>

<head>

    <title>Yoga Classes Registration System | Log in</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        .login-page {
            /* background-image: linear-gradient(rgb(0 0 0 / 87%), rgb(0 0 0 / 88%)), url("https://wallpaperbat.com/img/381058-yoga-hd-wallpaper-find-best-latest-yoga-hd-wallpaper-for-your-pc.jpg"); */
            background-image: url('https://tympanus.net/Development/AnimatedHeaderBackgrounds/img/demo-1-bg.jpg');
            height: 261px;
            background-size: cover;
            background-attachment: fixed;
        }
    </style>
</head>

<body class="demo-1">
    <div class="hold-transition login-page large-header" id="large-header">
        <canvas id="demo-canvas" style="position: absolute;" width="auto" height="261"></canvas>
        <p><a href="../index.php"><img src="pngegg.png" height="150" width="200"></a></p>
        <div class="login-box ">

            <div class="login-logo">
              <marquee direction=""><a href="login.php" style="color: white;">YCRS Trainer Admin</a></marquee>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg"><marquee direction="">Sign in to start your session</marquee></p>

                    <form method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" required="true" name="username" value="<?php if (isset($_COOKIE[" user_login "])) {
                                                                                                                echo $_COOKIE[" user_login "];
                                                                                                            } ?>" placeholder="Username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" required="true" placeholder="Password" value="">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8 d-none">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember" name="remember" <?php
                                                                                            if (isset($_COOKIE["user_login"])) { ?> checked <?php } ?> checked>
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-outline-primary btn-block" name="login">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <p class="mb-1">
                        <a href="forgot-password.php">I forgot my password</a>
                    </p>

                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>

    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script src="dist/js/TweenLite.min.js"></script>
		<script src="dist/js/EasePack.min.js"></script>
		<script src="dist/js/rAF.js"></script>
		<script src="dist/js/demo-1.js"></script>

</body>

</html>
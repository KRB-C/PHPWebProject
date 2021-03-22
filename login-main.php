<!DOCTYPE html>
<html lang="en">

<head>
    <title>D Corporate</title>
    <link rel="styleSheet" href="CSS/bootstrap.min.css" type="text/css">
    <link rel="styleSheet" href="CSS/styles.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
</head>

<body>
    <div class=container-fluid>
        <main class="login-main">
            <div class="login-bg"></div>
            <div class="login-container container-fluid">
                <div class="login-form">
                    <a class="home" href="index.html">
                        <div style="margin-bottom: 10px">
                            <img src="Images/Icons/Logo.svg" width="100" height="100" alt="">
                            <p class="loginLogoname" id="logoName">D Corporate</p>
                        </div>
                    </a>
                    <form class="align-middle" method="post" action="login.php">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input name="uname" type="text" class="form-control" placeholder="Username" aria-label="Username" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input name="pword" type="password" class="form-control" placeholder="Password" aria-label="Password" required>
                        </div>
                        <div class="login-btn"><input class="btn btn-lg btn-outline-light" type="submit" value="Login" name="login_btn"></div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <script src="JS/jquery-3.3.1.min.js"></script>
    <script src="JS/popper.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <?php
    session_start();
            
    if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    header("Location: admin.php");
}
    ?>
</body>

</html>

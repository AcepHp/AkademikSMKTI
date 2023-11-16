<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>Login SMK-TI GNC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login.css')?>">
</head>

<body>
    <img class="wave" src="<?php echo base_url('assets/images/wave2.png')?>">
    <div class="container">
        <div class="img">
            <img src="<?php echo base_url('assets/images/guru.png')?>">
        </div>
        <div class="login-content">
            <form action="<?= base_url('auth/do_login') ?>" method="post">
                <img src="<?php echo base_url('assets/images/logo.png') ?>">
                <h2 class="title">Login</h2>
                <?php if(isset($error) && !empty($error)): ?>
                <div class="error-message"><?= $error ?></div>
                <?php endif; ?>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Username</h5>
                        <input type="text" class="input" name="username" id="username">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input" name="password" id="password">
                    </div>
                </div>
                <input type="submit" class="btn" value="Login">
            </form>

        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url('assets/js/login.js')?>"></script>

</body>

</html>
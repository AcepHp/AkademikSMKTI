<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>SMK-TI GNC</title>
</head>

<body>
    <div class="container-fluid p-0" style="background-color: #ffc107; height: 50vh">
        <div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
            <div class="card"
                style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); border-radius: 10px 10px 10px 10px; width: 30%; height: 57%">
                <form action="<?= base_url('auth/editpass/' . $id_users) ?>" method="post">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <img src="<?php echo base_url('assets/images/logo.png') ?>" alt=""
                                style="height: 100px; width: 130px;">
                        </div>
                        <div class="row text-center mt-2">
                            <h3 class="fw-bold">Reset Password</h3>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <?php if(isset($error) && !empty($error)): ?>
                            <div class="alert alert-danger" role="alert"><?= $error ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <span>Password Baru</span>
                                <input type="password" class="input form-control" id="newPassword" name="password"
                                    required>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <span>Konfirmasi Password</span>
                                <input type="password" class="input form-control" id="confirmPassword"
                                    name="confirm_password" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary" value="Submit">Gassss!!!</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

</body>

</html>
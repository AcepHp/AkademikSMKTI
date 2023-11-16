<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard Siswa</title>
    <!-- Custom fonts for this template-->
    <link href="<?=base_url('assets/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?=base_url('assets/')?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?=base_url('assets/')?>css/csssiswa.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar Guru -->
        <?php $this->load->view('Bar/Sidebar_guru'); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- TopBar Guru -->
                <?php $this->load->view('Bar/Navbar_guru'); ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Setting profile</h1>
                    </div>
                    <div id="notification-container">
                        <!-- Pemberitahuan akan muncul di sini -->
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Card kiri -->
                        <div class="container mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="fixed-card card"
                                        style="width: 280px;box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);border-radius: 10px;">
                                        <div class="card" style="margin: 30px auto; width: 220px; border: none;">
                                            <div class="rounded-circle border"
                                                style="width: 156px; height: 156px; padding: 3px; background-color: white; display: flex; justify-content: center; align-items: center; margin: 0 auto;">
                                                <?php if (isset($this->session->userdata['Foto'])) : ?>
                                                <?php $photoData = base64_encode($this->session->userdata['Foto']); ?>
                                                <img class="card-img-top rounded-circle"
                                                    src="data:image/jpeg;base64,<?= $photoData ?>" alt="Card image"
                                                    style="width: 100%; height: 100%;">
                                                <?php else : ?>
                                                <img class="card-img-top rounded-circle"
                                                    src="<?= base_url('assets/images/avatar2.png') ?>" alt="Card image"
                                                    style="width: 100%; height: 100%;">
                                                <?php endif; ?>
                                            </div>
                                            <div class="card-body text-center">
                                                <p class="card-text"
                                                    style="font-family: Poppins,sans-serif;font-size: 12px;color: #617182;">
                                                    Max Upload Photo 64kb :</p>
                                                <h4 class="card-title"
                                                    style="font-family: Poppins,sans-serif;font-size: 15px; margin-bottom: 0px;">
                                                    <?= isset($guru->Nama_Lengkap) ? $guru->Nama_Lengkap : 'Guru'; ?>
                                                </h4>
                                                <span class="card-title"
                                                    style="font-family: Poppins,sans-serif;font-size: 12px;color: #617182;">SMK
                                                    TI GNC</span>
                                                <br></br>
                                                <!-- Input for image preview -->
                                                <div id="photoPreview" style="display: none;">
                                                    <img id="previewImage" src="" alt="Pratinjau Foto">
                                                </div>
                                                <form id="uploadPhotoForm"
                                                    action="<?= base_url('Guru_profile/update_photo'); ?>" method="post"
                                                    enctype="multipart/form-data">
                                                    <input type="file" id="uploadPhotoInput" name="uploadPhoto"
                                                        accept="image/*" style="display: none;">
                                                    <br>
                                                    <button type="button" id="choosePhotoButton"
                                                        class="btn btn-primary">Pilih Foto</button>
                                                    <!-- Update Photo button -->
                                                    <button class="btn btn-primary" id="updatePhotoBtn"
                                                        style="margin-top: 5px;">Perbarui Foto</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card kedua yaitu Data akun -->
                                <div class="col-md-6">
                                    <div class="card"
                                        style="width: 680px; margin-left: -200px; box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                                        <h4 class="card-title"
                                            style="font-family: Poppins,sans-serif;font-size: 14px; margin-left: 30px; margin-top: 30px; position: relative;">
                                            Data Akun Anda
                                            <div
                                                style="position: absolute;top:35px; bottom: -5px; left: 0; width: 99%; height: 2px; background-color: #002147;">
                                            </div>
                                        </h4>
                                        <div class="card"
                                            style="margin: 30px;padding-left: 30px; width: 640px; border: none;">
                                            <form class="form-horizontal" style="padding-left: 40px;" method="post"
                                                action="<?= base_url('Guru_profile/change_password'); ?>">
                                                <!-- Menampilkan pesan kesalahan jika ada -->
                                                <div class="form-group">
                                                    <label for="pwdsekarang" style="font-size: 13px;">Masukkan Password
                                                        Anda:</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control no-border" type="password"
                                                            id="pwdsekarang" name="pwdsekarang">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pwdbaru" style="font-size: 13px;">Password Baru:</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control no-border" type="password"
                                                            id="pwdbaru" name="pwdbaru">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Ubah Password</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Card ketiga yaitu Data guru -->
                                    <div class="card"
                                        style="width: 680px; margin-top: 10px; margin-left: -200px; box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                                        <h4 class="card-title"
                                            style="font-family: Poppins,sans-serif; font-size: 14px; margin-left: 30px; margin-top: 30px; position: relative;">
                                            Data Guru
                                            <div
                                                style="position: absolute; top: 35px; bottom: -5px; left: 0; width: 99%; height: 2px; background-color: #002147;">
                                            </div>
                                        </h4>
                                        <div class="card"
                                            style="margin: 30px; padding-left: 30px; width: 640px; border: none;">
                                            <form class="form-horizontal" style="padding-left: 40px;" method="post"
                                                action="<?= base_url('Guru_profile/update_data'); ?>">
                                                <div class="form-group">
                                                    <label for="NIP" style="font-size: 13px;">NIP:</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control no-border" id="NIP" type="text"
                                                            name="NIP"
                                                            value="<?= isset($guru->NIP) ? $guru->NIP : ''; ?>"
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Nama_Lengkap" style="font-size: 13px;">Nama
                                                        Lengkap:</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control no-border" id="Nama_Lengkap"
                                                            type="text" name="Nama_Lengkap"
                                                            value="<?= isset($guru->Nama_Lengkap) ? $guru->Nama_Lengkap : ''; ?>"
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Tempat_Lahir" style="font-size: 13px;">Tempat
                                                        Lahir:</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control no-border" id="Tempat_Lahir"
                                                            type="text" name="Tempat_Lahir"
                                                            value="<?= isset($guru->Tempat_Lahir) ? $guru->Tempat_Lahir : ''; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Tanggal_Lahir" style="font-size: 13px;">Tanggal
                                                        Lahir:</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control no-border" id="Tanggal_Lahir"
                                                            type="date" name="Tanggal_Lahir"
                                                            value="<?= isset($guru->Tanggal_Lahir) ? $guru->Tanggal_Lahir : ''; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Jenis_kelamin" style="font-size: 13px;">Jenis
                                                        Kelamin:</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control no-border" id="Jenis_kelamin"
                                                            name="Jenis_kelamin" readonly>
                                                            <option value="Laki-laki"
                                                                <?= (isset($guru->Jenis_Kelamin) && $guru->Jenis_Kelamin === 'Laki-laki') ? 'selected' : ''; ?>>
                                                                Laki-laki</option>
                                                            <option value="Perempuan"
                                                                <?= (isset($guru->Jenis_Kelamin) && $guru->Jenis_Kelamin === 'Perempuan') ? 'selected' : ''; ?>>
                                                                Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Alamat" style="font-size: 13px;">Alamat:</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control no-border" id="Alamat"
                                                            name="Alamat"
                                                            rows="3"><?= isset($guru->Alamat) ? $guru->Alamat : ''; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Pendidikan" style="font-size: 13px;">Pendidikan:</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control no-border" id="Pendidikan"
                                                            type="text" name="Pendidikan"
                                                            value="<?= isset($guru->Pendidikan) ? $guru->Pendidikan : ''; ?>"
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Tanggal_Mulai" style="font-size: 13px;">Tanggal
                                                        Mulai:</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control no-border" id="Tanggal_Mulai"
                                                            type="date" name="Tanggal_Mulai"
                                                            value="<?= isset($guru->Tanggal_Mulai) ? $guru->Tanggal_Mulai : ''; ?>">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update Data</button>
                                            </form>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <!-- End of Main Content -->
                            <!-- Footer -->
                           <?php $this->load->view('Bar/Footer_admin'); ?>
                            <!-- End of Footer -->
                        </div>
                        <!-- End of Content Wrapper -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php $this->load->view('Bar/Logout_modal'); ?>
    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?=base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?=base_url('assets/')?>js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="<?=base_url('assets/')?>vendor/chart.js/Chart.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="<?=base_url('assets/')?>js/demo/chart-area-demo.js"></script>
    <script src="<?=base_url('assets/')?>js/demo/chart-pie-demo.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const uploadPhotoInput = document.getElementById("uploadPhotoInput");
        const choosePhotoButton = document.getElementById("choosePhotoButton");
        const updatePhotoButton = document.getElementById("updatePhotoBtn");
        const photoPreview = document.getElementById("photoPreview");
        const previewImage = document.getElementById("previewImage");

        choosePhotoButton.addEventListener("click", function() {
            uploadPhotoInput.click();
        });

        uploadPhotoInput.addEventListener("change", function() {
            const selectedFile = uploadPhotoInput.files[0];

            if (selectedFile) {
                const reader = new FileReader();

                reader.onload = function(event) {
                    previewImage.src = event.target.result;
                    previewImage.style.maxWidth = "100%";
                    previewImage.style.maxHeight = "200px";
                    photoPreview.style.display = "block";
                };

                reader.readAsDataURL(selectedFile);
            }
        });

        updatePhotoButton.addEventListener("click", function() {
            const selectedFile = uploadPhotoInput.files[0];

            if (selectedFile) {
                const formData = new FormData();
                formData.append('uploadPhoto', selectedFile);

                updatePhoto(formData);
            }
        });

        function updatePhoto(photoData) {
            console.log('Mengirim permintaan pembaruan foto...');

            fetch('<?= base_url('Guru_profile/update_photo'); ?>', {
                    method: 'POST',
                    body: photoData
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Respons JSON diterima:', data);

                    if (data.success) {
                        // Buat pemberitahuan Bootstrap untuk pesan keberhasilan
                        let successAlert = `
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Foto berhasil diperbarui
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        `;
                        // Sisipkan pemberitahuan ke dalam elemen dengan ID "notification-container"
                        document.getElementById("notification-container").innerHTML =
                            successAlert;

                        // Muat ulang halaman settingprofile.php
                        window.location.reload(); // Ini adalah perubahan yang ditambahkan
                    } else {
                        // Buat pemberitahuan Bootstrap untuk pesan kesalahan
                        let errorAlert = `
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Terjadi kesalahan saat memperbarui foto
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        `;
                        // Sisipkan pemberitahuan ke dalam elemen dengan ID "notification-container"
                        document.getElementById("notification-container").innerHTML =
                            errorAlert;
                    }
                })
                .catch(error => {
                    // Buat pemberitahuan Bootstrap untuk pesan kesalahan
                    let errorAlert = `
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Terjadi kesalahan saat memperbarui foto
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    `;
                    // Sisipkan pemberitahuan ke dalam elemen dengan ID "notification-container"
                    document.getElementById("notification-container").innerHTML =
                        errorAlert;
                });
        }
    });
    </script>
    <script>
    function showNotification(message, type) {
        const notificationContainer = document.getElementById('notification-container');

        const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';

        // Buat elemen pemberitahuan
        const notification = document.createElement('div');
        notification.classList.add('alert', 'alert-dismissible', 'fade', 'show', alertClass);
        notification.role = 'alert';
        notification.innerHTML = `
${message}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
`;

        // Sisipkan pemberitahuan ke dalam container
        notificationContainer.innerHTML = '';
        notificationContainer.appendChild(notification);
    }

    // Contoh penggunaan:
    // Tampilkan pemberitahuan kesalahan
    showNotification('Terjadi kesalahan saat memperbarui foto', 'error');
    // Tampilkan pemberitahuan keberhasilan
    showNotification('Foto berhasil diperbarui', 'success');
    </script>
</body>

</html>
$(function(){
    $("#form-total").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        autoFocus: true,
        transitionEffectSpeed: 500,
        titleTemplate : '<span class="title">#title#</span>',
        labels: {
            previous : 'Previous',
            next : 'Next Step',
            finish : 'Confirm',
            current : ''
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            // Validasi formulir pada setiap langkah di sini jika diperlukan
            // Return true jika formulir valid, dan false jika tidak valid
            if (currentIndex < newIndex) {
                return validateForm(currentIndex);
            }
            return true;
        },
        onFinishing: function (event, currentIndex) {
            // Pada saat pengguna mencapai langkah terakhir (konfirmasi), panggil fungsi untuk menyimpan data
            if (currentIndex === $("#form-total").find("section").length - 1) {
                if (validateForm(currentIndex)) {
                    saveData();
                }
            }
            return true;
        }
    });
    
    function validateForm(stepIndex) {
        // Validasi formulir pada langkah tertentu di sini
        // Return true jika formulir valid, dan false jika tidak valid
        // Anda dapat menggunakan kode validasi sesuai dengan kebutuhan Anda
        // Contoh sederhana: validasi jika semua input yang diperlukan telah diisi
        var isValid = true;
        $("#form-total").find("section").eq(stepIndex).find("input[type='text','date']").each(function() {
            if ($(this).val() === "") {
                isValid = false;
                return false; // Hentikan loop jika salah satu input kosong
            }
        });
        return isValid;
    }

    function saveData() {
        // Ambil semua data dari formulir dan kirimkan ke server menggunakan Ajax
        var formData = {
            NISN: $("#NISN").val(),
            pilihan_satu: $("#pilihan_satu").val(),
            pilihan_dua: $("#pilihan_dua").val(),
            Nama_lengkap: $("#Nama_lengkap").val(),
            Jenis_kelamin: $("#Jenis_kelamin").val(),
            asal_sekolah: $("#asal_sekolah").val(),
            Tempat_lahir: $("#Tempat_lahir").val(),
            Tanggal_lahir: $("#Tanggal_lahir").val(),
            agama: $("#agama").val(),
            Alamat: $("#Alamat").val(),
            provinsi: $("#provinsi").val(),
            kabupaten_kota: $("#kabupaten_kota").val(),
            kecamatan: $("#kecamatan").val(),
            kelurahan_desa: $("#kelurahan_desa").val(),
            dusun_kampung: $("#dusun_kampung").val(),
            rt: $("#rt").val(),
            rw: $("#rw").val(),
            kode_pos: $("#kode_pos").val(),
            Tinggal_dengan: $("#Tinggal_dengan").val(),
            nomor_telp: $("#nomor_telp").val(),
            kip: $("#kip").val(),
            kis: $("#kis").val(),
            sktm: $("#sktm").val(),
            Nama_ayah: $("#Nama_ayah").val(),
            tahun_lahir_ayah: $("#tahun_lahir_ayah").val(),
            pendidikan_ayah: $("#pendidikan_ayah").val(),
            pekerjaan_ayah: $("#pekerjaan_ayah").val(),
            penghasilan_ayah: $("#penghasilan_ayah").val(),
            Nama_ibu: $("#Nama_ibu").val(),
            tahun_lahir_ibu: $("#tahun_lahir_ibu").val(),
            pendidikan_ibu: $("#pendidikan_ibu").val(),
            pekerjaan_ibu: $("#pekerjaan_ibu").val(),
            penghasilan_ibu: $("#penghasilan_ibu").val(),
            No_telp_ortu: $("#No_telp_ortu").val(),
            Nama_wali: $("#Nama_wali").val(),
            tahun_lahir_wali: $("#tahun_lahir_wali").val(),
            pendidikan_wali: $("#pendidikan_wali").val(),
            pekerjaan_wali: $("#pekerjaan_wali").val(),
            penghasilan_wali: $("#penghasilan_wali").val(),
            No_telp_wali: $("#No_telp_wali").val(),
            jarak_tempuh: $("#jarak_tempuh").val(),
            waktu_tempuh: $("#waktu_tempuh").val(),
            tb: $("#tb").val(),
            bb: $("#bb").val(),
            jumlah_saudara: $("#Nama_lengkap").val(),
            Tahun_akademik: $("#Tahun_akademik").val(),
            // Tambahkan data lain sesuai dengan formulir Anda
        };

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('PPDB/simpan_pendaftaran'); ?>",
            data: formData,
            success: function(response) {
                // Handle respons dari server jika diperlukan
                // Misalnya, tampilkan pesan sukses atau redirect ke halaman lain
                alert("Data berhasil disimpan!");
                window.location.href = "<?php echo site_url('PPDB/simpan_pendaftaran'); ?>"; // Gantilah dengan URL yang sesuai
            },
            error: function() {
                // Handle kesalahan jika terjadi
                // Misalnya, tampilkan pesan error
                alert("Terjadi kesalahan saat menyimpan data.");
            }
        });
    }
});

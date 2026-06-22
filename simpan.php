<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form HTML
    $nama     = mysqli_real_escape_string($conn, $_POST['nama']);
    $alamat   = mysqli_real_escape_string($conn, $_POST['alamat']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $komentar = mysqli_real_escape_string($conn, $_POST['komentar']);

    if (!empty($nama) && !empty($alamat) && !empty($email) && !empty($komentar)) {
        // Query disesuaikan: nama tabel `buku tamu`, dan kolomnya Nama, Alamat, Email, Komentar
        $query = "INSERT INTO `buku tamu` (Nama, Alamat, Email, Komentar) VALUES ('$nama', '$alamat', '$email', '$komentar')";
        
        if (mysqli_query($conn, $query)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Gagal menyimpan data: " . mysqli_error($conn);
        }
    } else {
        echo "Semua data harus diisi!";
    }
}
?>

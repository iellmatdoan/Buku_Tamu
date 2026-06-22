<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Buku Tamu - jQuery Mobile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>

    <div data-role="page" id="home">
        <div data-role="header" data-theme="b">
            <h1>Buku Tamu</h1>
        </div>

        <div role="main" class="ui-content">
            <h3>Isi Data Buku Tamu</h3>
            <form action="simpan.php" method="post" data-ajax="false">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" placeholder="Masukkan nama" required>

                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat" id="alamat" placeholder="Masukkan alamat" required>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Masukkan email" required>

                <label for="komentar">Komentar/Pesan:</label>
                <textarea name="komentar" id="komentar" placeholder="Tulis komentar..." required></textarea>

                <button type="submit" class="ui-btn ui-btn-b ui-corner-all">Kirim Data</button>
            </form>

            <br>
            <a href="#data" class="ui-btn ui-icon-grid ui-btn-icon-left ui-corner-all">Lihat Daftar Tamu</a>
        </div>

        <div data-role="footer" data-position="fixed" data-theme="b">
            <h4>STIKOM Ambon &copy; 2026</h4>
        </div>
    </div>

    <div data-role="page" id="data">
        <div data-role="header" data-theme="b">
            <a href="#home" class="ui-btn ui-icon-home ui-btn-icon-notext ui-corner-all">Home</a>
            <h1>Daftar Tamu</h1>
        </div>

        <div role="main" class="ui-content">
            <h3>Data yang Terdaftar</h3>
            <ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="Cari nama tamu...">
                <?php
                // Query mengambil data diurutkan dari yang terbaru (berdasarkan kolom 'No')
                $sql = "SELECT * FROM `buku tamu` ORDER BY No DESC";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<li>";
                        echo "<h2>" . htmlspecialchars($row['Nama']) . "</h2>";
                        echo "<p><strong>Alamat:</strong> " . htmlspecialchars($row['Alamat']) . "</p>";
                        echo "<p><strong>Email:</strong> " . htmlspecialchars($row['Email']) . "</p>";
                        echo "<p><strong>Komentar:</strong> " . htmlspecialchars($row['Komentar']) . "</p>";
                        echo "</li>";
                    }
                } else {
                    echo "<li>Belum ada data tamu.</li>";
                }
                ?>
            </ul>
        </div>

        <div data-role="footer" data-position="fixed" data-theme="b">
            <h4>STIKOM Ambon &copy; 2026</h4>
        </div>
    </div>

</body>
</html>

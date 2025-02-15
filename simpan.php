<?php
// Koneksi ke database
$host = "localhost";
$user = "root";  // Ganti jika menggunakan user lain
$pass = "";  // Isi password database jika ada
$db = "perasaan_db";

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $emoji = $_POST['emoji'];

    // Simpan ke database
    $sql = "INSERT INTO perasaan (nama, emoji) VALUES ('$nama', '$emoji')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil disimpan!'); window.location.href='index.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi
$conn->close();
?>

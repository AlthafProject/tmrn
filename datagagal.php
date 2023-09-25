<?php
include 'config.php';

// Tangkap data dari form HTML
$email = $_GET['email'];
$password = $_GET['password'];

// Periksa apakah email dan password tidak kosong
if (!empty($email) && !empty($password)) {
    // Prevent SQL injection by using prepared statements
    $query = "SELECT * FROM user WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $stmt->store_result();
    $result = $stmt->num_rows;

    if ($result == 1) {
        // Login sukses
        echo "Selamat datang";
    } else {
        // Login gagal
        echo "Login gagal. Periksa kembali email dan password Anda.";
       
    }

    // Tutup statement
    $stmt->close();
} else {
    // Data tidak lengkap, arahkan kembali ke halaman Login.php
    echo "Data Anda tidak lengkap";
}

// Tutup koneksi ke database
$conn->close();
?>

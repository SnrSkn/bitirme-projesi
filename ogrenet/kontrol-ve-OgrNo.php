<?php
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $OgrNo = htmlspecialchars($_POST['OgrNo']);
  $sifre = hash('sha256', $_POST['sifre']); // SHA-256 ile şifreleme

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "debis";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM ogrenci WHERE OgrNo = ? AND sifre = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $OgrNo, $sifre);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $_SESSION['ogrNo'] = $OgrNo;

    $_SESSION['last_login_time'] = time();

    header("Location: ogrenet.php");
    exit();
  } else {
    $error = "Öğrenci numarası veya şifre yanlış!";
  }

  $stmt->close();
  $conn->close();
}
?>
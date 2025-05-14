<?php
require "baglan.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/PHPMailer/src/Exception.php';
require '/PHPMailer/src/PHPMailer.php';
require '/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['token'])) {
    $token = $_GET['token'];

    // Tokeni kontrol et
    $sql = "SELECT * FROM ogrenci WHERE code = '$token'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header('Location: sifre-yenileme.php?token=' . $token);
        exit();
    } else {
        echo 'Geçersiz token.';
    }
}
$conn->close();
?>

<form method="get">
    <input type="text" name="token" placeholder="Token'ınızı girin">
    <button type="submit">Doğrula</button>
</form>

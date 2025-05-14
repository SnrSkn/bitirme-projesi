<?php
require "baglan.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    $sql = "SELECT * FROM ogrenci WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $token = bin2hex(random_bytes(32));

        $sql = "UPDATE ogrenci SET code = '$token' WHERE email = '$email'";

        if ($conn->query($sql) === TRUE) {
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPKeepAlive = true;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->Host = "smtp.gmail.com";
            $mail->Username = 'api';
            $mail->Password = '3c6962b76322d4698246450bce96303b';

            $mail->setFrom('sakinsoner890@gmail.com');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Şifre Sıfırlama İsteği';
            $mail->Body = 'Şifrenizi sıfırlamak için aşağıdaki linke tıklayınız: <a href="http://localhost/sifre-yenileme.php?token=' . $token . '">Şifre Sıfırlama</a>';

            if ($mail->send()) {
                echo 'Mail gönderildi. Lütfen mailinizi kontrol edin.';
                header('Location: sifre-yenileme.php');
                exit();
            } else {
                echo 'Mail gönderirken hata oluştu: ' . $mail->ErrorInfo;
            }
        } else {
            echo "Hata: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo 'Böyle bir mail adresi bulunamadı.';
    }
}
$conn->close();
?>

<form method="post">
    <input type="email" name="email" placeholder="Mail adresinizi girin">
    <button type="submit">Gönder</button>
</form>
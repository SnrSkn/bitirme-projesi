<?php
require "baglan.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    $token = $_POST['token'];

    // Şifreyi güncelle
    $sql = "UPDATE ogrenci SET sifre = '$password', code = NULL WHERE code = '$token'";
    if ($conn->query($sql) === TRUE) {
        echo 'Şifreniz başarıyla güncellendi.';
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<form method="post">
    <input type="password" name="password" placeholder="Yeni şifre">
    <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
    <button type="submit">Değiştir</button>
</form>

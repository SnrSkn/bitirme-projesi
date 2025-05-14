<?php
require "baglan.php";

if (!isset($_SESSION['ogrNo'])) {
    header("Location: index.php");
    exit();
}

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eskiSifre = hash('sha256', $_POST['eskiSifre']);
    $yeniSifre = htmlspecialchars($_POST['yeniSifre']);
    $yeniSifreTekrar = htmlspecialchars($_POST['yeniSifreTekrar']);
    $ogrNo = $_SESSION['ogrNo'];

    $stmt = $conn->prepare("SELECT sifre FROM ogrenci WHERE OgrNo = ?");
    $stmt->bind_param("s", $ogrNo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $dbSifre = $row['sifre'];

        if ($eskiSifre === $dbSifre) {
            if ($yeniSifre !== $yeniSifreTekrar) {
                $error = "Yeni şifreler uyuşmuyor.";
            } else {
                $updateStmt = $conn->prepare("UPDATE ogrenci SET sifre = ? WHERE OgrNo = ?");
                $updateStmt->bind_param("si", $yeniSifre, $ogrNo);
                $updateStmt->execute();

                $error = "Şifre başarıyla güncellendi. Giriş ekranına yönlendiriliyorsunuz.";
                echo '<script type="text/javascript">';
                echo 'setTimeout(function(){ window.location.href = "cikis.php"; }, 1000);';
                echo '</script>';
            }
        } else {
            $error = "Eski şifre yanlış.";
        }
    } else {
        $error = "Kullanıcı bulunamadı.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OgreNet</title>
    <link rel="icon" href="img/deu_amblem.png" type="image/png">
    <meta name="keywords" content="Python,Java,JapaScript " />
    <meta name="description" content="ogrenet" />
    <!--Font-Google-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet" />
    <!--Css-->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="css/mobile.css">
    <style>

    </style>
</head>

<body>
    <header>
        <?php
        // Kullanıcı bilgilerini göster
        $stmt = $conn->prepare($sql3);
        $stmt->bind_param("s", $_SESSION['ogrNo']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<table style='width: 250px;'>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td><b>Kullanıcı</b></td><td><b>" . htmlspecialchars($row["Isim"]) . " " . htmlspecialchars($row["Soyisim"]) . "</b></td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Veri bulunamadı</p>";
        }
        ?>
        <?php require "header.php"; ?>
    </header>
    <section>
        <div style="margin-top: 10vh;" class="form-container">
            <form class="section-div" method="post" action="">
                <label class="form-label" for="eskiSifre">Eski Şifre</label>
                <input type="password" id="eskiSifre" name="eskiSifre" placeholder="Eski Şifre" required>

                <label class="form-label" for="yeniSifre">Yeni Şifre</label>
                <input type="password" id="yeniSifre" name="yeniSifre" placeholder="Yeni Şifre" required>

                <label class="form-label" for="yeniSifreTekrar">Yeni Şifre Tekrar</label>
                <input type="password" id="yeniSifreTekrar" name="yeniSifreTekrar" placeholder="Yeni Şifre Tekrar" required>

                <input type="submit" value="Şifre Değiştir" onclick="return confirm('Şifrenizi değiştirmek istediğinizden emin misiniz?', 'Evet', 'Hayır')">
            </form>
            <?php
            if (!empty($error)) {
                echo "<label style='color: #dc3545;' class='form-label'>$error</label>";
            }
            ?>
        </div>
    </section>
    <script src="scripts.js"></script>
</body>

</html>
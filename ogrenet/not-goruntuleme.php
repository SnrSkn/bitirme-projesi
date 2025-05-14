<?php
require "baglan.php";

if (!isset($_SESSION['ogrNo'])) {
    header("Location: index.php");
    exit();
}

$ogrNo = $_SESSION['ogrNo'];

// Dersleri veritabanından çek
$dersler = array();
$sql = "SELECT dersKodu, dersAdi FROM dersler";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dersler[$row['dersKodu']] = $row['dersAdi'];
    }
} else {
    echo "Veritabanında ders bulunamadı!";
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OgreNet</title>
    <link rel="icon" href="img/deu_amblem.png" type="image/png">
    <meta name="keywords" content="Python,Java,JapaScript " />
    <meta name="description" content="ogrenet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="css/mobile.css">
</head>

<body>
    <header>
        <?php
        $stmt = $conn->prepare($sql3);
        $stmt->bind_param("s", $ogrNo);
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
    <section class="content">
        <div align="center" class="container">
            <?php
            $stmt = $conn->prepare($sql3);
            $stmt->bind_param("s", $ogrNo);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<table style='width: 700px;'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>ADI SOYADI</td><td>" . htmlspecialchars($row["Isim"]) . " " . htmlspecialchars($row["Soyisim"]) . "</td></tr>";
                    echo "<tr><td>ÖĞRENCİ NO</td><td>" . htmlspecialchars($row["OgrNo"]) . "</td></tr>";
                    echo "<tr><td>SINIF</td><td>" . htmlspecialchars($row["Sinif"]) . "</td></tr>";
                    echo "<tr><td>FAKÜLTE ADI</td><td>" . htmlspecialchars($row["FakulteAdi"]) . "</td></tr>";
                    echo "<tr><td>BÖLÜM ADI</td><td>" . htmlspecialchars($row["BolumAdi"]) . "</td></tr>";
                    echo "<tr><td>DERS SİSTEMİ</td><td>" . htmlspecialchars($row["DersSistemi"]) . "</td></tr>";
                    echo "<tr><td>DANIŞMAN ADI</td><td>" . htmlspecialchars($row["DanismanAdi"]) . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Veri bulunamadı</p>";
            }
            ?>
            <div class="select-wrapper" style="margin-top: 20px;">
                <form method="post" action="">
                    <select name="dersKodu" id="dersKodu" onchange="this.form.submit();">
                        <?php if (!isset($_POST['dersKodu'])) : ?>
                            <option value="" selected disabled hidden>Ders Seçiniz</option>
                        <?php endif; ?>
                        <?php foreach ($dersler as $dersKodu => $dersAdi) : ?>
                            <option value="<?php echo htmlspecialchars($dersKodu); ?>" <?php if (isset($_POST['dersKodu']) && $_POST['dersKodu'] == $dersKodu)
                                                                                            echo 'selected'; ?>><?php echo htmlspecialchars($dersAdi); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </form>
            </div>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $dersKodu = htmlspecialchars($_POST['dersKodu']);

                // Ders bilgilerini getirme
                $sql = "SELECT DISTINCT ogrenci.Isim, ogrenci.Soyisim, notlar.OgrNo, notsorgulama.Sinif, notsorgulama.SubeAdi, 
                notsorgulama.FakulteAdi, notsorgulama.OgretimGorevlisiMail, notsorgulama.BolumAdi, 
                notsorgulama.DersSistemi, notsorgulama.DanismanAdi, notsorgulama.ToplamKredi, 
                notsorgulama.DersTuru, notsorgulama.TekrarSayisi, notsorgulama.OgretimGorevlisi, 
                notsorgulama.DevamDurumu, notsorgulama.DersKodu, dersler.DersAdi
                FROM notsorgulama
                INNER JOIN notlar ON notsorgulama.DersKodu = notlar.DersKodu
                INNER JOIN dersler ON notsorgulama.DersKodu = dersler.DersKodu
                INNER JOIN ogrenci ON notlar.OgrNo = ogrenci.OgrNo
                WHERE notsorgulama.DersKodu = ? AND notlar.OgrNo = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $dersKodu, $ogrNo);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<table>";
                        echo "<tr><th colspan='2'>" . htmlspecialchars($row["DersKodu"]) . " - " . htmlspecialchars($row["DersAdi"]) . "</th></tr><br>";
                        echo "<td class='info-table'>";
                        echo "<table>";
                        echo "<tr><td>FAKÜLTE ADI</td><td>" . htmlspecialchars($row["FakulteAdi"]) . "</td></tr>";
                        echo "<tr><td>BÖLÜM ADI</td><td>" . htmlspecialchars($row["BolumAdi"]) . "</td></tr>";
                        echo "<tr><td>ŞUBE ADI</td><td>" . htmlspecialchars($row["SubeAdi"]) . "</td></tr>";
                        echo "<tr><td>TOPLAM KREDİ</td><td>" . htmlspecialchars($row["ToplamKredi"]) . "</td></tr>";
                        echo "<tr><td>DERS TÜRÜ</td><td>" . htmlspecialchars($row["DersTuru"]) . "</td>";
                        echo "<tr><td>TEKRAR SAYISI</td><td>" . htmlspecialchars($row["TekrarSayisi"]) . "</td></tr>";
                        echo "<tr><td>ÖĞRETİM GÖREVLİSİ</td><td>" . htmlspecialchars($row["OgretimGorevlisi"]) . '<a href="mailto:' . htmlspecialchars($row["OgretimGorevlisiMail"]) . '" class="mail-Renk">' . " " . "(" . htmlspecialchars($row["OgretimGorevlisiMail"]) . ')</a>' . "</td></tr>";
                        echo "<tr><td>DEVAM DURUMU</td><td>" . htmlspecialchars($row["DevamDurumu"]) . "</td></tr>";
                        echo "</table>";
                        echo "</td>";
                    }
                } else {
                    echo "<p>Veri bulunamadı</p>";
                }

                if (isset($_POST['dersKodu'])) {
                    $selectedDersKodu = $_POST['dersKodu'];

                    // Todoo: ders koduna göre ortalama bilgilerini çeker.
                    $sql = "SELECT (AVG(SizinNotunuz)) as OrtalamaNot FROM notlar WHERE DegerlendirmeAdi='Vize' AND DersKodu='" . $conn->real_escape_string($selectedDersKodu) . "'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0 || $result2->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $ortalamaNot = $row['OrtalamaNot'];
                        // Todoo: rtrim ortalamadaki , sonrası uzun 0 değerlerini temizler.
                        $ortalamaNot = rtrim($ortalamaNot, '.0');
                    }
                }

                $stmt2 = $conn->prepare($sql2);
                $stmt2->bind_param("ss", $dersKodu, $ogrNo);
                $stmt2->execute();
                $result2 = $stmt2->get_result();

                if ($result2->num_rows > 0) {
                    echo "<td class='grade-table'>";
                    echo "<table>";
                    echo "<tr><th>DEĞERLENDİRME ADI</th>" . "<th>İLAN TARİHİ</th>" . "<th>SINIF ORT.</th>" . "<th>Sizin Notunuz</th></tr>";

                    // Ortalama yazdırmak için
                    $row = $result2->fetch_assoc();
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["DegerlendirmeAdi"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["IlanTarihi"]) . "</td>";
                    echo "<td>" . $ortalamaNot . "</td>";
                    echo "<td>" . htmlspecialchars(rtrim($row["SizinNotunuz"], '.0')) . "</td>";
                    $not = htmlspecialchars($row["notSureci"]);
                    echo "</tr>";

                    // Ortalama dışındakiler
                    while ($row = $result2->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["DegerlendirmeAdi"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["IlanTarihi"]) . "</td>";
                        echo "<td></td>";
                        echo "<td>" . htmlspecialchars(rtrim($row["SizinNotunuz"], '.0')) . "</td>";
                        $not = htmlspecialchars($row["notSureci"]);
                        echo "</tr>";
                    }

                    echo "</table>";
                    echo "</td>";
                    echo "<tr><td colspan='2' class='footer'>" . $not . "</td></tr>";
                }

                echo "<table cellspacing='0' cellpadding='0'>";
                echo "<tr><td class='note'>";
                echo "*  : SINIF ORTALAMASI SINAVA GİREN TÜM ÖĞRENCİLERİN ARİTMETİK ORTALAMASI ALINARAK HESAPLANMIŞTIR.<br>
                ** : BAŞARI NOTU, FAKÜLTE ÖĞRETİM VE SINAV UYGULAMA ESASLARINA UYGUN OLARAK, DEĞERLENDİRMEYE KATILAN HAM NOT ORTALAMASINA GÖRE BELİRLENMİŞTİR.";
                echo "</td></tr>";
                echo "</table>";
            }
            $conn->close();
            ?>
        </div>
    </section>
    <script src="scripts.js"></script>
</body>

</html>
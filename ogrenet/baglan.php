<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "debis";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

// Ders bilgileri ve öğrenci bilgileri SQL sorgusu
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

// Değerlendirme bilgileri SQL sorgusu
$sql2 = "SELECT DISTINCT notlar.DegerlendirmeAdi, notlar.IlanTarihi, notlar.SizinNotunuz, notlar.notSureci
        FROM notsorgulama
        INNER JOIN notlar ON notsorgulama.DersKodu = notlar.DersKodu
        INNER JOIN dersler ON notsorgulama.DersKodu = dersler.DersKodu
        INNER JOIN ogrenci ON notlar.OgrNo = ogrenci.OgrNo
        WHERE notsorgulama.DersKodu = ? AND notlar.OgrNo = ?";

$sql3 = "SELECT DISTINCT ogrenci.Isim, ogrenci.Soyisim, ogrenci.OgrNo, notsorgulama.Sinif, 
        notsorgulama.FakulteAdi,notsorgulama.BolumAdi, 
        notsorgulama.DersSistemi, notsorgulama.DanismanAdi
        FROM notsorgulama
        INNER JOIN notlar ON notsorgulama.DersKodu = notlar.DersKodu
        INNER JOIN dersler ON notsorgulama.DersKodu = dersler.DersKodu
        INNER JOIN ogrenci ON notlar.OgrNo = ogrenci.OgrNo
        WHERE notlar.OgrNo = ?";

// Veritabanı sorgularını çalıştıran fonksiyon
function executeQuery($conn, $sql, $dersKodu, $ogrNo)
{
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $dersKodu, $ogrNo);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result;
}
?>
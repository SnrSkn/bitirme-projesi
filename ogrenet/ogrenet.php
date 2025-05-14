<?php
require "baglan.php";

if (!isset($_SESSION['ogrNo'])) {
    header("Location: index.php");
    exit();
}

$ogrNo = $_SESSION['ogrNo'];
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
    
    <section>
        <div class="container-ogrenet">
            <div class="card">
                <img src="https://debis.deu.edu.tr/images/debis/haberler.gif" alt="Haberler">
                <div class="card-content">
                    <p>Sayın <b>
                            <?php
                            $stmt = $conn->prepare($sql3);
                            $stmt->bind_param("s", $ogrNo);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo htmlspecialchars($row["Isim"]) . " " . htmlspecialchars($row["Soyisim"]) . "";
                                }
                            } else {
                                echo "<p>Veri bulunamadı</p>";
                            }
                            ?>
                        </b>,</p>
                    <p>Eğer şifrenizi değiştirmek istiyorsanız Kişisel İşlelerim menüsünden şifrenizi
                        değiştirebilirsiniz,
                        veya <a href="#">buraya tıklayınız</a>.</p>
                </div>
            </div>

            <div class="card">
                <img src="https://debis.deu.edu.tr/images/debis/gununsozu.gif" alt="Günün Sözü">
                <div class="card-content">
                    <p>Gençliği yetiştiriniz. Onlara ilim ve irfanın müspet fikirlerini veriniz. Geleceğin aydınlığına
                        onlarla kavuşacaksınız.</p>
                    <p><i><b>Mustafa Kemal Atatürk</b></i></p>
                </div>
            </div>

            <div class="card">
                <img src="https://debis.deu.edu.tr/images/debis/anketler.png" alt="Anketler">
                <div class="card-content">
                    <p>
                        <a href="https://sks.deu.edu.tr/" style="text-decoration:none" target="_blank">
                            DEÜ Sağlık Kültür ve Spor Daire Başkanlığı Burs, Yemek ve Diğer Tüm Haberler İçin Tıklayınız
                        </a>
                    </p>
                    <hr>
                    <p>
                        <a href="https://international.deu.edu.tr/" style="text-decoration:none" target="_blank">
                            DEÜ Dış İlişkiler Koordinatörlüğü, Erasmus, Farabi, Mevlana Tüm Haberler İçin Tıklayınız
                        </a>
                    </p>
                </div>
            </div>

            <div class="card">
                <img src="https://debis.deu.edu.tr/images/debis/deu_kariyerim.jpg" alt="DEU Kariyerim">
                <div class="card-content">
                    <marquee direction="up" height="110" scrollamount="2" onmouseover="this.stop();" onmouseout="this.start();">
                        <ul>
                            <li>
                                <a href="https://bid.deu.edu.tr/" target="_blank"> DEU Bilgi Islem Duyuruları</a>
                                <hr>
                                <h4>Değerli öğrencilerimiz,</h4>
                                <p>2021-2022 Akademik Yılı Erasmus+ Öğrenim Hareketliliği Tercih Ekranına Buradan
                                    Ulaşabilirsiniz<br>
                                    <a target="_blank" href="https://international.deu.edu.tr/"> Detaylı Bilgiler Web
                                        Sayfamızdadır.</a>
                                </p>
                                <div dir="ltr">
                                    <strong>Sistem Kapatılmıştır. <br>
                                        Sayfamızdan gelişmeleri takip edebilirsiniz.<br>
                                        <a href="https://debis.deu.edu.tr/bek-kalite/ucuncuBasvurum/index.php" target="_blank">Anonim ID bilgilerinize bu adresten
                                            erişebilirsiniz.</a></strong>
                                </div>
                                <p>Sağlık ve başarı dileklerimizle…<br>
                                    DEÜ Dış İlişkiler Koordinatörlüğü</p>
                            </li>
                            <li>
                                <h4><strong>DEUZEM</strong>&nbsp;Uzaktan Eğitim portalı ile ilgili sorunlarınız
                                    için&nbsp;<a target="_blank" href="mailto:info@deuzem.deu.edu.tr">info@deuzem.deu.edu.tr</a>&nbsp;adresinden
                                    yardım isteyebilirsiniz. (Öncelikle su sayfayı inceleyin:&nbsp;<strong><a target="_blank" href="http://destek.deuzem.deu.edu.tr/">http://destek.deuzem.deu.edu.tr</a></strong>&nbsp;)
                                </h4>
                            </li>
                            <li>
                                <h4><strong>DEBIS</strong>&nbsp;hesabınız ile ilgili sorun yaşıyorsanız&nbsp;<a target="_blank" href="mailto:epostadestek@deu.edu.tr">epostadestek@deu.edu.tr</a>&nbsp;adresinden
                                    yardım isteyebilirsiniz. (Öncelikle su sayfayı inceleyin:&nbsp;<strong><a target="_blank" href="http://debishs.deu.edu.tr/">http://debishs.deu.edu.tr</a></strong>&nbsp;)
                                </h4>
                            </li>
                            <li>
                                <h4><strong>Microsoft Teams/Office365</strong>&nbsp;ile ilgili sorun
                                    yaşıyorsanız&nbsp;<a href="mailto:admin@deu.edu.tr">admin@deu.edu.tr</a>&nbsp;adresinden yardım
                                    isteyebilirsiniz. (Öncelikle su sayfayı inceleyin:<strong><a target="_blank" href="http://bid.deu.edu.tr/office-365-sikca-sorulan-sorular">&nbsp;http://bid.deu.edu.tr/office-365-sikca-sorulan-sorular</a></strong>&nbsp;)
                                </h4>
                            </li>
                        </ul>
                    </marquee>
                </div>
            </div>

            <div class="card">
                <img src="https://debis.deu.edu.tr/images/debis/dersler(1).gif" alt="Dersler">
                <div class="card-content">
                    <p>
                        <font color="red">Mesaj Modülü yakında, beklemede kalın..</font>
                    </p>
                </div>
            </div>

            <div class="card">
                <img src="https://debis.deu.edu.tr/images/debis/websitem1.gif" alt="EDUROAM">
                <div class="card-content">
                    <p>EDUROAM Kablosuz ag hizmeti ile ilgili detaylı bilgi almak için <a href="http://eduroam.deu.edu.tr" target="_blank">buraya tıklayınız.</a></p>
                </div>
            </div>
        </div>
    </section>
    <script src="scripts.js"></script>
</body>

</html>
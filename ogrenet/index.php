<?php
require "baglan.php";
require "kontrol-ve-OgrNo.php";
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
</head>

<body>
  <nav class="nav-mobile">
    <img src="img/deulogotransparan.png" alt="">
    <ul>
      <li><a href="index.php">DOKUZ EYLÜL ÜNİVERSİTESİ</a></li>
      <li class="index-menu"><a href="https://debis.deu.edu.tr/DEUWeb/English/Icerik/Icerik.php?KOD=0">ENGLISH</a></li>
      <li class="index-menu"><a href="https://www.deu.edu.tr/">ANA SAYFA</a></li>
      <li class="index-menu"><a href="https://kisi.deu.edu.tr/">KISISEL SAYFALAR</a></li>
    </ul>
  </nav>
  <section class="content container">
    <div class="form-container">
      <form class="section-div" method="post" action="">
        <label class="form-label" for="OgrNo">Öğrenci Numaranız</label>
        <input type="text" id="OgrNo" name="OgrNo" placeholder="Öğrenci Numaranızı girin" required>
        <label class="form-label" for="sifre">Şifreniz</label>
        <input type="password" id="sifre" name="sifre" placeholder="Şifrenizi girin" required>
        <div style="width: 100%;" class="select-wrapper">
          <select id="mailUzantisi" name="mailUzantisi">
            <option value="ogr.deu.edu.tr">@ogr.deu.edu.tr</option>
          </select>
        </div>
        <input type="submit" value="Giriş Yap">
      </form>
      <form class="section-div" action="#">
        <input style="background-color: #dc3545;" class="note" type="submit" value="Öğrenet Girişinde sorun yaşıyorsanız tıklayınız">
      </form>
      <?php
      if (!empty($error)) {
        echo "<label style='color: #dc3545;' class='form-label'>$error</label>";
      }
      ?>

    </div>
    <div class="section-div-2">
      <div class="section-div">
        <p>
          <span class="heading-medium">UYARILAR :</span>
        </p>
        <br>
        <p>
          Ögrenci Öğrenet Girisi Bilgilendirme;
        </p>
        <p>
          1. Öğrenet girişi yaparken @ogr.deu.edu.tr uzantısını seçtiginizden emin olunuz.
        </p>
        <p>
          2. Öğrenet hesabınızla ilgili, şifre güncelleme işlemleri için sorun çözme butonununa tıklayınız.
        </p>
      </div>
      <br>
      <hr><br>
      <div class="section-div">
        <p>
          El Ele Güvenli Geleceğe İzmir - Bilgilendirme ve Önleme Faaliyetleri için <a href="https://www.youtube.com/watch?v=NmEBOY9qUwU" target="_blank" class="btn-darkblue">tıklayınız.</a>
        </p>
        </span>
      </div>
      <br>
      <hr><br>
      <div class="img-gallery" align="center">
        <a href="https://einsan.gov.tr/" target="_blank">
          <img class="mobile-img" src="img/einsan.png" alt="einsan">
        </a>
      </div>
    </div>
    <div class="section-div-2" style="color: red;">
      <hr><br>
      <span class="heading-medium">Değerli kullanıcı;</span>
      <p>
        Afet ve Acil Durum Yönetimi Başkanlığı tarafından hazırlanan <span class="heading-medium">Afet
          Farkındalık
          Eğitimi</span> konulu eğitim,
      </p>
      <p>
        Cumhurbaşkanlığı İnsan Kaynakları Ofisi Başkanlığı <a href="https://egitim.cbiko.gov.tr/Giris?return=/" target="_blank" class="btn-darkblue">https://egitim.cbiko.gov.tr</a> adresinde yer alan Uzaktan Eğitim
        Kapısına yüklenmiştir.
      </p>
      <p>
        Afet durumunda hayati önem taşıyan eğitimi izlemenizi önemle rica ederiz.
      </p>
      <br>
      <hr><br>
      <p>
        AFAD tarafından hazırlanan eğitim videoları YTNK TV eğitim platformumuza öğrencilerimiz için
        yüklenmiştir.
      </p>
      <p>
        Platforma üye olup giriş sağlandıktan sonra EĞİTİMLER bölümünde yer alan AFAD-Afet Farkındalık
        Eğitimleri
      </p>
      <p>
        bölümünden eğitim videolarına ulaşım sağlanmaktadır.
      </p>
      <p>

        Video linki: <a href="https://ytnk.tv/YtnkTv_AFAD_Afet_Farkindalik_Egitimleri" target="_blank" class="btn-darkblue">AFAD Afet Farkindalik Egitimleri</a>
      </p>
    </div>
  </section>
  <script src="scripts.js"></script>
</body>

</html>
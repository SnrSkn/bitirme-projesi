<nav class="nav-mobile">
    <ul class="left-nav">
        <li>
            <div class="hamburger" id="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </li>
    </ul>
    <ul class="center-nav">
        <ul class="none header-hiden">
            <li><a href="ogrenet.php">DOKUZ EYLÜL ÜNİVERSİTESİ</a></li>
        </ul>
        <li class="index-menu">
            <form method="post" action="ogrenet.php">
                <a href="ogrenet.php">Anasayfa</a>
            </form>
        </li>
        <li class="dropdown index-menu">
            <a href="#">Kişisel İşlemlerim</a>
            <div class="dropdown-content">
                <a href="#">Ders Programım</a>
                <form method="post" action="not-goruntuleme.php">
                    <a href="not-goruntuleme.php">Not Görme Ekranı</a>
                </form>
                <a href="bakim.php">YDY Not Görme Ekranı</a>
                <a href="bakim.php">YDY Öğrenci Devamsızlık Bilgileri</a>
                <a href="#">Not Döküm Belgesi</a>
            </div>
        </li>
        <li class="dropdown index-menu">
            <a href="#">Öğrenci E-Posta</a>
            <div class="dropdown-content">
                <a href="https://webmail.deu.edu.tr/ogrmail/src/login.php">Klasik WebMail</a>
                <a href="https://webmail7.deu.edu.tr/">Yeni WebMail</a>
            </div>
        </li>
        <li class="index-menu"><a href="bakim.php">Mesajlar</a></li>
        <li class="index-menu"><a href="bakim.php">Anketler</a></li>
        <li class="dropdown index-menu">
            <a href="#">S.S.S.</a>
            <div class="dropdown-content">
                <a href="https://haber.deu.edu.tr/" target="_blank" class="btn-white">Kablosuz ağ hizmetinden
                    nasıl
                    faydalanabilirim ?</a>
                <a href="https://web.deu.edu.tr/sss/posta.html" target="_blank" class="btn-white">Dokuz Eylül
                    Üniversitesi E-Posta kullanım kılavuzu</a>
                <a href="https://web.deu.edu.tr/sss/spam.html" target="_blank" class="btn-white">Spam Posta
                    nedir?</a>
                <a href="https://web.deu.edu.tr/sss/proxy_ogrenci.html" target="_blank" class="btn-white">Kütüphane
                    veritabanlarına erişim-proxy ayarları nasıl yapılır ? (Öğrenci için)</a>
                <a href="https://web.deu.edu.tr/sss/proxy.html" target="_blank" class="btn-white">Kütüphane
                    veritabanlarına
                    erişim-proxy ayarları nasıl yapılır ? (Personel için)</a>
            </div>
        </li>
        <form method="post" action="cikis.php" onclick="return confirm('Çıkış yapmak istediğinize emin misiniz?', 'Evet', 'Hayır')">
            <li class="index-menu"><a href="cikis.php">Çıkış yap</a></li>
        </form>
    </ul>
</nav>
<div class="menu-container">
    <div class="nav-menu" id="nav-menu">
        <ul>
            <li class="">
                <form method="post" action="ogrenet.php">
                    <a href="ogrenet.php">Anasayfa</a>
                </form>
            </li>
            <li>
                <form method="post" action="not-goruntuleme.php">
                    <a href="not-goruntuleme.php">Not Görme Ekranı</a>
                </form>
            </li>
            <li><a href="bakim.php">Belge Talebi</a></li>
            <li><a href="bakim.php">Mezun Belge Talebi</a></li>
            <li><a href="bakim.php">Hak Saklamalarım</a></li>
            <li><a href="bakim.php">Tip Staj Islemleri</a></li>
            <li><a href="#">Ders Programım</a></li>
            <li><a href="bakim.php">Yeni Kayıt Islemleri</a></li>
            <li><a href="bakim.php">Ilk Kayit Belge Yukleme</a></li>
            <li><a href="not-goruntuleme.php">Not Görme Ekranı</a></li>
            <li><a href="#">Not Döküm Belgesi</a></li>
            <li><a href="bakim.php"> Katkı Payı Ödemelerim</a></li>
            <li><a href="https://akillikart.deu.edu.tr/yurt/yurtBasvuru/index.php">Yurt Basvurusu</a></li>
            <li><a href="bakim.php" class="dark-red">Engelsiz Dokuz Eylül Anketi</a></li>
            <li><a href="sifre.php">Sifre Degistirme</a></li>
            <li><span style="color:#fff;">Hata bildirimi, öneri, görüs ve sorularınız için</span> <a style="color: #dc3545" href=" mailto:snr.sakin@outlook.com">snr.sakin@outlook.com</a><span style="color:#fff;"> adresine yazabilirsiniz.</span></li>
            <form method="post" action="cikis.php">
                <li><a style="color: #dc3545" href="cikis.php" onclick="return confirm('Çıkış yapmak istediğinize emin misiniz?', 'Evet', 'Hayır')">Çıkış yap</a></li>
            </form>
        </ul>
    </div>
</div>
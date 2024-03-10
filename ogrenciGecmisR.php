

<!DOCTYPE html>
<html lang="en">
<head>
<style>

.metin {
    height:30px;
    text-align: center;
    font-size: x-large;
    background-color: #f0f0f0;
    padding: 30px;
}

.header-container{
    height: 70px;
    color: aliceblue;
    background-color: black;
    justify-content: center;
    display: flex;
    font-size: large;
    margin-top: 0;
    
}

.logo{

    color: white;
    margin-top: 20px;
    font-family: Montserrat;
    font-size: x-large;
}

.navbar{

height: 100pc;
width: 20pc;
background-color: bisque;
text-align: center;
}



.butonlar {
    display: flex;
    flex-direction: column;
    align-items: center; /* Butonları dikey olarak hizalamak için */
}

.button {
  width: 230px; /* Buton genişliği */
    height: 40px; /* Buton yüksekliği */
    margin: 5px; /* Butonlar arası boşluk */
    font-size: 18px; /* Buton metin boyutu */ }

    </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">

  <title>ANASAYFA</title>
</head>

<header>
<div class="header-container">
<a href="index.php" class="logo"><b> AYSAMERİCANO DERSHANESİ ETÜT SİTESİ</b></a>
</div>
</header>
<body>
<div class="metin"> <b>ÖĞRENCİ BİLGİLENDİRME SİSTEMİ VE İŞLEMLERİ</b></div>
<div class="navbar">
<br><br>

<?php
session_start();

include("baglanti.php");

// oturum kontrolü
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // açılırsa verileri veritabanından çek
    $ogrenciNumara = $_SESSION['ogrenciNumara'];
    $sql = "SELECT * FROM ogrenciler WHERE ogrenciNumara = $ogrenciNumara";
    $result = $baglanti->query($sql);

    if($result->num_rows > 0) {
        // ekrana yazdır
        $row = $result->fetch_assoc();
        
        // resmi getir
        echo "<img src='data:image/jpeg;base64," . base64_encode($row["ogrencilerResim"]) . "' alt='Öğrenci Resmi' 'style= height: 100px;  width: 100px;'><br> ";
        echo "<h2> " . $row["ogrenciIsim"]. " " .$row["ogrenciSoyisim"] . "</h2>";

     
    } else {
        echo "Öğrenci bulunamadı.";
    }
} else {
    // oturum açılmadıysa giriş sayfasına
    header("Location: ogrencigiris.php");
    exit;
}

?> 
            <div class="butonlar">
                <a href="index.php"><button class="button">ANASAYFA</button></a>
                <a href="ogrenciKisisel.php"><button class="button">KİŞİSEL BİLGİLER</button></a>
                <a href="ogrenciRandevu.php"><button class="button">RANDEVU AL</button></a>
                <a href="ogrenciGecmisR.php"><button class="button">GEÇMİŞ RANDEVULAR</button></a>
                <a href="mailAdresleri.php"><button class="button">MAIL ADRESLERİ</button></a>
                <a href="bizeUlasin.php"><button class="button">BİZE ULAŞIN</button></a>
            </div>

    </div >

    <form method="post" action="index.php">
    <input type="submit" value="Çıkış Yap">
</form>
GEÇMİŞ RANDEVULAR
</body>

</html>
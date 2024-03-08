<!DOCTYPE html>
<html lang="en">
<head>
    <title>ÖĞRENCİ ANASAYFA</title>
    

    <style>

.metin {
    height: 15px;
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
    margin-top: 19px;
    font-family: Montserrat;
    font-size:x-large;
}

.navbar{

height: 100pc;
width: 20pc;
background-color: bisque;
}
img {
    max-width: 300px; /* Maksimum genişlik */
    max-height: 200px; /* Maksimum yükseklik */
    display: block; /* Blok öğe olarak ayarla */
    margin-left: auto; /* Sol kenardan otomatik olarak hizala */
    margin-right: auto; /* Sağ kenardan otomatik olarak hizala */
}


.ogrenciAdi {
            text-align: center;
            font-weight: bold;
            font-size: x-large;
        }

        

    </style>



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Montserrat:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">



    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc"
        crossorigin="anonymous"></script>

    
<header>

<div class="header-container">
<a href="index.php" class="logo"><b> AYSAMERİCANO DERSHANESİ ETÜT SİTESİ</b></a>
</div>

</header>
</head>




<body>

    <div class="metin"> <b>ÖĞRENCİ BİLGİLENDİRME SİSTEMİ VE İŞLEMLERİ</b></div>


    <div class="navbar">

    <div class="ogrenciFoto">
    <?php

include("baglanti.php");

// veritabanı sorgusu yapma
$sql = "SELECT ogrencilerResim FROM ogrenciler WHERE ogrenciID = 1"; // ogrenciID 1 olan öğrencinin resmini seçiyoruz
$sonuc = mysqli_query($baglanti, $sql);

// sorgu kontrol
if (mysqli_num_rows($sonuc) > 0) {
    // veriyi çek
    $row = mysqli_fetch_assoc($sonuc);
    $resimData = $row['ogrencilerResim'];
echo "<br>";
    // veriyi çek resim olarak göster
    echo '<img src="data:image/jpeg;base64,'.base64_encode($resimData).'" />';
} else {
    echo "Resim bulunamadı.";
}

////


$sql = "SELECT ogrenciIsim, ogrenciSoyisim FROM ogrenciler WHERE ogrenciID = 1"; // ogrenciID 1 olan öğrencinin resmini seçiyoruz
$sonuc = mysqli_query($baglanti, $sql);

// sorgu kontrol
if (mysqli_num_rows($sonuc) > 0) {
    // veriyi çek
    $row = mysqli_fetch_assoc($sonuc);
    $ogrenciIsim = $row['ogrenciIsim'];
    $ogrenciSoyisim = $row['ogrenciSoyisim'];
echo "<br>";
    // veriyi çek resim olarak göster
    echo '<div class="ogrenciAdi">' . $ogrenciIsim . " " . $ogrenciSoyisim . '</div>';

  

} else {
    echo "isim bulunamadı.";
}
















/////////////

// bağlantıyı kapat
mysqli_close($baglanti);
?>

<div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Accordion Item #1
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        Accordion Item #2
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        Accordion Item #3
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
    </div>
  </div>
</div>
</div>
    </div>

</body>
</html>
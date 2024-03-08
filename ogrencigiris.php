<?php

include("baglanti.php");
$ogrenciNumara_err = "";
$ogrenciSifre_err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ogrenciNumara = $_POST["ogrenciNumara"];
    $ogrenciSifre = $_POST["ogrenciSifre"];
    $ogrenciNumara_err = "";
    $ogrenciSifre_err = "";

    // Öğrenci numarası veya şifre boş ise hata mesajları atanır
    if (empty($ogrenciNumara)) {
        $ogrenciNumara_err = "Öğrenci numarası boş geçilemez.";
    }
    if (empty($ogrenciSifre)) {
        $ogrenciSifre_err = "Parola boş geçilemez.";
    }

    // Herhangi bir hata mesajı varsa ekrana yazdırılır
    if (!empty($ogrenciNumara_err) || !empty($ogrenciSifre_err)) {
        echo "Lütfen tüm alanları doldurunuz.";
    } else {
        $secim = "SELECT * FROM ogrenciler WHERE ogrenciNumara = '$ogrenciNumara'";
        $calistir = mysqli_query($baglanti, $secim);
        $kayitsayisi = mysqli_num_rows($calistir);

        if ($kayitsayisi > 0) {
            $ilgilikayit = mysqli_fetch_assoc($calistir);
            $kullaniciSifre = $ilgilikayit["ogrenciSifre"];

            // Girilen şifre, veritabanındaki şifreyle eşleşiyorsa oturum başlatılır
            if ($ogrenciSifre == $kullaniciSifre) {
                session_start();
                $_SESSION["ogrenciNumara"] = $ilgilikayit["ogrenciNumara"];
                $_SESSION["ogrenciSifre"] = $ilgilikayit["ogrenciSifre"];
                header("location: ogrenciAnasayfa.php");
            } else {
                // Şifre eşleşmediği durumda hata mesajı verilir
                echo "Böyle bir öğrenci kaydı bulunmamaktadır.";
            }
        } else {
            // Öğrenci numarası bulunamadığında hata mesajı verilir
            echo "Böyle bir öğrenci kaydı bulunmamaktadır.";
        }
    }
    mysqli_close($baglanti);

}







   

   


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>ÖĞRENCİ GİRİŞİ</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Montserrat:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc"
        crossorigin="anonymous"></script>

    
<header>

<div class="header-container">
<a href="index.php" class="logo"> AYSAMERİCANO DERSHANESİ ETÜT SİTESİ</a>
</div>


</div>
</header>
</head>





<body>

<div class="giris p-5 m-5">


<form action="" method="POST">

<div class="mb-3 col-md-2">
  <label for="exampleInput" class="form-label">Öğrenci No</label>
  <input type="text" class="form-control form-control-sm " id="exampleInput" name="ogrenciNumara">
</div>


<div class="mb-3 col-md-2">
  <label for="exampleInputPassword1" class="form-label">Şifre</label>
  <input type="password" class="form-control form-control-sm" id="exampleInputPassword1" name="ogrenciSifre">
</div>

<button type="submit" class="btn btn-primary" name="giris">Giriş Yap</button>
</form>

</div>

</body>

</style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="description">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" 
integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" 
integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->

<!-- Bootstrap JS ve jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</html>
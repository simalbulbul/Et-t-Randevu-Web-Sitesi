<?php
session_start();

include("baglanti.php");

// Kullanıcı girişi kontrolü
if(isset($_POST['ogrenciNumara']) && isset($_POST['ogrenciSifre'])) {
    $ogrenciNumara = $_POST['ogrenciNumara'];
    $ogrenciSifre = $_POST['ogrenciSifre'];

    // Veritabanından kullanıcıyı sorgula
    $sql = "SELECT * FROM ogrenciler WHERE ogrenciNumara = $ogrenciNumara AND ogrenciSifre = '$ogrenciSifre'";
    $result = $baglanti->query($sql);

    if($result->num_rows > 0) {
        // Kullanıcı doğru giriş yapmışsa, oturum başlat
        $_SESSION['loggedin'] = true;
        $_SESSION['ogrenciNumara'] = $ogrenciNumara;
        
        // Kullanıcıyı ana sayfaya yönlendir
        header("Location: ogrenciAnasayfa.php");
        exit;
    } else {
        echo "Geçersiz öğrenci numarası veya şifre.";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    

    <title>ETÜT SİTESİ</title>
    <link rel="stylesheet" href="style.css">
    
    

<div class="header-container">
<a href="index.php" class="logo">AYSAMERİCANO DERSHANESİ ETÜT SİTESİ</a>
</div>


</div>
</header>

<body>
    <h2>Öğrenci Girişi</h2>
    <form method="post" action="">
        Öğrenci Numarası: <input type="text" name="ogrenciNumara"><br>
        Şifre: <input type="password" name="ogrenciSifre"><br>
        <input type="submit" value="Giriş">
    </form>
</body>
</html>

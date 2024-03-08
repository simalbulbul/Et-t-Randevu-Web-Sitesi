
<?php

$host = "localhost";
$kullanici = "root";
$parola = "";
$vt = "etütsitesi";

$baglanti = mysqli_connect($host, $kullanici, $parola, $vt);

// Bağlantı başarısız olduğunda hata mesajını göster
/*if (!$baglanti) {
    die("Bağlantı başarısız: " . mysqli_connect_error());
} else {
    echo "Bağlantı başarılı!";
}
*/
mysqli_set_charset($baglanti, "UTF8");

?>

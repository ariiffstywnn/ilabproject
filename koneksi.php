<?php
$host = "localhost";
$user = "root";     
$pass = "";        
$db   = "jadwal_lab";     

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}


date_default_timezone_set('Asia/Jakarta');


// ?mock=2025-09-02+08:00 di URL
$mock = $_GET['mock'] ?? null;

if ($mock) {
    
    $now = new DateTime($mock);
} else {
   
    $now = new DateTime("now");
}

$hari = $now->format("l");     
$jamSekarang = $now->format("H:i");
$jamH = (int)$now->format("H"); 
$menit = (int)$now->format("i");


$mapHari = [
  "Monday" => "Senin",
  "Tuesday" => "Selasa",
  "Wednesday" => "Rabu",
  "Thursday" => "Kamis",
  "Friday" => "Jumat",
  "Saturday" => "Sabtu",
  "Sunday" => "Minggu"
];
$hariIndo = $mapHari[$hari];


$query = "SELECT jadwal.mapel, jadwal.jam_mulai, jadwal.jam_selesai, guru.nama, guru.foto 
          FROM jadwal
          INNER JOIN guru ON jadwal.guru_id = guru.id
          WHERE jadwal.hari = '$hariIndo'
          AND '$jamSekarang' BETWEEN jadwal.jam_mulai AND jadwal.jam_selesai
          LIMIT 1";
$result = mysqli_query($conn, $query);
$jadwalAktif = mysqli_fetch_assoc($result);

$sedangIstirahat = false;
if ($jamH == 12 && $menit < 30) {
    $sedangIstirahat = true;
}

?>

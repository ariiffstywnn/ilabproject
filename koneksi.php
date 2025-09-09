<?php
$host = "localhost";
$user = "root";     // default user XAMPP
$pass = "";         // default kosong di XAMPP
$db   = "jadwal_lab";     // nama database kamu

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// =======================
// 1. Atur zona waktu
// =======================
date_default_timezone_set('Asia/Jakarta');

// =======================
// 2. Tentukan apakah pakai mock time
// =======================
// kalau mau test waktu custom, tambahin ?mock=2025-09-02+08:00 di URL
$mock = $_GET['mock'] ?? null;

if ($mock) {
    // pakai waktu custom dari URL
    $now = new DateTime($mock);
} else {
    // pakai waktu asli server
    $now = new DateTime("now");
}

// =======================
// 3. Ambil data waktu
// =======================
$hari = $now->format("l");      // contoh: Monday, Tuesday
$jamSekarang = $now->format("H:i");
$jamH = (int)$now->format("H"); // jam (00–23)
$menit = (int)$now->format("i");

// mapping bahasa Inggris ke Indonesia
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

// =======================
// 4. Ambil jadwal dari DB sesuai hari & jam
// =======================
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

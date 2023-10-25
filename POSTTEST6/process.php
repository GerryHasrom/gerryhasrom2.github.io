<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Ambil data yang dikirimkan melalui formulir
  $name = $_POST["name"];
  $gender = $_POST["gender"];
  $age = $_POST["age"];
  $occupation = $_POST["occupation"];
  $location = $_POST["location"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Buat objek data kontak
  $contactData = [
    "name" => $name,
    "gender" => $gender,
    "age" => $age,
    "occupation" => $occupation,
    "location" => $location,
    "email" => $email,
    "password" => $password,
  ];

  // Baca data kontak yang sudah ada, jika ada
  $existingData = [];
  if (file_exists('contact_us.json')) {
    $existingData = json_decode(file_get_contents('contact_us.json'), true);
  }

  // Tambahkan data kontak baru ke data yang sudah ada
  $existingData[] = $contactData;

  // Simpan data kontak kembali ke berkas contact_us.json
  file_put_contents('contact_us.json', json_encode($existingData, JSON_PRETTY_PRINT));

  // Beri respons kepada pengguna bahwa data telah disimpan
  echo "Data kontak telah disimpan.";

  // Mengarahkan pengguna kembali ke index.php
  header('Location: index.php');
  exit(); 
} else {
  // Jika bukan metode POST, tampilkan pesan kesalahan
  echo "Metode yang diterima tidak valid.";
}

// UNTUK MELIHAT LOCAL STORAGE TERISI, INSPECT KEMUDIAN PERGI KE PENYIMPANAN LOKAL KE LOCAL HOST DIBAGIAN CONTACT DATA.
?>
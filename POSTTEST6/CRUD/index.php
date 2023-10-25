<?php
include("connection.php");

if (isset($_POST['save_btn'])) {
    // Cari nilai idname maksimal dalam tabel
    $query = "SELECT MAX(idname) AS max_idname FROM crud";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $max_idname = $row['max_idname'];

    // Tambahkan satu untuk mendapatkan nilai idname yang belum digunakan
    $idname = $max_idname + 1;

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $occupation = $_POST['occupation'];
    $location = $_POST['location'];
    $namehouse = $_POST['namehouse'];

    // Periksa apakah file telah dipilih
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];
        // Sebelum menyimpan nama file, perlu membuat nama yang sesuai format
        $file_name = date('Y-m-d') . ' ' . $_POST['namehouse'] . '.' . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $file_tmp = $file['tmp_name'];

        // Tentukan direktori pengunggahan
        $upload_dir = 'uploads/' . $file_name;

        // Cobalah untuk memindahkan file ke direktori pengunggahan
        if (move_uploaded_file($file_tmp, $upload_dir)) {
            // File berhasil diunggah
            echo "File berhasil diunggah dengan nama: $file_name";

            // Simpan nama file ke kolom baru di tabel MySQL
            $query = "INSERT INTO crud (idname, name, gender, age, occupation, location, namehouse, image_filename) VALUES ('$idname', '$name', '$gender', '$age', '$occupation', '$location', '$namehouse', '$file_name')";
            $data = mysqli_query($conn, $query);
            if ($data) {
                // Data berhasil disimpan, alihkan ke view.php
                header("Location: view.php");
                exit;
            } else {
                ?>
                <script type="text/javascript">
                    alert("Error: <?php echo mysqli_error($conn); ?>");
                </script>
                <?php
            }            
        } else {
            // Gagal mengunggah file
            echo '<script>alert("Terjadi kesalahan saat mengunggah file.");</script>';
        }
        
    } else {
        // Tidak ada file yang dipilih
        echo "Pilih file yang akan diunggah.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERENCANAAN RUMAH IMPIAN</title>
    <link rel="stylesheet" type="text/css" href="style/indexstyle.css">
    <script src="style/script.js"></script>
</head>
<body>      
<div class="cool-card">
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <h1 class="title">MY PLANNING DREAM HOUSE</h1>

        <!-- Kolom nama -->
        <div class="input-container c1">
            <label for="name" class="form-label">Masukkan nama anda:</label>
            <input type="text" name="name" placeholder="Nama">
        </div>

        <!-- Kolom gender -->
        <div class="input-container c2">
            <label for="gender" class="form-label">Masukkan jenis kelamin (hanya 2 jenis):</label>
            <input type="text" name="gender" placeholder="Jenis Kelamin">
        </div>

        <!-- Kolom umur -->
        <div class="input-container c3">
            <label for="age" class="form-label">Masukkan umur:</label>
            <input type="text" name="age" placeholder="Umur">
        </div>

        <!-- Kolom pekerjaan -->
        <div class="input-container c4">
            <label for="occupation" class="form-label">Masukkan Pekerjaan:</label>
            <input type="text" name="occupation" placeholder="Pekerjaan">
        </div>
        
        <!-- Kolom lokasi -->
        <div class="input-container c5">
            <label for="location" class="form-label">Masukkan Lokasi:</label>
            <input type="text" name="location" placeholder="Lokasi">
        </div>

        <!-- Kolom nama rumah -->
        <div class="input-container c6">
            <label for="namehouse" class="form-label">Masukkan nama rumah yang anda inginkan:</label>
            <input type="text" name="namehouse" placeholder="Nama Rumah">
        </div>

        <!-- Tambahkan input untuk mengunggah file -->
        <div class="input-container c7">
            <label for="file" class="form-label">Unggah File:</label>
            <input type="file" name="file">
        </div>

        <div class="input-container c8">
            <button class="button" type="submit" name="save_btn">Simpan</button>
        </div>
        <div class="input-container c9">
            <button class="button"><a href="view.php">Lihat</a></button>
        </div>
    </form>


</div>
</body>
</html>

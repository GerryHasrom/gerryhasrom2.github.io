<?php
include 'connection.php';

if (isset($_POST['save_btn'])) {
    // Periksa apakah file telah dipilih
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];

        // Tentukan direktori pengunggahan
        $upload_dir = 'uploads/' . $file_name;

        // Cobalah untuk memindahkan file ke direktori pengunggahan
        if (move_uploaded_file($file_tmp, $upload_dir)) {
            // File berhasil diunggah

            // Sebelum menyimpan data, periksa apakah ID sudah ada dalam tabel
            $idname = $_POST['idname'];
            $check_query = "SELECT idname FROM crud WHERE idname='$idname'";
            $check_result = mysqli_query($conn, $check_query);
            
            if (mysqli_num_rows($check_result) > 0) {
                // ID sudah ada dalam tabel
                echo "Data dengan ID yang sama sudah ada dalam tabel.";
            } else {
                // ID belum ada dalam tabel, lanjutkan untuk menyimpan data
                $name = $_POST['name'];
                $gender = $_POST['gender'];
                $age = $_POST['age'];
                $occupation = $_POST['occupation'];
                $location = $_POST['location'];
                $namehouse = $_POST['namehouse'];

                $query = "INSERT INTO crud (idname, name, gender, age, occupation, location, namehouse, image_filename) VALUES ('$idname', '$name', '$gender', '$age', '$occupation', '$location', '$namehouse', '$file_name')";
                $data = mysqli_query($conn, $query);
                
                if ($data) {
                    // Data saved successfully, redirect to view.php
                    echo '<script type="text/javascript">';
                    echo 'window.location.href = "view.php";';
                    echo '</script>';
                    exit;
                }
                 else {
                    // Terjadi kesalahan saat menyimpan data ke dalam tabel 'crud'
                    ?>
                    <script type="text/javascript">
                        alert("Error: <?php echo mysqli_error($conn); ?>");
                    </script>
                    <?php
                }
            }
        } else {
            // Gagal mengunggah file
            echo '<script>alert("Terjadi kesalahan saat mengunggah file.");</script>';
        }            
    } else {
        // Tidak ada file yang dipilih
        echo "Pilih file yang akan diunggah.";
    }
} else {
    // Tampilkan form unggah file
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Unggah File</title>
    </head>
    <body>
        <h1>Unggah File</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <!-- Form untuk unggah file -->
        </form>
    </body>
    </html>
    <?php
}
?>

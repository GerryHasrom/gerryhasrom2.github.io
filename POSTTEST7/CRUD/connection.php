<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "gerryestateofficial";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['save_btn'])) {
    if (isset($_POST['idname'])) {
        $idname = $_POST['idname'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $occupation = $_POST['occupation'];
        $location = $_POST['location'];
        $namehouse = $_POST['namehouse'];

        // Periksa apakah data dengan PRIMARY KEY yang sama sudah ada dalam tabel
        $check_query = "SELECT idname FROM crud WHERE idname = '$idname'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) == 0) {
            // Data belum ada, maka Anda dapat memasukkan data baru
            if (isset($_FILES['file'])) {
                $file_name = $_FILES['file']['name'];

                $insert_query = "INSERT INTO crud (idname, name, gender, age, occupation, location, namehouse, image_filename) 
                VALUES ('$idname', '$name', '$gender', '$age', '$occupation', '$location', '$namehouse', '$file_name')";
                $insert_data = mysqli_query($conn, $insert_query);

                if (!$insert_data) {
                    die("Error: " . mysqli_error($conn));
                }
            } else {
                // Tidak ada file yang diunggah
            }
        } else {
            // Data dengan PRIMARY KEY yang sama sudah ada, lakukan penanganan khusus jika diperlukan
            // Contoh: Tampilkan pesan kesalahan kepada pengguna
            echo "Data dengan ID yang sama sudah ada dalam tabel.";
        }
    }
}
?>

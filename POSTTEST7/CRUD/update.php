<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style/updatestyles.css">
</head>
<body>
    <?php 
    include 'connection.php';
    $idname = $_GET['idname'];
    $select = "SELECT * FROM crud WHERE idname='$idname'";
    $data = mysqli_query($conn, $select);
    $row = mysqli_fetch_array($data);
    ?>

    <div class="container">
        <h1 class="title">MY PLANNING DREAM HOUSE</h1> 
        <form action="" method="POST" enctype="multipart/form-data" class="update-form">
            <label for="idname" class="form-label">Masukkan id nama anda:</label>
            <input value="<?php echo $row['idname'] ?>" type="text" name="idname" placeholder="idname" class="form-input"><br><br>

            <label for="name" class="form-label">Masukkan nama anda:</label>
            <input type="text" name="name" placeholder="name" value="<?php echo $row['name'] ?>" class="form-input"><br><br>

            <label for="gender" class="form-label">Masukkan gender (hanya 2 jenis):</label>
            <input type="text" name="gender" placeholder="gender" value="<?php echo $row['gender'] ?>" class="form-input"><br><br>

            <label for="age" class="form-label">Masukkan umur:</label>
            <input type="text" name="age" placeholder="age" value="<?php echo $row['age'] ?>" class="form-input"><br><br>

            <label for="occupation" class="form-label">Masukkan Pekerjaan:</label>
            <input type="text" name="occupation" placeholder="occupation" value="<?php echo $row['occupation'] ?>" class="form-input"><br><br>

            <label for="location" class="form-label">Masukkan Lokasi:</label>
            <input type="text" name="location" placeholder="location" value="<?php echo $row['location'] ?>" class="form-input"><br><br>

            <label for="namehouse" class="form-label">Masukkan nama rumah yang anda inginkan:</label>
            <input type="text" name="namehouse" placeholder="namehouse" value="<?php echo $row['namehouse'] ?>" class="form-input"><br><br>

            <label for="file" class="form-label">Unggah File:</label>
            <input type="file" name="file" class="file-input"><br><br>

            <input type="submit" name="update_btn" value="Update" class="submit-button">
            <button class="back-button"><a href="view.php">Back</a></button>
        </form>
    </div>

    <?php
    if (isset($_POST['update_btn'])) {
        $idname = $_POST['idname'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $occupation = $_POST['occupation'];
        $location = $_POST['location'];
        $namehouse = $_POST['namehouse'];

        // Periksa apakah file telah diunggah
        if (isset($_FILES['file'])) {
            $file_name = $_FILES['file']['name'];
            $file_tmp = $_FILES['file']['tmp_name'];

            // Tentukan direktori pengunggahan
            $upload_dir = 'uploads/' . $file_name;

            // Cobalah untuk memindahkan file ke direktori pengunggahan
            if (move_uploaded_file($file_tmp, $upload_dir)) {
                // File berhasil diunggah
                echo "File berhasil diunggah dengan nama: $file_name";

                // Perbarui data, termasuk nama gambar jika ada perubahan
                $update = "UPDATE crud SET idname='$idname', name='$name', gender='$gender', age='$age', occupation='$occupation', location='$location', namehouse='$namehouse', image_filename='$file_name' WHERE idname='$idname'";
            } else {
                // Gagal mengunggah file, tetapi data lain masih perlu diperbarui
                $update = "UPDATE crud SET idname='$idname', name='$name', gender='$gender', age='$age', occupation='$occupation', location='$location', namehouse='$namehouse' WHERE idname='$idname'";
            }
        } else {
            // Tidak ada file yang diunggah, hanya perbarui data lainnya
            $update = "UPDATE crud SET idname='$idname', name='$name', gender='$gender', age='$age', occupation='$occupation', location='$location', namehouse='$namehouse' WHERE idname='$idname'";
        }

        $data = mysqli_query($conn, $update);
        if ($data) {
            ?>
            <script type="text/javascript">
                alert("Data Update success!");
                window.open("http://localhost/POSTTEST6/CRUD/view.php", "_self");
            </script>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                alert("Please try again!");
            </script>
            <?php
        }
    }
    ?>
</body>
</html>

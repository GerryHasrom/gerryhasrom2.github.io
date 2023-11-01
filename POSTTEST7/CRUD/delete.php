<?php
include 'connection.php';

$idname = $_GET['idname'];

// Ambil nama file gambar yang akan dihapus
$query = "SELECT image_filename FROM crud WHERE idname='$idname'";
$data = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($data);

if ($row) {
    $imageFilename = $row['image_filename'];

    // Hapus gambar dari direktori
    $imagePath = 'uploads/' . $imageFilename;
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
}

// Hapus data dari database
$query = "DELETE FROM crud WHERE idname='$idname'";
$data = mysqli_query($conn, $query);

if ($data) {
    ?>
    <script type="text/javascript">
        alert("Data Berhasil Dihapus!");
        window.open("http://localhost/POSTTEST6/CRUD/view.php", "_self");
    </script>
    <?php
} else {
    ?>
    <script type="text/javascript">
        alert("Please try again!")
    </script>
    <?php
}
?>

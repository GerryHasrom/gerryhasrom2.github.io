<?php include 'connection.php';
$idname=$_GET['idname'];
$query="DELETE FROM crud WHERE idname='$idname'";
$data=mysqli_query($conn,$query);
if ($data) {
    ?>
<script type="text/javascript">
    alert("Data Berhasil Dihapus!");
    // JANGAN LUPA GANTI NAMA POSTTEST DI LOCAL HOSTT
    window.open("http://localhost/POSTTEST5/CRUD/view.php",
    "_self");
</script>
    <?php
}
else
{
    ?>
    <script type="text/javascript">
        alert("Please try again!")
    </script>
    <?php

}
?>
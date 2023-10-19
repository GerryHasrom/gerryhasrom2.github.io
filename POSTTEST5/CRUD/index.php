<?php include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY PLANNING DREAM HOUSE  </title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script src="style/script.js"></script>
</head>
<body>
    <div>
    <div class="cool-card">
        <form action="" method="POST">
            <h1>MY DREAM HOME PLANNING</h1>

            <label for="idname" class="form-label">Masukkan id nama anda:</label>
            <input type="text" name="idname" placeholder="idname"><br><br>

            <label for="name" class="form-label">Masukkan nama anda:</label>
            <input type="text" name="name" placeholder="name"><br><br>

            <label for="gender" class="form-label">Masukkan gender (hanya 2 jenis):</label>
            <input type="text" name="gender" placeholder="gender"><br><br>

            <label for="age" class="form-label">Masukkan umur:</label>
            <input type="text" name="age" placeholder="age"><br><br>

            <label for="occupation" class="form-label">Masukkan Pekerjaan:</label>
            <input type="text" name="occupation" placeholder="occupation"><br><br>

            <label for="location" class="form-label">Masukkan Lokasi:</label>
            <input type="text" name="location" placeholder="location"><br><br>

            <label for="namehouse" class="form-label">Masukkan nama rumah yang anda inginkan:</label>
            <input type="text" name="namehouse" placeholder="namehouse"><br><br>

            <input type="submit" name="save_btn" 
            value="Save">
            <button class="view-button"><a href="view.php">View</a></button>
        </form>
    </div>

<?php
if (isset($_POST['save_btn'])) {
    $idname=$_POST['idname'];
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $occupation=$_POST['occupation'];
    $location=$_POST['location'];
    $namehouse=$_POST['namehouse'];

$query="INSERT INTO crud (
    idname,name,gender,age,occupation,location,namehouse) VALUES ('$idname',
    '$name','$gender','$age','$occupation','$location','$namehouse')";
$data=mysqli_query($conn,$query);
if ($data) {
    ?> 
    <script type="text/javascript">
        alert("Data saved success!");
    </script>
    <?php

}
else 
{
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
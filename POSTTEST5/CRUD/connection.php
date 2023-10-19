<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "gerryestateofficial";

$conn = mysqli_connect($host, $user, $pass, $db);

if ($conn) {
    echo "";
} else {
    echo "Tidak terhubung!";
}

if (isset($_POST['saved_btn'])) {
    $idname = $_POST['idname'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $occupation = $_POST['occupation'];
    $location = $_POST['location'];
    $namehouse = $_POST['namehouse'];

    $query = "INSERT INTO crud (idname, name, gender, age, occupation, location, namehouse) 
    VALUES ('$idname', '$name', '$gender', '$age', '$occupation', '$location', '$namehouse')";
    
    $data = mysqli_query($conn, $query);
    if (!$data) {
        die("Error: " . mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style/updatestyle.css">
</head>
<body>
    <?php include 'connection.php';
    $idname=$_GET['idname'];
    $select="SELECT * FROM crud WHERE idname='$idname'";
    $data=mysqli_query($conn,$select);
    $row=mysqli_fetch_array($data);
    ?>

    <div class="container">
        <form action="" method="POST">
            <input value="<?php echo $row['idname'] ?>" type="text" name="idname" placeholder="idname"> <br><br>
            <input type="text" name="name" placeholder="name" value="<?php echo $row['name'] ?>"> <br><br>
            <input type="text" name="gender" placeholder="gender" value="<?php echo $row['gender'] ?>"> <br><br>
            <input type="text" name="age" placeholder="age" value="<?php echo $row['age'] ?>"> <br><br>
            <input type="text" name="occupation" placeholder="occupation" value="<?php echo $row['occupation'] ?>"> <br><br>
            <input type="text" name="location" placeholder="location" value="<?php echo $row['location'] ?>"> <br><br>
            <input type="text" name="namehouse" placeholder="namehouse" value="<?php echo $row['namehouse'] ?>"> <br><br>
            <input type="submit" name="update_btn" value="Update">
            <button><a href="view.php">Back</a></button>
        </form>
    </div>

    <?php
    if (isset($_POST['update_btn'])) {
        $idname=$_POST['idname'];
        $name=$_POST['name'];
        $gender=$_POST['gender'];
        $age=$_POST['age'];
        $occupation=$_POST['occupation'];
        $location=$_POST['location'];
        $namehouse=$_POST['namehouse'];

        $update="UPDATE crud SET idname='$idname',name='$name',gender='$gender',age='$age',
        occupation='$occupation',location='$location',namehouse='$namehouse' WHERE idname='$idname'";
        $data=mysqli_query($conn,$update);
        if ($data) {
            ?> 
            <script type="text/javascript">
                alert("Data Update success!");
                window.open("http://localhost/POSTTEST5/CRUD/view.php", "_self"); 
            </script>
            <?php
        }
        else {
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

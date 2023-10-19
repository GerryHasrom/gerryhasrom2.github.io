<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style/viewstyle.css">
</head>
<body>
    <?php include 'connection.php'; ?>
    <a href="index.php">HOME</a>
    <table border="1" cellpadding="10" cellspacing="0">
    <tr> 
        <th>ID Name</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Age</th>
        <th>Occupation</th>
        <th>Location</th>
        <th>Name House</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php
    $query="SELECT * FROM crud";
    $data=mysqli_query($conn,$query);
    $result=mysqli_num_rows($data);
    if ($result) {
        
        while ($row=mysqli_fetch_array($data)) {
            ?>
            <tr>
                <td><?php echo $row['idname']; ?>
                </td>
                <td><?php echo $row['name']; ?>
                </td>
                <td><?php echo $row['gender']; ?>
                </td>
                <td><?php echo $row['age']; ?>
                </td>
                <td><?php echo $row['occupation']; ?>
                </td>
                <td><?php echo $row['location']; ?>
                </td>
                <td><?php echo $row['namehouse']; ?>
                </td>
            
                <td><a href="update.php?idname=<?php echo $row['idname']; ?>">Edit</a></td>

                <td><a onclick="return confirm('Are You Sure?')" href="delete.php?idname=<?php echo $row['idname']; ?>">Delete</a></td>


            </tr>
            <?php
        }
    }
    else
    {
        ?>
        <tr>
            <td>No Records Found</td>
        </tr>
    <?php

    }

    ?>
</table>
</body>
</html>








<?php
date_default_timezone_set('Asia/Jakarta');
$tanggal_waktu = date('l, d F Y H:i:s T');
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style/viewstyles.css">
</head>

<body>
    <div class="header">
        <h1>Admin Dashboard</h1>
    <?php include 'connection.php'; ?>
    <div class="dashboard-container">
        <div id="waktu_dashboard"><?php echo $tanggal_waktu; ?></div>
    </div>
    </div>

    <div class="create-button-container">
        <a href="index.php" class="create-button">Create</a>
    </div>

    <table class="table-container">
        <tr>
            <th>ID Name</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Occupation</th>
            <th>Location</th>
            <th>Name House</th>
            <th>Image</th>
            <th colspan="2">Actions</th>
        </tr>
        <?php
        $query = "SELECT * FROM crud";
        $data = mysqli_query($conn, $query);
        $result = mysqli_num_rows($data);

        if ($result) {
            while ($row = mysqli_fetch_array($data)) {
        ?>
                <tr>
                    <td><?php echo $row['idname']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['occupation']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td><?php echo $row['namehouse']; ?></td>
                    <td><img src="uploads/<?php echo $row['image_filename']; ?>" alt="Gambar" style="width: 100px; height: 100px;"></td>
                    <td><a class="edit-link" href="update.php?idname=<?php echo $row['idname']; ?>">Edit</a></td>
                    <td><a class="delete-link" onclick="return confirm('Are You Sure?')" href="delete.php?idname=<?php echo $row['idname']; ?>">Delete</a></td>
                </tr>
        <?php
            }
        } else {
        ?>
            <tr>
                <td>No Records Found</td>
            </tr>
        <?php
        }
        ?>
    </table>
    <script>
        function updateWaktu() {
            var waktuDiv = document.getElementById('waktu_dashboard');
            var now = new Date();
            var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit', timeZoneName: 'short' };
            waktuDiv.textContent = now.toLocaleDateString('en-US', options);
        }

        setInterval(updateWaktu, 1000);
    </script>
</body>

</html>

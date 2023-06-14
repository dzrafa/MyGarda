<!DOCTYPE html>
<html>
<head>
    <title>Edit Admin | MyGarda</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 10px;
        }

        .form-title {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
        }

        td input[type="text"],
        td input[type="datetime-local"],
        td input[type="submit"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        td input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .back-link a,
        td input[type="submit"] {
            text-decoration: none;
        }

        .back-link a:hover,
        td input[type="submit"]:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Data Antrian</h2>
        <div class="back-link">
            <a href="CRUD Admin.php">KEMBALI</a>
        </div>
        <h3 class="form-title">Edit Data Antrian</h3>
        <?php
        include 'koneksi.php';
        $id = $_GET['id'];
        $data = mysqli_query($conn,"SELECT * FROM `antrian` WHERE ID_Antrian = $id");
        while($d = mysqli_fetch_array($data)){
            ?>
            <form method="post" action="update.php">
                <table>
                    <tr>
                        <td>Status Antrian</td>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $d['ID_Antrian']; ?>">
                            <input type="text" name="Status_Antrian" value="<?php echo $d['Status_Antrian']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Waktu Perkiraan Pelayanan</td>
                        <td><input type="datetime-local" name="Waktu_Perkiraan_Pelayanan" value="<?php echo date('Y-m-d\TH:i', strtotime($d['Waktu_Perkiraan_Pelayanan'])); ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="SIMPAN"></td>
                    </tr>
                </table>
            </form>
            <?php 
        }
        ?>
    </div>
</body>
</html>

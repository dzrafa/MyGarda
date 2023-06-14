<!DOCTYPE html>
<html>
<head>
    <title>Admin | MyGarda</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
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

        .add-link {
            display: inline-block;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        td a {
            color: #333;
            text-decoration: none;
        }

        td a:hover {
            color: #007bff;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 10px;
        }

        .back-link a {
            color: #333;
            text-decoration: none;
        }

        .back-link a:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>CRUD DATA ANTRIAN</h2>
        <div class="add-link">
            <a href="CRUD Create.php"><i class="fas fa-plus-circle"></i> </a>
        </div>
        <table>
            <tr>
                <th>NO</th>
                <th>ID Antrian</th>
                <th>Nomor Antrian</th>
                <th>Waktu Masuk</th>
                <th>Waktu Perkiraan Layanan</th>
                <th>Status Antrian</th>
                <th>ID Pelanggan</th>
                <th>OPSI</th>
            </tr>
            <?php 
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($conn,"SELECT * FROM `antrian`");
            while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['ID_Antrian']; ?></td>
                    <td><?php echo $d['Nomor_Antrian']; ?></td>
                    <td><?php echo $d['Waktu_Masuk']; ?></td>
                    <td><?php echo $d['Waktu_Perkiraan_Pelayanan']; ?></td>
                    <td><?php echo $d['Status_Antrian']; ?></td>
                    <td><?php echo $d['ID_Pelanggan']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $d['ID_Antrian']; ?>"><i class="fas fa-edit"></i></a>
                        <a href="hapus.php?id=<?php echo $d['ID_Antrian']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php 
            }
            ?>
        </table>		
        <div class="back-link">
            <a href="Homepage.php"><i class="fas fa-home"></i> 
        </div>
    </div>
</body>
</html>

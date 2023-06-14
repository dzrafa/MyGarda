<!DOCTYPE html>
<html>
<head>
    <title>Add Admin | MyGarda</title>
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
        <h2>Penambahan Data Baru</h2>
        <div class="back-link">
            <a href="CRUD Admin.php">KEMBALI</a>
        </div>
        <h3 class="form-title">Tambahkan Data Pelanggan</h3>
        <form method="post" action="tambah_aksi.php">
            <table>
                <tr>
                    <td>Nomor Antrian</td>
                    <td><input type="text" name="Nomor_Antrian"></td>
                </tr>
                <tr>
                    <td>Waktu Masuk</td>
                    <td><input type="datetime-local" name="Waktu_Masuk"></td>
                </tr>
                <tr>
                    <td>ID Pelanggan</td>
                    <td><input type="text" name="ID_Pelanggan"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="SIMPAN"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>

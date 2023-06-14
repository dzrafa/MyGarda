<!DOCTYPE html>
<html>
<head>
    <title>STATUS | MyGarda</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f1f1f1;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        td {
            border-top: 1px solid #f2f2f2;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0069d9;
        }
    </style>
</head>
<body>
    <h1>STATUS ANTRIAN</h1>
    <table id="queue-table">
        <tr>
            <th>ID Antrian</th>
            <th>Nomor Antrian</th>
            <th>Status Antrian</th>
            <th>Waktu Perkiraan Layanan</th>
        </tr>
    </table>

    <div style="text-align: center; margin-top: 20px;">
        <a href="Homepage.php" class="btn">Kembali ke Halaman Utama</a>
    </div>

    <script>
        // Function to update the queue status table
        function updateQueueStatus(data) {
            var table = document.getElementById("queue-table");

            // Clear existing rows
            while (table.rows.length > 1) {
                table.deleteRow(1);
            }

            // Add new rows based on the updated data
            for (var i = 0; i < data.length; i++) {
                var row = table.insertRow(-1);
                var idCell = row.insertCell(0);
                var numberCell = row.insertCell(1);
                var statusCell = row.insertCell(2);
                var timeCell = row.insertCell(3);

                idCell.innerHTML = data[i].ID_Antrian;
                numberCell.innerHTML = data[i].Nomor_Antrian;
                statusCell.innerHTML = data[i].Status_Antrian;
                timeCell.innerHTML = data[i].Waktu_Perkiraan_Pelayanan;
            }
        }

        // Function to fetch updated queue data from the server
        function fetchQueueData() {
            // Send AJAX request to fetch_data.php
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "fetch_data.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Parse the response as JSON
                    var data = JSON.parse(xhr.responseText);
                    updateQueueStatus(data); // Update the queue status table with the fetched data
                }
            };
            xhr.send();

            // Fetch data periodically (every 5 seconds)
            setTimeout(fetchQueueData, 5000);
        }

        // Start fetching queue data when the page loads
        window.onload = fetchQueueData;
    </script>
</body>
</html>

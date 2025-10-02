<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bantuan Sosial - Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #007bff;
            color: white;
            padding: 15px 20px;
            font-size: 18px;
            font-weight: bold;
        }
        .container {
            max-width: 900px;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 2px 6px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .status {
            padding: 5px 10px;
            border-radius: 4px;
            color: white;
            font-size: 14px;
        }
        .status.hijau {
            background-color: #28a745;
        }
        .status.merah {
            background-color: #dc3545;
        }
        .status.biru {
            background-color: #007bff
        }
    </style>
</head>
<body>

    <div class="navbar">📂 Bantuan Sosial - Admin</div>

    <div class="container">
        <h1>Daftar Penerima Bantuan Sosial</h1>
        <table>
            <tr>
                <th>Penerima</th>
                <th>Jenis Bantuan</th>
                <th>Jumlah yang diterima</th>
                <th>Status</th>
            </tr>
            @foreach($dataBansos as $bansos)
            <tr>
                <td>{{ $bansos['penerima'] }}</td>
                <td>{{ $bansos['jenisBantuan'] }}</td>
                <td>{{ $bansos['jumlahBantuan'] }}</td>
                <td>
                    @if($bansos['status'] == 'belum diterima')
                        <span class="status merah">{{ $bansos['status'] }}</span>
                     @elseif($bansos['status'] == 'sedang diproses')
                        <span class="status biru">{{ $bansos['status'] }}</span>
                        @else
                            <span class="status hijau">{{ $bansos['status'] }}</span>
                        @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>

</body>
</html>
view
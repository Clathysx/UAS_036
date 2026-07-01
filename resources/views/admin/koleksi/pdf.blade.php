<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Koleksi Museum</title>

    <style>
        body{
            font-family: DejaVu Sans;
            font-size:12px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        table,th,td{
            border:1px solid black;
        }

        th,td{
            padding:8px;
            text-align:left;
        }

        h2{
            text-align:center;
        }
    </style>

</head>
<body>

<h2>Laporan Data Koleksi Museum Otomotif Indonesia</h2>

<table>

    <thead>

    <tr>
        <th>No</th>
        <th>ID</th>
        <th>Nama</th>
        <th>Tahun</th>
        <th>Kategori</th>
        <th>Lokasi</th>
        <th>Asal</th>
    </tr>

    </thead>

    <tbody>

    @foreach($koleksis as $item)

    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->id_koleksi }}</td>
        <td>{{ $item->nama_koleksi }}</td>
        <td>{{ $item->tahun }}</td>
        <td>{{ $item->kategori }}</td>
        <td>{{ $item->lokasi_penyimpanan }}</td>
        <td>{{ $item->asal_koleksi }}</td>
    </tr>

    @endforeach

    </tbody>

</table>

</body>
</html>
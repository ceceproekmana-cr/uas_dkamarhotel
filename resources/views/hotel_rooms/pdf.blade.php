<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <style>
        body {

            font-family: DejaVu Sans, sans-serif;

            font-size: 12px;

        }

        table {

            width: 100%;

            border-collapse: collapse;

            margin-top: 15px;

        }

        table th,
        table td {

            border: 1px solid #000;

            padding: 6px;

        }

        th {

            background: #e9ecef;

        }

        .title {

            text-align: center;

        }
    </style>

</head>

<body>

    <h2 class="title">

        HOTEL SEJATERA

    </h2>

    <h3 class="title">

        LAPORAN DATA KAMAR HOTEL SEJATERA

    </h3>

    <hr>

    <p>

        Tanggal Cetak :

        {{ date('d-m-Y H:i:s') }}

    </p>

    <table>

        <thead>

            <tr>

                <th>No</th>

                <th>ID</th>

                <th>Foto</th>

                <th>Nomor</th>

                <th>Nama</th>

                <th>Tipe</th>

                <th>Harga</th>

                <th>Kapasitas</th>

                <th>Status</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($hotelRooms as $room)
                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $room->id_kamar }}</td>

                    <td>

                        @if ($room->foto)
                            <img src="{{ public_path('uploads/hotel_rooms/' . $room->foto) }}" width="70">
                        @endif

                    </td>

                    <td>{{ $room->nomor_kamar }}</td>

                    <td>{{ $room->nama_kamar }}</td>

                    <td>{{ $room->tipe_kamar }}</td>

                    <td>

                        Rp {{ number_format($room->harga_per_malam, 0, ',', '.') }}

                    </td>

                    <td>

                        {{ $room->kapasitas_orang }}

                    </td>

                    <td>

                        {{ $room->status }}

                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>

    <br><br>

    <table border="0">

        <tr>

            <td width="65%"></td>

            <td align="center">

                Jakarta,

                {{ date('d F Y') }}

                <br><br>

                Hotel Manager

                <br><br><br><br>

                _____________________

            </td>

        </tr>

    </table>

</body>

</html>

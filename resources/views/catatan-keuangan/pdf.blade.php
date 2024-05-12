<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @php
        $start_date = Request::get('start_date') ?? '';
        $end_date = Request::get('end_date') ?? '';
        $tipe = Request::get('tipe') ?? '';
    @endphp
    <title>Laporan {{ $tipe }} {{$start_date ?? ''}} - {{$end_date ?? ''}}</title>

    <style>
        @media print {
            body {
                margin: 0;
            }
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 2px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body onload="window.print()">
    <center>
        <h5>Laporan {{ $tipe }} {{$start_date ?? ''}} - {{$end_date ?? ''}}</h5>
    </center>
    <table border="1" id="myDataTable" class="table align-items-center mb-0">
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    No
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Keterangan
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Saldo
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Tanggal
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Jenis
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Tipe
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($keuangan as $item)
            <tr>
                    
                <td class="ps-4">
                    <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                </td>
                <td class="text-center">
                    <p class="text-xs font-weight-bold mb-0" style="text-align: left">{{ $item->keterangan }}</p>
                </td>
                
                <td class="text-center">
                    <p class="text-xs font-weight-bold mb-0">@currency($item->saldo)</p>
                </td>
                
                <td class="text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $item->tanggal}}</span>
                </td>
               
                <td class="text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $item->jenis}}</span>
                </td>
                <td class="text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $item->tipe}}</span>
                </td>
               
            </tr>
        @endforeach
</body>
</html>
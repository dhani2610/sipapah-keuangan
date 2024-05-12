<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
</head>
<body>
    <table id="myDataTable" class="table align-items-center mb-0">
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
            @foreach ($data['keuangan'] as $item)
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
               
                <td class="text-center">
                <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#modaledit{{ $item->id }}">
                    <i class="fas fa-user-edit text-secondary"></i>
                </a>
                <a href="{{ route('delete-catatan-keuangan',$item->id) }}" type="button" >
                    <i class="cursor-pointer fas fa-trash text-secondary"></i>
                </a>
                </td>
            </tr>
        @endforeach
</body>
</html>
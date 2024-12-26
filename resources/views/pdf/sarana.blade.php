<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Sarana</title>
</head>

<body>

    <h1 style="text-align: center">Data Sarana</h1>
    <div class="table-responsive">
        <table style="text-align: center;" class="table table-bordered" border="1">
            <thead>
                <tr>
                    <th>Kode Barang</th>
                    <th>Jenis Barang</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td>{{ $d->kode_barang }}</td>
                        <td>{{ $d->jenis_barang }}</td>
                        <td>{{ $d->jumlah }}</td>
                        <td>
                            @if ($d->kondisi == 'Baru')
                                <span class="bg-lightyellow badges">Baru</span>
                            @elseif ($d->kondisi == 'Baik')
                                <span class="bg-lightgreen badges">Baik</span>
                            @elseif ($d->kondisi == 'Rusak')
                                <span class="bg-lightred badges">Rusak</span>
                            @else
                                <span class="bg-lightyellow badges">Tidak Diketahui</span>
                            @endif
                        </td>
                        <td>{{ $d->keterangan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>

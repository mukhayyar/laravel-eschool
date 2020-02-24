<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswatitle>
</head>
<body>
    <h1>Data Siswa</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Rerata Nilai</th>
                </tr>
            </thead>
            <tbody>
            @foreach($siswa as $s)
                <tr>
                    <td>{{$s->namaLengkap()}}</td>
                    <td>{{$s->jenis_kelamin}}</td>
                    <td>{{$s->agama}}</td>
                    <td>{{$s->rataRataNilai()}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    
</body>
</html>
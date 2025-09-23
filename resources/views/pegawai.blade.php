<!DOCTYPE html>
<html>
<head>
    <title>Data Pegawai</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .card { border: 1px solid #ddd; padding: 20px; margin: 10px 0; }
        .hobby-list { list-style-type: square; }
    </style>
</head>
<body>
    <h1>Data Pegawai</h1>

    <div class="card">
        <h3>Informasi Pribadi</h3>
        <p><strong>Nama:</strong> {{ $name }}</p>
        <p><strong>Umur:</strong> {{ $my_age }} tahun</p>
        <p><strong>Cita-cita:</strong> {{ $future_goal }}</p>
    </div>

    <div class="card">
        <h3>Hobi</h3>
        <ul class="hobby-list">
            @foreach($hobbies as $hobby)
                <li>{{ $hobby }}</li>
            @endforeach
        </ul>
    </div>

    <div class="card">
        <h3>Informasi Akademik</h3>
        <p><strong>Semester Saat Ini:</strong> {{ $current_semester }}</p>
        <p><strong>Status:</strong>@if (($current_semester) < 3)
                    Masih Awal, Kejar TAK
                @else
                    Jangan main-main, kurang-kurangi main game!
                @endif</p>
        <p><strong>Tanggal Harus Wisuda:</strong> {{ date('d F Y', strtotime($tgl_harus_wisuda)) }}</p>
        <p><strong>Jumlah Hari Menuju Wisuda:</strong>
            {{ $time_to_study_left. ' hari lagi'}}
        </p>
    </div>
</body>
</html>

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = [
            'name' => 'Dzikri Maulana',
            'tanggal_lahir' => '2005-12-08',
            'hobbies' => ['Futsal', 'Bermain Game', 'Mancing', 'Programming', 'Traveling'],
            'tgl_harus_wisuda' => '2028-10-25',
            'current_semester' => 3,
            'future_goal' => 'Menjadi Business Man'
        ];

        // Hitung umur
        $umur = Carbon::parse($data['tanggal_lahir'])->age;

        // Hitung jarak hari sampai wisuda
        $jarakHari = Carbon::now()->diffInDays($data['tgl_harus_wisuda']);

        return view('pegawai', [
            'name' => $data['name'],
            'my_age' => $umur,
            'hobbies' => $data['hobbies'],
            'tgl_harus_wisuda' => $data['tgl_harus_wisuda'],
            'time_to_study_left' => $jarakHari,
            'current_semester' => $data['current_semester'],
            'future_goal' => $data['future_goal']
        ]);
    }
}

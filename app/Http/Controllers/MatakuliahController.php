<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        return "Menampilkan data matakuliah";
    }

    public function show($kode = null)
    {
        if ($kode) {
            return "Anda mengakses matakuliah $kode";
        } else {
            return "Masukkan kode matakuliah!";
        }
    }

    public function create()
    {
        return "Menampilkan form membuat matakuliah baru";
    }

    public function store(Request $request)
    {
        return "Menyimpan data matakuliah baru";
    }

    public function edit($id)
    {
        return "Menampilkan form edit matakuliah dengan id: $id";
    }

    public function update(Request $request, $id)
    {
        return "Memperbarui data matakuliah dengan id: $id";
    }

    public function destroy($id)
    {
        return "Menghapus data matakuliah dengan id: $id";
    }
}

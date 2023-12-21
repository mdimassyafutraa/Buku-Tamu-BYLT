<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TamuController extends Controller
{
    public function index()
    {
        return view('tamu');
    }

    public function store(Request $request)
    {
        $userId = Auth::id();
        $validatedData = $request->validate([
            'name' => 'required|string',
            'alamat' => 'required|string',
            'no_telp' => 'required|string',
            'profesi' => 'required|string',
            'instansi' => 'required|string',
            'tanggal_kunjungan' => 'required|date',
            'waktu_kunjungan' => 'required|date_format:H:i',
            'tujuan' => 'required|string',
            'nama_tujuan_tamu' => 'required|string',
        ]);

        // Mendapatkan pengguna yang saat ini masuk
        $user = Auth::user();

        $tamu = new Tamu([
            'qr_code' => Str::random(20),
            'name' => $request->input('name'),
            'alamat' => $request->input('alamat'),
            'no_telp' => $request->input('no_telp'),
            'profesi' => $request->input('profesi'),
            'instansi' => $request->input('instansi'),
            'tanggal_kunjungan' => $request->input('tanggal_kunjungan'),
            'waktu_kunjungan' => $request->input('waktu_kunjungan'),
            'tujuan' => $request->input('tujuan'),
            'nama_tujuan_tamu' => $request->input('nama_tujuan_tamu'),
            'status' => 'Belum hadir',
        ]);

        $user->tamu()->save($tamu);
        $role = $user->role;
        $redirectRoute = '';

        if ($role === 'petugas') {
            $tamu->update(['status' => 'Sudah Hadir', 'last_status_change' => now()]);
        }

        switch ($role) {
            case 'admin':
                $redirectRoute = 'admin.tamu';
                break;
            case 'petugas':
                $redirectRoute = 'petugas.tamu';
                break;
            case 'tamu':
                $redirectRoute = 'dataTamu';
                break;

            default:
                return redirect()->back()->with('error', 'Tidak dapat menentukan peran pengguna.');
                break;
        }

        return redirect()->route($redirectRoute)->with('success', 'Data tamu berhasil disimpan.');
    }
}

<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tamu;

class ScanController extends Controller
{
    public function index()
    {
        return view('petugas.scan');
    }

    public function scanQRCode(Request $request)
    {
        $qrCodeValue = $request->input('qr_code_value');

        $tamu = Tamu::where('qr_code', $qrCodeValue)->first();

        if ($tamu) {
            if ($tamu->status === 'Sudah Hadir') {
                return response()->json(['message' => 'Status sudah ada'], 200);
            } else {
                $tamu->status = 'Sudah Hadir';
                $tamu->save();

                $tamu->last_status_change = now();
                $tamu->save();

                return response()->json(['message' => 'Status berhasil diperbarui'], 200);
            }
        } else {
            return response()->json(['error' => 'Tamu tidak ditemukan'], 404);
        }
    }
}

<?php

namespace App\Http\Controllers\tamu;

use App\Http\Controllers\Controller;
use App\Models\Tamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    function index()
    {
        $userId = Auth::id();

        $tamu = Tamu::where('user_id', $userId)->where('status', 'Sudah Hadir')
            ->get();

        return view('tamu.riwayat', compact('tamu'));
    }
}

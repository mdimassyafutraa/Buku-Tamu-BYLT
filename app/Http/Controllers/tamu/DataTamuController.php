<?php

namespace App\Http\Controllers\tamu;

use App\Http\Controllers\Controller;
use App\Models\Tamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataTamuController extends Controller
{
    function index()
    {
        $userId = Auth::id();

        $tamu = Tamu::where('user_id', $userId)->where('status', 'Belum Hadir')
            ->get();
        return view('tamu.dataTamu', compact('tamu'));
    }

    public function destroy($id)
    {
        $tamu = Tamu::findOrFail($id);
        $tamu->delete();

        return redirect()->back()->with('success', 'Data tamu berhasil dihapus');
    }
}

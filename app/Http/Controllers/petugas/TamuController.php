<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\Tamu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    public function index(Request $request)
    {
        $today = Carbon::today();
        $query = Tamu::whereDate('created_at', $today);

        if ($request->has('q')) {
            $searchQuery = $request->input('q');
            $query->where(function ($query) use ($searchQuery) {
                $query->where('name', 'like', '%' . $searchQuery . '%')
                    ->orWhere('status', 'like', '%' . $searchQuery . '%');
            });
        }

        $tamu = $query->paginate(10);

        return view('petugas.tamu.index', compact('tamu'));
    }


    function updateStatus(Request $request, $id)
    {
        $tamu = Tamu::findOrFail($id);
        $tamu->status = $request->input('status');
        $tamu->last_status_change = now();
        $tamu->save();

        return redirect()->route('petugas.tamu')->with('success', 'Status tamu berhasil diperbarui.');
    }

    function show($id)
    {
        $tamu = Tamu::findOrFail($id);
        return view('petugas.tamu.show', compact('tamu'));
    }

    function edit($id)
    {
        $tamu = Tamu::findOrFail($id);
        return view('petugas.tamu.edit', compact('tamu'));
    }

    public function update(Request $request, $id)
    {
        $tamu = Tamu::findOrFail($id);
        $tamu->name = $request->input('name');
        $tamu->alamat = $request->input('alamat');
        $tamu->no_telp = $request->input('no_telp');
        $tamu->profesi = $request->input('profesi');
        $tamu->instansi = $request->input('instansi');
        $tamu->tujuan = $request->input('tujuan');
        $tamu->tanggal_kunjungan = $request->input('tanggal_kunjungan');
        $tamu->waktu_kunjungan = $request->input('waktu_kunjungan');
        $tamu->nama_tujuan_tamu = $request->input('nama_tujuan_tamu');
        $tamu->save();


        return redirect()->route('petugas.tamu.show', $tamu->id)->with('success', 'Data tamu berhasil diperbarui.');
    }


    function destroy($id)
    {
        $tamu = Tamu::findOrFail($id);
        $tamu->delete();
        return redirect()->route('petugas.tamu')->with('success', 'Data tamu berhasil dihapus.');
    }
}

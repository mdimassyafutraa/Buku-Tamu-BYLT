<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tamu;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    function index(Request $request)
    {
        $tamuQuery = Tamu::query();

        $perPage = 20;

        if ($request->has('q')) {
            $searchQuery = $request->input('q');
            $tamuQuery->where(function ($query) use ($searchQuery) {
                $query->where('name', 'like', '%' . $searchQuery . '%')
                    ->orWhere('status', 'like', '%' . $searchQuery . '%');
            });
        }


        $currentPage = $request->input('page', 1);

        $tamu = $tamuQuery->paginate($perPage);

        $itemNumber = ($currentPage - 1) * $perPage + 1;

        return view('admin.tamu.index', compact('tamu', 'itemNumber'));
    }


    function updateStatus(Request $request, $id)
    {
        $tamu = Tamu::findOrFail($id);
        $tamu->status = $request->input('status');
        $tamu->last_status_change = now();
        $tamu->save();

        return redirect()->route('admin.tamu')->with('success', 'Status tamu berhasil diperbarui.');
    }

    function show($id)
    {
        $tamu = Tamu::findOrFail($id);
        return view('admin.tamu.show', compact('tamu'));
    }

    function edit($id)
    {
        $tamu = Tamu::findOrFail($id);
        return view('admin.tamu.edit', compact('tamu'));
    }

    function update(Request $request, $id)
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

        return redirect()->route('admin.tamu.show', $tamu->id)->with('success', 'Data tamu berhasil diperbarui.');
    }

    function destroy($id)
    {
        $tamu = Tamu::findOrFail($id);
        $tamu->delete();
        return redirect()->route('admin.tamu')->with('success', 'Data tamu berhasil dihapus.');
    }
}

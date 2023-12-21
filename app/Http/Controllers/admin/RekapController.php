<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tamu;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TamuExport;
use Carbon\Carbon;

class RekapController extends Controller
{
    function index()
    {
        return view('admin.rekap.index');
    }

    public function rekap(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $status = $request->input('status');

        return Excel::download(new TamuExport($startDate, $endDate, $status), 'tamu.xlsx');
    }
}

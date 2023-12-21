<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Tamu;

class DashboardController extends Controller
{
    public function index()
    {
        $todayCount = $this->getTamuCountFromLastStatusChange('today');
        $yesterdayCount = $this->getTamuCountFromLastStatusChange('yesterday');
        $thisWeekCount = $this->getTamuCountFromLastStatusChange('this_week');
        $thisMonthCount = $this->getTamuCountFromLastStatusChange('this_month');

        $tamuToday = $this->getTamuDataForToday();

        return view('admin.dashboard', compact('todayCount', 'yesterdayCount', 'thisWeekCount', 'thisMonthCount', 'tamuToday'));
    }


    public function getTamuCountFromLastStatusChange($period)
    {
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();
        $startOfWeek = Carbon::now()->startOfWeek();

        $tamuCount = 0;

        switch ($period) {
            case 'today':
                $tamuCount = Tamu::where('status', 'Sudah Hadir')
                    ->whereDate('last_status_change', $today)
                    ->count();
                break;
            case 'yesterday':
                $tamuCount = Tamu::where('status', 'Sudah Hadir')
                    ->whereDate('last_status_change', $yesterday)
                    ->count();
                break;
            case 'this_week':
                $tamuCount = Tamu::where('status', 'Sudah Hadir')
                    ->whereDate('last_status_change', '>=', $startOfWeek)
                    ->count();
                break;
            case 'this_month':
                $startOfMonth = Carbon::now()->startOfMonth();
                $tamuCount = Tamu::where('status', 'Sudah Hadir')
                    ->whereDate('last_status_change', '>=', $startOfMonth)
                    ->count();
                break;
        }

        return $tamuCount;
    }

    public function getTamuDataForToday()
    {
        $today = Carbon::today();

        $tamuToday = Tamu::where('status', 'Sudah Hadir')
            ->whereDate('last_status_change', $today)
            ->get();

        return $tamuToday;
    }
}

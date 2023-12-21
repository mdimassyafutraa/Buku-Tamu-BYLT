<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Contact;

class HomeController extends Controller
{
    public function index()
    {
        $todayCount = $this->getTamuCountFromLastStatusChange('today');
        $yesterdayCount = $this->getTamuCountFromLastStatusChange('yesterday');
        $thisWeekCount = $this->getTamuCountFromLastStatusChange('this_week');

        return view('home', compact('todayCount', 'yesterdayCount', 'thisWeekCount'));
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
        }

        return $tamuCount;
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'pesan' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->pesan;
        $contact->save();

        return redirect()->back()->with('success', 'Pesan telah berhasil dikirim!');
    }
}

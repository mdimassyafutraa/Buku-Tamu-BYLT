<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class FormKontakController extends Controller
{
    function index(Request $request)
    {
        $contactsQuery = Contact::query();

        $perPage = 20;

        if ($request->has('q')) {
            $searchQuery = $request->input('q');
            $contactsQuery->where(function ($query) use ($searchQuery) {
                $query->where('name', 'like', '%' . $searchQuery . '%')
                    ->orWhere('email', 'like', '%' . $searchQuery . '%')
                    ->orWhere('message', 'like', '%' . $searchQuery . '%');
            });
        }

        $contacts = $contactsQuery->paginate($perPage);
        $contacts = $contactsQuery->latest()->paginate($perPage);

        $itemNumber = ($contacts->currentPage() - 1) * $contacts->perPage() + 1;

        return view('admin.formkontak', compact('contacts', 'itemNumber'));
    }
}

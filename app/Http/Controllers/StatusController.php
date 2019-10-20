<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('status.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'status' => 'required|max:280',
            'image' => 'image',
        ]);

        if (request('image') == null) {
            Auth::user()->statuses()->create([
                'status' => $data['status'],
            ]);
        } else {
            Auth::user()->statuses()->create([
                'status' => $data['status'],
                'image' => request('image')->store('upload', 'public'),
            ]);
        }
        // auth()->user()->statuses()->create($data);



        return redirect('/profile/' . Auth::id());
    }
}

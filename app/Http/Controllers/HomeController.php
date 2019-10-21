<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $userStatus = $user->statuses;

        $following = $user->following()->pluck('profiles.user_id');
        $status = Status::whereIn('user_id', $following)->latest()->get();
        // $allTweet = collect($userStatus, $status);
        $status = $userStatus->merge($status)->sortByDesc('created_at');
        return view('home', compact('user', 'status'));
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ProfileController extends Controller
{
    public function show(User $user)
    {
        $follows = (Auth::user()) ? Auth::user()->following->contains($user->id) : false;
        return view('profile.show', compact('user', 'follows'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user->profile);
        $data = $request->validate([
            'bio' => 'max:280',
            'location' => '',
            'url' => '',
            'image' => 'image'
        ]);



        if (request('image')) {
            $imagePath = request('image')->store('upload', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
            Auth::user()->profile()->update(array_merge($data, [
                'image' => $imagePath,
            ]));
        } else {
            $user->profile->update($data);
        }


        return redirect('/profile/' . Auth::id());
    }
}

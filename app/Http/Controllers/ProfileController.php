<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{

    public function update(UpdateProfileRequest $request) {

        auth()->user()->update($request->only(['name', 'email']));
        
        if($request->input('password')) {
            auth()->user()->update([
                'password' => bcrypt($request->input('password'))
            ]);
        }
        return back()->with('message', 'profile saved successfully');
    }
}

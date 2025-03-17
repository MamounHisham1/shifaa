<?php

namespace App\Http\Controllers;

use App\Http\Resources\Api\V1\ProfileResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $userData = $request->validate([
            'type' => ['required', 'string', 'in:admin,doctor,patient'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['nullable', 'string', 'unique:users'],
            'password' => ['required', Password::defaults()],
        ]);

        $user = User::create($userData);
        
        $profileData = $request->validate([
            'city' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'street' => ['nullable', 'string', 'max:255'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        $profile = $user->profile()->create($profileData);

        // dd($profile);
       $profile->load('user');
        return ProfileResource::make($profile);
    }
}

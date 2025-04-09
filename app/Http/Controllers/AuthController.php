<?php

namespace App\Http\Controllers;

use App\Http\Resources\Api\V1\PatientResource;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();
        if (!$user) {
            return response()->json(['message' => 'User not found'], 401);
        }

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $patient = Patient::where('profile_id', $user->profile->id)->first();
        
        if (! $patient) {
            return response()->json(['message' => 'Patient not found'], 401);
        }

        $patient->load('profile');
        $patient->load('profile.user');
        return PatientResource::make($patient);
    }
}

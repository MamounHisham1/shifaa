<?php

namespace App\Http\Controllers;

use App\Http\Resources\Api\V1\PatientResource;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $userData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['nullable', 'string', 'unique:users'],
            'password' => ['required', Password::defaults()],
        ]);        
        $profileData = $request->validate([
            'city' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'street' => ['nullable', 'string', 'max:255'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);
        $patientData = $request->validate([
            'blood_group' => ['nullable', 'string', 'max:255'],
            'weight' => ['nullable', 'numeric'],
            'height' => ['nullable', 'numeric'],
            'allergies' => ['nullable', 'string', 'max:255'],
            'medications' => ['nullable', 'string', 'max:255'],
            'surgeries' => ['nullable', 'string', 'max:255'],
            'diseases' => ['nullable', 'string', 'max:255'],
            'family_history' => ['nullable', 'string', 'max:255'],
            'emergency_contact_name' => ['nullable', 'string', 'max:255'],
            'emergency_contact_phone' => ['nullable', 'string', 'max:255'],
            'emergency_contact_relationship' => ['nullable', 'string', 'max:255'],
        ]);

        $user = User::create([...$userData, 'type' => 'patient']);
        $profile = $user->profile()->create($profileData);
        $patient = Patient::create([...$patientData, 'profile_id' => $profile->id]);

        $patient->load('profile');
        $patient->load('profile.user');
        return PatientResource::make($patient);
    }
}

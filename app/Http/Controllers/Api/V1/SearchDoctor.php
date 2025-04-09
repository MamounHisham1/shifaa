<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\DoctorResource;
use App\Models\Doctor;
use Illuminate\Http\Request;

class SearchDoctor extends Controller
{
    public function __invoke(Request $request)
    {
        $doctors = Doctor::search($request->input('query'))->paginate(10);
        // $doctors->load('profile');
        // $doctors->load('profile.user');
        return DoctorResource::collection($doctors);
    }
}

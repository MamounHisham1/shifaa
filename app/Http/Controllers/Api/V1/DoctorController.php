<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Http\Resources\Api\V1\DoctorResource;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\Enums\FilterOperator;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $doctors = QueryBuilder::for(Doctor::class)
            ->allowedIncludes(['user'])
            ->allowedFilters([
                'speciality',
                'qualification',
                'bio',
                'user.name',
                'user.city',
                'user.state',
                'user.country',
                AllowedFilter::exact('status'),
                AllowedFilter::exact('available_days'),
            ])
            ->allowedSorts([
                'speciality',
                'qualification',
                'experience',
                'consultation_fee',
                'status',
                'created_at'
            ])
            ->paginate()
            ->appends($request->query());

        return DoctorResource::collection($doctors);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return DoctorResource::make($doctor);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}

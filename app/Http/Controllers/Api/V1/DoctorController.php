<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Http\Resources\Api\V1\DoctorResource;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
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
            ->allowedFilters([
                'speciality',
                'qualification',
                'bio',
                AllowedFilter::exact('status'),
                AllowedFilter::exact('available_days'),

                AllowedFilter::callback('name', function ($query, $value) {
                    $query->whereHas('profile', function ($query) use ($value) {
                        $query->whereHas('user', function ($query) use ($value) {
                            $query->where('name', 'like', "%{$value}%");
                        });
                    });
                }),
                AllowedFilter::callback('city', function ($query, $value) {
                    $query->whereHas('profile', function ($query) use ($value) {
                        $query->where('city', 'like', "%{$value}%");
                    });
                }),
                AllowedFilter::callback('state', function ($query, $value) {
                    $query->whereHas('profile', function ($query) use ($value) {
                        $query->where('state', 'like', "%{$value}%");
                    });
                }),
                AllowedFilter::callback('country', function ($query, $value) {
                    $query->whereHas('profile', function ($query) use ($value) {
                        $query->where('country', 'like', "%{$value}%");
                    });
                }),

                AllowedFilter::callback('consultation_fee', function ($query, $value) {
                    if (isset($value['lt'])) {
                        $query->where('consultation_fee', '<', $value['lt']);
                    }
                    if (isset($value['gt'])) {
                        $query->where('consultation_fee', '>', $value['gt']);
                    }
                }),
                AllowedFilter::callback('experience', function ($query, $value) {
                    if (isset($value['gt'])) {
                        $query->where('experience', '>', $value['gt']);
                    }
                    if (isset($value['gte'])) {
                        $query->where('experience', '>=', $value['gte']);
                    }
                    if (isset($value['lt'])) {
                        $query->where('experience', '<', $value['lt']);
                    }
                    if (isset($value['lte'])) {
                        $query->where('experience', '<=', $value['lte']);
                    }
                    if (isset($value['eq'])) {
                        $query->where('experience', '=', $value['eq']);
                    }
                }),
            ])
            ->allowedSorts([
                'speciality',
                'qualification',
                'experience',
                'consultation_fee',
                'status',
                'created_at',
                AllowedSort::field('profile.user.name', 'profile.users.name'),
            ])
            ->paginate($request->per_page ?? 15)
            ->appends($request->query());

        return DoctorResource::collection($doctors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorRequest $request)
    {
        return DoctorResource::make(Doctor::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return DoctorResource::make($doctor);
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

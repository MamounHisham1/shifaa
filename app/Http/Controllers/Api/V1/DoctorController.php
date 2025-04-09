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
                'qualification',
                'bio',
                AllowedFilter::exact('status'),
                AllowedFilter::exact('available_days'),

                // the specialty endpoint will be like this: /api/v1/doctors?specialty=Cardiology
                AllowedFilter::callback('specialty', function ($query, $value) {
                    $query->whereHas('specialty', function ($query) use ($value) {
                        $query->where('name', $value);
                    });
                }),

                // the name endpoint will be like this: /api/v1/doctors?name=John Doe
                AllowedFilter::callback('name', function ($query, $value) {
                    $query->whereHas('profile', function ($query) use ($value) {
                        $query->whereHas('user', function ($query) use ($value) {
                            $query->where('name', 'like', "%{$value}%");
                        });
                    });
                }),

                // the city endpoint will be like this: /api/v1/doctors?city=New York
                AllowedFilter::callback('city', function ($query, $value) {
                    $query->whereHas('profile', function ($query) use ($value) {
                        $query->where('city', 'like', "%{$value}%");
                    });
                }),

                // the state endpoint will be like this: /api/v1/doctors?state=NY
                AllowedFilter::callback('state', function ($query, $value) {
                    $query->whereHas('profile', function ($query) use ($value) {
                        $query->where('state', 'like', "%{$value}%");
                    });
                }),

                // the country endpoint will be like this: /api/v1/doctors?country=USA
                AllowedFilter::callback('country', function ($query, $value) {
                    $query->whereHas('profile', function ($query) use ($value) {
                        $query->where('country', 'like', "%{$value}%");
                    });
                }),

                // the consultation_fee endpoint will be like this: /api/v1/doctors?consultation_fee[lt]=100&consultation_fee[gt]=200
                AllowedFilter::callback('consultation_fee', function ($query, $value) {
                    if (isset($value['lt'])) {
                        $query->where('consultation_fee', '<', $value['lt']);
                    }
                    if (isset($value['gt'])) {
                        $query->where('consultation_fee', '>', $value['gt']);
                    }
                }),

                // the experience endpoint will be like this: /api/v1/doctors?experience[gt]=10&experience[gte]=20&experience[lt]=30&experience[lte]=40&experience[eq]=50
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
                'qualification',
                'experience',
                'consultation_fee',
                'status',
                'created_at',
                AllowedSort::field('profile.user.name', 'profile.users.name'),
            ])
            ->paginate($request->per_page ?? 15)
            ->appends($request->query());

        $doctors->load('profile');
        $doctors->load('profile.user');
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

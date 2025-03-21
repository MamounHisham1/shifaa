<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientsRequest;
use App\Http\Requests\UpdatePatientsRequest;
use App\Http\Resources\Api\V1\PatientResource;
use App\Models\Patient;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
use Spatie\QueryBuilder\QueryBuilder;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $patients = QueryBuilder::for(Patient::class)
            ->allowedFilters([
                'allergies',
                'medications',
                'surgeries',
                'diseases',
                'family_history',
                'emergency_contact_name',
                'emergency_contact_phone',

                AllowedFilter::exact('blood_group'),
                AllowedFilter::exact('emergency_contact_relationship'),

                // the name endpoint will be like this: /api/v1/patients?name=John Doe
                AllowedFilter::callback('name', function ($query, $value) {
                    $query->whereHas('profile', function ($query) use ($value) {
                        $query->whereHas('user', function ($query) use ($value) {
                            $query->where('name', 'like', "%{$value}%");
                        });
                    });
                }),

                // the city endpoint will be like this: /api/v1/patients?city=New York
                AllowedFilter::callback('city', function ($query, $value) {
                    $query->whereHas('profile', function ($query) use ($value) {
                        $query->whereRelation('city', 'like', "%{$value}%");
                    });
                }),

                // the state endpoint will be like this: /api/v1/patients?state=NY
                AllowedFilter::callback('state', function ($query, $value) {
                    $query->whereHas('profile', function ($query) use ($value) {
                        $query->where('state', 'like', "%{$value}%");
                    });
                }),

                // the country endpoint will be like this: /api/v1/patients?country=USA
                    AllowedFilter::callback('country', function ($query, $value) {
                    $query->whereHas('profile', function ($query) use ($value) {
                        $query->where('country', 'like', "%{$value}%");
                    });
                }),

                // the weight endpoint will be like this: /api/v1/patients?weight[lt]=100&weight[gt]=200&weight[eq]=50
                AllowedFilter::callback('weight', function ($query, $value) {
                    if (isset($value['lt'])) {
                        $query->where('weight', '<', $value['lt']);
                    }
                    if (isset($value['gt'])) {
                        $query->where('weight', '>', $value['gt']);
                    }
                    if (isset($value['eq'])) {
                        $query->where('weight', '=', $value['eq']);
                    }
                }),

                // the height endpoint will be like this: /api/v1/patients?height[lt]=100&height[gt]=200&height[eq]=50
                AllowedFilter::callback('height', function ($query, $value) {
                    if (isset($value['lt'])) {
                        $query->where('height', '<', $value['lt']);
                    }
                    if (isset($value['gt'])) {
                        $query->where('height', '>', $value['gt']);
                    }
                    if (isset($value['eq'])) {
                        $query->where('height', '=', $value['eq']);
                    }
                }),
            ])
            ->allowedSorts([
                'weight',
                'height',
                'blood_group',
                'created_at',
            ])
            ->paginate($request->per_page ?? 15)
            ->appends($request->query());

        return PatientResource::collection($patients);
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
    public function store(StorePatientsRequest $request)
    {
        return PatientResource::make(Patient::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return PatientResource::make($patient);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientsRequest $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
    }
}

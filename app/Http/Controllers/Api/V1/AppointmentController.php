<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Http\Resources\Api\V1\AppointmentResource;
use App\Models\Appointment;
use DB;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $appointments = QueryBuilder::for(Appointment::class)            
            ->allowedFilters([
                'status',
                'visit_type',
                'type',
                'is_confirmed',

                AllowedFilter::callback('doctor', function ($query, $value) {
                    $query->whereHas('schedule', function ($query) use ($value) {
                        $query->whereHas('doctor', function ($query) use ($value) {
                            $query->whereHas('user', function ($query) use ($value) {
                                if (isset($value['name'])) {
                                    $query->where('name', 'like', "%{$value['name']}%");
                                }
                                if (isset($value['city'])) {
                                    $query->where('city', 'like', "%{$value['city']}%");
                                }
                                if (isset($value['state'])) {
                                    $query->where('state', 'like', "%{$value['state']}%");
                                }
                                if (isset($value['country'])) {
                                    $query->where('country', 'like', "%{$value['country']}%");
                                }
                            });
                        });
                    });
                }),

                AllowedFilter::callback('patient', function ($query, $value) {
                    $query->whereHas('patient', function ($query) use ($value) {
                        $query->whereHas('user', function ($query) use ($value) {
                            if (isset($value['name'])) {
                                $query->where('name', 'like', "%{$value['name']}%");
                            }
                            if (isset($value['city'])) {
                                $query->where('city', 'like', "%{$value['city']}%");
                            }
                            if (isset($value['state'])) {
                                $query->where('state', 'like', "%{$value['state']}%");
                            }
                            if (isset($value['country'])) {
                                $query->where('country', 'like', "%{$value['country']}%");
                            }
                        });
                    });
                }),

                AllowedFilter::callback('date_range', function ($query, $value) {
                    if (isset($value['from'])) {
                        $query->where('appointment_datetime', '>=', $value['from']);
                    }
                    if (isset($value['to'])) {
                        $query->where('appointment_datetime', '<=', $value['to']);
                    }
                }),

                AllowedFilter::callback('reason_for_visit', function ($query, $value) {
                    $query->where('reason_for_visit', 'like', "%{$value}%");
                }),
                AllowedFilter::callback('notes', function ($query, $value) {
                    $query->where('notes', 'like', "%{$value}%");
                }),
                AllowedFilter::callback('cancellation_reason', function ($query, $value) {
                    $query->where('cancellation_reason', 'like', "%{$value}%");
                }),
            ])
            ->allowedSorts([
                'appointment_datetime',
                'status',
                'visit_type',
                'type',
                'is_confirmed',
            ])
            ->paginate($request->per_page ?? 15)
            ->appends($request->query());
        return AppointmentResource::collection($appointments);
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
    public function store(StoreAppointmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        return AppointmentResource::make($appointment);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}

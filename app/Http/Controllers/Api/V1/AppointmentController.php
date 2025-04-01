<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Http\Resources\Api\V1\AppointmentResource;
use App\Models\Appointment;
use App\Services\AppointmentService;
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

                // the doctor endpoint will be like this: /api/v1/appointments?doctor[speciality]=cardiologist&doctor[qualification]=md&doctor[name]=John Doe&doctor[city]=New York&doctor[state]=NY&doctor[country]=USA
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

                // the patient endpoint will be like this: /api/v1/appointments?patient[name]=John Doe&patient[city]=New York&patient[state]=NY&patient[country]=USA
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

                // the reason_for_visit endpoint will be like this: /api/v1/appointments?reason_for_visit[like]=heart
                AllowedFilter::callback('reason_for_visit', function ($query, $value) {
                    $query->where('reason_for_visit', 'like', "%{$value}%");
                }),

                // the notes endpoint will be like this: /api/v1/appointments?notes[like]=heart
                AllowedFilter::callback('notes', function ($query, $value) {
                    $query->where('notes', 'like', "%{$value}%");
                }),

                // the cancellation_reason endpoint will be like this: /api/v1/appointments?cancellation_reason[like]=heart
                AllowedFilter::callback('cancellation_reason', function ($query, $value) {
                    $query->where('cancellation_reason', 'like', "%{$value}%");
                }),
            ])
            ->allowedSorts([
                'status',
                'visit_type',
                'type',
                'is_confirmed',
                'created_at',
            ])
            ->paginate($request->per_page ?? 15)
            ->appends($request->query());
        return AppointmentResource::collection($appointments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentRequest $request)
    {
        $service = new AppointmentService();

        if(! $service->readyForBook($request)) {
            return response()->json(['message' => 'You can not book appointment at this time.'], 400);
        }

        return AppointmentResource::make(Appointment::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        return AppointmentResource::make($appointment);
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

    public function availableDates(Request $request)
    {
        $service = new AppointmentService();
        $dates = $service->getAvailableDates($request);
        if(isset($dates['error'])) {
            return response()->json(['message' => $dates['error']], 404);
        }
        return response()->json(['dates' => $dates]);
    }
}

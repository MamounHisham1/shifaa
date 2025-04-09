<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Http\Resources\Api\V1\ScheduleResource;
use App\Models\Schedule;
use App\Services\ScheduleService;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $schedules = QueryBuilder::for(Schedule::class)
            ->allowedFilters([
                'start_time',
                'end_time',
                'is_available',
                AllowedFilter::exact('status'),

                // the date endpoint will be like this: /api/v1/schedules?date[start]=2025-01-01&date[end]=2025-01-31
                AllowedFilter::callback('date', function ($query, $value) {
                    if (isset($value['start'])) {
                        $query->where('date', '>=', $value['start']);
                    }
                    if (isset($value['end'])) {
                        $query->where('date', '<=', $value['end']);
                    }
                    if(isset($value['eq'])) {
                        $query->where('date', '=', $value['eq']);
                    }
                }),

                
                
                // the doctor endpoint will be like this: /api/v1/schedules?doctor[specialty]=cardiologist&doctor[qualification]=md&doctor[name]=John Doe&doctor[city]=New York&doctor[state]=NY&doctor[country]=USA
                AllowedFilter::callback('doctor', function ($query, $value) {
                    $query->whereHas('doctor', function ($query) use ($value) {
                        if (isset($value['id'])) {
                            $query->where('id', $value['id']);
                        }
                        if (isset($value['specialty'])) {
                            $query->whereHas('doctor.specialty', function ($query) use ($value) {
                                $query->where('name', $value['specialty']);
                            });
                        }
                        if (isset($value['qualification'])) {
                            $query->where('qualification', 'like', "%{$value['qualification']}%");
                        }
                        $query->whereHas('profile', function ($query) use ($value) {
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

                // the max_appointments endpoint will be like this: /api/v1/schedules?max_appointments[gt]=10&max_appointments[gte]=20&max_appointments[lt]=30&max_appointments[lte]=40&max_appointments[eq]=50
                AllowedFilter::callback('max_appointments', function ($query, $value) {
                    if (isset($value['gt'])) {
                        $query->where('max_appointments', '>', $value['gt']);
                    }
                    if (isset($value['gte'])) {
                        $query->where('max_appointments', '>=', $value['gte']);
                    }
                    if (isset($value['lt'])) {
                        $query->where('max_appointments', '<', $value['lt']);
                    }
                    if (isset($value['lte'])) {
                        $query->where('max_appointments', '<=', $value['lte']);
                    }
                    if (isset($value['eq'])) {
                        $query->where('max_appointments', '=', $value['eq']);
                    }
                }),

                // the time_range endpoint will be like this: /api/v1/schedules?time_range[start]=10:00:00&time_range[end]=15:00:00
                AllowedFilter::callback('time_range', function ($query, $value) {
                    if (isset($value['start'])) {
                        $query->where('start_time', '>=', $value['start']);
                    }
                    if (isset($value['end'])) {
                        $query->where('end_time', '<=', $value['end']);
                    }
                }),
            ])
            ->allowedSorts([
                'start_time',
                'end_time',
                'is_available',
                'status',
                'max_appointments',
                'created_at',
            ])
            ->paginate($request->per_page ?? 15)
            ->appends($request->query());

        $schedules->load('slots');
        $schedules->load('doctor');
        return ScheduleResource::collection($schedules);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScheduleRequest $request)
    {
        $service = new ScheduleService();

        if(! $service->readyForCreate($request)) {
            return response()->json(['message' => 'Time slot already exists for this doctor in ' . $request->date], 400);
        }

        return ScheduleResource::make(Schedule::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        return ScheduleResource::make($schedule);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}

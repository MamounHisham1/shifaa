<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSlotRequest;
use App\Http\Requests\UpdateSlotRequest;
use App\Models\Slot;
use App\Http\Resources\Api\V1\SlotResource;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use App\Enums\SlotStatus;

class SlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slots = QueryBuilder::for(Slot::class)
            ->allowedFilters([
                AllowedFilter::callback('schedule', function ($query, $value) {
                    $query->where('schedule_id', $value);
                }),

                AllowedFilter::callback('status', function ($query, $value) {
                    $query->where('status', $value);
                }),

                AllowedFilter::callback('patient', function ($query, $value) {
                    $query->where('patient_id', $value);
                }),

                // the start_time endpoint will be like this: /api/v1/slots?start_time[from]=10:00&start_time[to]=11:00
                AllowedFilter::callback('start', function ($query, $value) {
                    if (isset($value['from'])) {
                        $query->where('start_time', '>=', $value['from']);
                    }
                    if (isset($value['to'])) {
                        $query->where('start_time', '<=', $value['to']);
                    }
                    if (isset($value['eq'])) {
                        $query->where('start_time', '=', $value['eq']);
                    }
                }),

                // the end_time endpoint will be like this: /api/v1/slots?end_time[from]=10:00&end_time[to]=11:00
                AllowedFilter::callback('end', function ($query, $value) {
                    if (isset($value['from'])) {
                        $query->where('end_time', '>=', $value['from']);
                    }
                    if (isset($value['to'])) {
                        $query->where('end_time', '<=', $value['to']);
                    }
                    if (isset($value['eq'])) {
                        $query->where('end_time', '=', $value['eq']);
                    }
                }),
            ])
            ->get();
                
        return SlotResource::collection($slots);
    }

    /**
     * Display the specified resource.
     */
    public function show(Slot $slot)
    {
        $slot->load('schedule');
        return new SlotResource($slot);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSlotRequest $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSlotRequest $request, Slot $slot)
    {
        if($slot->status === SlotStatus::Booked) {
            return response()->json(['message' => 'This slot has been already booked.'], 400);
        }

        if($slot->status === SlotStatus::Unavailable) {
            return response()->json(['message' => 'This slot is not available right now.'], 400);
        }

        $slot->update([
            'patient_id' => $request->patient_id,
            'status' => SlotStatus::Booked,
        ]);
        
        return SlotResource::make($slot);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slot $slot)
    {
        //
    }
}

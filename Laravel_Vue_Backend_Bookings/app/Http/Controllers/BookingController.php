<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index(){

        return response()->json(Booking::orderBy('id', 'DESC')->get());

    }


    public function show(Booking $booking){
        return response()->json($booking);
    }

    public function store(Request $request){
        $request->validate([
            'operator' => 'string|required',
            'bus_name' => 'string|required',
            'point_of_origin' => 'string|required',
            'destination' => 'string|required',
            'passenger_name' => 'string|required'
        ]);

        $booking = Booking::create($request->only('operator','bus_name','point_of_origin','destination', 'passenger_name'));

        return response()->json($booking);

    }


    public function edit(Booking $booking)
    {
        //
    }
    


    public function update(Request $request, Booking $booking){
        $booking->update($request->only('operator','bus_name','point_of_origin','destination', 'passenger_name'));

        return response()->json($booking);

    }

    public function destroy(Booking $booking){


        $bus_name = $booking->bus_name;

        $booking->delete();

        return response()->json([
            'deleted' => true,
            'message' =>"Booking has been deleted."
        ]);
    }
}

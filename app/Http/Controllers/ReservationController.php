<?php

namespace App\Http\Controllers;

use App\Rules\RoomCapacity;
use Illuminate\Http\Request;
use Validator;
use Log;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'resource_id' => 'required|exists:rooms,id',
            'date_from' => 'required|date|after_or_equal:today',
            'date_to' => 'required|date|after_or_equal:date_from',
            'reserved_people' => [
                'required',
                'integer',
                'min:1',
                // Custom rule to check if the number of reserved people is less than or equal to the capacity of the room
                new RoomCapacity($request->resource_id),
            ],
        ]);

        // Check if the validation fails
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Please check the input fields and try again.');
        }
    
        // Check if the room is available for the requested dates
        if (Reservation::isAvailable($request->resource_id, $request->date_from, $request->date_to)) {
            
            // If the room is already reserved for the requested dates, show an error message
            return redirect()->back()->with('error', 'The room is already reserved for the requested dates.');
        } else {
            // Create a new reservation object
            $reservation = new Reservation();

            // Assign the request data to the new object
            $reservation->date_to = $request['date_to'];
            $reservation->date_from = $request['date_from'];
            $reservation->reserved_people = $request['reserved_people'];
            $reservation->resource_id = $request['resource_id'];

            // Create a database entry
            $reservation->save();

            // Create a mock e-mail message
            $message = 'EMAIL SENT TO test@admin.com FOR CREATED Reservation WITH ID ';

            // Send the mock e-mail to the laravel.log
            Log::info("$message $reservation->id");

            // Show a success message
            return redirect()->back()->with('success', 'Reservation created successfully.');
        }
    }

}
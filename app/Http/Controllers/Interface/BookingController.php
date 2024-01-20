<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Interface\BookingRequest;
use App\Models\Booking;
use App\Models\Participant;
use App\Models\Products;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // ...

    public function create(BookingRequest $request,$key, $name)
    {
        // Validate the incoming request using the BookingRequest class

        // Fetch the tour's prices from the Products model
        $tourPackage = Products::where('id', $key)->firstOrFail();
        
        // Calculate total cost based on prices and quantities
        $totalCost = ($request->input('adults') * $tourPackage->price) +
                     ($request->input('children') * $tourPackage->price1) +
                     ($request->input('youngchildren') * $tourPackage->price2) +
                     ($request->input('babies') * $tourPackage->price3);

        $booking = Booking::create([
            'packageID' => $request->input('packageID'),
            'bookingdate' => $request->input('bookingdate'),
            'adults' => $request->input('adults'),
            'children' => $request->input('children'),
            'youngchildren' => $request->input('youngchildren'),
            'babies' => $request->input('babies'),
            'specialrequests' => $request->input('specialrequests'),
            'contactname' => $request->input('contactname'),
            'contactemail' => $request->input('contactemail'),
            'contactphone' => $request->input('contactphone'),
            'paymentmethod' => $request->input('paymentmethod'),
            'totalcost' => $totalCost,
        ]);

        // Handle participant details
        for ($i = 1; $i <= $request->input('totalParticipants'); $i++) {
            Participant::create([
                'booking_id' => $booking->book_id,
                'name' => $request->input("ParticipantName{$i}"),
                'age' => $request->input("ParticipantAge{$i}"),
                'phone' => $request->input("ParticipantPhone{$i}"),
            ]);
        }

        // return redirect()->route('gd.createform', ['key' => $tourPackage->id, 'name' => $tourPackage->name]);
        return view('interface/bookingform', ['booking' => $booking]);
    }

    public function showBookingDetails($bookingId)
    {
        $booking = Booking::with('participants')->findOrFail($bookingId);


        // Assuming you have a view named 'booking_details' to display booking details
        return view('interface/bookingconfirmation', ['booking' => $booking]);
    }

    public function updateBooking(Request $request, $bookingId)
    {
        // Validate the incoming request, you might want to create a specific request for this
       
        $booking = Booking::where('key', $bookingId)->firstOrFail();

        // Update booking details
        $booking->update([
            'adults' => $request->input('adults'),
            'children' => $request->input('children'),
            'youngchildren' => $request->input('youngchildren'),
            'babies' => $request->input('babies'),
            'specialrequests' => $request->input('specialrequests'),
            'contactname' => $request->input('contactname'),
            'contactemail' => $request->input('contactemail'),
            'contactphone' => $request->input('contactphone'),
        ]);

        // Update participant details
        foreach ($booking->participants as $participant) {
            $participantId = $participant->id;
            Participant::where('id', $participantId)->update([
                'name' => $request->input("ParticipantName{$participantId}"),
                'age' => $request->input("ParticipantAge{$participantId}"),
                'phone' => $request->input("ParticipantPhone{$participantId}"),
            ]);
        }

        // Redirect or return a response as needed
        return redirect()->route('gd.bookingupdate', ['bookingId' => $booking->id]);
    }
}

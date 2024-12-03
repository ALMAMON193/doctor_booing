<?php

namespace App\Http\Controllers\Web\Backend\Client;

use App\Http\Controllers\Controller;
use App\Models\AppointmentBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{

    public function index()
    {
        $authUser = Auth::user();
        // Show the schedule information from AppointmentBooking model
        $appointments = AppointmentBooking::where('user_id', $authUser->id)->where('status','confirmed')->get();

        $events = [];

        foreach ($appointments as $appointment) {
            $events[] = [
                'title' => $appointment->first_name,
                'appointmentDate' => $appointment->created_at->format('Y-m-d\TH:i:s'), // Access individual record
            ];
        }

        $jsonData = json_encode($events);

        file_put_contents(public_path('backend/client/schedule.json'), $jsonData);

        return view('backend.client.layouts.schedule');
    }

}

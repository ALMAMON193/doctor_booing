<?php

namespace App\Http\Controllers\Web\Backend\Client;

use App\Http\Controllers\Controller;
use App\Models\AppointmentBooking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $authUser = auth()->user();
        $data = AppointmentBooking::where('user_id', $authUser->id)->where('status','confirmed')->get();
        return view('backend.client.layouts.index',compact('data'));
    }

    public function settings(){

        return view('backend.client.layouts.settings.settings');

    }

}

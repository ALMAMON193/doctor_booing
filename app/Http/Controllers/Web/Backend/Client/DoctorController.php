<?php

namespace App\Http\Controllers\Web\Backend\Client;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Models\AppointmentBooking;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DoctorController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $authUser = Auth::user();
            $data = AppointmentBooking::where('user_id', $authUser->id)->where('status','confirmed')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $viewProfileRoute = route('client.doctors.view', ['id' => $data->id]);
                    return '
                    <div class="btn-group btn-group-sm btn-group-custom" role="group" aria-label="Basic example">
                        <!-- View Profile Button -->
                        <a href="' . $viewProfileRoute . '" class="view-profile-btn">
                            View Profile
                        </a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <!-- Make Appointment Button -->
                        <!--  <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#exampleModal"  class="make-appointment-btn">
                            Make appointment
                        </a> -->
                    </div>';
                })
                ->addColumn('psychologist_name', function ($data) {
                    return $data->psychologist->name ?? 'N/A';
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('backend.client.layouts.doctors.index');
    }

    public function view($id)
    {
        // Find the doctor with their psychologist info
        $doctor = AppointmentBooking::with('psychologist')->findOrFail($id);

        // Get the ratings for the doctor and calculate the average rating
        $ratings = Rating::with('psychologist')->where('rated_item_id', $id)->get();
        $averageRating = $ratings->avg('rating');

        // Count total appointments for the specified doctor
        $totalAppointments = AppointmentBooking::where('psychologist_id', $doctor->psychologist_id)->count();

        $totalClients = AppointmentBooking::all()->count();
        // Pass all data to the view
        return view('backend.client.layouts.doctors.view_doctor', compact('doctor', 'ratings', 'averageRating', 'totalAppointments', 'totalClients'));
    }
}

<?php

namespace App\Http\Controllers\Web\Backend\Client;

use App\Http\Controllers\Controller;
use App\Models\AppointmentBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

use function Laravel\Prompts\select;

class AppointmentController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {


            $authUser = auth()->user();
            $data = AppointmentBooking::where('user_id', $authUser->id)->where('status','confirmed')->get();
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('status', function ($data) {
                    // Status Dropdown
                    $status = '<div class="dropdown">';
                    $status .= '<button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownStatus' . $data->id . '" data-bs-toggle="dropdown" aria-expanded="false">';
                    $status .= $data->status;
                    $status .= '</button>';
                    $status .= '<ul class="dropdown-menu" aria-labelledby="dropdownStatus' . $data->id . '">';
                    $status .= '<li><a class="dropdown-item" href="javascript:void(0);" onclick="showStatusChangeAlert(event, ' . $data->id . ', \'Active\')">Active</a></li>';
                    $status .= '<li><a class="dropdown-item" href="javascript:void(0);" onclick="showStatusChangeAlert(event, ' . $data->id . ', \'Inactive\')">Inactive</a></li>';
                    $status .= '</ul>';
                    $status .= '</div>';

                    return $status;
                })

                ->addColumn('action', function ($data) {
                    return '
                    <div class="btn-group btn-group-sm btn-group-custom" role="group" aria-label="Basic example">
                        <a href="' . route('client.appointment.details', $data->id) . '" class="btn btn-outline-primary" title="View">
                        <!-- SVG for View Icon (Eye) -->
                            <svg height="20px" width="20px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#FFFFFF;" d="M255.784,402.19C151.432,403.67,54.776,347.446,4.472,256.006 c50.6-91.36,147.312-147.52,251.744-146.176c104.528-2.128,201.496,54.272,251.328,146.176 C456.944,347.366,360.216,403.534,255.784,402.19z"></path> <g> <path style="fill:#AAC1CE;" d="M256.216,113.83c102.28-2.112,197.304,52.616,246.808,142.136 c-50.248,88.992-145.008,143.512-247.2,142.224c-102.104,1.376-196.8-53.168-246.832-142.184 c50.264-88.976,145.016-143.48,247.2-142.192 M256.192,105.814C149.416,103.974,50.552,161.934,0,256.006 C50.312,350.11,149.088,408.11,255.784,406.182C362.568,408.038,461.448,350.086,512,256.006 C461.68,161.91,362.904,103.918,256.216,105.83L256.192,105.814z"></path> <circle style="fill:#AAC1CE;" cx="255.984" cy="255.998" r="113.2"></circle> </g> <circle style="fill:#25B6D2;" cx="255.984" cy="255.998" r="95.32"></circle> <g style="opacity:0.5;"> <circle style="fill:#FFFFFF;" cx="208.72" cy="203.03" r="24"></circle> </g> </g></svg>
                            </a>
                    </div>';
                })

                ->rawColumns(['action', 'status'])
                ->make(true);

        }

        return view('backend.client.layouts.appointments.index');
    }

    public function details($id){
        $authUser = Auth::user();
        $appointment = AppointmentBooking::where('user_id', $authUser->id)->where('status','confirmed')->find($id);
        if (!$appointment) {
            abort(404);
        }
        return view('backend.client.layouts.appointments.appointment_details', compact('appointment'));
    }



}

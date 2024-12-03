<?php

namespace App\Http\Controllers\Web\Backend\Doctor;

use App\Models\Blog;
use Exception;
use App\Models\User;
use App\Helpers\Helper;
use App\Models\TimeSlot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class TimeSlotController extends Controller
{
    public function index(Request $request)
    {
        $doctor = Auth::user();

        if ($request->ajax()) {
            $data = TimeSlot::where('doctor_id', $doctor->id)->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('status', function ($data) {
                    $backgroundColor = $data->status === "available" ? '#4CAF50' : '#ccc';
                    $sliderTranslateX = $data->status === "available" ? '26px' : '2px';
                    $sliderStyles = "position: absolute; top: 2px; left: 2px; width: 20px; height: 20px; background-color: white; border-radius: 50%; transition: transform 0.3s ease; transform: translateX($sliderTranslateX);";
                    $status = '<div class="form-check form-switch" style="margin-left:40px; position: relative; width: 50px; height: 24px; background-color: ' . $backgroundColor . '; border-radius: 12px; transition: background-color 0.3s ease; cursor: pointer;">';
                    $status .= '<input onclick="showStatusChangeAlert(' . $data->id . ')" type="checkbox" class="form-check-input" id="customSwitch' . $data->id . '" getAreaid="' . $data->id . '" name="status" style="position: absolute; width: 100%; height: 100%; opacity: 0; z-index: 2; cursor: pointer;">';
                    $status .= '<span style="' . $sliderStyles . '"></span>';
                    $status .= '<label for="customSwitch' . $data->id . '" class="form-check-label" style="margin-left: 10px;"></label>';
                    $status .= '</div>';
                    return $status;
                })

                ->addColumn('action', function ($data) {
                    return '
                    <div class="btn-group btn-group-sm btn-group-custom" role="group" aria-label="Basic example">
                        <a href="' . route('doctor.timeslot.edit', $data->id) . '" class="btn btn-outline-primary" title="Edit">
                            <!-- SVG for Edit Icon -->
                             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M9.16602 1.66663H7.49935C3.33268 1.66663 1.66602 3.33329 1.66602 7.49996V12.5C1.66602 16.6666 3.33268 18.3333 7.49935 18.3333H12.4993C16.666 18.3333 18.3327 16.6666 18.3327 12.5V10.8333" stroke="#030C09" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M13.3675 2.51663L6.80088 9.0833C6.55088 9.3333 6.30088 9.82497 6.25088 10.1833L5.89254 12.6916C5.75921 13.6 6.40088 14.2333 7.30921 14.1083L9.81754 13.75C10.1675 13.7 10.6592 13.45 10.9175 13.2L17.4842 6.6333C18.6175 5.49997 19.1509 4.1833 17.4842 2.51663C15.8175 0.849966 14.5009 1.3833 13.3675 2.51663Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M12.4258 3.45837C12.9841 5.45004 14.5424 7.00837 16.5424 7.57504" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                             </svg>
                        </a>
                        <a href="#" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-outline-danger" title="Delete">
                            <!-- SVG for Delete Icon -->
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M17.5 4.98332C14.725 4.70832 11.9333 4.56665 9.15 4.56665C7.5 4.56665 5.85 4.64998 4.2 4.81665L2.5 4.98332" stroke="#030C09" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M7.08398 4.14163L7.26732 3.04996C7.40065 2.25829 7.50065 1.66663 8.90898 1.66663H11.0923C12.5007 1.66663 12.609 2.29163 12.734 3.05829L12.9173 4.14163" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M15.7077 7.6167L15.166 16.0084C15.0743 17.3167 14.9993 18.3334 12.6743 18.3334H7.32435C4.99935 18.3334 4.92435 17.3167 4.83268 16.0084L4.29102 7.6167" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M8.60742 13.75H11.3824" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M7.91602 10.4166H12.0827" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                               </svg>
                        </a>
                    </div>';
                })

                ->rawColumns(['action', 'status', 'image'])
                ->make(true);
        }

        return view('backend.doctor.layouts.timeslot.index');
    }

    public function create()
    {
        return view('backend.doctor.layouts.timeslot.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Validate the request
        $request->validate([
            'doctor_id' => 'required|numeric',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
        ]);

        $data = TimeSlot::create($request->all());


        // Redirect to the index page
        return redirect()->route('doctor.timeslot.index')->with('success', 'Time slot created successfully!');
    }

    public function edit($id)
    {
        $data = TimeSlot::find($id);
        return view('backend.doctor.layouts.timeslot.edit', compact('data'));
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $timeslot = TimeSlot::find($id);
        $timeslot->update($request->all());
        return redirect()->route('doctor.timeslot.index')->with('success', 'Time slot updated successfully!');
    }

    public function destroy($id): ?\Illuminate\Http\JsonResponse
    {
        try {
            $data = TimeSlot::findOrFail($id);

            $data->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Your action was successful!'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Your action was not successful!'
            ]);
        }
    }

    public function status($id)
    {
        $data = TimeSlot::findOrFail($id);
        if (!$data) {
            return response()->json([
                'status' => 'error',
                'message' => 'Item not found.',
            ]);
        }
        $data->status = $data->status === 'available' ? 'booked' : 'available';
        $data->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Your action was successful!',
        ]);
    }


}

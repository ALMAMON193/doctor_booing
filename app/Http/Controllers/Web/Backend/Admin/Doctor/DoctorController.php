<?php

namespace App\Http\Controllers\Web\Backend\Admin\Doctor;

use Exception;
use App\Models\User;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('role', 'doctor')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('avatar', function ($data) {
                    return '<img src="' . asset($data->avatar) . '" width="50" height="50" style="margin-left:20px;">';
                })
                ->addColumn('description', function ($data) {
                    $description = strip_tags($data->description);
                    return $description;
                })
                ->addColumn('status', function ($data) {
                    $backgroundColor = $data->status == "active" ? '#4CAF50' : '#ccc';
                    $sliderTranslateX = $data->status == "active" ? '26px' : '2px';
                    $sliderStyles = "position: absolute; top: 2px; left: 2px; width: 20px; height: 20px; background-color: white; border-radius: 50%; transition: transform 0.3s ease; transform: translateX($sliderTranslateX);";
                    $status = '<div class="form-check form-switch" style="margin-left:40px; position: relative; width: 50px; height: 24px; background-color: ' . $backgroundColor . '; border-radius: 12px; transition: background-color 0.3s ease; cursor: pointer;">';
                    $status .= '<input onclick="showStatusChangeAlert(' . $data->id . ')" type="checkbox" class="form-check-input" id="customSwitch' . $data->id . '" getAreaid="' . $data->id . '" name="status" style="position: absolute; width: 100%; height: 100%; opacity: 0; z-index: 2; cursor: pointer;">';
                    $status .= '<span style="' . $sliderStyles . '"></span>';
                    $status .= '<label for="customSwitch' . $data->id . '" class="form-check-label" style="margin-left: 10px;"></label>';
                    $status .= '</div>';
                    return $status;
                })
                ->addColumn('action', function ($data) {
                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                 <a href="#" type="button" onclick="goToView(' . $data->id . ')" class="btn btn-info fs-14 text-white view-icn" title="View">
                                     <i class="fe fe-eye"></i>
                                 </a>
                                 <a href="#" type="button" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger fs-14 text-white delete-icn" title="Delete">
                                     <i class="fe fe-trash"></i>
                                 </a>
                             </div>';
                })
                ->rawColumns(['avatar', 'status', 'action'])
                ->make(true);
        }

        return view('backend.admin.layouts.doctor.index');
    }



    public function destroy($id)
    {
        try {
            $data = User::findOrFail($id);
            if ($data->image && file_exists(public_path($data->image))) {
                Helper::fileDelete(public_path($data->image));
            }
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
        $data = User::findOrFail($id);
        if (!$data) {
            return response()->json([
                'status' => 'error',
                'message' => 'Item not found.',
            ]);
        }
        $data->status = $data->status === 'active' ? 'inactive' : 'active';
        $data->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Your action was successful!',
        ]);
    }
    public function view($id)
    {
        $data = User::findOrFail($id);
        return view('backend.admin.layouts.doctor.view', compact('data'));
    }
}

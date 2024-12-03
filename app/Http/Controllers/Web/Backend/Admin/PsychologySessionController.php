<?php

namespace App\Http\Controllers\Web\Backend\Admin;

use Exception;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Models\psychologySessions;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class PsychologySessionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = psychologySessions::query();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function ($data) {
                    return '<img src="' . asset($data->image) . '" width="50" height="50" style="margin-left:20px;">';
                })
                ->addColumn('description', function ($data) {
                    $description = strip_tags(substr($data->description, 0, 50)) . (strlen($data->description) > 50 ? '...' : '');
                    return $description;
                })

                ->addColumn('action', function ($data) {
                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                 <a href="#" type="button" onclick="goToView(' . $data->id . ')" class="btn btn-info fs-14 text-white view-icn" name="View">
                                     <i class="fe fe-eye"></i>
                                 </a>
                                 <a href="#" type="button" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger fs-14 text-white delete-icn" name="Delete">
                                     <i class="fe fe-trash"></i>
                                 </a>
                             </div>';
                })
                ->rawColumns(['image','description','action'])
                ->make(true);
        }

        return view('backend.admin.layouts.session.index');
    }

    public function create(){
        return view('backend.admin.layouts.session.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'description' => 'required|string',
        ]);

        try {
            $data = new psychologySessions();
            $data->name = $request->name;
               if ($request->hasFile('image')) {
                $data->image = Helper::fileUpload($request->file('image'), 'psychology_sessions', time() . '_' . getFileName($request->file('image')));
            }
            $data->description = $request->description;
            $data->save();

            flash()->success('Psychology Sessions created successfully');
            return redirect()->route('admin.psychology.session.index');
        } catch (Exception $e) {
            flash()->error($e->getMessage());
            return redirect()->back();
        }

    }

    public function edit($id)
    {
        $data = psychologySessions::find($id);
        return view('backend.admin.layouts.session.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required|string',
        ]);

        try {
            $data = psychologySessions::find($id);
            $data->name = $request->name;
               if ($request->hasFile('image')) {
                $data->image = Helper::fileUpload($request->file('image'), 'psychology_sessions', time() . '_' . getFileName($request->file('image')));
            }
            $data->description = $request->description;
            $data->save();

            flash()->success('Psychology Sessions updated successfully');
            return redirect()->route('admin.psychology.session.index');
        } catch (Exception $e) {
            flash()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $data = psychologySessions::findOrFail($id);
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

}

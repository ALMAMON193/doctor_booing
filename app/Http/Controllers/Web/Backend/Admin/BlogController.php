<?php

namespace App\Http\Controllers\Web\Backend\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Blog::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function ($data) {
                    return '<img src="' . asset($data->image) . '" width="50" height="50" style="margin-left:20px;">';
                })
                ->addColumn('description', function ($data) {
                    // Strip HTML tags and truncate the content
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

                                <a href="#" type="button" onclick="goToEdit(' . $data->id . ')" class="btn btn-primary fs-14 text-white delete-icn" title="Delete">
                                    <i class="fe fe-edit"></i>
                                </a>

                                <a href="#" type="button" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger fs-14 text-white delete-icn" title="Delete">
                                    <i class="fe fe-trash"></i>
                                </a>

                            </div>';
                })
                ->rawColumns(['image', 'description', 'status', 'action'])
                ->make();
        }

        return view('backend.admin.layouts.blog.index');
    }

    public function create()
    {
        return view('backend.admin.layouts.blog.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072',
            'description' => 'required|string',
        ]);

        try {
            $data = new Blog();
            $data->title = $request->title;
            $data->slug = str_replace(' ', '-', strtolower($request->title));
            if ($request->hasFile('image')) {
                $data->image = Helper::fileUpload($request->file('image'), 'blog', time() . '_' . getFileName($request->file('image')));
            }
            $data->description = $request->description;
            $data->status = 'active';
            $data->save();

            flash()->success('Blog created successfully');
            return redirect()->route('admin.blog.index');
        } catch (Exception $e) {
            flash()->error($e->getMessage());
            return redirect()->back();
        }

    }

    public function edit($id)
    {
        $data = Blog::find($id);
        return view('backend.admin.layouts.blog.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3072',
            'description' => 'required|string',
        ]);

        try {
            $data = Blog::find($id);
            $data->title = $request->title;
            $data->slug = str_replace(' ', '-', strtolower($request->title));
            if ($request->hasFile('image')) {
                $data->image = Helper::fileUpload($request->file('image'), 'blog', time() . '_' . getFileName($request->file('image')));
            }
            $data->description = $request->description;
            $data->status = 'active';
            $data->save();

            flash()->success('Blog updated successfully');
            return redirect()->route('admin.blog.index');
        } catch (Exception $e) {
            flash()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $data = Blog::findOrFail($id);
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
        $data = Blog::findOrFail($id);
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

}

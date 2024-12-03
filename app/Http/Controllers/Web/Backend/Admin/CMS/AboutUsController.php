<?php

namespace App\Http\Controllers\Web\Backend\Admin\CMS;

use App\Enums\Page;
use App\Enums\Section;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AboutUsController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = CMS::where('page', Page::ABOUT_US->value)->where('section', Section::ABOUT_THERAPY_CONNECT->value)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('content', function ($data) {
                    // Strip HTML tags and truncate the content
                    $content = strip_tags($data->content);
                    return $content;
                })
                ->addColumn('image', function ($data) {
                    return '<img src="' . asset($data->image) . '" width="100" height="50" style="margin-left:20px;">';
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
                ->rawColumns(['content', 'image', 'status', 'action'])
                ->make();
        }

        return view('backend.admin.layouts.cms.about_us.index');

    }

    public function create()
    {

        return view('backend.admin.layouts.cms.about_us.create');

    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'nullable|string|max:60',
            'sub_title' => 'nullable|string|max:20',
            'content' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        try {

            $data = new CMS();
            $data->page = Page::ABOUT_US->value;
            $data->section = Section::ABOUT_THERAPY_CONNECT->value;
            $counting = CMS::where('page', $data->page)->where('section', $data->section)->count();
            if ($counting >= 1) {
                flash()->error('You can add only 1 content');
                return redirect()->back();
            }
            $data->title = $request->title;
            $data->sub_title = $request->sub_title;
            $data->content = $request->content;
            if ($request->hasFile('image')) {
                $data->image = Helper::fileUpload($request->file('image'), 'cms', time() . '_' . getFileName($request->file('image')));
            }
            $data->status = 'active';
            $data->save();

            flash()->success('About Us content created successfully');
            return redirect()->route('admin.aboutUs.index');

        }

        catch (Exception $e) {

            flash()->error($e->getMessage());
            return redirect()->back();

        }

    }

    public function edit($id)
    {

        $data = CMS::find($id);
        return view('backend.admin.layouts.cms.about_us.edit', compact('data'));

    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'nullable|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        try {

            $data = CMS::find($id);
            $data->page = Page::ABOUT_US->value;
            $data->section = Section::ABOUT_THERAPY_CONNECT->value;
            $data->title = $request->title;
            $data->sub_title = $request->sub_title;
            $data->content = $request->content;
            if ($request->hasFile('image')) {
                $data->image = Helper::fileUpload($request->file('image'), 'cms', time() . '_' . getFileName($request->file('image')));
            }
            $data->status = 'active';
            $data->save();

            flash()->success('About Us content updated successfully');
            return redirect()->route('admin.aboutUs.index');

        }

        catch (Exception $e) {

            flash()->error($e->getMessage());
            return redirect()->back();

        }

    }

    public function destroy($id)
    {

        try {
            $data = CMS::findOrFail($id);
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

        $data = CMS::findOrFail($id);
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

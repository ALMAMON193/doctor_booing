<?php

namespace App\Http\Controllers\Web\Backend\Admin\CMS\Home;

use App\Enums\Page;
use App\Enums\Section;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RebatesController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = CMS::where('page', Page::HOME->value)->where('section', Section::REBATES_ITEM->value)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('content', function ($data) {
                    // Strip HTML tags and truncate the content
                    $Content = strip_tags($data->content); // Use strip_tags() to remove HTML tagscontent);
                    return $Content;
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
                ->rawColumns(['content','status', 'action'])
                ->make();
        }

        $data = CMS::where('page', Page::HOME->value)->where('section', Section::REBATES->value)->first();

        return view('backend.admin.layouts.cms.home.rebates.index', compact('data'));

    }

    public function create()
    {

        return view('backend.admin.layouts.cms.home.rebates.create');

    }

    public function store(Request $request)
    {

        $request->validate([
            'title' =>'nullable|string|max:30',
            'content' =>'nullable|string|max:200',
        ]);

        try{

            $data = new CMS();
            $data->page = Page::HOME->value;
            $data->section = Section::REBATES_ITEM->value;
            $data->title = $request->title;
            $data->content = $request->content;
            $data->save();

            flash()->success('Rebates content added successful!');
            return redirect()->route('admin.cms.home.rebates.index');

        }
        catch (Exception $exception){
            flash()->error($exception->getMessage());
            return redirect()->back();
        }

    }

    public function edit($id)
    {

        $data = CMS::find($id);
        return view('backend.admin.layouts.cms.home.rebates.edit', compact('data'));

    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' =>'nullable|string|max:255',
            'content' =>'nullable|string',
        ]);

        try{

            $data = CMS::find($id);
            $data->page = Page::HOME->value;
            $data->section = Section::REBATES_ITEM->value;
            $data->title = $request->title;
            $data->content = $request->content;
            $data->save();

            flash()->success('Rebates content updated successful!');
            return redirect()->route('admin.cms.home.rebates.index');

        }
        catch (Exception $exception){
            flash()->error($exception->getMessage());
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
                'message' => 'Your action was successful!'
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

    public function content(Request $request)
    {

        $request->validate([
            'title' => 'nullable|string|max:30',
            'content' => 'nullable|string|max:500',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        try {
            $data = CMS::where('page', Page::HOME)->where('section', Section::REBATES)->first();
            if($data){
                $data->title = $request->title;
                $data->content = $request->content;
                if($request->hasFile('image')){
                    $data->image = Helper::fileUpload($request->file('image'), 'cms', time() . '_' . getFileName($request->file('image')));
                }
                $data->save();
            }else{
                $data = new CMS();
                $data->page = Page::HOME;
                $data->section = Section::REBATES;
                $data->title = $request->title;
                $data->content = $request->content;
                if($request->hasFile('image')){
                    $data->image = Helper::fileUpload($request->file('image'), 'cms', time() . '_' . getFileName($request->file('image')));
                }
                $data->save();
            }

            flash()->success('Your action was successful!');
            return redirect()->route('admin.cms.home.rebates.index');
        } catch (Exception $e) {
            flash()->error('Something went wrong!');
            return redirect()->back();
        }

    }

}

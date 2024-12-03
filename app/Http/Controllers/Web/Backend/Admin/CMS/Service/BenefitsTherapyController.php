<?php

namespace App\Http\Controllers\Web\Backend\Admin\CMS\Service;

use App\Enums\Page;
use App\Enums\Section;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BenefitsTherapyController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = CMS::where('page', Page::SERVICE->value)->where('section', Section::BENEFITS_INDIVIDUAL_THERAPY->value)->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('sub_content', function ($data) {
                    // Strip HTML tags and truncate the content
                    $subContent = strip_tags($data->sub_content); // Use strip_tags() to remove HTML tagscontent);
                    return $subContent;
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
                ->rawColumns(['sub_content', 'status', 'action'])
                ->make();
        }

        $data = CMS::where('page', Page::SERVICE->value)->where('section', Section::BENEFITS_INDIVIDUAL_THERAPY_TITLE->value)->first();

        return view('backend.admin.layouts.cms.service.benefits_therapy.index', compact('data'));

    }

    public function create()
    {

        return view('backend.admin.layouts.cms.service.benefits_therapy.create');

    }

    public function store(Request $request)
    {

        $request->validate([
            'sub_title' => 'nullable|string|max:40',
            'sub_content' => 'nullable|string|max:160',
        ]);

        try {

            $data = new CMS();
            $data->page = Page::SERVICE->value;
            $data->section = Section::BENEFITS_INDIVIDUAL_THERAPY->value;
            $data->sub_title = $request->sub_title;
            $data->sub_content = $request->sub_content;
            $data->save();

            flash()->success('Benefits Therapy content added successful!');
            return redirect()->route('admin.cms.service.benefitsTherapy.index');
        } catch (Exception $e) {
            flash()->error($e->getMessage());
            return redirect()->back();
        }

    }

    public function show($id)
    {

    }

    public function edit($id)
    {

        $data = CMS::find($id);
        return view('backend.admin.layouts.cms.service.benefits_therapy.edit', compact('data'));

    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'sub_title' => 'nullable|string|max:255',
            'sub_content' => 'nullable|string',
        ]);

        try {

            $data = CMS::find($id);
            $data->page = Page::SERVICE->value;
            $data->section = Section::BENEFITS_INDIVIDUAL_THERAPY->value;
            $data->sub_title = $request->sub_title;
            $data->sub_content = $request->sub_content;
            $data->save();

            flash()->success('Benefits Therapy content updated successful!');
            return redirect()->route('admin.cms.service.benefitsTherapy.index');
        } catch (Exception $e) {
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
            'title' => 'nullable|string|max:40',
        ]);

        try {

            $data = CMS::where('page', Page::SERVICE->value)->where('section', Section::BENEFITS_INDIVIDUAL_THERAPY_TITLE->value)->first();

            if (!$data) {
                $data = new CMS();
                $data->page = Page::SERVICE->value;
                $data->section = Section::BENEFITS_INDIVIDUAL_THERAPY_TITLE->value;
            }
            $data->title = $request->title;
            $data->save();

            flash()->success('Your action was successful!');
            return redirect()->back();
        } catch (Exception $e) {

            flash()->error($e->getMessage());
            return redirect()->back();
        }

    }

}

<?php

namespace App\Http\Controllers\Web\Backend\Admin\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\Page;
use App\Enums\Section;
use App\Helpers\Helper;
use App\Models\CMS;
use Exception;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\Facades\DataTables;

class SocialController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = CMS::where('page', Page::DEFAULT->value)->where('section', Section::SOCIAL->value)->get();
            return DataTables::of($data)
                ->addIndexColumn()
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
                ->rawColumns(['image', 'status', 'action'])
                ->make();
        }
        return view('backend.admin.layouts.cms.social.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.layouts.cms.social.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'btn_text' => 'nullable|string',
            'btn_url' => 'nullable|string'
        ]);

        try {
            // Add the page and section to validated data
            $validatedData['page'] = Page::DEFAULT->value;
            $validatedData['section'] = Section::SOCIAL->value;

            $counting = CMS::where('page', $validatedData['page'])->where('section', $validatedData['section'])->count();
            if ($counting >= 4) {
                return redirect()->back()->with('t-error', 'You can add only 4 social');
            }

            // Create or update the CMS entry
            CMS::create($validatedData);
            return redirect()->route('admin.cms.social.index')->with('t-success', 'Social added successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('t-error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $social = CMS::findOrFail($id);
        return view('backend.admin.layouts.cms.social.edit', compact('social'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $social = CMS::findOrFail($id);
        return view('backend.admin.layouts.cms.social.edit', compact('social'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'btn_text' => 'nullable|string',
            'btn_url' => 'nullable|string'
        ]);

        try {
            // Find the existing CMS record by ID
            $social = CMS::findOrFail($id);

            // Update the page and section if necessary
            $validatedData['page'] = Page::DEFAULT->value;
            $validatedData['section'] = Section::SOCIAL->value;

            // Update the CMS entry with the validated data
            $social->update($validatedData);
            return redirect()->route('admin.cms.social.index')->with('t-success', 'Social updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('t-error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
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

    public function status(int $id): JsonResponse
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

<?php

namespace App\Http\Controllers\Web\Backend\Admin\CMS\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\Page;
use App\Enums\Section;
use App\Helpers\Helper;
use App\Models\CMS;
use Exception;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\Facades\DataTables;

class PsychologistsController extends Controller
{
    public function     index(Request $request)
    {
        if ($request->ajax()) {
            $data = CMS::where('page', Page::HOME->value)->where('section', Section::HOME_NETWORK_PSYCHOLOGISTS_ITEM->value)->get();
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

        $psychologists = CMS::where('page', Page::HOME->value)->where('section', Section::HOME_NETWORK_PSYCHOLOGISTS->value)->first();
        return view('backend.admin.layouts.cms.home.psychologists.index', compact('psychologists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.admin.layouts.cms.home.psychologists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string|max:20',
            'content' => 'nullable|string|max:300'
        ]);

        try {
            // Add the page and section to validated data
            $validatedData['page'] = Page::HOME->value;
            $validatedData['section'] = Section::HOME_NETWORK_PSYCHOLOGISTS_ITEM->value;

            $counting = CMS::where('page', $validatedData['page'])->where('section', $validatedData['section'])->count();
            if ($counting >= 3) {
                return redirect()->back()->with('t-error', 'You can add only 3 psychologists');
            }

            // Create or update the CMS entry
            CMS::create($validatedData);
            return redirect()->route('admin.cms.home.psychologists.index')->with('t-success', 'Psychologist added successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('t-error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $psychologist = CMS::findOrFail($id);
        return view('backend.admin.layouts.cms.home.psychologists.edit', compact('psychologist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $psychologist = CMS::findOrFail($id);
        return view('backend.admin.layouts.cms.home.psychologists.edit', compact('psychologist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string',
            'content' => 'nullable|string'
        ]);

        try {
            // Find the existing CMS record by ID
            $psychologist = CMS::findOrFail($id);

            // Update the page and section if necessary
            $validatedData['page'] = Page::HOME->value;
            $validatedData['section'] = Section::HOME_NETWORK_PSYCHOLOGISTS_ITEM->value;

            // Update the CMS entry with the validated data
            $psychologist->update($validatedData);
            return redirect()->route('admin.cms.home.psychologists.index')->with('t-success', 'Psychologist updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('t-error', 'Something went wrong');
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
    public function content(Request $request)
    {
        $validatedData = request()->validate([
            'title' => 'nullable|string|max:40',
            'sub_title' => 'nullable',
            'content' => 'nullable',
        ]);
        try {
            $validatedData['page'] = Page::HOME->value;
            $validatedData['section'] = Section::HOME_NETWORK_PSYCHOLOGISTS->value;
            if (CMS::where('page', $validatedData['page'])->where('section', $validatedData['section'])->exists()) {
                CMS::where('page', $validatedData['page'])->where('section', $validatedData['section'])->update($validatedData);
            } else {
                CMS::create($validatedData);
            }
            return redirect()->route('admin.cms.home.psychologists.index')->with('t-success', 'CMS updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('t-error', $e->getMessage());
        }
    }
}

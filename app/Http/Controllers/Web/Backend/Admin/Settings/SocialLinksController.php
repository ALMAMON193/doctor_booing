<?php

namespace App\Http\Controllers\Web\Backend\Admin\Settings;

use App\Helpers\Helper;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class SocialLinksController extends Controller
{
    public function socialLinks(Request $request)
    {

        // $data = SocialLink::latest()->get();
        // dd($data);

        if ($request->ajax()) {

            $data = SocialLink::latest();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('social_icon', function ($data) {
                    return '<img src="' . asset($data->social_icon ?? 'backend/admin/images/files/folder.png') . '" width="50" height="50" style="margin-left:20px;">';

                    // return '<img src="' . asset($data->social_icon) . '" width="50" height="50" style="margin-left:20px;">';
                })
                ->addColumn('status', function ($data) {
                    $status = '<label class="inline-flex items-center cursor-pointer">';
                    $status .= '<input onclick="showStatusChangeAlert(' . $data->id . ')" type="checkbox" value="" class="sr-only peer" id="customSwitch' . $data->id . '" name="status"';
                    if ($data->status == 'active') {
                        $status .= ' checked';
                    }
                    $status .= '>';
                    $status .= '<div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[\'\'] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>';
                    $status .= '</label>';

                    return $status;
                })
                ->addColumn('action', function ($data) {
                    return '<div  class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    <a  type="button" class="btn btn-primary fs-14 text-white delete-icn" title="Delete" href="' . route('admin.setting.social.edit', $data->id) . '">
                   <i class="fe fe-edit"></i>
                    </a>
                    <a href="#!" type="button" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger fs-14 text-white delete-icn" title="Delete">
                       <i class="fe fe-trash"></i>
                    </a>
                </div>';
                })
                ->rawColumns(['social_icon', 'status', 'action'])
                ->make(true);
        }

        return view('backend.admin.layouts.settings.social_links');
    }

    public function socialLinksStore(Request $request)
    {

        $request->validate([
            'social_name' => 'required',
            'social_link' => 'required|url',
            'social_icon' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try {
            // Thumbnail store in local with a random number in the filename
            if ($request->hasFile('social_icon')) {
                $social_icon = Helper::fileUpload($request->file('social_icon'), 'social', getFileName($request->file('social_icon')));
            }
            SocialLink::create([
                'social_name' => $request->social_name,
                'social_link' => $request->social_link,
                'social_icon' => $social_icon,
            ]);
            flash()->success('Social Links Added Successfully');

            return back();
        } catch (\Exception $e) {
            flash()->error($e->getMessage());

            return back();
        }
    }

    public function socialLinksEdit($id)
    {
        $social = SocialLink::find($id);

        return view('backend.admin.layouts.settings.social_links_edit', compact('social'));
    }

    public function socialLinksUpdate(Request $request, $id)
    {

      //  dd($request->all());
        $request->validate([
            'social_name' => 'required',
            'social_link' => 'required|url',
            'social_icon' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $social = SocialLink::find($id);

            if (!$social) {
                return response()->json([
                    'success' => false,
                    'message' => 'Social Links not found',
                ], 404);
            }
            $imagePath = $social->social_icon;
            if ($request->hasFile('social_icon')) {
                if ($social->social_icon) {
                    Helper::fileDelete(public_path($social->social_icon));
                }
                $social_icon = Helper::fileUpload($request->file('social_icon'), 'social', getFileName($request->file('social_icon')));
                $imagePath = $social_icon;
            }
            $social->social_icon = $imagePath;
            $social->social_name = $request->social_name;
            $social->social_link = $request->social_link;
            $social->save();

            // dd($social);

            flash()->success('Social Links Updated Successfully');
            return redirect()->route('admin.setting.social.index');
        } catch (\Exception $exception) {
            flash()->error($exception->getMessage());
            return back();
        }
    }

    public function socialLinksDelete($id)
    {
        try {
            $social = SocialLink::find($id);
            if (empty($social)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Social Links not found',
                ], 404);
            }
            if ($social->social_icon) {
                Helper::fileDelete(public_path($social->social_icon));
            }

            $social->delete();

            return response()->json([
                'success' => true,
                'message' => 'Social Links deleted successfully!',
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ]);
        }
    }
}

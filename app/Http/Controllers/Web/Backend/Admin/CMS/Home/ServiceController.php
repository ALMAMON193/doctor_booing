<?php

namespace App\Http\Controllers\Web\Backend\Admin\CMS\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\Page;
use App\Enums\Section;
use App\Helpers\Helper;
use App\Models\CMS;
use Exception;

class ServiceController extends Controller
{
    public function index()
    {
        $service = CMS::where('page', Page::HOME->value)->where('section', Section::HOME_THERAPY_SERVICE->value)->first();
        return view('backend.admin.layouts.cms.home.service', compact('service'));
    }
    public function content(Request $request)
    {
        $validatedData = request()->validate([
            'title' => 'nullable|string|max:40',
            'sub_title' => 'nullable|string|max:220',
            'content' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        try {
            $validatedData['page'] = Page::HOME->value;
            $validatedData['section'] = Section::HOME_THERAPY_SERVICE->value;
            if ($request->hasFile('image')) {
                $validatedData['image'] = Helper::fileUpload($request->file('image'), 'cms', time() . '_' . getFileName($request->file('image')));
            }
            if (CMS::where('page', $validatedData['page'])->where('section', $validatedData['section'])->exists()) {
                CMS::where('page', $validatedData['page'])->where('section', $validatedData['section'])->update($validatedData);
            } else {
                CMS::create($validatedData);
            }
            return redirect()->route('admin.cms.home.service.index')->with('t-success', 'CMS updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('t-error', $e->getMessage());
        }
    }
}

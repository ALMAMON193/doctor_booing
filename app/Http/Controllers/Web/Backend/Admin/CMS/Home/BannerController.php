<?php

namespace App\Http\Controllers\Web\Backend\Admin\CMS\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\Page;
use App\Enums\Section;
use App\Helpers\Helper;
use App\Models\CMS;
use Exception;

class BannerController extends Controller
{
    public function index()
    {
        $banner = CMS::where('page', Page::HOME->value)->where('section', Section::HOME_BANNER->value)->first();
        return view('backend.admin.layouts.cms.home.banner', compact('banner'));
    }
    public function content(Request $request)
    {
        $validatedData = request()->validate([
            'title' => 'nullable|string|max:20',
            'sub_title' => 'nullable|string|max:40',
            'content' => 'nullable|string|max:255',
            'bg' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'btn_text' => 'nullable|string|max:50',
            'btn_url' => 'nullable|string|max:100',
        ]);
        try {
            $validatedData['page'] = Page::HOME->value;
            $validatedData['section'] = Section::HOME_BANNER->value;
            if ($request->hasFile('bg')) {
                $validatedData['bg'] = Helper::fileUpload($request->file('bg'), 'cms', time() . '_' . getFileName($request->file('bg')));
            }
            if (CMS::where('page', $validatedData['page'])->where('section', $validatedData['section'])->exists()) {
                CMS::where('page', $validatedData['page'])->where('section', $validatedData['section'])->update($validatedData);
            } else {
                CMS::create($validatedData);
            }
            return redirect()->route('admin.cms.home.banner.index')->with('t-success', 'CMS updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('t-error', $e->getMessage());
        }
    }
}

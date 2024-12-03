<?php

namespace App\Http\Controllers\Web\Backend\Admin\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\Page;
use App\Enums\Section;
use App\Helpers\Helper;
use App\Models\CMS;
use Exception;

class FooterController extends Controller
{
    public function index(Request $request)
    {
        $footer = CMS::where('page', Page::DEFAULT->value)->where('section', Section::FOOTER->value)->first();
        return view('backend.admin.layouts.cms.footer', compact('footer'));
    }
    public function content(Request $request)
    {
        $validatedData = request()->validate([
            'title' => 'nullable|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'content' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        try {
            $validatedData['page'] = Page::DEFAULT->value;
            $validatedData['section'] = Section::FOOTER->value;
            if ($request->hasFile('image')) {
                $validatedData['image'] = Helper::fileUpload($request->file('image'), 'cms', time() . '_' . getFileName($request->file('image')));
            }
            if (CMS::where('page', $validatedData['page'])->where('section', $validatedData['section'])->exists()) {
                CMS::where('page', $validatedData['page'])->where('section', $validatedData['section'])->update($validatedData);
            } else {
                CMS::create($validatedData);
            }
            return redirect()->route('admin.cms.home.footer.index')->with('t-success', 'CMS updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('t-error', $e->getMessage());
        }
    }
}

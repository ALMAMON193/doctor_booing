<?php

namespace App\Http\Controllers\Web\Backend\Admin\CMS\Home;

use App\Enums\Page;
use App\Enums\Section;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use Exception;
use Illuminate\Http\Request;

class HomePsychologiestController extends Controller
{
    public function index()
    {
        $data = CMS::where('page', Page::HOME->value)->where('section', Section::HOME_PSYCHOLOGISTS_ITEM->value)->first();
        return view('backend.admin.layouts.cms.home.home_psychologiest', compact('data'));
    }
    public function content(Request $request)
    {
        $validatedData = request()->validate([
            'title' => 'nullable|string|max:40',
            'sub_title' => 'nullable|string|max:220',
            'content' => 'nullable',

        ]);
        try {
            $validatedData['page'] = Page::HOME->value;
            $validatedData['section'] = Section::HOME_PSYCHOLOGISTS_ITEM->value;

            if (CMS::where('page', $validatedData['page'])->where('section', $validatedData['section'])->exists()) {
                CMS::where('page', $validatedData['page'])->where('section', $validatedData['section'])->update($validatedData);
            } else {
                CMS::create($validatedData);
            }
            return redirect()->route('admin.cms.home.psychologist.index')->with('t-success', 'CMS updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('t-error', $e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers\Web\Backend\Admin\CMS\Service;

use App\Enums\Page;
use App\Enums\Section;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use Exception;
use Illuminate\Http\Request;

class IndividualTherapyController extends Controller
{

    public function index()
    {

        $data = CMS::where('page', page::SERVICE)->where('section', section::INDIVIDUAL_THERAPY)->first();

        return view('backend.admin.layouts.cms.service.individualTherapy', compact('data'));
    }

    public function content(Request $request)
    {

        $request->validate([
            'title' => 'nullable|string|max:30',
            'content' => 'nullable|string|700',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        try {

            $data = CMS::where('page', page::SERVICE)->where('section', section::INDIVIDUAL_THERAPY)->first();

            if (!$data) {
                $data = new CMS();
                $data->page = Page::SERVICE->value;
                $data->section = Section::INDIVIDUAL_THERAPY->value;
            }
            $data->title = $request->title;
            $data->content = $request->content;
            if ($request->hasFile('image')) {
                $data->image = Helper::fileUpload($request->file('image'), 'cms', time() . '_' . getFileName($request->file('image')));
            }
            $data->save();

            flash()->success('Your action was successful!');
            return redirect()->back();
        } catch (Exception $e) {

            flash()->error($e->getMessage());
            return redirect()->back();
        }
    }
}

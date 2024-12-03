<?php

namespace App\Http\Controllers\Web\Backend\Admin\CMS;

use App\Enums\Page;
use App\Enums\Section;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use Illuminate\Http\Request;

class OurPsychologistsController extends Controller
{

    public function index()
    {

        $data = CMS::where('page', Page::OUR_PSYCHOLOGISTS)->where('section', Section::MEET_WITH_OUR_TEAM)->first();

        return view('backend.admin.layouts.cms.our_psychologist.index', compact('data'));
    }

    public function content(Request $request)
    {

        $request->validate([
            'title' => 'nullable|string|max:50',
            'content' => 'nullable|string|max:200',
        ]);

        try {
            $data = CMS::where('page', Page::OUR_PSYCHOLOGISTS)->where('section', Section::MEET_WITH_OUR_TEAM)->first();
            if($data){
                $data->title = $request->title;
                $data->save();
            }else{
                $data = new CMS();
                $data->page = Page::OUR_PSYCHOLOGISTS;
                $data->section = Section::MEET_WITH_OUR_TEAM;
                $data->title = $request->title;
                $data->save();
            }

            flash()->success('Your action was successful!');
            return redirect()->route('admin.cms.ourPsychologists.meetWithTeam.index');
        } catch (\Exception $e) {
            flash()->error('Something went wrong!');
            return redirect()->back();
        }

    }

}

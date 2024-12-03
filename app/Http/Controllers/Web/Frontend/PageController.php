<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Enums\Page;
use App\Enums\Section;
use App\Http\Controllers\Controller;

use App\Models\Blog;
use App\Models\CMS;
use App\Models\FAQ;
use App\Models\psychologySessions;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $query = CMS::where('page', Page::HOME)->where('status', 'active');
        foreach (Section::HomePage() as $key => $section) {
            $cms[$key] = (clone $query)->where('section', $key)->latest()->take($section['item'])->{$section['type']}();
        }

        $blogs = Blog::all()->take(3);
        $faqs = FAQ::all()->take(5);
        $rebates = CMS::where('page', Page::HOME)->where('section', Section::REBATES)->first();
        $home_pshchologiest = CMS::where('page', Page::HOME)->where('section', Section::HOME_PSYCHOLOGISTS_ITEM)
            ->first();

        $rebatesItems = CMS::where('page', Page::HOME)->where('section', Section::REBATES_ITEM)->limit(3)->get();
        $meetWithTeams = CMS::where('page', Page::OUR_PSYCHOLOGISTS)->where('section', Section::MEET_WITH_OUR_TEAM)->first();


        $viewData = [
            'cms' => $cms,
            'blogs' => $blogs,
            'faqs' => $faqs,
            'rebates' => $rebates,
            'rebatesItems' => $rebatesItems,
            'meetWithTeams' => $meetWithTeams,
            'home_pshchologiest'=>$home_pshchologiest,

        ];
        return view('frontend.layouts.home', $viewData);

    }


    public function service()
    {

        $blogs = Blog::all()->take(3);
        $individualTherapy = CMS::where('page', Page::SERVICE)->where('section', Section::INDIVIDUAL_THERAPY)->first();
        $benefitTherapyTitle = CMS::where('page', Page::SERVICE)->where('section', Section::BENEFITS_INDIVIDUAL_THERAPY_TITLE)->first();
        $benefitTherapies = CMS::where('page', Page::SERVICE)->where('section', Section::BENEFITS_INDIVIDUAL_THERAPY)->limit(6)->get();
        $whatExpectTitle = CMS::where('page', Page::SERVICE)->where('section', Section::WHAT_TO_EXPECT_TITLE)->first();
        $whatExpects = CMS::where('page', Page::SERVICE)->where('section', Section::WHAT_TO_EXPECT)->limit(4)->get();

        $viewData = [
            'blogs' => $blogs,
            'individualTherapy' => $individualTherapy,
            'benefitTherapyTitle' => $benefitTherapyTitle,
            'benefitTherapies' => $benefitTherapies,
            'whatExpectTitle' => $whatExpectTitle,
            'whatExpects' => $whatExpects,
        ];

        return view('frontend.layouts.services.index', $viewData);
    }

    public function ourPsychologist()
    {
        $meetWithTeams = CMS::where('page', Page::OUR_PSYCHOLOGISTS)->where('section', Section::MEET_WITH_OUR_TEAM)->first();
        return view('frontend.layouts.psychologist.index', compact('meetWithTeams'));
    }

    public function blog()
    {

        $blogs = Blog::all();

        return view('frontend.layouts.blog.index', compact('blogs'));
    }

    public function blogDetails($slug)
    {

        $blogDetails = Blog::where('slug', $slug)->first();
        $blogs = Blog::all()->take(4)->except($blogDetails->id);

        return view('frontend.layouts.blog_details.index', compact('blogDetails', 'blogs'));
    }

    public function about()
    {

        $cms = CMS::where('page', Page::ABOUT_US)->where('section', Section::ABOUT_THERAPY_CONNECT)->first();

        $faqs = FAQ::all()->take(5);

        $meetWithTeams = CMS::where('page', Page::OUR_PSYCHOLOGISTS)->where('section', Section::MEET_WITH_OUR_TEAM)->first();

        $viewData = [

            'cms' => $cms,
            'faqs' => $faqs,
            'meetWithTeams' => $meetWithTeams

        ];

        return view('frontend.layouts.about.index', $viewData);
    }

    public function verify()
    {
        return view('frontend.layouts.verify.index');
    }



}

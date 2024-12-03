<?php

namespace App\Http\Controllers\Web\Backend\Admin;

use App\Http\Controllers\Controller;

use App\Models\Blog;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::all()->count();
         $totalDoctor   = User::where('role', 'doctor')->count();
         $totalBlog = Blog::all()->count();
         $totalPayment = Payment::where('status','completed')->count();
        return view('backend.admin.layouts.index',compact('totalUser','totalDoctor','totalBlog','totalPayment'));
    }
}

<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.layouts.account-type.index');
    }
    public function createClientAccount()
    {
        return view('auth.register');
    }
  
}

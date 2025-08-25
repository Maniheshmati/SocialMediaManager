<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialAccountController extends Controller
{
    public function index()
    {
        return view('admin.social_account');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function jurusan()
    {
        return view('programs');
    }

    public function dkv()
    {
        return view('programs.dkv');
    }

    public function pplg()
    {
        return view('programs.pplg');
    }

    public function news()
    {
        return view('news');
    }

    public function facilities()
    {
        return view('facilities');
    }

    public function staff()
    {
        return view('staff');
    }

    public function profile()
    {
        return view('profile');
    }

    public function enrollmentGuide()
    {
        return view('enrollment_guide');
    }

    public function registration()
    {
        return view('registration');
    }

    public function newsDetail()
    {
        return view('news_detail');
    }

    public function contact()
    {
        return view('contact');
    }

    public function extracurriculars()
    {
        return view('extracurriculars.index');
    }

    public function extracurricularDetail()
    {
        return view('extracurriculars.detail');
    }

    public function registrationSuccess()
    {
        return view('registration_success');
    }

    public function extracurricularRegistration()
    {
        return view('extracurriculars.registration');
    }

    public function extracurricularRegistrationSuccess()
    {
        return view('extracurriculars.registration_success');
    }
}

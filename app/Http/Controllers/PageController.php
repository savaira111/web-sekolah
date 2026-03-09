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

    public function seragam()
    {
        return view('seragam');
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

    public function panahan()
    {
        return view('extracurriculars.panahan');
    }

    public function rohis()
    {
        return view('extracurriculars.rohis');
    }

    public function silat()
    {
        return view('extracurriculars.silat');
    }

    public function futsal()
    {
        return view('extracurriculars.futsal');
    }

    public function paskibra()
    {
        return view('extracurriculars.paskibra');
    }

    public function pramuka()
    {
        return view('extracurriculars.pramuka');
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

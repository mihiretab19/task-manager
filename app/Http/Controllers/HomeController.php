<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function home()
    {
        return view('welcome',[
            'title'=>'TaskFlow',
            'user'=>'Yodit',
            'version'=>app()->version(),
        ]);
    }

    public function about()
    {
        return view('about',[
            'title'=>'About TaskFlow',
        ]);
    }

    public function contact()
    {
        return view('contact',[
            'title'=>'Contact Us',
        ]);
    }
}
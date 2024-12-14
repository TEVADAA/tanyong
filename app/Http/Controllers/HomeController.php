<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view("home.home");
    }

    public function __invoke(){
        $sliders = Slider::all();
        return view('home.home' ,compact('sliders'));
    }
}

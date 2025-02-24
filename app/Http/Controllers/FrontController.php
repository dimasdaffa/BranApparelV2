<?php

namespace App\Http\Controllers;

use App\Models\CompanyStatistic;
use App\Models\HeroSection;
use App\Models\OurPrinciple;
use App\Models\OurTeam;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $statistics = CompanyStatistic::take(4)->get();
        $principles = OurPrinciple::take(4)->get();
        $products = Product::take(4)->get();
        $teams = OurTeam::take(3)->get();
        $testimonials = Testimonial::take(5)->get();
        $hero_section = HeroSection::orderByDesc('id')->take(1)->get();
        return view('front.index',compact('statistics','principles','products','teams','testimonials','hero_section'));
    }
}

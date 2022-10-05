<?php

namespace App\Http\Controllers;

use App\Models\CentrePoint;
use App\Models\Space;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $c = Space::where('id_city','1')->count();
        $b = Space::where('id_city','2')->count();
        $k = Space::where('id_city','5')->count();
        $p = Space::where('id_city','6')->count();

        $centrePoint = CentrePoint::get()->first();
        $spaces = Space::get();
        return view('home',[
            'spaces' => $spaces,
            'centrePoint' => $centrePoint
        ],compact('b','c','p','k'));
    }
}

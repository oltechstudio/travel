<?php

namespace App\Http\Controllers;

use App\TravelPackage;
use Request; 

class PaketTravel extends Controller
{
    public function index()
    {   
        $items = TravelPackage::with(['galleries'])->get();
        return view('pages.paketTravel',['items' => $items]);
    }

    public function search()
    {   
        $items = TravelPackage::where('title','like','%'.Request::get('search').'%')->with(['galleries'])->get();
        return view('pages.searchTravel',['items' => $items]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Outlets;
use Illuminate\Http\Request;

class OutletViewController extends Controller
{
    public function view()
    {
        $OutletsView = Outlets::all();
        return view('components.outletViews.index',compact('OutletsView'));
    }
}

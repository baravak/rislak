<?php

namespace App\Http\Controllers\Dashboard;

use App\Bank;
use Illuminate\Http\Request;

class SettledController extends Controller
{
    public function store(Request $request){
        return Bank::settledPost($request->all())->response()->json();
    }
}

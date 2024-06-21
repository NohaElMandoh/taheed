<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use Illuminate\Http\Request;

class MotorcycleController extends Controller
{
    public function index(Request $request)
    {

        $motorcycles = Motorcycle::paginate(10);

        return view('motorcycles.index', compact('motorcycles'));
    }
}

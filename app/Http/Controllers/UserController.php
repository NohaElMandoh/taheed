<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $users = User::where('role', 'client')->with('orders')->paginate(10);

        return view('users.index', compact('users'));
    }
}

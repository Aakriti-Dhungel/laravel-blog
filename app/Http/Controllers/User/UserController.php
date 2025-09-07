<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(Request $request)
    {
        if($request->user()->role == 'admin'){
            return redirect()->route('admin.dashboard');
        }

        return view('dashboard');
    }
}

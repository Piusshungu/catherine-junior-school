<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        return view('classes.index',[

            'users' => User::all(),

            'classes' => Level::all(),
        ]);
    }
}

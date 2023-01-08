<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return inertia('Index/Index', [
            'message' => 'Welcome to RefNest',
            'text' => 'Post and find wonderful properties to move into']
        );

        dd('listings');
    }

    public function show(){
        return inertia('Index/Show');

    }
}

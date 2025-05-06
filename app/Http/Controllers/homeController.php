<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    function index() {


        // this 
        
        return view("user.home.index" );
    }

    
}

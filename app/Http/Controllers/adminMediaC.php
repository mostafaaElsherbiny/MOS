<?php

namespace App\Http\Controllers;

use App\photo;
use Illuminate\Http\Request;

use App\Http\Requests;

class adminMediaC extends Controller
{
    //

    public function index(){


        $photos=photo::all();


        return view('admin.media.index',compact('photos'));


    }
public function create(){


        return view('admin.media.create');


    }



}

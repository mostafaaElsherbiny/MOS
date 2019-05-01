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
    public function store(Request $request)
    {
        //


        $file=$request->file('file');

            $name=time(). $file->getClientOriginalName();

            $file->move('imges',$name);

            photo::create(['file'=>$name]);



    }


    public function destroy($id){

$photo=photo::find($id);
        unlink(public_path() . $photo->file);

$photo->DELETE();

return redirect('/admin/media');

    }



}

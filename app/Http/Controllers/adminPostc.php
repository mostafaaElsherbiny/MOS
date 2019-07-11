<?php

namespace App\Http\Controllers;

use App\category;
use App\Http\Requests\postsCreateError;
use App\photo;
use App\post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class adminPostc extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $posts=post::all();



        return view ('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
$categories=category::all();

        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(postsCreateError $request)
    {
        //
        $input= $request->all();

       $user = Auth::user();

        if($file=$request->file('photo_id')){

        $name=time(). $file->getClientOriginalName();

        $file->move('imges',$name);

        $photo=photo::create(['file'=>$name]);


        $input['photo_id']=$photo->id;


        }


      $user->posts()->create($input);





        return redirect('admin/posts');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $posts=post::findOrFail($id);
        $categories=category::all();


        return view ('admin.posts.edit',compact('posts','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $input=$request->all();
        $user=Auth::user();

        if($file=$request->file('photo_id')){

            $name=time().$file->getClientOriginalName();

            $file->move('imges',$name);

            $photo =photo::create(['file'=>$name]);


            $input['photo_id'] = $photo->id;

        }
        $user->posts()->findOrFail($id)->update($input);





        return redirect('admin/posts');







    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $post=post::findOrFail($id);
        if($post->photo_id) {
            unlink(public_path() . $post->photo->file);
        }

        $post->DELETE();
        Session::flash('delete_post','one post have been deleted');




        return redirect('/admin/posts');
    }


public function post($id){

$post=post::findOrFail($id);
$comments=$post->comments;



return view('post',compact('post','comments'));

}



}

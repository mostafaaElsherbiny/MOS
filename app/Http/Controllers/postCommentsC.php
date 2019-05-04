<?php

namespace App\Http\Controllers;

use App\post;

use App\comments;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class postCommentsC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $comments=comments::all();


        return view('admin.comments.index',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $user=Auth::user();

$date=[

    'post_id'=>$request->post_id,
    
    'author'=>$user->name,
    'email'=>$user->email,
    'body'=>$request->body,
    'photo'=>$user->photo->file


]; 
       
    comments::create($date);

$request->session()->flash('comment_message','the manager will see your comment and see if he can active it');


return  redirect()->back();
    

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

        $post=post::findOrFail($id);

        $comments=$post->comments;

        return view('admin.comments.show',compact('comments'));



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


        comments::findOrFail($id)->update($request->all());
        
        return redirect('/admin/comments');
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
comments::findOrFail($id)->delete();


return redirect()->back();


    }
}

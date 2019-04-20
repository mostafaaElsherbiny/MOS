<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\photo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserCreateRequest;

use App\User;
use App\Role;
use Illuminate\Support\Facades\Session;

class adminUsersC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */





    public function index()
    {
        //



       $users=User::all();

        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        $roles=Role::all();
        return view('admin.users.create' ,compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        //

        if(trim($request->password)==''){


            $input=$request->except('password');


        }else{
            $input=$request->all();
            $input['password']=bcrypt($request->password);


        }






        if($file=$request->file('photo_id')){

            $name=time() . $file->getClientOriginalName();

            $file->move('imges',$name);

            $photo=photo::create(['file'=>$name]);
            $input['photo_id']=$photo->id;

        }


      User::create($input);

      return redirect('/admin/users');
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
      $users=User::findOrFail($id);

        $roles=Role::all();
        return view('admin.users.edit' ,compact('roles','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {

        $user=User::findOrFail($id);

        if(trim($request->password)==''){


            $input=$request->except('password');


        }else{
            $input=$request->all();
            $input['password']=bcrypt($request->password);


        }




        if($file=$request->file('photo_id')){

            $name=time() . $file->getClientOriginalName();

            $file->move('imges',$name);

            $photo=photo::create(['file'=>$name]);
            $input['photo_id']=$photo->id;

        }



        $user->update($input);


        return redirect('/admin/users');
        


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

     $user=   User::findOrFail($id);
if($user->photo_id) {
    unlink(public_path() . $user->photo->file);
}

        $user->DELETE();
        Session::flash('delete_user','one user have been deleted');




        return redirect('/admin/users');
    }
}

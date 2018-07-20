<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{







    public function index()
    {
        $users = User::all();
        //return view('user.show_users', compact('users'));
    }

    public function create()
    {
       // return view('user.register');
    }

    public function store(Request $request)
    {

      $this->validate($request,[
        'name'     =>'required',
        'email'       =>'required',
        //'phone_number'       =>'required',
      ]);


        User::create($request->all());
        //return redirect('/user');
    }


    public function show($id)
    {
        $user = User::findOrFail($id);
        //return view('user.show', compact('user'));
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        //return view('user.edit', compact('user'));

    }


    public function update(Request $request, $id)
    {

      $this->validate($request,[
        'name'     =>'required',
        'email'       =>'required',
        'phone_number'       =>'required',
      ]);

      $user = User::findOrFail($id);
      $user->update($request->all());

      //return redirect('/user/' . $user->id);
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        //return redirect('/post');
    }





}

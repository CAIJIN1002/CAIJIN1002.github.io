<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = User::all();
        $check = Auth::user()->admin;

        if( $check =='true'){
          return view('/user',[
            'user' => Auth::user(),
            'users' => $all,
            'check'=> $check

          ]);

        }
        else {
          return redirect('/home');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){

      $validator = Validator::make( $request->all(),[

        'name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
        // 'admin'=> 'required'

      ]);

      if ( $validator->fails() ) { //如果這些欄位沒有遵循上面的規則的話，執行這個function

        return [ 'errors'=> $validator -> errors() ];
        // return abort(404);
      }

      $name = $request->input('name');
      $email = $request->input('email');
      $password = $request->input('password');
      // $admin = $request->input('admin');

      User::create([

        'name'=> $name,
        'email'=> $email,
        'password'=> bcrypt($password),
        'admin'=> 'true',
        'address'=>'',
        'sex'=>'',
        'phone_number'=>'',
        'home_number'=>'',

      ]);

      return redirect('/user');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $idd  = User::find($id);

      // return $id->admin;

      if ( $idd->admin == 'true' ){

        return redirect('/user')->with('無法刪除管理者');
      }
      if ( $idd->admin == NULL )
      {
        User::destroy($id);
        return redirect('/user');
      }


    }
}

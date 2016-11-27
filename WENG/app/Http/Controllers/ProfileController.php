<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Message;
use DB;
use App\User;
use bcrypt;
use Hash;
use Validator;
// use User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
       $this->middleware('auth');
    }
    public function index()
    {

      $check = Auth::user()->admin ;

      $id = Auth::user()->id;

      if ($check == 'true'){

        $all = DB::table('messages')->orderBy('id','desc')->get();
        return  view('/profile',[

          'profiles' => $all,
          'check'=> $check,
          'users'=> Auth::user(),
          ]);

      }
      if ($check == null){

        $posts = DB::table('messages')
                  ->join('users', 'messages.author', '=', 'users.id')
                  ->select('messages.id', 'messages.title', 'messages.article','messages.status')
                  ->where('users.id','=',$id)
                  ->get();
        // return $posts;

        return  view('/profile',[
          'users'=> Auth::user(),
          'profiles' => $posts,
          'check' => $check,
          // 'status' => $posts->status
          ]);
      }
    }

    public function profile_admin(){

      $check = Auth::user()->admin;

      return  view('/profile_admin',[

        'users' => Auth::user(),
        'check' => $check,

      ]);

    }

    public function Update_admin($token=null){
      $check = Auth::user()->admin ;
      return  view('update_admin',[
        'update'=> Auth::user(),
        'check'=>$check,
        'token'=> $token
      ]);
    }

    public function store_admin(Request $request)
    {
        $rules =[
          'name'          => 'required|min:3|max:10',
          'sex'           => 'required',
          'email'         => 'required',
          'address'       => 'required',
          'phone_number'  => 'required',
          'home_number'   => 'required'
        ];
        $messages=[
          'name.required'          => '這個欄位必須填寫',
          'name.min'               => '最少需要三個字',
          'name.max'               => '最多只能十個字',
          'sex.required'           => '這個欄位必須填寫',
          'email.required'         => '這個欄位必須填寫',
          'address.required'       => '這個欄位必須填寫',
          'phone_number.required'  => '這個欄位必須填寫',
          'home_number.required'   => '這個欄位必須填寫'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $PostUrl = "/profile_admin";
        $FailsUrl = "/profile_admin/update_admin";
        if( $validator->fails() ){
          return redirect($FailsUrl)->withErrors($validator);
        }
        else{
          $user = new user;
          $user->where('id','=',Auth::User()->id)
          ->update([
            'name'          => $request->name,
            'sex'           => $request->sex,
            'email'         => $request->email,
            'address'       => $request->address,
            'phone_number'  => $request->phone_number,
            'home_number'   => $request->home_number,
          ]);
          return redirect($PostUrl)->with('message','資料已變更');
        }
        return redirect($FailsUrl)->with('message','資料已變更');
    }


    public function password_admin(Request $request,$token = null){

      $check = Auth::user()->admin ;
      return view('reset_admin')->with([

        'token' => $token,
        'email' => $request->email,
        'check' => $check

      ]);
    }


    public function passwordupdate_admin(Request $request){

      $rules =[
        'mypassword' => 'required',
        'password'=> 'required|confirmed|min:6|max:18',
      ];
      $messages=[
        'mypassword.required' => '這個欄位必須填寫',
        'password.required' => '這個欄位必須填寫',
        'password.confirmed' => '請確認密碼是否相同',
        'password.min' => '密碼長度不得小於6',
        'password.max' => '密碼長度不得大於18',

      ];
      $validator = Validator::make($request->all(),$rules,$messages);

      if( $validator->fails() ){

        return redirect('/profile_admin/reset_admin')->withErrors($validator);

      }else{

        if ( Hash::check($request->mypassword,Auth::user()->password) ){

          $user = new user;
          $user->where('email','=',Auth::user()->email)
               ->update([
                 'password' => bcrypt($request->password)
               ]);
          return redirect('/profile_admin/reset_admin')->with('message','密碼以變更');
        }
        else {
          return redirect('/profile_admin/reset_admin')->with('message','密碼更改失敗');
        }
      }
    }


    public function ProfileUpdate($token=null){
      $check = Auth::user()->admin ;
      return  view('ProfileUpdate',[
        'update'=> Auth::user(),
        'check'=>$check,
        'token'=> $token
      ]);
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
        $rules =[
          'name'          => 'required|min:3|max:10',
          'sex'           => 'required',
          'email'         => 'required',
          'address'       => 'required',
          'phone_number'  => 'required',
          'home_number'   => 'required'
        ];
        $messages=[
          'name.required'          => '這個欄位必須填寫',
          'name.min'               => '最少需要三個字',
          'name.max'               => '最多只能十個字',
          'sex.required'           => '這個欄位必須填寫',
          'email.required'         => '這個欄位必須填寫',
          'address.required'       => '這個欄位必須填寫',
          'phone_number.required'  => '這個欄位必須填寫',
          'home_number.required'   => '這個欄位必須填寫'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $PostUrl = "/profile";
        $FailsUrl = "/profile/update";
        if( $validator->fails() ){
          return redirect($FailsUrl)->withErrors($validator);
        }
        else{
          $user = new user;
          $user->where('id','=',Auth::User()->id)
          ->update([
            'name'          => $request->name,
            'sex'           => $request->sex,
            'email'         => $request->email,
            'address'       => $request->address,
            'phone_number'  => $request->phone_number,
            'home_number'   => $request->home_number,
          ]);
          return redirect($PostUrl)->with('message','資料已變更');
        }
        return redirect($FailsUrl)->with('message','資料已變更');
    }

    public function password(Request $request,$token = null){

      $check = Auth::user()->admin ;
      return view('reset')->with([

        'token' => $token,
        'email' => $request->email,
        'check' => $check

      ]);
    }

    public function passwordupdate(Request $request){

      $rules =[
        'mypassword' => 'required',
        'password'=> 'required|confirmed|min:6|max:18',
      ];
      $messages=[
        'mypassword.required' => '這個欄位必須填寫',
        'password.required' => '這個欄位必須填寫',
        'password.confirmed' => '請確認密碼是否相同',
        'password.min' => '密碼長度不得小於6',
        'password.max' => '密碼長度不得大於18',

      ];
      $validator = Validator::make($request->all(),$rules,$messages);

      if( $validator->fails() ){

        return redirect('/profile/reset')->withErrors($validator);

      }else{

        if ( Hash::check($request->mypassword,Auth::user()->password) ){

          $user = new user;
          $user->where('email','=',Auth::user()->email)
               ->update([
                 'password' => bcrypt($request->password)
               ]);
          return redirect('/profile/reset')->with('message','密碼以變更');
        }
        else {
          return redirect('/profile/reset')->with('message','密碼更改失敗');
        }
      }
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
    public function content($id){

      return view('content',[

        'content' => User::find($id),
        'check' => Auth::user()->admin
      ]);

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function MessageUpdate(Request $request,$id){

      // ajax

      // $title = $request->input('title');
      // $article = $request->input('article');
      //
      //
      // $updateId = Message::find($id);
      //
      // // return $id;
      //
      // $updateId->title = $title;
      // $updateId->article = $article;
      //
      // $updateId->save();
      //
      // return redirect('profile');
      // // return ;

      // form

      $rules =[
        'title' => 'required',
        'article'=> 'required',
      ];
      $messages=[
        'title.required' => '這個欄位必須填寫',
        'article.required' => '這個欄位必須填寫',

      ];
      $validator = Validator::make($request->all(),$rules,$messages);

      $PostUrl = "/profile";

      $FailsUrl = "/profile/edit/$id";


      if( $validator->fails() ){

        return redirect($FailsUrl)->withErrors($validator);

      }
      else{

        $user = new Message;
        $user->where('id','=',$id)
        ->update([
          'title' => $request->title,
          'article' => $request->article
        ]);
        return redirect($PostUrl)->with('message','文章已變更');
      }

      return redirect($FailsUrl)->with('message','文章更改失敗');





    }



    public function edit(Request $request, $id,$token = null){

      $check = Auth::user()->admin ;

      $edit = Message::find($id);
      $status = $edit->status;

      if ( $status == '已完成' ){

        return redirect('/profile');

      }
      else {
        return view('/edit',[
          'token' => $token,
          'edit'  => $edit,
          'check' => $check,
          'id'    => $id

        ]);
      }


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
        $update = Message::find($id);
        $update->status = '已完成';
        $update->master = Auth::User()->name;
        $update->save();

        return redirect('profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Message::destroy($id);
        return redirect('/profile');
    }
}

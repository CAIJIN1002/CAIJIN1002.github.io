<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;
use Mail;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

      $anno = DB::table('announcement')->orderBy('id','desc')->first();
      $address = Auth::user()->address;
      $sex = Auth::user()->sex;
      $phone = Auth::user()->phone_number;
      $home = Auth::user()->home_number;

      if ( $address == null || $sex == null || $phone == null || $home == null ){

        return view('/home',[
          'anno' => $anno,
          'check'=> Auth::user()->admin,
          'err'=> '請到「個人資訊」填寫相關資訊，以免影響維修進度',

        ]);

      }
      else {
        return view('/home',[
          'anno' => $anno,
          'check'=> Auth::user()->admin,
          'err'=> '',
        ]);
      }
    }

    public function create(){


    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Auth;
use DB;
use Validator;
use Mail;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){

      $validator = Validator::make( $request->all(),[

        'title' => 'required', //設定 title 這個欄位是必須填寫的，而且必須小於20個字

        'article' => 'required',  //設定 note 這個爛位是必須填寫的
        // 'status'=>'required'

      ]);

      if ( $validator->fails() ) { //如果這些欄位沒有遵循上面的規則的話，執行這個function

        return [ 'errors'=> $validator -> errors() ];
        // return abort(404);
      }

      $title = $request->input('title');

      $article = $request->input('article');


      $from = [
        'email' => 'lichaqq@gmail.com',
        'name' => 'WENG團隊',
      ];

      // 填寫收信人信箱
      $to = [
        'email' => Auth::user()->email,
        //'name' => 'onePeople'
      ];

      // 信件的內容(即表單填寫的資料)
      $data2 = [
        'title' => $title,
        'article' => $article,
      ];

      // return($data);

      // 寄出信件
      Mail::send('create_message', $data2, function($message) use ($request) {
        $email = Auth::user()->email;
        $message->to($email)
                ->subject('已新增一筆維修');
      });



      // dd($data);
      return Message::create([

        'title' => $title,
        'article' => $article,
        'author' => Auth::user()->id,
        'name' => Auth::user()->name,
        'master'=>'',
        'status' => '處理中',

      ]);

    }

    public function api()
    {
        return DB::table('messages')->orderby('id','desc')->get();
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
        //
    }
}

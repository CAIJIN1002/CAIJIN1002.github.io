<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Announcement;
use Validator;
use DB;
class AnnouncementController extends Controller
{
    // public function __construct()
    // {
    //    $this->middleware('auth');
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function api(){

      return Announcement::all();

    }

    public function index($token=null)
    {

      $anno = DB::table('announcement')->orderBy('id','desc')->get();


      $check = Auth::user()->admin;

      if( $check == null ){

        return redirect('/home');

      }
      else {
        return view('/announcement',[

          'check' => $check,
          'Anno'  => $anno,
          'token' => $token

        ]);
      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

      $rules =[
        'title'   => 'required',
        'article' => 'required',
      ];
      $messages=[
        'title.required'    => '這個欄位必須填寫',
        'article.required'  => '這個欄位必須填寫',

      ];
      $validator = Validator::make($request->all(),$rules,$messages);

      $PostUrl = "/announcement";

      $FailsUrl = "/announcement";

      if( $validator->fails() ){

        return redirect($FailsUrl)->withErrors($validator);

      }
      else{

        $Announcement = new Announcement;

        $Announcement->create([

          'title'    => $request->title,
          'article'  => $request->article,
          'author'   => Auth::user()->id
        ]);
        return redirect($PostUrl)->with('message','資料已新增');
      }

      return redirect($FailsUrl)->with('message','確認欄位是否都已填寫');



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
    public function edit($id,$token=null)
    {
      Announcement::find($id);
      $check = Auth::user()->admin;
      return view('AnnoEdit',[

        'check' => $check,
        'anno'  => Announcement::find($id),
        'token' => $token

      ]);
    }

    public function AnnoUpdate(Request $request , $id){

      $anno =  Announcement::find($id);
      $anno->title = $request->title;
      $anno->article = $request->article;
      // $anno->author = $request->author;

      // return $anno;
      $anno->save();

      return redirect('/announcement');

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
    public function destroy($id){

      Announcement::destroy($id);
      return redirect('/announcement');
      // return '1';
    }
}

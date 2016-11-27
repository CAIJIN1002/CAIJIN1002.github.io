<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            // 'admin'=> 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
      //
      // $from = [
      //   'email' => 'lichaqq@gmail.com',
      //   'name' => '信箱確認',
      // ];
      // // $mail = Auth::user()->email;
      // // 填寫收信人信箱
      // $to = [
      //   'email' => $data['email'],
      //   //'name' => 'onePeople'
      // ];
      //
      // // 信件的內容(即表單填寫的資料)
      // $data2 = [
      //   'email' => $data['email'],
      //   'password' => $data['password'],
      // ];
      //
      // // 寄出信件
      // Mail::send('mail_check', $data2, function($message) use ($from, $to) {
      //   $message
      //     ->from($from['email'], $from['name'])
      //     ->to($to['email'])
      //     ->subject('Welcome ');
      // });

      return User::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'password' => bcrypt($data['password']),
          'admin'=> '',
          'address'=>'',
          'phone_number'=>'',
          'home_number'=>'',
          'sex'=>''
      ]);





    }
}

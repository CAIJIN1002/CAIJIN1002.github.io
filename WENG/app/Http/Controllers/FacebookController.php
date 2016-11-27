<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
// use Socialize;

class FacebookController extends Controller
{
    public function redirectToProvider()
  {
    return Socialite::driver('facebook');
  }

  public function handleProviderCallback()
  {
    $user = Socialite::with('facebook')->user();

    // $user->token;
  }
  public function show(){

    // $user = Socialize::with('facebook')->user();
    //
    // // OAuth Two Providers
    // $token = $user->token;
    //
    // // OAuth One Providers
    // $token = $user->token;
    // $tokenSecret = $user->tokenSecret;
    //
    // // // All Providers
    // // $user->getId();
    // // $user->getNickname();
    // // $user->getName();
    // // $user->getEmail();
    // // $user->getAvatar();
    //

  }
}

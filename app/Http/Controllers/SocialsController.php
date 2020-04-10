<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialsController extends Controller
{
  public function redirect($provider)
  {
    return Socialite::driver($provider)->redirect();
  }

  public function Callback($provider)
  {
    $userSocial =   Socialite::driver($provider)->stateless()->user();
    $users       =   User::where(['email' => $userSocial->getEmail()])->first();

    if ($users) {
      Auth::login($users);
      return redirect('home');
    } else {
      $user = User::create([
        'name'          => $userSocial->getName(),
        'email'         => $userSocial->getEmail(),
        'avatar'         => $userSocial->getAvatar(),
        'provider_id'   => $userSocial->getId(),
        'provider'      => $provider,
      ]);
      return redirect()->route('forum.index');
    }
  }
}

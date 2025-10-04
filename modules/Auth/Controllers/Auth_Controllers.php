<?php

namespace Modules\Auth\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\HTTP\RedirectResponse;


use Modules\Auth\Models\UserModel;


class Auth_Controllers extends BaseController
{

  public function login()
  {
        return view('Modules\Auth\Views\Login_Views');
  }

  public function register()
  { 
      return view('Modules\Auth\Views\Register_Views');
  }

  public function auth(){
    $userModel = new UserModel();

    $email    = $this->request->getPost('email');   // match form input name
    $password = $this->request->getPost('password');

    $user = $userModel->where('email', $email)->first();

    if ($user && password_verify($password, $user['password_hash'])) {
        session()->set([
            'user_id'   => $user['id'],
            'name'      => $user['name'],
            'email'     => $user['email'],
            'role'      => $user['role'],
            'isLoggedIn'=> true
        ]);

        return redirect()->to('/dashboard');
    }

    return redirect()->back()->with('error', 'Invalid login credentials');
  }

  public function logout(): RedirectResponse
    {
        // $this->session->destroy();
        return redirect()->to('/login')->with('success', 'ypu logged out');
    }
}
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

        $loginHistory = db_connect()->table('login_history');
        
        $loginHistory->insert([
            'user_id' => $user['id'],
        ]);

        return redirect()->to('/dashboard');
    }

    return redirect()->back()->with('error', 'Invalid login credentials');
  }

  public function create(){
     $userModel = new UserModel();

    $rules = [
        'name' => 'required|min_length[3]',
        'email' => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[6]',
    ];

    if (! $this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $userModel->insert([
        'name' => $this->request->getPost('name'),
        'email' => $this->request->getPost('email'),
        'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'role' => 'user', 
        'active' => 1
    ]);

    return redirect()->to('/login')->with('success', 'Registration successful, please login');
  }

  public function logout(): RedirectResponse
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'ypu logged out');
    }
}
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


    public function edit($id)
    {
        $userModel = new UserModel();
        
        $data['user'] = $userModel->find($id);

        return view('Modules\Auth\Views\edit_user', $data);
    }


    public function update($id)
    {
        $userModel = new UserModel();

        $rules = [
            'email' => 'required|valid_email',
            'password' => 'permit_empty|min_length[6]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'email' => $this->request->getPost('email'),
        ];

//password not included in $data array as if the feild is left blank the password would be saved empty into the database
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password_hash'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $userModel->update($id, $data);

        return redirect()->to('/dashboard')->with('success', 'Account updated successfully.');
    }

    public function manage() {

    //     if (session()->get('role') !== 'admin') {
    //     return redirect()->to('/dashboard')->with('error', 'Access denied');
    // }
    
        $userModel = new UserModel();

        $data['users'] = $userModel->findAll();

        return view('Modules\Auth\Views\manage_user', $data);
    }


    public function promote($id){
        $userModel = new UserModel();

        $userModel->update($id, ['role' => 'admin']);

        return redirect()->to('/manage-user')->with('success', 'User promoted to admin.');
    }


    public function delete($id) {
        $userModel = new UserModel();
        $userModel->delete($id);
        return redirect()->to('/manage-user')->with('success', 'User deleted.');
    }
}
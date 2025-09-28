<?php

namespace Modules\Auth\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\HTTP\RedirectResponse;
use App\Models\UserModel;


class Auth_Controllers extends BaseController
{
    protected $userModel;
    protected $session;

    
    public function __construct()
    {
      $this->userModel = new UserModel();
    
      $this->session = session();
            
    }

    public function login()
    {
        
     if($this->request->getMethod() === 'post'){

         $email = $this->request->getPost('email');

         $password =$this->request->getPost('password');
 
         $user = $this->userModel->where('email', $email)->first();

         if($user && password_verify($password, $user['password_hash'])){

            $this->session->set([
                'user_id' =>   $user['id'],
                'user_email' => $user['email'],
                'isLoggedIn' => true
             ]);
            return redirect()->to('Modules\Admin\Views\Dashboard_Views');
          }

         return redirect()->back()->with('error', 'wrong email or password');

       }
    

        return view('Modules\Auth\Views\Login_Views');
    }

    public function register()
    { 
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'name' =>    'required|min_length[3]|max_length[100]',
                'email'  =>  'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[6]',
             ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
             ];

            $this->userModel->save($data);

            return redirect()->to('/login')->with('success', 'registration is a success, login now');
        }

        return view('Modules\Auth\Views\Register_Views');
    }


  public function logout(): RedirectResponse
    {
        $this->session->destroy();
        return redirect()->to('/login')->with('success', 'ypu logged out');
    }
}
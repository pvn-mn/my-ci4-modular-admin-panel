<?php

namespace Modules\User\Controllers;

use App\Controllers\BaseController;

class Dashboard_Controllers extends BaseController{ // class name === file name (codeigniter4)
    public function index() {
        // return view('Modules\User\Views\Dashboard_Views');

        if (session()->get('role') === 'admin') {
            return view('Modules\User\Views\Dashboard_Views', ['title' => 'Admin Dashboard']);
        }

        return view('Modules\User\Views\Dashboard_Views_user', ['title' => 'User Dashboard']);
        }
    

    public function home(){
        return view('Modules\User\Views\Home');
    }

     public function history()
    {
        // if (session()->get('role') !== 'admin') {
        //     return redirect()->to('/login');
        // }
        $db = db_connect();
        $query = $db->table('login_history')
                    ->select('login_history.*, users.email, users.name')
                    ->join('users', 'users.id = login_history.user_id')
                    ->orderBy('logged_in_at', 'DESC')
                    ->get();

        return view('Modules\Auth\Views\user_history', [
            'history' => $query->getResultArray()
    ]);
    }
}
<?php

namespace Modules\User\Controllers;

use App\Controllers\BaseController;

use Modules\Auth\Models\UserModel;


class Dashboard_Controllers extends BaseController{ // class name === file name (codeigniter4)
    public function index() {
        // return view('Modules\User\Views\Dashboard_Views');

        $title = (session()->get('role') === 'admin') ? 'Admin Dashboard' : 'User Dashboard';

         if ($this->request->isAJAX()) {
            return view('Modules\User\Views\layouts\dashboard_content', ['title' => $title]);
        }

         if (session()->get('role') === 'admin') {
            return view('Modules\User\Views\Dashboard_Views', ['title' => $title]);
        } else {
            return view('Modules\User\Views\Dashboard_Views_user', ['title' => $title]);
        }
    }

    

    public function home(){
        return view('Modules\User\Views\Home');
    }


     public function history()
    {
        // if (session()->get('role') !== 'admin') {
        //     return redirect()->to('/login');
        // }

    //     if (session()->get('role') !== 'admin') {
    //     return redirect()->to('/dashboard')->with('error', 'Access denied');
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
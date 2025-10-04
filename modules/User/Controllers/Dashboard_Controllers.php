<?php

namespace Modules\User\Controllers;

use App\Controllers\BaseController;

class Dashboard_Controllers extends BaseController{ // class name === file name (codeigniter4)
    public function index() {
        return view('Modules\User\Views\Dashboard_Views');
    }
}
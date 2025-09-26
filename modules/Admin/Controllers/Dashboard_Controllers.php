<?php

namespace Modules\Admin\Controllers;

use App\Controllers\BaseController;

class Dashboard_Controllers extends BaseController{ // class name === file name (codeigniter4)
    public function index() {
        return view('Modules\Admin\Views\Dashboard_Views');
    }
}
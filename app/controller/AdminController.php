<?php

namespace Students\John\app\controller;

use Students\John\app\core\Controller;
use Students\John\app\core\Request;

class AdminController extends Controller
{
    public function login()
    {
        $this->layout = "layouts.auth.admin";
        return $this->view('admin.admin_login');
    }

    public function access(Request $request)
    {
        $this->dump($request->inputs());
    }
}
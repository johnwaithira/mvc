<?php

namespace Students\John\app\controller;

use Students\John\app\core\Application;
use Students\John\app\core\Controller;
use Students\John\app\core\Request;
use Students\John\app\model\Backend;
use Students\John\database\Database;
use Students\John\files\Upload;
use ZipArchive;

class HomeController extends Controller
{
    public function home(Request $request)
    {

        $username = $request->getrouteParams()['username'];

        $user = new Backend(Application::$app->db);


        echo $user->User($username)['bio'];



    }

    public function image()
    {

        return $this->view('images');
    }

    public function upload(Request $request)
    {


        $file = new Upload();
        $file->filename("zipped");
        $file::dir('media.content');
        $file->filename("zipped");
        $this->dump($file->images($request));
    }

   
}
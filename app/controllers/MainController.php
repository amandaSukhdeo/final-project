<?php

namespace app\controllers;

use app\core\Controller;

class MainController extends Controller
{

    public function homepage()
    {
        include '../public/assets/views/main/homepage.php';
    }


    public function usersView()
    {
        include '../public/assets/views/user/users-view.php';
    }

    public function notFound()
    {
    }

}
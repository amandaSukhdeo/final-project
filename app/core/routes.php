<?php

use app\controllers\AccountController;
use app\controllers\MainController;
use app\controllers\PostController;


$routes = [
    'signup' => [
        'controller' => AccountController::class,
        'GET' => 'viewSignUp',
        'POST' => 'saveUser'
    ],

    'login' => [
        'controller' => AccountController::class,
        'GET' => 'viewLogIn',
        'POST' =>'login'
    ],

    'logout' => [
        'controller' => AccountController::class,
        'GET' => 'logOut',
    ],

    'users-view' => [
        'controller' => MainController::class,
        'GET' => 'usersView'
    ],

    'add-post' => [
        'controller' => PostController::class, 
        'GET' => 'addPostView',
        'POST' => 'addPost'
    ],

    'posts' => [
        'controller' => PostController::class, 
        'GET' => 'getPosts',
        'POST' => 'likePost' 
    ],

    'start-campaign' => [
        'controller' => PostController::class, 
        'GET' => 'startCampaign',
        'POST' => 'saveCampaign'
    ],

    'campaigns' => [
        'controller' => PostController::class, 
        'GET' => 'getCampaigns'
    ],

    'events' => [
        'controller' => PostController::class, 
        'GET' => 'getEvent'
    ]
];
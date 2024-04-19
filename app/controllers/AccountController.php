<?php

namespace app\controllers;
use app\core\Controller;
use app\core\AuthHelper;
use app\models\User;


class AccountController extends Controller
{
    public function validateUser($inputData) {
        $errors = [];
        $fullName = $inputData['fullName'];
        $username = $inputData['username'];
        $email = $inputData['email'];
        $password = $inputData['password'];
        $passwordConfirm = $inputData['passwordConfirm'];

        if ($fullName) {
            $fullName = htmlspecialchars($fullName, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($fullName) < 2) {
                $errors['fullNameShort'] = 'name is too short';
            }
        } else {
            $errors['requiredFullName'] = 'full name is required';
        }

        if ($username) {
            $username = htmlspecialchars($username, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($username) < 2) {
                $errors['usernameShort'] = 'username is too short';
            }
        } else {
            $errors['requiredUsername'] = 'username is required';
        }

        if ($email) {
            $email = htmlspecialchars($email, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['invalidEmail'] = 'email is invalid';
            }
        } else {
            $errors['requiredEmail'] = 'email is required';
        }

        if ($password && $passwordConfirm) {
            $password = htmlspecialchars($password, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            $passwordConfirm = htmlspecialchars($passwordConfirm, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if ($password !== $passwordConfirm) {
                $errors['passwordMismatch'] = 'passwords do not match';
            }
        } else {
            $errors['requiredPasswords'] = 'both password and password confirmation are required';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }
        return [
            'fullName' => $fullName,
            'username' => $username,
            'email' => $email, 
            'password' => $password, 
            'passwordConfirm' => $passwordConfirm,
        ];
    }

    public function saveUser() {
        $inputData = [
            'fullName' => $_POST['fullName'] ? $_POST['fullName'] : false,
            'username' => $_POST['username'] ? $_POST['username'] : false,
            'email' => $_POST['email'] ? $_POST['email'] : false,
            'password' => $_POST['password'] ? $_POST['password'] : false,
            'passwordConfirm' => $_POST['passwordConfirm'] ? $_POST['passwordConfirm'] : false,
        ];
        $userData = $this->validateUser($inputData);

        $pwd = $userData['password']; 
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); 

        $user = new User(); 
        $user->saveUser(
            [
                'fullName' => $userData['fullName'],
                'username' => $userData['username'],
                'email' => $userData['email'],
                'password' => $hashedPwd,
            ]
        );
        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function viewSignUp() {
        AuthHelper::nonAuthRoute();
        include '../public/assets/views/user/signup.php';
        exit(); 
    }

    public function viewLogIn() {
        AuthHelper::nonAuthRoute();
        include '../public/assets/views/user/login.php';
        exit(); 
    }

    public function login()
    {
        $inputData = [
            'username' => $_POST['username'] ? $_POST['username'] : false,
            'password' => $_POST['password'] ? $_POST['password'] : false,
        ];

        $user = new User();
        $authedUser = $user->login(
            [
                'username' => $inputData['username'],
                'password' => $inputData['password'],
            ]
        );

        AuthHelper::startSession($authedUser);

        http_response_code(200);
        echo json_encode([
            'route' => '/'
        ]);
        exit();
    }

    public function logOut() {
        AuthHelper::endSession();
        http_response_code(200);
        header('Location: login');
        exit;
    }
    
}
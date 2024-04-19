<?php

namespace app\models;

//using the database class namespace
use app\core\Database;

class User
{
    use Database;

    public function getAllUsersByName($name) {
        $query = "select * from users WHERE CONCAT(firstName,' ',lastName) like :name";
        return $this->queryWithParams($query, ['name' => '%' . $name . '%'], 'app\models\User');
    }

    public function getAllUsers() {
        $query = "select * from users";
        return $this->fetchAll($query);
    }

    public function updateUserSessionExp($inputData){
        $query = "update users set sessionExpiration = :sessionExpiration where usersId = :id";
        return $this->queryWithParams($query, $inputData);
    }

    public function getUserByID($id) {
        $query = "select usersId, usersName, usersUid, usersEmail, sessionExpiration from users where usersId = :id;";                         // SQL to get member data
        $user = $this->queryWithParams($query, ['id' => $id]);    // Run SQL
        if (!$user) {                                          // If no member found
            return false;                                        // Return false
        }
        return $user[0];
    }

    public function getUserByUsername($username) {
        $query = "select usersId from users where usersUid = :username;";                         // SQL to get member data
        $user = $this->queryWithParams($query, ['username' => $username]);    // Run SQL
        if (!$user) {                                          // If no member found
            return false;                                        // Return false
        }
        return $user[0];
    }


    public function saveUser($inputData){
        $query = "insert into users (usersName, usersUid, usersEmail, usersPwd) values (:fullName, :username, :email, :password);";
        return $this->queryWithParams($query, $inputData); 
    }

    public function getUserCredentials($username) {
        $query = "select usersUid, usersPwd from users where usersUid = :username;";
        return $this->queryWithParams($query, ['username' => $username]);
    }

    public function login($inputData) {
        $query = "select usersId, usersUid, usersPwd from users where usersUid = :username;";                         
        $member = $this->queryWithParams($query, [':username' => $inputData['username']]);    
        if (!$member) {                                          // If no member found
            return false;                                        // return false 
        }

        $authenticated = password_verify($inputData['password'], $member[0]['usersPwd']); // Passwords match?
        return ($authenticated ? $member[0] : false);
    }

    // public function updateUser($inputData){
    //     $query = "update users set firstName = :firstName, lastName = :lastName where id = :id";
    //     return $this->queryWithParams($query, $inputData);
    // }

    // public function deleteUser($inputData){
    //     $query = "DELETE FROM users where id = :id";
    //     return $this->queryWithParams($query, $inputData);
    // }
}

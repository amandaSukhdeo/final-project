<?php

namespace app\models;

//using the database class namespace
use app\core\Database;

class Post
{
    use Database;

    public function savePost($inputData){
        $query = "insert into posts (usersId, usersUid, title, descr, borough, image) values (:userId, :username, :title, :description, :borough, :imageLink);"; 
        return $this->queryWithParams($query, $inputData); 
    }

    public function getAllPosts() {
        $query = "select * from posts"; 
        return $this->fetchAll($query); 
    } 
}
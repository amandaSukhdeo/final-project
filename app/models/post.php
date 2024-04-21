<?php

namespace app\models;

use app\core\Database;

class Post
{
    use Database;

    public function savePost($inputData){
        $query = "insert into posts (usersId, usersUid, title, descr, borough, image) values (:userId, :username, :title, :description, :borough, :imageLink);"; 
        return $this->queryWithParams($query, $inputData); 
    }

    public function getAllPosts() {
        $query = "SELECT p.postId, p.usersId, p.usersUid, p.title, p.descr, p.borough, p.image, COUNT(l.postId) AS num_likes FROM posts p LEFT JOIN postLikes l ON p.postId = l.postId GROUP BY p.postId, p.usersId, p.usersUid, p.title, p.descr, p.borough, p.image;"; 
        return $this->fetchAll($query); 
    } 

    public function getUser($id) {
        $query = "select usersId from posts where postId = :id;"; 
        $user = $this->queryWithParams($query, ['id' => $id]);
        if (!$user) {                                          // If no member found
            return false;                                        // Return false
        }
        return $user[0];
    }

    public function checkPostLike($inputData) {
        $query = "select count(*) as likeCount from PostLikes where postID = :id and userId = :userId;"; 
        $result = $this->queryWithParams($query, $inputData);

        if ($result !== false && isset($result['likeCount']) && $result['likeCount'] > 0) {
            return true; // If like found
        } else {
            return false; // If no like found
        }
    }

    public function insertPostLike($inputData) {
        $query = "insert into PostLikes (postID, userID) values (:id, :userId);";
        return $this->queryWithParams($query, $inputData); 
    }

    public function updatePostLike($id) {
        $query = "update postLikes set likes = likes + 1 where postId = :id;";
        return $this->queryWithParams($query, ['id' => $id]);
    }
}
<?php

namespace app\models;

use app\core\Database;

class Campaign
{
    use Database;

    public function saveCampaign($inputData){
        $query = "insert into campaign (usersId, usersUid, name, descr, borough, image) values (:userId, :username, :name, :description, :borough, :imageLink);"; 
        return $this->queryWithParams($query, $inputData); 
    }

    public function getAllCampaigns() {
        $query = "select * from campaign"; 
        return $this->fetchAll($query); 
    } 
}
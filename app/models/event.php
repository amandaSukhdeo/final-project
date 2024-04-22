<?php

namespace app\models;

use app\core\Database;

class Event
{
    use Database;

    public function getAllEvents() {
        $query = "select * from Events"; 
        return $this->fetchAll($query); 
    } 

    public function saveEvent($inputData) {
        $query = "insert into Events (title, orgName, descr, eventDate, eventTime, eventLocation, borough, image) values (:name, :orgName, :description, :date, :time, :location,:borough, :imageLink);"; 
        return $this->queryWithParams($query, $inputData); 
    }
}
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
}
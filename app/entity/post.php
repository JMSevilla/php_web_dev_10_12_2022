<?php

class Entity {
    public function postQueryBuilder($condition){
        if($condition == 'insert/user'){
            $sql = "insert into users values(default, :fname, :lname, current_timestamp)";
            return $sql;
        }
    }
}
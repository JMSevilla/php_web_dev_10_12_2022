<?php

include_once "../database/database.php";
include_once "../entity/post.php";

interface IPost {
    public function postData($data);
}

class PostController extends Database implements IPost {
    public function postData($data)
    {
        $queryBuilder = new Entity();
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($this->php_prepare($queryBuilder->postQueryBuilder("insert/user"))){
                $this->php_variables(":fname", $data['fname']);
                $this->php_variables(":lname", $data['lname']);
                if($this->execution()){
                    // Backend back to frontend (RESPONSE)
                    $response = array("status" => "success_insert");
                    echo json_encode($response);
                }
            }
        }
    }
}
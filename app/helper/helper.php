<?php

include_once "../controller/postController.php";

if(isset($_POST['isbool']) == true){
    $data = [
        'fname' => $_POST['firstname'],
        'lname' => $_POST['lastname']
    ];
    $callback = new PostController();
    $callback->postData($data);
}
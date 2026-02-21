<?php
require_once '../App.php';
//using OOP in class request and sessions

//check 
if ($request->check($request->post('submit'))) {   //from class Request check on post = $_post['submit']

    //catch 
    $title  = $request->filter($request->post('title'));

    //valid
    if (empty($title)) {
        $session->SetSession('error', 'Task is required');
        $request->redirect('../index.php');
    } else {
        $q = "INSERT into todos (`title`) Values (:title) ";
        $res = $conn->prepare($q);
        $res->bindParam(":title", $title, PDO::PARAM_STR);
        $output = $res->execute();
        if ($output) {
            $session->SetSession('success', 'Data Inserted');
            $request->redirect('../index.php');
        }
    }
} else {
    $request->redirect('index.php');
}




//valid



//

<?php

require_once '../App.php';

if ($request->check($request->get('status')) && $request->check($request->get('id'))) {
    $id = $request->get('id');
    $status = $request->get('status');

    //valid
    $allowed = ['all', 'doing', 'done'];
    if (!in_array($status, $allowed)) {
        die("Invalid Status");
    }
    
    //select one (id)
    $q = "SELECT * from todos where id = :id";
    $res = $conn->prepare($q);
    $res->bindParam(':id', $id, PDO::PARAM_INT);
    $res->execute();
    if ($res->rowCount() == 1) {
        //update status
        $query = "UPDATE todos set status =:status where id =:id";
        $result = $conn->prepare($query);
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        $result->bindParam(":status", $status, PDO::PARAM_STR);
        $output =  $result->execute();
        if ($output) {
            $session->SetSession('success', "Status Updated");
            $request->redirect('../index.php');
        } else {
            $session->SetSession('error', "Error while Update");
            $request->redirect('../index.php');
        }
    } else {
        $session->SetSession('error', "No data Found");
        $request->redirect('../index.php');
    }
} else {
    $session->SetSession('error', "Error");
    $request->redirect('../index.php');
}

<?php
require_once '../App.php';
if ($request->check($request->get('id'))) {
    $id  = $request->get('id');
     $q = "select * from todos where id=:id ";
    $result = $conn->prepare($q);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();
    $task = $result->fetch(PDO::FETCH_ASSOC);
    if (count($task)>0) {
        $q = " DELETE from todos where id=:id ";
        $res= $conn->prepare($q);
        $res->bindParam(":id",$id, PDO::PARAM_INT);
        $output = $res->execute();
        if ($output) {
            $session->SetSession('success', 'DELETED');
            $request->redirect('../index.php');
        }else {
            $session->SetSession('error', 'Error while deleting');
            $request->redirect('../index.php');

        }
    } 
}else {
    echo "METHOD NOT ALLOWED";
}
<?php
require_once '../App.php';

if ($request->check($request->post('submit')) && $request->check($request->get('id')) ) {
    $id = $request->get('id');
    $title = $request->filter($request->post('title'));

if (empty($title)) {
        $session->SetSession('error', 'Task is required');
        $request->redirect('../index.php');
    } else {
        $q = "UPDATE todos set title = :title where id= :id ";
        $res = $conn->prepare($q);
        $res->bindParam(":id", $id, PDO::PARAM_INT);
        $res->bindParam(":title", $title, PDO::PARAM_STR);
        $output = $res->execute();
        if ($output) {
            $session->SetSession('success', 'Task Updated');
            $request->redirect('../index.php');
        }else {
            $session->SetSession('error', 'Error while Update');
            $request->redirect('../index.php');
        }
    }

}else {
    $request->redirect('../index.php');
}
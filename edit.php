<?php
require_once 'inc/header.php';
require_once 'App.php';

if ($request->check($request->get('id'))) {
    $id = $request->get('id');
    $q = "select * from todos where id=:id ";
    $result = $conn->prepare($q);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();
    $task = $result->fetch(PDO::FETCH_ASSOC);
    if (count($task) > 0) { ?>
        <body class="container w-50 mt-5">
            <?php require_once 'errors/error_success.php' ?>

            <form action="handle/edit.php?id=<?php echo $task['id'] ?>" method="post">
                <textarea type="text" class="form-control" name="title" id="" placeholder="enter your note here"><?php echo $task['title'] ?></textarea>
                <div class="text-center">
                    <button type="submit" name="submit" class="form-control text-white bg-info mt-3 ">Update</button>
                </div>
            </form>
        </body>
<?php  }
} else {
    echo "NOT FOUND";
}
?>


<!-- </html> -->
 <?php
    $error   = $session->GetSession('error');
    $success = $session->GetSession('success');

    if ($error) {
        echo "<div class='alert alert-danger'>$error</div>";
        $session->remove('error');
    }

    if ($success) {
        echo "<div class='alert alert-success'>$success</div>";
        $session->remove('success');
    }
    ?>
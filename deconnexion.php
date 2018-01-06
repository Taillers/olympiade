<?php
    session_start();
    if(isset($_SESSION['Connected']) && $_SESSION['Connected'] == true)
    {
        $_SESSION['Connected'] = false;
        session_destroy();
    }
    header('Location: index.php');
?>
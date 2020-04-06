<?php
    session_start();
    if($_SESSION['utilisateur']) {
        header('Location: admin-homepage.php');
    } else {
        header('Location: login.php');
    }
?>
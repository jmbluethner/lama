<!--
    This file has to be implemented to the beginning of every page.
    It checks rather the client is logged in and has a valid session.
    If thats not the case, the user will be redirected to the login page.
-->

<?php
    function checkSession() {
        if($_SESSION['login'] != "user" && $_SESSION['login'] != "admin") {
            header('Location: login.php');
            die('unauthorized');
        }
    }
?>
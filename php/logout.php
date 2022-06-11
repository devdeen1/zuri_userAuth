<?php
session_start();
if (!isset($_SESSION['user'])) {

    header('location:forms/login.html');

}
function logout(){
    session_unset();
    session_destroy();
    header('location:../forms/login.html');

}
logout();

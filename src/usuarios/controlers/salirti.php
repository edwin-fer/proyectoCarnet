<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start(); 
}
require_once '../models/login.php';

$modelo = new login();

$modelo->salirti();



?>
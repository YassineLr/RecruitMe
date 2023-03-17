<?php

$myObj = new Signup();

// Call the method and store the result in a session variable
session_start();
$_SESSION['myVar'] = $myObj->checkEmail();
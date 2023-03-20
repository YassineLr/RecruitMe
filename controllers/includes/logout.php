<?php 
session_start();
header("location: /RecruitMe/views/client/sign-up-login.php");
session_destroy();

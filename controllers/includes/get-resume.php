<?php 



require_once '../candidat-forms/send-resume.php';
$formSend = new CandidatsResume();

echo $formSend->getUser("14", "email");

?>

<?php

include '../vendor/autoload.php';


class CandidatsResume {
    protected function setResume($form){
      header("location: /RecruitMe/views/client/email-verification.php");

      echo "fwefwefrdgew";
      
      for($x=0;$x<12;$x++){
        print_r($form["pers-input-".$x]);
      }
      
      echo "<pre>";
      print_r($form);
      echo "</pre>";

    }
}


?>
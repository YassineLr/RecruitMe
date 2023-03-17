<?php
class ResumeCntr extends CandidatsResume{

    private $form;
   

     public function __construct($form){// variables we grab from the user 

        $this->form = $form; 

     }
    public function checkResume(){
        print_r("frdgewrrgrv") ;
        
      $this->setResume($this->form);
      // for($x=0;$x<12;$x++){
      //   print_r($form["pers-input-".$x]);
      // }
      
      // echo "<pre>";
      // print_r($form);
      // echo "</pre>";

    }
}

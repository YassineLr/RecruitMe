<?php
    include "db_classes.php";

    class score extends Dbhandler{
        
        public function myScoreExperiencs($id){
            $stmt = $this->connect()->prepare("SELECT COUNT(*) FROM table where id = $id");
            $stmt->execute();
            $eScore = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $eScore;
        }
        public function myScoreLanguages($id){
            $stmt = $this->connect()->prepare("SELECT COUNT(*) FROM table where id = $id");
            $stmt->execute();
            $lScore = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $lScore;
        }
        public function myScoreDiplomes($id){
            $stmt = $this->connect()->prepare("SELECT COUNT(*) FROM table where id = $id");
            $stmt->execute();
            $dScore = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $dScore;
        }

        public function finalScore($eScore,$lScore,$dScore,$sScore){
            return (3* $eScore + 2*$lScore + $dScore + $sScore);
        }
    }
?>
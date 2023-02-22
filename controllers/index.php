<?php
include 'vendor/autoload.php';

$parser = new \Smalot\PdfParser\Parser();

$file = './cv1.pdf';

$pdf = $parser->parseFile($file);

$text = $pdf->getText();
// echo $text;

$pdfText = nl2br($text);

// echo $pdfText;

$string = preg_replace('/\s+/', '', $text);
// echo ($string ."\n\n");
$lowercase_text = strtolower($string);


$comp_word = "compétences";
$edu_word = "education";
$exp_word = "expérience";


$pos_comp = strpos($lowercase_text, $comp_word);
$pos_edu = strpos($lowercase_text, $edu_word);
$pos_exp = strpos($lowercase_text, $exp_word);

if($pos_comp < $pos_edu){
    // COMPETENCES
    $start = $pos_comp;
    $length = $pos_edu - $pos_comp;

}
elseif($pos_exp > $pos_comp){
    // COMPETENCE
    $start = $pos_comp;
    $length = $pos_exp - $pos_comp;
}

$comp_substring = substr($lowercase_text, $start, $length);
echo nl2br("Competence: \n\n". $comp_substring);

function find_pos($pos1,$pos2){
    if($pos1 > $pos2){
        // EDUCATION
        $start = $pos2;
        $length = $pos1 - $pos2;
    }
    elseif($pos2 < $pos1){
        // EDUCATION
        $start = $pos1;
        $length = $pos2 - $pos1;
    }
}


if($pos_comp > $pos_edu){
    // EDUCATION
    $start = $pos_edu;
    $length = $pos_comp - $pos_edu;
}
elseif($pos_edu < $pos_exp){
    // EDUCATION
    $start = $pos_edu;
    $length = $pos_exp - $pos_edu;
}

$edu_substring = substr($lowercase_text, $start, $length);
echo nl2br("\n\nEducation: \n\n". $edu_substring);


if($pos_edu > $pos_exp){
    // EXPERIANCE
    $start = $pos_exp;
    $length = $pos_edu - $pos_exp;
}
elseif($pos_exp < $pos_comp){
    // EXPERIANCE
    $start = $pos_exp;
    $length = $pos_comp - $pos_exp;
}


$exp_substring = substr($lowercase_text, $start, $length);
echo nl2br("\n\nExperience: \n\n". $exp_substring);


// echo $substring;

function find_keywords($string,$keywords) {
    echo nl2br("\n");
    
    for ($x = 0; $x<sizeof($keywords); $x++){
        $count = substr_count($string,$keywords[$x]);
        if($count){
            echo nl2br("\nIl ya ". $count . " " . $keywords[$x]." ");
        }
        else {
            echo nl2br("\nya pas ". $keywords[$x]." ");
        }
        // $pos_keyword = strpos($string, $keywords[$x]);
        // if($pos_keyword==true){
        //     $count++;
        //     echo nl2br("\nIl ya ". $count . " " . $keywords[$x]." ");
        //     $count = 0;
        // }
        // else {
        //     echo nl2br("\nya pas ". $keywords[$x]." ");
        // }
    }
  }


$comp_keywords = array("react", "sql", "python",".net");
$exp_keywords = array("stage");
$edu_keywords = array("baccalauréat", "licence", "master", "doctorat");

find_keywords($exp_substring,$exp_keywords);
find_keywords($comp_substring,$comp_keywords);
find_keywords($edu_substring,$edu_keywords)


?>
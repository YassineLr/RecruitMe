<?php
session_start();
$targetDir = "/Applications/XAMPP/xamppfiles/htdocs/RecruitMe/controllers/uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;

$_SESSION["emailupload"] = $targetFilePath;



// Check for errors
if ($_FILES["file"]["error"] !== UPLOAD_ERR_OK) {
    // Get the error message
    $errorMessage = error_get_last()["message"];
    // Send an error response
    echo json_encode(array("status" => "error", "message" => $errorMessage));
}

include 'vendor/autoload.php';

$parser = new \Smalot\PdfParser\Parser();

$file = $targetFilePath;

$pdf = $parser->parseFile($file);
// echo $file;


$text = $pdf->getText();

$pdfText = nl2br($text);

// $output = shell_exec("/Applications/XAMPP/xamppfiles/htdocs/RecruitMe/controllers/venv/bin/python3.11 /Applications/XAMPP/xamppfiles/htdocs/RecruitMe/controllers/script.py 2>&1");
// echo $output;
// echo $pdfText;

$string = preg_replace('/\s+/', '', $text);
// echo ($string ."\n\n");
$lowercase_text = strtolower($string);

// echo $lowercase_text;


$comp_word = "compétences";
$edu_word = "education";
$exp_word = "expérience";
$lang_word = "langues";


$pos_comp = strpos($lowercase_text, $comp_word);
$pos_edu = strpos($lowercase_text, $edu_word);
$pos_exp = strpos($lowercase_text, $exp_word);
$pos_lang = strpos($lowercase_text, $lang_word);

if ($pos_comp < $pos_edu) {
    // COMPETENCES
    $start = $pos_comp;
    $length = $pos_edu - $pos_comp;
} elseif ($pos_exp > $pos_comp) {
    // COMPETENCE
    $start = $pos_comp;
    $length = $pos_exp - $pos_comp;
}

$comp_substring = substr($lowercase_text, $start, $length);
// echo nl2br("Competence: \n\n". $comp_substring);

function find_pos($pos1, $pos2)
{
    if ($pos1 > $pos2) {
        // EDUCATION
        $start = $pos2;
        $length = $pos1 - $pos2;
    } elseif ($pos2 < $pos1) {
        // EDUCATION
        $start = $pos1;
        $length = $pos2 - $pos1;
    }
}


if ($pos_comp > $pos_edu) {
    // EDUCATION
    $start = $pos_edu;
    $length = $pos_comp - $pos_edu;
} elseif ($pos_edu < $pos_exp) {
    // EDUCATION
    $start = $pos_edu;
    $length = $pos_exp - $pos_edu;
}

$edu_substring = substr($lowercase_text, $start, $length);
// echo nl2br("\n\nEducation: \n\n". $edu_substring);


if ($pos_edu > $pos_exp) {
    // EXPERIANCE
    $start = $pos_exp;
    $length = $pos_edu - $pos_exp;
} elseif ($pos_exp < $pos_comp) {
    // EXPERIANCE
    $start = $pos_exp;
    $length = $pos_comp - $pos_exp;
}


$exp_substring = substr($lowercase_text, $start, $length);
// echo nl2br("\n\nExperience: \n\n". $exp_substring);

if ($pos_lang > $pos_exp) {
    // EXPERIANCE
    $start = $pos_lang;
    $length = $pos_lang - $pos_exp;
} elseif ($pos_lang < $pos_exp) {
    // EXPERIANCE
    $start = $pos_lang;
    $length = $pos_exp - $pos_lang;
}

$lang_substring = substr($lowercase_text, $start, $length);

function find_keywords($string, $keywords)
{
    $arrData = array();
    for ($x = 0; $x < sizeof($keywords); $x++) {
        $count = substr_count($string, $keywords[$x]);
        if ($count) {
            $data = array(
                'keyword' => $keywords[$x],
                'count' => $count
            );

            $arrData[] = $data;
        } else {
            // echo nl2br("\nya pas ". $keywords[$x]." ");
        }
    }
    return $arrData;
}



$comp_keywords = array("react", "sql",
 "python", ".net","data loss prevention",
  "litigation management", "sfdc",
   "intrusion detection", "business development management",
    "business analysis", "outbound calls", "cisa",
     "kpo", "wpf", "sage", "tibco bw", "quality_assurance",
      "chartered accountant inter", "home based", "stakeholder management",
       "obg", "credit policy", "management skills", "hr mis", "pharma operations",
        "selling", "marketing", "development", "asst manager - projects", "fresher",
         "test cases", "inventory control", "growth hacker", "content development",
          "sr._trainer/course_developer", "wise", "warranty", "industrial relations", "hardware",
           "data ware house", "it services","mobile", "c#","data loss prevention", "litigation management",
            "sfdc", "intrusion detection", "business development management", "business analysis", "outbound calls",
             "cisa", "kpo", "wpf", "sage crm", "tibco bw", "quality_assurance", "chartered accountant inter");

$exp_keywords = array("stage", "developpeur");
$edu_keywords = array("baccalauréat", "licence", "master", "doctorat");
$lang_keywords = array("anglais", "francais", "arabe", "espagnol","italie","amazigh", "français");

$comp_return = find_keywords($comp_substring, $comp_keywords);
$exp_return = find_keywords($exp_substring, $exp_keywords);
$edu_return = find_keywords($edu_substring, $edu_keywords);
$lang_return = find_keywords($lang_substring, $lang_keywords);

$arrDataGlobal = array(
    "Comp" => $comp_return,
    "Exp" => $exp_return,
    "Edu" => $edu_return,
    "Lang" => $lang_return
);


echo json_encode($arrDataGlobal);

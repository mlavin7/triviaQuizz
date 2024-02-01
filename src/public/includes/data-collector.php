<?php 
if (session_status() === PHP_SESSION_NONE) {

    session_start();
 }
 


// load help pages

include 'tools.php'; // preetyOrint() load 
include 'db.php'; //connection to data bank $sbConnection work


//if avaliable take the quizz-data of the secion

if(isset($_SESSION["quiz"])) $quiz = $ $_SESSION["quiz"]; 
    else $quiz = null; 

// we read from the index.php the field with the name= lasQuestion Index

if(isset($_POST["lastQuestionIndex"])){
    $lastQuestionIndex = intval($_POST["lastQuestionIndex"]);
}
else{ 
    // -1  means the the quiz should not start
    $lastQuestionIndex = -1 ; 
}





if($quiz === NULL) {
 // we pick the secuense of the qid question  from the data bank
    $questionNm = intval($_POST["questionNm"]);   

   
    $questionIdSequence = fetchQuestionIdSequence(
        $_POST["topic"], 
        $questionNm, 
        $dbConnection); 
}

$quiz =array (

"topic" => $_post["topic"],
"questionNm" => $questionNm,
"lastQuestionIndex" => $lastQuestionIndex,
"currentQuestionIndex" => -1,
"questionIdSecuence" => $questionIdSecuence,


); 
$_SESSION['quiz'] = $quiz;

prettyPrint($quiz, "\$quiz is"); 
prettyPrint($questionIdSequence , "\$questionIdSequence is "); 
echo "<p>\$lastQuestionIndex is $lastQuestionIndex</p>";
echo "<p>\$questionNm is $questionNm</p>";

exit ("ok");


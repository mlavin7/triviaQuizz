<?php 

include 'tools.php'; // preetyOrint() load 
include 'db.php'; //connection to data bank $bConnection work

if (session_status() === PHP_SESSION_NONE) {
session_start();
 }
 
// Abhängig von der aktuellen Hauptseite: Bereite die benötigten Seitendaten vor. 
$scriptName = $_SERVER['SCRIPT_NAME'];   
//index.php (Startseite)-------------------------------------------------------------------- 
if (str_contains($scriptName, 'index')) {     
    // Lösche die Daten aus der Session, inkl. bestehende Daten aus dem Quiz     
    session_unset();      $quiz = null; }  
// question.php (Frageseite)---------------------------------------------------------------- 

if(isset($_SESSION['quiz'])) $quiz = $_SESSION['quiz']; $quiz = null; 



//if avaliable take the quizz-data of the secion


// we read from the index.php the field with the name= lasQuestion Index

if(isset($_POST["lastQuestionIndex"])){
    $lastQuestionIndex = intval($_POST["lastQuestionIndex"]);
}
else{ 
    // -1  means the the quiz should not start
    $lastQuestionIndex = -1 ; 
}

// Abhängig von der aktuellen Hauptseite: Bereite die benötigten Seitendaten vor.
$scriptName = $_SERVER['SCRIPT_NAME'];   //index.php (Startseite)-------------------------------------------------------------------- 
if (str_contains($scriptName, 'index')) {     // Lösche die Daten aus der Session, inkl. bestehende Daten aus dem Quiz     
    session_unset();      
    $quiz = null; }
//index php (start page)

//quetion.php page
else if(str_contains($scriptName, 'question')){

    if($quiz === NULL) {
        // we pick the secuense of the qid question  from the data bank
           $questionNm = intval($_POST["questionNm"]);   
       
          
           $questionIdSequence = fetchQuestionIdSequence(
               $_POST["topic"], 
               $questionNm, 
               $dbConnection); 
          $questionNm = count($questionIdSequence); 

       $quiz =array (
       
       "topic" => $_POST["topic"],
       "questionNm" => $questionNm,
       "lastQuestionIndex" => $lastQuestionIndex,
       "currentQuestionIndex" => -1,
       "questionIdSequence" => $questionIdSequence,
       
       
       ); 
    

       $_SESSION['quiz'] = $quiz;
       
       
       }

    $currentQuestionIndex = $lastQuestionIndex + 1; 

    if ($currentQuestionIndex >= $quiz["questionNm"] -1){
        //jumping to the report page (resport.php)
        $actionUrl= "report.php"; 
    }
    else{

        $actionUrl = "question.php"; 

    }
 
        prettyPrint($quiz, "\$quiz is"); 
prettyPrint($questionIdSequence , "\$questionIdSequence is "); 
echo "<p>\$lastQuestionIndex is $lastQuestionIndex</p>";
echo "<p>\$questionNm is $questionNm</p>";
echo "<p>\$actionUrl is $actionUrl</p>"; 


}

// report.php
else if(str_contains($scriptName, 'report')){

}








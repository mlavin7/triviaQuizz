<?php
  require "./includes/data-collector.php"; 
  include './Components/head.php'; 

// Hole die $id der aktuellen Frage aus $quiz
 if(isset ($quiz["questionIdSequence"])){
  $id = $quiz["questionIdSequence"][$currentQuestionIndex]; //taje acvtual question
  $question =  fetchQuestionById($id, $dbConnection);

};
?>

<body>
<section class="section sectionBanner" id="bannerSection">
<img  class="banner"  src="./assets/img/IndexBanner-jason-leung-Xaanw0s0pMk-unsplash.jpg" alt="banner, blue backgreund with conffeti falling ">
<h1 class="triviaQuizTitle" id="triviaQuizTitle"><?php echo ($topic["topic"]) ?></h1>
<br>
<p class="paragraph" >Question <?php echo ($currentQuestionIndex + 1); ?> from <?php echo $quiz["questionNum"]; ?></p>
<br>
<br>
<p class="paragraph" ><?php echo $question["question_text"]; ?></p>
<br>
</section>


<!-- FORMULAR "Fragestellung" -->
<div class="row" style="padding: 20px;">
 <div class="col-sm-8">
     <!-- Fragestellung -->
     <h7>Frage <?php echo ($currentQuestionIndex + 1); ?> von <?php echo $quiz["questionNum"]; ?></h7>
     <h3><</h3>
     <p>&nbsp;</p>

     <form id="quiz-form" action="<?php echo $actionUrl; ?>" method="post" onsubmit="return navigate('next');">
         <?php 
             // Generiere die Antworten, entweder Radio- oder Checkbox-Buttons.

             /*
                 Vorbereitung für die Verteilung von Antwortpunkten:

                 Zerlege den String mit den richtigen Antworten in ein Array mit id-Strings. 
                 Vermeide Leerschläge in den id-Strings.
             */
             $correct = $question["correct"]; // Zum Beispiel den String "1 , 3"
             $pattern = "/\s*,\s*/"; // RegEx-Suchmuster für die Trennzeichen
             $correctItems = preg_split($pattern, $correct); // https://www.w3schools.com/php/func_regex_preg_split.asp

             // Verwandle die id-Strings in id-Nummern.
             foreach($correctItems as $i => $item) {
                 $correctItems[$i] = intval($item);
             }

             $maxPoints = count($correctItems);

             // Entscheide, ob wir single-choice (radio) oder multiple-choice (checkbox) Antworten benötigen.
             if (count($correctItems) > 1) $multipleChoice = true;
             else $multipleChoice = false; // Bedeutet Single Choice

             for ($a = 1; $a <= 5; $a++) {
                 // Setze für $answerColumnName den Namen der Tabellenspalte "answer-N" zusammen
                 $answerColumnName = "answer_" . $a;

                 // Falls es überhaupt Antworttext in $question[$answerColumnName] gibt
                 // und der Antwortext nicht leer ist, dann ...
                 if (isset($question[$answerColumnName]) && !empty($question[$answerColumnName])) {
                     // ... hole den Antworttext aus $question.
                     $answerText = $question[$answerColumnName];

                     // Entscheide für $value, wieviele Punkte die Anwort ergibt: 
                     // richtig -> 1 Punkt, falsch -> 0 Punkte
                     if (in_array($a, $correctItems, true)) $value = 1; // [1, 3]
                     else $value = 0;

  
//  prinquestionNum it "$question";
                echo "<fieldset class='fieldsetContainer'>" ; // check my css

 if($multipleChoice){
  
         echo "<input type='checkbox'  class='fieldsetQuestionCB' name='multipleChoices' id='$answerColumnName' value ='$value'>
         <label   class='Qlabel fieldsetQuestion' for='$answerColumnName'> $answerText</label>
     " ; 
 } else {


        echo "<input type='radio' class='fieldsetQuestionCB' id='$answerColumnName' name ='singleChoice' value='$value'>
         <label class='Qlabel fieldsetQuestion' for='$answerColumnName'>$answerText</label>";
       
}}; 
    
echo "</fieldset>";
};



?>

<input type="hidden" id="questionNum"  name="questionNum"  value="<?php echo $quiz["questionNum"]; ?>">
<input type="hidden" id="lastQuestionIndex" name="lastQuestionIndex"   value=" <?php echo $currentQuestionIndex;?> ">
<input type="hidden" id="multipleChoice" name= "multipleChoice" value="<?php echo $multipleChoice ? 'true': 'false'; ?>" >
<input type="hidden" id= "maxPoints" name="maxPoints" value=" <?php echo $maxPoints  ?>">
<input type="hidden" id="indexStep" name="indexStep" value="1"  >

    <!-- <fieldset class="fieldsetContainer">
      <input type="checkbox"  class="fieldsetQuestionCB" name="question-1" id="question-1">
      <label class="Qlabel fieldsetQuestion" for="question-2">'Red'</label>   
    </fieldset>
   
    <fieldset class="fieldsetContainer">
    <input type="checkbox"  class="fieldsetQuestionCB" name="question-2" id="question-2">
    <label class="Qlabel fieldsetQuestion" for="question-2">'Red'</label>    
    </fieldset>
    

    <fieldset class="fieldsetContainer">
    <input type="checkbox" class="fieldsetQuestionCB" name="question-3" id="question-3">
    <label class="Qlabel fieldsetQuestion" for="question-3">'Black'</label>    
    </fieldset>

    <fieldset class="fieldsetContainer">
    <input type="checkbox" class=" fieldsetQuestionCB"name="question-4" id="question-4">
    <label class=" Qlabel fieldsetQuestion" for="question-4">'Chuck Norris''s favorite color is all colors'</label>    
    </fieldset>
    

    <fieldset class="fieldsetContainer">
    <input type="checkbox" class="fieldsetQuestionCB" name="question-5" id="question-5">
    <label class="Qlabel fieldsetQuestion" for="question-5">'Chuck Norris''s favorite color is the color of fear</label>    
    </fieldset> -->



  
    <fieldset class="indexFieldsetButton">
<input class="buttonNext" type="submit" value="Next">
</fieldset>
</form>

</section>

</body>
</html>


<?php
    require "./includes/data-collector.php"; 
    include './Components/head.php'; 
  ?>

<body>
<?php


if(isset ($quiz["questionIdSequence"])){
  $id = $quiz["questionIdSequence"][$currentQuestionIndex]; //taje acvtual question

  $question =  fetchQuestionById($id, $dbConnection);



  prettyPrint($question , "questions");


};


// if(isset($quiz["questionIdSequence"])) {
//   $id = $quiz["questionIdSequence"][$currentQuestionIndex]; // take actual question id
//   $question = fetchQuestionById($id, $dbConnection); // Assuming fetchQuestionById() is defined and takes a valid question ID and database connection
//   prettyPrint($question, "questions"); // Assuming prettyPrint() is defined and formats the question output
// }
?>

<input type="radio" name="single-choice" id="answer_1" value="0">
<label for="answer_1"></label>

<section class="section" id="bannerSection">
<img  class="banner"  src="./assets/img/IndexBanner-jason-leung-Xaanw0s0pMk-unsplash.jpg" alt="banner, blue backgreund with conffeti falling ">

 <h2> question<?php echo ($currentQuestionIndex + 1); ?> von <?php echo $quiz["questionNm"]; ?></h2> 
 <h1 class="triviaQuizzQuestion" id="triviaQuizzQuestion"></h1>
<br>

</section>
<section class="section" id="questionSection">
<form action="<?php echo $actionUrl; ?>" id="questionForm formQuestion" name="questionForm" >

<?php 
print_r($question);
$correct = $question['correct'];

for ($i = 1; $i <= 5; $i++){
  $answerColumnName = "answer_".$i;

  if(isset($question[$answerColumnName] )&& $question[$answerColumnName]){

    $answerText = $question[$answerColumnName];


  if ($correct == $answerColumnName)
    $value = 1;else   $value = 0; 

  
 
 echo "<input type='radio' name='single-choice' id='$answerColumnName' value='$value'>
        <label for='$answerColumnName'> $answerText</label>"; 
}}

?>
    

    <fieldset class="fieldsetContainer">
      <input type="checkbox"  class="fieldsetQuestionCB" name="question-1" id="question-1">
      <label class="Qlabel fieldsetQuestion"  for="question-1">Chuck Norris''s favorite color is Chuck Norris'</label>    
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
    </fieldset>



  
    <fieldset class="indexFieldsetButton">
<input class="buttonNext" type="submit" value="Next">
</fieldset>
</form>
</form>
</section>
<section class="section" id="answersSection"> 

</section>
<section class="section" id="buttonsSection">

</section>
</body>
</html>
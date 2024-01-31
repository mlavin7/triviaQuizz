<?php
    require "./includes/data-collector.php"; 
    include './Components/head.php'; 
  ?>

<body>
<section class="section" id="bannerSection">
<img  class="banner"  src="./assets/img/IndexBanner-jason-leung-Xaanw0s0pMk-unsplash.jpg" alt="banner, blue backgreund with conffeti falling ">
<h1 class="triviaQuizzQuestion" id="triviaQuizzQuestion">What is Chuck Norris''s favorite color?</h1>
<br>

</section>
<section class="section" id="questionSection">
<form action="" id="questionForm" name="questionForm" >
    

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

 <?php
  include './Components/head.php'
  ?>

<body>
  
<section class="section sectionBanner" id="bannerSection">
<img  class="banner"  src="./assets/img/IndexBanner-jason-leung-Xaanw0s0pMk-unsplash.jpg" alt="banner, blue backgreund with conffeti falling ">
<h1 class="triviaQuizTitle" id="triviaQuizTitle">Trivia quiz</h1>
<br>
<p class="paragraph" >Please Select the Category</p>
<br>
</section>
<section class="section sectionInstructions" id="sectionInstruction">

<form method="POST" action="question.php" class="formIndex" name="formTopic"  >
 


<fieldset class=" indexFieldset ">


<label for="topic" class="form-label labelFormIndex">Categories</label>
<!-- <label class="labelFormIndex" for="topic">Categories</label> -->


<!-- <select  class="form-select" aria-label="Default select example" id="topic" name="topic"> -->
<select class="selectCategories form-select" id="topic" name="topic">
    <option value="cinema">cinema</option>
    <option value="tech">tech</option>
    <option value="tierwelt">tierwelt</option>
    <option value="animals">animals</option>
    <option value="ch-norris">ch-norris</option>
    <option value="tiere">tiere</option>
    <option value="geography">geography</option>
    <option value="astronomy">astronomy</option>
    <option value="history">history</option>
    <option value="werkzeuge">werkzeuge</option>
<!-- 
    cinema','tech','tierwelt','animals','ch-norris','tiere','geography','astronomy','history','werkzeuge'
    -->
  </select>
  <br>
  <br>

</fieldset>

<fieldset class=" fieldsetContainerIndex">
  <label for="questionNm" class="labelFormIndex"  >Number of questions</label>
  <input type="number" name="questionNm"  id="questionNm" min="5" max="40" value="10" >

</fieldset>

  <!-- mit php gestelt -->
  <input type="hidden" id="lastQuestionIndex" name="lastQuestionIndex" value="-1">
  <!-- mit JS validate -->
  <input type="hidden" id="indexStop" name="indexStop" value="1">
  <!-- validation warning -->
  <p id="validacionWarning" class="warning" ></p>

<fieldset class="indexFieldsetButton">

<input class="buttonNext" type="submit" value="Start">

</fieldset>
</form>

</section>




    <!-- <?php
    // echo "<h1>Hello, we are starting to work with Databases and PHP PDO!</h1>";
    // // phpinfo();
    // // echo get_include_path();
    // include dirname(__DIR__) . '/utils/db.php';
    ?> -->
</body>

</html>
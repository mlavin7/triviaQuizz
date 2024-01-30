
 <?php
  include './Components/head.php'
  ?>

<body>
  
<section class="section sectionBanner" id="sectionQuizzTitle">
<img  class="banner"  src="./assets/img/IndexBanner-jason-leung-Xaanw0s0pMk-unsplash.jpg" alt="banner, blue backgreund with conffeti falling ">
<h1 class="triviaQuizzTitle" id="triviaQuizzTitle">Trivia quizz</h1>
<br>
<p>Please Select the Category</p>
<br>
</section>
<section class="section sectionInstructions" id="sectionInstruction">
<form action="./Question.php">
  <fieldset class=" indexFieldset">
  <label class="labelFormIndex" for="categories">Categories</label>
  </fieldset >
  <fieldset class=" indexFieldset">
  <select name="selectCategories" id="categories">
    <option value="astronomy">astronomy</option>
    <option value="music">music</option>
    <option value="ch-norris">ch-norris</option>
    <option value="movies">movies</option>
    <option value="etc..">etc..</option>
    
  </select>
</fieldset>
<fieldset class="indexFieldsetButton">
<input class="buttonNext" type="submit" value="Next">
</fieldset>
</form>

</section>
<section class="section sectionFormularCategories" id="sectionSelectCatergories">


</section>
<section class="section " id="sectionButtonIndex">


</section>
    <!-- <?php
    // echo "<h1>Hello, we are starting to work with Databases and PHP PDO!</h1>";
    // // phpinfo();
    // // echo get_include_path();
    // include dirname(__DIR__) . '/utils/db.php';
    ?> -->
</body>

</html>
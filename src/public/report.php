<?php

 require './includes/data-collector.php';
 include './Components/head.php'; 
 
  ?>

<body>

<?php 
  $totalPoints = 0;
  $maxTotalPoints = 0;

foreach($_SESSION as $questionKey => $data) {
  
 
    if (str_contains($questionKey, 'question-')) {
        if ($data["multipleChoice"] === 'true'){
            foreach ($data as $key => $value) {
                if (str_contains($key, 'multipleChoices')) {
                  $points = intval($value);
                  $totalPoints = $totalPoints + $points; // Kurzform: $totalPoints += $points;
              }}
      
    }
    else if ($data['multipleChoice'] === 'false') {
        $points = intval($data['singleChoice']);
        $totalPoints = $totalPoints + $points;
      
    }

    $maxTotalPoints = $maxTotalPoints + intval($data["maxPoints"]); 
  } 
}

$percent = $totalPoints / $maxTotalPoints;

if( $percent < 0.4) {
  $feedback = "Upps try again";}
else if( $percent < 0.6) { 
  $feedback ="not bad";
}
else{
  $feedback = "well done!";
}
;

?>


  
<section class="section sectionBanner" id="bannerSection">
<img  class="banner"  src="./assets/img/IndexBanner-jason-leung-Xaanw0s0pMk-unsplash.jpg" alt="banner, blue backgreund with conffeti falling ">
<h1 class="triviaQuizTitle" id="triviaQuizTitle"><?php echo $quiz["topic"] ?></h1>
<br>
<p style="font-size: x-large;" class="paragraph" >your results</p>
<br>
</section>
<section class="section sectionInstructions" id="sectionInstruction">

<h2 style="width: 100vw; padding:1vw; text-alighn: center;" > You achieved <?php echo $totalPoints ;  ?> out of <?php echo $maxTotalPoints ?> points </h1>
<h2> <?php echo $feedback ?> </p>







<div class="indexFieldsetButton">

<a href="index.php">
<button class="buttonNext" onClick =" <?php session_destroy(); $quiz = NULL; ?>">Back</button>
</a>

</div>
</section>
</body>
</html>
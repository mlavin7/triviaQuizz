<?php

 require './includes/data-collector.php';
 include './Components/head.php'; 
 
  ?>

<body>

<?php 
  $totalPoints = 0;
  $maxTotalPoints = 0;

foreach($_SESSION as $questionKey => $data) {
  
  if (str_contains($questionKey,'question-')) { // "question-0" etc.
    if ($data['multipleChoice'] === 'true') {
      foreach ($data as $key => $value) {
        $points = intval($value );
        $totalPoints = $totalPoints + $points;
        echo " multiple choice true read till here";

        
      }
    }
    else if ($data['multipleChoice'] === 'false') {
        $points = intval($data['singleChoice']);
        $totalPoints = $totalPoints + $points;
        echo " multiple choice false read till here";
    }

    $maxTotalPoints = $maxTotalPoints + intval($data["maxPoints"]); 
  } 
}

$percent = $totalPoints / $maxTotalPoints;

if( $percent > 0.4) {
  $feedback = "Upps try again";}
else if( $percent > 0.6) { 
  $feedback =" not bad";
}
else{
  $feedback = " well done!";
}



prettyPrint($_SESSION ,  "\$_SESSION ");

?>
<h3> You achieved <?php echo $totalPoints ;  ?> out of <?php echo $maxTotalPoints ?> points </h3>
<h3> <?php echo $feedback ?> </h3>














    <section class="section" id="sectionBannerReport"></section>
    <section class="section" id="SectionReport"></section>
    <section class="section" id="SectionBackButton"></section>
    
</body>
</html>
<?php


if (session_status() === PHP_SESSION_NONE) {

   session_start();
}

$db_host = getenv("DB_HOST");
$db_name = getenv("DB_NAME");
$db_user = getenv("DB_USER");
$db_pass = getenv("DB_PASSWORD");

// here I create the connection

try {
   $dbConnection = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
   $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   echo "Connected successfully";
} catch (PDOException $e) {
   echo $e->getMessage();
}; 

// here I create the table if do not exist
try {
    
    $sqlCreateQuizzTable = "CREATE TABLE IF NOT EXISTS `quizz` (
    `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `topic` varchar(122) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `question_text` varchar(260) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `answer-1` varchar(260) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `answer-2` varchar(260) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
     `answer-3` varchar(260) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
     `answer-4` varchar(260) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `answer-5` varchar(260) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `correct` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL
      )";
 
 $dbConnection->exec($sqlCreateQuizzTable); 

} catch (PDOException $e) {
   echo $e->getMessage();}



// here I instert data in to the table. 
try {  
    $sql = "INSERT INTO `quizz` 
    (`id`, `topic`, `question_text`, `answer-1`, `answer-2`, `answer-3`,`answer-4`,`answer-5`, `correct`)
    VALUES
    (1, 'ch-norris', 'How many push-ups can Chuck Norris do?', '100', 'Chuck Norris doesn''t do push-ups, he pushes the world down', 'None, the Earth pushes down for him', '500', 'Chuck Norris once did a push-up and caused an earthquake', '2,3,5'),
    (2, 'ch-norris', 'What does Chuck Norris eat for breakfast?', 'Chuck Norris doesn''t eat breakfast, breakfast eats what Chuck Norris eats', 'Pancakes', 'Cereal', 'Nails Chuck Norris eats nails for breakfast... without any milk.', 'Eggs, bacon and a side of justice', '1,4,5'),
    (3, 'ch-norris', 'How does Chuck Norris celebrate his birthday?', 'Chuck Norris doesn''t celebrate birthdays, birthdays celebrate Chuck Norris', 'With a cake', 'With a party', 'With friends', 'With a quiet dinner...', '1'),
    (4, 'ch-norris', 'What happens when Chuck Norris enters a room?', 'Chuck Norris doesn''t enter a room, the room makes way for Chuck Norris', 'People greet him', 'The room brightens up', 'Time stops', 'Chairs become uncomfortable, because they know Chuck Norris can break them with a glare', '1,3'),
    (5, 'ch-norris', 'Why did Chuck Norris become an actor?', 'Chuck Norris didn''t become an actor, acting became Chuck Norris', 'To showcase his talents', 'To entertain audiences', 'To challenge himself', 'Because Chuck Norris can do anything', '1'),
    (6, 'ch-norris', 'How does Chuck Norris cut his hair?', 'Chuck Norris''s hair doesn''t need cutting, it''s naturally perfect', 'With scissors', 'With a chainsaw', 'He doesn''t need to, his hair stays perfect', 'Chuck Norris''s hair cuts itself out of fear.', '5'),
    (7, 'ch-norris', 'What does Chuck Norris do in his free time?', 'Chuck Norris doesn''t have free time, time has Chuck Norris', 'Read books', 'Practice martial arts', 'Relax', 'Chuck Norris doesn''t have free time, he has victory time.', '1,5'),
    (8, 'ch-norris', 'What is Chuck Norris''s favorite color?', 'Chuck Norris''s favorite color is Chuck Norris', 'Red', 'Black', 'Chuck Norris''s favorite color is all colors', 'Chuck Norris''s favorite color is the color of fear.', '1,5'),
    (9, 'ch-norris', 'How does Chuck Norris win arguments?', 'Chuck Norris doesn''t argue, he just wins', 'With logic', 'With persuasion', 'By being right', 'Chuck Norris didn''t win arguments, arguments became Chuck Norris.', '1,5'),
    (10, 'ch-norris', 'What is Chuck Norris''s favorite hobby?', 'Chuck Norris doesn''t have hobbies, hobbies have Chuck Norris', 'Painting', 'Fishing', 'Roundhouse kicking', 'Chuck Norris''s favorite hobby is being Chuck Norris.', '1,5'),
    (11, 'ch-norris', 'How does Chuck Norris drink his coffee?', 'Chuck Norris doesn''t need coffee, coffee needs Chuck Norris', 'With cream and sugar', 'With a straw', 'Chuck Norris doesn''t drink coffee, he drinks victory', 'Chuck Norris drinks coffee by staring at the cup until it surrenders its caffeine.', '1,4,5'),
    (12, 'ch-norris', 'What does Chuck Norris do before going to bed?', 'wash his theeth', 'Read a book', 'Meditate', 'Chuck Norris doesn''t sleep, he waits', 'Chuck Norris doesn''t need to prepare for bed, bed prepares for Chuck Norris.', '4,5'),
    (13, 'ch-norris', 'How does Chuck Norris handle stress?',  'Deep breathing', 'Chuck Norris uses stress as a training tool', 'Yoga', 'Chuck Norris doesn''t get stressed', 'Chuck Norris handles stress by roundhouse kicking it into oblivion.', '2,5'),
    (14, 'ch-norris', 'What does Chuck Norris do when he''s sick?', 'Chuck Norris''s immune system fights illness', 'Take medicine', 'Power through it', 'Chuck Norris doesn''t get sick', 'Chuck Norris sickens the sickness.', '5'),
    (15, 'ch-norris', 'What does Chuck Norris say to fear?', 'Chuck Norris doesn''t say anything to fear, fear says sorry to Chuck Norris', 'I''m scared', 'I''ll face you', 'Fear who?', 'Chuck Norris whispers, Fear is just a four-letter word', '1,5');
     "; 
  
   $dbConnection->exec($sql); 

} catch (PDOException $e) {
    echo $e->getMessage();
 }


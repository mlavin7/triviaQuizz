<?php


$db_host = getenv("DB_HOST");
$db_name = getenv("DB_NAME");
$db_user = getenv("DB_USER");
$db_pass = getenv("DB_PASSWORD");

try {
    $dbConnection = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
 } catch (PDOException $e) {
    echo $e->getMessage();
 }; 


try{
    $query ='SELECT * ';

    $data =[
    ':id' =>`id`,
    ':topic' =>`topic` ,
    ':question_text' => `question_text` ,
    ':answer-1' =>`answer-1` ,
    ':answer-2' => `answer-2`  ,
    ':answer-3' => `answer-3` ,
    ':answer-4' => `answer-4`  ,
    ':answer-5' => `answer-5`  ,
    ':correct' => `correct`,
    ];  



}catch (PDOException $e) {
    echo $e->getMessage();
 }; 
 
// work this tomorrow ________v
try{

    // überprüfe, ob Abfrage vorhanden ist
    if($queryString == ''){
        throw new \Exception('keine Abfrage in $queryString vorhanden');
    }

    // bereite die Abfrage vor
    $query = $dbConnection->prepare($queryString);

    // füge Daten für Platzhalter ein, falls vorhanden
    $query->execute($data);

    // überprüfe, ob Daten zurück gegeben werden
    if($query->rowCount() == 0) {
        throw new \Exception('Deine Abfrage gibt keine Daten zurück');
    }

    // alle Daten werden aus der DB geholt und in einem assoziativen Array gespeichert
    $quizz = $query->fetchAll(PDO::FETCH_ASSOC);

    

} catch (PDOException $e) {
    die("Fehler: " . $e->getMessage());
}

catch (\Exception $e) {
    die("Fehler: " . $e->getMessage());
}

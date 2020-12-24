<?php
require_once "vadersentiment.php";

$textToTest = "VADER is smart, handsome, and funny.";

$sentimenter = new SentimentIntensityAnalyzer ();
$result = $sentimenter->getSentiment ( $textToTest );

print_r ( $result['compound'] );

?>
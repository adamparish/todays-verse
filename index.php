<?php

// http://www.esvapi.org/v2/rest/dailyVerse?key=IP&include-audio-link=false&include-short-copyright=false&output-format=plain-text&include-passage-horizontal-lines=false&include-verse-numbers=false

  $key = "IP";
  $passage = urlencode("john 3:16");
  $options = "include-passage-references=false";
  $url = "http://www.esvapi.org/v2/rest/dailyverse?key=$key&$options";
  $ch = curl_init($url); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  $response = curl_exec($ch);
  curl_close($ch);
  print $response;
?>
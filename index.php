<?php

  $key = "IP";
  $options = "include-audio-link=false&";
  $options .= "include-short-copyright=false&";
  $options .= "output-format=plain-text&";
  $options .= "include-passage-horizontal-lines=false&";
  $options .= "include-verse-numbers=false&";
  $options .= "include-short-copyright=false&";
  $options .= "output-format=plain-text&";
  $options .= "include-footnotes=false";
  $url = "http://www.esvapi.org/v2/rest/dailyVerse?key=$key&$options";
  $ch = curl_init($url); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  $response = curl_exec($ch);
  curl_close($ch);
  print $response;
  
?>
<?php

header('Content-Type: application/json');

ob_start();

$json = file_get_contents('php://input'); 
$request = json_decode($json, true);
$action = $request["result"]["action"];
$parameters = $request["result"]["parameters"];
$output["contextOut"] = array(array("name" => "$next-context", "parameters" =>
array("param1" => $param1value, "param2" => $param2value)));

$key = "IP";
$options = "include-audio-link=false&";
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
  
#Remove double quotes from ESV response
$response = str_replace('"', '', $response);

#Remove returns and line breaks
$response = preg_replace( "/\r|\n/", "", $response );
$speech_response = mb_convert_encoding($response, "EUC-JP", "auto");
$bible_source = "ESV Bible Gateway";
$output["speech"] = $speech_response;
$output["displayText"] = $response;
$output["source"] = $bible_source;

ob_end_clean();
echo json_encode($output);
   
?>
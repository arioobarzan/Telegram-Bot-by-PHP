<?php


/***********************************************************************************/
set_time_limit(0);

$url = 'FILE_URL';

$data = getfile($url);

$destination = "FILE_PATH";
$file = fopen($destination, "w+");
fputs($file, $data);
fclose($file);

$api_key = 'BOT_API';
$chat_id = 'CHAT_ID';
$url = "https://api.telegram.org/bot".$api_key."/";
$bot_url    = $url ;
$url        = $bot_url . "sendDocument?chat_id=" . $chat_id ;
$name = "FILE_NAME";
$post_fields = array('chat_id'   => $chat_id,
	'document'     => "@/home/FULL_PATH".$name,
	'caption' => $name
);

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	"Content-Type:multipart/form-data"
));
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields); 
$output = curl_exec($ch);


/***********************************************************************************/


die();
function getfile($url) {
    $headers[] = 'Accept:';              
    $headers[] = 'Connection: Keep-Alive';         
    $headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';         
    $user_agent = 'php';         
    $process = curl_init($url);         
    curl_setopt($process, CURLOPT_HTTPHEADER, $headers);         
    curl_setopt($process, CURLOPT_HEADER, 0);         
    curl_setopt($process, CURLOPT_USERAGENT, $user_agent); //check here         
    curl_setopt($process, CURLOPT_TIMEOUT, 30);         
    curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);         
    curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);         
    $return = curl_exec($process);         
    curl_close($process);         
    return $return;     
} 
?>
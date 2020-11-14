<html>

<?php

$serveur = gethostbyaddr($REMOTE_ADDR);
$list = split('\.', $serveur);
$element = count($list);
$domaine = $element-2;
$long = strlen($list[$domaine]);

if ($long < 3) {
$domaine = $element - 3;
$var1 = $element - 2;
$var2 = $element - 1;
$fai = 'www.'.$list[$domaine].'.'.$list[$var1].'.'.$list[$var2];
$fai = '['.$fai.']';
if ($list[$var2] > 0) {
$fai ='[NA]';
}
}
else {
$var = $element - 1;
$fai = 'www.'.$list[$domaine].'.'.$list[$var];
$fai = '['.$fai.']';
if ($list[$var] > 0) {
$fai ='[NA]';
}
}


if ($NomFichierLog == '') { $NomFichierLog = 'log' ; }
$tdate=getdate();
$jourx = $tdate["year"] . ".". sprintf("%02.2d",$tdate["mon"]) . "." . sprintf("%02.2d",$tdate["mday"]) ;
$NomFichierLog = $NomFichierLog . $jourx . ".txt";

$ip = $REMOTE_ADDR;
$hostname = gethostbyaddr($REMOTE_ADDR);
if ($hostname == $ip) {
$ipsay = $ip; }
else {
$ipsay = $hostname ." [". $ip ."]"; }


if ($HTTP_REFERER != '') {
$ipsay = $ipsay . " - Lien: " . $HTTP_REFERER;
}

$fichier2 = fopen($NomFichierLog, "a");


$jour=sprintf("%02.2d",$tdate["mday"]) ."/". sprintf("%02.2d",$tdate["mon"]) ."/". $tdate["year"];
$heure=sprintf("%02.2d",$tdate["hours"]) ."h". sprintf("%02.2d",$tdate["minutes"]);
$d="[".$jour." à ".$heure."] ";
fwrite($fichier2,$d.$ipsay." ".$fai." ". $REQUEST_URI ." ". $HTTP_USER_AGENT." ". $nickname."
");
fclose($fichier2);
?>

<html>

<?php

// Заглушка sendmail
// http://urths.com/blog/заглушка-sendmail/

$MailDir = 'D:/Progr/WebAMP/logs/mail'; // папка для сохранения писем

$data = '';
$line = ' ';

$f = fopen("php://stdin", "r");
while( !feof($f) AND ($line!='') ) {
	$line = fgets($f,255);
	$data .= $line;
}
fclose($f);

$data = str_replace("\r", '', $data);
$data = str_replace("\n", "\r\n", $data);

$i = 0;
$addon = '';
while ( file_exists( $fname = ($MailDir.'/'.date('Y-m-d-H-i-s').$addon.'.eml') )) {
	$i++;
	$addon = '-'.$i;
}

file_put_contents($fname, $data);

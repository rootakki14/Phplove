<?php
#header('Content-type: text/plain');

$open = fopen("sites.txt", "r");
#$a =fread($open,filesize("sites.txt"));

$a=file("sites.txt");


#print_r($a);
#for($i=0;$i<50;$i++){

foreach ($a as $value){
	ini_set('max_execution_time', 300);

	$newsession = curl_init();

	curl_setopt($newsession,CURLOPT_URL,trim($value));
	curl_setopt($newsession,CURLOPT_RETURNTRANSFER, true);
	curl_setopt($newsession,CURLOPT_HEADER, false);
	curl_setopt($newsession,CURLOPT_TIMEOUT, 1000);
	$done = curl_exec($newsession);
	#echo $done;


	


	if($done){
$Statuscode = curl_getinfo($newsession, CURLINFO_HTTP_CODE);  

 if($Statuscode==200){
	echo "exist";
	echo "<br>";
		}/*else
		{
			echo " not exist";
		}*/
	/*}*/else
	{
		echo 'error: ' . curl_error($newsession);
	}
}

	curl_close($newsession);
}



fclose($open);
?>
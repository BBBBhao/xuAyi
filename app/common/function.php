<?php  
	function randStr($len){ 
	$chars='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz'; // characters to build the password from 
	$string=''; 
	for(;$len>=1;$len--) 
	{ 
	$position=rand()%strlen($chars); 
	$string.=substr($chars,$position,1); 
	} 
	return $string; 
	}
?>
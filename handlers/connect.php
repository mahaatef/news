<?php
define("SERVERNAME",'localhost');
define("USER",'root');
define("PASSWORD",'');
define("DBNAME",'news');

$conn=mysqli_connect(SERVERNAME,USER,PASSWORD,DBNAME);
if(!$conn){
	echo "not connected";
}else{
//	echo"Connected";
}

?>

<?php

$data = array(
'2d6383e1719089d96c28047633dc530195de2a75pass'	=> '7b5b46e112b27931716a62ea0e046829174e6390',
'2d6383e1719089d96c28047633dc530195de2a75salt'	=> 'qeUD^QIcCft3%pOz1k~h0qqrW*nYWp7|9o~OF_+5h7LNAp461YyBz3wanygv'
);
$password = hash('ripemd160', $_POST["passwd"]);
$email = $_POST["email"];

$email = hash("ripemd160",$email);

$dbpassword = $data[$email."pass"];
$dbsalt = $data[$email."salt"];
$dbhash  = hash('ripemd160', $dbpassword.$dbsalt);
$localhash = hash('ripemd160', $password.$dbsalt);
if ($dbhash == $localhash){
session_start();
$_SESSION['email']= $email;
$_SESSION['passwd']= $password;
header("Location: hidden-page.php");
}else{
echo "<h1>access denied</h1>";
}

?>
<?php

$data = array(
'2d6383e1719089d96c28047633dc530195de2a75pass'	=> '8a94efafd9440072c5f297133a0b71dcd5826d90',
'2d6383e1719089d96c28047633dc530195de2a75salt'	=> '~O41P1DZuaKi^UE-qFZt530OK5Mrr+SGYF_etMGl^4LbQhPJQfMdh7nlhsbD

'
);

$password = $_POST["passwd"];
$email = hash('ripemd160', $_POST["email"]);

$password = hash('ripemd160', ($password.$data[$email."salt"]));

$datapass = $data[$email."pass"];

if ($datapass == $password){
session_start();
$_SESSION['email']= $email;
$_SESSION['passwd']= $password;
header("Location: hidden-page.php");
}else{
echo "<h1>access denied</h1>";
}

?>

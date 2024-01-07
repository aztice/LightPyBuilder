<?php
include 'config.php';
$data=$_POST['data'];
$api=api().'?codes='.$data;
if($data==''){
    echo "WARNING: Build ERROR!";
    return;
}
else if(strlen($data)>1000){
    echo "WARNING: TOO MANY DATA,PLEASE REDUCE YOUR DATA!";
    return;
}
$curl = curl_init();

$data = array('codes' => $data);

curl_setopt($curl, CURLOPT_URL, api());
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$id = curl_exec($curl);

curl_close($curl);
header('Location: result.php?id='.$id);

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
$id=file_get_contents($api);
header('Location: result.php?id='.$id);

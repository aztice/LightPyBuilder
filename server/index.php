<?php
if (!is_dir('./files/')) {
    // If File is not exists->mkdir
    mkdir('./files/', 0755, true);
}
$codes=$_GET['codes']; // get the source codes
$mt=mt_rand(0,10000000); // Random Number for saving a python file
$f='./files/'.$mt.'py';
file_put_contents($f,$codes); // Save the codes to a python file
$command = 'start /B cmd /C "pyinstaller '.$f.' --onefile > '.$mt.'.log 2>&1"'; // make commands
exec($command); // Build
echo $mt; // return the ID of file

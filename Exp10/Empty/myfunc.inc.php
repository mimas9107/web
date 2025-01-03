<?php
function loadModule($filename, $config=null)
{
    include $filename;
    return ;
}

function loadConfig(){
$file=fopen("site.conf.php","r");
if($file){ 
    // fwrite($file, json_encode($config));
    $myconfig=json_decode(fread($file, filesize("site.conf.php")), false);
    // print_r($config);
}
fclose($file);
return $myconfig;
}

?>
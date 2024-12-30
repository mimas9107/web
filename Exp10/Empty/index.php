<!DOCTYPE html>
<html>
<?php
// $config=array("title"=>"Default Page:","template"=>"bootstrap");
// $file=fopen("site.conf.php","w");
// if($file){ 
//     fwrite($file, json_encode($config));
// }
// fclose($file);

$config=array("title"=>"Default Page:","template"=>"bootstrap");
$file=fopen("site.conf.php","r");
if($file){ 
    // fwrite($file, json_encode($config));
    $config=json_decode(fread($file, filesize("site.conf.php")), false);
}
fclose($file);



include "html-head.inc.php";
include "html-body-bootstrap.inc.php";
include "html-ending.inc.php";

?>
</html>
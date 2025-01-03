<!DOCTYPE html>
<html>
<?php

// include "myfunc.inc.php";
require __DIR__ . '/vendor/autoload.php';


// 這裡是處理產生設定檔:
// $config=array("title"=>"Default Page:","template"=>"bootstrap");
// $file=fopen("site.conf.php","w");
// if($file){ 
//     fwsrite($file, json_encode($config));
// }
// fclose($file);
// $config=array("title"=>"Default Page:","template"=>"bootstrap");
$myconfig=loadConfig();

// include "html-head.inc.php";
loadModule("html-head.inc.php", $myconfig);

// include "html-body-bootstrap.inc.php";
if($myconfig->template=="bootstrap")
    // include "html-body-bootstrap.inc.php";
    echo loadModule("html-body-bootstrap.inc.php", $myconfig);
else
    // include "html-body-flatui.inc.php";
    echo loadModule("html-body-flatui.inc.php", $myconfig);
// include "html-ending.inc.php";
echo loadModule("html-ending.inc.php");

?>
</html>
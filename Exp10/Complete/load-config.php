<?php
function loadDefault() {
    $confFile = fopen("site.conf.php", "r");
    if($confFile)
    {
      $conf = json_decode( fread($confFile, filesize("site.conf.php")) );
    }
    fclose($confFile);
    
    return $conf;
}

function loadHTMLSegment($filename, $conf=null) {
    include $filename;
    return ;
}
?>
<?php
// phpinfo();
$endl="<br/>";
echo "<h2>PHP is fun!</h2>".$endl;
print "php 真有趣!".$endl;
print "<a href=\"https://www.epochconverter.com/\">我是超連結，我是超連結，我是超連結</a>".$endl;

// 單引號與雙引號有差別:
$name="justin";
echo '名字是: $name'.$endl;
echo "名字是: $name".$endl;

echo $endl;

function container($obj){
    return "<div><h3>".$obj."</h3></div>";
}

print "<div>"."來點99乘法:"."</div>".$endl;
for($x=1; $x<10; $x++){
    for($y=1; $y<10; $y++){
        // echo "$x x $y=".$x*$y;
        printf("%2d x %2d = %4d",$x,$y,$x*$y);
        // echo ", ";
    }
    echo $endl;
}
echo $endl;

print "<div>"."來點function:"."</div>".$endl;
function C2F($C){
    //攝氏轉華氏
    return 9.0*$C/5.0+32.0;
}
function F2C($F){
    //華氏轉攝氏
    return 5.0*($F-32.0)/9.0;
}
$degC=20;
$degF=90;
echo container("攝氏: ".$degC."°C= ".C2F($degC)."°F".$endl);
echo "華氏: ".$degF."°F= ".F2C($degF)."°C".$endl;

echo container(strpos("hello world", "lo"));

print container("來點 Array 排序").$endl;
$L=array("1","5","3","7","2","9");
print_r($L);
sort($L);
print_r($L);

print container("來點 檔案讀寫!!").$endl;
$file=fopen("testphp.txt","w");
if($file){
    fwrite($file, "Hello PHP open file write something.".PHP_EOL);
    fwrite($file, "php is fun fun fun"."\n");
    echo "寫完了".$endl;
}
fclose($file);
$file=fopen("testphp.txt","r");
if($file){
    $buf=fread($file, filesize("testphp.txt"));
    echo "讀出來了: ".$endl;
    echo container($buf).$endl;
}
fclose($file);


print container("來點 Filesystem info!!").$endl;
$path="htdocs/phptutorial/index.php";
$parts=pathinfo($path);

print_r($parts);

$filename="testphp.txt";
if(file_exists($filename)){
    echo container($filename."存在!").$endl;
}

print container("來點 json!!").$endl;

$config=array("author"=>"justin", "version"=>"2");
$file=fopen("test.json.txt","w");
if($file){
    fwrite($file,json_encode($config));
    echo "json寫完了".$endl;
}
fclose($file);

$file=fopen("test.json.txt","r");
if($file){
    $myconfig=json_decode(fread($file, filesize("test.json.txt")), false);
    echo "json讀出來:".$endl;
    echo "author: ".$myconfig->author."| version: ".$myconfig->version.$endl;
}

fclose($file);


?>

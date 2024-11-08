let i=0;
// 計數器工人: 
function timedCount(){
    i++;
    if(i%3==0){
        postMessage(i+"\\");
    } else if(i%3==1){
        postMessage(i+"|");
    } else{
        postMessage(i+"/");
    }
    setTimeout("timedCount()",500);
}
timedCount();

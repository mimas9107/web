$(document).ready(function(){
    $("#diffBtn").click(function(){
        //let bgDateStr = document.getElementById('beginDate').value;
        let bgDateStr=$('#beginDate').val();
        let bgDate=new Date(bgDateStr);

        let edDateStr=$('#endDate').val();
        let edDate=new Date(edDateStr);
        
        let totalDays = (edDate-bgDate)/1000/60/60/24;
        let myYear = parseInt(totalDays/365);
        let myMonth = parseInt((totalDays - myYear*365)/30);
        let myDay = (totalDays - myYear*365)%30;

        //document.querySelectorAll('#myYear')[0].value = myYear ;
        $('#myYear').val(myYear);
        //document.querySelectorAll('#myMonth')[0].value = myMonth ;
        $('#myMonth').val(myMonth);
        //document.querySelectorAll('#myDay')[0].value = myDay ;
        $('#myDay').val(myDay);

    });

    $("#calcBtn").click(function(){
        //let bgDateStr = document.getElementById('beginDate').value;
        let bgDateStr = $('#beginDate').val();
        //console.log(bgDateStr);
        //let edDate = new Date(bgDateStr);
        let edDate=new Date(bgDateStr)

        // let addDays = parseInt(document.querySelectorAll('#myYear')[0].value)*365 + 
        //             parseInt(document.querySelectorAll('#myMonth')[0].value)*30 +
        //             parseInt(document.querySelectorAll('#myDay')[0].value);
        let addDays = parseInt($('#myYear').val())*365+
                        parseInt($('#myMonth').val())*30+
                        parseInt($('#myDay').val());

        edDate.setDate(edDate.getDate() + addDays);

        // document.querySelectorAll('#endDate')[0].value = edDate.toLocaleDateString('en-CA');
        $('#endDate').val(edDate.toLocaleDateString('en-CA'));

    });
});

/*
function dateDiff() {
    let bgDateStr = document.getElementById('beginDate').value;
    console.log(bgDateStr);
    let bgDate = new Date(bgDateStr);

    let edDateStr = document.querySelectorAll('#endDate')[0].value;
    console.log(edDateStr);
    let edDate = new Date(edDateStr);

    let totalDays = (edDate-bgDate)/1000/60/60/24;
    let myYear = parseInt(totalDays/365);
    let myMonth = parseInt((totalDays - myYear*365)/30);
    let myDay = (totalDays - myYear*365)%30;

    document.querySelectorAll('#myYear')[0].value = myYear ;
    document.querySelectorAll('#myMonth')[0].value = myMonth ;
    document.querySelectorAll('#myDay')[0].value = myDay ;
}

function dateCalc() {
    let bgDateStr = document.getElementById('beginDate').value;
    console.log(bgDateStr);
    let edDate = new Date(bgDateStr);

    let addDays = parseInt(document.querySelectorAll('#myYear')[0].value)*365 + 
                  parseInt(document.querySelectorAll('#myMonth')[0].value)*30 +
                  parseInt(document.querySelectorAll('#myDay')[0].value);
    edDate.setDate(edDate.getDate() + addDays);

    document.querySelectorAll('#endDate')[0].value = edDate.toLocaleDateString('en-CA');
}
*/
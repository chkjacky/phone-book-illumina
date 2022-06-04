// Convert UTC to user's local time 
function localiseTime(utcTime)
{
    var localTime = '';
    var date = new Date(utcTime + " UTC");
    var today = new Date(date.toString());

    var dd = today.getDate();
    var yyyy = today.getFullYear();
    var mm = today.getMonth()+1 ;

    mm = (mm<10?"0":"") + mm;
    dd = (dd<10?"0":"") + dd;

    var hr  =  today.getHours();
    var min =  today.getMinutes();
    var sec =  today.getSeconds();

    hr  = (hr<10?"0":"")  + hr;
    min = (min<10?"0":"") + min;
    sec = (sec<10?"0":"") + sec;

    localTime = yyyy+"-"+mm+"-"+dd+" "+hr+":"+min+":"+sec+"\n";

    return localTime;
}
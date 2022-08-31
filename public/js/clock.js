
window.onload=()=> {
    showTime();
    function showTime(){
        var d = new Date();
        d.toLocaleString("en-US", {timeZone: "Asia/Manila"});
        var hour = d.getHours();
        var min = d.getMinutes();
        var sec = d.getSeconds();
    
        var MV = "AM";
        if(hour == 12){
            MV = "PM";
        }
        
        if(hour > 12){
            hour = hour % 12;
            MV = "PM";
        }
    
        if (hour == 00){
            hour = "12"
        }
    
        hour = ("0" + hour).slice(-2);
        min = ("0" + min).slice(-2);
        sec = ("0" + sec).slice(-2);
    
        document.getElementById("clock").innerHTML = " "+hour+":"+min+":"+sec+" "+MV;
    }
    setInterval(showTime,1000);
}

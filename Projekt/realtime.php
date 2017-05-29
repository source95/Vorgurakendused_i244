
var ctoday = <?php echo time() * 1000 ?>;
setInterval(function() {ctoday += 1000;},1000);
function startTime() {
    var today = new Date(ctoday);
    var montharray = new Array("Jan","Veb","Mar","Apr","Mai","Jun","Jul","Aug","Sep","Okt","Nov","Det");
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    h = checkTime(h);
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('realtime').innerHTML =
    checkTime(today.getDate())+" "+montharray[today.getMonth()]+" "+today.getFullYear() + "<br>" + h + ":" + m + ":" + s ; 
    setTimeout(startTime, 1000);
}

function checkTime(i) {
    if (i < 10) {i = "0" + i};
    return i;
}

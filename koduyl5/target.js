
window.onload = function () {
    var marklaud = document.getElementById("t01");

    function NewPlace(moveball) {
        var newX = String(Math.floor(Math.random()*50))+"%";
        var newY = String(Math.floor(Math.random()*50))+"%";
        moveball.style.left = newX;
        moveball.style.top = newY;
    }

    marklaud.onclick = function () {
        NewPlace(this);
    }
};

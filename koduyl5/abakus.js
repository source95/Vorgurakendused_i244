
var balls = document.getElementsByClassName("bead");
window.onload = function () {   
		
		for (var i = 0; i < balls.length; i++) {
		balls[i].onclick = function () {
        NewPlace(this);
		}		
    }
	function NewPlace(ball) {
    	if(window.getComputedStyle(ball).getPropertyValue('float') == "left")
		{
			ball.style.cssFloat = "right";						
		}
		else{
			ball.style.cssFloat = "left";
		}
    }
};

	
	



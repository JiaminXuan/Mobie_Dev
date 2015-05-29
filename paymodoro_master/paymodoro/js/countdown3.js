
var globaltime = 0,
	a = 0,
	b = 0;
	
function onLoad() {
        document.addEventListener("deviceready", onDeviceReady, true);
    }

    // device APIs are available
    //
    function onDeviceReady() {
        // Register the event listener
        document.addEventListener("backbutton", onBackKeyDown, true);
        document.addEventListener("pause", onPause, true);
    }

    // Handle the back button
    function onBackKeyDown() {
    if(confirm("Do you really want to do this?"))
{	
	navigator.app.exitApp();
}   
}

    function onPause(){
    onResume();
    alert("Sorry I won't go in background");
    }

function onResume(){
}

jQuery(window).bind(
    "beforeunload", 
    function() { 
       return confirm("You will be charged if you leave");
    }
)


start = function(){
  btn.disabled=true;
  timer = new Countdown();
  timer.init();
  


}


Countdown = function()
{
  //this.start_time = "30:00";
  this.target_id = "#timer";
  this.name = "timer";
}

Countdown.prototype.init = function(){
  this.reset();
  //var { setInterval } = require("sdk/timers");
  window.setInterval(this.name + '.tick()',1000);

}


Countdown.prototype.reset = function()
{
  //time = this.start_time.split(":");
  //this.minutes = parseInt(time[0]);
  //this.seconds = parseInt(time[1]);
    this.hour = hour.value;
    this.minutes = minute.value;
    this.seconds = 0;
	
	
	a = parseInt(hour.value);
	b = parseInt(minute.value);
	
	globaltime = a*60+b;
	
  this.update_target();

}

Countdown.prototype.tick = function(){
 if(this.hour >0 || this.seconds > 0 || this.minutes >0)
 {
	if(this.minutes==0&&this.seconds==0)
	{
	this.hour = this.hour - 1;
	this.minutes = 59;
	this.seconds = 59;
	}
	else if(this.seconds == 0)
	{
	this.minutes = this.minutes -1 ;
	this.seconds = 59;
	}
	else
	{
	this.seconds = this.seconds-1;
	}
  // write whether it's a focus time or a break time
  		if(this.minutes < 5) {
  		document.getElementById("messages").innerHTML="Whew... take a break.  Great job!";
  		}
  		else if(this.minutes <35 && this.minutes > 34) {
  		document.getElementById("messages").innerHTML="Whew... take a break.  Great job!";
  		}
  		else {
  		document.getElementById("messages").innerHTML="Time to focus.  You can do it!";
  		}

  }
  else
  {
  document.getElementById("messages").innerHTML="Congratulations!  You win!  Check your email for a PayPal reward.";
  }
this.update_target();
}

Countdown.prototype.update_target = function(){
	seconds = this.seconds;
	minutes = this.minutes;
	if(seconds < 10) seconds = "0" + seconds;
	if(minutes < 10) minutes = "0" + minutes;
	$(this.target_id).val(this.hour + ":" + this.minutes + ":" + seconds)
}












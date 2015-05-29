

function onLoad() {
        document.addEventListener("deviceready", onDeviceReady, true);
    }

    // device APIs are available
    //
    function onDeviceReady() {
        // Register the event listener
        document.addEventListener("backbutton", onBackKeyDown, true);
    }

    // Handle the back button
    //
    function onBackKeyDown() {
alert("GO BACK!");
navigator.app.exitApp();
    }


jQuery(window).bind(
    "beforeunload", 
    function() { 
       return confirm("You will be charged if you leave")
    }
)


start = function(){
  btn.disabled=true;
  timer = new Countdown();
  timer.init();
  
  

}


Countdown = function()
{
  this.start_time = "30:00";
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
    this.seconds = secs.value;
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
}
this.update_target();
}

Countdown.prototype.update_target = function(){

seconds = this.seconds;
if(seconds < 10) seconds = "0" + seconds;
$(this.target_id).val(this.hour + ":" + this.minutes + ":" + seconds)

}











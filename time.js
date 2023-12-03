
let startTime = 3;
let time = startTime * 60;
//Get the Storage time 
var min = Number(localStorage.getItem("minute"));
var sec = Number(localStorage.getItem("seconds"));
var sTime = min * 60 + sec;
var timer = document.getElementById("timer");

function myFunction() {
  //Identify the Broswer Refresh or not
  let data = window.performance.getEntriesByType("navigation")[0].type;
  if (data == "reload") {
    console.log(sTime);
    min = Math.floor(sTime / 60);
    sec = sTime % 60;
    min = min < 10 ? "0" + min : min;
    localStorage.setItem("minute", min);
    localStorage.setItem("seconds", sec);

    timer.innerHTML = `${min}:${sec}`;
    sTime--;
  } else {
    let minute = Math.floor(time / 60);
    let seconds = time % 60;

    minute = minute < 10 ? "0" + minute : minute;
    seconds = seconds < 10 ? "0" + seconds : seconds;
    localStorage.setItem("minute", minute);
    localStorage.setItem("seconds", seconds);

    timer.innerHTML = `${minute}:${seconds}`;
    time--;

    localStorage.setItem("timer", timer.innerHTML);
  }
}
setInterval(myFunction, 1000);
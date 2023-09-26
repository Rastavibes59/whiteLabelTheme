if (document.getElementById("countdown-js").length > 0) {

// Set the date we're counting down to
var countDownDate = new Date("Aug 20, 2022 12:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("countdown-js").innerHTML = days + "j " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0 && distance > 1000*60*60*24*2) {
    clearInterval(x);
    document.getElementById("countdown-js").innerHTML = "";
  } else if (distance < 1000*60*60*24*2) {
    clearInterval(x);
    document.getElementById("countdown-js").innerHTML = "<h2>On se retrouve en <strong class=\"fc-tertiary\">2023</strong> !</h2>";
  }
}, 1000);


}


 function fade() {
     document.getElementById("fadein").style.opacity = '1';
 }
 window.onload = fade;

 document.getElementById("aboutButton").onclick = function () {
     location.href = "aboutus.html";
 };
 document.getElementById("menuButton").onclick = function () {
     location.href = "menu.html";
 };
 document.getElementById("resButton").onclick = function () {
     location.href = "reservation.html";
 };

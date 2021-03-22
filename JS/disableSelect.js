 function changeFunc() {
     var x = document.getElementById("priceform").value;
     if (x == 280) {
         document.getElementById("chickenform").disabled = true;
         document.getElementById("porkform").disabled = true;
         document.getElementById("beefform").disabled = true;
         document.getElementById("pastavegform").disabled = true;
         document.getElementById("dessertform").disabled = true;

         document.getElementById("chickenform").disabled = false;
         document.getElementById("porkform").disabled = false;
         document.getElementById("pastavegform").disabled = false;
         document.getElementById("dessertform").disabled = false;
     }
     if (x == 300) {
         document.getElementById("chickenform").disabled = true;
         document.getElementById("porkform").disabled = true;
         document.getElementById("beefform").disabled = true;
         document.getElementById("pastavegform").disabled = true;
         document.getElementById("dessertform").disabled = true;

         document.getElementById("chickenform").disabled = false;
         document.getElementById("porkform").disabled = false;
         document.getElementById("beefform").disabled = false;
         document.getElementById("dessertform").disabled = false;
     }
     if (x == 350) {
         document.getElementById("chickenform").disabled = true;
         document.getElementById("porkform").disabled = true;
         document.getElementById("beefform").disabled = true;
         document.getElementById("pastavegform").disabled = true;
         document.getElementById("dessertform").disabled = true;

         document.getElementById("chickenform").disabled = false;
         document.getElementById("porkform").disabled = false;
         document.getElementById("beefform").disabled = false;
         document.getElementById("pastavegform").disabled = false;
     }
     if (x == 380) {
         document.getElementById("chickenform").disabled = false;
         document.getElementById("porkform").disabled = false;
         document.getElementById("beefform").disabled = false;
         document.getElementById("pastavegform").disabled = false;
         document.getElementById("dessertform").disabled = false;
     }
 }

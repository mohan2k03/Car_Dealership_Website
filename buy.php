<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>

html::-webkit-scrollbar-thumb {
    display: none;
}

html::-webkit-scrollbar {
    display: none;
}

html::-webkit-scrollbar-track {
    display: none;
}

* {
  box-sizing: border-box;
}

:root {
    --main: #578857;
    --black: #000;
    --white: #fff;
}

body {
    background: linear-gradient(rgb(24, 22, 22), #6a6d6e);
}

#regForm {
  background: linear-gradient(rgb(24, 22, 22), #6a6d6e);
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 50%;
  min-width: 300px;
  border-radius: 10px;
}

h1 {
    text-align: center;
  color: var(--main);
}

h6 {
    text-align: center;
  color: var(--main);
  font-size: 15px;
}

h5 {
    color: var(--main);
  font-size: 15px;
}

h3 {
  text-align: center;
  color: var(--main);
  font-size: 30px;
}

label {
    color: white;
}

input {
  padding: 10px;
  color: white;
  width: 50%;
  font-size: 17px;
  font-family: Raleway;
  margin-bottom: 15px;
  background: none;
  border-radius: 10px;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

.tab img {
    margin-bottom: 10px;
}

button {
  background: var(--main);
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
  border-radius: 5px;
  margin-right: 10px;
  transition: .3s;
}

button:hover {
  opacity: 0.8;
  letter-spacing: 2px;
}

#prevBtn {
  background: var(--main);
  border-radius: 5px;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
</style>
<body>

<form id="regForm" action="database.php" method="post" enctype="multipart/form-data">
    
  <!-- One "tab" for each step in the form: -->
  <<div class="tab">
  <h3>Your Information</h3>
    <label for="fullname">Full Name: </label><br>
    <input type="text" name="fullname" id="fullname"><br>
    <label for="fullname">E-mail: </label><br>
    <input type="email" name="email" id="email"><br>
    <label for="fullname">Phone Number: </label><br>
    <input type="text" name="tel" id="tel">
  </div>
  <div class="tab">
  <h3>Documents</h3>
    <label for="file1">Electricity bill/house purchase agreement/ration card/rent
                agreement</label><br>
    <input type="file" name="file1" id="file1"><br>
    <label for="file2"> Voter ID/school certificates/Passport</label><br>
    <input type="file" name="file2" id="file2"><br>
    <label for="file3">Driving license/PAN Card/Passport/Aadhaar</label><br>
    <input type="file" name="file3" id="file3">
  </div>
  <div class="tab">
  <h3>Payment</h3>
    
    <label for="">Cards Accepted</label><br>
  <img src="images/card_img.png" alt=""><br>
    
  <label for="">Name on card: </label><br>
                <input type="text" name="card_name" placeholder="mr. john deo"><br>
  
  <label for="">Credit Card Number: </label><br>
                <input type="number" placeholder="1111-2222-3333-4444"><br>
  
  <label for="">Valid upto</label><br>
                <input type="" placeholder="mm/yy"><br>
  
  <label for="">CVV</label><br>
  <input type="text" placeholder="123">
  
  </div>

  <div class="tab">
    <h6>&bull; This is just a simulator for payment.</h6>
    <h6>&bull; It is not going to save your essential information.</h6>
    <h5>~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</h5>
    <label for="" style="color: #578857">Price:</label>
    <input type="text" value="$100000000" id="">
    <h1>Enter Your Pin: </h1>
    <input type="number" name="" id="">
  </div>
  
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>

</body>
</html>

function validateForm() {
    console.log("inside validateForm function");
    var uname = document.getElementById("uname").value;
    var pass = document.getElementById("pass").value;
  
    sessionStorage.setItem("uname", uname);
  
    if (uname == '' && pass == '') {
      alert("User Name and Password fields are empty");
      return false;
    }
    else {
      if (uname == "") {
        alert("User Name is empty");
        return false;
      }
      if (pass == "") {
        alert("Password field is empty");
        return false;
      }
    }
  }
  
  function checkLength() {
    console.log("inside checkLegth function");
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var uname = document.getElementById("uname").value;
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    var p = console.log;
    if (fname.length <= 5 || lname.length <= 5 || uname.length <= 5 || pass1.length <= 5 || pass2.length <= 5) {
      p('inside length')
      alert("Minimun length of all fields should be 6 letter");
      return false;
    }
    else if (pass1 != pass2) {
      p('inside pass')
      alert("Password doesnot matching please check");
      return false;
    }
  
  }
  
    // console.log("inside slide function");
    var i = 0; // Start point
    var images = [];
    var time = 2500;
  
    // Image List
    images[0] = '../images/bread.jpg';
    images[1] = '../images/cake.png';
    images[2] = '../images/cookies.jpg';
    images[3] = '../images/dessert.jpg';
    // Change Image
    function changeImg() 
    {
      console.log("inside changeimg function");
      document.slide.src = images[i];
      if (i < images.length - 1) 
      {
        i++;
      } 
      else 
      {
        i = 0;
      }
      setTimeout("changeImg()", time);
    }
  
  function ftest() {
  
    console.log("inside ftest");
    // Get the snackbar DIV
    var x = document.getElementById("snackbar");
  
    // Add the "show" class to DIV
    x.className = "show";
  
    // After 3 seconds, remove the show class from DIV
    setTimeout(function () { x.className = x.className.replace("show", ""); }, 3000);
  
  
  }
  
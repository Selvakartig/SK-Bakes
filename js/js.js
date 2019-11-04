function validateForm() {
  console.log("inside js");
  var uname = document.getElementById("uname").value;
  var pass = document.getElementById("pass").value;
  if (uname !== "selva" || uname == '' || uname == null) {
    alert("Wrong Username please contact Selva :)");
    return false;
  }
  else if (pass !== "selva" || pass == '' || pass == null) {
    alert("Wrong Password please contact Selva :)");
    return false;
  }
  else {
    window.sessionStorage.setItem("uname", uname);
    return true;
  }
}


var i = 0; // Start point
var images = [];
var time = 2500;

// Image List
images[0] = '../images/bread.jpg';
images[1] = '../images/cake.png';
images[2] = '../images/cookies.jpg';
images[3] = '../images/dessert.jpg';
// Change Image
function changeImg() {
  // console.log("Inside Change Image")
  document.slide.src = images[i];

  if (i < images.length - 1) {
    i++;
  } else {
    i = 0;
  }
  setTimeout("changeImg()", time);
}
window.onload = changeImg;



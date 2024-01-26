function val1() {
    let name = document.getElementById('name').value;
    if (name == '') {
      document.getElementById('error1').innerHTML="Name is required";
        document.getElementById('name').style.border = "4px solid red ";
    } 
    else if(name.length<4)
    {
      document.getElementById('error1').innerHTML="Name should be greater than 3";
      document.getElementById('name').style.border = "4px solid red ";
    }
    else
        document.getElementById('name').style.border = "5px solid green ";
  }

  function val2() {
    let email = document.getElementById('email').value;
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email == '') {
      document.getElementById('error2').innerHTML="Email is required";
      document.getElementById('email').style.border = "4px solid red ";
    } 
    else if(!emailPattern.test(email))
    { 
      document.getElementById('error2').innerHTML="Email should have valid syntax";
      document.getElementById('email').style.border = "4px solid red ";
    }
    else
        document.getElementById('email').style.border = "5px solid green ";
  }
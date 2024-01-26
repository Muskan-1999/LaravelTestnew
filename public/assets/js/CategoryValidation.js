function val1() {
    let category_name = document.getElementById('category_name').value;
    if (category_name == '') {
      document.getElementById('error1').innerHTML="Name is required";
        document.getElementById('category_name').style.border = "4px solid red ";
    } 
    else if(category_name.length<4)
    {
      document.getElementById('error1').innerHTML="Name should be greater than 3";
      document.getElementById('category_name').style.border = "4px solid red ";
    }
    else
        document.getElementById('category_name').style.border = "5px solid green ";
  }
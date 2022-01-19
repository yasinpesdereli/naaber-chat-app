const passwordField = document.querySelector(".form input[type='password']"),
toogleIcon = document.querySelector(".form .field i");

toogleIcon.onclick = () => { 
    if (passwordField.type === "password"){
        passwordField.type ="text";
     
    }else {
        passwordField.type = "password";
        
    }
 }
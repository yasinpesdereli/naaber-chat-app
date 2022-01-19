const form = document.querySelector(".login form"),
submitButton = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");


form.onsubmit = (e)=>{
    e.preventDefault();
}


submitButton.onclick = ()=>{

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "function_login.php", true);
    xhr.onload =()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);
                
                if (data == "basarili") {
                    location.href="main.php";
                }else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                    console.log(data);
                    
                }
                
            }
        }

    }
    let formData = new FormData(form);
    xhr.send(formData);
}
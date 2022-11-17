let emailDone =0;
let passDone =0;

function email_validation(val)
{
    let emailErrors = document.getElementById('email-error');
    //is required
    if(val.value == "")
    {
        emailErrors.innerHTML = "Your email is empty";
        val.classList.add("is-invalid");
        val.classList.remove("is-valid");
        emailDone =0;
    }
    else if( !val.value.includes("@gmail.com") && !val.value.includes("@email.com"))
    {
        emailErrors.innerHTML = "Your email must contain @gmail or @email";
        val.classList.add("is-invalid");
        val.classList.remove("is-valid");
        emailDone =0;
    }
    else{
        emailErrors.innerHTML = "";
        emailDone =1;
        val.classList.add("is-valid");
        val.classList.remove("is-invalid");
    }
    btn();
}

function password_validation(val)
{
    let pattern = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}/;
    let passErrors = document.getElementById('pass-error');
    //is required
    if(val.value =="")
    {
        passErrors.innerHTML = "Your password is empty";
        val.classList.add("is-invalid");
        val.classList.remove("is-valid");
        passDone =0;
    }
    else if(!pattern.test(val.value))
    {
        passErrors.innerHTML = "Your password is not valid";
        val.classList.add("is-invalid");
        val.classList.remove("is-valid");
        passDone =0;
    }
    else{
        passErrors.innerHTML = "";
        passDone =1;
        val.classList.add("is-valid");
        val.classList.remove("is-invalid");
    }
    btn();
}


function btn()
{
    let button = document.getElementById('js-btn');
    if(emailDone ==1 && passDone ==1)
    {
        button.classList.remove("btn-primary");
        button.classList.remove("btn-danger");
        button.classList.remove("disabled");
        button.classList.add("btn-success");

    }
    else if(emailDone ==0 || passDone ==0)
    {
        button.classList.remove("btn-primary");
        button.classList.add("btn-danger");
        button.classList.add("disabled");
        button.classList.remove("btn-success");
    }
}
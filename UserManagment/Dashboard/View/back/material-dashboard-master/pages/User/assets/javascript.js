function validateForm()
{
    console.log("validateForm called !");
    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    var usernameError = document.getElementById('usernameError');
    var emailError = document.getElementById('emailError');
    var passwordError = document.getElementById('passwordError');

    var isValid = true ;

    if(username.length < 5)
    {
        usernameError.innerHTML= "Username must be at least 5 characters";
        isValid = false;
    }else
    {
        usernameError.innerHTML = "";
    }


    if(email.trim() === "")
    {
        emailError.innerHTML= "Email is required";
        isValid = false;
    } else if(!/\S+@\S+\.\S+/.test(email))
    {
        emailError.innerHTML = "Email must be valid";
        isValid = false ;
    } else
    {
        emailError.innerHTML = "";
    }

    if(password.trim() === "")
    {
        passwordError.innerHTML = "Password is required";
        isValid = false;
    } 
    else if(password.length < 8)
    {
        passwordError.innerHTML = "Password must be at least 8 characters";
        isValid = false;
    }  
    else if(!/[A-Z]/.test(password))
    {
        passwordError.innerHTML = "Password must contain an UpperCase !";
        isValid = false;
    }
    else if(!/[a-z]/.test(password))
    {
        passwordError.innerHTML = "Password must contain an LowerCase !";
        isValid = false;
    } else 
    {
        passwordError.innerHTML = "";
    } 

    return isValid;
}
function togglePasswordVisibility() {
    console.log("hello yosra");
    var passwordInput = document.getElementById('password');
    var icon = document.querySelector('.toggle-password i');

   if (passwordInput.type === "password") {
    passwordInput.type = "text";
    icon.classList.remove('fa-eye');
    icon.classList.add('fa-eye-slash');
    } else {
    passwordInput.type = "password";
    icon.classList.remove('fa-eye-slash');
    icon.classList.add('fa-eye');
        }
    }

function checknewPass()
{
    //Store the password field objects into variables ...
    var nPassword = document.getElementById('nPassword');
    var cpassword = document.getElementById('cpassword');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field
    //and the confirmation field
    if(nPassword.value == cpassword.value){
        //The passwords match.
        //Set the color to the good color and inform
        //the user that they have entered the correct password
        cpassword.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "&nbsp;Passwords Match"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        cpassword.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "&nbsp;Passwords Do Not Match!"
    }
}

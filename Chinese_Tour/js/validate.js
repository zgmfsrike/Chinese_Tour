function checkPass()
{
    //Store the password field objects into variables ...
    var inputPassword = document.getElementById('inputPassword');
    var cpassword = document.getElementById('cpassword');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field
    //and the confirmation field
    if(inputPassword.value == cpassword.value){
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
function validatephone(contactnum)
{
    var maintainplus = '';
    var numval = contactnum.value
    if ( numval.charAt(0)=='+' )
    {
        var maintainplus = '';
    }
    curphonevar = numval.replace(/[\\A-Za-z!"£$%^&\,*+_={};:'@#~,.Š\/<>?|`¬\]\[]/g,'');
    contactnum.value = maintainplus + curphonevar;
    var maintainplus = '';
    contactnum.focus;
}
// validates text only
function Validate(txt) {
    txt.value = txt.value.replace(/[^a-zA-Z-'\n\r.]+/g, '');
}



// validate email
// function email_validate(email)
// {
// var regMail = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;
//
//     if(regMail.test(email) == false)
//     {
//     document.getElementById("status").innerHTML    = "<span class='warning'>Email address is not valid yet.</span>";
//     }
//     else
//     {
//     document.getElementById("status").innerHTML	= "<span class='valid'>Thanks, you have entered a valid Email address!</span>";
//     }
// }
// validate date of birth
// function dob_validate(dob)
// {
// var regDOB = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/;
//
//     if(regDOB.test(dob) == false)
//     {
//     document.getElementById("statusDOB").innerHTML	= "<span class='warning'>DOB is only used to verify your age.</span>";
//     }
//     else
//     {
//     document.getElementById("statusDOB").innerHTML	= "<span class='valid'>Thanks, you have entered a valid DOB!</span>";
//     }
// }
// validate address
// function add_validate(address)
// {
// var regAdd = /^(?=.*\d)[a-zA-Z\s\d\/]+$/;
//
//     if(regAdd.test(address) == false)
//     {
//     document.getElementById("statusAdd").innerHTML	= "<span class='warning'>Address is not valid yet.</span>";
//     }
//     else
//     {
//     document.getElementById("statusAdd").innerHTML	= "<span class='valid'>Thanks, Address looks valid!</span>";
//     }
// }
function checkMail()
{
    //Store the password field objects into variables ...
    var email = document.getElementById('email');
    var confirm_emailid = document.getElementById('confirm_email');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field
    //and the confirmation field
    if(email.value == confirm_emailid.value){
        //The passwords match.
        //Set the color to the good color and inform
        //the user that they have entered the correct password

        message.style.color = goodColor;
        message.innerHTML = "&nbsp;Email Match"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.

        message.style.color = badColor;
        message.innerHTML = "&nbsp;*Email Do Not Match!"
    }
}

function validate()
{
    var fullname=document.forms["signup"]["fname"].value;
    var username=document.forms["signup"]["uname"].value;
    var email=document.forms["signup"]["email"].value;
    var pass=document.forms["signup"]["ppassword"].value;
    var conpa=document.forms["signup"]["conpass"].value;

    if(naming(fullname))
    {
        if(isAplhanumeric(username))
        {
            if(emailValidation(email))
            {
                if(pass==conpa)
                {
                    if(passValidation(pass,8))
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                }
                else
                {
                    alert("Password didn't match");
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
    else
    {
        return false;
    }
}

function passValidation(elem,min)
{
    var exp2=/^[a-zA-Z0-9!@#$%^&* ]+$/;

    if(!isAvailable(elem))
    {
        if(elem.length>=min)
        {
            if(elem.match(exp2))
            {
                return true;
            }
            else
            {
                alert("Password should consist at least a upper case, lower case letter,special Character and a number");
                return false;
            }
        }
        else
        {
            alert("Password should be at least 8 characters long");
            return false;
        }
    }
    else
    {
        return false;
    }
}

function isAvailable(elem)
{
    if(elem=="" || elem==null)
    {
        alert("You can't keep fields empty");
        return true;
    }
    else
    {
        return false;
    }
}

function isAplhanumeric(elem)
{
    var exp=/^[a-zA-Z0-9]+$/;
    if(!isAvailable(elem))
    {
        if(elem.match(exp))
        {
            return true;
        }
        else
        {
            alert("Symbols are not allows for username");
            return false;
        }
    }
    else
    {
        return false;
    }
}

function naming(elem)
{
    if(!isAvailable(elem))
    {
        var exp=/^[a-zA-z]+$/;

        if(elem.match(exp))
        {
            return true;
        }
        else
        {
            alert("Your Name should container only letters");
            return false;
        }
    }
    else
    {
        return false;
    }
}

function emailValidation(elem)
{
    if(!isAvailable(elem))
    {
        var atops = elem.indexOf("@");
        var dotops = elem.indexOf(".");

        if(atops <1 || dotops+2 >=elem.length || atops+2>dotops)
        {
            alert("Enter a valid Email Address");
            return false;
        }
        else
        {
            return true;
        }
    }
    else
    {
        return false;
    }
}

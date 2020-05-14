/* Author: Brad Botteron
Date: 04/17/2020
Desc: js script
 */
"use strict";

var errorMsg = document.getElementById("errorMsg");
var form = document.getElementsByTagName("form")[0];
var formValidity;

function formEventListeners()
{
    var submitBtn = document.getElementById("submitBtn");
    console.log("Entering formEventListeners");
    if(submitBtn.addEventListener)
    {
        submitBtn.addEventListener("click", verifyForm, false);
    } else if(submitBtn.attachEvent)
    {
        submitBtn.attachEvent("onclick", verifyForm);
    }
}

function verifyForm(evt)
{
    console.log("Entering verifyForm");
    if(evt.preventDefault)
    {
        evt.preventDefault();
    } else {
        evt.returnValue = false;
    }

    formValidity = true;
    console.log(formValidity + ": initial formValidity");
    verifyFirstName();
    verifyLastName();
    verifyEmail();
    verifyTelephone();
    console.log(formValidity + ": formValidity");
    if(formValidity === true)
    {
        console.log("Entering formValidation True block");
        errorMsg.innerHTML = "";
        errorMsg.style.display = "none";
        form.submit();
        console.log("Form Submitted");
    }
}

function verifyFirstName()
{
    console.log("Entering verifyFirstName()");
    var firstNameInput = document.getElementById("firstNameInput");
    try
    {
        if(/^[a-zA-Z]+$/.test(firstNameInput.value) === false)
        {
            throw "First name cannot contain numbers.";
        }
    } catch(msg)
    {
        formValidity = false;
        errorMsg.style.display = "block";
        errorMsg.style.color = "white";
        errorMsg.style.textAlign = "center";
        errorMsg.innerHTML = msg;
        firstNameInput.backgroundColor = "rgb(255,233,233)";
        firstNameInput.focus();
    }
    console.log(formValidity + ": in verifyFirstName");
}

function verifyLastName()
{
    console.log("Entering verifyLastName()");
    var lastNameInput = document.getElementById("lastNameInput");
    try
    {
        if(/^[a-zA-Z]+$/.test(lastNameInput.value) === false)
        {
            throw "Last name cannot contain numbers.";
        }
    } catch(msg)
    {
        formValidity = false;
        errorMsg.style.display = "block";
        errorMsg.style.color = "white";
        errorMsg.style.textAlign = "center";
        errorMsg.innerHTML = msg;
        lastNameInput.style.backgroundColor = "rgb(255,233,233)";
        lastNameInput.focus();
    }
    console.log(formValidity + ": in verifyLastName");
}

function verifyEmail()
{
    console.log("Entering verifyEmail()");
    var emailInput = document.getElementById("emailInput");
    var emailCheck = (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/);
    try
    {
        if(emailCheck.test(emailInput.value) === false)
        {
            throw "Please provide a valid email.";
        }
    } catch(msg)
    {
        formValidity = false;
        errorMsg.style.display = "block";
        errorMsg.style.color = "white";
        errorMsg.style.textAlign = "center";
        errorMsg.innerHTML = msg;
        emailInput.style.backgroundColor = "rgb(255,233,233)";
        emailInput.focus();
    }
    console.log(formValidity + ": in verifyEmail()");
}

function verifyTelephone()
{
    var phoneRegex = /^(1?(-?\d{3})-?)?(\d{3})(-?\d{4})$/;
    console.log("Entering verifyTelephone()");
    var telephoneInput = document.getElementById("telephoneInput");
    try
    {
        if(phoneRegex.test(telephoneInput.value) === false)
        {
            console.log("phone failed");
            throw "Enter a valid phone number. Example: 555-555-5555";
        }
    } catch(msg)
    {
        formValidity = false;
        errorMsg.style.display = "block";
        errorMsg.style.color = "white";
        errorMsg.style.textAlign = "center";
        errorMsg.innerHTML = msg;
        telephoneInput.style.backgroundColor = "rgb(255,233,233)";
        telephoneInput.focus();
    }
    console.log(formValidity + ": in verifyTelephone");
}

function init()
{
    formEventListeners();
}

if(window.addEventListener){
    window.addEventListener("load", init, false);
} else if (window.attachEvent){
    window.attachEvent("onload", init);
}
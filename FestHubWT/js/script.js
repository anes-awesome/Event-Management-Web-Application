const form = document.getElementById("form");
const email = document.getElementById("email");
const password1Element = document.getElementById("password1");
const password2Element = document.getElementById("password2");
const messageContainer = document.querySelector(".message-container");
const message = document.getElementById("message");

let isValid = false;
let passwordsMatch = false;

function validateForm() {
  isValid = form.checkValidity();
  if (!isValid) {
    message.textContent = "Please fill out all fields.";
    message.style.color = "red";
    messageContainer.style.borderColor = "red";
    return;
  }
  if (password1Element.value === password2Element.value) {
    passwordsMatch = true;
    password1Element.style.borderColor = "green";
    password2Element.style.borderColor = "green";
  } else {
    passwordsMatch = false;
    message.textContent = "Make sure passwords match.";
    messageContainer.style.borderColor = "red";
    password1Element.style.borderColor = "red";
    password2Element.style.borderColor = "red";
    return;
  }
  if (isValid && passwordsMatch) {
    message.textContent = "Successfully Registered!";
    message.style.color = "green";
    messageContainer.style.borderColor = "green";
  }
}

function storeFormData() {
    localStorage.setItem('name', name.value);
    localStorage.setItem('email', email.value);
    localStorage.setItem('password', pw.value);
}

function check() {

    var storedName = localStorage.getItem('email');
    var storedPw = localStorage.getItem('password1');

    var userName = document.getElementById('lemail');
    var userPw = document.getElementById('lpassword1');

    if(userName.value == storedName && userPw.value == storedPw) {
        form.addEventListener("button", processFormData);
    }else {
        alert('ERROR.');
    }
}

function processFormData(event) {
  event.preventDefault();
  validateForm();
  if (isValid && passwordsMatch) {
    storeFormData();
  }
}

form.addEventListener("submit", processFormData);



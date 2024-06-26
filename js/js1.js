function togglePasswordSesion() {
  var passwordInput = document.getElementById("floatingPassword");
  var icon = document.getElementById("PassIcon");

  if (passwordInput.type === "password") {
      passwordInput.type = "text";
      icon.innerText = "visibility";
  } else {
      passwordInput.type = "password";
      icon.innerText = "visibility_off";
  }
}

function enablePasswordButton() {
  document.getElementById("PassIcon").style.display = "inline-block";
}

function togglePasswordReg1() {
  var passwordInput = document.getElementById("floatingPasswordReg");
  var icon = document.getElementById("PassIconReg1");

  if (passwordInput.type === "password") {
      passwordInput.type = "text";
      icon.innerText = "visibility";
  } else {
      passwordInput.type = "password";
      icon.innerText = "visibility_off";
  }
}

function enablePasswordButtonReg1() {
  document.getElementById("PassIconReg1").style.display = "inline-block";
}

function togglePasswordReg2() {
  var passwordInput = document.getElementById("floatingConfPasswordReg");
  var icon = document.getElementById("PassIconReg2");

  if (passwordInput.type === "password") {
      passwordInput.type = "text";
      icon.innerText = "visibility";
  } else {
      passwordInput.type = "password";
      icon.innerText = "visibility_off";
  }
}

function enablePasswordButtonReg2() {
  document.getElementById("PassIconReg2").style.display = "inline-block";
}

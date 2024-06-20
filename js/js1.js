function enablePasswordButton() {
  var icon = document.getElementById("PassIcon");
  icon.style.display = 'block';
}

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

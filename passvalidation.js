function passval() {
  const parola1 = document.getElementById("signUpPass1").value;
  const parola2 = document.getElementById("signUpPass2").value;
  if (parola1 != parola2) {
    alert("Pass doesn't match");
    return false;
  } else {
    return true;
  }
}

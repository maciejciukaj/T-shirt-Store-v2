function checkInput(pole_id, obiektRegex) {
  var obiektPole = document.getElementById(pole_id);
  if (!obiektRegex.test(obiektPole.value)) return false;
  else return true;
}
function disableBtn() {
  document.getElementById("glitch").disabled = true;
}

function checkCheckbox(box_id) {
  var obiekt = document.getElementById(box_id);
  if (obiekt.checked) return true;
  else return false;
}

function sprawdz() {
  var ok = true;
  nameRegex = /^[a-zA-Z]{2,20}$/;
  emailRegex =
    /^([a-zA-Z0-9])+([.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-]+)+/;
  phoneRegex = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{3})/;
  ageRegex = /^[1-9][0-9]{1,2}$/;
  cardRegex = /^[0-9]{4}$/;
  cvcRegex = /^[0-9]{3,4}$/;
  fnamelnameRegex =
    /^([a-zA-Z]{2,}\s[a-zA-Z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)/;
  if (!checkInput("fname", nameRegex)) {
    ok = false;
    document.getElementById("fname_error").innerHTML =
      "Correct your first name!";
  } else document.getElementById("fname_error").innerHTML = "";
  if (ok) {
    document.getElementById("glitch").disabled = false;
  }
  if (!checkInput("lname", nameRegex)) {
    ok = false;
    document.getElementById("lname_error").innerHTML =
      "Correct your last name!";
  } else document.getElementById("lname_error").innerHTML = "";
  if (!checkInput("email", emailRegex)) {
    ok = false;
    document.getElementById("email_error").innerHTML =
      "Correct your email address!";
  } else document.getElementById("email_error").innerHTML = "";
  if (document.getElementById("street").value == "") {
    ok = false;
    document.getElementById("street_error").innerHTML = "Enter your address!";
  } else document.getElementById("street_error").innerHTML = "";
  if (document.getElementById("city").value == "") {
    ok = false;
    document.getElementById("city_error").innerHTML = "Enter your address!";
  } else document.getElementById("city_error").innerHTML = "";
  if (!checkInput("phone", phoneRegex)) {
    ok = false;
    document.getElementById("phone_error").innerHTML =
      "Correct your phone number!";
  } else document.getElementById("phone_error").innerHTML = "";
  if (document.getElementById("consent").checked == false) {
    ok = false;
    document.getElementById("consent_error").innerHTML = "Consent required";
  } else document.getElementById("consent_error").innerHTML = "";
  if (!checkInput("card", cardRegex)) {
    ok = false;
    document.getElementById("card").value = "Wrong card number!";
  }
  if (!checkInput("cvc", cvcRegex)) {
    ok = false;

    document.getElementById("cvc").value = "Wrong CVC code!";
  }
  if (!checkInput("cardN", fnamelnameRegex)) {
    ok = false;
    document.getElementById("cardN").value = "Correct owner name!";
  }

  if (ok) {
    saveUserData();
  }
  return ok;
}
function saveUserData() {
  info = {
    fname,
    lname,
    email,
    street,
    city,
    phone,
  };
  info.fname = document.getElementById("fname").value;
  info.lname = document.getElementById("lname").value;
  info.email = document.getElementById("email").value;
  info.street = document.getElementById("street").value;
  info.city = document.getElementById("city").value;
  info.phone = document.getElementById("phone").value;
  localStorage.setItem("info", JSON.stringify(info));
}

document.getElementById("glitch").addEventListener("click", function () {
    
  if (sprawdz()) {
     
    window.location.href = "orderAccept.php";
  }
});

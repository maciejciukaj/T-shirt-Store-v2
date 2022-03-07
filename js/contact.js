function sprawdzPole(pole_id, obiektRegex) {
  var obiektPole = document.getElementById(pole_id);
  if (!obiektRegex.test(obiektPole.value)) return false;
  else return true;
}

function sprawdz_radio(nazwa_radio) {
  var obiekt = document.getElementsByName(nazwa_radio);
  for (i = 0; i < obiekt.length; i++) {
    wybrany = obiekt[i].checked;
    if (wybrany) return true;
  }
  return false;
}
function sprawdz_box(box_id) {
  var obiekt = document.getElementById(box_id);
  if (obiekt.checked) return true;
  else return false;
}
function sprawdz() {
  var ok = true;
  obiektNazw = /^[a-zA-Z]{2,20}$/;
  obiektEmail =
    /^([a-zA-Z0-9])+([.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-]+)+/;
  obiektWiek = /^[1-9][0-9]{1,2}$/;

  if (!sprawdzPole("fname", obiektNazw)) {
    ok = false;
    document.getElementById("fname_error").innerHTML =
      "Correct your first name!";
  } else document.getElementById("fname_error").innerHTML = "";
  if (!sprawdzPole("lname", obiektNazw)) {
    ok = false;
    document.getElementById("lname_error").innerHTML =
      "Correct your last name!";
  } else document.getElementById("lname_error").innerHTML = "";
  if (!sprawdzPole("email", obiektEmail)) {
    ok = false;
    document.getElementById("email_error").innerHTML =
      "Correct your email address!";
  } else document.getElementById("email_error").innerHTML = "";
  if (
    document.getElementById("description").value == "" ||
    document.getElementById("description").value == "Leave us a message!"
  ) {
    ok = false;
    document.getElementById("description").innerHTML = "Leave us a message!";
  }
  if (ok) pokazDane();
  return ok;
}
function pokazDane() {
  /* var tab = document.getElementsByName("platnosc");
    var op;
    for (let i = 0; i < tab.length; i++) {
      if (tab[i].checked) {
        op = tab[i].value;
        break;
      }
    }
  
    var tab1 = document.getElementsByName("jezyk");
    var op1 = [];
    let j = 0;
    for (let i = 0; i < tab1.length; i++) {
      if (tab1[i].checked) {
        op1[j] = tab1[i].value;
        j++;
      }
    }
  */
  var dane = "This data will be sent:\n";
  dane +=
    "First name: " +
    document.getElementById("fname").value +
    "\n" +
    "Last name: " +
    document.getElementById("lname").value +
    "\n" +
    "Email address: " +
    document.getElementById("email").value +
    "\n" +
    "Message: " +
    document.getElementById("description").value +
    "\n";

  if (window.confirm(dane)) return true;
  else return false;
}

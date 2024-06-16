/*===== FOCUS =====*/
const inputs = document.querySelectorAll(".form__input");

/*=== Add focus ===*/
function addfocus() {
  let parent = this.parentNode.parentNode;
  parent.classList.add("focus");
}

/*=== Remove focus ===*/
function remfocus() {
  let parent = this.parentNode.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

/*=== To call function===*/
inputs.forEach((input) => {
  input.addEventListener("focus", addfocus);
  input.addEventListener("blur", remfocus);
});

function validateForm() {
  var username = document.getElementById("username").value;
  if (username.includes(" ")) {
    alert("Username tidak boleh mengandung spasi!");
    return false; // Mencegah pengiriman form jika username mengandung spasi
  }
  return true; // Lanjutkan pengiriman form jika validasi berhasil
}

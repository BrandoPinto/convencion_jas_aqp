// Obtener el checkbox y el modal
const checkbox = document.getElementById("terms");
const modal = document.getElementById("termsModal");

// Obtener el botón de cierre y el botón de aceptar del modal
const closeBtn = document.getElementsByClassName("close")[0];
const acceptBtn = document.getElementById("acceptBtn");

// Cuando se haga clic en el checkbox, abrir el modal
checkbox.addEventListener("click", function () {
  if (checkbox.checked) {
    modal.style.display = "block";
  } else {
    modal.style.display = "none";
  }
});

// Cuando se haga clic en el botón de cierre, cerrar el modal y desmarcar el checkbox
closeBtn.addEventListener("click", function () {
  modal.style.display = "none";
  checkbox.checked = false;
});

// Cuando se haga clic en el botón de aceptar, cerrar el modal y marcar el checkbox
acceptBtn.addEventListener("click", function () {
  modal.style.display = "none";
  checkbox.checked = true;
});
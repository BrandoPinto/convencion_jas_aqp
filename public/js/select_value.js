// Obtener el elemento del select de stake
const stakeSelect = document.getElementById("stake-select");

// Agregar un controlador de eventos para el evento 'change'
stakeSelect.addEventListener("change", function() {
  // Obtener el valor seleccionado del select de stake
  const selectedStake = stakeSelect.value;

  // Enviar una solicitud AJAX para obtener las opciones correspondientes al valor seleccionado
  updateWardOptions(selectedStake);
});

// Función para actualizar las opciones del segundo select (ward-select) mediante una solicitud AJAX
function updateWardOptions(selectedStake) {
  // Realizar una solicitud AJAX a tu backend para obtener las opciones correspondientes al valor seleccionado

  const requestOptions = {
    method: 'POST',
    body: JSON.stringify({ selectedStake, _token: csrfToken }),
    headers: {
      'Content-Type': 'application/json'
    }
  };

  fetch('/select/value', requestOptions)
    .then(response => response.json())
    .then(data => {
      // Limpiar las opciones actuales del select de ward
      const wardSelect = document.getElementById("ward-select");
      wardSelect.innerHTML = "";

      // Agregar las nuevas opciones al select de ward
      data.forEach(option => {
        const optionElement = document.createElement("option");
        optionElement.value = option.idWard;
        optionElement.textContent = option.name;
        wardSelect.appendChild(optionElement);
      });

      // Mostrar el select de ward si hay opciones disponibles, ocultarlo si no hay opciones
      wardSelect.style.display = data.length > 0 ? "block" : "none";
    })
    .catch(error => {
      console.error('Error:', error);
    });
}
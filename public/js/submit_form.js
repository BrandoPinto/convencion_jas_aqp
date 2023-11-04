document.getElementById('submitButton').addEventListener('click', function(event) {
    event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada
  
    // Obtén la referencia al formulario
    const form = document.querySelector('form');
  
    // Crea un objeto FormData y agrega los campos del formulario
    const formData = new FormData(form);
  
    // Realiza la validación de los campos requeridos
    const requiredFields = [
      { name: 'name', displayName: 'Nombres' },
      { name: 'last-name', displayName: 'Apellidos' },
      { name: 'dni', displayName: 'DNI' },
      { name: 'phone', displayName: 'Teléfono' },
      { name: 'email', displayName: 'Correo electrónico' },
      { name: 'date-birthday', displayName: 'Fecha de nacimiento' },
      { name: 'gender', displayName: 'Género' },
      { name: 'member', displayName: 'Estado miembro' },
      { name: 'stake', displayName: 'Estaca' },
      { name: 'ward', displayName: 'Barrio' },
      { name: 'allergies', displayName: 'Alergias' },
      { name: 'disability', displayName: 'Discapacidad' },
      { name: 'shirt-size', displayName: 'Talla de camiseta' },
      { name: 'terms', displayName: 'Términos y condiciones' }
    ];
  
    for (const field of requiredFields) {
      const fieldValue = formData.get(field.name);
      if (!fieldValue) {
        // El campo requerido está vacío, muestra una alerta personalizada utilizando SweetAlert2
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: `El campo ${field.displayName} es requerido.`
        });
        return;
      }
    }
  
    // Realiza la solicitud POST utilizando Fetch
    fetch('/form/register', {
        method: 'POST',
        headers: {
            'X-CSRF-Token': csrfToken
            },
        body: formData
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            // Mostrar alerta de éxito si la respuesta es exitosa
            Swal.fire({
              icon: 'success',
              title: 'Éxito',
              text: '¡Registro éxitoso! pronto tendrá más novedades.'
            }).then(function () {
                window.location.href = '/';// Recargar la página
            });
          } else {
            // Mostrar alerta de error con el mensaje recibido
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: data.error
            });
          }
        })
        .catch(error => {
          // Mostrar alerta de error si ocurre un error en la petición
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Ocurrió un problema al enviar la solicitud'
          });
        });
    });
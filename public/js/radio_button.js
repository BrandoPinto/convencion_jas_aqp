//Radio buttons events
 // Obtener los elementos de radio y los campos de texto
 const allergiesNo = document.getElementById("allergies-no");
 const allergiesYes = document.getElementById("allergies-yes");
 const allergiesGroup = document.getElementById("allergies-group");
 const disabilityNo = document.getElementById("disability-no");
 const disabilityYes = document.getElementById("disability-yes");
 const disabilityGroup = document.getElementById("disability-group");
 
 // Función para ocultar el campo de texto y el icono de alergias si se selecciona "No"
 function toggleAllergies() {
   if (allergiesNo.checked) {
     allergiesGroup.style.display = "none";
   } else {
     allergiesGroup.style.display = "block";
   }
 }
 
 // Función para ocultar el campo de texto y el icono de discapacidad si se selecciona "No"
 function toggleDisability() {
   if (disabilityNo.checked) {
     disabilityGroup.style.display = "none";
   } else {
     disabilityGroup.style.display = "block";
   }
 }
 
 // Agregar event listeners a los radios para llamar a las funciones correspondientes
 allergiesNo.addEventListener("change", toggleAllergies);
 allergiesYes.addEventListener("change", toggleAllergies);
 disabilityNo.addEventListener("change", toggleDisability);
 disabilityYes.addEventListener("change", toggleDisability);
 
 // Ejecutar las funciones iniciales para asegurar que los campos de texto estén en el estado correcto al cargar la página
 toggleAllergies();
 toggleDisability();


 
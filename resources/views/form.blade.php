<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.css">
    <script src="https://kit.fontawesome.com/dec69e152c.js" crossorigin="anonymous"></script>
    <link rel="icon" href="img/logo.jpg">
    <title>Formulario</title>
</head>
<body>
<div class="container">
    <form>
      <div class="row">
        <h4>Formulario de inscripción convención JAS 2023</h4>
        <div class="input-group input-group-icon">
          <input type="text" name="name" placeholder="Nombres"/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>
        <div class="input-group input-group-icon">
            <input type="text" name="last-name" placeholder="Apellidos"/>
            <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>
        <div class="input-group input-group-icon">
            <input type="number" name="dni" placeholder="DNI"/>
            <div class="input-icon"><i class="fa fa-id-card"></i></div>
        </div>
        <div class="input-group input-group-icon">
            <input type="text" name="phone" placeholder="Celular"/>
            <div class="input-icon"><i class="fa fa-phone"></i></div>
        </div>
        <div class="input-group input-group-icon">
          <input type="email" name="email" placeholder="Correo electrónico"/>
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
        </div>
        <div class="input-group input-group-icon">
          <input type="text" name="date-birthday" onfocus="this.type='date'" placeholder="Fecha de Nacimiento"/>
          <div class="input-icon"><i class="fas fa-birthday-cake"></i></div>
        </div>
      </div>
      <div class="row">
        <div class="col-half">
          <h4>Sexo</h4>
          <div class="input-group">
            <input id="gender-male" name="gender" type="radio" value="male"/>
            <label for="gender-male">Masculino</label>
            <input id="gender-female" name="gender" type="radio" value="female"/>
            <label for="gender-female">Femenino</label>
          </div>
        </div>
        <div class="row">
          <div class="col-half">
            <h4>Miembro</h4>
            <div class="input-group">
              <input id="member-yes" type="radio" name="member" value="1"/>
              <label for="member-yes">Si</label>
              <input id="member-no" type="radio" name="member" value="2"/>
              <label for="member-no">No</label>
            </div>
          </div>
          <div class="col-half">
            <h4>Estaca/Distrito y Barrio/Rama</h4>
            <div class="input-group">
              <select id="stake-select" name="stake">
                <option hidden value="">Estaca</option>
                @foreach ($stakes as $item)
                    <option value="{{ $item->idStake }}">{{ $item->name }}</option>
                @endforeach
              </select>
              <select id="ward-select" name="ward">
                <option hidden value="">Barrio</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <h4>Alergias</h4>
          <div class="input-group">
            <input id="allergies-no" type="radio" name="allergies" value="no"/>
            <label for="allergies-no"><span><i class="fas fa-times"></i>No</span></label>
            <input id="allergies-yes" type="radio" name="allergies" value="yes"/>
            <label for="allergies-yes"><span><i class="fas fa-check"></i>Si</span></label>
          </div>
          <div class="input-group input-group-icon" id="allergies-group">
            <input id="allergies-text" name="allergies-text" type="text" placeholder="Especifique alergía"/>
            <div class="input-icon"><i class="fas fa-allergies"></i></div>
          </div>
          
          <h4>Discapacidad</h4>
          <div class="input-group">
            <input id="disability-no" type="radio" name="disability" value="no"/>
            <label for="disability-no"><span><i class="fas fa-times"></i>No</span></label>
            <input id="disability-yes" type="radio" name="disability" value="yes"/>
            <label for="disability-yes"><span><i class="fas fa-check"></i>Si</span></label>
          </div>
          <div class="input-group input-group-icon" id="disability-group">
            <input id="disability-text" name="disability-text" type="text" placeholder="Especifique discapacidad"/>
            <div class="input-icon"><i class="fas fa-smile"></i></div>
          </div>
        </div>
        <div class="col-half">
            <h4>Talla de camiseta</h4>
            <div class="input-group">
             <select name="shirt-size">
              <option hidden value="">Seleccione</option>
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="L">L</option>
              <option value="XL">XL</option>
              <option value="XXL">XXL</option>
             </select>
            </div>
        </div>
      </div>
      <h4>Comentarios</h4>
      <div class="input-group input-group-icon">
        <input type="text" name="comments" placeholder="Algo que debamos saber, que esperas de la convención JAS, etc."/>
        <div class="input-icon"><i class="fas fa-comments"></i></div>
    </div>
      <div class="row">
        <h4>Terminos y condiciones</h4>
        <div class="input-group">
          <input id="terms" name="terms" value="ACEPTADO" type="checkbox"/>
          <label for="terms">Yo acepto los términos y condiciones.</label>
        </div>
      </div>
      <button type="submit" id="submitButton" class="btn">Inscribirme</button>
    </form>
    <div id="customAlert" class="custom-alert">
      <span id="customAlertMessage"></span>
      <button id="customAlertClose">Cerrar</button>
    </div>
  </div>

  {{-- MODAL --}}
  @include('modals.terms')
  {{-- SCRIPTS --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.6/dist/sweetalert2.min.js"></script>
  <script src="{{ asset('js/radio_button.js') }}"></script>
  <script src="{{ asset('js/select_value.js') }}"></script>
  <script src="{{ asset('js/open_terms.js') }}"></script>
  <script src="{{ asset('js/submit_form.js') }}"></script>
  <script>
     const csrfToken = '{{ csrf_token() }}';
  </script>
</body>
</html>
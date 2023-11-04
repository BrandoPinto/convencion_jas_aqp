<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Bienvenido!</title>
    <link rel="icon" href="img/logo.jpg">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="banner">
        <div class="bg bg-2_5"></div>
        <div class="bg bg-1"></div>
        <h1>¡CONVENCIÓN JAS AREQUIPA 2023!</h1>
        <div class="bg bg-2"></div>
        <div class="bg bg-3"></div>
        <div class="bg bg-4"></div>
        <div class="bg bg-5"></div>
        <div class="bg bg-6"></div>
        <div class="bg bg-7"></div>
        <div class="bg bg-8"></div>
        <div class="bg bg-9"></div>
    </div>

    <div class="tab intro">
        <a href="{{ route('form') }}" class="btn v1 animation-show">¡INSCRIBETE!</a>
    </div>

    <div class="tab library">
        <div class="animation-show">
          <img src="img/marries.jpg" class="pixelated-image">
          <p>MATRIMIONIOS</p>
        </div>
        <div class="animation-show">
          <img src="img/companies.jpg" class="pixelated-image">
          <p>COMPAÑIAS</p>
        </div>
        <div class="animation-show">
          <img src="img/devotional.jpg" class="pixelated-image">
          <p>DEVOCIONALES</p>
        </div>
        <div class="animation-show">
          <img src="img/party.jpg" class="pixelated-image">
          <p>FIESTA</p>
        </div>
      </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
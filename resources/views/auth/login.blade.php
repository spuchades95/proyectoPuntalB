<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título de la Página</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
  
</head>
<style>
     @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Questrial&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Inter&family=Questrial&display=swap');

h1,
h2,
h3 {
    font-family: 'Questrial', sans-serif;
}

.welcomeLogin {
    display: flex;
    height: 128px;
    flex-direction: column;
    justify-content: center;
    flex-shrink: 0;
    margin-bottom: 150px;
}

.welcomeLogin h2 {
    color: black;
    text-shadow: 0px 5px 5px rgba(0, 0, 0, 0.25);
    font-family: Questrial;
    font-size: 64px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    text-align: center;
    background-color: rgb(0, 0, 0, 0.5);
    -webkit-text-stroke-width: 2px;
    -webkit-text-stroke-color: white;
    /* -webkit-text-stroke: 1px black, 1px white; */
}

.textHeaderLogin {
    color: #000;
    font-size: 96px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    /* margin-bottom: 150px; */
}

.background-left {
    background-image: url(/public/image/loginBRImage.svg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}



input:not([type="checkbox"]) {
    border-radius: 0px !important;
    border-top: none !important;
    border-left: none !important;
    border-right: none !important;
    border-bottom: 3px solid #000 !important;
    font-family: questrial !important;
    /* margin-top: 150px !important; */
}

input:is([type="checkbox"]) {
    width: 27.642px;
    height: 26.25px;
    flex-shrink: 0;
    border: 2px solid;
    margin-right: 5px;
}


input::placeholder {
    color: #5E5E5E important !;
    text-align: center;
    font-family: Questrial;
    font-size: 20px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

input[type="text"]:focus,
input[type="password"]:focus {
    border-color: #ced4da;
    /* Cambia el color del borde al hacer foco */
    box-shadow: none;
    /* Quita cualquier sombra que se aplique por defecto */
    outline: none;
    /* Quita el resaltado predeterminado al hacer foco */
}

.remeberPassword {
    color: #000;
    text-align: center;

    /* Lorem ipsum dolor (0.8em) */
    font-family: Questrial;
    font-size: 12.8px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

a {
    color: var(--Titan-White-600);
    text-align: center;

    text-decoration: none;
    font-family: Questrial;
    font-size: 12.8px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

button {
    display: flex;
    width: 108px;
    padding: 10px 15px;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border-radius: 5px;
    border: 1px solid #EFF8FF;
    background: #1D2834;
    color: rgb(239, 248, 255, 1);
    text-align: center;
    font-family: Questrial;
    font-size: 16px;
    font-style: normal;
    font-weight: 400;
    line-height: 28px;
    /* 175% */
}



</style>
<body>
<div class="container-fluid">
  <div
    class="row h-75 w-75 postal position-absolute top-50 start-50 translate-middle shadow p-4"
  >
    <div
      class="col-md-6 h-100 d-flex flex-column justify-content-center background-left position-relative"
    >
      <div class="welcomeLogin w-100">
        <h2 class="w-100">BIENVENDIDA.</h2>
      </div>

      <img
      src="{{ asset('image/Group.svg') }}"
        alt="Logo Portos de  Galicia"
        class="img-fluid position-absolute bottom-0 start-0 mb-4 ms-3"
      />
    </div>

    <div class="col-md-6 h-100 d-flex flex-column justify-content-center">
      <div>
        <h1 class="textHeaderLogin"><strong>Login</strong></h1>

        <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="mb-5">
            <input
              type="email"
              class="form-control"
              name="email"
              placeholder="EMAIL"
            />
          </div>

          <div class="mb-5">
            <input
              type="password"
              class="form-control"
              name="password"
              placeholder="CONTRASEÑA"
            />
          </div>

          <div class="mb-5 d-flex justify-content-between align-items-center">
            <div class="form-check">
              <input
                type="checkbox"
                class="form-check-input"
                id="recordarContrasena"
                name="recordarContrasena"
              />
              <label class="remeberPassword" for="recordarContrasena"
                >Recordar contraseña</label
              >
            </div>

            <a href="#">¿Olvidaste tu contraseña?</a>
          </div>

          <button type="submit" class="mt-4 float-end">ENVIAR</button>
        </form>
      </div>
    </div>
  </div>
</div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>

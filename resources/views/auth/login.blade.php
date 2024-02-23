<div class="container-fluid">
  <div class="row h-75 w-75 postal position-absolute top-50 start-50 translate-middle shadow p-4">
    <!-- Decoración a la izquierda -->
    <div class="col-md-6  h-100 d-flex flex-column justify-content-center background-left position-relative ">
      <div class="welcomeLogin w-100">
        <h2 class="w-100">BIENVENDIDA.</h2>
      </div>
      <!-- Imagen abajo a la izquierda -->
      <img src="/assets/img/Group.svg" alt="Logo Portos de  Galicia"
        class="img-fluid position-absolute bottom-0 start-0 mb-4 ms-3">
    </div>

    <!-- Formulario de inicio de sesión a la derecha -->
    <div class="col-md-6 h-100 d-flex flex-column justify-content-center">
      <div>
        <h1 class="textHeaderLogin"><strong>Login</strong></h1>
        <div  class="text-danger mb-3">
          {{ errorMessage }}
        </div>
        <!-- Formulario -->
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <!-- Campo de Usuario -->
          <div class="mb-5">
            <!-- <label for="usuario" class="form-label">Usuario</label> -->
            <input type="text" class="form-control" id="email" name="email" placeholder="USUARIO" value="{{ old('email') }}" required autofocus>
          </div>

          <!-- Campo de Contraseña -->
          <div class="mb-5">
            <!-- <label for="contrasena" class="form-label">Contraseña</label> -->
            <!-- <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="CONTRASEÑA" [(ngModel)]="password"> -->
            <input type="password" class="form-control" id="password" name="password" placeholder="CONTRASEÑA" required>
          </div>

          <!-- Contenedor para Checkbox y Enlace -->
          <div class="mb-5 d-flex justify-content-between align-items-center">
            <!-- Checkbox para recordar contraseña -->
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
              <label class="remeberPassword" for="remember_me">Recordar contraseña</label>
            </div>
            <!-- Enlace para recuperar contraseña -->
            <a href="#" >¿Olvidaste tu contraseña?</a>
          </div>

          <!-- Botón de Inicio de Sesión -->
          <button type="submit" class="mt-4 float-end">ENVIAR</button>
        </form>
        <ng-template #forgotPasswordModal>
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Recuperar Contraseña</h4>
              <button type="button" class="close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <label for="inputEmail">Correo Electrónico</label>
              <input type="email" class="form-control" id="inputEmail" name="inputEmail">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Enviar</button>
            </div>
          </div>
        </ng-template>
      </div>
    </div>
  </div>
</div>

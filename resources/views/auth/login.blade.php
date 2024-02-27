 <!-- <x-guest-layout> -->
    <!-- Session Status -->
    <!-- <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf -->

        <!-- Email Address -->
        <!-- <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div> -->

        <!-- Password -->
        <!-- <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div> -->

        <!-- Remember Me -->
        <!-- <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
          
            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>  -->

<style>

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
}

.textHeaderLogin {
    color: #000;
    font-size: 96px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

.background-left {
    background-image: url(/assets/img/loginBRImage.svg);
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
}

input[type="checkbox"] {
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
    box-shadow: none;
    outline: none;
}

.remeberPassword {
    color: #000;
    text-align: center;
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
}

</style>
<!-- 
<x-guest-layout>
    <div class="container-fluid">
        <div class="row h-75 w-75 postal position-absolute top-50 start-50 translate-middle shadow p-4">
         
            <div class="col-md-6 h-100 d-flex flex-column justify-content-center background-left position-relative ">
                <div class="welcomeLogin w-100">
                    <h2 class="w-100">BIENVENDIDA.</h2>
                </div>
        
                <img src="../partials   /img/Group.svg" alt="Logo Portos de  Galicia" class="img-fluid position-absolute bottom-0 start-0 mb-4 ms-3">
            </div>

  
            <div class="col-md-6 h-100 d-flex flex-column justify-content-center">
                <div>
                    <h1 class="textHeaderLogin"><strong>Login</strong></h1>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
             
                        <div class="mb-5">
                            <input type="email" class="form-control" id="email" name="email" placeholder="EMAIL" required autofocus autocomplete="username">
                            @error('email')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-5">
                            <input type="password" class="form-control" id="password" name="password" placeholder="CONTRASEÑA" required autocomplete="current-password">
                            @error('password')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>

                 
                        <div class="mb-5 d-flex justify-content-between align-items-center">
                    
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                <label class="remeberPassword" for="remember_me">Recordar contraseña</label>
                            </div>
                     
                            <a href="#">¿Olvidaste tu contraseña?</a>
                        </div>

                     
                        <button type="submit" class=" mt-4 float-end">ENVIAR</button>
                    </form>
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ms-3">{{ __('Log in') }}</x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout> -->


<div class="container-fluid">
  <div class="row h-75 w-75 postal position-absolute top-50 start-50 translate-middle shadow p-4">
    <!-- Decoración a la izquierda -->
    <div class="col-md-6  h-100 d-flex flex-column justify-content-center background-left position-relative ">
      <div class="welcomeLogin w-100">
        <h2 class="w-100">BIENVENDIDA.</h2>
      </div>

      <!-- Imagen abajo a la izquierda -->
      <img src="https://th.bing.com/th/id/R.709ee9b5af591e741982181df8b128b0?rik=i1utWP%2b%2fFIqglA&riu=http%3a%2f%2fpe.tiching.com%2fuploads%2fcontents%2f2011%2f07%2f21%2f36389_1311255149.jpg&ehk=LpYfo%2fmjOs2lkvqPzKU0RHklHINqUJcPKWq%2bS2OeTVU%3d&risl=&pid=ImgRaw&r=0" alt="Logo Portos de Galicia" class="img-fluid position-absolute bottom-0 start-0 mb-4 ms-3">
    </div>

    <!-- Formulario de inicio de sesión a la derecha -->
    <div class="col-md-6 h-100 d-flex flex-column justify-content-center">
      <div>
        <h1 class="textHeaderLogin"><strong>Login</strong></h1>
        <!-- Formulario -->
        <form [formGroup]="loginForm" (ngSubmit)="onSubmit()" class="needs-validation" novalidate>
          <div  class="alert alert-danger mt-3">
                            
                                @error('email')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
          </div>
          <div class="alert alert-danger mt-3">
                             @error('password')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
          </div>
          <!-- Campo de Usuario -->
          <div class="mb-5">
            <input type="email" class="form-control" formControlName="email" placeholder="EMAIL" required>
            <div class="invalid-feedback">Please provide a valid email.</div>
          </div>

          <!-- Campo de Contraseña -->
          <div class="mb-5">
            <input type="password" class="form-control" formControlName="password" placeholder="CONTRASEÑA" required>
            <div class="invalid-feedback">Please provide a password.</div>
            <a href="#">Forgot your password?</a>
          </div>

          <!-- Contenedor para Checkbox y Enlace -->
          <div class="mb-5 d-flex justify-content-between align-items-center">
            <!-- Checkbox para recordar contraseña -->
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="recordarContrasena" name="recordarContrasena">
              <label class="remeberPassword" for="recordarContrasena">Remember password</label>
            </div>

            <!-- Enlace para recuperar contraseña -->
            <a href="#">Forgot your password?</a>
          </div>

          <!-- Botón de Inicio de Sesión -->
          <button type="submit" class="btn btn-primary mt-4 float-end">ENVIAR</button>
        </form>

        <!-- Modal para recuperar contraseña -->
        <ng-template #forgotPasswordModal>
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Forgot Password</h4>
              <button type="button" class="close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <label for="inputEmail">Email Address</label>
              <input type="email" class="form-control" id="inputEmail" name="inputEmail" required>
              <div class="invalid-feedback">Please provide a valid email.</div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Send</button>
            </div>
          </div>
        </ng-template>
      </div>
    </div>
  </div>
</div>

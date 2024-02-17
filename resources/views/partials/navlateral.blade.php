<div class="azul500 col-md-2 d-flex flex-column align-items-center">
    <img alt="Bootstrap Image Preview" src="/image/Group.svg" class="logo" />
    <a href="" class=" mt-5 boton dashboard">DASHBOARD</a>
    <a href="{{ route('roles.index') }}" class=" mt-5 boton rol">GESTIÓN ROLES</a>
    <a href="{{ route('usuarios.index') }}" class=" mt-5 boton user">GESTIÓN USUARIOS</a>
    <a href="{{ route('instalaciones.index') }}" class=" mt-5 boton ins">GESTIÓN INSTALACIONES</a>
</div>
<style>
    :root {
        --wedgewood50: #f5f7fa;
        --wedgewood100: #eaeff4;
        --wedgewood200: #d0dce7;
        --wedgewood300: #a6bed3;
        --wedgewood500: #4f7796;
        --wedgewood600: #426787;
        --wedgewood700: #36536e;
        --wedgewood950: #1d2834;
        --regentStBlue300: #add8e6;
        --regentStBlue950: #162f3b;
        --gold500: #ffd700;
        --gold950: #442604;
        --goldenTainoi300: #ffc745;
        --goldenTainoi900: #7a2e0d;
        --titanWhite50: #f5f6fd;
        --titanWhite900: #3f2d85;
    }

    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Questrial&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Inter&family=Questrial&display=swap');

    .azul500 {

        width: 200px;
        height: 100vh;
        flex-shrink: 0;
        background-color: var(--wedgewood500);
        filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));

    }

    .logo {
        width: 90%;
        height: 95.909px;
        flex-shrink: 0;
        margin: 1vh;
        margin-top: 5vh;

    }

    .boton {
        /* estilo de la caja*/
        border-radius: 2px;
        border: 1px solid var(--wedgewood50);
        background: var(--wedgewood50);
        color: #36536e;
        width: 160px;
        height: 40px;
        display: flex;
        text-align: center;
        margin-top: 40px;
        filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));

        /* texto del boton*/
        color: var(--wedgewood700);
        -webkit-text-stroke: 1.5px var(--wedgewood700);
        font-family: "Questrial", sans-serif;
        font-size: 13px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        text-transform: uppercase;
        padding-left: 10px;
        background-repeat: no-repeat;
        background-size: 24px 24px;
        background-position: 5px center;
        padding-left: 30px;
        text-decoration: none;
    }

    .boton:hover,
    .boton:focus,
    .boton:active {
        border-radius: 2px;
        width: 160px;
        height: 40px;
        display: flex;
        text-align: left;
        margin-top: 40px;
        border: 1px solid var(--wedgewood700);
        background: var(--wedgewood700);
        background-color: #36536e;
        color: #eaeff4;
        text-align: center;
        cursor: not-allowed;
        /* texto del boton*/
        color: var(--wedgewood50);
        -webkit-text-stroke: 1.5px var(--wedgewood50);
        padding-left: 10px;
        background-repeat: no-repeat;
        background-size: 24px 24px;
        background-position: 5px center;
        padding-left: 30px;

    }

    .rol {
        background-image: url('/image/rolesIcon.svg');

    }

    .user {
        background-image: url('/image/userIcon.svg');

    }

    .ins {
        background-image: url('/image/instIcon.svg');

    }

    .dashboard {
        background-image: url('/image/control.svg');

    }

    .rol:hover,
    .rol:focus,
    .rol:active {
        background-image: url('/image/rolesL.svg');

    }

    .user:hover,
    .user:focus,
    .user:active {
        background-image: url('/image/userL.svg');

    }

    .ins:hover,
    .ins:focus,
    .ins:active {
        background-image: url('/image/instL.svg');

    }

    .dashboard:hover,
    .dashboard:focus,
    .dashboard:active {
        background-image: url('/image/controlL.svg');

    }
</style>
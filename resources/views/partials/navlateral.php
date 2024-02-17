<div class="azul500 col-md-2 d-flex flex-column">
    <img alt="Bootstrap Image Preview" src="/image/Group.svg" class="logo" />
    <button type="button" class="btn mt-5 botonNavA rol">GESTIÓN ROLES</button>
    <button type="button" class="btn mt-5 botonNavA user">GESTIÓN USUARIOS</button>
    <button type="button" class="btn mt-5 botonNavB ins">GESTIÓN INSTALACIONES</button>
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

    /* .btn {
        color: var(--wedgewood700) !important;
        background: var(--wedgewood50) !important;
        width: 160px !important;
        height: 40px !important;
        flex-shrink: 0 !important;
        border-radius: 2px !important;
        border: 1px solid var(--wedgewood700) !important;
        font-family: Questrial;
        font-size: 10px !important;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        font-family: 'Questrial', sans-serif;
        text-align: center;
        margin-left: 10px;
        background-repeat: no-repeat;
        background-size: 24px 24px;
        background-position: 5px center;
        padding-left: 30px;
    } */

    .btn {
        /* estilo de la caja*/
        border-radius: 2px;
        border: 1px solid var(--wedgewood50) !important;
        background: var(--wedgewood50) !important;
        color: #36536e !important;
        width: 160px;
        height: 40px;
        display: flex;
        text-align: left;
        margin-top: 40px;
        filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));

        /* texto del boton*/
        color: var(--wedgewood700) !important;
        -webkit-text-stroke: 1.5px var(--wedgewood700) !important;
        font-family: Questrial;
        font-size: 13px !important;
        font-style: normal !important;
        font-weight: 400 !important;
        line-height: normal !important;
        text-transform: uppercase !important;
        padding-left: 10px !important;
        background-repeat: no-repeat !important;
        background-size: 24px 24px !important;
        background-position: 5px center !important;
        padding-left: 30px !important;
    }

    .btn:hover,
    .btn:focus,
    .btn:active {

        border: 1px solid var(--wedgewood700) !important;
        background: var(--wedgewood700) !important;
        background-color: #36536e !important;
        color: #eaeff4 !important;

        cursor: not-allowed !important;
        /* texto del boton*/
        color: var(--wedgewood50) !important;
        -webkit-text-stroke: 1.5px var(--wedgewood50) !important;
        padding-left: 10px !important;
        background-repeat: no-repeat !important;
        background-size: 24px 24px !important;
        background-position: 5px center !important;
        padding-left: 30px !important;

    }

    .rol {
        background-image: url('/image/rolesIcon.svg') !important;

    }

    .user {
        background-image: url('/image/userIcon.svg') !important;

    }

    .ins {
        background-image: url('/image/instIcon.svg') !important;

    }

    .rol:hover,
    .rol:focus,
    .rol:active {
        background-image: url('/image/rolesL.svg') !important;

    }

    .user:hover,
    .user:focus,
    .user:active {
        background-image: url('/image/userL.svg') !important;

    }

    .ins:hover,
    .ins:focus,
    .ins:active {
        background-image: url('/image/instL.svg') !important;

    }
</style>
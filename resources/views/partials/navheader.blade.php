<div class="arriba col-md-12 d-flex justify-content-end align-items-center">
    <div class="d-flex align-items-center justify-content-around">
        <h3 class="mt-3">¡Hola!
            @if(Auth::check())
            {{ Auth::user()->NombreUsuario }}
            @endif
        </h3>

        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <img src="/image/logout.svg" alt="Logout" class="mx-3"> </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>



        </a>
    </div>
</div>
<style>
    .arriba {
        width: 100%;
        height: 7vh;
        background-color: #f5f7fa;


    }

    img {
        width: 40px;


    }
</style>
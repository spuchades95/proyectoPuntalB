<div class="arriba col-md-12 d-flex justify-content-end">
    <h3 class="mt-3">¡Hola!</h3>
    <img src="/image/userImg.svg" alt="">
 <a href="{{ route('login') }}" onclick="event.preventDefault(); document.getElementById('login-form').submit();">
 <img src="/image/logout.svg"alt="Logout">
</a>

<form id="login-form" action="{{ route('login') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
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
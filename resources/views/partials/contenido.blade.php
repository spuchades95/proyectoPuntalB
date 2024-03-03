<link href="{{ asset('css/plantilla.css') }}" rel="stylesheet">
<div class="contenido col-md-12">
  @yield('content')
  @yield('scroll-buttons')

</div>
<style>
  .contenido {
    height: 93vh;
    background-color: #eaeff4;
    flex: 1;
    display: flex;
    flex-direction: column;
    overflow-y: hidden;
    position: relative;
    /* Añadido */
  }

  .scrollUpContainer,
  .scrollDownContainer {
    position: fixed;
    right: 10px;
    /* Ajusta la posición horizontal de las flechas */
    z-index: 2;
    /* Asegura que las flechas estén por encima del contenido */
  }

  .scrollUpContainer {
    top: 200px;
    /* Ajusta la posición vertical de la flecha de arriba */
  }

  .scrollDownContainer {
    bottom: 10px;
    /* Ajusta la posición vertical de la flecha de abajo */
  }

  .scrollUpContainer img,
  .scrollDownContainer img {
    width: 40px;
    /* Ajusta el tamaño del icono según sea necesario */
    cursor: pointer;
    /* Cambia el cursor al pasar sobre el icono */
  }
</style>
<script>
  const scrollUp = document.getElementById('scrollUp');
  const scrollDown = document.getElementById('scrollDown');
  const contenido = document.querySelector('.contenido');

  scrollUp.addEventListener('click', () => {
    // Desplaza el contenido hacia arriba
    contenido.scrollTop -= 50; // Ajusta la cantidad de desplazamiento según sea necesario
  });

  scrollDown.addEventListener('click', () => {
    // Desplaza el contenido hacia abajo
    contenido.scrollTop += 50; // Ajusta la cantidad de desplazamiento según sea necesario
  });
</script>
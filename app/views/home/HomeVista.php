<?php require RUTA_APP . '/views/inc/header.php' ;?>

<!-- Contenido del sitio-->
<div class="container">
      <!-- Imagen principal -->
      <header class="showcase">
        <h2>!Proyecto Formativo!</h2>
        <p>En esta aplicacion solucionaremos el control de entrada y salida del  Centro de Tecnologias Agroindustriales Sena</p>
      </header>
     
      <!-- Tarjetas  -->
      <div class="news-cards">
        <div>
          <img src="img/exito.svg" alt="" />
          <h3>Mision.</h3>
          <p>Garantizar la administración de los bienes ingresados de tal forma que se lleve un 
        control eficiente y eficaz con respecto a la entrada y salida de elementos del Centro de 
        Industrias Agrindustriales SENA. Con este se espera tener bienes
        inventariados y controlados oportunamente de forma eficiente.        
          </p>
        </div>
        <div>
          <img src="img/ideas.svg" alt="" />
          <h3>Vision.</h3>
          <p>Un Sena en la innovacion de procesos para el manejo y el control digital de bienes ingresados brindando a los usuarios comodidad y productividad alta.
          </p>
        </div>
        <div>
          <img src="img/computadora.svg" alt="" />
          <h3>Bienes?</h3>
          <p>Un bien es un objeto tangible o intangible que posee valor económico y es producido con el fin de satisfacer una determinada necesidad o deseo.
          </p>
        </div>
        <div>
          <img src="img/reloj.svg" alt="" />
          <h3>Control de Entrada y Salida?</h3>
          <p>Entradas/salidas es una técnica de control de corto plazo; generalmente se realiza utilizando en espacios de tiempo diarios.
          Con ellos se tendra una buena gestion de los bienes que entran y salen del Sena.
          </p>
        </div>        
      </div>

      <!-- Follow -->
      <section class="social">
        <p>Redes </p>
        <div class="links">
          <a href="https://facebook.com">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="https://gmail.com">
            <i class="fas fa-envelope"></i>
          </a>
        </div>
    </section>
</div>
<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginLabel">Ingreso al Sistema</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmlogin" method="POST">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input id="usuario" class="form-control" type="text" name="usuario"
                            placeholder='Usuario registrado' required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" class="form-control" type="password" name="password"
                            placeholder='Password del usuario' required>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <input id="enviar" class="btn btn-success" type="submit" value="Ingresar">

                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
  </script>
<script src = "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
integrity = "sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
crossorigin = "anonymous" >
</script>

<script src="<?php echo RUTA_URL; ?>/js/modulos/inicio.js"></script>

<!-- Fin del codigo del sitio -->
<?php require RUTA_APP . '/views/inc/footer.php' ;?>
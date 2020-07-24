<?php require RUTA_APP . '/views/inc/header2.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<!-- Main content -->
<section class="content container-fluid">

    <div class="row">

        <div class="col-md-12">

            <div class="card" id="vistatabla">
                <div class="card-header">
                    <b>Controles</b> <button type="button" id="nuevo" class="btn btn-success" data-toggle='tooltip'
                        title=' Agregar un controles'> <i class="icon-plus"></i> </button>
                </div>
                <div class="card-body">
                    <table id="mitabla" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>id</th>
                                <th>Identificacion</th>
                                <th>Fecha y Hora Entrada</th>                                                                   
                                <th>Fecha y Hora Salida</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <div class="card" id="formulario">
                <div class="card-header">
                    <b>Controles</b>
                </div>
                <div class="card-body">
                    <form class="formeditar" method="POST">
                        <div class="row">
                            <div class="col-md-5">
                                <label for="my-input">Id</label>
                                <input id="id" class="form-control" type="text" name="id" readonly>
                                <label for="my-input">Identificacion</label>
                                <input id="identificacion" class="form-control" type="text" name="identificacion" required>
                                <label for="my-input">Fecha y Hora Entrada</label>
                                <input id="fechae" class="form-control" type="datetime" name="fechae" required>
                                <label for="my-input">Fecha y Hora Salida</label>
                                <input id="fechas" class="form-control" type="datetime" name="fechas" required>
                            </div>                            
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="button" id="cancelar"><i class="icon-reply"></i>
                                Cancelar</button>
                            <input id="guardar" class="btn btn-success" type="submit" value="Guardar">
                        </div>
                    </form>
                </div>                
            </div>
            
        </div>
    </div>
</section>
</div>

    <!-- jQuery 3 -->
    <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
    <script src="<?php echo RUTA_URL; ?>/js/bootstrap.min.js"></script>
    <!-- Admin App -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
    <script src="<?php echo RUTA_URL; ?>/js/modulos/controles.js"></script>
    <!-- Scroll Reveal -->  
    <script src="<?php echo RUTA_URL; ?>/js/mains.js"></script>

<?php require RUTA_APP . '/views/inc/footer2.php'; ?>
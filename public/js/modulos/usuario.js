const RUTA_URL = "http://localhost/ProyectoCljsoft/usuario/";
/* Funcion anonima -- para poner datos en la tabla */
var listarusuario = function () {
    /* Define variable tabla - Donde traer el elemento mitabla y le asigno DataTable */
    var tabla = $("#mitabla").DataTable({
        ajax: {
            /* Llamamos el metodo llenarTablaCliente del controlador */
            url: RUTA_URL + "llenarTablaUsuario",
            dataSrc: "",
        },
        /* Parametro colums */
        columns: [
            {
                defaultContent:
                    "<button type='button' class ='editar btn btn-secundary' data-toggle='tooltip' data-placement='top' title='Edita un cliente'> <i class='icon-edit'></i></button>",
            },
            {
                defaultContent:
                    "<button type='button' class ='eliminar btn btn-secondary' data-toggle='tooltip' data-placement='top' title='Elimina un cliente'> <i class='icon-trash'></i></button>",
            },
            {
                defaultContent:
                    "<button type='button' class ='imprimir btn btn-secondary' data-toggle='tooltip' data-placement='top' title='Imprimir'> <i class='icon-print'></i></button>",
            },
            { data: "idusuario", },
            { data: "usnombre", },
            { data: "ususuario", },
            { data: "usclave", },
            { data: "usrol", },
        ],
        columnDefs: [
            {
                width: "5%",
                targets: 0,
            },
            {
                width: "5%",
                targets: 1,
            },
            {
                width: "5%",
                targets: 2,
            },
        ],
    });
    editar("#mitabla tbody", tabla);
    eliminar("#mitabla tbody", tabla);
};

/* Funcion anonima -- para ver el formulario */
var nuevo = function () {
    /* Evento click para mostrar el formulario */
    $("#nuevo").on("click", function () {
        mostrarForm(true);
    });
};

/* Funcion anonima -- tbody y table se requiere para poder manipularlo */
var editar = function (tbody, table) {
    /* Cuando tbody se hace la accion click en editar desencadena la funcion*/
    $(tbody).on("click", "button.editar", function () {
        /* Obtiene de la tabla la fila donde este dando click el valor que tenga de informacion */
        var dato = table.row($(this).parents("tr")).data();
        mostrarForm(true);
        var idusuario = $("#id").val(dato.idusuario);
        var nombre = $("#nombre").val(dato.usnombre);
        var usuario = $("#usuario").val(dato.ususuario);
        var clave = $("#clave").val(dato.usclave);
        var rol = $("#rol").val(dato.usrol);
    });
};

/* Funcion anonima -- para agregar */
var guardar = function () {
    $("form").on("submit", function (e) {
        e.preventDefault();
        var datos = new FormData($("form")[0]);
        $.ajax({
            method: "POST",
            url: RUTA_URL + "crearUsuario",
            data: datos,
            processData: false,
            contentType: false,
        })
            .done(function (data) {
                alert("Accion Realizada con exito !");
                mostrarForm(false);
            })
            .fail(function (data) {
                alert("operacion fallida !");
                mostrarForm(false);
            });
    });
};

/* Funcion anonima -- para limpiar */
var limpiar = function () {
    $("#id").val("");
    $("#nombre").val("");
    $("#usuario").val("");
    $("#clave").val("");
    $("#rol").val("");
};

/* Funcion anonima -- para cancelar */
var cancelar = function () {
    $("#cancelar").on("click", function () {
        limpiar();
        mostrarForm(false);
        $("#mitabla").DataTable().ajax.reload();
    });
};

/* Funcion anonima -- que recibe un estado true o false*/
var mostrarForm = function (estado) {
    /* pregunta si es true muestra el formulario y esconde la tabla */
    if (estado) {
        $("#formulario").show();
        $("#vistatabla").hide();
    } else {    /* si es false esconde el formulario y muestra la tabla */
        $("#formulario").hide();
        $("#vistatabla").show();
    }
};

/* Funcion anonima -- para eliminar*/
var eliminar = function (tbody, table) {
    $(tbody).on("click", "button.eliminar", function () {
        var dato = table.row($(this).parents("tr")).data();
        var respuesta = confirm(
            "Seguro que desea eliminar : " +
            dato.usnombre
        );
        if (respuesta) {
            $.ajax({
                method: "POST",
                url: RUTA_URL + "eliminarUsuario",
                data: { id: dato.idusuario },
            })
                .done(function (data) {
                    alert("Accion Realizada con exito !");
                    $("#mitabla").DataTable().ajax.reload();
                })
                .fail(function (data) {
                    alert("operacion fallida !");
                });
        } else {
            alert("Operacion cancelada por el usuario.");
        }
    });
};

/* Metodo ready - especifica una función para ejecutar cuando el DOM esté completamente cargado. */
$(document).ready(function () {
    /* Invoco las funciones a realizar a la tabla */
    listarusuario();
    nuevo();
    editar();
    eliminar();
    guardar();
    cancelar();
    limpiar();
    /* Invovo la funcion para mostrar el formulario - false esconde */
    mostrarForm(false);
});
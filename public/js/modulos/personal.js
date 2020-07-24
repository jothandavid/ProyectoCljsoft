const RUTA_URL = "http://localhost/ProyectoCljsoft/personal/";

var listarpersonal = function () {
    var tabla = $("#mitabla").DataTable({
        ajax: {
            url: RUTA_URL + "llenarTablaPersonal",
            dataSrc: "",
        },
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
            {
                data: "idpersonal",
            },
            {
                data: "identificacion",
            },
            {
                data: "nombre",
            },
            {
                data: "telefono",
            },
            {
                data: "correo",
            },
            {
                data: "fichaformacion",
            },
            {
                data: "rol",
            },
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

var nuevo = function () {
    $("#nuevo").on("click", function () {
        mostrarForm(true);
    });
};

var editar = function (tbody, table) {
    $(tbody).on("click", "button.editar", function () {
        var dato = table.row($(this).parents("tr")).data();
        mostrarForm(true);
        var idpersonal = $("#id").val(dato.idpersonal);
        var identificacion = $("#identificacion").val(dato.identificacion);
        var nombre = $("#nombre").val(dato.nombre);
        var telefono = $("#telefono").val(dato.telefono);
        var correo = $("#correo").val(dato.correo);
        var fichaformacion = $("#fichaformacion").val(dato.fichaformacion);
        var rol = $("#rol").val(dato.rol);

    });
};

var guardar = function () {
    $("form").on("submit", function (e) {
        e.preventDefault();
        var datos = new FormData($("form")[0]);
        $.ajax({
            method: "POST",
            url: RUTA_URL + "crearPersonal",
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

var limpiar = function () {
    $("#id").val("");
    $("#identificacion").val("");
    $("#nombre").val("");
    $("#telefono").val("");
    $("#correo").val("");
    $("#fichaformacion").val("");
    $("#rol").val("");
};

var cancelar = function () {
    $("#cancelar").on("click", function () {
        limpiar();
        mostrarForm(false);
        $("#mitabla").DataTable().ajax.reload();
    });
};

var mostrarForm = function (estado) {
    if (estado) {
        $("#formulario").show();
        $("#vistatabla").hide();
    } else {
        $("#formulario").hide();
        $("#vistatabla").show();
    }
};

var eliminar = function (tbody, table) {
    $(tbody).on("click", "button.eliminar", function () {
        var dato = table.row($(this).parents("tr")).data();
        var respuesta = confirm(
            "Seguro que desea eliminar : " +
            dato.nombre
        );
        if (respuesta) {
            $.ajax({
                method: "POST",
                url: RUTA_URL + "eliminarPersonal",
                data: { id: dato.idpersonal },
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

$(document).ready(function () {
    listarpersonal();
    nuevo();
    editar();
    eliminar();
    guardar();
    cancelar();
    limpiar();
    mostrarForm(false);
});
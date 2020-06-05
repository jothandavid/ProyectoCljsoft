const RUTA_URL = "http://localhost/ProyectoCljsoft/bienes/";

var listarbienes = function () {
    var tabla = $("#mitabla").DataTable({
        ajax: {
            url: RUTA_URL + "llenarTablaBienes",
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
                data: "idbien",
            },
            {
                data: "identificacion",
            },
            {
                data: "tipo",
            },
            {
                data: "marca",
            },
            {
                data: "serie",
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
        var idbien = $("#id").val(dato.idbien);
        var identificacion = $("#identificacion").val(dato.identificacion);
        var tipo = $("#tipo").val(dato.tipo);
        var marca = $("#marca").val(dato.marca);
        var serie = $("#serie").val(dato.serie);
    });
};

var guardar = function () {
    $("form").on("submit", function (e) {
        e.preventDefault();
        var datos = new FormData($("form")[0]);
        $.ajax({
            method: "POST",
            url: RUTA_URL + "crearBienes",
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
    $("#tipo").val("");
    $("#marca").val("");
    $("#serie").val("");
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
            dato.identificacion
        );
        if (respuesta) {
            $.ajax({
                method: "POST",
                url: RUTA_URL + "eliminarBienes",
                data: { id: dato.idbien },
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
    listarbienes();
    nuevo();
    editar();
    eliminar();
    guardar();
    cancelar();
    limpiar();
    mostrarForm(false);
});


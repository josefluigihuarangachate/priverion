// REGISTRAR
$(document).ready(function () {
    $(".btnregistrar").click(function () {

        var nombre = document.getElementById("txtnombre").value;
        var color = document.getElementById("txtcolor").value;
        var stock = document.getElementById("txtstock").value;
        var precio = document.getElementById("txtprecio").value;
        $.ajax({
            type: "POST",
            url: api + "registrar",
            data: {
                nombre: nombre,
                color: color,
                stock: stock,
                precio: precio
            },
            dataType: "json",
            encode: true
        }).done(function (json) {

            var link = "";
            if (json['status'] == "Ok") {
                link = "#";
            }
            ToastAlert(json['status'], json['msg'], link);
        });
    });
});

// ELIMINAR
function eliminarproducto(id) {
    $.post(api + "eliminar", {id: id}, function (json) {
        var link = "";
        if (json['status'] == "Ok") {
            link = "#";
        }
        ToastAlert(json['status'], json['msg'], link);
    });
}

// MOSTRAR DATOS
function editarproducto(id) {
    $.post(api + "mostrar", {id: id}, function (json) {
        ToastAlert(json['status'], json['msg'], '');

        if (json['status'] == 'Ok') {
            var datos = json['data'];

            document.getElementById('txtcodigo').value = id;
            document.getElementById('txtnombreupdate').value = datos[0].atr_nombre;
            document.getElementById('txtcolorupdate').value = datos[0].atr_color;
            document.getElementById('txtstockupdate').value = datos[0].atr_stock;
            document.getElementById('txtprecioupdate').value = datos[0].atr_precio;
        }
    });
}

// ACTUALIZAR DATOS
$(document).ready(function () {
    $(".btnguardarcambios").click(function () {
        $.ajax({
            type: "POST",
            url: api + "actualizar",
            data: {
                id: document.getElementById("txtcodigo").value,
                nombre: document.getElementById("txtnombreupdate").value,
                color: document.getElementById("txtcolorupdate").value,
                stock: document.getElementById("txtstockupdate").value,
                precio: document.getElementById("txtprecioupdate").value
            },
            dataType: "json",
            encode: true
        }).done(function (json) {
            var link = "";
            if (json['status'] == "Ok") {
                link = "#";
            }
            ToastAlert(json['status'], json['msg'], link);
        });
        event.preventDefault();
    });
});
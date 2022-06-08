$(document).ready(function () {
    $(".btnlogin").click(function () {
        $.ajax({
            type: "POST",
            url: api + "login",
            data: {
                usuario: document.getElementById("txtusuario").value,
                clave: document.getElementById("txtcontrasenia").value
            },
            dataType: "json",
            encode: true
        }).done(function (json) {
            ToastAlert(json['status'], json['msg'], json['redireccionar']);
        });

        event.preventDefault();
    });
});
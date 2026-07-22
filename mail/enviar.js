$(function () {

    $("#contactForm").submit(function (event) {

        event.preventDefault();

        var nombre = $("#nombre").val();
        var email = $("#email").val();
        var telefono = $("#telefono").val();
        var mensaje = $("#mensaje").val();

        var boton = $("#sendMessageButton");

        boton.prop("disabled", true);

        $.ajax({
            url: "mail/enviar.php",
            type: "POST",
            data: {
                nombre: nombre,
                email: email,
                telefono: telefono,
                mensaje: mensaje
            },
            cache: false,

            success: function (response) {

                $("#formMensaje").html(
                    "<div class='alert alert-success'>" + response + "</div>"
                );

                $("#contactForm").trigger("reset");
            },

            error: function () {

                $("#formMensaje").html(
                    "<div class='alert alert-danger'>❌ No se pudo enviar el mensaje. Intenta nuevamente.</div>"
                );
            },

            complete: function () {

                setTimeout(function () {
                    boton.prop("disabled", false);
                }, 1000);

            }

        });

    });

});
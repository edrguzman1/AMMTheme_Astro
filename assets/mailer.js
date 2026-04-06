function sendMail(e) {
            event.preventDefault();
            var valid = true;
            var camposError = "";
            var valor = null;
            var primerError = null;
            valor = document.getElementById("name").value;
            if (valor == null || valor.length == 0) {
                valid = false;
                camposError = camposError + "Nombre, "
                primerError = document.getElementById("name");
            }
            valor = document.getElementById("apellidos").value;
            if (valor == null || valor.length == 0) {
                valid = false;
                camposError = camposError + "Apellidos, "
                if (primerError == null) primerError = document.getElementById("apellidos");
            }
            if (!IsChk('product')) {
                valid = false;
                camposError = camposError + "Producto o Servicio, "
                if (primerError == null) primerError = document.getElementById("DC");
            }
            valor = document.getElementById("ciudad").value;
            if (valor == null || valor.length == 0) {
                valid = false;
                camposError = camposError + "Ciudad, "
                if (primerError == null) primerError = document.getElementById("ciudad");
            }
            valor = document.getElementById("estado").value;
            if (valor == null || valor.length == 0) {
                valid = false;
                camposError = camposError + "Estado, "
                if (primerError == null) primerError = document.getElementById("estado");
            }
            valor = document.getElementById("tel").value;
            if (valor == null || valor.length == 0) {
                valid = false;
                camposError = camposError + "Teléfono, "
                if (primerError == null) primerError = document.getElementById("tel");
            }
            valor = document.getElementById("email").value;
            if (valor == null || valor.length == 0) {
                valid = false;
                camposError = camposError + "Email, "
                if (primerError == null) primerError = document.getElementById("email");
            }
            valor = document.getElementById("comments").value;
            if (valor == null || valor.length == 0) {
                valid = false;
                camposError = camposError + "Su Mensaje, "
                if (primerError == null) primerError = document.getElementById("comments");
            }
            if (valid) {
                var re = /^[a-zA-Z áéíóúñüàè]{3,50}$/i;
                valor = document.getElementById("name").value;
                if (!re.test(valor)) {
                    valid = false;
                    camposError = camposError + "Nombre, "
                    primerError = document.getElementById("name");
                }
                valor = document.getElementById("apellidos").value;
                if (!re.test(valor)) {
                    valid = false;
                    camposError = camposError + "Apellidos, "
                    if (primerError == null) primerError = document.getElementById("apellidos");
                }
                valor = document.getElementById("ciudad").value;
                if (!re.test(valor)) {
                    valid = false;
                    camposError = camposError + "Ciudad, "
                    if (primerError == null) primerError = document.getElementById("ciudad");
                }
                valor = document.getElementById("estado").value;
                if (!re.test(valor)) {
                    valid = false;
                    camposError = camposError + "Estado, "
                    if (primerError == null) primerError = document.getElementById("estado");
                }
				var re = /^[a-zA-Z .,;-áéíóúñüàè]{3,500}$/i;
                valor = document.getElementById("comments").value;
                if (!re.test(valor)) {
                    valid = false;
                    camposError = camposError + "Su Mensaje, "
                    if (primerError == null) primerError = document.getElementById("comments");
                }
                valor = document.getElementById("tel").value;
                re = /^[+ 0-9\-]{3,20}$/i;
                if (!re.test(valor)) {
                    valid = false;
                    camposError = camposError + "Teléfono, "
                    if (primerError == null) primerError = document.getElementById("tel");
                }
                valor = document.getElementById("email").value;
                re = /^[-\w.%+]{1,64}@(?:[a-zA-Z0-9-]{1,63}\.){1,125}[a-zA-Z]{2,63}$/i;
                if (!re.test(valor)) {
                    valid = false;
                    camposError = camposError + "Email, "
                    if (primerError == null) primerError = document.getElementById("email");
                }

                if (valid) {
                    console.log('This will send the mail through SmtpJS');
					document.getElementById("submit").disabled = true;
					document.getElementById("submit").value = "Enviando...";
                    Email.send("info@amm.com.mx",
                        "info@amm.com.mx, dmiranda@amm.com.mx",
                        "AM&M S.A. DE C.V.",
                        "<p style=\"font-size:13.0pt; margin-bottom:0;\"><strong><span style=\"font-size:14.0pt;font-family:'Calibri',sans-serif;color: #006493;\">Este mensaje ha sido enviado desde el formulario de contacto </span></strong></p> <p style=\"font-size:13.0pt; margin-bottom:0;font-family:'Calibri',sans-serif;padding-left: 30px;\"><strong><span style=\"font-size:12.0pt;font-family:'Calibri',sans-serif;color: #006493;\">Nombre:</span> </strong>"+ document.getElementById("name").value+" "+ document.getElementById("apellidos").value+"</p> <p style=\"font-size:12.0pt;font-family:'Calibri',sans-serif;padding-left: 30px;\"><strong><span style=\"font-size:12.0pt;font-family:'Calibri',sans-serif;color: #006493;\">Producto o servicio:</span></strong></p> <ul>" + prods + "</ul> <p style=\"font-size:13.0pt; margin-bottom:0;font-family:'Calibri',sans-serif;padding-left: 30px;\"><strong><span style=\"font-size:12.0pt;font-family:'Calibri',sans-serif;color: #006493;\">Ciudad: </span></strong>"+ document.getElementById("ciudad").value+"</p> <p style=\"font-size:13.0pt; margin-bottom:0;font-family:'Calibri',sans-serif;padding-left: 30px;\"><strong><span style=\"font-size:12.0pt;font-family:'Calibri',sans-serif;color: #006493;\">Estado:</span></strong> "+ document.getElementById("estado").value+"</p> <p style=\"font-size:13.0pt; margin-bottom:0;font-family:'Calibri',sans-serif;padding-left: 30px;\"><span style=\"font-size:12.0pt;font-family:'Calibri',sans-serif;color: #006493;\"><strong>Tel&eacute;fono:</strong> </span>"+ document.getElementById("tel").value+"</p> <p style=\"font-size:13.0pt; margin-bottom:0;font-family:'Calibri',sans-serif;padding-left: 30px;\"><strong><span style=\"font-size:12.0pt;font-family:'Calibri',sans-serif;color: #006493;\">Correo electr&oacute;nico:</span> </strong>"+ document.getElementById("email").value+"</p> <p style=\"font-size:12.0pt;font-family:'Calibri',sans-serif;padding-left: 30px;\"><span style=\"font-size:12.0pt;font-family:'Calibri',sans-serif;color: #006493;\"><strong>Mensaje: </strong></span></p> <p style=\"font-size:13.0pt; margin-bottom:0;font-family:'Calibri',sans-serif;padding-left: 60px;\">"+ document.getElementById("comments").value+"</p>", {
                            token: "76b90c85-965a-46f2-a6e5-e288da105ef9",
                            callback: function done(message) {
								clearControls();
                                swal({
                                    type: 'success',
                                    title: 'Enviado',
                                    html: 'Mensaje enviado correctamente',
                                    confirmButtonText: 'Cerrar',
                                    timer: 3000
                                }).then(function() {}, function(dismiss) {
                                    if (dismiss === 'timer') {
                                        console.log('Cerrado por temporizador')
                                    }
                                });
                            }

                        }
                    );
                } else {
                    primerError.focus();
                    swal({
                        type: 'error',
                        title: 'Datos incorrectos',
                        html: 'Los siguientes campos contienen información invalida: <br/>' + camposError.substring(0, camposError.length -2),
                        confirmButtonText: 'Cerrar'
                    });
                }
            } else {
                primerError.focus();
                swal({
                    type: 'error',
                    title: 'Datos faltantes',
                    html: 'Los siguientes campos estan vacios: <br/>' + camposError.substring(0, camposError.length -2),
                    confirmButtonText: 'Cerrar'
                });
            }
			document.getElementById("submit").disabled = false;
			document.getElementById("submit").value = "Enviar mensaje";
        }

        function init() {
            document.getElementById('contactform').onsubmit = sendMail;
        }
		var prods = null;
        function IsChk(chkName) {
			prods = "";
            var found = false;
            var chk = document.getElementsByName(chkName + '[]');
            for (var i = 0; i < chk.length; i++) {
                found = chk[i].checked ? true : found;
				if(chk[i].checked){prods = prods + "<li style=\"font-size:13.0pt;font-family:'Calibri',sans-serif;margin-left: 60px;\">" + chk[i].value + "</li>"}
            }
            return found;
        }

		function clearControls(){
			document.getElementById("name").value = "";
            document.getElementById("apellidos").value = "";
            document.getElementById("ciudad").value = "";
            document.getElementById("estado").value = "";
            document.getElementById("tel").value = "";
            document.getElementById("email").value = "";
            document.getElementById("comments").value = "";
			unChk('product');
}
		
		function unChk(chkName) {
			var chk = document.getElementsByName(chkName + '[]');
            for (var i = 0; i < chk.length; i++) {
                chk[i].checked = false;
            }
        }
		
        window.onload = init;
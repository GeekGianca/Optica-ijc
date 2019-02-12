let urlcommon = 'http://192.168.1.10';
let userval;
$(function () {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
    });
});

document.getElementById("imageHome").addEventListener("click", function () {
    window.location.href = "index.php";
});

$(document).on("submit", "#formRegister", function (event) {
    event.preventDefault();
    var $form = $(this);
    var data = $(this).serialize();
    console.log("Serialize: " + data);
    var url_process = urlcommon+"/Optica-ijc/ajax/process_register.php";
    var data_form = {
        iduser: $("#iduser").val(),
        name: $("#name").val(),
        phone: $("#phone").val(),
        birthdate: $("#birthdate").val(),
        address: $("#address").val(),
        eps: $("#eps").val()
    };
    console.log(data_form);
    $.ajax({
        type: 'POST',
        url: url_process,
        data: data_form,
        dataType: 'json',
        async: true
    })
        .done(function doneResponse(res) {
            console.log("Response--->");
            console.log(res);
            console.log(res.message);
            openDialog(res.message, res.title);
        })
        .fail(function errorResponse(e) {
            console.log("Error->");
            console.log(e.error);
            openDialog("Se ha producido un error desconocido", "Fallo con el servidor");
        })
        .always(function ajaxForm() {
            console.log("Ejecuta");
        });
});

function openDialog(value, title) {
    var dialog = document.querySelector('dialog');
    document.getElementById("message").innerHTML = value;
    document.getElementById("title_message").innerText = title;
    if (!dialog.showModal) {
        dialogPolyfill.registerDialog(dialog);
    }
    dialog.showModal();
    dialog.querySelector('.close').addEventListener('click', function () {
        dialog.close();
        window.location.href = "index.php";
    });
}

$(document).on("submit", "#form_appointment", function () {
    event.preventDefault();
    var url_process = urlcommon+"/Optica-ijc/ajax/schedule_appointment.php";
    var progress = document.getElementById("progress");
    var error = document.getElementById("error_mssg");
    progress.style.display = 'block';
    var data_form = {
        iduser: $("#iduser").val(),
        date: $("#dateSelected").val(),
        time: $("#timeSelected").val()
    };
    console.log(data_form);
    $.ajax({
        type: 'POST',
        url: url_process,
        data: data_form,
        dataType: 'json',
        async: true
    })
        .done(function doneResponse(res) {
            console.log("Response--->");
            console.log(res);
            error.style.display = 'none';
            console.log(res.schedule_complete);
            if (res.schedule_complete) {
                schedule();
                dialogRequest(res.message);
            } else {
                progress.style.display = 'none';
                error.innerText = res.message;
                error.style.display = 'block';
            }
        })
        .fail(function errorResponse(e) {
            console.log("Error->");
            progress.style.display = 'none';
            console.log(e);
            error.innerText = "Se ha producido un error";
            error.style.display = 'block';
        })
        .always(function ajaxForm() {
            console.log("Ejecuta");
            progress.style.display = 'none';
            //schedule();
        });
});

function schedule() {
    var dialog = document.querySelector('dialog');
    if (dialog.showModal) {
        dialog.close();
        console.log("close");
    }
}

function dialogRequest(message) {
    'use strict';
    var snackbarContainer = document.querySelector('#toast-request');
    'use strict';
    var data = {message: message};
    snackbarContainer.MaterialSnackbar.showSnackbar(data);
}

$(document).on("submit", "#admin_form", function () {
    event.preventDefault();
    var url_process = urlcommon+"/Optica-ijc/ajax/login_admin.php";
    var progress = document.getElementById("progress");
    var error = document.getElementById("error_mssg");
    progress.style.display = 'block';
    var data_form = {
        username: $("#username").val(),
        password: $("#password").val()
    };
    console.log(data_form);
    $.ajax({
        type: 'POST',
        url: url_process,
        data: data_form,
        dataType: 'json',
        async: true
    })
        .done(function doneResponse(res) {
            console.log("Response--->");
            error.style.display = 'none';
            if (res.exist === undefined) {
                console.log(res);
                progress.style.display = 'none';
                window.location.href = res.redirect;
            } else {
                progress.style.display = 'none';
                error.innerText = res.message;
                error.style.display = 'block';
            }
        })
        .fail(function errorResponse(e) {
            console.log("Error->");
            progress.style.display = 'none';
            console.log(e);
            error.innerText = "Se ha producido un error";
            error.style.display = 'block';
        })
        .always(function ajaxForm() {
            console.log("Execute Always");
        });
});

$(document).on("submit", "#user_form", function () {
    event.preventDefault();
    var url_process = urlcommon+"/Optica-ijc/ajax/process_login.php";
    var progress = document.getElementById("progress");
    var error = document.getElementById("error_mssg");
    progress.style.display = 'block';
    var data_form = {
        usercommon: $("#usercommon").val(),
        passcommon: $("#passcommon").val()
    };
    console.log(data_form);
    $.ajax({
        type: 'POST',
        url: url_process,
        data: data_form,
        dataType: 'json',
        async: true
    })
        .done(function doneResponse(res) {
            console.log("Response--->");
            error.style.display = 'none';
            console.log(res);
            if (res.exist === undefined) {
                console.log(res);
                progress.style.display = 'none';
                window.location.href = res.redirect;
            } else {
                progress.style.display = 'none';
                error.innerText = res.message;
                error.style.display = 'block';
            }
        })
        .fail(function errorResponse(e) {
            console.log("Error->");
            progress.style.display = 'none';
            console.log(e);
            error.innerText = "Se ha producido un error";
            error.style.display = 'block';
        })
        .always(function ajaxForm() {
            console.log("Execute Always");
        });
});

function adminlogin() {
    window.location.href = "loginadmin.php";
}

function userlogin() {
    window.location.href = "loginuser.php";
}

function logout() {
    window.location.href = urlcommon+"/Optica-ijc/php/logout.php";
}

function obtenerdatosformulas(paciente) {
    if (paciente !== undefined) {
        userval = paciente;
        console.log(paciente);
    }
}

function obtenercitas(cedula) {
    if (cedula !== undefined) {
        userval = cedula;
        $.ajax({
            url: urlcommon+'/Optica-ijc/ajax/listarcitas.php',
            type: 'POST',
            data: {cedula},
            success: function (response) {
                console.log(response);
                let datos = JSON.parse(response);
                let template = '';
                datos.forEach(dato => {
                    console.log(dato);
                    let estado = dato.status == 1 ? 'En Espera' : 'Aceptada';
                    let prueb = dato.status == 3 ? 'Rechazada' : estado;
                    let finstate = dato.status == 2 ? 'Cancelada' : prueb;
                    template += `
                    <tr codigocita="${dato.idquotes}">
                        <td>${dato.idquotes}</td>
                        <td>${dato.users_idusers}</td>
                        <td class="mdl-data-table__cell--non-numeric">${dato.date_quotes}</td>
                        <td class="mdl-data-table__cell--non-numeric">${dato.time_quotes}</td>
                        <td>${finstate}</td>
                        <td>
                            <button class="cita-elimina mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                                CANCELAR
                            </button>
                        </td>
                    </tr>`;
                });
                $('#bodytable').html(template);
            }
        });
    } else {
        window.location.href = "index.php";
    }
}

$(document).on('click', '.cita-elimina', function () {
    let element = $(this)[0].parentElement.parentElement;
    let codigo = $(element).attr('codigocita');
    $.post(urlcommon+'/Optica-ijc/ajax/cancelacita.php', {codigo}, function (response) {
        const datoid = JSON.parse(response);
        obtenercitas(datoid.users_idusers);
    });
});

function hcdisponible(cedula) {
    if (cedula !== undefined) {
        console.log(cedula);
        $.ajax({
            url: urlcommon+'/Optica-ijc/ajax/getclinicalhistories.php',
            type: 'POST',
            data: {cedula},
            success: function (response) {
                let datos = JSON.parse(response);
                let template = '';
                datos.forEach(dato => {
                   template +=  `
                   <li class="mdl-list__item mdl-list__item--three-line">
                        <span class="mdl-list__item-primary-content">
                          <i class="material-icons mdl-list__item-avatar">person</i>
                          <span>${dato.idclinical_histories}</span>
                          <span class="mdl-list__item-text-body">
                            ${dato.current_illness}
                          </span>
                        </span>
                        <span class="mdl-list__item-secondary-content">
                          <a class="mdl-list__item-secondary-action" href=""><i class="material-icons">star</i></a>
                        </span>
                    </li>
                   `;
                });
                $('#listahistoriales').html(template);
            }
        });
    } else {
        window.location.href = "index.php";
    }
}

function loadinfo(cedula) {
    userval = cedula;
    console.log(userval);
    console.log(urlcommon+"/Optica-ijc");
}

$('#consultaform').submit(function (e) {
   console.log("Sending data...");
   let select = document.getElementById("tconsulta");
   let val = select.options[select.selectedIndex].value;
   console.log(val);
   const postData = {
     cedula: $('#idusuario').val(),
       fecha: $('#fechacita').val(),
       hora: $('#horacita').val(),
       razon: $('#razon').val(),
       sintomas: $('#sintomas').val(),
       tipocons: val
   };
   console.log(postData);
   let url = urlcommon+'/Optica-ijc/ajax/consultas.php';
   $.post(url, postData, function (response) {
       console.log(response);
       if (response){
           $('#info').html("Registro de consulta satisfactorio, se le enviara una notificacion de su solicitud.");
           $('#info').addClass('alert-sucess');
       } else {
           $('#info').html("Error en el registro.");
           $('#info').addClass('alert-danger');
       }
       $('consultaform').trigger('reset');
   });
   e.preventDefault();
});
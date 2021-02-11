window.onload = function() {
    read();
}

function objetoAjax() {
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}
/* Muestra todos los registros de la base de datos (sin filtrar y filtrados) */
function read() {
    var section = document.getElementById('datos');
    var ajax = new objetoAjax();
    ajax.open('GET', 'read', true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            var tabla = '';
            for (let i = 0; i < respuesta.length; i++) {
                tabla += '<tr>';
                tabla += '<td>' + respuesta[i].title + '</td>';
                tabla += '<td>' + respuesta[i].description + '</td>';
                tabla += '<td>';
                tabla += '<form method="get">';
                tabla += '<button type="submit">Actualizar</button>';
                tabla += '</form>';
                tabla += '</td>';
                tabla += '<td style="text-align: center">';
                tabla += '<form method="post" onsubmit="borrar('+ respuesta[i].id +'); return false";>'
                tabla += '<button type="submit">Borrar</button>';
                tabla += '</form>';
                tabla += '</td>';
                tabla += '</tr>';
                }
                tabla += '</div>';
            section.innerHTML = tabla;
        }
    }
    ajax.send();
}

function borrar(id) {   
    console.log(id);
    var mensaje = document.getElementById('mensaje');
    var ajax = new objetoAjax();
    var token = document.getElementById('token').getAttribute('content');
    ajax.open('POST', 'borrar', true);
    var datos = new FormData();
    datos.append('id', id);
    datos.append('_token', token);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            if (respuesta.resultado == 'OK') {
                mensaje.innerHTML = 'Se ha borrado la nota';
                read();
            } else {
                mensaje.innerHTML = 'Ha ocurrido un error.' + respuesta.resultado;
            }
        }
    }
    ajax.send(datos);
}

function crear() {   
    console.log(title,description);
    var mensaje = document.getElementById('mensaje');
    var ajax = new objetoAjax();
    var token = document.getElementById('token').getAttribute('content');
    ajax.open('POST', 'crear', true);
    var datos = new FormData();
    datos.append('title', document.getElementById('title').value);
    datos.append('description', document.getElementById('description').value);
    datos.append('_token', token);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            if (respuesta.resultado == 'OK') {
                mensaje.innerHTML = 'Se ha creado la nota';
                read();
            } else {
                mensaje.innerHTML = 'Ha ocurrido un error.' + respuesta.resultado;
            }
        }
    }
    ajax.send(datos);
}
import Swal from 'sweetalert2'

(function (){
    let eventos = [];

    const resumen = document.querySelector('#registro-resumen');

    if (resumen) {
        const eventsBoton = document.querySelectorAll('.evento__agregar');

        eventsBoton.forEach(boton => boton.addEventListener('click', seleccionarEvento));

        const formularioRegistro = document.querySelector('#registro');
        formularioRegistro.addEventListener('submit', submitFormulario);

        mostrarEventos();

        function seleccionarEvento(e) {
            if (eventos.length < 5) {
                e.target.disabled = true;
                // Deshabilitar el evento
                eventos = [...eventos, {
                    id: e.target.dataset.id,
                    titulo: e.target.parentElement.querySelector('.evento__nombre').textContent.trim()
                }]
                mostrarEventos();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Lo sentimos!!!',
                    text: 'No puedes agreagar mas de 5 eventos!',
                    confirmButtonText: 'OK'
                })
            }
        }

        function mostrarEventos() {
            // Limpiar el HTML
            limpiarEventos();

            if (eventos.length > 0){
                eventos.forEach( evento => {
                   const eventoDOM = document.createElement('DIV');
                   eventoDOM.classList.add('registros__evento');

                   const titulo = document.createElement('H3');
                   titulo.classList.add('registros__nombre');
                   titulo.textContent = evento.titulo

                    const botonEliminar = document.createElement('BUTTON');
                   botonEliminar.classList.add('registros__eliminar');
                   botonEliminar.innerHTML = `<i class="fa-solid fa-trash"></i>`;
                   botonEliminar.onclick = function () {
                       elimininarEvento(evento.id);
                   }

                    //Renderizar el html
                    eventoDOM.appendChild(titulo);
                    eventoDOM.appendChild(botonEliminar);
                    resumen.appendChild(eventoDOM);
                })
            } else {
                const noRegistro = document.createElement('P');
                noRegistro.textContent = 'No hay eventos, añade hasta 5 del lado izquierdo';
                noRegistro.classList.add('registros__texto');
                resumen.appendChild(noRegistro);
            }
        }

        function elimininarEvento(id) {
            eventos = eventos.filter( evento => evento.id !== id);
            const botonAgregar = document.querySelector(`[data-id="${id}"]`);
            botonAgregar.disabled = false;
            mostrarEventos();
        }

        function limpiarEventos() {
            while (resumen.firstChild) {
                resumen.removeChild(resumen.firstChild);
            }
        }

        async function submitFormulario(event) {
            event.preventDefault();

            // Obtener el regalo
            const regalosId = document.querySelector('#regalo').value;

            // Eventos Id
            const eventosId = eventos.map(evento => evento.id);

            if(eventosId.length === 0  || regalosId === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Lo sentimos!!!',
                    text: 'Elige al menos 1 Evento y un Regalo',
                    confirmButtonText: 'OK'
                });
                return;
            }

            // Objeto de formdata
            const datos = new FormData();
            datos.append('eventos', eventosId);
            datos.append('regalo_id', regalosId);

            const url = '/finalizar-registro/conferencias';
            const respuesta = await fetch(url, {
                method: 'POST',
                body: datos
            });
            const resultado = await respuesta.json();

            console.log(resultado);
        }
    }


})();